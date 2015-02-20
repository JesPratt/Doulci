<?php
/*
 * doulCi Project Config File.
 */
include ( PHP_SEC_LIB . 'File/X509.php' );
include ( PHP_SEC_LIB . 'Crypt/RSA.php' );

	// Load iPhoneActivation Certificate & It's Public/Private Keys.
	$TokenCertificate = file_get_contents ( $iPhoneActivationFile );
	$TokenCertificatePrivateKey = file_get_contents ( $iPhoneActivation_privateFile );
	$iPhoneActivationVect = openssl_pkey_get_details ( openssl_pkey_get_public ( $TokenCertificate ) );
	$iPhoneActivationPublicKey = $iPhoneActivationVect [ 'key' ];
	file_put_contents ( $iPhoneActivation_publicFile, $iPhoneActivationPublicKey );
	$iPhoneActivationPrivateKey = openssl_pkey_get_private ( $TokenCertificatePrivateKey );

	// Sign the AccountTocken & Get $AccountTokenSignature.
	$TokenSignature = "";
	openssl_sign ( $Token, $TokenSignature, $iPhoneActivationPrivateKey );

	// Re-Encode the Tokens to the Correct Base64 Format.
	$AccountTokenCertificate = base64_encode ( $TokenCertificate );
	$AccountTokenSignature = base64_encode ( $TokenSignature );
	$AccountToken = base64_encode ( $Token );

	// Check if Token Signature is Okay.
	$AccountTokenSignatureCheck = Check_Signature ( $FakeAccountTokenCertificate, $AccountTokenSignature, $AccountToken );
	$Message .= $AccountTokenSignatureCheck . "\n";

	// Load iPhoneDeviceCA Certificate & It's Private Key.
	$iPhoneDeviceCA_private = file_get_contents ( $iPhoneDeviceCA_privateFile );
	$CA_Key = new Crypt_RSA ( );
	$CA_Key->loadKey ( $iPhoneDeviceCA_private );
	$iPhoneDeviceCA = file_get_contents ( $iPhoneDeviceCAFile );
	$CA_Certificate = new File_X509 ( );
	$CA_Certificate->setPrivateKey ( $CA_Key );
	$CA_Certificate->loadX509 ( $iPhoneDeviceCA );
	// $CA_Certificate->setExtension( 'id-ce-authorityKeyIdentifier',
	// $CA_Certificate->setKeyIdentifier ( base64_decode (
	// 'sv4hI0SGlWp51YEmjnMQ2KdMjnQ=' ) ), false );

	// Get And Store DeviceCertRequest Public Key.
	$DeviceCertRequest = base64_decode ( $DeviceCertRequest );
	$iPhoneDeviceVect = openssl_pkey_get_details ( openssl_csr_get_public_key ( $DeviceCertRequest ) );
	$iPhoneDevicePublicKey = $iPhoneDeviceVect [ 'key' ];
	file_put_contents ( $DeviceCertRequest_PublicFile, $iPhoneDevicePublicKey );

	// Load DeviceCertRequest Public Key.
	$DeviceCertRequest_PublicKey = new Crypt_RSA ( );
	$DeviceCertRequest_PublicKey->loadKey ( file_get_contents ( $DeviceCertRequest_PublicFile ) );
	$DeviceCertRequest_PublicKey->setPublicKey ( );

	// Load CSR And get DN.
	$DeviceCertRequest_CR = new File_X509 ( );
	$DeviceCertRequest_CR->loadCSR ( $DeviceCertRequest );
	$doulCi_DN = $DeviceCertRequest_CR->getDNProp ( 'id-at-commonName' );

	// Build the new Device Certificate.
	$iPhoneDeviceCA = new File_X509 ( );
	// $iPhoneDeviceCA->loadCA ( $iPhoneDeviceCA );
	$iPhoneDeviceCA->setPublicKey ( $DeviceCertRequest_PublicKey );
	$iPhoneDeviceCA->setDN ( $DeviceCertRequest_CR->getDN ( true ) );
	$iPhoneDeviceCA->removeDNProp ( 'id-at-commonName' );
	$iPhoneDeviceCA->setDN ( array (
									'rdnSequence' => array (
															array (
																	array (
																			'type' => 'id-at-commonName',
																			'value' => array ( 'ia5String' => $doulCi_DN )
																			)
																	)
															)
									)
							);
	$iPhoneDeviceCA->setStartDate ( '-1 day' );
	$iPhoneDeviceCA->setEndDate ( '+ 3 year' );
	$iPhoneDeviceCA->setSerialNumber ( '1184677871349854983709', 10 );

	// Sign Device Certificate.
	$DeviceCertificate = $iPhoneDeviceCA->sign ( $CA_Certificate, $DeviceCertRequest_CR );
	// $iPhoneDeviceCA = new File_X509 ();
	$iPhoneDeviceCA->loadX509 ( $DeviceCertificate );
	// $iPhoneDeviceCA->setPrivateKey ( $CA_Key );

	// This can be helpful.
	$iPhoneDeviceCA->setExtension ( 'id-ce-authorityKeyIdentifier', $CA_Certificate->setKeyIdentifier ( base64_decode ( 'sv4hI0SGlWp51YEmjnMQ2KdMjnQ=' ) ), false );
	$iPhoneDeviceCA->setExtension ( 'id-ce-subjectKeyIdentifier', 'kL6MeKDP9yzwKSmh9J0D1hczCbU=', false );

	// Set Certificate Usage Settings.
	$iPhoneDeviceCA->setExtension ( 'id-ce-basicConstraints', array ( 'cA' => false ), true );
	$iPhoneDeviceCA->setExtension ( 'id-ce-keyUsage', array ( 'digitalSignature', 'keyEncipherment' ), true );
	$iPhoneDeviceCA->setExtension ( 'id-ce-extKeyUsage', array ( 'id-kp-serverAuth', 'id-kp-clientAuth' ), true );
	
	// Need's a patsh for phpseclib check the following string on phpseclib.
	// Apple OID's doulCi Patch
	$iPhoneDeviceCA->setExtension ( 'id-iOS-Production', NULL, false );

	// Sign and Set The public Key for Device Certificate.
	$iPhoneDeviceCA_x509 = new File_X509 ( );
	$iPhoneDeviceCA_x509->setPublicKey ( $DeviceCertRequest_PublicKey );
	$iPhoneDeviceCA_Result = $iPhoneDeviceCA_x509->sign ( $CA_Certificate, $iPhoneDeviceCA );
	$Message .= "DeviceCertRequest PublicKey : " . "\n" . $DeviceCertRequest_PublicKey . "\n";

	// Base64 Encode Device Certificate .
	$DeviceCertificate = base64_encode ( $iPhoneDeviceCA_x509->saveX509 ( $iPhoneDeviceCA_Result ) );

	// Save Generated Certificate and It's Public Key.
	$doulCiTeamCertificateFile = $Request_Path . DS . $ProductType . "_" . $BuildVersion . "_" . "doulCiTeamCertificate.pem";
	$doulCiTeamCertificate_PublicFile = $Request_Path . DS . $ProductType . "_" . $BuildVersion . "_" . "doulCiTeamCertificate_Public.pem";

	$doulCiTeamCertificate = $iPhoneDeviceCA_x509->saveX509 ( $iPhoneDeviceCA_Result );
	$doulCiTeamCertificateVect = openssl_pkey_get_details ( openssl_pkey_get_public ( $doulCiTeamCertificate ) );
	$doulCiTeamCertificatePublikKey = $doulCiTeamCertificateVect [ 'key' ];

	file_put_contents ( $doulCiTeamCertificateFile, $doulCiTeamCertificate );
	file_put_contents ( $doulCiTeamCertificate_PublicFile, $doulCiTeamCertificatePublikKey );

	//file_put_contents ( $Request_Path . DS . "FakeDeviceCertificate.pem", base64_decode($FakeDeviceCertificate) );

	// Debuging Certificates
	$Message .= "doulCiTeam Certificate, DEVELOPMENT : " . "\n" . $doulCiTeamCertificate . "\n";
	$Message .= "doulCiTeam Certificate PublicKey : " . "\n" . $doulCiTeamCertificatePublikKey . "\n";

	$iPhoneActivationOrig = file_get_contents ( $iPhoneActivationOrigFile );
	$iPhoneActivationOrigVect = openssl_pkey_get_details ( openssl_pkey_get_public ( $iPhoneActivationOrig ) );
	$iPhoneActivationOrigPublicKey = $iPhoneActivationOrigVect [ 'key' ];
	$Message .= "Apple Certificate PRODUCTION : " . "\n" . $iPhoneActivationOrig . "\n";
	$Message .= "Apple Certificate PublicKey, Apple Inc. : " . "\n" . $iPhoneActivationOrigPublicKey . "\n";

	$iPhoneDeviceCAOrig = file_get_contents ( $iPhoneDeviceCAOrigFile );
	$iPhoneDeviceCAOrigVect = openssl_pkey_get_details ( openssl_pkey_get_public ( $iPhoneDeviceCAOrig ) );
	$iPhoneDeviceCAOrigPublicKey = $iPhoneDeviceCAOrigVect [ 'key' ];
	$Message .= "Apple Certificate PRODUCTION : " . "\n" . $iPhoneDeviceCAOrig . "\n";
	$Message .= "Apple Certificate PublicKey, Apple Inc. : " . "\n" . $iPhoneDeviceCAOrigPublicKey . "\n";

	//print $iPhoneDeviceCAOrig;
	$DeviceCAOrig = new File_X509 ( );
	$DeviceCAOrig->loadX509 ( $iPhoneDeviceCAOrig );
	$DeviceCAOrigPublicKey = $DeviceCAOrig->getPublicKey ( $iPhoneDeviceCAOrig );
	$DeviceCAOrigDN = $DeviceCAOrig->getDN ( true );
	$DeviceCAOrigIssuerDN = $DeviceCAOrig->getIssuerDN ( true );
	$DeviceCAOrigExtensions = $DeviceCAOrig->getExtensions (  );
	
	$iPhoneDeviceCANew_x509 = new File_X509 ( );
	//$iPhoneDeviceCANew_x509->setPublicKey ( $DeviceCAOrigPublicKey );
	//$iPhoneDeviceCANew_x509->setDN ( $DeviceCAOrigDN );
	$iPhoneDeviceCANew_x509->setStartDate ( '-1 day' );
	$iPhoneDeviceCANew_x509->setEndDate ( '+ 10 year' );
	//$iPhoneDeviceCANew_x509->setIssuerDN ( $DeviceCAOrigIssuerDN );
	$extensions = array();
	$i=0;
	if (is_array($DeviceCAOrigExtensions)) {
		foreach ($DeviceCAOrigExtensions as $extension) {
			$extensions[] = $extension;
			$value = $DeviceCAOrig->getExtension ( $extension );
			$iPhoneDeviceCANew_x509->setExtension ( $extension, $value );
			//print $extension . "\n" . print_r($value);
		}
	}
	$crt = $iPhoneDeviceCANew_x509->loadX509($iPhoneDeviceCANew_x509->saveX509($iPhoneDeviceCANew_x509->sign($CA_Certificate, $DeviceCAOrig)));
	$Certificate = $iPhoneDeviceCANew_x509->saveX509($crt);
	
	// Cert Reproduce idea.
	/*
	 * Create a Very close Public Key to Apple's One.
	 * Create a Self-Signed Root CA Certificate also Identical to apple's one.
	 * Set the Apple's Root CA Public Key to Our's.
	 * Set Apple's Signature to Our Produced Root CA Certificate.
	 * "print crt to see Signature" modify it on the fly and then go go go save it.
	 * Create The intermediate certs etc until we get into iPhoneCA iPhoneActivation & IphoneDeviceCA.
	 * now we are free to produce our device certificates and test with them.
	 * Remember : Always check if the following is identical when signing else! we set them manually.
	 * Public Key.
	 * Authority Key Identifier.
	 * Subject Key Identifier.
	 */
	
	
	// Sign and Set The public Key for Device Certificate.
	//$iPhoneDevice_x509 = new File_X509 ( );
	//$iPhoneDevice_x509->setPublicKey ( $DeviceCAOrigPublicKey );
	//$iPhoneDevice_Result = $iPhoneDevice_x509->sign ( $CA_Certificate, $iPhoneDeviceCANew_x509 );
	// Base64 Encode Device Certificate .
	//$Certificate = $iPhoneDeviceCANew_x509->saveX509 ( $iPhoneDevice_Result );
	//print $Certificate;
	$doulCiTeamCACertificateFile = $Request_Path . DS . $ProductType . "_" . $BuildVersion . "_" . "doulCiTeamCACertificate.pem";
	file_put_contents ( $doulCiTeamCACertificateFile, $Certificate );
	
	$Message .= "Fake AccountTokenCertificate, Apple Inc. : " . "\n" . base64_decode ( $FakeAccountTokenCertificate ) . "\n";
	//print $Message;

?>