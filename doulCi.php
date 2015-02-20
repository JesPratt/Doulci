<?php
require_once ( 'doulCi.Core.php' );

require ( DOULCI . DS . 'doulCiCaptcha.php' );
session_start ( );
writeImage ( 220, 90, 4, 40, 45, ROOT . DS . "ITCKRIST.TTF", "255, 255, 255", "255, 100, 25" );

// Accessing MD5 of generated captcha for later verififcation
$MD5 = $_SESSION [ 'CaptchaCode' ];
?>