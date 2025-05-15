class OrderRequestId {
    public int $requestId;
    public int $productId;

    public function __construct(int $requestId, int $productId) {
        $this->requestId = $requestId;
        $this->productId = $productId;
    }
}
