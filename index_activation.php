<?php
session_start ( );

require_once ( 'doulCi.Core.php' );

if ( $_SERVER [ 'REQUEST_METHOD' ] == "GET" )
{
	?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="iTunes Store" />
<meta name="description" content="iTunes Store" />
<link rel="shortcut icon" href="https://ssl.apple.com/favicon.ico" />
<title>iPhone Activation Request</title>
<link
	href="http://static.ips.apple.com/ipa_itunes/stylesheets/shared/common-min.css"
	charset="utf-8" rel="stylesheet" />
<link
	href="http://static.ips.apple.com/deviceservices/stylesheets/styles.css"
	charset="utf-8" rel="stylesheet" />
<link
	href="http://static.ips.apple.com/ipa_itunes/stylesheets/pages/IPAJingleEndPointErrorPage-min.css"
	charset="utf-8" rel="stylesheet" />
</head>
<body>
	<div id="jingle-page-wrapper">
		<div id="jingle-page-wrapper-header">
			<div id="secure">
				<img src="http://static.ips.apple.com/ipa_itunes/images/lock.png" />
			</div>
			<div id="banner">
				<div id="apple-logo">
					<img
						src="http://static.ips.apple.com/ipa_itunes/images/apple_chrome.png" />
				</div>
				<div id="carrier-logo"></div>
			</div>
		</div>
		<div id="jingle-page-wrapper-content">
			<form method="post" id="jingle-page-form"
				action="https://173.201.243.238/deviceservices/deviceActivation">
				<div id="jingle-page-content">
					<div id="IPAJingleEndPointErrorPage">
						<h1>Attempt iPhone Activation Legally. 10B414b 6.1</h1>
						<p>le règlement d’activation du serveur d’activation. Contactez
							Merruk Technology pour en savoir plus.</p>
						<br>
						<div style="text-align: left;">
							<input type="text" name="ECID" value="3812472319477" size="60px">
							: ECID<br> <input type="text" name="machineName" value="TACHRON"
								size="60px"> : machineName<br>
							<textarea name="activation-info"
								style="max-height: 300px; min-height: 200px; max-width: 400px; min-width: 391px;"><dict>
		<key>ActivationInfoComplete</key>
		<true />
		<key>ActivationInfoXML</key>
		<data>
		PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz4KPCFET0NUWVBFIHBs
		aXN0IFBVQkxJQyAiLS8vQXBwbGUvL0RURCBQTElTVCAxLjAvL0VOIiAiaHR0cDovL3d3
		dy5hcHBsZS5jb20vRFREcy9Qcm9wZXJ0eUxpc3QtMS4wLmR0ZCI+CjxwbGlzdCB2ZXJz
		aW9uPSIxLjAiPgo8ZGljdD4KCTxrZXk+QWN0aXZhdGlvblJhbmRvbW5lc3M8L2tleT4K
		CTxzdHJpbmc+MDRGNUNCQjEtRjg4Ny00RkFDLUFCN0ItNkJEMEIxNjlGNDkxPC9zdHJp
		bmc+Cgk8a2V5PkFjdGl2YXRpb25SZXF1aXJlc0FjdGl2YXRpb25UaWNrZXQ8L2tleT4K
		CTx0cnVlLz4KCTxrZXk+QWN0aXZhdGlvblN0YXRlPC9rZXk+Cgk8c3RyaW5nPlVuYWN0
		aXZhdGVkPC9zdHJpbmc+Cgk8a2V5PkJhc2ViYW5kTWFzdGVyS2V5SGFzaDwva2V5PgoJ
		PHN0cmluZz40MzM2RDg2NDk4MUI2NUU0Q0REQjIyRkI2NkQ1RUY2MDdCNUU1RTdFPC9z
		dHJpbmc+Cgk8a2V5PkJhc2ViYW5kVGh1bWJwcmludDwva2V5PgoJPHN0cmluZz45RDUw
		QkMyRDMyRjI4QjIwOTkxNDdFNDI4MTM0RjQ3MkM5QkI1NzU2PC9zdHJpbmc+Cgk8a2V5
		PkJ1aWxkVmVyc2lvbjwva2V5PgoJPHN0cmluZz4xMUI1NTRhPC9zdHJpbmc+Cgk8a2V5
		PkRldmljZUNlcnRSZXF1ZXN0PC9rZXk+Cgk8ZGF0YT4KCUxTMHRMUzFDUlVkSlRpQkRS
		VkpVU1VaSlEwRlVSU0JTUlZGVlJWTlVMUzB0TFMwS1RVbEpRbmhFUTBOQlV6QkRRVkZC
		CglkMmRaVFhoTVZFRnlRbWRPVmtKQlRWUktSR1JEVWxSWmVVNUVRa0pNVlVVelVrUmpk
		RTVFUlhwTmFURkNVVlJOTWdwTQoJVlU1RVQwUlNSVTFWVVRSUmEwWkNVa1JGVEUxQmEw
		ZEJNVlZGUW1oTlExWldUWGhEZWtGS1FtZE9Wa0pCWjFSQmEwNUMKCVRWSkpkMFZCV1VS
		V1VWRklDa1YzYkVSa1dFSnNZMjVTY0dKdE9IaEZla0ZTUW1kT1ZrSkJiMVJEYTBaM1kw
		ZDRiRWxGCgliSFZaZVRSNFJIcEJUa0puVGxaQ1FYTlVRbTFzVVdGSE9YVUtXbFJEUW01
		NlFVNUNaMnR4YUd0cFJ6bDNNRUpCVVVWRwoJUVVGUFFtcFJRWGRuV1d0RFoxbEZRVGg2
		YXpKUWNWTlpiVVpKZFdKc2RYTTNja05aYmpZNVdRcENRV1pJUjBOblRrMDMKCVVEVkRa
		a0UxYUZSRlFqZGFlSGRDZEhFMWRUSm1iREpRUzJvMFprdEJVbVJXVTA5SVNFWk9URFJQ
		YVVGMFFYRXdjMVoxCglOM05JQ2tSU1lrRjJLMDA1UjJaSGFsVnhTRFF2Y0dWWU1UbHJW
		a1FyZDFOT2QzZENOSEJrY3k4eWMxWXlXVUp4VFZoSgoJYjFCWGRFczRXRXhFYlRRMk1W
		bzVWRE1LVUcxVFN6SkNhV1J4UjNwSFRFOXhRVWxYVFVOQmQwVkJRV0ZCUVUxQk1FZEQK
		CVUzRkhVMGxpTTBSUlJVSkNVVlZCUVRSSFFrRklPQzlEU1dZeVNHUkJZd3AwWWxsTWJu
		VnJlRE5CYmxaNU1tZ3JaRmhWCglRMWh2YWxSWFYwSlJXR2x5TTB4UVpFSTVNMFJrVTJ4
		b1FVOUViU3RxU0dOUFNFaHNVRmhRYjBaNFNrZEhDa1ZaVEZOWAoJUzB0eFpXNW5MM05w
		UVM5YWJYQlFUMDl5U1Zoa01uWlpVMjlUVkN0SWRFTk1iR0ZQTVRWSE5HUlZXamc0Y0Vw
		RVFsVTAKCU5YZEpOMHR2YkdjS2FVNTVXbkZUUjNwcVpVUnhNelpJWjBGSVpXZDJjR2h6
		WW5SU2FWQkdkSGtLTFMwdExTMUZUa1FnCglRMFZTVkVsR1NVTkJWRVVnVWtWUlZVVlRW
		QzB0TFMwdENnPT0KCTwvZGF0YT4KCTxrZXk+RGV2aWNlQ2xhc3M8L2tleT4KCTxzdHJp
		bmc+aVBob25lPC9zdHJpbmc+Cgk8a2V5PkRldmljZVZhcmlhbnQ8L2tleT4KCTxzdHJp
		bmc+QTwvc3RyaW5nPgoJPGtleT5GTWlQQWNjb3VudEV4aXN0czwva2V5PgoJPGZhbHNl
		Lz4KCTxrZXk+SW50ZWdyYXRlZENpcmN1aXRDYXJkSWRlbnRpdHk8L2tleT4KCTxzdHJp
		bmc+ODkzMzEwMzYxMTE3NzYwMTQ0MDU8L3N0cmluZz4KCTxrZXk+SW50ZXJuYXRpb25h
		bE1vYmlsZUVxdWlwbWVudElkZW50aXR5PC9rZXk+Cgk8c3RyaW5nPjAxMjc0NTAwODA2
		NzE4OTwvc3RyaW5nPgoJPGtleT5JbnRlcm5hdGlvbmFsTW9iaWxlU3Vic2NyaWJlcklk
		ZW50aXR5PC9rZXk+Cgk8c3RyaW5nPjIwODEwMzY4ODQ0MzkyMTwvc3RyaW5nPgoJPGtl
		eT5Nb2RlbE51bWJlcjwva2V5PgoJPHN0cmluZz5NQzYwNDwvc3RyaW5nPgoJPGtleT5Q
		cm9kdWN0VHlwZTwva2V5PgoJPHN0cmluZz5pUGhvbmUzLDE8L3N0cmluZz4KCTxrZXk+
		UHJvZHVjdFZlcnNpb248L2tleT4KCTxzdHJpbmc+Ny4wLjQ8L3N0cmluZz4KCTxrZXk+
		UmVnaW9uQ29kZTwva2V5PgoJPHN0cmluZz5GQjwvc3RyaW5nPgoJPGtleT5SZWdpb25J
		bmZvPC9rZXk+Cgk8c3RyaW5nPkZCL0E8L3N0cmluZz4KCTxrZXk+U0lNU3RhdHVzPC9r
		ZXk+Cgk8c3RyaW5nPmtDVFNJTVN1cHBvcnRTSU1TdGF0dXNPcGVyYXRvckxvY2tlZDwv
		c3RyaW5nPgoJPGtleT5TZXJpYWxOdW1iZXI8L2tleT4KCTxzdHJpbmc+ODIxMjFUVkhE
		Wlo8L3N0cmluZz4KCTxrZXk+U3VwcG9ydHNQb3N0cG9uZW1lbnQ8L2tleT4KCTx0cnVl
		Lz4KCTxrZXk+VW5pcXVlQ2hpcElEPC9rZXk+Cgk8aW50ZWdlcj4zODEyNDcyMzE5NDc3
		PC9pbnRlZ2VyPgoJPGtleT5VbmlxdWVEZXZpY2VJRDwva2V5PgoJPHN0cmluZz42OTk3
		MjQ2ZDYyNzBlNmE4MzhlOGEwZDM5ODI1YzZkZmEzY2U2OTI1PC9zdHJpbmc+CjwvZGlj
		dD4KPC9wbGlzdD4K
		</data>
		<key>FairPlayCertChain</key>
		<data>
		MIICxDCCAi2gAwIBAgINMzOvBwQCrwACrwAACTANBgkqhkiG9w0BAQUFADB7MQswCQYD
		VQQGEwJVUzETMBEGA1UEChMKQXBwbGUgSW5jLjEmMCQGA1UECxMdQXBwbGUgQ2VydGlm
		aWNhdGlvbiBBdXRob3JpdHkxLzAtBgNVBAMTJkFwcGxlIEZhaXJQbGF5IENlcnRpZmlj
		YXRpb24gQXV0aG9yaXR5MB4XDTA3MDQwMjE1MTczMVoXDTEyMDMzMTE1MTczMVowZzEL
		MAkGA1UEBhMCVVMxEzARBgNVBAoTCkFwcGxlIEluYy4xFzAVBgNVBAsTDkFwcGxlIEZh
		aXJQbGF5MSowKAYDVQQDEyFpUGhvbmUuMzMzM0FGMDcwNDAyQUYwMDAyQUYwMDAwMDkw
		gZ8wDQYJKoZIhvcNAQEBBQADgY0AMIGJAoGBAKr7DLjhwmoN9fcRzxMqoXsKyt6xQEGA
		wUoDOOOskRi6ZfVsNNTMxBXA8kI5ScpKPlg0z96dSqFUJ7FMXVs83i/aEXvQ8a52umhh
		/ePfcVury6vdObxqYATGMdoMKaxxXbr9NRFqSDECtpvRMDi49F62I96nbOf2zb3yEm0g
		0ZSVAgMBAAGjYDBeMA4GA1UdDwEB/wQEAwIDuDAMBgNVHRMBAf8EAjAAMB0GA1UdDgQW
		BBT/NPaEGuRncuvyoUVf488EOPPC3zAfBgNVHSMEGDAWgBT6DdQRkRvmsk4eBkmUEd1j
		YgdZZDANBgkqhkiG9w0BAQUFAAOBgQAAj3smp0V6bUhZNBX0Gsxlrt47Bor099LB1RQl
		TdBMBUBiLXcVwaXjOXknQ4oCBrNxAzqPaBsDNNGsbuQu6fjdVhMwvLjKwUPMi+ojCXIm
		hLCtin9ZJzB9HOyUdTZmgIz7dQi5liss+zp/A21njslV/zok8jaQUr9pJfkiW0PIwTCC
		A3EwggJZoAMCAQICAREwDQYJKoZIhvcNAQEFBQAwYjELMAkGA1UEBhMCVVMxEzARBgNV
		BAoTCkFwcGxlIEluYy4xJjAkBgNVBAsTHUFwcGxlIENlcnRpZmljYXRpb24gQXV0aG9y
		aXR5MRYwFAYDVQQDEw1BcHBsZSBSb290IENBMB4XDTA3MDIxNDE5MjA0MVoXDTEyMDIx
		NDE5MjA0MVowezELMAkGA1UEBhMCVVMxEzARBgNVBAoTCkFwcGxlIEluYy4xJjAkBgNV
		BAsTHUFwcGxlIENlcnRpZmljYXRpb24gQXV0aG9yaXR5MS8wLQYDVQQDEyZBcHBsZSBG
		YWlyUGxheSBDZXJ0aWZpY2F0aW9uIEF1dGhvcml0eTCBnzANBgkqhkiG9w0BAQEFAAOB
		jQAwgYkCgYEAsmc8XSrnj/J3z+8xvNEE/eqf0IYpkAqj/2RK72n0CrnvxMRjyjotIT1S
		jCOJKarbF9zLKMRpzXIkwhDB9HgdMRbF5uoZHSozvoCr3BFIBiofDmGBzXmaXRL0hJDI
		fPZ4m1L4+vGIbhBy+F3LiOy2VRSXpE0LwU8nZ5mmpLPX2q0CAwEAAaOBnDCBmTAOBgNV
		HQ8BAf8EBAMCAYYwDwYDVR0TAQH/BAUwAwEB/zAdBgNVHQ4EFgQU+g3UEZEb5rJOHgZJ
		lBHdY2IHWWQwHwYDVR0jBBgwFoAUK9BpR5R2Cf70a40uQKb3R01/CF4wNgYDVR0fBC8w
		LTAroCmgJ4YlaHR0cDovL3d3dy5hcHBsZS5jb20vYXBwbGVjYS9yb290LmNybDANBgkq
		hkiG9w0BAQUFAAOCAQEAwKBz+B3qHNHNxYZ1pLvrQMVqLQz+W/xuwVvXSH1AqWEtSzdw
		OO8GkUuvEcIfle6IM29fcur21Xa1V1hx8D4Qw9Uuuy+mOnPCMmUKVgQWGZhNC3ht0KN0
		ZJhU9KfXHaL/KsN5ALKZ5+e71Qai60kzaWdBAZmtaLDTevSV4P0kiCoQ56No/617+tm6
		8aV/ypOizgM3A2aFkwUbMfZ1gpMv0/DaOTc9X/66zZpwwAaLIu6pzgRuJGk7FlKlwPLA
		rkNwhLshkUPLu7fqW7qT4Ld3ie9NVgQzXc5cWTGn1ztFVhHNrsubDqDP3JOoysVYeAAF
		2Zmr1l6H6pJzNFSjkxikgzCCBLswggOjoAMCAQICAQIwDQYJKoZIhvcNAQEFBQAwYjEL
		MAkGA1UEBhMCVVMxEzARBgNVBAoTCkFwcGxlIEluYy4xJjAkBgNVBAsTHUFwcGxlIENl
		cnRpZmljYXRpb24gQXV0aG9yaXR5MRYwFAYDVQQDEw1BcHBsZSBSb290IENBMB4XDTA2
		MDQyNTIxNDAzNloXDTM1MDIwOTIxNDAzNlowYjELMAkGA1UEBhMCVVMxEzARBgNVBAoT
		CkFwcGxlIEluYy4xJjAkBgNVBAsTHUFwcGxlIENlcnRpZmljYXRpb24gQXV0aG9yaXR5
		MRYwFAYDVQQDEw1BcHBsZSBSb290IENBMIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIB
		CgKCAQEA5JGpCR+R2x5HUOsF7V55hC3rNqJXTFXsixmJ3vlLbPUHqyIwAugYPvhQCdN/
		QaiY+dHKZpwkaxHQo7vkGyrDH5WeegykR4tb1BY3M8vED03OFGnRyRly9V0O1X9fm/Il
		A7pVj01dDfFkNSMVSxVZHbOU9/acns9QusFYUGePCLQg98usLCBvcLY/ATCMt0PPD509
		8ytJKBrI/s61uQ7ZXhzWyz21Oq30Dw4AkguxIRYudNU8DdtiFqujcZJHU1XBry9Bs/j7
		43DN5qNMRX4fTGtQlkGJxHRiCxCDQYczioGxMFjsWgQyjGizjx3eZXP/Z15lvEnYdp8z
		FGWhd5TJLQIDAQABo4IBejCCAXYwDgYDVR0PAQH/BAQDAgEGMA8GA1UdEwEB/wQFMAMB
		Af8wHQYDVR0OBBYEFCvQaUeUdgn+9GuNLkCm90dNfwheMB8GA1UdIwQYMBaAFCvQaUeU
		dgn+9GuNLkCm90dNfwheMIIBEQYDVR0gBIIBCDCCAQQwggEABgkqhkiG92NkBQEwgfIw
		KgYIKwYBBQUHAgEWHmh0dHBzOi8vd3d3LmFwcGxlLmNvbS9hcHBsZWNhLzCBwwYIKwYB
		BQUHAgIwgbYagbNSZWxpYW5jZSBvbiB0aGlzIGNlcnRpZmljYXRlIGJ5IGFueSBwYXJ0
		eSBhc3N1bWVzIGFjY2VwdGFuY2Ugb2YgdGhlIHRoZW4gYXBwbGljYWJsZSBzdGFuZGFy
		ZCB0ZXJtcyBhbmQgY29uZGl0aW9ucyBvZiB1c2UsIGNlcnRpZmljYXRlIHBvbGljeSBh
		bmQgY2VydGlmaWNhdGlvbiBwcmFjdGljZSBzdGF0ZW1lbnRzLjANBgkqhkiG9w0BAQUF
		AAOCAQEAXDaZTC14t+2Mm9zzd5vydtJ3ME/BH4WDhRuZPUc38qmbQI4s1LGQEti+9HOb
		7tJkD8t5TzTYoj75eP9ryAfsfTmDi1Mg0zjEsb+aTwpr/yv8WacFCXwXQFYRHnTTt4sj
		O0ej1W8k4uvRt3DfD0XhJ8rxbXjt57UXF6jcfiI1yiXV2Q/Wa9SiJCMR96Gsj3OBYMYb
		WwkvkrL4REjwYDieFfU9JmcgijNq9w2Cz97roy/5U2pbZMBjM3f3OgcsVuvaDyEO2rpz
		GU+12TZ/wYdV2aeZuTJC+9jVcZ5+oVK3G72TQiQSKscPHbZNnF5jyEuAF1CqitXa5PzQ
		CQc3sHV1IQ==
		</data>
		<key>FairPlaySignature</key>
		<data>
		jzE5vIFneLv9iJ3BNNO9WGfJaSAQO0cxfTRHUw783mluVMzna8BurRJCCdq89q5nsfCB
		85NKZyzHw+TJO6sImUG4gLXeU1COOmRn1T9cqJhqXblKJ78CC1382KV5aX15+ao25As7
		fNtIBOJZGvAuK/nmIV3F+fMPPN0S1yhoAp8=
		</data>
	</dict></textarea>
							: activation-info<br> <input type="text" name="InStoreActivation"
								value="false" size="60px"> : InStoreActivation<br> <input
								type="text" name="ICCID" value="89331036100249024406"
								size="60px"> : ICCID<br> <input type="text" name="guid"
								value="EC1DB0FD.D165CE49.62B9B386.C9F391B8.21F337E5.AFB1E20E.188F4406"
								size="60px"> : guid<br> <input type="text"
								name="AppleSerialNumber" value="82121TVHDZZ" size="60px"> :
							AppleSerialNumber<br> <input type="text" name="IMEI"
								value="012745008067189" size="60px"> : IMEI<br> <input
								type="text" name="IMSI" value="208103685855971" size="60px"> :
							IMSI<br> <br>
							<button type="submit" style="border: 1px dotted #333;">Submit</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div id="jingle-page-wrapper-footer">
		<div id="footer">
			<div id="legal">
				Copyright &copy; 2014 Merruk Technology, Sarl. All rights reserved.|
				<a target="_blank"
					href="http://www.merruk.com/legal/iphone/us/privacy/">Privacy
					Policies</a>| <a target="_blank"
					href="http://www.merruk.com/legal/iphone/us/terms/">Terms &amp;
					Conditions</a>
			</div>
		</div>
	</div>
</body>
</html>
<?php
}
else
{
	header ( "HTTP/1.0 404 Not Found" );
	echo "File Not Found";
	die ( );
}

ob_end_flush ( );
?>