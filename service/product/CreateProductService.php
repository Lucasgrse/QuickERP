<?php
class CreateProductService {
    public function __construct(
        private ProductRepositoryInterface $productRepository,
        private StockRepositoryInterface $stockRepository
    ) {}

    public function saveProduct(array $data): void {
        $product = new Product(null, $data['name'], $data['price']);
        $id = $this->productRepository->save($product);

        $stock = new Stock(null, $id, (int) $data['quantity']);
        $this->stockRepository->save($stock);
    }
}
