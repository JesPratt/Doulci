<?php

abstract class Enum
{
	
	protected static $instances = array ();
	
	protected $value = null;
	
	protected static $pureMode = false;
	
	protected static $classesWalked = false;
	
	protected static $typeCounters = array ();
	
	protected static $classIntValues = array ();

	final private function __construct ( )
	{
	}

	final public static function enablePureMode ( )
	{
		self::$pureMode = true;
	}

	final protected static function walkClasses ( )
	{
		if ( self::$pureMode && ! self::$classesWalked )
		{
			foreach ( get_declared_classes ( ) as $class )
			{
				if ( is_subclass_of ( $class, "Enum" ) && $class !== "Enum" )
				{
					$parent = get_parent_class ( $class );
					if ( $parent == "Enum" ) continue;
					if ( ! array_key_exists ( $parent, self::$typeCounters ) )
					{
						self::$typeCounters [ $parent ] = 0;
					}
					$obj = new $class ( );
					$objval = $obj->value;
					if ( ! is_null ( $objval ) )
					{
						if ( ! is_numeric ( $objval ) )
						{
							$nextval = ord ( $objval ) + 1;
						}
						else
						{
							$nextval = $objval + 1;
						}
						if ( $nextval <= self::$typeCounters [ $parent ] )
						{
							throw new Exception ( "Specified enum member value is impossible" );
						}
						self::$classIntValues [ $class ] = $objval;
						self::$typeCounters [ $parent ] = $nextval;
					}
					else
					{
						self::$classIntValues [ $class ] = self::$typeCounters [ $parent ] ++;
					}
				}
			}
			self::$classesWalked = true;
		}
	}

	final public function __toString ( )
	{
		if ( self::$pureMode )
		{
			// delay the performance hit until we actually need the value of one
			// of the enums
			self::walkClasses ( );
			return ( string ) self::$classIntValues [ get_class ( $this ) ];
		}
		else
		{
			return get_class ( $this );
		}
	}

	final public static function iterator ( $enum_type )
	{
		return new EnumIterator ( $enum_type );
	}

	final public static function get ( $name )
	{
		if ( is_subclass_of ( $name, "Enum" ) )
		{
			if ( array_key_exists ( $name, self::$instances ) )
			{
				return self::$instances [ $name ];
			}
			else
			{
				return self::$instances [ $name ] = new $name ( );
			}
		}
		else
		{
			throw new Exception ( );
		}
	}

	final public static function __callStatic ( $name, $args )
	{
		return self::get ( $name );
	}
}
