<?php

class CreateStockService {

    public function __construct(
        private StockRepositoryInterface $stockRepositoryInterface,
        private StockProductRepositoryInterface $stockProductRepository
    ){}

    public function createStock(){
        $stock = new Stock(null, $data['name'], date('Y-m-d H:i:s'));
        $stockId = $this->stockRepositoryInterface->save($stock);

        foreach($data['products'] as $productData){
            $stockProductId = new StockProductsId(
                $stockId,
                (int)$productData['productId']
            );

            $stockProduct = new StockProduct(
                $stockProductId,
                (int)$productData['quantity']
            );

            $this ->stockProductRepository->save($stockProduct);
        }
    }
}