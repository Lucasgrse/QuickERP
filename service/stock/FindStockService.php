<?php

class FindStockService {

    public function __construct(
        private StockRepositoryInterface $stockRepositoryInterface
    ){}

    public function findAll(): array {
        $stocksData = $this->stockRepositoryInterface->findAll();

        $stocks = [];
        foreach ($stocksData as $data) {
            $stocks[] = new Stock(
                $data['id'],
                $data['name'],
                $data['created_at']
            );
        }

        return $stocks;
    }
}