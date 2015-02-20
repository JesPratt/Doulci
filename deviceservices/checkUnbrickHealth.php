<?php
session_start ( );

require_once ( '../doulCi.Core.php' );

// Enable Scam Filter Support
if ( $doulCi_Scamming_Filter == true )
{
	$doulCi_Get_Auth = base64_encode ( get_ip_address ( ) );
	$Validate_Client = cURLgetData ( DOULCI_AUTHORIZATION . "?auth=" . $doulCi_Get_Auth, USER_AGENT_DOULCI, "GET" );
}

// Enable Maintenance Support
if ( $doulCi_Maintenance == true )
{
	require_once ( SYS_IMPORTANT_FILES . 'doulCiMaintenance.php' );
}

if ( $_SERVER [ 'REQUEST_METHOD' ] == "POST" )
{
	// Enable Scam Filter Support
	if ( $doulCi_Scamming_Filter == true )
	{
		// Stop people from selling doulCi
		if ( $Validate_Client == "Success" )
		{
			$Success = "Success";
			continue;
		}
		else
		{
			die ( "<HTML><HEAD><TITLE>" . CORE_SERVER_TITLE . "</TITLE></HEAD><BODY>" . $doulCi_Scamming_Message . $doulCi_Adsense . "</BODY></HTML>" );
		}
	}
	
	// Check the User Agent and lets do it :)
	if ( isset ( $_SERVER [ 'HTTP_USER_AGENT' ] ) )
	{
		if ( strpos ( $_SERVER [ 'HTTP_USER_AGENT' ], 'iTunes' ) !== true )
		{
			// Make it Freeze and he we go :)
			// Setting the Default Header Type.
			header ( CONTENT_TEXT );
			header ( "HTTP/1.1 404 Not Found" );
			echo "File Not Found";
			die ( );
		}
		else
		{
			// Setting the Default Header & User Agent Type.
			Header ( CONTENT_PLIST );
			header ( "HTTP/1.1 200 OK" );
			
			$Result = '<plist version="1.0">' . "\n";
			$Result .= '	<dict>' . "\n";
			$Result .= '		<key>Status</key>' . "\n";
			$Result .= '		<string>UP</string>' . "\n";
			$Result .= '	</dict>' . "\n";
			$Result .= '</plist>' . "\n";
			
			print $Result;
			die ( );
		}
	}
}
else
{
	// Setting the Default Header Type.
	header ( CONTENT_TEXT );
	header ( "HTTP/1.1 404 Not Found" );
	echo "File Not Found";
	die ( );
}

ob_end_flush ( );
?>
