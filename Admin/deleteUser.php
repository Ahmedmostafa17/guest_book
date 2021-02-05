<?php
session_start();

require('../includes/generalFunction.php');

if(checkLogin())
{
    require('../includes/config.php');

require('../includes/users.class.php');

$id =(isset($_GET['id'])) ? (int)$_GET['id'] :0;
$userObject =new users();
if($userObject->deleteUser($id))
{
    echo 'user deleted';
    header('location:users.php');
}
else
{
    echo 'invalid';
}

}
else
{
    header('location:login.php');

}






?>