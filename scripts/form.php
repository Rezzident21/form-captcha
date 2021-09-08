<?php
session_start();
require_once(__DIR__.'/Filter.php');
$filter = new Filter();

if(!empty($_POST["send"])) {
    $login = $filter->clearString($_POST["login"]);
    $email = $filter->clearString($_POST["email"]);
//    if(!preg_match("/[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/",$email)){
//
//
//    }

    $captcha = $_POST["captcha"];

    $captchaUser = filter_var($_POST["captcha"], FILTER_SANITIZE_STRING);

    if(empty($captcha)) {
        $captchaError = array(
            "status" => "alert-danger",
            "message" => "Please enter the captcha."
        );
    }
    else if($_SESSION['CAPTCHA_CODE'] == $captchaUser){
        $captchaError = array(
            "status" => "alert-success",
            "message" => "Your form has been submitted successfuly."
        );
    } else {
        $captchaError = array(
            "status" => "alert-danger",
            "message" => "Captcha is invalid."
        );
    }
}