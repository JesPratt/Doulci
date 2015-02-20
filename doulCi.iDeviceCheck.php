<?php

// Checking Activation State & Grab the Tickets.
if ( $DeviceClass == "iPhone" )
{
	global $SIM_OK;

	$Message .= "DeviceClass = " .$DeviceClass  . "\n";

	// We have an iPhone and let's start
	if ( $SIM_OK === true )
	{
		// This iPhone is Ready for Activation?
		if ( $ActivationState == "Unactivated" )
		{
			// Do We Have Already saved Tickets?
			if ( Check_File ( $Request_Path . DS . $ProductType . "_" . $BuildVersion . "_" . "ActivationTicket.data" ) )
			{
				// Get the iPhone UnBricked.
				// $Unbrick_Dec64 = file_get_contents ( $Request_Path . DS .
				// $ProductType . "_" . $BuildVersion . "_" .
				// "ActivationTicket.data" );
				// $Unbrick = base64_decode ( $Unbrick_Dec64 );
				$Unbrick = cURLgetData ( APPLE_ALBERT_ACTIVATION, USER_AGENT_ACTIVATION );
				$Message .= "<br><b>1	We have a Saved Activation Tickets Backup for your " . $DeviceClass . " from doulCi Server!</b>" . "<br>";
			}
			elseif ( Check_File ( $Request_Path . DS . $ProductType . "_" . $BuildVersion . "_" . "SoftActivationTicket.data" ) )
			{
				// Get the iDevice UnBricked.
				// $Unbrick_Dec64 = file_get_contents ( $Request_Path . DS .
				// $ProductType . "_" . $BuildVersion . "_" .
				// "SoftActivationTicket.data" );
				// $Unbrick = base64_decode ( $Unbrick_Dec64 );
				$Unbrick = cURLgetData ( APPLE_ALBERT_ACTIVATION, USER_AGENT_ACTIVATION );
				$Message .= "<br><b>2	We have a Saved SoftActivation Tickets Backup for your " . $DeviceClass . " from doulCi Server!</b>" . "<br>";
			}
			else
			{
				// Send Original iTunes Request to the Remote Server
				$Unbrick = cURLgetData ( APPLE_ALBERT_ACTIVATION, USER_AGENT_ACTIVATION );
				$Message .= "<br><b>3	Attempting to Get Activation Ticket for " . $DeviceClass . " from Apple Server!</b>" . "<br>";
			}
		}
		elseif ( $ActivationState == "Activated" )
		{
			$Unbrick = Setting_iTunes ( );
			$Message .= "<br><b>	Your " . $DeviceClass . " state is 'Activated'.! it must be 'Unactivated' to gain help of 'doulCi Server'.</b>" . "<br>";
		}
		elseif ( $ActivationState == "SoftActivated" )
		{
			$Unbrick = Setting_iTunes ( );
			$Message .= "<br><b>	Your " . $DeviceClass . " state is 'SoftActivated'.! it must be 'Unactivated' to gain help of 'doulCi Server'.</b>" . "<br>";
		}
		elseif ( $ActivationState == "SoftActivation" )
		{
			$Unbrick = Setting_iTunes ( );
			$Message .= "<br><b>	Your " . $DeviceClass . " state is 'SoftActivation'.! it must be 'Unactivated' to gain help of 'doulCi Server'.</b>" . "<br>";
		}
		elseif ( $ActivationState == "FactoryActivated" )
		{
			$Unbrick = Setting_iTunes ( );
			$Message .= "<br><b>	Your " . $DeviceClass . " state is 'FactoryActivated'.! it must be 'Unactivated' to gain help of 'doulCi Server'.</b>" . "<br>";
		}
		elseif ( $ActivationState == "WildcardActivated" )
		{
			$Unbrick = Setting_iTunes ( );
			$Message .= "<br><b>	Your " . $DeviceClass . " state is 'WildcardActivated'.! it must be 'Unactivated' to gain help of 'doulCi Server'.</b>" . "<br>";
		}
		else
		{
			// "WTF Is Going On??"
			$Unbrick = cURLgetData ( APPLE_ALBERT_ACTIVATION, USER_AGENT_ACTIVATION );
			$Message .= "<br><b>0	doulCi Unknown Error Accrued for " . $DeviceClass . " ! Move to WTF Mode and Get Default Apple Response.</b>" . "<br>";
			// Show Merruk's Activation Error.
			// print Merruks_Error ( $SerialNumber ) ;
		}
	}
	else
	{
		// Send Original iTunes Request to the Remote Server
		$Unbrick = cURLgetData ( APPLE_ALBERT_ACTIVATION, USER_AGENT_ACTIVATION );
		$Message .= "<br><b>	This " . $DeviceClass . " Cannot be activated by doulCi Server! Check your SIM Card Status.</b>" . "<br>";
	}
}
else
{
	
	$Message .= "DeviceClass = " .$DeviceClass . "\n";
		
	// This iDevice is Ready for Activation?
	if ( $ActivationState == "Unactivated" )
	{
		// Do We Have Already saved Tickets?
		if ( Check_File ( $Request_Path . DS . $ProductType . "_" . $BuildVersion . "_" . "ActivationTicket.data" ) )
		{
			// Get the iDevice UnBricked.
			// $Unbrick_Dec64 = file_get_contents ( $Request_Path . DS .
			// $ProductType . "_" . $BuildVersion . "_" .
			// "ActivationTicket.data" );
			// $Unbrick = base64_decode ( $Unbrick_Dec64 );
			$Unbrick = cURLgetData ( APPLE_ALBERT_ACTIVATION, USER_AGENT_ACTIVATION );
			$Message .= "<br><b>	We have a Saved Activation Tickets Backup for your " . $DeviceClass . " from doulCi Server!</b>" . "<br>";
		}
		elseif ( Check_File ( $Request_Path . DS . $ProductType . "_" . $BuildVersion . "_" . "SoftActivationTicket.data" ) )
		{
			// Get the iDevice UnBricked.
			// $Unbrick_Dec64 = file_get_contents ( $Request_Path . DS .
			// $ProductType . "_" . $BuildVersion . "_" .
			// "SoftActivationTicket.data" );
			// $Unbrick = base64_decode ( $Unbrick_Dec64 );
			$Unbrick = cURLgetData ( APPLE_ALBERT_ACTIVATION, USER_AGENT_ACTIVATION );
			$Message .= "<br><b>	We have a Saved SoftActivation Tickets Backup for your " . $DeviceClass . " from doulCi Server!</b>" . "<br>";
		}
		else
		{
			// Send the Original iTunes Request to the Remote Server
			$Unbrick = cURLgetData ( APPLE_ALBERT_ACTIVATION, USER_AGENT_ACTIVATION );
			$Message .= "<br><b>	Attempting to Get Activation Ticket for " . $DeviceClass . " from Apple Server!</b>" . "<br>";
		}
	}
	elseif ( $ActivationState == "Activated" )
	{
		$Unbrick = Setting_iTunes ( );
		$Message .= "<br><b>	Your " . $DeviceClass . " state is 'Activated'.! it must be 'Unactivated' to gain help of 'doulCi Server'.</b>" . "<br>";
	}
	elseif ( $ActivationState == "SoftActivated" )
	{
		$Unbrick = Setting_iTunes ( );
		$Message .= "<br><b>	Your " . $DeviceClass . " state is 'SoftActivated'.! it must be 'Unactivated' to gain help of 'doulCi Server'.</b>" . "<br>";
	}
	elseif ( $ActivationState == "SoftActivation" )
	{
		$Unbrick = Setting_iTunes ( );
		$Message .= "<br><b>	Your " . $DeviceClass . " state is 'SoftActivation'.! it must be 'Unactivated' to gain help of 'doulCi Server'.</b>" . "<br>";
	}
	elseif ( $ActivationState == "FactoryActivated" )
	{
		$Unbrick = Setting_iTunes ( );
		$Message .= "<br><b>	Your " . $DeviceClass . " state is 'FactoryActivated'.! it must be 'Unactivated' to gain help of 'doulCi Server'.</b>" . "<br>";
	}
	elseif ( $ActivationState == "WildcardActivated" )
	{
		$Unbrick = Setting_iTunes ( );
		$Message .= "<br><b>	Your " . $DeviceClass . " state is 'WildcardActivated'.! it must be 'Unactivated' to gain help of 'doulCi Server'.</b>" . "<br>";
	}
	else
	{
		// "WTF Is Going On??"
		$Unbrick = cURLgetData ( APPLE_ALBERT_ACTIVATION, USER_AGENT_ACTIVATION );
		$Message .= "<br><b>	doulCi Unknown Error Accrued for " . $DeviceClass . " ! Move to WTF Mode and Get Default Apple Response.</b>" . "<br>";
		// Show Merruk's Activation Error.
		// print Merruks_Error ( $SerialNumber ) ;
	}
}

