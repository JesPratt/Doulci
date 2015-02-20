<?php
session_start ( );

require_once ( 'doulCi.Core.php' );

// Enable Maintenance Support
if ( $doulCi_Maintenance == true )
{
	require_once ( SYS_IMPORTANT_FILES . 'doulCiMaintenance.php' );
}
else
{
	die ( "<!DOCTYPE html>
<html>
	<head>
		<title>Welcome to doulCi ByPass Server Platform from doulCiTeam.</title>
	</head>
	<body>
		<center><b>Welcome to doulCi ByPass Platform.</b></center>
		<br>
                <center><b>Follow Us on Twitter, @MerrukTechnolog and @AquaXetine. and check up our website. www.doulci.net</b></center>
                <br><br>
                " . $doulCi_Adsense . "
	</body>
</html>" );
}

ob_end_flush ( );
?>