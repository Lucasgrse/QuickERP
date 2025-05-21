<?php
class StockProductsId {
    public int $stockId;
    public int $productId;

    public function __construct(int $stockId, int $productId){
        $this->stockId = $stockId;
        $this->productId = $productId;
    }
}