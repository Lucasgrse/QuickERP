<?php

class FindStockByIdService{

    public function __construct(
         private StockRepositoryInterface $stockRepositoryInterface
    ){}

    public function findStockById(int $id): ?Stock {
        $stock = $this->stockRepositoryInterface->findById($id);

        if(!$stock){
            throw new Exception("Estoque não existe!");
        }
        
        return $stock;
    }
}