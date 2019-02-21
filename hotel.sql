-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 21 2019 г., 05:56
-- Версия сервера: 8.0.12
-- Версия PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `hotel`
--

-- --------------------------------------------------------

--
-- Структура таблицы `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `tenant` int(11) NOT NULL,
  `room` int(11) DEFAULT NULL,
  `total_price` int(11) NOT NULL DEFAULT '2000'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `reservation`
--

INSERT INTO `reservation` (`id`, `check_in`, `check_out`, `tenant`, `room`, `total_price`) VALUES
(53, '2015-05-05', '2016-05-05', 2, 2, 2000),
(54, '2015-05-05', '2016-05-05', 2, 1, 2000),
(55, '2015-05-05', '2016-05-05', 2, 3, 2000),
(78, '2019-01-31', '2019-02-16', 123, 1, 85000),
(84, '2000-05-05', '2000-05-05', 0, 18, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `name` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `capacity` int(11) NOT NULL DEFAULT '1',
  `description` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `number` int(11) NOT NULL DEFAULT '1',
  `price` int(11) NOT NULL DEFAULT '1000'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `capacity`, `description`, `number`, `price`) VALUES
(1, 'Крутой номер', 4, 'Самый грутой номер в нашем отеле\r\n                                                       ', 3, 5000),
(2, 'Обычный номер', 3, 'Простой номер нашего отеля', 20, 3000),
(3, 'Самый не очень номер', 1, 'Номер для тех у кого нет денег даже на еду', 34, 500),
(18, 'test', 1, 'test', 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `room_images`
--

CREATE TABLE `room_images` (
  `img_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `room_id_img` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'room.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `room_images`
--

INSERT INTO `room_images` (`img_id`, `room_id`, `room_id_img`) VALUES
(1, 1, 'room1_1.jpg'),
(2, 1, 'room1_2.jpg'),
(3, 2, 'room2_1.jpg'),
(4, 2, 'room2_2.jpg'),
(5, 3, 'room3_1.jpg'),
(6, 3, 'room3_2.jpg'),
(10, 1, 'room1_3.jpg'),
(11, 2, 'room2_3.jpg'),
(12, 3, 'room3_3.jpg'),
(35, 18, 'i1'),
(36, 18, 'i2'),
(37, 18, 'i2'),
(38, 18, '');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(191) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `email` varchar(191) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `role` varchar(155) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `email`, `role`) VALUES
(11, '123', '$2y$10$yODk9QBi1l6Pevcq4GTt3.LHeK/nlIXfaTWMo4eu8RCD3zJ0GaVHS', 'fed51@mail.ru', 'user'),
(12, '321', '$2y$10$eV6qR9u/1kTuStCxbmIyZu3D8Yjv6EaBydKVJHJQs.Zcqcrkvmmj2', '123@gmail.com', 'user'),
(14, 'admin', '$2y$10$7FOpQJMZJ.LZTBdHRwCsauLV4P0DUVzkq6WhzlG7LTmhCbnzkS7Iu', 'admin@admin.admin', 'admin'),
(15, '1232', '$2y$10$Zim4lp97UrH.ioeUSDn2kuh5r3bATsjv1cRvVKWw.OgNMdFeqMuWm', '123@gmail.com2', 'user');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `room_images`
--
ALTER TABLE `room_images`
  ADD PRIMARY KEY (`img_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT для таблицы `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `room_images`
--
ALTER TABLE `room_images`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
