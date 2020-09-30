<?php
require_once '../Models/Product.php';
$Products = isset($_GET['products']) ? $_GET['products'] : null;

if ($Products) {
    $Prod = new Product();
    echo json_encode($Prod->getProducts());
}