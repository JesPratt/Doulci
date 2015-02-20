<?php

class EnumIterator implements Iterator
{
	
	protected $classes = array ();
	
	protected $enum_type;

	public function __construct ( $enum_type )
	{
		if ( ! class_exists ( $enum_type ) || ! is_subclass_of ( $enum_type, "Enum" ) ) throw new Exception ( "Specified Enum type doesn't exist or is not an Enum!" );
		$this->enum_type = $enum_type;
		foreach ( get_declared_classes ( ) as $class )
		{
			if ( is_subclass_of ( $class, $this->enum_type ) )
			{
				$this->classes [ ] = $class;
			}
		}
	}

	public function current ( )
	{
		return current ( $this->classes );
	}

	public function key ( )
	{
		return key ( $this->classes );
	}

	public function next ( )
	{
		next ( $this->classes );
		return $this->current ( );
	}

	public function rewind ( )
	{
		return reset ( $this->classes );
	}

	public function valid ( )
	{
		return ( bool ) $this->current ( );
	}
}
