-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 29 2021 г., 01:23
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
-- База данных: `hairandbeautysalon`
--

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
(5, 'Ольга', 'Хорошее обслуживание!\r\nМастера просто СУПЕР!!!'),
(6, 'Viktoriya', 'CommentCommentComment CommentComment CommentCommentComment, CommentCommentCommentComment.'),
(10, 'OLEG', 'Хорошее обслуживание! Мастера просто СУПЕР!!!');

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

--
-- Дамп данных таблицы `customers`
--

INSERT INTO `customers` (`id`, `name`, `telephone`, `id_master`) VALUES
(36, 'OLEG', '+7 (668) 653-5689', 18),
(37, 'Polina', '+7 (222) 222-2222', 19);

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
(10, 'На голо', 100, '1534b1c2cc150ce729542672cf14aee7_1624917902.jpg', 5),
(11, 'Бокс, полубокс', 200, 'a26df60eceda3e24dbfb252845085d25_1624917983.jpg', 5),
(12, 'Молодёжная спортивная', 300, 'fade-hairstyles-for-men-skin-fade-hairstyles-new-haircuts-and-hairstyles-for-man-for_1624918075.jpg', 5),
(13, 'Короткие волосы', 300, '19ddc3f56eca3130fe2f6ff782b9d010_1624918181.jpeg', 6),
(14, 'Длинные волосы (асимметрия)', 400, 'jjagba37y_1624918260.jpg', 6),
(15, 'Каскад', 350, '36-820x1025_1624918345.jpg', 6);

-- --------------------------------------------------------

--
-- Структура таблицы `masters`
--

CREATE TABLE `masters` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about_me` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `masters`
--

INSERT INTO `masters` (`id`, `name`, `image`, `about_me`, `telephone`) VALUES
(18, 'Ольга', 'п2_1624916827.png', 'Краткая и интересная информация о мастере', '+7 (546) 656-4524'),
(19, 'Viktoriya', 'п3_1624917595.png', 'Краткая и интересная информация о мастере', '+7 (454) 645-6456'),
(20, 'Polina', 'п4_1624917623.png', 'Краткая и интересная информация о мастере', '+7 (456) 456-5455');

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `title`, `image1`, `image2`, `description`) VALUES
(9, 'Стрижка и окрашивание', 'd4Xt9kIXEBk_1624827507.jpg', 'cYOemtN5IGM_1624827507.jpg', 'До и после 🙌💇💆  👉☎ 89514727030 #жду #гагарина #салонкрасоты #парикмахерская #стрижки #окрашивание'),
(10, 'Стрижка и окрашивание', '6WOgd6Dk-bE_1624827320.jpg', 'muzUDEHhB14_1624827320.jpg', '🌿🌱💚 мастер Ольга 🙌💚🌱🌿 ❄❄❄❄Ждём Вас ❄❄❄❄ 💚 Гагарина 56/2 💚☎89524727030 #окрашивание #стрижка #новыйгод #лр #челябинск #74'),
(11, 'Окрашивание', 'U2qr5j9NunQ_1624827426.jpg', 'A47Ao6JOUsE_1624827426.jpg', '🌱🌿 Гагарина 56/2 🌱 🌿 🌱🌿☎ 89514727030 🌱🌿 #окрашивание #парикмахерская #ленинскийрайон #74 #дизайн #челябинск');

-- --------------------------------------------------------

--
-- Структура таблицы `recordings`
--

CREATE TABLE `recordings` (
  `id` int(11) NOT NULL,
  `id_master` int(11) NOT NULL,
  `id_hair` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `recordings`
--

INSERT INTO `recordings` (`id`, `id_master`, `id_hair`, `id_customer`, `date`) VALUES
(24, 18, 10, 36, '2021-06-24'),
(25, 19, 15, 37, '2021-06-30');

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
(6, 'Стрижки женские', 'korotkie-strizhki-25_1624918119.jpg');

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
  ADD KEY `id_customer` (`id_customer`);

--
-- Индексы таблицы `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT для таблицы `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT для таблицы `haircuts`
--
ALTER TABLE `haircuts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `masters`
--
ALTER TABLE `masters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `recordings`
--
ALTER TABLE `recordings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT для таблицы `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

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
  ADD CONSTRAINT `recordings_ibfk_4` FOREIGN KEY (`id_customer`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
