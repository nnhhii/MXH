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
  is_active varchar(200),
  study_at varchar(200),
  working_at varchar(200),
  relationship varchar(100)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
INSERT INTO user(username, password, email, gender, date_of_birth, avartar, cover_picture, bio) VALUES
('Phat Le', '12345', 'phatle@gmail.com', 'nam', '1999-02-18', 'anh2.jpg', 'anh3.jpg', 'hehe tin noi bat'),
('Thu Thao', '12345', 'thuthao@gmail.com', 'nữ', '2000-07-08', 'user.jpeg', 'anhbia.jpg', 'hehe toi la con ga'),
('Nhi', '12345', 'nhinhi@gmail.com', 'nữ', '2005-03-14', 'anh2.jpeg', 'anhbia.jpg', null),
('Nam Phương', '12345', 'nam@gmail.com', 'nam', '2004-07-02', 'user.jpeg', 'anhbia.jpg', null),
('Kiet', '12345', 'kietanh@gmail.com', 'nam', '2002-07-15', 'user.jpeg', 'anhbia.jpg', 'toi la Kiet');




CREATE TABLE posts (
  post_id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  post_by int,
  FOREIGN KEY (post_by) REFERENCES user(user_id),
  content text,
  image varchar(500),
  post_time varchar(100)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE post_function (
  post_id int,
  FOREIGN KEY (post_id) REFERENCES posts(post_id),
  like_by int,
  FOREIGN KEY (like_by) REFERENCES user(user_id),
  share_by int,
  FOREIGN KEY (share_by) REFERENCES user(user_id),
  comment_by int,
  FOREIGN KEY (comment_by) REFERENCES user(user_id),
  cmt_content varchar(4294967295),
  comment_time varchar(100),
  save_by int,
  FOREIGN KEY (save_by) REFERENCES user(user_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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

CREATE TABLE story (
  story_id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  user_id int,
  FOREIGN KEY (user_id) REFERENCES user(user_id),
  content varchar(500),
  file varchar(500),
  music varchar(500),
  story_time varchar(100)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE notification (
  notification_id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  noti_by int,
  FOREIGN KEY (noti_by) REFERENCES user(user_id),
  noti_content varchar(200),
  post_id int,
  FOREIGN KEY (post_id) REFERENCES posts(post_id),
  noti_to int,
  FOREIGN KEY (noti_to) REFERENCES user(user_id),
  noti_time varchar(200)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE friendrequest(
  request_id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  sender_id int,
  FOREIGN KEY (sender_id) REFERENCES user(user_id),
  receiver_id int,
  FOREIGN KEY (receiver_id) REFERENCES user(user_id),
  status varchar(300)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
INSERT INTO friendrequest(sender_id,receiver_id,status) VALUES 
(1, 2, 'bạn bè'),
(1, 3, 'bạn bè'),
(2, 3, 'bạn bè'),
(2, 4, 'bạn bè'),
(3, 4, 'bạn bè'),
(3, 5, 'bạn bè'),
(4, 5, 'bạn bè');