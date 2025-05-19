<?php
class CouponsRepository extends BaseRepository {

    public function save(Coupons $coupons): void {
        $sql = "INSERT INTO coupons (code, value_discount, minimum_purchase, validate) VALUES (?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$coupons->code, $coupons->valueDiscount, $coupons->minimumPurchase, $coupons->validate]);
    }

    public function delete(int $id): void {
        $sql = "DELETE FROM coupons WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
    }

    public function copy(Coupons $coupons): void {
        $sql = "UPDATE SET code = ?, valueDiscount = ?, minimiumPurchase = ?, validate = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            $coupons-> code,
            $coupons->valueDiscount,
            $coupons->minimumPurchase,
            $coupons->validate
        ]);
    }

    public function findById(int $id): ?Coupons {
        $sql = "SELECT * FROM coupon where id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        $data = $stmt->fetch();
        if(!$data){
            return null;
        }

        return new Coupons(
            $data['id'],
            $data['code'],
            $data['valueDiscount'],
            $data['minimiumPurchase'],
            $data['validate'],
        );
    }

    public function findAll(): array {
        $sql = 'SELECT * FROM counpons';
        $stmt = $this->pdo->prepare($sql);
        $rows = $stmt->fetch();

        $counpons = [];
        foreach($rows as $row){
            $coupons[] = new Coupons($row['id'], $row['code'], $row['valueDiscount'], $row['minimiumPurchase'], $row['validate']);
        }
        return $counpons;
    }
}

