
CREATE TABLE `post` (
  `p_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `text` text NOT NULL,
  `time` text NOT NULL,
  `music` text NOT NULL,
  `image` text NOT NULL,
  `video` text NOT NULL,
  `camera` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



INSERT INTO `post` (`p_id`, `user_id`, `text`, `time`, `music`, `image`, `video`, `camera`) VALUES
(18, 15, 'Hello....', 'Sep,26 2023 03:17:35 PM', '', '', '', ''),
(19, 14, 'Hello.....How are you..?', 'Sep,26 2023 03:26:10 PM', '', '', '', ''),


CREATE TABLE `post_comment` (
  `cmt_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `cmt_by` int(11) NOT NULL,
  `reply_by` int(11) NOT NULL,
  `cmt` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `post_comment` (`cmt_id`, `post_id`, `cmt_by`, `reply_by`, `cmt`) VALUES
(98, 24, 9, 0, 'Good Morning...'),
(102, 30, 15, 0, 'hello'),

ALTER TABLE `post`
  ADD PRIMARY KEY (`p_id`);


ALTER TABLE `post_comment`
  ADD PRIMARY KEY (`cmt_id`);


ALTER TABLE `post`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

ALTER TABLE `post_comment`
  MODIFY `cmt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;
