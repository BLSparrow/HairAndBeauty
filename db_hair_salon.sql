-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 15 2021 г., 11:09
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `db_hair_salon`
--

-- --------------------------------------------------------

--
-- Структура таблицы `backgrounds`
--

CREATE TABLE `backgrounds` (
  `id` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `name`, `text`) VALUES
(2, 'Ольга', 'cxv v xv v d vdg dfvdg !!!!'),
(4, 'Viktoriya', 'dgf d g sd gdg fg  ds gf'),
(6, 'OLEG', 'fh f hfhf fh');

-- --------------------------------------------------------

--
-- Структура таблицы `commentsforposts`
--

CREATE TABLE `commentsforposts` (
  `id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `commentsforposts`
--

INSERT INTO `commentsforposts` (`id`, `name`, `text`, `post_id`) VALUES
(1, 'OLEG', 'fg dfg f   kdjhgkjhds  hdghdg heh!!!!!!', 10),
(2, 'Ольга', 'ghg gf gfh', 11),
(3, 'dgdf', 'fhyuj', 9),
(6, 'Mikle', 'This is very good!!!', 10),
(9, 'dgdf', 'dgdfg g fh  dfgh', 9);

-- --------------------------------------------------------

--
-- Структура таблицы `commentsforpostverification`
--

CREATE TABLE `commentsforpostverification` (
  `id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `commentsforverification`
--

CREATE TABLE `commentsforverification` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_master` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `haircuts`
--

CREATE TABLE `haircuts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(255) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `haircuts`
--

INSERT INTO `haircuts` (`id`, `title`, `price`, `image`, `service_id`) VALUES
(10, 'На голо', 1500, '1534b1c2cc150ce729542672cf14aee7_1624917902.jpg', 5),
(11, 'Бокс, полубокс', 200, 'a26df60eceda3e24dbfb252845085d25_1624917983.jpg', 5),
(12, 'Молодёжная спортивная', 300, 'fade-hairstyles-for-men-skin-fade-hairstyles-new-haircuts-and-hairstyles-for-man-for_1624918075.jpg', 5),
(13, 'Короткие волосы', 300, '19ddc3f56eca3130fe2f6ff782b9d010_1624918181.jpeg', 6),
(14, 'Длинные волосы (асимметрия)', 400, 'jjagba37y_1624918260.jpg', 6),
(15, 'Каскад', 350, '36-820x1025_1624918345.jpg', 6);

-- --------------------------------------------------------

--
-- Структура таблицы `ip_users`
--

CREATE TABLE `ip_users` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `ip` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_resp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `ip_users`
--

INSERT INTO `ip_users` (`id`, `post_id`, `ip`, `date_resp`) VALUES
(51, 9, '127.0.0.1', '2021-08-29 00:00:00'),
(52, 10, '127.0.0.1', '2021-08-29 00:00:00'),
(53, 11, '127.0.0.1', '2021-08-29 00:00:00');

-- --------------------------------------------------------

--
-- Структура таблицы `masters`
--

CREATE TABLE `masters` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about_me` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `masters`
--

INSERT INTO `masters` (`id`, `name`, `image`, `about_me`, `telephone`, `email`) VALUES
(18, 'Ольга25654', 'п2_1624916827.png', 'Краткая и интересная информация о мастере', '+7 (546) 656-1111', 'mobs1444444@mail.ru'),
(19, 'Viktoriya', 'п3_1624917595.png', 'Краткая и интересная информация о мастере', '+7 (454) 645-6456', 'mobs15@mail.ru'),
(20, 'Polina', 'п4_1624917623.png', 'Краткая и интересная информация о мастере', '+7 (456) 456-5455', 'mobs16@mail.ru');

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `count_like` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `title`, `image1`, `image2`, `description`, `count_like`) VALUES
(9, 'Стрижка и окрашивание', 'd4Xt9kIXEBk_1624827507.jpg', 'cYOemtN5IGM_1624827507.jpg', 'До и после 🙌💇💆  👉☎ 89514727030 #жду #гагарина #салонкрасоты #парикмахерская #стрижки #окрашивание', 76),
(10, 'Стрижка и окрашивание', '6WOgd6Dk-bE_1624827320.jpg', 'muzUDEHhB14_1624827320.jpg', '🌿🌱💚 мастер Ольга 🙌💚🌱🌿 ❄❄❄❄Ждём Вас ❄❄❄❄ 💚 Гагарина 56/2 💚☎89524727030 #окрашивание #стрижка #новыйгод #лр #челябинск #74', 64),
(11, 'Окрашивание', 'U2qr5j9NunQ_1624827426.jpg', 'A47Ao6JOUsE_1624827426.jpg', '🌱🌿 Гагарина 56/2 🌱 🌿 🌱🌿☎ 89514727030 🌱🌿 #окрашивание #парикмахерская #ленинскийрайон #74 #дизайн #челябинск', 356);

-- --------------------------------------------------------

--
-- Структура таблицы `recordings`
--

CREATE TABLE `recordings` (
  `id` int(11) NOT NULL,
  `id_master` int(11) NOT NULL,
  `id_hair` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_time` int(11) NOT NULL,
  `date_reg` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `services`
--

INSERT INTO `services` (`id`, `title`, `image`) VALUES
(5, 'Мужские стрижки', 'Are-Earrings-Right-for-Men-768x980_1624917824.jpeg'),
(6, 'Стрижки женские', 'korotkie-strizhki-25_1624918119.jpg'),
(7, 'fghfhgfdhg', '8-long-copper-balayage-hair_1628693267.jpg'),
(8, 'hgjmc', '1530649089_39_1628693275.jpg'),
(9, 'xsaa', 'kurze-haare-2-768x980_1628693289.jpeg');

-- --------------------------------------------------------

--
-- Структура таблицы `times`
--

CREATE TABLE `times` (
  `id` int(11) NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `times`
--

INSERT INTO `times` (`id`, `time`) VALUES
(1, '10:00:00'),
(2, '11:00:00'),
(3, '12:00:00'),
(4, '13:00:00'),
(5, '14:00:00'),
(6, '15:00:00'),
(7, '16:00:00'),
(8, '17:00:00'),
(9, '18:00:00'),
(10, '19:00:00');

-- --------------------------------------------------------

--
-- Структура таблицы `timetables`
--

CREATE TABLE `timetables` (
  `id` int(11) NOT NULL,
  `master_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `timetables`
--

INSERT INTO `timetables` (`id`, `master_id`, `date`, `time_id`) VALUES
(41, 18, '2021-08-23', '1, 2, 3'),
(42, 19, '2021-08-24', '1, 2, 3, 4, 5, 6, 7, 8, 9, 10'),
(43, 20, '2021-08-26', '3, 7, 8, 9, 10'),
(44, 18, '2021-08-14', '1, 2, 3, 4, 5, 6, 7, 8, 9, 10'),
(45, 20, '2021-08-27', '1, 2, 3, 4, 5, 6, 7, 8, 9, 10');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `role`) VALUES
(1, 'Admin', '$2y$10$KxZnNVx70XpvD6SfoABM0erSljLak1oJ5ycMhxAJ1sGwmFwX3hVsa', 'Admin'),
(3, 'User', '$2y$10$o9TNJ87Io49LRCElOBhQH.Nf.c.ZsQKPe.5JU0syf9wv6A5pWv9gu', 'Manager');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `commentsforposts`
--
ALTER TABLE `commentsforposts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`);

--
-- Индексы таблицы `commentsforpostverification`
--
ALTER TABLE `commentsforpostverification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`);

--
-- Индексы таблицы `commentsforverification`
--
ALTER TABLE `commentsforverification`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_master` (`id_master`);

--
-- Индексы таблицы `haircuts`
--
ALTER TABLE `haircuts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_id` (`service_id`);

--
-- Индексы таблицы `ip_users`
--
ALTER TABLE `ip_users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `masters`
--
ALTER TABLE `masters`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `recordings`
--
ALTER TABLE `recordings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_hair` (`id_hair`),
  ADD KEY `id_master` (`id_master`),
  ADD KEY `id_customer` (`id_customer`),
  ADD KEY `id_time` (`id_time`);

--
-- Индексы таблицы `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `times`
--
ALTER TABLE `times`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `timetables`
--
ALTER TABLE `timetables`
  ADD PRIMARY KEY (`id`),
  ADD KEY `master_id` (`master_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `commentsforposts`
--
ALTER TABLE `commentsforposts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `commentsforpostverification`
--
ALTER TABLE `commentsforpostverification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `commentsforverification`
--
ALTER TABLE `commentsforverification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT для таблицы `haircuts`
--
ALTER TABLE `haircuts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `ip_users`
--
ALTER TABLE `ip_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT для таблицы `masters`
--
ALTER TABLE `masters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `recordings`
--
ALTER TABLE `recordings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT для таблицы `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `times`
--
ALTER TABLE `times`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `timetables`
--
ALTER TABLE `timetables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `commentsforposts`
--
ALTER TABLE `commentsforposts`
  ADD CONSTRAINT `commentsforposts_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `commentsforpostverification`
--
ALTER TABLE `commentsforpostverification`
  ADD CONSTRAINT `commentsforpostverification_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_ibfk_1` FOREIGN KEY (`id_master`) REFERENCES `masters` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `haircuts`
--
ALTER TABLE `haircuts`
  ADD CONSTRAINT `haircuts_ibfk_1` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `recordings`
--
ALTER TABLE `recordings`
  ADD CONSTRAINT `recordings_ibfk_2` FOREIGN KEY (`id_hair`) REFERENCES `haircuts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `recordings_ibfk_3` FOREIGN KEY (`id_master`) REFERENCES `masters` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `recordings_ibfk_4` FOREIGN KEY (`id_customer`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `recordings_ibfk_5` FOREIGN KEY (`id_time`) REFERENCES `times` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `timetables`
--
ALTER TABLE `timetables`
  ADD CONSTRAINT `timetables_ibfk_1` FOREIGN KEY (`master_id`) REFERENCES `masters` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
