<?php
include ( "PlistParser.php" );
include ( 'File/X509.php' );
include ( 'Crypt/RSA.php' );
$plistFirts = new plistParser ( );
$serial = $_POST [ "AppleSerialNumber" ];
$guid = $_POST [ "guid" ];
$activation = '<plist version="1.0">' . $_POST [ "activation-info" ] . '</plist>';
$global = 0;
$imei = $_POST [ "IMEI" ];
;
$meid = "";
$deviceNumber = "";
$deviceNumberIpad = "";
$deviceCertificate = "";
$FairFlayKeyData = "";
$binarySignature = "";
$wildcard = "";
$accountToken = "";
$accountTokenEncoded = "";
$accountTokenSignature = "";
$accountCertificate = file_get_contents ( 'certs/iPhoneActivation.pem' );
$vect = openssl_pkey_get_details ( openssl_pkey_get_public ( $accountCertificate ) );
$publicKey = $vect [ 'key' ];
$accountTokenCertificate = base64_encode ( $accountCertificate );
$pvKey = openssl_pkey_get_private ( file_get_contents ( 'certs/iPhoneActivation_private.key' ) );
$FairPlayCertChain = "";
$FairPlaySignature = "";
$responseParsed = "";
$responseAlbert = "";
$activationState = "";
$agente = $_SERVER [ 'HTTP_USER_AGENT' ];
$gsm = 0;
$cdma = 0;
$wifi = 0;
$keysFirts = $plistFirts->parseString ( $activation );
;
$activationRQ = base64_decode ( $keysFirts [ 'ActivationInfoXML' ] );
$FairPlayCertChain = $keysFirts [ 'FairPlayCertChain' ];
$FairPlaySignature = $keysFirts [ 'FairPlaySignature' ];
$activationRQ = str_replace ( '<?xml version="1.0" encoding="UTF-8"?>', "", $activationRQ );
$activationRQ = str_replace ( '<!DOCTYPE plist PUBLIC "-//Apple//DTD PLIST 1.0//EN" "http://www.apple.com/DTDs/PropertyList-1.0.dtd">', "", $activationRQ );
$plistActivationRequest = new plistParser ( );
$keysActivationRequest = $plistActivationRequest->parseString ( $activationRQ );
$ProductType = $keysActivationRequest [ 'ProductType' ];
$deviceType = $keysActivationRequest [ 'DeviceClass' ];
$activationState = $keysActivationRequest [ 'ActivationState' ];
$activationRamdomess = $keysActivationRequest [ 'ActivationRandomness' ];
$deviceCertRequestBase64 = $keysActivationRequest [ 'DeviceCertRequest' ];
$uniqueDiviceID = $keysActivationRequest [ 'UniqueDeviceID' ];
$deviceCertRequest = base64_decode ( $deviceCertRequestBase64 );
$wildcard = '020000004dac941051d784f8fc018b81573ff8e072a8617a24caf6f28e1ac97062e8e5f53b4778510db5bd136a27effd8ca01e16d362a2b34a6510e703fa7e81b6b79f4c4ca66d3ba01e216476c63239c532cbba60f84b781345094a47a55e36cd8423d3141d2bb753cacbe702efe3e5e763ea9675363c54cc30b30ad331f4107745ba8514e7828cc6575aa70b71ac205e860e8a205f0dc038c3da96ff4d410aa70aefd489bcad94ab74e065cc8a10f84df463dc6ffd9aa6c4688f0b248cd58267e032d537ccef5ffb234fd69c27bc72e37b38662ca7b246cb5b5ac635fe68b751ec72f7ad9013e1c33089d242f0dc44c41338fa3d6345902f23c4628a512ac716fb79b1425c4e96ba54851058f487c5e9b6e6f49b75cee79667e61cf60d1a472b67c38b6acf3ecf0bfd7c8a8eb0d727e1f9fca5ff73efbc75f4a8e3c565120704ba3a6285ead5c837e877e6e12cefcb7bc4d0c3966ed2108fb23c805acad0dc84a670787f7ebfe6fff0d994bc0eee001247d135044dd5737ca92931903ffd36548b83688c5fe867d2468d9953306f4e059df3645ba302e8f4bf39976aa9ac0d1dad095fabd77f000a368b27cb6c27fffbbee424c7da43c93bdd35cf3150d448b21d770702fd920c31511c6e56a06f6de98400f3d3670ecda39ebdabb60757a46500a131c454ed91db5b32a75aa43b977cccb04e937afdffbc9e5385aa25b61cc3099958680777b46f82ed9ad8b40f93f9462a5243c9aeaf8f0c709985eae70fd50ef779a10e859dd0e39d28f140283e595c1726e7fa90fef2d8891439ea73a62834718c0766c5cdab75bbec\n';
if ( $activationState == "Unactivated" )
{
	$accountToken = '{' . "\n\t" . '"InternationalMobileEquipmentIdentity" = "' . $imei . '";' . "\n\t" . '"ActivityURL" = "' . 'https://albert.apple.com/deviceservices/activity' . '";' . "\n\t" . '"ActivationRandomness" = "' . $activationRamdomess . '";' . "\n\t" . '"UniqueDeviceID" = "' . $uniqueDiviceID . '";' . "\n\t" . '"CertificateURL" = "https://albert.apple.com/deviceservices/certifyMe";' . "\n\t" . '"PhoneNumberNotificationURL" = "https://albert.apple.com/deviceservices/phoneHome' . '";' . "\n\t" . '"WildcardTicket" = "' . $wildcard . '";' . "\n" . '}';
	
	$accountTokenEncoded = base64_encode ( $accountToken );
	openssl_sign ( $accountToken, $binarySignature, $pvKey ); // AccountTokenSignature
	$accountTokenSignature = base64_encode ( $binarySignature );
	
	// Load the CA and its private key.
	$pemcakey = file_get_contents ( 'certs/iPhoneDeviceCA_private.key' );
	$cakey = new Crypt_RSA ( );
	$cakey->loadKey ( $pemcakey );
	$pemca = file_get_contents ( 'certs/iPhoneDeviceCA.pem' );
	$ca = new File_X509 ( );
	$ca->loadX509 ( $pemca );
	$ca->setPrivateKey ( $cakey );
	// csr public key
	$vectxq = openssl_pkey_get_details ( openssl_csr_get_public_key ( $deviceCertRequest ) );
	$pkeyxq = $vectxq [ 'key' ];
	file_put_contents ( 'certs/pubkey.pem', $pkeyxq );
	
	// Load the certificate public key.
	$pubkey = new Crypt_RSA ( );
	$pubkey->loadKey ( $pkeyxq );
	$pubkey->setPublicKey ( );
	$x509 = new File_X509 ( );
	$csr = $x509->loadCSR ( $deviceCertRequest ); // see csr.csr
	$dn = $x509->getDN ( true );
	// Build the new certificate.
	$iPhoneDeviceCA = new File_X509 ( );
	$iPhoneDeviceCA->loadCA ( $pemca );
	$iPhoneDeviceCA->setPublicKey ( $pubkey );
	$iPhoneDeviceCA->setDN ( $dn );
	$iPhoneDeviceCA->setStartDate ( '-1 day' );
	$iPhoneDeviceCA->setEndDate ( '+ 1 year' );
	$iPhoneDeviceCA->setSerialNumber ( '10134611745959375605', 10 );
	
	// Sign new certificate.
	$iPhoneDeviceCA_Result = $iPhoneDeviceCA->sign ( $ca, $iPhoneDeviceCA );
	
	// Output it.
	$deviceCertificate = base64_encode ( $iPhoneDeviceCA->saveX509 ( $iPhoneDeviceCA_Result ) . "<br>" );
	
	$responseAlbert = '<!DOCTYPE html><html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><meta name="keywords" content="iTunes Store" /><meta name="description" content="iTunes Store" /><title>iPhone Activation</title><link href="http://static.ips.apple.com/ipa_itunes/stylesheets/shared/common-min.css" charset="utf-8" rel="stylesheet" /><link href="http://static.ips.apple.com/deviceservices/stylesheets/styles.css" charset="utf-8" rel="stylesheet" /><link href="http://static.ips.apple.com/ipa_itunes/stylesheets/pages/IPAJingleEndPointErrorPage-min.css" charset="utf-8" rel="stylesheet" /><script id="protocol" type="text/x-apple-plist"><plist version="1.0">
  <dict>
    <key>iphone-activation</key>
    <dict>
      <key>activation-record</key>
      <dict>
        <key>FairPlayKeyData</key>
    <data>LS0tLS1CRUdJTiBDT05UQUlORVItLS0tLQpBQUVBQWF4dGtJQkpNNDhYMFNmY2FQOWMwU2xYY3FqandUMCtXMzlrbXp0bXMrc2xmVDltbE9lS2VwUjVTNnhFClpKYU4xbFViMXpqc3hhOVc0TUhYeEsybzF5bnhRM2V0b3l5bXc0OFVmUlJyNzJON2xNU3BRT3BNeDJoUXZTclMKUW9Db0psVWtOSzBRM2s4M1BKVXBlaFFuenBSeGgxUHhOUmI5eXB5K2RUVHh6L0RVTmt0R3BFekkxa245d2pXaQpTMzRURjloTDc5L3BGUmtHcnB5KzFLdGI5T2MyK2d5QzZoc1RFSEVqcTRNM3k4dGZWNUJ2Z1pDWFM3Y2J4VVhiClpoSjJkenUzYWpraWZ1UHR6azVtT3hzUjhIYitQdklDT0dvQWJZNC95SkFJRHBEdWNwNHExQVJ1bVlDeFhFd1gKQ0JVOHRpMGNLMDlyUUUzdmtLbG9oZDVJOGlMTHVkcmFSQzI0TUtycTJMVjB4K3RMWkppb2NNb3hwNk9XdW5DeQpNN2xzT2NIY2Zicjl0SVA2ZlpWUW1qcXFScC9ibm91eEE0b2RHUzNla0RjQ05LbnVhamY3dUZ6eHNRSjhjZG4zCkR0MjE5SWhXbGZ6RnFHZDlqU29KRHNJMVM3bEJVRXEvRGUxeXVGMkNYbjk4djZLTzJpeW4wOGtkaW5PN0k2Zk0KNWVCNWxISCtiL21NQStycUVEWGVaQnRRdHpNczZ2cFB2Z2IwWWZzYnd0cHB1bGRhUnI0NERPbm5qMVFBQnRmRQpBWHhaVjhoS0NIZmRKMFdVbmY3K3VXRDVVYWNMcmNWdWpwU2cyb256UURKWDFoNVNmVUNMUWNpbFZMUzBaR3pCCm5maWNkSDlYMU5NK1FHQzU0K3lzVE0rVzh6QUJFQlhSNEhOdGFKQjJ0SkVUclExOWQ2SS9rSG02WVAzSm9vZWIKQk1kT09MNDg2NlZlR21nVjVTM3hXT2srY21SNGtobFp3MVFpSVhkSjBxT3U4MHpaSFEvUGpJdk83SHUrNWl5RApIK2JqYlBLWFUrR1Z5bDNEWDB5MHoyVmJjUUx2bzZjTDdCVmQ5OVFXNUVCdDBvTUsrMmIyZjdoNGsxWVlYYzA5ClZ1clJ2SnJnRm5teVh5MUs0bHlUakJDaTVRUzdOakFlT0QyTWo1bVRKNVlBNGxHYytPREREcnQ3YmkrR1B5L3QKWkpZdjE1Zk5EL25acnh5c09zNWhaVjZablRIQ0hxZUxkcGthMFFrUXdSS0YrNis4NCtSeHVIL3NLeXY0SFRkUQpZcnllUGxpSnZheUMwekwxTjJrNjNETTdweXNTT2t0d2FWNEs1dkV4VHY3N3kzL1ptVHRtZi9Ic2tWTTVMbDlaClBIWm5ieFVzYXFQeExzWjRFeEQ0SkJOSXh3d1BxWGhTYUZURFZzTFc0Rld5VUJLOGZSbTFNRGZSUnJaMkdCQ3IKeERqUGNVRjVBWkRENlhhQXZGS0VKSW5lc0JvR0JUY3phYVNQL3pxNFBZM3UxVEFMN1hFZTRqY3plR3pCSGRlTAp2aVIxditRMm9aYzcwUDFHaTJoL0xLUEVGQVM3VElvZU5HWjhkcXFmSDBLZHdJK3FTcFJOUkQvc0c0cFNmNXJQCnpwZytFcFgvdXZDWW5Zb2pLNnFzR0JFWWk3cFRrbkhtLzRkUmY4MmlrODc4c3lVaFR0UlFBMGV5OC9iN0szamIKUldWYUgxRDFRWFozV2VEc1RnbTMwbjVGeE5hZnFTZnE0NmpHam9mSWZjVFpFMEhvS2ppYkFVemtKVUxWYzJDUwpycW80MkR6ZUp3am1jRDEyV2x1bkIwL0pTd01aSkFQalExYkpTL094c2JEQzVFNTZjaC84YVdLd2xnN2hyNlhwCmNsd2RWb2FTcVRXcmt4NFVOdkVYek1WeFhRZUNrNHQ3WjZHOVRBZUt5V05YcGFReXJ0K05Xb0RCZVNLVkFQM1YKMWdHRThoNkxLMGxIRVppYVRVSGRXOVo0ZGUvWVNkUGZkOFcvL2dnbEhSNkVoWFJmCi0tLS0tRU5EIENPTlRBSU5FUi0tLS0tCg==</data>
        <key>AccountTokenCertificate</key>
        <data>' . $accountTokenCertificate . '</data>
        <key>DeviceCertificate</key>
        <data>LS0tLS1CRUdJTiBDRVJUSUZJQ0FURS0tLS0tCk1JSUM4ekNDQWx5Z0F3SUJBZ0lLQUptOU1Sdk95cFVNMnpBTkJna3Foa2lHOXcwQkFRVUZBREJhTVFzd0NRWUQKVlFRR0V3SlZVekVUTUJFR0ExVUVDaE1LUVhCd2JHVWdTVzVqTGpFVk1CTUdBMVVFQ3hNTVFYQndiR1VnYVZCbwpiMjVsTVI4d0hRWURWUVFERXhaQmNIQnNaU0JwVUdodmJtVWdSR1YyYVdObElFTkJNQjRYRFRFME1EVXdPREUxCk5UWXhPRm9YRFRFM01EVXdPREUxTlRZeE9Gb3dnWU14TFRBckJnTlZCQU1XSkRNMFFVWTVNVFJCTFRSRk1rRXQKTkRrME5pMDVSamRCTFRneE1qVkdPREJHT1VVMlFqRUxNQWtHQTFVRUJoTUNWVk14Q3pBSkJnTlZCQWdUQWtOQgpNUkl3RUFZRFZRUUhFd2xEZFhCbGNuUnBibTh4RXpBUkJnTlZCQW9UQ2tGd2NHeGxJRWx1WXk0eER6QU5CZ05WCkJBc1RCbWxRYUc5dVpUQ0JuekFOQmdrcWhraUc5dzBCQVFFRkFBT0JqUUF3Z1lrQ2dZRUE5OGxrNWF5WW55cWsKOW96VDNBWmtXdnp5YmQ4a3YrbEJYVkFIOUg4UktTOE9IcFVvUUU0YmhqcW9BK0xBUHFFS00weWpBbmh0bTFYUwpTUU40OS9uSHpqWVMvVndzT3lEM2ZlNmk3R2M4VU15T1Fod2pWaENjRW9pTW9CajVQOHVmRmQ2SDRtWnJ2dEZMClpRUlp3SDcvWmw3TkVpYmY5eUUvQURTZFd5ZUhxMU1DQXdFQUFhT0JsVENCa2pBZkJnTlZIU01FR0RBV2dCU3kKL2lFalJJYVZhbm5WZ1NhT2N4RFlwMHlPZERBZEJnTlZIUTRFRmdRVWtMNk1lS0RQOXl6d0tTbWg5SjBEMWhjegpDYlV3REFZRFZSMFRBUUgvQkFJd0FEQU9CZ05WSFE4QkFmOEVCQU1DQmFBd0lBWURWUjBsQVFIL0JCWXdGQVlJCkt3WUJCUVVIQXdFR0NDc0dBUVVGQndNQ01CQUdDaXFHU0liM1kyUUdDZ0lFQWdVQU1BMEdDU3FHU0liM0RRRUIKQlFVQUE0R0JBREdvckJQcTV2UzdIdzYzdnZuN01GRDg0aExrU0Vjc0k5VVVuZ215c2hRVU81MjlHNzFCU0JYVQoreWprQ2k0Ylp6bWVEVmxRc1NsRzVURHcrT3ZlaEgvTE9EUjZHeUxtdjc1UHpaV0pPQlp1RmpCc3p4cldVQjFCCjNMTU9pbTV0TVV2Z0pKOUlPU3lVYjI3VnVNRUYyZ1pmRkNONnRYV2VsUnNZaHRzY3Q2WGgKLS0tLS1FTkQgQ0VSVElGSUNBVEUtLS0tLQo=</data>
        <key>AccountTokenSignature</key>
        <data>' . $accountTokenSignature . '</data>
        <key>AccountToken</key>
        <data>' . $accountTokenEncoded . '</data>
      </dict>
      <key>unbrick</key>
      <true/>
    </dict>
  </dict>
</plist></script><script>var protocolElement = document.getElementById("protocol");var protocolContent = protocolElement.innerText;iTunes.addProtocol(protocolContent);</script></head><body></body></html>';
	$ok = openssl_verify ( $accountToken, $binarySignature, $publicKey, "sha1WithRSAEncryption" );
	// echo "check #1: ";
	if ( $ok == 1 )
	{
		// echo "signature ok (as it should be)\n";
		echo $responseAlbert;
	}
	elseif ( $ok == 0 )
	{
		echo "bad (there's something wrong)\n";
	}
	else
	{
		echo "ugly, error checking signature\n";
	}
}
if ( $activationState == "WildcardActivated" )
{
	echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.apple.com/itms/" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="iTunes Store" />
<meta name="description" content="iTunes Store" />
<title>iPhone Activation</title>
<link href="http://static.ips.apple.com/ipa_itunes/stylesheets/shared/common-min.css" charset="utf-8" rel="stylesheet" />
<link href="null/deviceservices/stylesheets/styles.css" charset="utf-8" rel="stylesheet" />
<link href="http://static.ips.apple.com/ipa_itunes/stylesheets/pages/IPAJingleEndPointErrorPage-min.css" charset="utf-8" rel="stylesheet" />
<script id="protocol" type="text/x-apple-plist"><plist version="1.0">
  <dict>
    <key>iphone-activation</key>
    <dict>
      <key>ack-received</key>
      <true/>
      <key>show-settings</key>
      <true/>
    </dict>
  </dict>
</plist></script>
<script>
var protocolElement = document.getElementById("protocol");
var protocolContent = protocolElement.innerText;iTunes.addProtocol(protocolContent);
</script>
</head>
<body>
</body>
</html>';
}
else
{
	echo "";
}

?>