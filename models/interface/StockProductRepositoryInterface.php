<?php

interface StockProductRepositoryInterface{

    public function save(StockProduct $stockProduct): int;
    public function findByStockId(int $id): array;
    

}