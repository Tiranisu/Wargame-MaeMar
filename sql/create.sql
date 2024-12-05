-- Create user table
CREATE TABLE "user" (
                        id SERIAL PRIMARY KEY,
                        username VARCHAR(255) NOT NULL,
                        password VARCHAR(255) NOT NULL,
                        is_admin BOOLEAN DEFAULT FALSE
);

-- Create review table
CREATE TABLE product (
                        id SERIAL PRIMARY KEY,
                        product_name VARCHAR(255) NOT NULL,
                        description TEXT,
                        photo TEXT,
                        review TEXT
);
