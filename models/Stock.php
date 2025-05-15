class Stock {
    public int $id;
    public int $productId;
    public int $quantity;

    public function __construct($id = null, $productId = 0, $quantity = 0) {
        $this->id = $id;
        $this->productId = $productId;
        $this->quantity = $quantity;
    }
}