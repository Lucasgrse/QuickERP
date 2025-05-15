class ProductRepository extends BaseRepository {

    public function save(Product $product): void {
        $sql = "INSERT INTO product (name, price) VALUES (?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$product->name, $product->price]);
    }
}