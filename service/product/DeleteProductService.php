<?php
class DeleteProductService {
    public function __construct(
        private ProductRepositoryInterface $productRepository,
        private StockRepositoryInterface $stockRepositoryInterface
    ){}

     public function deleteProduct(int $id): void {
        $product = $this->productRepository->findById($id);

        if (!$product) {
        throw new Exception("Produto não encontrado.");
        }

        $this->stockRepositoryInterface->deleteByProductId($id);
        $this->productRepository->delete($id);
    }
}