<?php
session_start ( );

require_once ( 'doulCi.Core.php' );
Header ( CONTENT_XML );
$Unbrick = cURLgetData ( "https://50.116.17.87/Get_Access?access=request", "GadgetWide v.0.0.1" );

print $Unbrick;

ob_end_flush ( );
?>