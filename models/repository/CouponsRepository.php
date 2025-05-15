class CouponsRepository extends BaseRepository{

    public function save(Coupons $coupons): void {
        $sql = "INSERT INTO coupons (code, value_discount, minimum_purchase, validate) VALUES (?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$coupons->code, $coupons->value_discount, $coupons->minimum_purchase, $coupons->validate]);
    }
}