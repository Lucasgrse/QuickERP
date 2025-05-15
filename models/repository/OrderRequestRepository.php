class OrderRequestRepository extends BaseRepository {

     public function save(OrderRequest $orderRequest): void {
        $sql = "INSERT INTO coupons (request_id, product_id, quantity, unitary_price) VALUES (?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$orderRequest->request_id, $orderRequest->product_id, $orderRequest->quantity, $orderRequest->unitary_price]);
    }
}