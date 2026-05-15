-- Minimal schema starter for Marketplace Akun (MySQL 8+, InnoDB)

CREATE TABLE users (
  id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  role ENUM('buyer','seller','admin') NOT NULL DEFAULT 'buyer',
  name VARCHAR(120) NOT NULL,
  email VARCHAR(190) NOT NULL UNIQUE,
  phone VARCHAR(30) NULL,
  password_hash VARCHAR(255) NOT NULL,
  avatar VARCHAR(255) NULL,
  status ENUM('active','suspended') NOT NULL DEFAULT 'active',
  created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE user_wallets (
  user_id BIGINT UNSIGNED PRIMARY KEY,
  balance DECIMAL(18,2) NOT NULL DEFAULT 0,
  CONSTRAINT fk_wallet_user FOREIGN KEY (user_id) REFERENCES users(id)
) ENGINE=InnoDB;

CREATE TABLE seller_profiles (
  user_id BIGINT UNSIGNED PRIMARY KEY,
  store_name VARCHAR(160) NOT NULL,
  slug VARCHAR(180) NOT NULL UNIQUE,
  logo VARCHAR(255) NULL,
  description TEXT NULL,
  balance_available DECIMAL(18,2) NOT NULL DEFAULT 0,
  balance_pending DECIMAL(18,2) NOT NULL DEFAULT 0,
  CONSTRAINT fk_seller_user FOREIGN KEY (user_id) REFERENCES users(id)
) ENGINE=InnoDB;

CREATE TABLE categories (
  id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(120) NOT NULL,
  is_active TINYINT(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB;

CREATE TABLE products (
  id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  seller_id BIGINT UNSIGNED NOT NULL,
  category_id BIGINT UNSIGNED NOT NULL,
  title VARCHAR(180) NOT NULL,
  description TEXT NOT NULL,
  price DECIMAL(18,2) NOT NULL,
  delivery_type ENUM('instant','manual') NOT NULL,
  approval_status ENUM('pending','approved','rejected') NOT NULL DEFAULT 'pending',
  is_active TINYINT(1) NOT NULL DEFAULT 0,
  stock_mode_single TINYINT(1) NOT NULL DEFAULT 1,
  created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME NULL ON UPDATE CURRENT_TIMESTAMP,
  CONSTRAINT fk_product_seller FOREIGN KEY (seller_id) REFERENCES users(id),
  CONSTRAINT fk_product_category FOREIGN KEY (category_id) REFERENCES categories(id)
) ENGINE=InnoDB;

CREATE TABLE orders (
  id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  order_no VARCHAR(40) NOT NULL UNIQUE,
  buyer_id BIGINT UNSIGNED NOT NULL,
  seller_id BIGINT UNSIGNED NOT NULL,
  product_id BIGINT UNSIGNED NOT NULL,
  price DECIMAL(18,2) NOT NULL,
  platform_fee DECIMAL(18,2) NOT NULL DEFAULT 0,
  seller_amount DECIMAL(18,2) NOT NULL DEFAULT 0,
  status ENUM('pending_payment','paid','processing','delivered','completed','refunded','cancelled') NOT NULL DEFAULT 'pending_payment',
  payment_status ENUM('pending','paid','expired','failed') NOT NULL DEFAULT 'pending',
  auto_complete_at DATETIME NULL,
  completed_at DATETIME NULL,
  created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  CONSTRAINT fk_order_buyer FOREIGN KEY (buyer_id) REFERENCES users(id),
  CONSTRAINT fk_order_seller FOREIGN KEY (seller_id) REFERENCES users(id),
  CONSTRAINT fk_order_product FOREIGN KEY (product_id) REFERENCES products(id)
) ENGINE=InnoDB;
