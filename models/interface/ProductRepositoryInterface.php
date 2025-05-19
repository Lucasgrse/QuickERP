<?php
interface ProductRepositoryInterface {

    public function save(Product $product): int;
    public function delete(int $id): void;
    public function copy(Product $product ): void;
    public function findById(int $id): ?Product;
     public function findAll(): array;
     public function findProductsWithQuantity(int $id): array;

}