<?php
session_start ( );

require_once ( '../doulCi.Core.php' );

if ( isset ( $_GET [ 'action' ] ) && ( $_GET [ 'action' ] == 2 ) )
{
	if ( $_SERVER [ 'REQUEST_METHOD' ] == "POST" )
	{
		// Check the User Agent and lets do it :)
		if ( isset ( $_SERVER [ 'HTTP_USER_AGENT' ] ) )
		{
			if ( ( strpos ( $_SERVER [ 'HTTP_USER_AGENT' ], 'AppleTV' ) !== false ) or ( strpos ( $_SERVER [ 'HTTP_USER_AGENT' ], 'iPhone' ) !== false ) or ( strpos ( $_SERVER [ 'HTTP_USER_AGENT' ], 'iPod' ) !== false ) or ( strpos ( $_SERVER [ 'HTTP_USER_AGENT' ], 'iPad' ) !== false ) )
			{
				// Make it Freeze and he we go :)
				require_once ( ROOT . DS . 'doulCi.Proxy.php' );
				die ( );
			}
			else
			{
				// Setting the Default Header Type.
				Header ( CONTENT_TEXT );
			}
		}
		
		$POST_DATA = urldecode ( file_get_contents ( 'php://input' ) );
		$POST_Blobs_Put = file_put_contents ( CACHE . DS . mt_rand ( time ( ), time ( ) ) . "_BBTikets.json", json_encode ( $POST_DATA, JSON_PRETTY_PRINT ) );
		$POST_Blobs_Get = json_decode ( file_get_contents ( CACHE . DS . mt_rand ( time ( ), time ( ) ) . "_BBTikets.json" ) );
		
		// echo $POST_DATA;
		// die();
		
		unlink ( CACHE . DS . mt_rand ( time ( ), time ( ) ) . "_BBTikets.json" );
		
		/*
		 * if ( strpos ( $POST_Blobs_Get, "<?xml version=\"1.0\" encoding=\"UTF-8\"?>" ) !== true ) { $POST_Blobs_Get		= str_replace ( "\"1.0\" encoding=\"UTF-8\"?".">", "<?xml version=\"1.0\" encoding=\"UTF-8\"?".">", $POST_Blobs_Get ); $POST_Blobs_Put		= file_put_contents ( CACHE . DS . mt_rand ( time (), time () ) . "_Corrected_BBTikets.serialized", serialize ( $POST_Blobs_Get ) ); $POST_Blobs_Get		= unserialize ( file_get_contents ( CACHE . DS . mt_rand ( time (), time () ) . "_Corrected_BBTikets.serialized" ) ); unlink ( CACHE . DS . mt_rand (time (), time () ) . "_Corrected_BBTikets.serialized" ); }
		 */
		
		$Blobs_Request = $parser->parse ( $POST_Blobs_Get );
		
		extract ( $Blobs_Request );
		
		// Define & Create Directories.
		$Blobs_Path = TSS_BLOB . DS . $ApECID;
		$Files_Path = $ApBoardID . "_" . $ApChipID;
		$Make_it_Now = Create_Dir ( $Blobs_Path, $mode = 0755 );
		
		if ( $ApECID != "" )
		{
			$POST_Blobs_Put = file_put_contents ( $Blobs_Path . DS . $Files_Path . "_Requested_BBTikets.plist", $POST_Blobs_Get );
			$Plist_FILE = file_get_contents ( $Blobs_Path . DS . $Files_Path . "_Requested_BBTikets.plist" );
			
			// Needs a separated function
			$Get_Blobs = cURLgetData ( APPLE_TSS_SERVER, USER_AGENT_TSS, "POST", $Plist_FILE );
			$Unbrick_Enc64 = file_put_contents ( $Blobs_Path . DS . $Files_Path . "_Validated_BBTikets.plist", $Get_Blobs );
			
			print $Get_Blobs;
		}
		else
		{
			// Setting the Default Header Type.
			header ( "HTTP/1.0 404 Not Found" );
			echo "Directory Not Found";
			die ( );
		}
	}
	else
	{
		// Setting the Default Header Type.
		header ( "HTTP/1.0 404 Not Found" );
		echo "File Not Found";
		die ( );
	}
}

ob_end_flush ( );
?>