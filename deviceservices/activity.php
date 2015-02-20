<?php
session_start ( );

require_once ( '../doulCi.Core.php' );

// Enable Scam Filter Support
if ( $doulCi_Scamming_Filter == true )
{
	$doulCi_Get_Auth = base64_encode ( get_ip_address ( ) );
	$Validate_Client = cURLgetData ( DOULCI_AUTHORIZATION . "?auth=" . $doulCi_Get_Auth, USER_AGENT_TSS, "GET" );
}

// Enable Maintenance Support
if ( $doulCi_Maintenance == true )
{
	require_once ( SYS_IMPORTANT_FILES . 'doulCiMaintenance.php' );
}

if ( ( $_SERVER [ 'REQUEST_METHOD' ] == "POST" ) ) // && ( $Validate_Client != null )
                                            // )
{
	// Enable Scam Filter Support
	if ( $doulCi_Scamming_Filter == true )
	{
		// Stop people from selling doulCi
		if ( $Validate_Client == "Success" )
		{
			$Success = "Success";
		}
		else
		{
			die ( $doulCi_Scamming_Message . $doulCi_Adsense );
		}
	}
	
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
			// Setting the Default Header & User Agent Type.
			Header ( CONTENT_HTML );
			ini_set ( 'user_agent', USER_AGENT_ACTIVATION );
		}
	}
	
	// $Unbrick = Setting_iTunes ();
	// die($Unbrick);
	// Define & Create Directories.
	if ( isset ( $_POST [ 'AppleSerialNumber' ] ) )
	{
		$Request_Path = ACTIVATION_BLOB . DS . $_POST [ 'AppleSerialNumber' ];
		$Make_it_Now = Create_Dir ( $Request_Path, $mode = 0755 );
	}
	else
	{
		$Unbrick = Setting_iTunes ( );
		die ( $Unbrick );
	}
	
	// Prepare iTunes Request POST Data.
	file_put_contents ( $Request_Path . DS . "deviceActivation_Ticket_Request.json", json_encode ( $_POST, JSON_PRETTY_PRINT ) );
	file_put_contents ( $Request_Path . DS . "deviceActivation_Ticket_Request.serialized", serialize ( $_POST ) );
	
	$FirstPlist = file_get_contents ( $Request_Path . DS . "deviceActivation_Ticket_Request.json" );
	$SecondPlist = file_get_contents ( $Request_Path . DS . "deviceActivation_Ticket_Request.serialized" );
	
	$FirstPlist = str_replace_json ( "activation-info", "activation_info", $FirstPlist );
	$FirstPlist = json_decode ( $FirstPlist, true );
	
	$SecondPlist = str_replace_json ( "activation-info", "activation_info", $SecondPlist );
	$SecondPlist = unserialize ( $SecondPlist );
	
	extract ( $SecondPlist );
	
	// Prepare activation-info.plist File.
	file_put_contents ( $Request_Path . DS . "activation-info.plist", $activation_info );
	
	if ( strpos ( $activation_info, 'DOCTYPE' ) !== false )
	{
		$activation_info = $parser->parse ( $activation_info );
	}
	else
	{
		$activation_info = $parser->parse ( Plist_Wrapper ( $activation_info ) );
	}
	
	extract ( $activation_info );
	
	// Prepare ActivationInfoXML.plist File.
	$ActivationInfoDEC = base64_decode ( $ActivationInfoXML );
	
	file_put_contents ( $Request_Path . DS . "ActivationInfoXML.plist", $ActivationInfoDEC );
	
	$ActivationInfoDEC = $parser->parse ( $ActivationInfoDEC );
	
	extract ( $ActivationInfoDEC );
	
	// Get All Files Saved Correctly.
	unlink ( $Request_Path . DS . "deviceActivation_Ticket_Request.serialized" );
	rename ( $Request_Path . DS . "deviceActivation_Ticket_Request.json", $Request_Path . DS . $ProductType . "_" . $BuildVersion . "_" . "deviceActivation_Ticket_Request.json" );
	rename ( $Request_Path . DS . "activation-info.plist", $Request_Path . DS . $ProductType . "_" . $BuildVersion . "_" . "activation-info.plist" );
	rename ( $Request_Path . DS . "ActivationInfoXML.plist", $Request_Path . DS . $ProductType . "_" . $BuildVersion . "_" . "ActivationInfoXML.plist" );
	
	// This is an extremely needed check :).
	$Check_iDevice = Check_iDevice ( $ProductType );
	if ( $Check_iDevice == true )
	{
		if ( Get_Var_Exists ( 'SIMStatus' ) == true )
		{
			if ( Check_SIMStatus ( $SIMStatus ) )
			{
				$SIM_OK = true;
			}
			else
			{
				$SIM_OK = false;
			}
		}
		else
		{
			$SIM_OK = false;
		}
	}
	else
	{
		$SIM_OK = true;
	}
	
	// Get Device Type.
	if ( ( $DeviceClass == "iPhone" ) or ( strpos ( $ProductType, "iPhone" ) !== false ) )
	{
		$iDeviceType = "iPhone";
	}
	else
	{
		$iDeviceType = "iDevice";
	}
	
	// Get Started :).
	require_once ( ROOT . DS . 'doulCi.iDeviceCheck.php' );
}
else
{
	// Setting the Default Header Type.
	header ( CONTENT_TEXT );
	header ( "HTTP/1.0 404 Not Found" );
	echo "File Not Found";
	die ( );
}

ob_end_flush ( );
?>