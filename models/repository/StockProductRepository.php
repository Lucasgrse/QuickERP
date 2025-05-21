<?php

class StockProductRepository extends BaseRepository implements StockProductRepositoryInterface {

    public function save(StockProduct $stockProduct): int {
        $sql = "INSERT INTO stock_product (stock_id, product_id, quantity) VALUES (?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$stockProduct->getStockId, $stockProduct->getProductId, $stockProduct->quantity]);

        return (int)$this->pdo->lastInsertId();        
    }

    public function findByStockId(int $id): array {
        $sql = "SELECT * FROM stock_product where stock_id = ?";
        $stmt = $this->pdo->prepare($sql);
        $rows = $stmt->fetch();

        $stockProducts = [];

        foreach ($rows as $row) {
            $stockProductId = new StockProductId(
                (int)$row['stock_id'],
                (int)$row['product_id']
            );

            $stockProduct = new StockProduct(
                $stockProductId,
                (int)$row['quantity']
            );
            $stockProducts[] = $stockProduct;
        }
        return $stockProducts;
    }

    public function deleteAll(int $id): array {
        $sql = "DELETE FROM stock_products WHERE stock_id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
    }

    public function deleteByProductId(int $productId): void {
        $sql = "SELECT * FROM stock_products WHERE product_id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$productId]);
    }
}