ALTER TABLE stock
DROP COLUMN IF EXISTS product_id,
DROP COLUMN IF EXISTS quantity;

ALTER TABLE stock 
ADD COLUMN name VARCHAR(255) NOT NULL,
ADD COLUMN created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP;

CREATE TABLE stock_products (
    stock_id INT NOT NULL,
    product_id INT NOT NULL,
    quantity INT NOT NULL DEFAULT 0,
    PRIMARY KEY (stock_id, product_id),
    FOREIGN KEY (stock_id) REFERENCES stock(id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
);
