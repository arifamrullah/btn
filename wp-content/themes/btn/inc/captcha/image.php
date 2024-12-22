<?php
include dirname(__FILE__) . "/../../../../../wp-load.php";

if(!isset($_GET['token']))
	$strr = 'ERROR!';
// Else if it is present, set the variable to the session contents
else
	$strr = $_GET['token'];

// Set the content type
header('Content-Type: image/png');
header('Cache-Control: no-cache');

// Create an image from button.png
$image = imagecreatefrompng('button.png');

// Set the font colour
$colour = imagecolorallocate($image, 183, 178, 152);

// Set the font
$font = get_template_directory() . '/inc/captcha/anorexia.ttf';

// Set a random integer for the rotation between -15 and 15 degrees
$rotate = rand(-15, 15);

// Create an image using our original image and adding the detail
imagettftext($image, 14, $rotate, 18, 30, $colour, $font, $strr);

// Output the image as a png
imagepng($image);
?>
