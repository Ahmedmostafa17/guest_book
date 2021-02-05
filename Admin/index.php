<?php

session_start();
require('../includes/generalFunction.php');


if(checkLogin())

{
    include('../includes/header.php');

    include('../templets/admin/index.html');
    include('../includes/footer.php');


}
else
{
    header('location:login.php');
}

?>