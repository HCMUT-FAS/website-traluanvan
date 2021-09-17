Create table login(
	id int AUTO_INCREMENT PRIMARY KEY,
	username VARCHAR(16),
    password VARCHAR(64)
);
drop table login;
INSERT INTO login(username, password) values("admin", "admin");
SELECT * FROM login;