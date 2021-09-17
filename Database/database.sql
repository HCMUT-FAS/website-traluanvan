create database traluanvan/;
use luanVan;

CREATE TABLE luanvan (
id INT AUTO_INCREMENT PRIMARY KEY,
LV_Ma INT,
LV_Ten VARCHAR(1000) CHARACTER SET UTF8MB4,
LV_TenTiengAnh VARCHAR(1000) CHARACTER SET UTF8MB4,
SV1_Ten VARCHAR(50) CHARACTER SET UTF8MB4,
MSSV1 VARCHAR(10),
SV2_Ten VARCHAR(50) CHARACTER SET UTF8MB4,
MSSV2 VARCHAR(10),
GV1_Ten VARCHAR(50) CHARACTER SET UTF8MB4,
GV2_Ten VARCHAR(50) CHARACTER SET UTF8MB4
);

select * from luanVan;

DROP TABLE luanVan;

create table GV(
	MA_GV CHAR(10),
    Ten_GV CHAR(20) CHARACTER SET utf8mb4
);

INSERT into GV VALUE ("TMT", "Trần Minh Thái");

select * from GV;

create table login(
	id INT PRIMARY KEY AUTO_INCREMENT,
    username char(100),
    password char(100)
);

insert into login value('2', 'admin', 'password');
SELECT * FROM login;
SELECT * FROM luanVan;

Select * from login where username = 'admin' and password = 'admin' ;