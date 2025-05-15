class StockRepository extends BaseRepository{

    public function save(Stock $stock): void {
        $sql = "INSERT INTO stock (product_id, quantity) VALUES (?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$stock->product_id, $stock->quantity]);
    }
}