<?php

class DeleteStockService{

    public function __construct(
        private StockRepositoryInterface $stockRepositoryInterface,
        private StockProductRepositoryInterface $stockProductRepositoryInterface
    ){}

    public function delete(int $id): void {
        $stock = $this->stockRepositoryInterface->findById($id);

        if(!$stock){
            throw new Exception("Estoque não encontrado.");
        }

        $stockProducts = $this->stockProductRepositoryInterface->findByStockId($id);

        foreach ($stockProducts as $stockProduct) {
            $this->stockProductRepositoryInterface->deleteById($stockProduct->id);
        }
        
        $this->stockRepositoryInterface->delete($id);
    }
}