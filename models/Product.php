class Product {
    public $id;
    public $name;
    public $price;

    public function __construct($id = null, $name = '', $price = 0.0) {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
    }
}