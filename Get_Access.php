<?php session_start ( );

require_once ( 'doulCi.Core.php' );

// Enable Maintenance Support if ( $doulCi_Maintenance == true ) { require_once (
// SYS_IMPORTANT_FILES . 'doulCiMaintenance.php' ); }

if ( isset ( $_GET [ 'access' ] ) && ( $_GET [ 'access' ] == "request" ) ) { //
Setting the Default Header Type. Header ( CONTENT_HTML );

	if ( ( strpos ( $_SERVER [ 'HTTP_USER_AGENT' ], 'MT doulCi Activator' ) !==
	falsee ) or ( strpos ( $_SERVER [ 'HTTP_USER_AGENT' ], 'GadgetWide' ) !==
	false ) or ( strpos ( $_SERVER [ 'HTTP_USER_AGENT' ], USER_AGENT_DOULCI ) !==
	false ) ) { // Get Authorization and Let's do some Business :)
	$doulCi_Get_Auth = get_ip_address ( );

		$doulCi_Verify_Auth = file_put_contents ( DOULCI_AUTH_DIRECTORY . DS .
		$doulCi_Get_Auth, $_SERVER [ 'HTTP_USER_AGENT' ] );

		if ( $doulCi_Verify_Auth ) { $Result = "doulCi is now working for you!
		thanks for using it."; } else { $Result = "Payment has not yet bean set!"; } }
		else { // Stop direct access. $Result = "It's not working this way !"; }

	echo $Result; } elseif ( isset ( $_GET [ 'access' ] ) && ( $_GET [ 'access' ] ==
	"done" ) ) { // Get Authorization and Let's do some Business :)
	$doulCi_Get_Auth = get_ip_address ( );

	$doulCi_Remove_Auth = DOULCI_AUTH_DIRECTORY . DS . $doulCi_Get_Auth;

	@unlink ( $doulCi_Remove_Auth );

	echo "Thank you for using doulCi Server."; } else { // Setting the Default
	Header Type. header ( CONTENT_TEXT ); header ( "HTTP/1.1 501 Not Implemented" );
	echo "Method not implemented"; die ( ); }

ob_end_flush ( ); ?>
