create database ebooks;
use ebooks;

CREATE TABLE users (
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password_hash VARCHAR(255) NOT NULL,
    role ENUM('admin', 'author', 'reader') DEFAULT 'reader',
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE user_cart (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    full_name VARCHAR(255),
    price DECIMAL(10,2),
    quantity INT,
    FOREIGN KEY (user_id) REFERENCES users( user_id) ON DELETE CASCADE
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
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
 );
 
