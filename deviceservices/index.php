<?php
require_once 'Crypt/RSA.php';
require_once 'File/X509.php';

// Load the CA and its private key.
$pemcakey = file_get_contents ( 'certs/rootCA.key' );
$cakey = new Crypt_RSA ( );
$cakey->loadKey ( $pemcakey );
$pemca = file_get_contents ( 'certs/rootCA.pem' );
$ca = new File_X509 ( );
$ca->loadX509 ( $pemca );
$ca->setPrivateKey ( $cakey );

$csr = '-----BEGIN CERTIFICATE REQUEST-----
MIIBxDCCAS0CAQAwgYMxLTArBgNVBAMTJDczN0YwRjMzLTdBNjMtNDI5MC1BQkRG
LUE3QUE5NkVFNDc4QzELMAkGA1UEBhMCVVMxCzAJBgNVBAgTAkNBMRIwEAYDVQQH
EwlDdXBlcnRpbm8xEzARBgNVBAoTCkFwcGxlIEluYy4xDzANBgNVBAsTBmlQaG9u
ZTCBnzANBgkqhkiG9w0BAQEFAAOBjQAwgYkCgYEAp+pWUbIk+mTyQp2hT95RMAFX
pC83IckQckh6FoXGj9n5CVNW1U1tAcj0bi+zVrF2yPX0AjuYLMBIS9bRtrJ6Cu/P
fhyqfgkK4XFOdTcvupegXZi5QakmcQOFotubpuD5Z+6FnhDsJz57bORcznCzu60Y
Ers/c3NjwSCFFi/IyPMCAwEAAaAAMA0GCSqGSIb3DQEBBQUAA4GBAE2zL2HLSCPE
8XsFKrB1J7w7pKxjf64QVHjp5aK3HtOUL89TRJFzHdpXMG58GrKibRWK19+kTQg4
zXyNVXEc4CnOFO2U5vPbdFmpgHc5IXFZZJgHrQo+JD39EJ5O0rtchKeYnePbK+X4
5fcixklRySJ06YthmX3FHitD3ExjaI8p
-----END CERTIFICATE REQUEST-----
';

$vectxq = openssl_pkey_get_details ( openssl_csr_get_public_key ( $csr ) );
$pkeyxq = $vectxq [ 'key' ];
file_put_contents ( 'certs/pubkey.pem', $pkeyxq );

// Load the certificate public key.
$pubkey = new Crypt_RSA ( );
$pubkey->loadKey ( file_get_contents ( 'certs/pubkey.pem' ) );
$pubkey->setPublicKey ( );

// Build the new certificate.
$iPhoneDeviceCA = new File_X509 ( );
$iPhoneDeviceCA->loadCA ( $pemca );
$iPhoneDeviceCA->setPublicKey ( $pubkey );
$iPhoneDeviceCA->setDN ( 'C=US, ST=Some-State, L=Cupertino, O=Apple Inc., OU=Apple iPhone, CN=Apple iPhone Device CA' );
$iPhoneDeviceCA->setStartDate ( '-1 day' );
$iPhoneDeviceCA->setEndDate ( '+ 1 year' );
$iPhoneDeviceCA->setSerialNumber ( '10134611745959375605', 10 );

// Sign new certificate.
$iPhoneDeviceCA_Result = $iPhoneDeviceCA->sign ( $ca, $iPhoneDeviceCA );

// Output it.
echo $iPhoneDeviceCA->saveX509 ( $iPhoneDeviceCA_Result ) . "\n";
// subject=/C=US/O=Apple Inc./OU=Apple iPhone/CN=Apple iPhone Device CA
// issuer=/C=US/O=Apple Inc./OU=Apple Certification Authority/CN=Apple iPhone
// Certification Authority
// Build the new certificate.
$iPhoneActivation = new File_X509 ( );
$iPhoneActivation->loadCA ( $pemca );
$iPhoneActivation->setPublicKey ( $pubkey );
$iPhoneActivation->setDN ( 'C=US, ST=Some-State, L=Cupertino, O=Apple Inc., OU=Apple iPhone, CN=Apple iPhone Activation' );
$iPhoneActivation->setStartDate ( '-1 day' );
$iPhoneActivation->setEndDate ( '+ 1 year' );
$iPhoneActivation->setSerialNumber ( '2', 10 );

// Sign new certificate.
$iPhoneActivation_Result = $iPhoneActivation->sign ( $ca, $iPhoneActivation );

// Output it.
echo $iPhoneActivation->saveX509 ( $iPhoneActivation_Result ) . "\n";

?>