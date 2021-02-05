<?php
session_start();

require('../includes/generalFunction.php');


if(checkLogin())
{
    include('../includes/header.php');
require('../includes/config.php');

require('../includes/users.class.php');
    $error = '';
    $succes= '';
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(count($_POST) > 0)
    {

  
    $username = $_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $confirm = $_POST['confirm'];
    $hashPass= sha1($password);


    if(empty($username) )
    {
        $error = 'invalid';
    }

    if(empty($email))
    {
        $error = 'invalid';
    }
    if(empty($password))
    {
        $error = 'invalid';

    }

            if( empty($error) )
            {
                $userObject =new users();
            $userdata = $userObject->addUser($username,$email,$hashPass);
                $succes = "User Add successfully";

            }
            else
            {
                $error= 'Invalid data ';
            }
        }

  
    
    
    }
    else
    {
       echo ' sorry you can not Browes this page Directily';
    }
    
    
    
    
    include('../templets/admin/add-user.html'); 
    include('../includes/footer.php');

}
else
{
header('location:login.php');
}

?>