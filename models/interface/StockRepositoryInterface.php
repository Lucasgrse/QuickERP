<?php
interface StockRepositoryInterface {

    public function save(Stock $stock): void;
    public function delete(int $id): void;
    public function copy(Stock $stock): void;
     public function findById(int $id): ?Stock;
     public function findAll(): array;
     public function deleteByProductId(int $productId): void;
     public function findByProductId(int $productId): ?Stock;
}