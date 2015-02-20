<?php

class PlistParser extends XMLReader
{

	public function parse ( $array )
	{
		$this->XML ( $array );
		// plist's always start with a doctype, use it as a validity check
		$this->read ( );
		if ( $this->nodeType !== XMLReader::DOC_TYPE || $this->name !== "plist" )
		{
			return "Error parsing plist. nodeType: $this->nodeType -- Name: $this->name";
		}
		
		// as one additional check, the first element node is always a plist
		if ( ! $this->next ( "plist" ) || $this->nodeType !== XMLReader::ELEMENT || $this->name !== "plist" )
		{
			return "Error parsing plist. nodeType: $this->nodeType -- Name: $this->name";
		}
		
		$plist = array ();
		while ( $this->read ( ) )
		{
			if ( $this->nodeType == XMLReader::ELEMENT )
			{
				$plist [ ] = $this->parse_node ( );
			}
		}
		if ( count ( $plist ) == 1 && $plist [ 0 ] )
		{
			// Most plists have a dict as their outer most tag
			// So instead of returning an array with only one element
			// return the contents of the dict instead
			return $plist [ 0 ];
		}
		else
		{
			return $plist;
		}
	}

	private function parse_node ( )
	{
		// If not an element, nothing for us to do
		if ( $this->nodeType !== XMLReader::ELEMENT )
		{
			// echo "returning on element";
			return;
		}
		// echo ("parse_node ".$this->name."\n");
		switch ( $this->name )
		{
			case 'data' :
				return $this->getNodeText ( );
				break;
			case 'real' :
				return floatval ( $this->getNodeText ( ) );
				break;
			case 'string' :
				return $this->getNodeText ( );
				break;
			case 'integer' :
				return intval ( $this->getNodeText ( ) );
				break;
			case 'date' :
				return $this->getNodeText ( );
				break;
			case 'true' :
				return true;
				break;
			case 'false' :
				return false;
				break;
			case 'array' :
				return $this->parse_array ( );
				break;
			case 'object' :
				return $this->parse_array ( );
				break;
			case 'dict' :
				return $this->parse_dict ( );
				break;
			default :
				// per DTD, the above is the only valid types
				throw new Exception ( sprintf ( "Not a valid plist. %s is not a valid type", $this->name ), 4 );
		}
	}

	private function parse_dict ( )
	{
		$array = array ();
		if ( $this->isEmptyElement ) return $array;
		$this->nextOfType ( XMLReader::ELEMENT );
		do
		{
			// echo "top of do loop \n ";
			if ( $this->nodeType !== XMLReader::ELEMENT || $this->name !== "key" )
			{
				// echo "if this->nodeType";
				// If we aren't on a key, then jump to the next key
				// per DTD, dicts have to have <key><somevalue> and nothing else
				if ( ! $this->next ( "key" ) )
				{
					// echo "if this->next(key)";
					// no more keys left so per DTD we are done with this dict
					return $array;
				}
			}
			$key = $this->getNodeText ( );
			// echo "key is ".$key."\n ";
			$this->nextOfType ( XMLReader::ELEMENT );
			$array [ $key ] = $this->parse_node ( );
			$this->nextOfType ( XMLReader::ELEMENT, XMLReader::END_ELEMENT );
		}
		while ( ! $this->isNodeOfTypeName ( XMLReader::END_ELEMENT, "dict" ) );
		// echo "out of dict loop\n";
		// echo "getNodeText is ".$this->nodeType."\n ";
		return $array;
	}

	private function parse_array ( )
	{
		$array = array ();
		if ( $this->isEmptyElement )
		{
			return $array;
		}
		do
		{
			// find the first item of the array and append it onto the node list
			$this->nextOfType ( XMLReader::ELEMENT );
			if ( $this->isNodeOfTypeName ( XMLReader::END_ELEMENT, "array" ) )
			{
				break;
			}
			$array [ ] = $this->parse_node ( );
			// echo "skip over any whitespace";
			// skip over any whitespace
			// $x = $this->nextOfType(XMLReader::ELEMENT,
			// XMLReader::END_ELEMENT);
			// $this->nextOfType(XMLReader::END_ELEMENT);
		}
		while ( ! $this->isNodeOfTypeName ( XMLReader::END_ELEMENT, "array" ) );
		return $array;
	}

