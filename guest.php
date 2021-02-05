<?php

session_start();
require('includes/config.php');
require('includes/messages.class.php');
include('templets/header.html');
$error = '';
$succes= '';
$objectMessages = new messages();
$allmessages = $objectMessages->getMessages();



if(isset($_POST['submit']))
{

    $title = $_POST['title'];
    $content = $_POST['content'];
    $writerName = $_POST['writerName'];
    $writerEmail = $_POST['writerEmail'];

    if(empty($title) )
    {
        $error = 'invalid';
    }

    if(empty($content))
    {
        $error = 'invalid';
    }
    if(empty($writerName))
    {
        $error = 'invalid';

    }
    if(empty($writerEmail))
    {
        $error = 'invalid';

    }


            if( empty($error) )
            {
            $objectMessages->addMessage($title,$content,$writerName,$writerEmail);
                $succes = "Messages Add successfully";

            }
            else
            {
                $error= 'Invalid data ';
            }
       

}
else
{
  
}
include('templets/guestbook.html');
include('templets/footer.html');

?>