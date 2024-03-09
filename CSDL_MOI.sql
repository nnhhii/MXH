CREATE TABLE `friendrequest` (
  `request_id` int(11) NOT NULL,
  `sender_id` int(11) DEFAULT NULL,
  `receiver_id` int(11) DEFAULT NULL,
  `status` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `friendrequest`
--

INSERT INTO `friendrequest` (`request_id`, `sender_id`, `receiver_id`, `status`) VALUES
(1, 1, 2, 'bạn bè'),
(2, 1, 3, 'bạn bè'),
(3, 2, 3, 'bạn bè'),
(4, 2, 4, 'bạn bè'),
(5, 3, 4, 'bạn bè'),
(6, 3, 5, 'bạn bè'),
(7, 4, 5, 'bạn bè'),
(8, 4, 1, 'bạn bè');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `message_id` int(11) NOT NULL,
  `message_by` int(11) DEFAULT NULL,
  `message_to` int(11) DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `timestamp` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`message_id`, `message_by`, `message_to`, `content`, `timestamp`) VALUES
(1, 1, 2, 'hello', NULL),
(2, 2, 1, 'hi', NULL),
(3, 1, 2, 'how are uuuuuu', NULL),
(4, 2, 1, 'fine', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notification_id` int(11) NOT NULL,
  `noti_by` int(11) DEFAULT NULL,
  `noti_content` varchar(200) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `noti_to` int(11) DEFAULT NULL,
  `noti_time` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notification_id`, `noti_by`, `noti_content`, `post_id`, `noti_to`, `noti_time`) VALUES
