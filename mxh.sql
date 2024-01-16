CREATE TABLE USER (
  ID_USER int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  USERNAME varchar(200),
  TIEUSU varchar(200),
  ANHBIA varchar(100),
  ANHDAIDIEN varchar(100),
  TINNOIBAT varchar(100)
);

INSERT INTO USER (USERNAME, TIEUSU, ANHBIA, ANHDAIDIEN, TINNOIBAT) 
VALUES ('Nguyen Nhi', 'hehe toi la con ga', 'img/anh1.jpg', 'img/anh2.jpg', 'tin noi bat');
