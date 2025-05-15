<?php
class CreateProductService {
    public function __construct(
        private ProductRepository $productRepository,
        private StockRepository $stockRepository
    ) {}

    public function saveProduct(array $data): void {
        $product = new Product(null, $data['name'], $data['price']);
        $id = $this->productRepository->save($product);

        $stock = new Stock(null, $id, (int) $data['quantity'], $data['name']);
        $this->stockRepository->save($stock);
    }
}
