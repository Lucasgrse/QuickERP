<?php

class ProductProjectionImpl implements ProductProjection {
    private int $id;
    private string $name;
    private float $price;
    private int $stockQty;

    public function __construct(int $id, string $name, float $price, int $stockQty) {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->stockQty = $stockQty;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getPrice(): float {
        return $this->price;
    }

    public function getStockQty(): int {
        return $this->stockQty;
    }
}
