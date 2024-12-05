-- Create user table
CREATE TABLE users (
                        id SERIAL PRIMARY KEY,
                        username VARCHAR(255) NOT NULL,
                        password VARCHAR(255) NOT NULL,
                        is_admin BOOLEAN DEFAULT FALSE
);

-- Add Users
INSERT INTO users (username, password, is_admin) VALUES
    ('admin', 'S2Frb3VLYWtvdTEyMw==', TRUE);

INSERT INTO users (username, password, is_admin) VALUES
    ('user', 'dXNlcg==', FALSE)