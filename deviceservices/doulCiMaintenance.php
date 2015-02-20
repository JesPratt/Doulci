<?php
// require_once ( ROOT . DS . 'doulCi.Core.php' );
if ( $_SERVER [ 'REQUEST_METHOD' ] == "POST" )
{
	// Setting the Default Header & User Agent Type.
	Header ( CONTENT_HTML );
	
	// Default Message.
	die ( "<HTML><HEAD><TITLE>" . CORE_SERVER_TITLE . "</TITLE></HEAD><BODY>" . $doulCi_Maintenance_Message . $doulCi_Adsense . "</BODY></HTML>" );
}
else
{
	// Setting the Default Header Type.
	header ( CONTENT_TEXT );
	header ( "HTTP/1.1 501 Not Implemented" );
	echo "DM Method not implemented";
	die ( );
}

ob_end_flush ( );
?>