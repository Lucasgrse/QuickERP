class Requests {
    public int $id;
    public string $requestDate;
    public float $totalValue;
    public float $freight;
    public string $zipCode;
    public string $address;
    public string $status;

    public function __construct(
        $id = null,
        $requestDate = '',
        $totalValue = 0.0,
        $freight = 0.0,
        $zipCode = '',
        $address = '',
        $status = 'Pending'
    ) {
        $this->id = $id;
        $this->requestDate = $requestDate;
        $this->totalValue = $totalValue;
        $this->freight = $freight;
        $this->zipCode = $zipCode;
        $this->address = $address;
        $this->status = $status;
    }
}