(2, 1, 'đã chấp nhận lời mời kết bạn.', NULL, 4, '2024-03-09 11:08:56');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `post_by` int(11) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `statuss` varchar(100) DEFAULT NULL,
  `post_time` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_by`, `content`, `image`, `statuss`, `post_time`) VALUES
(62, 6, 'a', 'ngonn.jpg, ', 'public', '2024-03-09 12:04:04'),
(63, 4, 'bb', 'ngonn.jpg, ', 'friend', '2024-03-09 12:04:23'),
(64, 4, '', 'ngonn.jpg, ', 'public', '2024-03-09 12:04:39'),
(65, 6, 'cc', 'ngonn.jpg, ', 'friend', '2024-03-09 12:04:59'),
(66, 4, 'ccc', 'ngonn.jpg, ', 'public', '2024-03-09 12:14:00'),
(67, 4, '', 'ngon.jpg, ', 'friend', '2024-03-09 12:14:15'),
(68, 6, 'cc', 'ngonn.jpg, ', 'friend', '2024-03-09 12:16:24'),
(69, 6, 'c', 'ngonn.jpg, ', 'public', '2024-03-09 12:18:06'),
(70, 4, 'ccc', 'ngonn.jpg, ', 'public', '2024-03-09 12:18:35'),
(71, 4, 'đ', 'ngon.jpg, ', 'public', '2024-03-09 12:18:44'),
(72, 4, 'dd', 'ngon.jpg, ', 'friend', '2024-03-09 12:18:52'),
(73, 6, '', 'ngon.jpg, ', 'friend', '2024-03-09 12:21:07'),
(74, 4, '', 'ngonn.jpg, ', 'public', '2024-03-09 12:21:59'),
(75, 4, '', 'ngon.jpg, ', 'friend', '2024-03-09 12:22:15'),
(76, 6, '', 'ngonn.jpg, ', 'public', '2024-03-09 12:23:44'),
(77, 4, '', 'ngon.jpg, ', 'public', '2024-03-09 12:24:16'),
(78, 4, '', 'ngon.jpg, ', 'friend', '2024-03-09 12:24:29'),
(79, 6, '', 'ngon.jpg, ', 'friend', '2024-03-09 12:25:36'),
(80, 6, 'cc', 'ngon.jpg, ', 'friend', '2024-03-09 12:25:57'),
(81, 6, 'qq', 'ngon.jpg, ', 'public', '2024-03-09 12:26:10'),
(82, 6, 'bb', 'ngon.jpg, ', 'friend', '2024-03-09 12:26:32'),
(83, 4, 'ss', 'ngonn.jpg, ', 'public', '2024-03-09 12:29:05'),
(84, 4, 'aa', 'ngon.jpg, ', 'friend', '2024-03-09 12:29:34'),
(85, 6, '', 'ngonn.jpg, ', 'public', '2024-03-09 12:35:15'),
(86, 4, 'cv', 'ngon.jpg, ', 'friend', '2024-03-09 12:35:38'),
(87, 4, 'ff', 'ngonn.jpg, ', 'public', '2024-03-09 12:42:47'),
(88, 6, '', 'ngon.jpg, ', 'friend', '2024-03-09 12:43:02'),
(89, 4, 'aa', 'ngonn.jpg, ', 'public', '2024-03-09 12:46:35'),
(90, 6, 'bnnbn', 'ngon.jpg, ', 'friend', '2024-03-09 12:46:52'),
(91, 4, 'ck', 'ngonn.jpg, ', 'public', '2024-03-09 12:50:02'),
(92, 6, 'bb', 'ngon.jpg, ', 'friend', '2024-03-09 12:50:19'),
(93, 4, 'ff', 'ngonn.jpg, ', 'public', '2024-03-09 12:53:52'),
(94, 6, '', 'ngon.jpg, ', 'friend', '2024-03-09 12:54:06'),
(95, 4, '', 'ngonn.jpg, ', 'public', '2024-03-09 12:56:18'),
(96, 4, 'gg', 'ngon.jpg, ', 'public', '2024-03-09 12:57:12'),
(97, 6, 'đ', 'ngonn.jpg, ', 'friend', '2024-03-09 12:57:27'),
(98, 4, 'ff', 'ngonn.jpg, ', 'public', '2024-03-09 12:59:17'),
(99, 6, 'â', 'ngon.jpg, ', 'friend', '2024-03-09 12:59:40'),
(100, 6, 'zz', 'ngonn.jpg, ', 'public', '2024-03-09 13:00:02'),
(101, 4, '', 'ngonn.jpg, ', 'public', '2024-03-09 13:00:20'),
(102, 6, '', 'ngon.jpg, ', 'friend', '2024-03-09 13:00:41'),
(103, 4, 'vv', 'ngonn.jpg, ', 'public', '2024-03-09 13:09:15'),
(104, 4, 'gg', 'ngon.jpg, ', 'friend', '2024-03-09 13:09:33'),
(105, 6, '', 'ngonn.jpg, ', 'public', '2024-03-09 13:10:25'),
(106, 6, '', 'ngonn.jpg, ', 'friend', '2024-03-09 13:11:05'),
(107, 6, 'ss', 'ngonn.jpg, ', 'public', '2024-03-09 13:12:15'),
(108, 6, 'ddc', 'ngonn.jpg, ', 'public', '2024-03-09 13:13:10'),
(109, 4, '', 'ngon.jpg, ', 'friend', '2024-03-09 13:13:25'),
(110, 6, '', 'ngonn.jpg, ', 'public', '2024-03-09 13:28:35'),
(111, 6, '', 'ngonn.jpg, ', 'public', '2024-03-09 13:28:35'),
(112, 6, 'cccc', 'ngonn.jpg, ', 'public', '2024-03-09 13:29:29'),
(113, 6, 'bbbbbb', 'ngon.jpg, ', 'friend', '2024-03-09 13:29:50'),
(114, 4, 'cccc', 'ngonn.jpg, ', 'public', '2024-03-09 13:31:16'),
(115, 4, 'bbbbb', 'ngon.jpg, ', 'friend', '2024-03-09 13:31:30'),
(116, 4, 'xxxx', 'ngonn.jpg, ', 'friend', '2024-03-09 13:31:55'),
(117, 4, 'bbbb', 'ngon.jpg, ', 'friend', '2024-03-09 13:32:53'),
(118, 6, '', 'ngon.jpg, ', 'friend', '2024-03-09 13:33:41'),
(119, 6, 'hhhh', 'ngonn.jpg, ', 'public', '2024-03-09 13:45:51'),
(120, 6, '', 'ngon.jpg, ', 'friend', '2024-03-09 13:46:07'),
(121, 4, 'jjjj', 'ngon.jpg, ', 'friend', '2024-03-09 13:46:36'),
(122, 4, 'cccccc', 'ngon.jpg, ', 'public', '2024-03-09 13:46:54'),
(123, 4, 'sdfsdf', 'ngonn.jpg, ', 'public', '2024-03-09 13:47:23'),
(124, 4, 'dsfas', 'ngon.jpg, ', 'friend', '2024-03-09 13:47:39'),
(125, 1, 'asdasf', 'ngonn.jpg, ', 'public', '2024-03-09 13:48:26'),
(126, 1, 'dsf', 'ngon.jpg, ', 'friend', '2024-03-09 13:48:39'),
(127, 4, 'ckk', 'ngonn.jpg, ', 'public', '2024-03-09 13:49:34'),
(128, 7, 'bbbbb', 'ngon.jpg, ', 'friend', '2024-03-09 13:49:54'),
(129, 7, '', 'ngon.jpg, ', 'only_me', '2024-03-09 13:50:25');

-- --------------------------------------------------------

--
-- Table structure for table `post_function`
--

CREATE TABLE `post_function` (
  `post_id` int(11) DEFAULT NULL,
  `like_by` int(11) DEFAULT NULL,
  `share_by` int(11) DEFAULT NULL,
  `comment_by` int(11) DEFAULT NULL,
  `cmt_content` longtext DEFAULT NULL,
  `comment_time` varchar(100) DEFAULT NULL,
  `save_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `story`
