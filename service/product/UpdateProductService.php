<?php
class UpdateProductService {
    public function __construct(
        private ProductRepositoryInterface $productRepository,
        private StockRepositoryInterface $stockRepository
    ){}

    public function updateProduct(array $data): void {
        $product = $this->productRepository->findById($data['id']);

        if (!$product) {
        throw new Exception("Produto não encontrado.");
        }

         $product->name = $data['name'];
        $product->price = $data['price'];

        $this->productRepository->copy($product);

        $stock = $this->stockRepository->findByProductId($product->id);
        $stock->quantity = $data['quantity'];
        $this->stockRepository->copy($stock);
    }
}