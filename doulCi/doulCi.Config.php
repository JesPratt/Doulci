<?php
/*
 * doulCi Project Config File.
 */

// PHP Configuration
error_reporting ( E_ALL );
ini_set ( 'auto_detect_line_endings', true );

// Load Necessary Plist Library.
require_once ( CLASSES . 'parsers' . DS . 'plist' . DS . 'PlistParser.inc' );
$parser = new PlistParser ( );

// Create Directories.
Create_Dir ( CACHE, $mode = 0755 );
Create_Dir ( TSS_BLOB, $mode = 0755 );
Create_Dir ( ACTIVATION_BLOB, $mode = 0755 );
Create_Dir ( DOULCI_AUTH_DIRECTORY, $mode = 0755 );

// Remote Close The Server
if ( @Check_File ( ROOT . DS . "Remote_Controle.data" ) )
{
	// Debugging & Maintenance Setup.
	$doulCi_Maintenance = true;
	$doulCi_Scamming_Filter = true;
}
else
{
	// Debugging & Maintenance Setup.
	$doulCi_Maintenance = false;
	$doulCi_Scamming_Filter = false;
}
$doulCi_Debug = false;

// Certificates PKI Files
$FairplayFile = CERTIFICATES . "data.pem";
$FairplayPublicFile = CERTIFICATES . "dataPublic.pem";

$iPhoneActivationOrigFile = CERTIFICATES . "iPhoneActivationOrig.pem";
$iPhoneDeviceCAOrigFile = CERTIFICATES . "iPhoneDeviceCAOrig.pem";

$iPhoneActivationFile = CERTIFICATES . "iPhoneActivation.pem";
$iPhoneActivation_privateFile = CERTIFICATES . "iPhoneActivation_private.pem";
$iPhoneActivation_publicFile = CERTIFICATES . "iPhoneActivation_public.pem";
$iPhoneDeviceCAFile = CERTIFICATES . "iPhoneDeviceCA.pem";
$iPhoneDeviceCA_privateFile = CERTIFICATES . "iPhoneDeviceCA_private.pem";
$DeviceCertRequest_PublicFile = CERTIFICATES . "DeviceCertRequest_Public.pem";

$authorityKeyIdentifier_A = "";
$authorityKeyIdentifier_B = "";
$authorityKeyIdentifier_C = "";
$authorityKeyIdentifier_D = "";
$subjectKeyIdentifier_A = "";
$subjectKeyIdentifier_B = "";
$subjectKeyIdentifier_C = "";
$subjectKeyIdentifier_D = "";

// Debugging & Maintenance Messages.
$Message = CORE_SERVER_TITLE . SPACE . DOULCI_VERSION  . "\n";

$doulCi_Maintenance_Message = "<br>
<p align=\"center\">
<b>doulCi Server is now down for some testing and debugging issues, Please Come Back Later!</b>
</p>";

$doulCi_Scamming_Message = "<br>
<p align=\"center\">
doulCi Server Security: 
<b>You are victim of a scamming application or a scamming websites, maybe not! 
But. For our and your security we suggest to visit one of our websites www.merruk.com (net,org) or www.doulci.info (net,org) to get free doulCi authorized service</b>
</p>";

// Setup Advertisements.
$DoulCi_Left_Banner_One = "<!-- Begin Hsoub Ads Ad Place code -->
<script type=\"text/javascript\"><!--
hsoub_adplace = 1404327627080947;
hsoub_adplace_size = '120x600';
//--></script>
<script src=\"http://ads2.hsoub.com/show.js\" type=\"text/javascript\"></script>
<!-- End Hsoub Ads Ad Place code -->
";
$DoulCi_Left_Banner_Two = "<!-- Begin Hsoub Ads Ad Place code -->
<script type=\"text/javascript\"><!--
hsoub_adplace = 1404327627080947;
hsoub_adplace_size = '120x600';
//--></script>
<script src=\"http://ads2.hsoub.com/show.js\" type=\"text/javascript\"></script>
<!-- End Hsoub Ads Ad Place code -->
";
$DoulCi_Left_Banner_Three = "<!-- Begin Hsoub Ads Ad Place code -->
<script type=\"text/javascript\"><!--
hsoub_adplace = 1404327627080947;
hsoub_adplace_size = '120x600';
//--></script>
<script src=\"http://ads2.hsoub.com/show.js\" type=\"text/javascript\"></script>
<!-- End Hsoub Ads Ad Place code -->
";

$DoulCi_Middle_Banner_One = "
<!-- merruk.com -->
<ins class=\"adsbygoogle\"
     style=\"display:inline-block;width:728px;height:90px\"
     data-ad-client=\"ca-pub-2481668635125798\"
     data-ad-slot=\"6240455565\"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
