CREATE TABLE produtcs (
    id uuid NOT NULL DEFAULT uuid_generate_v4(),
    name varchar(255) NOT NULL,
    price decimal(10,2) NOT NULL
);

CREATE TABLE stock (
    id uuid NOT NULL DEFAULT uuid_generate_v4(),
    product_id uuid REFERENCES produtcs(id),
    quantity INT NOT NULL DEFAULT 0,
    FOREIGN KEY (product_id) REFERENCES produtcs(id) ON DELETE CASCADE
);

CREATE TABLE requests (
    id uuid NOT NULL DEFAULT uuid_generate_v4(),
    request_date TIMESTAMP WITH TIME ZONE,
    total_value DECIMAL(10,2),
    freight DECIMAL(10,2),
    zip_code VARCHAR(10),
    address TEXT,
    status ENUM('Pending', 'Finished', 'Canceled') DEFAULT 'Pending'
);

CREATE TABLE coupons (
    id uuid NOT NULL DEFAULT uuid_generate_v4(),
    code varchar(50) UNIQUE NOT NULL,
    value_discount DECIMAL(10,2),
    minimum_purchase DECIMAL(10,2),
    validate DATE
);

