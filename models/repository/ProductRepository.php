<?php
class ProductRepository extends BaseRepository implements ProductRepositoryInterface {

    public function save(Product $product): void {
        $sql = "INSERT INTO product (name, price) VALUES (?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$product->name, $product->price]);
    }

    public function delete(int $id): void {
        $sql = "DELETE FROM product WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
    }

    public function copy(Product $product ): void {
        $sql = "UPDATE product SET name = ?, price = ?, WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt-> execute([
            $product->name,
            $product->price,
            $product->id
        ]);
    }

    public function findById(int $id): ?Product {   
        $sql = "SELECT * FROM product WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        $data = $stmt->fetch();

        if(!$data){
            return null;
        }

        return new Product($data['id'], $data['name'], $data['price']);
    }

    public function findAll(): array {
        $sql = "SELECT * FROM product";
        $stmt = $this->pdo->prepare($sql);
        $rows = $stmt->fetchAll();

        $products = [];
        foreach($rows as $row){
            $products[] = new Product($row['id'], $row['name'], $row['price']); 
        }
        return $products;
    }
}