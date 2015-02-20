<?php
include ( "Enum.inc" );

abstract class Gender extends Enum
{
}

class Female extends Gender
{
	
	var $value = "f";
}

class Male extends Gender
{
	
	var $value = "m";
}

var_dump ( Gender::get ( "Male" ) === Male::get ( "Male" ) );
var_dump ( Enum::get ( "Male" ) instanceof Gender );
var_dump ( Enum::get ( "Male" ) instanceof Male );
var_dump ( Gender::get ( "Male" ) === Gender::get ( "Female" ) );
var_dump ( Gender::get ( "female" ) );

