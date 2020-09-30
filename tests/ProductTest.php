<?php
use PHPUnit\Framework\TestCase;
chdir(__DIR__);
require_once '../Models/Product.php';

class ProductTest extends TestCase {
    private $Product;
    protected function setUp(): void
    {
        $this->Product = new Product();
    }
    protected function tearDown(): void
    {
        $this->Product = null;
    }

    public function test_get_product_by_id() {
        $TestProduct = $this->Product->getProductById("5f744a1460caa");
        $this->assertEquals("Product 2", $TestProduct->ProductName);
    }
}