<?php
//used for handling login data!!!
session_start();
$username = $_POST['Username']??'';
$password = $_POST['Password']??'';
    if ($username == 'user' && $password =='test'){
        $_SESSION['user'] = $username;
        header("location:/");
    }else{
        echo "Wrong password ble ble";
        require "login.html";
    }
?>