--

CREATE TABLE `story` (
  `story_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `content` varchar(500) DEFAULT NULL,
  `file` varchar(500) DEFAULT NULL,
  `music` varchar(500) DEFAULT NULL,
  `story_time` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `avartar` varchar(500) DEFAULT 'user.jpeg',
  `cover_picture` varchar(500) DEFAULT 'anhbia.jpg',
  `bio` varchar(200) DEFAULT NULL,
  `is_active` varchar(200) DEFAULT NULL,
  `study_at` varchar(200) DEFAULT NULL,
  `working_at` varchar(200) DEFAULT NULL,
  `relationship` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `email`, `gender`, `date_of_birth`, `avartar`, `cover_picture`, `bio`, `is_active`, `study_at`, `working_at`, `relationship`) VALUES
(1, 'Phat Le', '12345', 'phatle@gmail.com', 'nam', '1999-02-18', 'anh2.jpg', 'anh3.jpg', 'hehe tin noi bat', NULL, NULL, NULL, NULL),
(2, 'Thu Thao', '12345', 'thuthao@gmail.com', 'nữ', '2000-07-08', 'user.jpeg', 'anhbia.jpg', 'hehe toi la con ga', NULL, NULL, NULL, NULL),
(3, 'Nhi', '12345', 'nhinhi@gmail.com', 'nữ', '2005-03-14', 'anh2.jpeg', 'anhbia.jpg', NULL, NULL, NULL, NULL, NULL),
(4, 'Nam Phương', '12345', 'nam@gmail.com', 'nam', '2004-07-02', 'user.jpeg', 'anhbia.jpg', NULL, NULL, NULL, NULL, NULL),
(5, 'Kiet', '12345', 'kietanh@gmail.com', 'nam', '2002-07-15', 'user.jpeg', 'anhbia.jpg', 'toi la Kiet', NULL, NULL, NULL, NULL),
(6, ' ', '12345', 'aa@gmail.com', 'nam', '1970-01-01', 'user.jpeg', 'anhbia.jpg', NULL, NULL, NULL, NULL, NULL),
(7, 'ahsjkdfhajksd ', '12345', 'bb@gmail.com', 'nam', '1970-01-01', 'user.jpeg', 'anhbia.jpg', NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `friendrequest`
--
ALTER TABLE `friendrequest`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `sender_id` (`sender_id`),
  ADD KEY `receiver_id` (`receiver_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `message_by` (`message_by`),
  ADD KEY `message_to` (`message_to`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notification_id`),
  ADD KEY `noti_by` (`noti_by`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `noti_to` (`noti_to`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `post_by` (`post_by`);

--
-- Indexes for table `post_function`
--
ALTER TABLE `post_function`
  ADD KEY `post_id` (`post_id`),
  ADD KEY `like_by` (`like_by`),
  ADD KEY `share_by` (`share_by`),
  ADD KEY `comment_by` (`comment_by`),
  ADD KEY `save_by` (`save_by`);

--
-- Indexes for table `story`
--
ALTER TABLE `story`
  ADD PRIMARY KEY (`story_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `friendrequest`
--
ALTER TABLE `friendrequest`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT for table `story`
--
ALTER TABLE `story`
  MODIFY `story_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `friendrequest`
--
ALTER TABLE `friendrequest`
  ADD CONSTRAINT `friendrequest_ibfk_1` FOREIGN KEY (`sender_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `friendrequest_ibfk_2` FOREIGN KEY (`receiver_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`message_by`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`message_to`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`noti_by`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `notification_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`),
  ADD CONSTRAINT `notification_ibfk_3` FOREIGN KEY (`noti_to`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`post_by`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `post_function`
--
ALTER TABLE `post_function`
  ADD CONSTRAINT `post_function_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`),
  ADD CONSTRAINT `post_function_ibfk_2` FOREIGN KEY (`like_by`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `post_function_ibfk_3` FOREIGN KEY (`share_by`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `post_function_ibfk_4` FOREIGN KEY (`comment_by`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `post_function_ibfk_5` FOREIGN KEY (`save_by`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `story`
--
ALTER TABLE `story`
  ADD CONSTRAINT `story_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;