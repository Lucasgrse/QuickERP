<?php
interface ProductRepository {

    public function save(Product $product): void;
}