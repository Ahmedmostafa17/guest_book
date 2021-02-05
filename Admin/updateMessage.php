<?php
session_start();

require('../includes/generalFunction.php');


if(checkLogin())
{
    require('../includes/config.php');

    require('../includes/messages.class.php');

    $idUrl =(isset($_GET['id'])) ? (int)$_GET['id'] :0;
    $messagesrObject =new messages();
    $error = '';
    $succes= '';
    
    
        if(count($_POST) > 0)
    {

        $title = $_POST['title'];
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