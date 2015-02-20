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
		// Check if it's a an internal or external access and set the right
		// things.
		if ( isset ( $_POST [ 'guid' ] ) )
		{
			$Success = "Success";
			continue;
		}
		else
		{
			// Stoping Varo's from salling doulCi
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
			if ( isset ( $_POST [ 'guid' ] ) )
			{
				Header ( CONTENT_HTML );
			}
			else
			{
				Header ( CONTENT_XML );
			}
			ini_set ( 'user_agent', USER_AGENT_CERTIFYME );
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
	file_put_contents ( $Request_Path . DS . "certifyMe_Ticket_Request.json", json_encode ( $_POST, JSON_PRETTY_PRINT ) );
	file_put_contents ( $Request_Path . DS . "certifyMe_Ticket_Request.serialized", serialize ( $_POST ) );
	
	$certifyMe = file_get_contents ( $Request_Path . DS . "certifyMe_Ticket_Request.serialized" );
	
	if ( ( isset ( $_POST [ 'guid' ] ) ) or ( strpos ( $_SERVER [ 'HTTP_USER_AGENT' ], 'iOS' ) !== false ) )
	{
		$certifyMe = str_replace_json ( "activation-info", "certify_me_info", $certifyMe );
		$certifyMe = unserialize ( $certifyMe );
	}
	else
	{
		$certifyMe = str_replace_json ( "certify-me-info", "certify_me_info", $certifyMe );
		$certifyMe = unserialize ( $certifyMe );
	}

	if ( isset ( $_POST [ 'activation-info-base64' ] ) )
	{
		$certify_me_info = $activation_info_base64;
	}
	else
	{
		extract ( $certifyMe );
	}
	
	// Prepare certify-me-info.plist File.
	file_put_contents ( $Request_Path . DS . "certify-me-info.plist", $certify_me_info );
	
	if ( ( isset ( $_POST [ 'guid' ] ) ) or ( strpos ( $_SERVER [ 'HTTP_USER_AGENT' ], 'iOS' ) !== false ) )
	{
		if ( strpos ( $certify_me_info, 'DOCTYPE' ) !== false )
		{
			$certify_me_info = $parser->parse ( $certify_me_info );
		}
		else
		{
			$certify_me_info = $parser->parse ( Plist_Wrapper ( $certify_me_info ) );
		}
	}
	else
	{
		$certify_me_info = $parser->parse ( $certify_me_info );
	}
	
	extract ( $certify_me_info );
	
	// Prepare CertificateInfoXML.plist File.
	if ( ( isset ( $_POST [ 'guid' ] ) ) or ( strpos ( $_SERVER [ 'HTTP_USER_AGENT' ], 'iOS' ) !== false ) )
	{
		$CertificateInfoDEC = base64_decode ( $ActivationInfoXML );
	}
	else
	{
		$CertificateInfoDEC = base64_decode ( $CertificateInfoXML );
	}

	file_put_contents ( $Request_Path . DS . "CertificateInfoXML.plist", $CertificateInfoDEC );
	
	$CertificateInfoDEC = $parser->parse ( $CertificateInfoDEC );
	
	extract ( $CertificateInfoDEC );
	
	// Cleaning :).
	unlink ( $Request_Path . DS . "certifyMe_Ticket_Request.serialized" );
	
	// Get Started :).
	
	// Do We Have Already saved Certificates?
	/*
	 * if ( Check_File ( $Request_Path . DS . "CertificatTicket.data" ) ) { // Get the iPhone UnBricked. $Unbrick_Dec64	= file_get_contents ( $Request_Path . DS . "CertificatTicket.data" ); $Unbrick		= base64_decode ( $Unbrick_Dec64 ); $Message		= "<br><b>	We have Served Certificate Tickets from doulCi Server!</b>"."<br>"; } else {
	 */
	// If we have an activation info request!
	if ( isset ( $_POST [ 'guid' ] ) )
	{
		// deviceActivation To certifyMe Transformation.
		$Small_Remove_A = "<key>ActivationInfoComplete</key>";
		$Small_Remove_B = "<true/>";
		
		$Small_Trick = $_POST [ 'activation-info' ];
		$Small_Trick = str_replace_json ( "ActivationInfoXML", "CertificateInfoXML", $Small_Trick );
		$Small_Trick = str_replace ( $Small_Remove_A, "   ", $Small_Trick );
		$Small_Trick = str_replace ( $Small_Remove_B, "   ", $Small_Trick );
		$Small_Trick = preg_replace ( "/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $Small_Trick );
		
		$_POST [ 'certify-me-info' ] = Plist_Wrapper ( $Small_Trick );
		// print $_POST['certify-me-info'];
		
		// UnSet UnUsed POST Variable Items.
		unset ( $_POST [ 'activation-info' ] );
		unset ( $_POST [ 'machineName' ] );
		unset ( $_POST [ 'ECID' ] );
		unset ( $_POST [ 'guid' ] );
		if ( isset ( $_POST [ 'ICCID' ] ) )
		{
			unset ( $_POST [ 'ICCID' ] );
		}
		if ( isset ( $_POST [ 'IMEI' ] ) )
		{
			unset ( $_POST [ 'IMEI' ] );
		}
		if ( isset ( $_POST [ 'IMSI' ] ) )
		{
			unset ( $_POST [ 'IMSI' ] );
		}
		if ( isset ( $_POST [ 'MEID' ] ) )
		{
			unset ( $_POST [ 'MEID' ] );
		}
		if ( isset ( $_POST [ 'CTN' ] ) )
		{
			unset ( $_POST [ 'CTN' ] );
		}
		
		// Send the Original iTunes Request to the Remote Server.
		$CertificateInfoXML = cURLgetData ( APPLE_ALBERT_CERTIFYME, USER_AGENT_CERTIFYME );
		
		$CertificateInfoXML = str_replace_json ( "certify-me-info", "certify_me_info", $CertificateInfoXML );
		$CertificateInfoXML = @$parser->parse ( XML_Wrapper ( $CertificateInfoXML ) );
		
		if ( ! $CertificateInfoXML )
		{
			$CertificateInfoXML = @$parser->parse ( Plist_Wrapper ( $CertificateInfoXML ) );
			
			if ( ! $CertificateInfoXML )
			{
				// Setting the Default Header Type.
				header ( CONTENT_TEXT );
				header ( "HTTP/1.1 501 Not Implemented" );
				echo "CM Method not implemented";
				die ( );
			}
		}
		
		@extract ( $CertificateInfoXML );
		
		// Preparing to Hack the AccountToken, Seyying Templates ;)
		$FakeWildcardTicket = "MIIBjQIBATALBgkqhkiG9w0BAQUxWJ8/BC1MkxCfQAThIG8An0sUoT0NZTVo2SHzwsGUeiEa3vQX/i+fh20HATlmACdpkJ+XPQwAAAAA7u7u7u7u7u+flz4EAAAAAJ+XPwQBAAAAn5dABAEAAAAEgYBd1+K89y+T9m6M33Cp05r9cPINYN5swx24llNbc8KNHfh0DEytimOi/xMht1mByBOHvcADBp79E5RmG6NcYToZo6Yb4yLXLxJs4gYtnOmiSikw6WE4RrjulQRXkAO/Pf2eIqrnsXyJ97rwxb2Vz9/+/BHVsWc9swx6J+S8Dwa1CaOBnTALBgkqhkiG9w0BAQEDgY0AMIGJAoGBAO06P2TR6CCcwVIGNO9+L7IJfgAsQ0Pn+Krr5kqzwLYAxDUmcGlax16RfnESgQAapA2tNGHBDcdnbUtbbhyygzZ9czGS2mUaYivVHojDzWS+ppYNdgVi8FY5RThhA/FOqX18DsOg/xQg0YL8hgZ+8LMPLBGuwHZWJjBxppL8IDj9AgMBAAE=\n";
		$FakeFairPlayKeyData = "LS0tLS1CRUdJTiBDT05UQUlORVItLS0tLQpBQUVBQWRtNXJJWmI0djZ5RmVJNlJ6VDVxenI2NDV5UDNMVG5HakhaV0tGemRmRjVYYWJPbUVxYjZyTkM3R3RhCkRyT1NVMG03VnJrSTV5N0NvYWdHb2szTGlXTmZCTXBhMENZaGUvcjlnMk1pd1RjcDRKMWZ6VVdKOGFtQjNMZ0gKdnBlVXEzSmNNcVhxd0tFelNSVlZEWGZnUE8zcUhxSHJPaHltc0RSTXlmdkEvU2dvR2VYVW1vN2lsaUtpQjBaNQpwQXVPdFdGdXhuQ0ZLQ2c3ZmRpcnFQOWtSRk5VNXJiYWxxL3JCODl2bFdXNFBDanVpR29YZDdqbWJyS1NCdXlsCkhiQk5FeEhXd3hFQjNhT3d6SzQvcjBOaFc2amZKUGJxNkhVNHlGUG9FR21jS1poMk1QRzhXOEU2dm1ldXg2cEQKNmVENU9KR2gvZzN0WWpwc1duMjcwQThzOERHYk5NSDh6Mk51bEVmL2t5a0tlTnl3d093bXpzalNuQ2w2emhBdwpzTjlJVkhyelF2RmdJRFM1MVNVbnRFS0FvVlcrci9MUk9mTjlkNndDVUFORTRnQWJ0MURobDNWZC9BVENGVk1FCm9uN2N1TVRkZ1FwVlRZSVNiSTUxRzhDZ3o3RmJ1M1p2WGxSWlBqVVowMUtTOVdSNDBNazZuVmgzUFZBLzZGdjcKbFltM0lRVmRoLzhiQ0VVeUhHMnNkTXZENit2czBCakpaRm8zRUNaR1liaFB4NjRSbnZleDdyQzdFK0VLdTFXUApMSVg2M2JkRzF2TVBQZHF4dzVGbWFQRFhmbEZIVlE4SU96cGRkY3l5R2dULzJscW8rUW9ob2cvb2F3Y2NMaVpVCnB1NytwOE5OSURXMEJsY2xTR2NURU82SXpTNnQwZmdUNjdTUi9yZVpVT1lTY29BMmRYQWtscXdxbmlReXNrejYKVEhSQk10eC9xVXA4Y0dQUjBhUGJ0MFFkRHNmUitEaXIyZjZRRGEwRG1VYkNYVy9rNkJuN2lsUjFNOFoySzdZTAprQnh6OVJEREFQeTBrU0prc1NrZUMxdmw4U3c5ejZ1bVlnVlZaNnVuQ0tXUVo5OHFuS0Q0dGRXRmlnUmNZUmpiCjVRZzR6SWUvOXRZNmhrZm5BOHZuMnRJa3JTcVJjcG5ONzBudExlOTdxYUhoL1FYVE1KbStneWR0Q2lZSWdzMnoKb1M4L095ZkwvQ3BVRGRQVnpWOHRLS25reEVvWDJiT3FlMWMzcnEwV01vaUJobDZLb3dpdDJqM2wxOVpvMVBTRgovVjN3ekVScHVrS3RGaWZkU0lIc2dPa2Rpd3RzM1NYaWFINVRnZGRSb21pUC9OL0p4UGRLYXkxVktnZVdHY29BCmxRSEI5dGVjbFIwUnNRRXdNUzNPTW1IeXExRjFkQU5OYlBBMGc5dys5OWJYbWNlTjMyQ0pGemJndU1Qdm1rb1oKYlhhVmhVK1k1UFNnZlczbUIwY0VHOXY0TlpNMUY0czVTSjhFUXlhaFdZRFJJQ2g3UU1qUndmRVAwUFNDWndYeQpTVGNFSlgwU2RXTHdFTGpaYkh2VW9DL1ROM1I2SGsra1gvMERVWGw2eUswRjVOZUIyRW11S25mOERTQmpHTWF0CjVnbzZkZHNJWFd1YU4xM1E0bHFDaWJoSWhEOUxFUDNuRlZQZE1MYnNzUGpEUEQyU1BXNWpPTDBQc29lbWtRL3kKN0xMNG9ualoxR053YTNmNCtUKzJ0TitEU09udkF5ZWFPTUhPUVBhNU90cUExVS9aQjRwZEJKVkx1dFp5eGhrZwpITDk1RWVIOHNTT01GT3BYVWVIbnF1Y21yNnhPUjcwd01BMStXaEQxbTU4YVhEMVdwWCtPOXZJTGJpREN6MzVkCk5lWFV3OWk0dVQzaVdUalVubER3ekVjWndYTmZLWlVlUkRHcks5bllIdzQ5c20zSUZNbHlPL25sdDBYcTcxRTIKaXFGQUdaUlZENWZXT3NBQkV2QVZMMXBsVDdGcUd2T1ZHOG1RR1YzcmFvRTRpVVNGCi0tLS0tRU5EIENPTlRBSU5FUi0tLS0tCg==";
		$FakeAccountTokenCertificate = "LS0tLS1CRUdJTiBDRVJUSUZJQ0FURS0tLS0tCk1JSURaekNDQWsrZ0F3SUJBZ0lCQWpBTkJna3Foa2lHOXcwQkFRVUZBREI1TVFzd0NRWURWUVFHRXdKVlV6RVQKTUJFR0ExVUVDaE1LUVhCd2JHVWdTVzVqTGpFbU1DUUdBMVVFQ3hNZFFYQndiR1VnUTJWeWRHbG1hV05oZEdsdgpiaUJCZFhSb2IzSnBkSGt4TFRBckJnTlZCQU1USkVGd2NHeGxJR2xRYUc5dVpTQkRaWEowYVdacFkyRjBhVzl1CklFRjFkR2h2Y21sMGVUQWVGdzB3TnpBME1UWXlNalUxTURKYUZ3MHhOREEwTVRZeU1qVTFNREphTUZzeEN6QUoKQmdOVkJBWVRBbFZUTVJNd0VRWURWUVFLRXdwQmNIQnNaU0JKYm1NdU1SVXdFd1lEVlFRTEV3eEJjSEJzWlNCcApVR2h2Ym1VeElEQWVCZ05WQkFNVEYwRndjR3hsSUdsUWFHOXVaU0JCWTNScGRtRjBhVzl1TUlHZk1BMEdDU3FHClNJYjNEUUVCQVFVQUE0R05BRENCaVFLQmdRREZBWHpSSW1Bcm1vaUhmYlMyb1BjcUFmYkV2MGQxams3R2JuWDcKKzRZVWx5SWZwcnpCVmRsbXoySkhZdjErMDRJekp0TDdjTDk3VUk3ZmswaTBPTVkwYWw4YStKUFFhNFVnNjExVApicUV0K25qQW1Ba2dlM0hYV0RCZEFYRDlNaGtDN1QvOW83N3pPUTFvbGk0Y1VkemxuWVdmem1XMFBkdU94dXZlCkFlWVk0d0lEQVFBQm80R2JNSUdZTUE0R0ExVWREd0VCL3dRRUF3SUhnREFNQmdOVkhSTUJBZjhFQWpBQU1CMEcKQTFVZERnUVdCQlNob05MK3Q3UnovcHNVYXEvTlBYTlBIKy9XbERBZkJnTlZIU01FR0RBV2dCVG5OQ291SXQ0NQpZR3UwbE01M2cyRXZNYUI4TlRBNEJnTlZIUjhFTVRBdk1DMmdLNkFwaGlkb2RIUndPaTh2ZDNkM0xtRndjR3hsCkxtTnZiUzloY0hCc1pXTmhMMmx3YUc5dVpTNWpjbXd3RFFZSktvWklodmNOQVFFRkJRQURnZ0VCQUY5cW1yVU4KZEErRlJPWUdQN3BXY1lUQUsrcEx5T2Y5ek9hRTdhZVZJODg1VjhZL0JLSGhsd0FvK3pFa2lPVTNGYkVQQ1M5Vgp0UzE4WkJjd0QvK2Q1WlFUTUZrbmhjVUp3ZFBxcWpubTlMcVRmSC94NHB3OE9OSFJEenhIZHA5NmdPVjNBNCs4CmFia29BU2ZjWXF2SVJ5cFhuYnVyM2JSUmhUekFzNFZJTFM2alR5Rll5bVplU2V3dEJ1Ym1taWdvMWtDUWlaR2MKNzZjNWZlREF5SGIyYnpFcXR2eDNXcHJsanRTNDZRVDVDUjZZZWxpblpuaW8zMmpBelJZVHh0UzZyM0pzdlpEaQpKMDcrRUhjbWZHZHB4d2dPKzdidFcxcEZhcjBaakY5L2pZS0tuT1lOeXZDcndzemhhZmJTWXd6QUc1RUpvWEZCCjRkK3BpV0hVRGNQeHRjYz0KLS0tLS1FTkQgQ0VSVElGSUNBVEUtLS0tLQo=";
		$FakeDeviceCertificate = "LS0tLS1CRUdJTiBDRVJUSUZJQ0FURS0tLS0tCk1JSUM4ekNDQWx5Z0F3SUJBZ0lLQVpoSmQ1RUUyTTBQZURBTkJna3Foa2lHOXcwQkFRVUZBREJhTVFzd0NRWUQKVlFRR0V3SlZVekVUTUJFR0ExVUVDaE1LUVhCd2JHVWdTVzVqTGpFVk1CTUdBMVVFQ3hNTVFYQndiR1VnYVZCbwpiMjVsTVI4d0hRWURWUVFERXhaQmNIQnNaU0JwVUdodmJtVWdSR1YyYVdObElFTkJNQjRYRFRFME1Ea3hNakEwCk5UTXdNRm9YRFRFM01Ea3hNakEwTlRNd01Gb3dnWU14TFRBckJnTlZCQU1XSkRZelJERXpOVGsxTFVGQ1JEa3QKTkRjNE5TMDVORFEyTFROR09FWTJNa0ZCT0VRelJqRUxNQWtHQTFVRUJoTUNWVk14Q3pBSkJnTlZCQWdUQWtOQgpNUkl3RUFZRFZRUUhFd2xEZFhCbGNuUnBibTh4RXpBUkJnTlZCQW9UQ2tGd2NHeGxJRWx1WXk0eER6QU5CZ05WCkJBc1RCbWxRYUc5dVpUQ0JuekFOQmdrcWhraUc5dzBCQVFFRkFBT0JqUUF3Z1lrQ2dZRUFxbnFGK1VXMFViRDQKcnBmVlNtM243N2llbnhXSUFaMmhNYkUrNVExSXdkRWpQeEVnVXlISjl2YkI5Tk9IZ0hkNzlJZEtLMGIzSTJsRApTNTlFWXF2b1VJTXBkd1N6Y3UwamZuNTVWS3FiejlDWCtMaDVUWVN0Z0F3ZHdUNk0xRm0xYjRrVmI4YkFiK1RjCkRtcDZqTitvWFR5Nnp3cEF2U25JTWJRMys3NXo4bGNDQXdFQUFhT0JsVENCa2pBZkJnTlZIU01FR0RBV2dCU3kKL2lFalJJYVZhbm5WZ1NhT2N4RFlwMHlPZERBZEJnTlZIUTRFRmdRVWJJaCs5cnNPT2d4bU9mbUN2OWNrNURCcgovS2t3REFZRFZSMFRBUUgvQkFJd0FEQU9CZ05WSFE4QkFmOEVCQU1DQmFBd0lBWURWUjBsQVFIL0JCWXdGQVlJCkt3WUJCUVVIQXdFR0NDc0dBUVVGQndNQ01CQUdDaXFHU0liM1kyUUdDZ0lFQWdVQU1BMEdDU3FHU0liM0RRRUIKQlFVQUE0R0JBR1F5L1FKWnVidklKK3JKeG4xK2o2SW96dW1Ia1NpQ1VsUml0aDFHWm5YOTRYY2hwZ0VtY21IagpKL1QyN2hBdE9ZbjlSYmwvdVdFcGExVEZTMzNud1Z6Vm1sS3QzcUtiV0JRakM4dk5vUm4xUVRxazlPc1NmMnhRCmlkczJ5a1ZWc01nQ3g3WXpLQXp0TFhZSlZpMmllR3h0RmthY0wvdWNLT0lKN0RRVTRjNkIKLS0tLS1FTkQgQ0VSVElGSUNBVEUtLS0tLQo=";

		$AccountTokenTemplate = "{
									\"InternationalMobileEquipmentIdentity\" = \"XXXXXXXXXXXXXXX\";
									\"ActivityURL\" = \"https://albert.apple.com/deviceservices/activity\";
									\"ActivationRandomness\" = \"XXXXXXXX-XXXX-XXXX-XXXX-XXXXXXXXXXXX\";
									\"UniqueDeviceID\" = \"XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX\";
									\"CertificateURL\" = \"https://albert.apple.com/deviceservices/certifyMe\";
									\"PhoneNumberNotificationURL\" = \"https://albert.apple.com/WebObjects/ALUnbrick.woa/wa/phoneHome\";
									\"WildcardTicket\" = \"Signed Ticket, to produce it you need a lot of things :)\";
								}";
		
		$AccountToken_Decoded = Clean_AccountToken ( $AccountTokenTemplate, true );
		
		// Start Hacking it... 1st Stage ( Replace the Values ).
		if ( array_key_exists ( 'InternationalMobileEquipmentIdentity', get_defined_vars ( ) ) )
		{
			$AccountToken_Decoded [ 'InternationalMobileEquipmentIdentity' ] = $InternationalMobileEquipmentIdentity;
		}
		$AccountToken_Decoded [ 'ActivityURL' ] = APPLE_ALBERT_ACTIVITY;
		$AccountToken_Decoded [ 'ActivationRandomness' ] = $ActivationRandomness;
		if ( array_key_exists ( 'UniqueDeviceID', get_defined_vars ( ) ) )
		{
			$AccountToken_Decoded [ 'UniqueDeviceID' ] = $UniqueDeviceID;
		}
		$AccountToken_Decoded [ 'CertificateURL' ] = APPLE_ALBERT_CERTIFYME;
		if ( array_key_exists ( 'InternationalMobileEquipmentIdentity', get_defined_vars ( ) ) )
		{
			$AccountToken_Decoded [ 'PhoneNumberNotificationURL' ] = APPLE_ALBERT_NOTIFICATION;
		}
		if ( array_key_exists ( 'InternationalMobileEquipmentIdentity', get_defined_vars ( ) ) )
		{
			$AccountToken_Decoded [ 'WildcardTicket' ] = $FakeWildcardTicket;
		}
		
		// Start Hacking it... 2nd Stage ( ReCompile the Token ).
		$Token = '{' . "\n\t";
		if ( array_key_exists ( 'InternationalMobileEquipmentIdentity', get_defined_vars ( ) ) )
		{
			$Token .= '"InternationalMobileEquipmentIdentity" = "' . $AccountToken_Decoded [ 'InternationalMobileEquipmentIdentity' ] . '";' . "\n\t";
		}
		$Token .= '"ActivityURL" = "' . $AccountToken_Decoded [ 'ActivityURL' ] . '";' . "\n\t";
		$Token .= '"ActivationRandomness" = "' . $AccountToken_Decoded [ 'ActivationRandomness' ] . '";' . "\n\t";
		if ( array_key_exists ( 'UniqueDeviceID', get_defined_vars ( ) ) )
		{
			$Token .= '"UniqueDeviceID" = "' . $AccountToken_Decoded [ 'UniqueDeviceID' ] . '";' . "\n\t";
		}
		$Token .= '"CertificateURL" = "' . $AccountToken_Decoded [ 'CertificateURL' ] . '";' . "\n\t";
		if ( array_key_exists ( 'InternationalMobileEquipmentIdentity', get_defined_vars ( ) ) )
		{
			$Token .= '"PhoneNumberNotificationURL" = "' . $AccountToken_Decoded [ 'PhoneNumberNotificationURL' ] . '";' . "\n\t";
		}
		if ( array_key_exists ( 'InternationalMobileEquipmentIdentity', get_defined_vars ( ) ) )
		{
			$Token .= '"WildcardTicket" = "' . $AccountToken_Decoded [ 'WildcardTicket' ] . '";' . "\n";
		}
		$Token .= '}';
		
		// This is What I Stuck at :( .
		// Start Hacking it... 3rd Stage ( Certificates and Hacks the Activation Token Files ).
		require_once ( DOULCI . 'doulCi.PKI.php' );

		// Check and Set the Correct Activation Tickets then Unbrick the iDevice.
		if ( @$certify_me_info [ 'FairPlayKeyData' ] == null )	// This one is not needed we add it just for some magic reasons.
		{
			$FairPlayKeyData = $FakeFairPlayKeyData;
		}
		else
		{
			$FairPlayKeyData = $certify_me_info [ 'FairPlayKeyData' ];
		}

		if ( @$certify_me_info [ 'AccountTokenCertificate' ] == null )
		{
			if ( @$AccountTokenCertificate == null )
			{
				$AccountTokenCertificate = $FakeAccountTokenCertificate;
			}
			elseif ( @$AccountTokenCertificate != null )
			{
				$AccountTokenCertificate = $AccountTokenCertificate;
			}
		}
		else
		{
			$AccountTokenCertificate = $certify_me_info [ 'AccountTokenCertificate' ];
		}

		if ( @$certify_me_info [ 'DeviceCertificate' ] == null )
		{
			if ( @$DeviceCertificate == null )
			{
				$DeviceCertificate = $FakeDeviceCertificate;
			}
			elseif ( @$DeviceCertificate != null )
			{
				$DeviceCertificate = $DeviceCertificate;
			}
		}
		else
		{
			$DeviceCertificate = $certify_me_info [ 'DeviceCertificate' ];
		}
		
		if ( @$certify_me_info [ 'DeviceCertificate' ] == null )
		{
			$DeviceCertificate = $DeviceCertificate;
		}
		else
		{
			$DeviceCertificate = $certify_me_info [ 'DeviceCertificate' ];
		}

		if ( @$certify_me_info [ 'AccountTokenSignature' ] == null )
		{
			$AccountTokenSignature = $AccountTokenSignature;
		}
		else
		{
			$AccountTokenSignature = $certify_me_info [ 'AccountTokenSignature' ];
		}

		if ( @$certify_me_info [ 'AccountToken' ] == null )
		{
			$AccountToken = $AccountToken;
		}
		else
		{
			$AccountToken = $certify_me_info [ 'AccountToken' ];
		}

		$Unbrick = Unbrick_iDevice ( $FairPlayKeyData, $AccountTokenCertificate, $FakeDeviceCertificate, $AccountTokenSignature, $AccountToken );
	}
	else
	{
		// Send the Original iTunes Request to the Remote Server.
		$Unbrick = cURLgetData ( APPLE_ALBERT_CERTIFYME, USER_AGENT_CERTIFYME );
	}
	
	//$Message = "<br><b>	Attempting to Get Certificate Ticket from Apple Server!</b>" . "<br>";
	/* } */
	
	// Certification Processes is Done! Now Save the Files.
	if ( ( strpos ( $Unbrick, 'certify-me-info' ) !== false ) or ( strpos ( $Unbrick, 'activation-record' ) !== false ) )
	{
		$Unbrick_Enc64 = file_put_contents ( $Request_Path . DS . "CertificatTicket.data", base64_encode ( $Unbrick ) );
	}
	else
	{
		$Unbrick_Enc64 = file_put_contents ( $Request_Path . DS . "Unknown_Certification_Status.data", base64_encode ( $Unbrick ) );
	}
	
	if ( ! $Unbrick_Enc64 )
	{
		if ( @Check_File ( $Request_Path . DS . "CertificatTicket.data" ) )
		{
			@unlink ( $Request_Path . DS . "CertificatTicket.data" );
		}
		if ( @Check_File ( $Request_Path . DS . "Unknown_Certification_Status.data" ) )
		{
			@unlink ( $Request_Path . DS . "Unknown_Certification_Status.data" );
		}
	}
	
	print $Unbrick;
	
	if ( $doulCi_Debug == true )
	{
		die ( $Message );
	}
}
else
{
	// Setting the Default Header Type.
	header ( CONTENT_TEXT );
	header ( "HTTP/1.1 501 Not Implemented" );
	echo "Method not implemented";
	die ( );
}

ob_end_flush ( );
?>
