<?php
interface CouponsRepositoryInterface {

     public function save(Coupons $coupons): void;
     public function delete(int $id): void;
     public function copy(Coupons $coupons): void;
     public function findById(int $id): ?Coupons;
     
}