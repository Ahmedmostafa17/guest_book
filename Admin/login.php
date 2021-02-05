<?php
session_start();
require('../includes/config.php');
require('../includes/generalFunction.php');

require('../includes/users.class.php');
if(checkLogin())

    echo 'you are login';
    $error= '';
    $succes= '';

   if(isset($_POST['submit']))
   {

    $username= $_POST['username'];
    $password = $_POST['password'];
    $hashPass= sha1($password);
    $login =new users();
    $userData = $login->login($username,$hashPass);
    if($userData && count($userData > 0))
    {
        $_SESSION['user']= $userData;
        $succes = 'Login Successfully';
        header('location:index.php');
        exit;
    }
    else
    {
        $error ='Invalid Username or Password ';
    }

   }



include('../templets/admin/login1.html'); 

?>



