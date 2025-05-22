<?php

interface StockProductRepositoryInterface{

    public function save(StockProduct $stockProduct): int;
    public function findByStockId(int $id): array;
    public function deleteAll(int $id): array;
    public function deleteByProductId(int $productId): void;

}