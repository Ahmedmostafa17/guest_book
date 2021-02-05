<?php

session_start();

require('../includes/generalFunction.php');


if(checkLogin())
{
    include('../includes/header.php');

require('../includes/config.php');

require('../includes/users.class.php');
    $userObject =new users();
    $allUsers =$userObject->getusers();

    include('../templets/admin/all-users.html'); 

include('../includes/footer.php');


}
else
{
    header('location:login.php');

}



?>