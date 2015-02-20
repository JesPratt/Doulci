<?php
/*
 * doulCi Project RequestTemplate File.
*/
include ( PHP_SEC_LIB . 'File/X509.php' );
include ( PHP_SEC_LIB . 'Crypt/RSA.php' );

// Global Changes.
// $BuildVersion = "11A4372q"; //"9B206";
// $ProductVersion = "7.0"; //"5.1.1";
// $ReleaseType = "Beta";

// SAM Changes.
// $IntegratedCircuitCardIdentity = "8931440300478595291";
// $InternationalMobileSubscriberIdentity = "";
// $kCTPostponementInfoPRIVersion = "0.1.9";
// $kCTPostponementInfoPRLName = "0";
/*
if ( ( $DeviceClass == "iPhone" ) and ( $Has_SIM == true ) )
{
	$iDeviceType = $iDeviceType;
	
	// SAM Infos
	if ( $ProductType == "iPhone4,1" )
	{
		$InternationalMobileEquipmentIdentity = "013055004571989";
		$SerialNumber = "DNVHCXPLDTC0";
		// $UniqueDeviceID = "359c33dd4852a384bb7fca991de989bf304db224";
		$UniqueChipID = "2163725999497";
		$ModelNumber = "MD235";
		$RegionCode = "ES";
		$RegionInfo = "Y/A";
	}
	if ( $ProductType == "iPhone5,1" )
	{
		$InternationalMobileEquipmentIdentity = "013425008266938";
		$SerialNumber = "DNVK5JJ1DTTP";
		// $UniqueDeviceID = "843f90934deb4b12c4b3bb77eb703b272c4afb2c";
		$UniqueChipID = "2219342347695";
		$ModelNumber = "MD294";
		$RegionCode = "MX";
		$RegionInfo = "E/A";
	}
	if ( $ProductType == "iPhone5,2" )
	{
		$InternationalMobileEquipmentIdentity = "013728000595083";
		$SerialNumber = "DQGLF9P7DTWD";
		// $UniqueDeviceID = "3a8ca3e1048bec214382fc3b389d1ece38844dc8";
		$UniqueChipID = "3411076653865";
		$ModelNumber = "ND297";
		$RegionCode = "GB";
		$RegionInfo = "B/A";
	}
	elseif ( $ProductType == "iPhone5,3" )
	{
		$InternationalMobileEquipmentIdentity = "357991055356660";
		$SerialNumber = "F78LCURBFNLQ";
		// $UniqueDeviceID = "05801427d87bed74e81fe25d26ddc1c86ee4a4b0";
		$UniqueChipID = "4028176204616";
		$ModelNumber = "MF364";
		$RegionCode = "CN";
		$RegionInfo = "CH/A";
	}
	elseif ( $ProductType == "iPhone6,1" )
	{
		$InternationalMobileEquipmentIdentity = "013880003866795";
		$SerialNumber = "DNPLPXSXFF9R";
		// $UniqueDeviceID = "f63d8324ee7bb10dcd9b721bee2e40a1a54da29b";
		$UniqueChipID = "4897531615888";
		$ModelNumber = "ME323";
		$RegionCode = "US";
		$RegionInfo = "LL/A";
	}
	elseif ( $ProductType == "iPhone6,2" )
	{
		$InternationalMobileEquipmentIdentity = "358826055609412";
		$SerialNumber = "F93M91ARFFG9";
		// $UniqueDeviceID = "4d9502afd0cd6ba52f32624706f6d813ea6a8cee";
		$UniqueChipID = "7378929178192";
		$ModelNumber = "NE433";
		$RegionCode = "DE";
		$RegionInfo = "DN/A";
	}
	else
	{
		// iPhone3,1
		$InternationalMobileEquipmentIdentity = "012655003889364";
		$SerialNumber = "85112SVNA4S";
		// $UniqueDeviceID = "e1f8d9179d4a0867bc45efdf023e57e6bb9bb147";
		$UniqueChipID = "1161941087565";
		$ModelNumber = "MC603";
		$RegionCode = "DE";
		$RegionInfo = "DN/A";
	}
}
elseif ( ( $DeviceClass == "iPad" ) and ( $Has_SIM == true ) )
{
	$iDeviceType = $iDeviceType;
	
	// SAM Infos
	if ( $ProductType == "iPad2,7" )
	{
		$InternationalMobileEquipmentIdentity = "990001344168737";
		$SerialNumber = "DLXK51XBF19P";
		// $UniqueDeviceID = "d48b02fc0102c9f54579c3d8c909b2ee7780fa91";
		$UniqueChipID = "594032255821";
		$ModelNumber = "MD545";
		$RegionCode = "HK";
		$RegionInfo = "ZP/A";
	}
	if ( $ProductType == "iPad3,3" )
	{
		$InternationalMobileEquipmentIdentity = "013314000421032";
		$SerialNumber = "DYTJ2P84DVGH";
		// $UniqueDeviceID = "dead75ed947421402906cd64778b6930c3fd76f0";
		$UniqueChipID = "65833968424";
		$ModelNumber = "MD367";
		$RegionCode = "FR";
		$RegionInfo = "NF/A";
	}
	if ( $ProductType == "iPad3,3" )
	{
		$InternationalMobileEquipmentIdentity = "8921202100108230833";
		$SerialNumber = "DYTHL7YVDVGM";
		// $UniqueDeviceID = "ee40ea423016318ec9e56923cf7b91c667c65043";
		$UniqueChipID = "2312974353192";
		$ModelNumber = "MD371";
		$RegionCode = "TW";
		$RegionInfo = "TY/A";
	}
	if ( $ProductType == "iPhone6,2" )
	{
		$InternationalMobileEquipmentIdentity = "358826055609412";
		$SerialNumber = "F93M91ARFFG9";
		// $UniqueDeviceID = "4d9502afd0cd6ba52f32624706f6d813ea6a8cee";
		$UniqueChipID = "7378929178192";
		$ModelNumber = "NE433";
		$RegionCode = "DE";
		$RegionInfo = "DN/A";
	}
	else
	{
		// SAM Infos
		$InternationalMobileEquipmentIdentity = "013314000421032";
		$SerialNumber = "DYTJ2P84DVGH";
		// $UniqueDeviceID = "dead75ed947421402906cd64778b6930c3fd76f0";
		$UniqueChipID = "65833968424";
		$ModelNumber = "MD367";
		$RegionCode = "FR";
		$RegionInfo = "NF/A";
	}
}
else
{
	// This is for other iDevices {NO SIM} they shouldnt have Baseband related
	// imei etc...
	$iDeviceType = $iDeviceType;
}
*/
// ActivationInfoXML & CertificateInfoXML Template.
$Request_Albert = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
$Request_Albert .= '<!DOCTYPE plist PUBLIC "-//Apple//DTD PLIST 1.0//EN" "http://www.apple.com/DTDs/PropertyList-1.0.dtd">' . "\n";
$Request_Albert .= '<plist version="1.0">' . "\n";
$Request_Albert .= '<dict>' . "\n";
$Request_Albert .= '	<key>ActivationRandomness</key>' . "\n";
$Request_Albert .= '	<string>' . $ActivationRandomness . '</string>' . "\n";
$Request_Albert .= '	<key>ActivationRequiresActivationTicket</key>' . "\n";
$Request_Albert .= '	<true/>' . "\n";
$Request_Albert .= '	<key>ActivationState</key>' . "\n";
$Request_Albert .= '	<string>' . $ActivationState . '</string>' . "\n";
if ( array_key_exists ( 'BasebandActivationTicketVersion', get_defined_vars ( ) ) )
{
	$Request_Albert .= '	<key>BasebandActivationTicketVersion</key>' . "\n";
	$Request_Albert .= '	<string>' . $BasebandActivationTicketVersion . '</string>' . "\n";
}
if ( array_key_exists ( 'BasebandChipID', get_defined_vars ( ) ) )
{
	$Request_Albert .= '	<key>BasebandChipID</key>' . "\n";
	$Request_Albert .= '	<integer>' . $BasebandChipID . '</integer>' . "\n";
}
if ( array_key_exists ( 'BasebandMasterKeyHash', get_defined_vars ( ) ) )
{
	$Request_Albert .= '	<key>BasebandMasterKeyHash</key>' . "\n";
	$Request_Albert .= '	<string>' . $BasebandMasterKeyHash . '</string>' . "\n";
}
if ( array_key_exists ( 'BasebandSerialNumber', get_defined_vars ( ) ) )
{
	$Request_Albert .= '	<key>BasebandSerialNumber</key>' . "\n";
	$Request_Albert .= '	<data>' . $BasebandSerialNumber . '</data>' . "\n";
}
if ( array_key_exists ( 'BasebandThumbprint', get_defined_vars ( ) ) )
{
	$Request_Albert .= '	<key>BasebandThumbprint</key>' . "\n";
	$Request_Albert .= '	<string>' . $BasebandThumbprint . '</string>' . "\n";
}
$Request_Albert .= '	<key>BuildVersion</key>' . "\n";
$Request_Albert .= '	<string>' . $BuildVersion . '</string>' . "\n";
$Request_Albert .= '	<key>DeviceCertRequest</key>' . "\n";
$Request_Albert .= '	<data>' . $DeviceCertRequest . '</data>' . "\n";
$Request_Albert .= '	<key>DeviceClass</key>' . "\n";
$Request_Albert .= '	<string>' . $DeviceClass . '</string>' . "\n";
if ( array_key_exists ( 'DeviceVariant', get_defined_vars ( ) ) )
{
	$Request_Albert .= '	<key>DeviceVariant</key>' . "\n";
	$Request_Albert .= '	<string>' . $DeviceVariant . '</string>' . "\n";
}
if ( array_key_exists ( 'FMiPAccountExists', get_defined_vars ( ) ) )
{
	$Request_Albert .= '	<key>FMiPAccountExists</key>' . "\n";
	$Request_Albert .= '	<false/>' . "\n";
}
if ( array_key_exists ( 'IntegratedCircuitCardIdentity', get_defined_vars ( ) ) )
{
	$Request_Albert .= '	<key>IntegratedCircuitCardIdentity</key>' . "\n";
	$Request_Albert .= '	<string>' . $IntegratedCircuitCardIdentity . '</string>' . "\n";
}
if ( array_key_exists ( 'InternationalMobileEquipmentIdentity', get_defined_vars ( ) ) )
{
	$Request_Albert .= '	<key>InternationalMobileEquipmentIdentity</key>' . "\n";
	$Request_Albert .= '	<string>' . $InternationalMobileEquipmentIdentity . '</string>' . "\n";
}
if ( array_key_exists ( 'InternationalMobileSubscriberIdentity', get_defined_vars ( ) ) )
{
	$Request_Albert .= '	<key>InternationalMobileSubscriberIdentity</key>' . "\n";
	$Request_Albert .= '	<string>' . $InternationalMobileSubscriberIdentity . '</string>' . "\n";
}
$Request_Albert .= '	<key>ModelNumber</key>' . "\n";
$Request_Albert .= '	<string>' . $ModelNumber . '</string>' . "\n";
$Request_Albert .= '	<key>ProductType</key>' . "\n";
$Request_Albert .= '	<string>' . $ProductType . '</string>' . "\n";
$Request_Albert .= '	<key>ProductVersion</key>' . "\n";
$Request_Albert .= '	<string>' . $ProductVersion . '</string>' . "\n";
if ( array_key_exists ( 'RegionCode', get_defined_vars ( ) ) )
{
	$Request_Albert .= '	<key>RegionCode</key>' . "\n";
	$Request_Albert .= '	<string>' . $RegionCode . '</string>' . "\n";
}
if ( array_key_exists ( 'RegionInfo', get_defined_vars ( ) ) )
{
	$Request_Albert .= '	<key>RegionInfo</key>' . "\n";
	$Request_Albert .= '	<string>' . $RegionInfo . '</string>' . "\n";
}
if ( array_key_exists ( 'RegulatoryModelNumber', get_defined_vars ( ) ) )
{
	$Request_Albert .= '	<key>RegulatoryModelNumber</key>' . "\n";
	$Request_Albert .= '	<string>' . $RegulatoryModelNumber . '</string>' . "\n";
}
if ( array_key_exists ( 'ReleaseType', get_defined_vars ( ) ) )
{
	$Request_Albert .= '	<key>ReleaseType</key>' . "\n";
	$Request_Albert .= '	<string>' . $ReleaseType . '</string>' . "\n";
}
if ( array_key_exists ( 'SIMGID1', get_defined_vars ( ) ) )
{
	$Request_Albert .= '	<key>SIMGID1</key>' . "\n";
	$Request_Albert .= '	<data>' . $SIMGID1 . '</data>' . "\n";
}
if ( array_key_exists ( 'SIMGID2', get_defined_vars ( ) ) )
{
	$Request_Albert .= '	<key>SIMGID2</key>' . "\n";
	$Request_Albert .= '	<data>' . $SIMGID2 . '</data>' . "\n";
}
if ( array_key_exists ( 'SIMStatus', get_defined_vars ( ) ) )
{
	$Request_Albert .= '	<key>SIMStatus</key>' . "\n";
	$Request_Albert .= '	<string>' . $SIMStatus . '</string>' . "\n";
}
$Request_Albert .= '	<key>SerialNumber</key>' . "\n";
$Request_Albert .= '	<string>' . $SerialNumber . '</string>' . "\n";
if ( array_key_exists ( 'SupportsPostponement', get_defined_vars ( ) ) )
{
	$Request_Albert .= '	<key>SupportsPostponement</key>' . "\n";
	$Request_Albert .= '	<true/>' . "\n";
}
if ( array_key_exists ( 'UniqueChipID', get_defined_vars ( ) ) )
{
	$Request_Albert .= '	<key>UniqueChipID</key>' . "\n";
	$Request_Albert .= '	<integer>' . $UniqueChipID . '</integer>' . "\n";
}
if ( array_key_exists ( 'UniqueDeviceID', get_defined_vars ( ) ) )
{
	$Request_Albert .= '	<key>UniqueDeviceID</key>' . "\n";
	$Request_Albert .= '	<string>' . $UniqueDeviceID . '</string>' . "\n";
}
if ( array_key_exists ( 'kCTPostponementInfoPRIVersion', get_defined_vars ( ) ) )
{
	$Request_Albert .= '	<key>kCTPostponementInfoPRIVersion</key>' . "\n";
	$Request_Albert .= '	<string>' . $kCTPostponementInfoPRIVersion . '</string>' . "\n";
}
if ( array_key_exists ( 'kCTPostponementInfoPRLName', get_defined_vars ( ) ) )
{
	$Request_Albert .= '	<key>kCTPostponementInfoPRLName</key>' . "\n";
	$Request_Albert .= '	<integer>' . $kCTPostponementInfoPRLName . '</integer>' . "\n";
}
$Request_Albert .= '</dict>' . "\n";
$Request_Albert .= '</plist>';