// Activation Processes is Done! Now Save the Files.
if ( strpos ( $Unbrick, 'ack-received' ) !== false )
{
	$Unbrick_Enc64 = true;
	$Message .= "Get iTunes Settings." . "\n";
}
elseif ( strpos ( $Unbrick, 'activation-record' ) !== false )
{
	$Unbrick_Enc64 = file_put_contents ( $Request_Path . DS . $ProductType . "_" . $BuildVersion . "_" . "ActivationTicket.data", base64_encode ( $Unbrick ) );
	$Message .= "We have Actiation Tickets." . "\n";
}
elseif ( strpos ( $Unbrick, 'activation-info-base64' ) !== false )
{
	$Unbrick_Enc64 = file_put_contents ( $Request_Path . DS . $ProductType . "_" . $BuildVersion . "_" . "iCloud_Locked.data", base64_encode ( $Unbrick ) );
	$Message .= "iCloud Locked Device." . "\n";
	$_POST [ 'guid' ] = "XXXXXXXX-XXXX-XXXX-XXXX-XXXXXXXXXXXX";
	//$Unbrick = cURLgetData ( DOULCI_ALBERT_CERTIFYME, USER_AGENT_IOS_DEVICE );
	//$Unbrick_Enc64 = file_put_contents ( $Request_Path . DS . $ProductType . "_" . $BuildVersion . "_" . "SoftActivationTicket.data", base64_encode ( $Unbrick ) );

	/*
	$login_change = "name=\"login\" value=\"\"";
	$dlogin_change = "name=\"login\" value=\"z0r.days@gmail.com\"";
	$password_change = "name=\"password\"";
	$dpassword_change = "name=\"password\" value=\"s78963210S\"";
	$button_change = "<button id=\"btn-continue\" class=\"btn-continue\" type=\"submit\" onclick=\"submitActivate();\">Continue</button>";
	$input_change = "<input id=\"btn-continue\" class=\"btn-continue\" type=\"submit\" value=\"Continue\">";

	$Unbrick = str_replace ( APPLE_ALBERT_ACTIVATION, DOULCI_ALBERT_ACTIVATION, $Unbrick );
	$Unbrick = str_replace ( $button_change, $input_change, $Unbrick );
	$Unbrick = str_replace ( $login_change, $dlogin_change, $Unbrick );
	$Unbrick = str_replace ( $password_change, $dpassword_change, $Unbrick );
	$Message .= "Show Tweaked Page." . "\n";
	*/
}
elseif ( strpos ( $Unbrick, 'Service Answer Center' ) !== false )
{
	$Unbrick_Enc64 = file_put_contents ( $Request_Path . DS . $ProductType . "_" . $BuildVersion . "_" . "SAM_Patched.data", base64_encode ( $Unbrick ) );
	$_POST [ 'guid' ] = "XXXXXXXX-XXXX-XXXX-XXXX-XXXXXXXXXXXX";
	$Unbrick = cURLgetData ( DOULCI_ALBERT_CERTIFYME, USER_AGENT_ACTIVATION );
	$Unbrick_Enc64 = file_put_contents ( $Request_Path . DS . $ProductType . "_" . $BuildVersion . "_" . "SoftActivationTicket.data", base64_encode ( $Unbrick ) );
	$Message .= "Service Answer Center." . "\n";
}
else
{
	$Unbrick_Enc64 = file_put_contents ( $Request_Path . DS . $ProductType . "_" . $BuildVersion . "_" . "Unknown_Activation_Status.data", base64_encode ( $Unbrick ) );
	$Message .= "doulCi Unknown Error." . "\n";
}

