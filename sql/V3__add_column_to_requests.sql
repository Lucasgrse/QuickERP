ALTER TABLE requests ADD COLUMN coupon_id INT, ADD FOREIGN KEY (coupon_id) REFERENCES coupons(id);
