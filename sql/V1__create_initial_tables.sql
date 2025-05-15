CREATE TABLE IF NOT EXISTS produtcs (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name varchar(255) NOT NULL,
    price decimal(10,2) NOT NULL
);

CREATE TABLE IF NOT EXISTS stock (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    product_id INT REFERENCES produtcs(id),
    quantity INT NOT NULL DEFAULT 0,
    FOREIGN KEY (product_id) REFERENCES produtcs(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS requests (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    request_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    total_value DECIMAL(10,2),
    freight DECIMAL(10,2),
    zip_code VARCHAR(10),
    address TEXT,
    status ENUM('Pending', 'Finished', 'Canceled') DEFAULT 'Pending'
);

CREATE TABLE IF NOT EXISTS coupons (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    code varchar(50) UNIQUE NOT NULL,
    value_discount DECIMAL(10,2),
    minimum_purchase DECIMAL(10,2),
    validate DATE
);

CREATE TABLE IF NOT EXISTS order_request (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    request_id INT,
    product_id INT,
    quantity INT,
    unitary_price DECIMAL(10,2),
    FOREIGN KEY (request_id) REFERENCES requests(id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES produtcs(id)
);