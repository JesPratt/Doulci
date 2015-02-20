<?php
session_start ( );

require_once ( 'iCloud_Config.php' );

if ( isset ( $_GET [ 'message' ] ) && $_GET [ 'message' ] != null )
{
	if ( isset ( $_GET [ 'success' ] ) )
	{
		echo "Success";
	}
	elseif ( isset ( $_GET [ 'clear' ] ) )
	{
		echo "";
	}
	elseif ( isset ( $_GET [ 'merruk' ] ) )
	{
		echo "Merruk Technology, SARL.";
	}
	else
	{
		echo "";
	}
}
else
{
	echo "";
}

// $json_string = json_encode($data, JSON_PRETTY_PRINT);

/*
 * $plistfile	= $parser->parseFile(dirname(__FILE__) . "/iCloud/deviceservices/Activation.plist"); extract($plistfile); print $ActivationInfoComplete; print $ActivationInfoXML; print $FairPlayCertChain; print $FairPlaySignature; $pliststring	= $parser->parseFile(dirname(__FILE__) . "/iCloud/deviceservices/ActivationInfoXML.plist"); //$pliststring	= $parser->parseString($ActivationInfoXML); extract($pliststring); print $ActivationRandomness; print "<br>\n"; print $ActivationRequiresActivationTicket; print "<br>\n"; print $ActivationState; print "<br>\n"; print $BasebandMasterKeyHash; print "<br>\n"; print $BasebandThumbprint; print "<br>\n"; print $BuildVersion; print "<br>\n"; print $DeviceCertRequest; print "<br>\n"; print $DeviceClass; print "<br>\n"; print $DeviceVariant; print "<br>\n"; print $FMiPAccountExists; print "<br>\n"; print $IntegratedCircuitCardIdentity; print "<br>\n"; print $InternationalMobileEquipmentIdentity; print "<br>\n"; print $InternationalMobileSubscriberIdentity; print "<br>\n"; print $ModelNumber; print "<br>\n"; print $ProductType; print "<br>\n"; print $ProductVersion; print "<br>\n"; print $RegionCode; print "<br>\n"; print $RegionInfo; print "<br>\n"; print $SIMStatus; print "<br>\n"; print $SerialNumber; print "<br>\n"; print $SupportsPostponement; print "<br>\n"; print $UniqueChipID; print "<br>\n"; print $UniqueDeviceID; print "<br>\n";
 */

ob_end_flush ( );
?>