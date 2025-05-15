<?php
require_once 'OrderRequestId.php';

class OrderRequest {
    public OrderRequestId $id;
    public int $quantity;
    public float $unitaryPrice;

    public function __construct(int $id = null, int $quantity = 0, float $unitaryPrice = 0.0) {
        $this->id = $id;
        $this->quantity = $quantity;
        $this->unitaryPrice = $unitaryPrice;
    }

    public function getRequestId(): int {
        return $this->id ? $this->id->requestId : 0;
    }

    public function getProductId(): int {
        return $this->id ? $this->id->productId : 0;
    }
}