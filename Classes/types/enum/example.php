<?php
include ( "Enum.inc" );
include ( "EnumIterator.inc" );

// DNSRecordType enum
abstract class DNSRecordType extends Enum
{
}

class A extends DNSRecordType
{
}

class CNAME extends DNSRecordType
{
}

class MX extends DNSRecordType
{
}

class NS extends DNSRecordType
{
}

class SRV extends DNSRecordType
{
}

class TXT extends DNSRecordType
{
}

class AAAA extends DNSRecordType
{
}

class PTR extends DNSRecordType
{
}

echo "DNSRecordType:\n";
foreach ( Enum::iterator ( "DNSRecordType" ) as $member )
{
	echo "\t" . $member . " has value " . ( Enum::get ( $member ) ) . "\n";
}
