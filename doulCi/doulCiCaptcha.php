<?php

// ################################################################################################################
// # - Completely Automated Public Turing test to tell Computers and Humans
// Apart Written by: Devji Chhanga # #
// # - See Readme # #
// ################################################################################################################
function getRandChr ( ) // Function to generate random alphabet
{
	$con = array (
				"a" => 'a',
				"b" => 'b',
				"c" => 'c',
				"d" => 'd',
				"e" => 'e',
				"f" => 'f',
				"g" => 'g',
				"h" => 'h',
				"i" => 'i',
				"j" => 'j',
				"k" => 'k',
				"l" => 'l',
				"m" => 'm',
				"n" => 'n',
				"o" => 'o',
				"p" => 'p',
				"q" => 'q',
				"r" => 'r',
				"s" => 's',
				"t" => 't',
				"u" => 'u',
				"v" => 'v',
				"w" => 'w',
				"x" => 'x',
				"y" => 'y',
				"z" => 'z',
				"A" => 'A',
				"B" => 'B',
				"C" => 'C',
				"D" => 'D',
				"E" => 'E',
				"F" => 'F',
				"G" => 'G',
				"H" => 'H',
				"J" => 'J',
				"K" => 'K',
				"L" => 'L',
				"M" => 'M',
				"N" => 'N',
				"O" => 'O',
				"P" => 'P',
				"Q" => 'Q',
				"R" => 'R',
				"S" => 'S',
				"T" => 'T',
				"U" => 'U',
				"V" => 'V',
				"W" => 'W',
				"X" => 'X',
				"Y" => 'Y',
				"Z" => 'Z' 
	); // An array of aplphabets
	$rand = array_rand ( $con ); // get random alphabet
	$chr = $rand;
	return $chr;
}

function writeImage ( $width, $height, $strLen, $fontSize, $angMax, $font, $penColorRGB, $backColorRGB )
{
	$im = Imagecreate ( $width, $height );
	$backColorArray = explode ( ',', $backColorRGB ); // Get RGB componenets
	                                               // from string
	$penColorArray = explode ( ',', $penColorRGB );
	$backColor = imagecolorallocate ( $im, $backColorArray [ 0 ], $backColorArray [ 1 ], $backColorArray [ 2 ] ); // allocate
	                     // color
	                     // for
	                     // background
	$penColor = imagecolorallocate ( $im, $penColorArray [ 0 ], $penColorArray [ 1 ], $penColorArray [ 2 ] ); // allocate
	                    // color
	                    // for
	                    // writing
	$x = 20; // Start writing from $x with initial 20 pixels left blank
	$y = $fontSize + 20;
	$str = ""; // Declaration just to avoid "undefined variable" warning
	for ( $i = 0; $i <= $strLen - 1; $i ++ )
	{
		$chr = getRandChr ( ); // Generate a random character
		$str .= "$chr"; // Append to a string, for storing to SESSION
		$angle = rand ( 0, $angMax ); // Set angle between 0 to $angMax
		if ( rand ( 0, 1 ) == 0 )
		{ // Set Positive or Negative angle randomly
			$angle = - $angle;
		}
		ImageTTFText ( $im, $fontSize, $angle, $x, $y, $penColor, $font, $chr );
		$x = $x + 50; // Increment in x coordinate
	}
	$_SESSION [ 'CaptchaCode' ] = md5 ( $str ); // Assuming session is already
	                                      // started, final CAPTCHA string
	                                      // is stored in session
	header ( 'Content-type: image/jpeg' ); // Set header
	imagejpeg ( $im ); // produce jpeg image
	imagedestroy ( $im ); // free-up temporary memory used to store image
}

?>