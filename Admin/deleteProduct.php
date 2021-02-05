<?php
session_start();
require('../includes/generalFunction.php');



if(checkLogin())
{
    $id =(isset($_GET['id'])) ? (int)$_GET['id'] :0;

    require('../includes/config.php');

    require('../includes/products.class.php');
$errors= ' ';
$sucess = ' ';
$productObject =new products();
$product = $productObject->getProduct($id);

   
    include('../includes/header.php');

  


if($productObject->deleteProducts($id) )
{
    unlink('../uploads/'.$product['image']);
    $sucess= 'product Deleted';

    
    //header('location:products.php');
}
else
{
    $errors = 'Product Not Delete';
}
include('../templets/admin/resultMessage.html'); 

include('../includes/footer.php');

}
else
{
header('location:login.php');
}


 



?>