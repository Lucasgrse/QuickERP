<?php

class UpdateStockService {

    public function __construct(
        private StockRepositoryInterface $stockRepositoryInterface
    ){}

    public function updateStock(array $data): void {
        $stock = $this->stockRepositoryInterface->findById($data['id']);

        if(!$stock){
            throw new Expcetion("Estoque não encontrado");
        }

        $stock->name = $data['name'];
        $this->stockRepositoryInterface->copy($stock);
    }
}