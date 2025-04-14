CREATE TABLE roles (
    id INT PRIMARY KEY AUTO_INCREMENT,
    role_name VARCHAR(50) UNIQUE
);
INSERT INTO roles (role_name) VALUES ('Admin'), ('Author'), ('Reader');
CREATE TABLE users (
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password_hash VARCHAR(255) NOT NULL,
    role ENUM('admin', 'author', 'reader') DEFAULT 'reader',
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE authors (
    author_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    author_name varchar(30),
    bio TEXT,
    profile_image VARCHAR(255),
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);
CREATE TABLE categories (
    category_id INT PRIMARY KEY AUTO_INCREMENT,
    category_name VARCHAR(100) UNIQUE NOT NULL,
    description TEXT
);
CREATE TABLE ebooks (
    ebook_id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(200) NOT NULL,
    author_id INT,
    category_id INT,
    description TEXT,
    language VARCHAR(50),
    isbn VARCHAR(20) UNIQUE,
    cover_image VARCHAR(255),
    file_path VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) DEFAULT 0.00,
    is_free BOOLEAN DEFAULT FALSE,
    published_at DATE,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (author_id) REFERENCES authors(author_id),
    FOREIGN KEY (category_id) REFERENCES categories(category_id)
);
CREATE TABLE purchases (
    purchase_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    ebook_id INT,
    purchase_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    amount_paid DECIMAL(10, 2),
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    FOREIGN KEY (ebook_id) REFERENCES ebooks(ebook_id)
);
CREATE TABLE reviews (
    review_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    ebook_id INT,
    rating INT CHECK (rating BETWEEN 1 AND 5),
    comment TEXT,
    reviewed_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    FOREIGN KEY (ebook_id) REFERENCES ebooks(ebook_id)
);
CREATE TABLE orders (
    order_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    order_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    total_amount DECIMAL(10, 2),
    status ENUM('pending', 'completed', 'cancelled') DEFAULT 'pending',
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);
CREATE TABLE order_items (
    order_item_id INT PRIMARY KEY AUTO_INCREMENT,
    order_id INT NOT NULL,
    ebook_id INT NOT NULL,
    quantity INT DEFAULT 1,
    price DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (order_id) REFERENCES orders(order_id) ON DELETE CASCADE,
    FOREIGN KEY (ebook_id) REFERENCES ebooks(ebook_id)
);

CREATE TABLE competitions (
    competition_id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(200) NOT NULL,
    description TEXT,
    start_date DATE,
    end_date DATE,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE winners (
    winner_id INT PRIMARY KEY AUTO_INCREMENT,
    competition_id INT NOT NULL,
    user_id INT NOT NULL,
    position INT CHECK (position BETWEEN 1 AND 3), 
    prize VARCHAR(255),
    declared_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (competition_id) REFERENCES competitions(competition_id),
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);
