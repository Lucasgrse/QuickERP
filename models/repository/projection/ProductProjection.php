<?php

interface ProductProjection {
    public function getId(): int;
    public function getName(): string;
    public function getPrice(): float;
    public function getStockQty(): int;
}
