<?php


function checkLogin(){

    return isset($_SESSION['user'])? true: false ;
}


?>