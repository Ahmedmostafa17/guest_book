<?php
session_start();
require('../includes/generalFunction.php');



if(checkLogin())
{
    $id =(isset($_GET['id'])) ? (int)$_GET['id'] :0;

    require('../includes/config.php');

    require('../includes/messages.class.php');
$errors= ' ';
$sucess = ' ';
$messageObject =new messages();
$message = $messageObject->getMessage($id);

   
    include('../includes/header.php');

  


if($messageObject->deleteMessage($id) )
{
  
    $sucess= 'Message Deleted';

    
    //header('location:products.php');
}
else
{
    $errors = 'Message Not Delete';
}
include('../templets/admin/resultMessage.html'); 

include('../includes/footer.php');

}
else
{
header('location:login.php');
}


 



?>