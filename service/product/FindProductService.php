<?php
class FindProductService {

    public function __construct(
        private ProductRepository $productRepository,
        private StockRepository $stockRepository
    ) {}

    public function findall(): array {
        $productsData = $this->productRepository->findAll();
        $products = [];

        foreach ($productsData as $data) {
            $product = new Product($data['id'], $data['name'], $data['price']);
            
            $stock = $this->stockRepository->findByProductId($data['id']);
            $product->stockQuantity = $stock ? $stock->quantity : 0;

            $products[] = $product;
        }
        return $products;
    }
}