<?php
include ( "Enum.inc" );
include ( "EnumIterator.inc" );

Enum::enablePureMode ( );

abstract class Months extends Enum
{
}

class JANUARY extends Months
{
	
	var $value = 1;
}

class FEBRUARY extends Months
{
}

class MARCH extends Months
{
}

class APRIL extends Months
{
}

class MAY extends Months
{
}

class JUNE extends Months
{
}

class JULY extends Months
{
}

class AUGUST extends Months
{
}

class SEPTEMBER extends Months
{
}

class OCTOBER extends Months
{
}

class NOVEMBER extends Months
{
}

class DECEMBER extends Months
{
}

echo "Months of the year:\n";
foreach ( Enum::iterator ( "Months" ) as $member )
{
	echo "\t" . $member . " has value " . ( Enum::get ( $member ) ) . "\n";
}
