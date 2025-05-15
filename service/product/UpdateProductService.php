<?php
class UpdateProductService {
    public function __construct(
        private ProductRepository $productRepository,
        private StockRepository $stockRepository
    ){}

    public function updateProduct(array $data): void {
        $product = $this->productRepository->findById($data['id']);

        if (!$product) {
        throw new Exception("Produto não encontrado.");
        }

         $product->name = $data['name'];
        $product->price = $data['price'];

        $this->productRepository->update($product);

        $stock = $this->stockRepository->findByProductId($product->id);
        $stock->quantity = $data['quantity'];
        $this->stockRepository->update($stock);
    }
}