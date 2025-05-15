<?php
class DeleteProductService {
    public function __construct(
        private ProductRepository $productRepository,
        private StockRepository $stockRepository
    ){}

     public function deleteProduct(int $id): void {
        $product = $this->productRepository->findById($data['id']);

        if (!$product) {
        throw new Exception("Produto não encontrado.");
        }

        $this->stockRepository->deleteByProductId($id);
        $this->productRepository->delete($id);
    }
}