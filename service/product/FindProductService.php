<?php
class FindProductService {

    public function __construct(
        private ProductRepositoryInterface $productRepository,
        private StockRepositoryInterface $stockRepository
    ) {}

    public function findall(): array {
        $productsData = $this->productRepository->findAll();
        $products = [];

        foreach ($productsData as $data) {
            $product = new Product($data['id'], $data['name'], $data['price']);
            
            $stock = $this->productRepository->findProductsWithQuantity($data['id']);
            $quantity = $stock ? $stock['quantity'] : 0;

            $products[] = $product;
        }
        return $products;
    }
}