	private function getNodeText ( )
	{
		@trigger_error ( "" );
		$string = @$this->readString ( );
		if ( $string == null )
		{
			$error = error_get_last ( );
			if ( $error [ 'type' ] == 2 && strpos ( $error [ 'message' ], "XMLReader::readString()" ) === 0 )
			{
				throw new Exception ( "Parse failed... unable to parse node value" );
			}
		}
		// now gobble up everything up to the closing tag
		// echo "--".$string."--\n ";
		$this->nextOfType ( XMLReader::END_ELEMENT );
		return $string;
	}

	private function nextOfType ( )
	{
		$types = func_get_args ( );
		// skip to next
		$this->read ( );
		// check if it's one of the types requested and loop until it's one we
		// want
		while ( ! ( in_array ( $this->nodeType, $types ) ) && $this->nodeType != "15" )
		{
			// node isn't of type requested, so keep going
			// echo "Jumpin ".$this->nodeType." as |".$this->readString()."|\n";
			$this->read ( );
		}
	}

	private function isNodeOfTypeName ( $type, $name )
	{
		return $this->nodeType === $type && $this->name === $name;
	}
	
	// string convertIntoPlist(array &array)
	function convertIntoPlist ( &$array, $human = false )
	{
		$nl = ( $human ) ? "\n" : "";
		$exp = "<?xml version=\"1.0\" encoding=\"UTF-8\"?" . ">" . $nl . "<!DOCTYPE plist PUBLIC \"-//Apple Computer//DTD PLIST 1.0//EN\" \"http://www.apple.com/DTDs/PropertyList-1.0.dtd\">" . $nl . "<plist version=\"1.0\">" . $nl;
		$exp .= $this->_parseArray ( $array, $human );
		$exp .= "</plist>";
		return $exp;
	}
	
	// string _parseArray(array &array)
	function _parseArray ( &$array, $human = false, $nIndent = false )
	{
		$src = "";
		$nl = ( $human ) ? "\n" : '';
		$indentChar = "\t";
		$baseIndent = '';
		$indent = '';
		if ( $human )
		{
			$nIndent = ( $nIndent === false ) ? 1 : $nIndent + 1;
			for ( $i = 0; $i < $nIndent - 1; $i ++ )
				$baseIndent .= $indentChar;
			for ( $i = 0; $i < $nIndent; $i ++ )
				$indent .= $indentChar;
		}
		
		// check type
		$type = "array";
		$count = 0;
		$keys = array_keys ( $array );
		sort ( $keys );
		while ( list ( $key, $value ) = each ( $keys ) )
		{
			if ( gettype ( $value ) != "integer" || $key != $count )
			{
				$type = "dict";
				break;
			}
			$count ++;
		}
		
		$formatFix = '';
		for ( $i = 0; $i < $nIndent - 6; $i ++ )
			$formatFix .= $indentChar;
		
		$exp = ( $type == 'dict' ) ? $formatFix . "<" . $type . ">" . $nl : $nl . $indent . "<" . $type . ">" . $nl;
		reset ( $array );
		while ( list ( $i, ) = each ( $array ) )
		{
			if ( ( gettype ( $array [ $i ] ) == "array" && count ( $array [ $i ] ) > 0 ) || ( gettype ( $array [ $i ] ) == "string" && strlen ( $array [ $i ] ) > 0 ) )
			{
				$exp .= ( $type == 'dict' ) ? $indent . '<key>' . $i . '</key>' . $nl : $indent;
			}
			// echo gettype($array[$i]).$nl;
			switch ( gettype ( $array [ $i ] ) )
			{
				// collections
				case "array" :
					$exp .= ( count ( $array [ $i ] ) > 0 ) ? $this->_parseArray ( $array [ $i ], $human, $nIndent ) : '';
					break;
				// primitive types
				case "string" :
					$exp .= ( strlen ( $array [ $i ] ) > 0 ) ? $indent . "<string>" . $array [ $i ] . "</string>" . $nl : '';
					break;
				// numerical primitives
				case "boolean" :
					if ( $array [ $i ] )
					{
						$exp .= $indent . '<key>' . $i . '</key>' . $nl . $indent . "<true />" . $nl;
					}
					else
					{
						$exp .= $indent . '<key>' . $i . '</key>' . $nl . $indent . "<false />" . $nl;
					}
					break;
				case "integer" :
					$exp .= $indent . '<key>' . $i . '</key>' . $nl . $indent . "<integer>" . $array [ $i ] . "</integer>" . $nl;
					break;
				case "double" :
					$exp .= $indent . '<key>' . $i . '</key>' . $nl . $indent . "<real>" . $array [ $i ] . "</real>" . $nl;
					break;
				default :
			}
		}
		$exp .= $baseIndent . "</" . $type . ">" . $nl;
		
		return $exp;
	}
}