// Fetch iPhoneActivation Certificate's Private Key.
//$AccountCertificate = file_get_contents ( "certs" . DS . "iPhoneActivation.pem" );
//$iPhoneActivationVect = openssl_pkey_get_details ( openssl_pkey_get_public ( $AccountCertificate ) );
//$iPhoneActivationPublicKey = $iPhoneActivationVect [ 'key' ];
//$AccountTokenCertificate = base64_encode ( $AccountCertificate );
//$iPhoneActivationPublicKeyPrivateKey = openssl_pkey_get_private ( file_get_contents ( "certs" . DS . "iPhoneActivation_private.key" ) );



$iPhoneDeviceCA_private = file_get_contents ( $FairplayFile );
$CA_Key = new Crypt_RSA ( );
$CA_Key->loadKey ( $iPhoneDeviceCA_private );
$iPhoneDeviceCA = file_get_contents ( $FairplayFile );
$haha = $CA_Key->getPrivateKey ( $iPhoneDeviceCA_private );
print_r($haha);
$CA_Certificate = new File_X509 ( );
//$haha = $CA_Certificate->setPrivateKey ( $CA_Key );
//$haha = $CA_Certificate->getPrivateKey ( $CA_Key );
//print_r($haha);
//$CA_Certificate->loadX509 ( $iPhoneDeviceCA );
	//$test = $CA_Certificate->loadX509($CA_Certificate->saveX509($CA_Certificate->sign($CA_Certificate, $Request_Albert)));
	//$Certificate = $CA_Certificate->saveX509($test);
	//echo $test;
