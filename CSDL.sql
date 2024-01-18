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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO user(username, password, email, gender, date_of_birth, avartar, cover_picture,TIEUSU,TINNOIBAT) VALUES
('Phat Le','12345','phatle@gmail.com','nam','1999-02-18', 'anh2.jpg','anh3.jpg','hehe','tin noi bat'),
('Thu Thao', '12345', 'thuthao@gmail.com','nữ','2000-07-08', 'user.png',null,'hehe toi la con ga',null),
('Nhi','12345','nhinhi@gmail.com','nữ','2005-03-14','anh2.jpeg',null,null,null),
('Nam Phương','12345','nam@gmail.com','nam','2004-07-02','user.png',null,null,null),
('Kiet','12345','kietanh@gmail.com','nam','2002-07-15','user.png',null,'toi la Kiet',null);


CREATE TABLE user_info(
    user_id int NOT NULL,
    is_active varchar(200),
    study_at varchar(200),
    working_at varchar(200),
    relationship varchar(100)
);
INSERT INTO user_info(user_id, is_active, study_at, working_at, relationship) VALUES
(1,null,'Học viện hàng không',null,'Độc thân'),
(2, null,'Học viện hàng không',null, 'Hẹn hò'),
(3,null,'Học viện hàng không',null,'Độc thân'),
(4, null,'Học viện hàng không',null, 'Hẹn hò'),
(5,null,'Học viện hàng không',null,'Độc thân');

CREATE TABLE message(
  message_id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  message_by int,
  message_to int, 
  content varchar(4294967295)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
INSERT INTO message(message_by,message_to,content) VALUES 
(1,2,'hello'),
(2,1,'hi'),
(1,2,'how are uuuuuu'),
(2,1,'fine');


CREATE TABLE posts (
  post_id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  content text,
  image varchar(500),
  like_count int
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO posts (content, image, like_count) VALUES
( 'cc', '489699.png', 0),
( 'hí nhô ', 'cute-robot-waving-hand-cartoon-260nw-1917055787 (1).webp', 0),
( 'trăng ơi từ đâu đến ', '1111.jpg', 1);


CREATE TABLE share (
  share_id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  post_id int,
  FOREIGN KEY (post_id) REFERENCES posts(post_id),
  user_id int,
  FOREIGN KEY (user_id) REFERENCES user(user_id),
  share_time varchar(100)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE story (
  story_id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  user_id int,
   FOREIGN KEY (user_id) REFERENCES user(user_id),
  content varchar(500),
  img varchar(500),
  video varchar(500),
  music varchar(500),
  story_time varchar(100)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
INSERT INTO story
(story_id, user_id, content, img, video, music, story_time)
VALUES
('', 1, 'Hello', '364665658_683973887098991_2631665589373559337_n.jpg', '', '', '2024-01-17'),
('', 2, 'hello2', '378822784_709013834594996_904116546503893544_n.jpg', '', '', '2024-01-17'),
('', 3, 'hi', '379341766_874136574429252_8738656710738503635_n.jpg', '', '', '2024-01-17'),
('', 4, 'hi2', '401852579_745803197582726_4061090452551986722_n.jpg', '', '', '2024-01-17'),
('', 5, 'hihi', '403751451_745805710915808_88638681196570658_n.jpg', '', '', '2024-01-17');

CREATE TABLE comment(
  comment_id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  user_id int,
  FOREIGN KEY (user_id) REFERENCES user(user_id),
  post_id int,
  FOREIGN KEY (post_id) REFERENCES posts(post_id),
  cmt_content varchar(4294967295),
  comment_time varchar(100)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
INSERT INTO comment(user_id, post_id,cmt_content ,comment_time) VALUES
(2,1,'em dep lam!',null),
(2,3,'em tuyet voi lam!',null),
(1,3,'hôc joi kg chau',null);



CREATE TABLE notification_like (
  noti_like_id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  user_id int,
  FOREIGN KEY (user_id) REFERENCES user(user_id),
  content varchar(200)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO notification_like(user_id,content) VALUES 
  (1, 'đã thích bài viết của bạn'),
  (3, 'đã thích bài viết của bạn'),
  (2, 'đã thích bài viết của bạn'),
  (1, 'đã thích bài viết của bạn'),
  (5, 'đã thích bài viết của bạn');

CREATE TABLE notification_cmt (
  noti_cmt_id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  user_id int,
  FOREIGN KEY (user_id) REFERENCES user(user_id),
  content varchar(200)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO notification_cmt(user_id,content) VALUES 
(2,'đã bình luận vào bài viết của bạn.'),
(3,'đã bình luận vào bài viết của bạn.'),
(4,'đã bình luận vào bài viết của bạn.'),
(5,'đã bình luận vào bài viết của bạn.'),
(1,'đã bình luận vào bài viết của bạn.');

CREATE TABLE notification_request (
  noti_request_id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  user_id int,
  FOREIGN KEY (user_id) REFERENCES user(user_id),
  content varchar(200)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO notification_cmt(user_id,content) VALUES 
(2,'đã gửi cho bạn một lời kết bạn.'),
(1,'đã gửi cho bạn một lời kết bạn.'),
(5,'đã gửi cho bạn một lời kết bạn.'),
(3,'đã gửi cho bạn một lời kết bạn.'),
(4,'đã gửi cho bạn một lời kết bạn.');


CREATE TABLE friend (
  friend_id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  user_id1 int,
  user_id2 int
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO friend (user_id1, user_id2) VALUES
  (1, 2),
  (1, 3),
  (2, 3),
  (2, 4),
  (3, 4),
  (3, 5),
  (4, 5);

CREATE TABLE newfeed(
  newfeed_id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  post_id int,
  FOREIGN KEY (post_id) REFERENCES posts(post_id),
  story_id int,
  FOREIGN KEY (story_id) REFERENCES story(story_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO newfeed(post_id,story_id) VALUES 
  (1, 1),
  (2, 2),
  (3, 3);

CREATE TABLE friendrequest(
  request_id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  sender_id int,
  receiver_id int,
  status varchar(300)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
INSERT INTO friendrequest(sender_id,receiver_id,status) VALUES 
(1,2,'Đã gửi'),
(2,4,'Đã gửi'),
(3,1,'Đã gửi'),
(5,3,'Đã gửi'),
(4,3,'Đã gửi');

CREATE TABLE likes(
  like_id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  user_id int,
  FOREIGN KEY (user_id) REFERENCES user(user_id),
  post_id int,
  FOREIGN KEY (post_id) REFERENCES posts(post_id),
  comment_id int,
  FOREIGN KEY (comment_id) REFERENCES comment(comment_id),
  story_id int,
  FOREIGN KEY (story_id) REFERENCES story(story_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO like(user_id, post_id, comment_id, story_id) VALUES
(2,1,2,3),
(3,2,3,1),
(3,2,null,null);