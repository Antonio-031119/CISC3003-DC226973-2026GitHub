
CREATE DATABASE IF NOT EXISTS cisc3003_db;
USE cisc3003_db;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE, -- C.06 Ajax 检查的基础
    password VARCHAR(255) NOT NULL,    -- C.07 安全存储
    is_verified TINYINT(1) DEFAULT 0,  -- C.08 邮件激活状态
    verification_token VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);