<?php
class StockRepository extends BaseRepository implements StockRepositoryInterface{

    public function save(Stock $stock): int {
        $sql = "INSERT INTO stock (name, createdAt) VALUES (?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$stock->name, $stock->createdAt]);

        return (int)$this->pdo->lastInsertId(); 
    }

    public function delete(int $id): void {
        $sql = "DELETE FROM stock WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
    }

    public function copy(Stock $stock): void {
        $sql = "UPDATE stock SET name = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            $stock->name
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

        return new Stock($data['id'], $data['name'], $data['createdAt']);
    }

    public function findAll(): array {
        $sql = "SELECT * FROM stock";
        $stmt = $this->pdo->prepare($sql);
        $rows = $stmt->fetch();

        $stock = [];
        foreach($rows as $row){
            $stock[] = new Stock($row["id"], $row["name"], $row["createdAt"]);
        }
        return $stock;
    }
}