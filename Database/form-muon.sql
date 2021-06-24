use formThongTin;
create table formThongTin (
	f_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    f_email VARCHAR(64) NOT NULL,
    f_Ten_SV VARCHAR(256) CHARACTER SET UTF8MB4 NOT NULL,
    f_Ma_SV VARCHAR(11) NOT NULL,
    f_Ma_LV INT(11) NOT NULL,
    f_Sdt INT(20) NOT NULL,
    -- DATE - format YYYY-MM-DD
    f_vertified BOOLEAN DEFAULT 0,
    f_NgayMuon DATE NOT NULL,
    f_NgayTraDuKien DATE,
    f_NgayTra DATE
);

UPDATE formThongTin SET f_NgayTra = TRUE WHERE Ma_LV = '';
UPDATE formThongTin SET f_NgayMuon = "2021-05-22", f_NgayTra = '2021-06-22' WHERE f_Ma_LV = '20071002';
UPDATE formThongTin SET f_NgayTra = '2021-06-22' WHERE f_Ma_LV = '20071002';
INSERT INTO $formTable(f_email, f_Ten_SV, f_Ma_SV, f_Ma_LV, f_Sdt, f_NgayMuon) VALUES (?, ?, ?, ?, ?, ?);
INSERT INTO formThongTin(f_email, f_Ten_SV, f_Ma_SV, f_Ma_LV, f_Sdt, f_NgayMuon) VALUES ("khang@example.com", "Khang", "1913683", "20192041","0353032332", "2021-06-19");
ALTER TABLE formThongTin AUTO_INCREMENT=1;
DROP TABLE formThongTin;
SELECT * FROM formThongTin;
SELECT * FROM formThongTin WHERE f_NgayTra is NOT null;
SELECT * FROM luanVan WHERE LV_Ten LIKE '%mai huu xuan%' OR  GV1_Ten LIKE '%mai huu xuan%' OR  GV2_Ten LIKE '%mai huu xuan%' OR  LV_Ma LIKE '%mai huu xuan%' ;