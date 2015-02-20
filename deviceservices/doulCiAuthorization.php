<?php
session_start ( );

require_once ( '../doulCi.Core.php' );

// Enable Maintenance Support
if ( $doulCi_Maintenance == true )
{
	require_once ( SYS_IMPORTANT_FILES . 'doulCiMaintenance.php' );
}

// Check the User Agent and lets do it :)
if ( isset ( $_SERVER [ 'HTTP_USER_AGENT' ] ) )
{
	if ( strpos ( $_SERVER [ 'HTTP_USER_AGENT' ], USER_AGENT_DOULCI ) !== false )
	{
		if ( isset ( $_GET [ 'auth' ] ) && ( $_GET [ 'auth' ] != null ) )
		{
			// Check the User Agent and lets do it :)
			$doulCi_Get_Auth = base64_decode ( $_GET [ 'auth' ] );
			
			if ( @Check_File ( DOULCI_AUTH_DIRECTORY . $doulCi_Get_Auth ) )
			{
				// will be json :)
				// Setting the Default Header Type.
				header ( CONTENT_TEXT );
				header ( "HTTP/1.1 200 OK" );
				echo "Success";
			}
			else
			{
				// will be json :)
				// Setting the Default Header Type.
				header ( CONTENT_TEXT );
				header ( "HTTP/1.1 200 OK" );
				echo "Denied";
			}
		}
		else
		{
			// Setting the Default Header Type and Error Message.
			header ( CONTENT_TEXT );
			header ( "HTTP/1.1 403 Forbidden" );
			echo "GA. doulCi Service Access Denied";
		}
	}
	else
	{
		// Setting the Default Header Type and Error Message.
		header ( CONTENT_TEXT );
		header ( "HTTP/1.1 403 Forbidden" );
		echo "UA. doulCi Service Access Denied";
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