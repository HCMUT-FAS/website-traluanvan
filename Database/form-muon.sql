use formThongTin;

create table formThongTin (
	f_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    f_email VARCHAR(64) NOT NULL,
    f_Ten_SV VARCHAR(256) CHARACTER SET UTF8MB4 NOT NULL,
    f_Ma_Sv VARCHAR(11) NOT NULL,
    f_Ma_LV INT(11) NOT NULL,
    f_Sdt INT(20) NOT NULL,
    -- DATE - format YYYY-MM-DD
    f_NgayMuon DATE NOT NULL
);

INSERT INTO formThongTin(f_email, f_Ten_SV, f_Ma_SV, f_Ma_LV, f_Sdt, f_NgayMuon)
VALUES ("khang@example.com", "Khang", "1913683", "20192041","0353032332", "2021-06-19");
ALTER TABLE formThongTin AUTO_INCREMENT=0;
DROP TABLE formThongTin;

SELECT * FROM formThongTin;