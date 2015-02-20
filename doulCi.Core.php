<?php
/*
 * doulCi Project Core File.
 */

// General Core Definitions.
if ( ! defined ( 'CORE_SERVER' ) )
{
	define ( 'CORE_SERVER', 'localhost' );
}
if ( ! defined ( 'DOULCI_VERSION' ) )
{
	define ( 'DOULCI_VERSION', 'v 2.0.1 OMEGA' );
}
if ( ! defined ( 'DOULCI_TSS_URL' ) )
{
	define ( 'DOULCI_TSS_URL', 'http://sg.doulci.org' );
}
if ( ! defined ( 'DOULCI_TSS_INFO' ) )
{
	define ( 'DOULCI_TSS_INFO', 'libauthinstall-107.3' );
}
if ( ! defined ( 'DOULCI_BASE_URL' ) )
{
	define ( 'DOULCI_BASE_URL', 'http://www.doulci.org' );
}
if ( ! defined ( 'DOULCI_ACTIVATION_URL' ) )
{
	define ( 'DOULCI_ACTIVATION_URL', 'http://moc.doulci.org' );
}
if ( ! defined ( 'DOULCI_AUTHORIZATION' ) )
{
	define ( 'DOULCI_AUTHORIZATION', 'https://' . CORE_SERVER . '/deviceservices/doulCiAuthorization' );
}

if ( ! defined ( 'DS' ) )
{
	define ( 'DS', DIRECTORY_SEPARATOR );
}
if ( ! defined ( 'OS' ) )
{
	define ( 'OS', strtoupper ( substr ( PHP_OS, 0, 3 ) ) );
}
if ( ! defined ( 'ROOT' ) )
{
	define ( 'ROOT', dirname ( __FILE__ ) );
}
if ( ! defined ( 'CACHE' ) )
{
	define ( 'CACHE', ROOT . DS . 'Cache' . DS );
}
if ( ! defined ( 'DOULCI' ) )
{
	define ( 'DOULCI', ROOT . DS . 'doulCi' . DS );
}
if ( ! defined ( 'CLASSES' ) )
{
	define ( 'CLASSES', ROOT . DS . 'Classes' . DS );
}
if ( ! defined ( 'TSS_BLOB' ) )
{
	define ( 'TSS_BLOB', ROOT . DS . 'TSS_Blobs' . DS );
}
if ( ! defined ( 'TEMPLATES' ) )
{
	define ( 'TEMPLATES', ROOT . DS . 'Templates' . DS );
}
if ( ! defined ( 'CERTIFICATES' ) )
{
	define ( 'CERTIFICATES', DOULCI . 'Certificates' . DS );
}
if ( ! defined ( 'PHP_SEC_LIB' ) )
{
	define ( 'PHP_SEC_LIB', ROOT . DS . 'PHP_Sec_Lib' . DS );
}
if ( ! defined ( 'ACTIVATION_BLOB' ) )
{
	define ( 'ACTIVATION_BLOB', ROOT . DS . 'Activation_Blobs' . DS );
}
if ( ! defined ( 'IOS_CUS_BUNDLES' ) )
{
	define ( 'IOS_CUS_BUNDLES', ROOT . DS . 'iOS_Custum_Bundles' . DS );
}
if ( ! defined ( 'SYS_IMPORTANT_FILES' ) )
{
	define ( 'SYS_IMPORTANT_FILES', ROOT . DS . 'deviceservices' . DS );
}
if ( ! defined ( 'DOULCI_AUTH_DIRECTORY' ) )
{
	define ( 'DOULCI_AUTH_DIRECTORY', ROOT . DS . 'doulCi_Authorized_IPs' . DS );
}

// Headers Definitions.
$iTunes_Headers = "X-Apple-Store-Front: 111111,17 ab:BKDA";
$iTunes_Headers .= "Accept-Encoding: gzip";
$iTunes_Headers .= "X-Apple-Tz: 3600";

// User-Agent Definitions.
define ( 'USER_AGENT_TSS', 'InetURL/1.0' );
define ( 'USER_AGENT_DOULCI', 'doulCiTeam/' . DOULCI_VERSION );
define ( 'USER_AGENT_CAPTIVE', 'CaptiveNetworkSupport-277.10.5 wispr' );