// Sign the AccountTocken.
//$StringSignature = "";
//openssl_sign ( $Request_Albert, $StringSignature, $iPhoneActivationPublicKeyPrivateKey );
//$FairPlaySignature = base64_encode ( $StringSignature );

// activation-info-base64 decoded version template , activation-info & certify-me-info template.
$Request_Info = '<dict>' . "\n";
$Request_Info .= '	<key>ActivationInfoComplete</key>' . "\n";
$Request_Info .= '	<true/>' . "\n";
$Request_Info .= '	<key>ActivationInfoXML</key>' . "\n";
$Request_Info .= '	<data>' . "\n";
$Request_Info .= '	' . chunk_split ( base64_encode ( $Request_Albert ), 68, "\r\n\t" );
$Request_Info .= '</data>' . "\n";
$Request_Info .= '	<key>FairPlayCertChain</key>' . "\n";
$Request_Info .= '	<data>' . "\n";
$Request_Info .= '	' . chunk_split ( base64_encode ( $FairPlayCertChain ), 68, "\r\n\t" );
//$Request_Info .= '	' . chunk_split ( base64_encode ( $AccountCertificate ), 68, "\r\n\t" );
$Request_Info .= '</data>' . "\n";
$Request_Info .= '	<key>FairPlaySignature</key>' . "\n";
$Request_Info .= '	<data>' . $FairPlaySignature . '</data>' . "\n";
$Request_Info .= '</dict>';

// Save Modified Requests.
file_put_contents ( $Request_Path . DS . $ProductType . "_" . $BuildVersion . "_" . "ActivationInfoXML_modified.plist", $Request_Albert );
file_put_contents ( $Request_Path . DS . $ProductType . "_" . $BuildVersion . "_" . "activation-info_modified.plist", $Request_Info );

// Global POST Modified Infos Injection.
if ( isset ( $_POST [ 'activation-info-base64' ] ) )
{
	$activation_info_base64 = base64_encode( $Request_Info );
	$_POST [ 'activation-info-base64' ] = $activation_info_base64;	
}
else
{
	$_POST [ 'activation-info' ] = $Request_Info;
}

?>