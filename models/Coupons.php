<?php
class Coupons {
    public int $id;
    public string $code;
    public float $valueDiscount;
    public float $minimumPurchase;
    public string $validate;

    public function __construct(
        $id = null,
        $code = '',
        $valueDiscount = 0.0,
        $minimumPurchase = 0.0,
        $validate = ''
    ) {
        $this->id = $id;
        $this->code = $code;
        $this->valueDiscount = $valueDiscount;
        $this->minimumPurchase = $minimumPurchase;
        $this->validate = $validate;
    }
}
