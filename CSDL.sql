CREATE TABLE user(
    user_id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username varchar(100), 
    password varchar(100), 
    email varchar(100), 
    gender varchar(10),
    date_of_birth date, 
    avartar varchar(500),
    cover_picture varchar(500)
);

INSERT INTO user(username, password, email, date_of_birth, avartar) VALUES
('Phat Le','12345','phatle@gmail.com','1999-02-29', 'anh1.jpg'),
('Thu Thao', '12345', 'thuthao@gmail.com','2000-07-08', 'anh2.jpeg');


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
(2,1,'fine')