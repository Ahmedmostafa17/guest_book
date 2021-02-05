<?php
require('includes/config.php');

require('includes/products.class.php');

$objectProduct = new products();
$products = $objectProduct->getProducts();


include('templets/header.html');

include('templets/products.html');
include('templets/footer.html');
?>