<?php

class ProductControler {

    private CreateProductService $createProductService;
    private DeleteProductService $deleteProductService;
    private FindProductByIdService $findProductByIdService;
    private FindProductService $findProductService;
    private UpdateProductService $updateProductService;

    public function __construct(
        CreateProductService $createProductService,
        DeleteProductService $deleteProductService,
        FindProductByIdService $findProductByIdService,
        FindProductService $findProductService,
        UpdateProductService $updateProductService
    ) {
        $this->createProductService = $createProductService;
        $this->deleteProductService = $deleteProductService;
        $this->findProductByIdService = $findProductByIdService;
        $this->findProductService = $findProductService;
        $this->updateProductService = $updateProductService;
    }

    public function createProduct(): void{
        $data = $_POST;

        try {
            $this->createProductService->saveProduct($data);
        } catch (Exception $e) {
            echo "Erro ao criar o produto: " . $e->getMessage();
        }      
    }
    
    public function updateProduct(): void{

        $data = $_PUT;

        try{
            $this->updateProductService->updateProduct($data);
        } catch (Exception $e) {
            echo "Erro ao atualizar o produto " . $e->getMessage();
        }
    }

    public function findProductById(): ?Product{

        $data = $_GET;

        try{
            $this->findProductByIdService->execute($data);
            header('Content-Type: application/json');
            echo json_encode($product);
        } catch (Exception $e) {
        http_response_code(400);
        echo json_encode(['error' => $e->getMessage()]);
        }
    }

    public function findAllProducts(): ?array{

         $data = $_GET;
        
        try{
         $products = $this->findProductService->findAll();
            return $products; 
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(['error' => $e->getMessage()]);
            return null;
        }
    }
}