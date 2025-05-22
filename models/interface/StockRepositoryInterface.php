<?php
interface StockRepositoryInterface {

    public function save(Stock $stock): int;
    public function delete(int $id): void;
    public function copy(Stock $stock): void;
     public function findById(int $id): ?Stock;
     public function findAll(): array;
}