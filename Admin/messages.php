<?php
session_start();
require('../includes/generalFunction.php');


if(checkLogin())
{
    include('../includes/header.php');
require('../includes/config.php');

require('../includes/messages.class.php');

    $objectMessages = new messages();
    $allmessages = $objectMessages->getMessages();
    include('../templets/admin/all-messages.html'); 
    include('../includes/footer.php');

}
else
{
    
header('location:login.php');


}







?>