define ( 'USER_AGENT_ACTIVATION', 'iTunes/11.1.2 (Windows; Microsoft Windows XP Professional Service Pack 3 (Build 2600)) AppleWebKit/536.30.1' );
define ( 'USER_AGENT_ACTIVATION_MAC', 'iTunes/11.2.1 (Macintosh; OS X 10.9.2) AppleWebKit/537.75.14' );
define ( 'USER_AGENT_IOS_DEVICE', 'iOS Device Activator (MobileActivation-20 built on Nov  2 2011 at 20:18:00)' );
define ( 'USER_AGENT_CERTIFYME', 'iOS Device Activator (MobileActivation-20 built on Nov  2 2011 at 20:18:00) MobileActivationNSURLConnection (MobileActivation-20 built on Nov  2 2011 at 20:18:02)' );

// Apple
define ( 'APPLE_TSS_SERVER', 'http://gs.apple.com/TSS/controller?action=2' );
define ( 'APPLE_ALBERT_ACTIVITY', 'https://albert.apple.com/deviceservices/activity' );
define ( 'APPLE_ALBERT_CERTIFYME', 'https://albert.apple.com/deviceservices/certifyMe' );
define ( 'APPLE_ALBERT_ACTIVATION', 'https://albert.apple.com/deviceservices/deviceActivation' );
define ( 'APPLE_ALBERT_X_ACTIVATION', 'https://albert.apple.com/WebObjects/ALUnbrick.woa/wa/deviceActivation' );
define ( 'APPLE_ALBERT_NOTIFICATION', 'https://17.171.27.65/WebObjects/ALUnbrick.woa/wa/phoneHome' );

// doulCi
define ( 'DOULCI_TSS_SERVER', 'http://' . CORE_SERVER . '/TSS/controller?action=2' );
define ( 'DOULCI_ALBERT_IMAGES', 'http://' . CORE_SERVER . '/deviceservices/images/doulCi/' );
define ( 'DOULCI_ALBERT_ACTIVITY', 'https://' . CORE_SERVER . '/deviceservices/activity' );
define ( 'DOULCI_ALBERT_CERTIFYME', 'https://' . CORE_SERVER . '/deviceservices/certifyMe' );
define ( 'DOULCI_ALBERT_ACTIVATION', 'http://' . CORE_SERVER . '/deviceservices/deviceActivation' );
define ( 'DOULCI_ALBERT_X_ACTIVATION', 'https://' . CORE_SERVER . '/WebObjects/ALUnbrick.woa/wa/deviceActivation' );
define ( 'DOULCI_ALBERT_NOTIFICATION', 'https://' . CORE_SERVER . '/WebObjects/ALUnbrick.woa/wa/phoneHome' );

// Meta Tags Definitions.
define ( 'CONTENT_TEXT', 'Content-type: text/plain' );
define ( 'CONTENT_DATA', 'Content-type: data; charset="UTF-8"' );
define ( 'CONTENT_XML', 'Content-type: text/xml; charset="UTF-8"' );
define ( 'CONTENT_HTML', 'Content-type: text/html; charset="UTF-8"' );
define ( 'CONTENT_PLIST', 'Content-type: application/x-plist; charset="UTF-8"' );
define ( 'CONTENT_BUDDYML', 'Content-type: application/x-buddyml' );
define ( 'CONTENT_MULTIPART', 'Content-type: multipart/form-data; charset="UTF-8"' );
define ( 'CONTENT_MULTIPART_B', 'Content-type: multipart/form-data; boundary=9F0DD69A-672E-4E38-81AB-B71D7F94F8AD' );
define ( 'CONTENT_LENGHT', 'Content-Length: ' );
define ( 'ACCEPT_LANGUAGE', 'Accept-Language: en-us' );
define ( 'CHACHE_CONTROL', 'Cache-Control: private, no-cache, no-store, must-revalidate, max-age=0' );
define ( 'CONTENT_EXPECT', 'Expect:' );

// Core Server Settings Definitions
define ( 'SPACE', ' ' );
define ( 'COMPANY_TITLE', 'Merruk Technology, SARL.' );
define ( 'CORE_SERVER_TITLE', 'doulCi Server from doulCi Team' );
define ( 'CORE_SERVER_SUBTITLE', '( Worlds First Public Universal iCloud Removal Bypass )' );
define ( 'CORE_SERVER_HEADER', 'Merruk Technology doulCi Server ' . DOULCI_VERSION . ' ( iCloud Removal Bypass )' );
define ( 'CORE_SERVER_BANNER', 'Merruk Technology doulCi Server ' . DOULCI_VERSION . ' ( iCloud Removal Bypass )' );

// Include Config File.
require_once ( DOULCI . 'doulCi.Functions.php' );
require_once ( DOULCI . 'doulCi.Config.php' );

?>