";
$DoulCi_Middle_Banner_Two = "
<!-- merruk.com -->
<ins class=\"adsbygoogle\"
     style=\"display:inline-block;width:728px;height:90px\"
     data-ad-client=\"ca-pub-2481668635125798\"
     data-ad-slot=\"6240455565\"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
";
$DoulCi_Middle_Banner_Three = "
<!-- merruk.com -->
<ins class=\"adsbygoogle\"
     style=\"display:inline-block;width:728px;height:90px\"
     data-ad-client=\"ca-pub-2481668635125798\"
     data-ad-slot=\"6240455565\"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
";
$DoulCi_Middle_Banner_Four = "
<!-- merruk.com -->
<ins class=\"adsbygoogle\"
     style=\"display:inline-block;width:728px;height:90px\"
     data-ad-client=\"ca-pub-2481668635125798\"
     data-ad-slot=\"6240455565\"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
";

$DoulCi_Right_Banner_One = "
<!-- merruk.com -->
<ins class=\"adsbygoogle\"
     style=\"display:inline-block;width:728px;height:90px\"
     data-ad-client=\"ca-pub-2481668635125798\"
     data-ad-slot=\"6240455565\"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
";
$DoulCi_Right_Banner_Two = "
<!-- merruk.com -->
<ins class=\"adsbygoogle\"
     style=\"display:inline-block;width:728px;height:90px\"
     data-ad-client=\"ca-pub-2481668635125798\"
     data-ad-slot=\"6240455565\"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
";
$DoulCi_Right_Banner_Three = "
<!-- merruk.com -->
<ins class=\"adsbygoogle\"
     style=\"display:inline-block;width:728px;height:90px\"
     data-ad-client=\"ca-pub-2481668635125798\"
     data-ad-slot=\"6240455565\"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
";

$doulCi_Adsense = "
<div align=\"center\" style=\"text-align:center;\">
	<div style=\"text-align:center;\">
		" . $DoulCi_Middle_Banner_One . "
	</div>
	<div style=\"text-align:center;\">
		" . $DoulCi_Middle_Banner_Two . "
	</div>
	<div style=\"text-align:center;\">
		" . $DoulCi_Middle_Banner_Three . "
	</script>
	</div>
	<div style=\"text-align:center;\">
		" . $DoulCi_Middle_Banner_Four . "
	</script>
	</div>
	<div style=\"text-align:center;\">
		" . $DoulCi_Middle_Banner_One . "
	</div>
	<div style=\"text-align:center;\">
		" . $DoulCi_Middle_Banner_Two . "
	</div>
	<script async src=\"//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js\"></script>
</div>";

// Setup Security Checks for moc.doulCi
if ( ( $_SERVER [ 'SERVER_NAME' ] == "captive.apple.com" ) or ( $_SERVER [ 'SERVER_NAME' ] == "www.ibook.info" ) or ( $_SERVER [ 'SERVER_NAME' ] == "www.itools.info" ) or ( $_SERVER [ 'SERVER_NAME' ] == "www.appleiphonecell.com" ) or ( $_SERVER [ 'SERVER_NAME' ] == "www.thinkdifferent.us" ) )
{
	// We Have Internet Access :).
	header ( "HTTP/1.0 200" );
	Header ( CONTENT_HTML );
	echo "<HTML><HEAD><TITLE>Success</TITLE></HEAD><BODY>Success</BODY></HTML>";
	die ( );
}
elseif ( ( isset ( $_SERVER [ 'HTTP_USER_AGENT' ] ) ) and ( strpos ( $_SERVER [ 'HTTP_USER_AGENT' ], 'CaptiveNetworkSupport' ) !== false ) )
{
	// We Have Internet Access :).
	header ( "HTTP/1.0 200" );
	Header ( CONTENT_HTML );
	echo "<HTML><HEAD><TITLE>Success</TITLE></HEAD><BODY>Success</BODY></HTML>";
	die ( );
}
elseif ( $_SERVER [ 'SERVER_NAME' ] == "doulci.org" )
{
	// This is the main project.
}
elseif ( $_SERVER [ 'SERVER_NAME' ] == "doulci.info" )
{
	// This is the main project.
}
elseif ( $_SERVER [ 'SERVER_NAME' ] == "www.merruk.org" )
{
	// This is the main backup project.
}
elseif ( $_SERVER [ 'SERVER_NAME' ] == "www.merruk.net" )
{
	// This is the second backup project.
}
elseif ( $_SERVER [ 'SERVER_NAME' ] == "www.merruk.com" )
{
	// This is the main backup project.
}
else
{
	// Do Nothing :).
	print '';
}
?>
