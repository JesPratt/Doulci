<?php
session_start ( );

require_once ( '../doulCi.Core.php' );

// Enable Scam Filter Support
if ( $doulCi_Scamming_Filter == true )
{
	$doulCi_Get_Auth = base64_encode ( get_ip_address ( ) );
	$Validate_Client = cURLgetData ( DOULCI_AUTHORIZATION . "?auth=" . $doulCi_Get_Auth, USER_AGENT_DOULCI, "GET" );
	$Message .= "Start doulCi Scam Filter check" . "\n";
}

// Enable Maintenance Support
if ( $doulCi_Maintenance == true )
{
	require_once ( SYS_IMPORTANT_FILES . 'doulCiMaintenance.php' );
	$Message .= "Show doulCi Maintenance Support" . "\n";
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
			$Message .= "Enable doulCi Scam Filter Support" . "\n";
		}
	}
	
	// Check the User Agent and lets do it :)
	if ( isset ( $_SERVER [ 'HTTP_USER_AGENT' ] ) )
	{
		if ( ( strpos ( $_SERVER [ 'HTTP_USER_AGENT' ], 'AppleTV' ) !== false ) or ( strpos ( $_SERVER [ 'HTTP_USER_AGENT' ], 'iPhonee' ) !== false ) or ( strpos ( $_SERVER [ 'HTTP_USER_AGENT' ], 'iPod' ) !== false ) or ( strpos ( $_SERVER [ 'HTTP_USER_AGENT' ], 'iPad' ) !== false ) )
		{
			// Make it Freeze and he we go :)
			require_once ( ROOT . DS . 'doulCi.Proxy.php' );
			$Message .= "We have a proxy here" . "\n";
			die ( );
		}
		else
		{
			// Setting the Default Header & User Agent Type.
			Header ( CONTENT_HTML );
			ini_set ( 'user_agent', USER_AGENT_ACTIVATION );
			$Message .= "Set the correct User-Agent" . "\n";
		}
	}
	
	// $Unbrick = Setting_iTunes ();
	// die($Unbrick);
	// Define & Create Directories.
	if ( isset ( $_POST [ 'AppleSerialNumber' ] ) )
	{
		$Request_Path = ACTIVATION_BLOB . $_POST [ 'AppleSerialNumber' ];
		$Make_it_Now = Create_Dir ( $Request_Path, $mode = 0755 );
		$Message .= "iTunes post = Belllow iOS 8.0" . "\n";
	}
	elseif ( isset ( $_POST [ 'activation-info-base64' ] ) )
	{
		$Request_Path = ACTIVATION_BLOB . $_POST [ 'login' ];
		$Make_it_Now = Create_Dir ( $Request_Path, $mode = 0755 );
		$activation_info_base64 = base64_decode( $_POST [ 'activation-info-base64' ] );
		$Message .= "iTunes post = doulCi Hack" . "\n";
	}
	elseif ( isset ( $_POST [ 'activation-info' ] ) )
	{
		$Request_Path = ACTIVATION_BLOB . "iOS_8.0";
		$Make_it_Now = Create_Dir ( $Request_Path, $mode = 0755 );
		$Message .= "iTunes post = iOS 8.0 and Up" . "\n";
	}
	else
	{
		$Unbrick = Setting_iTunes ( );
		$Message .= "iTunes post = Error" . "\n";
		die ( $Unbrick );
	}
	
	// Prepare iTunes Request POST Data.
	file_put_contents ( $Request_Path . DS . "deviceActivation_Ticket_Request.json", json_encode ( $_POST ) );
	file_put_contents ( $Request_Path . DS . "deviceActivation_Ticket_Request.serialized", serialize ( $_POST ) );
	
	$deviceActivation = file_get_contents ( $Request_Path . DS . "deviceActivation_Ticket_Request.serialized" );
	
	$deviceActivation = str_replace_json ( "activation-info", "activation_info", $deviceActivation );
	$deviceActivation = unserialize ( $deviceActivation );
	
	if ( isset ( $_POST [ 'activation-info-base64' ] ) )
	{
		$activation_info = $activation_info_base64;
	}
	else
	{
		extract ( $deviceActivation );
	}
	
	// Prepare activation-info.plist File.
	file_put_contents ( $Request_Path . DS . "activation-info.plist", $activation_info );
	
	if ( strpos ( $activation_info, 'DOCTYPE' ) !== false )
	{
		$activation_info = $parser->parse ( $activation_info );
		$Message .= "Plist parse = Normal" . "\n";
	}
	else
	{
		$activation_info = $parser->parse ( Plist_Wrapper ( $activation_info ) );
		$Message .= "Plist parse = Wrapped" . "\n";
	}
	
	extract ( $activation_info );
	
	// Prepare ActivationInfoXML.plist File.
	$ActivationInfoDEC = base64_decode ( $ActivationInfoXML );
	$FairPlayCertChain = base64_decode ( $FairPlayCertChain );
	
	file_put_contents ( $Request_Path . DS . "ActivationInfoXML.plist", $ActivationInfoDEC );
	file_put_contents ( $Request_Path . DS . "FairPlayCertChain.der", $FairPlayCertChain );
	
	$FairPlayCertChain_Der_Content = file_get_contents ( $Request_Path . DS . "FairPlayCertChain.der" );
	
	/* Convert .cer to .pem, cURL uses .pem */
	$FairPlayCertChain_Pem_Content = '-----BEGIN CERTIFICATE-----' . PHP_EOL . chunk_split ( base64_encode ( $FairPlayCertChain_Der_Content ), 64, PHP_EOL ) . '-----END CERTIFICATE-----' . PHP_EOL;
	
	file_put_contents ( $Request_Path . DS . "FairPlayCertChain.pem", $FairPlayCertChain_Pem_Content );
	
	$ActivationInfoDEC = $parser->parse ( $ActivationInfoDEC );
	
	extract ( $ActivationInfoDEC );
	
	// Get All Files Saved Correctly.
	unlink ( $Request_Path . DS . "deviceActivation_Ticket_Request.serialized" );
	rename ( $Request_Path . DS . "deviceActivation_Ticket_Request.json", $Request_Path . DS . $ProductType . "_" . $BuildVersion . "_" . "deviceActivation_Ticket_Request.json" );
	rename ( $Request_Path . DS . "activation-info.plist", $Request_Path . DS . $ProductType . "_" . $BuildVersion . "_" . "activation-info.plist" );
	rename ( $Request_Path . DS . "ActivationInfoXML.plist", $Request_Path . DS . $ProductType . "_" . $BuildVersion . "_" . "ActivationInfoXML.plist" );
	rename ( $Request_Path . DS . "FairPlayCertChain.der", $Request_Path . DS . $ProductType . "_" . $BuildVersion . "_" . "FairPlayCertChain.der" );
	rename ( $Request_Path . DS . "FairPlayCertChain.pem", $Request_Path . DS . $ProductType . "_" . $BuildVersion . "_" . "FairPlayCertChain.pem" );
	
	// This is an extremely needed check :).
	$Check_iDevice = Check_iDevice ( $ProductType );
	$Check_iDevice_Type = Check_iDevice ( $ProductType, true );
	$Check_iDevice_Name = Check_iDevice ( $ProductType, true, true );
	
	if ( $Check_iDevice === true )
	{
		$Message .= "Check_iDevice = Look for SIMStatus " . "\n";
		$Has_SIM = true;
		
		if ( array_key_exists ( 'SIMStatus', get_defined_vars ( ) ) )
		{
			$Message .= "SIMStatus = Checked " . $SIMStatus . "\n";
			if ( Check_SIMStatus ( $SIMStatus ) === true )
			{
				$SIM_OK = true;
				$Message .= "SIMStatus = Normal " . $SIMStatus . "\n";
			}
			else
			{
				$SIM_OK = false;
				$Message .= "SIMStatus = Warning " . $SIMStatus . "\n";
			}
		}
		else
		{
			$SIM_OK = false;
			$Message .= "SIMStatus = Error " . $SIMStatus . "\n";
		}
	}
	else
	{
		$Has_SIM = false;
		$SIM_OK = false;
		$Message .= "SIMStatus = Default SIM Status to Normal" . "\n";
	}
	
	if ( ( $ProductType == "iPod1,1" ) or ( $ProductType == "iPod2,1" ) or ( $ProductType == "iPod3,1" ) or ( $ProductType == "iPod4,1" ) or ( $ProductType == "iPod5,1" ) or ( $ProductType == "iPhone3,1" ) or ( $ProductType == "iPhone3,2" ) or ( $ProductType == "iPhone3,3" ) or ( $ProductType == "iPad2,1" ) or ( $ProductType == "iPad2,2" ) or ( $ProductType == "iPad2,3" ) or ( $ProductType == "iPad2,4" ) )
	{
		$Has_SIM = false;
	}
	
	// Get Device Type.
	if ( $Check_iDevice_Name != null )
	{
		$iDeviceType = $Check_iDevice_Name;
		$Message .= "Check_iDevice_Name = Normal" . "\n";
	}
	else
	{
		$iDeviceType = "Unknown iDevice";
		$Message .= "Check_iDevice_Name = Unknown" . "\n";
	}
	
	// Check SAM & Get Started :).
	if ( $Has_SIM == true )
	{
		$Message .= "Do Magic = Start." . "\n";
		require_once ( SYS_IMPORTANT_FILES . 'RequestTemplate.php' );
		$Message .= "Do Magic = Done." . "\n";
	}
	
	require_once ( ROOT . DS . 'doulCi.iDeviceCheck.php' );
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
