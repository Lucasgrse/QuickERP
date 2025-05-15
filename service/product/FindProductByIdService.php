<?php
class FindProductByIdService {
    public function __construct(
        private ProductRepository $productRepository
    ) {}

     public function execute(int $id): ?Product {
       $product = $this->productRepository->findById($id);

        if (!$product) {
            throw new Exception("Produto não encontrado.");
        }
        return $product;
    }
}