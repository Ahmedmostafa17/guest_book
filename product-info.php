<?php
    require('includes/config.php');

    require('includes/products.class.php');
    $id =(isset($_GET['id'])) ? (int)$_GET['id'] :0;

    $objectProduct = new products();
    $product = $objectProduct->getProduct($id);
if($product && count($product) >0)
{include('templets/header.html');
    include('templets/product-info.html');

    include('templets/footer.html');

}

?>