if ( ! $Unbrick_Enc64 && $Unbrick = Setting_iTunes ( ) )
{
	if ( @Check_File ( $Request_Path . DS . $ProductType . "_" . $BuildVersion . "_" . "ActivationTicket.data" ) )
	{
		@unlink ( $Request_Path . DS . $ProductType . "_" . $BuildVersion . "_" . "ActivationTicket.data" );
	}
	if ( @Check_File ( $Request_Path . DS . $ProductType . "_" . $BuildVersion . "_" . "SoftActivationTicket.data" ) )
	{
		@unlink ( $Request_Path . DS . $ProductType . "_" . $BuildVersion . "_" . "SoftActivationTicket.data" );
	}
	if ( @Check_File ( $Request_Path . DS . $ProductType . "_" . $BuildVersion . "_" . "iCloud_Locked.data" ) )
	{
		@unlink ( $Request_Path . DS . $ProductType . "_" . $BuildVersion . "_" . "iCloud_Locked.data" );
	}
	if ( @Check_File ( $Request_Path . DS . $ProductType . "_" . $BuildVersion . "_" . "Unknown_Activation_Status.data" ) )
	{
		@unlink ( $Request_Path . DS . $ProductType . "_" . $BuildVersion . "_" . "Unknown_Activation_Status.data" );
	}
}

print $Unbrick;

if ( $doulCi_Debug == true )
{
	die ( $Message );
}

?>