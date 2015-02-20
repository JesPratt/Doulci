<?php

// require_once ( '../doulCi.Core.php' );
if ( $_SERVER [ 'REQUEST_METHOD' ] == "POST" )
{
	// Check the User Agent and lets do it :)
	if ( isset ( $_SERVER [ 'HTTP_USER_AGENT' ] ) )
	{
		if ( ( strpos ( $_SERVER [ 'HTTP_USER_AGENT' ], 'AppleTV' ) !== false ) or ( strpos ( $_SERVER [ 'HTTP_USER_AGENT' ], 'iPhone' ) !== false ) or ( strpos ( $_SERVER [ 'HTTP_USER_AGENT' ], 'iPod' ) !== false ) or ( strpos ( $_SERVER [ 'HTTP_USER_AGENT' ], 'iPad' ) !== false ) )
		{
			// Make it Freeze and he we go :)
			// Setting the Default Header & User Agent Type.
			Header ( CONTENT_XML );
			ini_set ( 'user_agent', USER_AGENT_IOS_DEVICE );
			$Unbrick = file_get_contents ( TEMPLATES . 'iDevices' . DS . 'Ubrick_iDevice.xml' );
			die ( $Unbrick );
		}
	}
	else
	{
		// Setting the Default Header Type.
		header ( CONTENT_TEXT );
		header ( "HTTP/1.0 404 Not Found" );
		echo "DP File Not Found";
		die ( );
	}
}
else
{
	// Setting the Default Header Type.
	header ( CONTENT_TEXT );
	header ( "HTTP/1.1 501 Not Implemented" );
	echo "DP Method Not Implemented";
	die ( );
}

$show = '<div style="text-align:center;">
	<br>
	<a href="Certs/583785782395820321_siriport_ru_original.pem"><button style="border:1px dotted #333;"><b>Install UnOfficial SIRI Certificate</b></button></a>
	<br>
	<b>Or</b>
	<br>
	<a href="mailto:merruk.company@gmail.com"><button style="border:1px dotted #333;"><b>Setup new iCloud Account</b></button></a>
	<br>
</div>';

ob_end_flush ( );
?>