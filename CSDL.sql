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
('Phat Le','12345','phatle@gmail.com','1999-02-29', 'anh2.jpg','anh3.jpg','hehe','tin noi bat'),
('Thu Thao', '12345', 'thuthao@gmail.com','2000-07-08', 'user.png','kaka','hehe toi la con ga',null);


CREATE TABLE message(
    message_id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    message_by int,
    message_to int, 
    content varchar(4294967295) not null
);
INSERT INTO message(message_by,message_to,content) VALUES 
(1,2,'hello'),
(2,1,'hi'),
(1,2,'how are uuuuuu'),
(2,1,'fine');


CREATE TABLE `posts` (
  `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `content` text NOT NULL,
  `image` varchar(500) NOT NULL,
  `like_count` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `posts` (`id`, `content`, `image`, `like_count`) VALUES
(11, 'cc', '489699.png', 0),
(12, 'hí nhô ', 'cute-robot-waving-hand-cartoon-260nw-1917055787 (1).webp', 0),
(13, 'trăng ơi từ đâu đến ', '1111.jpg', 1),
(14, 'hee', '489699.png', 1),
(15, 'he', '387561700_1009615556756326_706124482945074216_n.jpg', 0),
(16, 'trăng ơi từ đâu đến ', '489699.png', 0),
(17, 'hello', 'day.webp', 0),
(18, 'kldkm', '489699.png', 0),
(19, 'trăng ơi từ đâu đến ', '1111.jpg', 0);
