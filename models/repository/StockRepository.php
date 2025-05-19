<?php
class StockRepository extends BaseRepository implements StockRepositoryInterface{

    public function save(Stock $stock): int {
        $sql = "INSERT INTO stock (product_id, quantity) VALUES (?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$stock->productId, $stock->quantity]);

        return (int)$this->pdo->lastInsertId(); 
    }

    public function delete(int $id): void {
        $sql = "DELETE FROM stock WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
    }

    public function copy(Stock $stock): void {
        $sql = "UPDATE stock SET quantity = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            $stock->quantity
    ]);
    }

    public function findById(int $id): ?Stock {
        $sql = "SELECT * FROM stock where id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        $data = $stmt->fetch();

        if($data){
            return null;
        }

        return new Stock($data['id'], $data['product_id'], $data['quantity']);
    }

    public function findAll(): array {
        $sql = "SELECT * FROM stock";
        $stmt = $this->pdo->prepare($sql);
        $rows = $stmt->fetch();

        $stock = [];
        foreach($rows as $row){
            $stock[] = new Stock($row["id"], $row["product_id"], $row["quantity"]);
        }
        return $stock;
    }

    public function deleteByProductId(int $productId): void {
        $sql = "SELECT * FROM stock WHERE product_id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$productId]);
    }

    public function findByProductId(int $productId): ?Stock {
        $sql = "SELECT * FROM stock WHERE product_id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$productId]);
        $data = $stmt->fetch();

        if($data){
            return null;
        }

        return new Stock($data['id'], $data['product_id'], $data['quantity']);
    }
}