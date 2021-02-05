<?php
session_start();
require('../includes/generalFunction.php');


if(checkLogin())
{
    include('../includes/header.php');
require('../includes/config.php');

require('../includes/products.class.php');

    $objectProduct = new products();
    $allProducts = $objectProduct->getProducts();
    include('../templets/admin/all-products.html'); 
    include('../includes/footer.php');

}
else
{
    
header('location:login.php');


}







?>