use available;
Create table available(
	LV_Ma VARCHAR(32) NOT NULL PRIMARY KEY,
    Available BOOLEAN default 1
);
INSERT INTO available(LV_Ma)
VALUEs ('20071002');
SELECT * FROM available;
drop table available;

UPDATE available SET Available = TRUE WHERE LV_Ma = 20161038;
SELECT * FROM available WHERE LV_Ma = '20161038';
SELECT * FROM available WHERE LV_Ma = '20071003';
SELECT * FROM available WHERE LV_Ma = 20161038;