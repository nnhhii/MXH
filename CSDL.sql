CREATE TABLE user(
  user_id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  username varchar(100), 
  password varchar(100), 
  email varchar(100), 
  gender varchar(10),
  date_of_birth date, 
  avartar varchar(500) DEFAULT 'user.jpeg',
  cover_picture varchar(500) DEFAULT 'anhbia.jpg',
  bio varchar(200),
  highlight varchar(100)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO user(username, password, email, gender, date_of_birth, avartar, cover_picture,bio,highlight) VALUES
('Phat Le','12345','phatle@gmail.com','nam','1999-02-18', 'anh2.jpg','anh3.jpg','hehe','tin noi bat'),
('Thu Thao', '12345', 'thuthao@gmail.com','nữ','2000-07-08', 'user.jpeg','anhbia.jpg','hehe toi la con ga',null),
('Nhi','12345','nhinhi@gmail.com','nữ','2005-03-14','anh2.jpeg','anhbia.jpg',null,null),
('Nam Phương','12345','nam@gmail.com','nam','2004-07-02','user.jpeg','anhbia.jpg',null,null),
('Kiet','12345','kietanh@gmail.com','nam','2002-07-15','user.jpeg','anhbia.jpg','toi la Kiet',null);


CREATE TABLE user_info(
  user_info_id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  user_id int,
  FOREIGN KEY (user_id) REFERENCES user(user_id),
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
  FOREIGN KEY (message_by) REFERENCES user(user_id),
  message_to int,
  FOREIGN KEY (message_to) REFERENCES user(user_id), 
  content varchar(4294967295),
  timestamp varchar(100)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
INSERT INTO message(message_by,message_to,content) VALUES 
(1,2,'hello'),
(2,1,'hi'),
(1,2,'how are uuuuuu'),
(2,1,'fine');


CREATE TABLE posts (
  post_id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  post_by int,
  FOREIGN KEY (post_by) REFERENCES user(user_id),
  content text,
  image varchar(500),
  like_count int NOT NULL DEFAULT 0,
  comment_count int NOT NULL DEFAULT 0,
  share_count int NOT NULL DEFAULT 0,
  post_time varchar(100)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO posts (post_by,content, image, like_count) VALUES
(2, 'cc', 'hoboi.jpg', 0),
(1, 'hí nhô ', 'anh3.jpg', 0),
(5, 'trăng ơi từ đâu đến ', 'anhbia.jpg', 1);


CREATE TABLE share (
  share_id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  post_id int,
  FOREIGN KEY (post_id) REFERENCES posts(post_id),
  share_by int,
  FOREIGN KEY (share_by) REFERENCES user(user_id),
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
INSERT INTO story(user_id, content, img, video, music, story_time) VALUES
(1, 'Hello', 'story1.png', '', '', '2024-01-17'),
(2, 'hello2', 'story2.png', '', '', '2024-01-17'),
(3, 'hi', 'story3.png', '', '', '2024-01-17'),
(4, 'hi2', 'story4.png', '', '', '2024-01-17'),
(5, 'hihi', 'story5.png', '', '', '2024-01-17');

CREATE TABLE comment(
  comment_id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  comment_by int,
  FOREIGN KEY (comment_by) REFERENCES user(user_id),
  post_id int,
  FOREIGN KEY (post_id) REFERENCES posts(post_id),
  cmt_content varchar(4294967295),
  comment_time varchar(100)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
INSERT INTO comment(comment_by, post_id,cmt_content ,comment_time) VALUES
(2,1,'em dep lam!',null),
(2,3,'em tuyet voi lam!',null),
(1,3,'hôc joi kg chau',null);



CREATE TABLE notification (
  notification_id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  noti_by int,
  FOREIGN KEY (noti_by) REFERENCES user(user_id),
  content varchar(200),
  noti_time varchar(200)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO notification(noti_by,content) VALUES 
  (1, 'đã thích bài viết của bạn'),
  (3, 'đã bình luận vào bài viết của bạn'),
  (2, 'đã thích bài viết của bạn'),
  (1, 'đã gửi một lời mời kết bạn'),
  (5, 'đã thích bài viết của bạn');



CREATE TABLE friend (
  friend_id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  user_id1 int,
  FOREIGN KEY (user_id1) REFERENCES user(user_id),
  user_id2 int,
  FOREIGN KEY (user_id2) REFERENCES user(user_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO friend (user_id1, user_id2) VALUES
  (1, 2),
  (1, 3),
  (2, 3),
  (2, 4),
  (3, 4),
  (3, 5),
  (4, 5);


CREATE TABLE friendrequest(
  request_id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  sender_id int,
  FOREIGN KEY (sender_id) REFERENCES user(user_id),
  receiver_id int,
  FOREIGN KEY (receiver_id) REFERENCES user(user_id),
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
  like_by int,
  FOREIGN KEY (like_by) REFERENCES user(user_id),
  post_id int,
  FOREIGN KEY (post_id) REFERENCES posts(post_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO likes(like_by, post_id) VALUES
(2,1),
(3,2),
(3,2);

