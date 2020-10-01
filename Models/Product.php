<?php
chdir(__DIR__);
require_once './ProductMockData.php';
class Product {
    private $ProductsDataArr = array();

    public function __construct()
    {
        $this->ProductsDataArr =  json_decode(ProductMockData::getData());
    }

    public function getProducts() {
        return $this->ProductsDataArr;
    }

    public function filterProducts($Property, $Value) {
        $ProductsArr = array_filter($this->ProductsDataArr, function ($ItemObj) use($Property, $Value) {
           return $ItemObj->$Property == $Value;
        });
        $ProductsArr = array_values($ProductsArr);
        return $ProductsArr;
    }

    public function getProductsPrice($ProductsArr) {
        $PricesArr = array_map(function ($ItemObj) {
            return $ItemObj->Price;
        }, $ProductsArr);
        return array_sum($PricesArr);
    }

    public function getProductById($ProductId) {
        $ProductsArr = array_filter($this->ProductsDataArr, function ($ItemObj) use($ProductId) {
            return $ItemObj->ProductId == $ProductId;
        });
        return $ProductsArr[0];
    }
}