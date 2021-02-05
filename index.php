<?php
require('includes/config.php');

require('includes/products.class.php');

$objectProduct = new products();
$products = $objectProduct->getProducts("ORDER BY `id` DESC LIMIT 3");

include('templets/header.html');

include('templets/index.html');
include('templets/footer.html');

?>