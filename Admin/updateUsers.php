<?php
session_start();
require('../includes/config.php');
require('../includes/generalFunction.php');

require('../includes/users.class.php');

if(checkLogin())
{


    $idUrl =(isset($_GET['id'])) ? (int)$_GET['id'] :0;
    $userObject =new users();
    $error = '';
    $succes= '';
    
    
        if(count($_POST) > 0)
    {

        $username = $_POST['username'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $id = $_POST['id'];
        $hashPass= sha1($password);
     if($userObject->updateUser( $id,$username,$email,$hashPass)) 
     {
         $succes = 'user update';
         header('location:users.php');
     }
     else
     {
         $error = 'invalid data';
     }
    }
    else
    {
        $user =$userObject->getuser($idUrl);
        include('../templets/admin/update-user.html'); 

    }
    
    
    
}
else
{
header('location:login.php');
}

?>