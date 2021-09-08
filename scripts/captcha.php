<?php
require 'functions.php';
session_start();

$captcha_code = readable_random_string();

// Assign captcha in session
$_SESSION['CAPTCHA_CODE'] = $captcha_code;

// Create captcha image
$layer = imagecreatetruecolor(200, 37);
$captcha_bg = imagecolorallocate($layer, 147	, 166, 137);
imagefill($layer, 0, 0, $captcha_bg);
$captcha_text_color = imagecolorallocate($layer, 0, 0, 0);
imagestring($layer, 15, 55, 10, $captcha_code, $captcha_text_color);
header("Content-type: image/jpeg");
imagejpeg($layer);

?>