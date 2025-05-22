<?php
require_once 'StockProductsIp.php';

class StockProduct {
    public StockProductsId $id;
    public int $quantity;

    public function __construct(StockProductsId $id, int $quantity) {
        $this->id = $id;
        $this->quantity = $quantity;
    }

    public function getStockId(): int {
        return $this->id->stockId;
    }

    public function getProductId(): int {
        return $this->id->productId;
    }
}