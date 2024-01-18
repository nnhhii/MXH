CREATE TABLE user(
    user_id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username varchar(100), 
    password varchar(100), 
    email varchar(100), 
    gender varchar(10),
    date_of_birth date, 
    avartar varchar(500),
    cover_picture varchar(500),
    TIEUSU varchar(200),
    TINNOIBAT varchar(100)
);

INSERT INTO user(username, password, email, date_of_birth, avartar, cover_picture,TIEUSU,TINNOIBAT) VALUES
('Phat Le','12345','phatle@gmail.com','1999-02-18', 'anh2.jpg','anh3.jpg','hehe','tin noi bat'),
('Thu Thao', '12345', 'thuthao@gmail.com','2000-07-08', 'user.png',null,'hehe toi la con ga',null),
('Nhi','12345','nhinhi@gmail.com','2005-03-14','anh2.jpeg',null,null,null),
('Nam Phương','12345','nam@gmail.com','2004-07-02','user.png',null,null,null),
('Kiet','12345','kietanh@gmail.com','2002-07-15','user.png',null,'toi la Kiet',null);


CREATE TABLE message(
    message_id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    message_by int,
    message_to int, 
    content varchar(4294967295) not null,
    timestamp varchar(100)
);
INSERT INTO message(message_by,message_to,content,timestamp) VALUES 
(1,2,'hello','1705480668'),
(2,1,'hi','1705480697'),
(1,2,'how are uuuuuu','1705480713'),
(2,1,'fine','1705480723');


CREATE TABLE `posts` (
  `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `content` text,
  `image` varchar(500),
  `like_count` int DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `posts` ( `content`, `image`, `like_count`) VALUES
('cc', '489699.png', 0),
('hí nhô ', 'cute-robot-waving-hand-cartoon-260nw-1917055787 (1).webp', 0),
('trăng ơi từ đâu đến ', '1111.jpg', 1),
('hee', '489699.png', 1),
('he', '387561700_1009615556756326_706124482945074216_n.jpg', 0),
('trăng ơi từ đâu đến ', '489699.png', 0),
('hello', 'day.webp', 0),
('kldkm', '489699.png', 0),
('trăng ơi từ đâu đến ', '1111.jpg', 0);
