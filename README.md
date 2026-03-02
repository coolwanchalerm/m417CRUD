# m417CRUD

CREATE DATABASE IF NOT EXISTS sakonraj_sports;
USE sakonraj_sports;

CREATE TABLE IF NOT EXISTS equipment (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    item_name VARCHAR(100) NOT NULL,
    category VARCHAR(50),
    amount INT(11) DEFAULT 0,
    last_update TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- ข้อมูลตัวอย่างสำหรับให้นักเรียนฝึก Read
INSERT INTO equipment (item_name, category, amount) VALUES 
('ลูกฟุตบอลลายเมสซี่', 'ฟุตบอล', 10),
('ไม้แบดมินตัน Yonex', 'แบดมินตัน', 15),
('ลูกบาสเกตบอล Molten', 'บาสเกตบอล', 8);

......
CREATE DATABASE sakonraj_canteen;
USE sakonraj_canteen;

CREATE TABLE menus (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    price INT(11) NOT NULL
);

INSERT INTO menus (name, price) VALUES 
('กะเพราไก่', 40),
('ข้าวผัดไข่', 35),
('น้ำดื่ม', 7);

CREATE TABLE sports_items (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    item_name VARCHAR(100) NOT NULL,
    qty INT(11) NOT NULL
);
