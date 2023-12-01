-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Дек 01 2023 г., 09:44
-- Версия сервера: 10.4.27-MariaDB
-- Версия PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `gallery_two`
--

-- --------------------------------------------------------

--
-- Структура таблицы `pictures`
--

CREATE TABLE `pictures` (
  `id` int(6) NOT NULL,
  `title` varchar(255) NOT NULL,
  `artist` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `academic_drawing` varchar(255) NOT NULL,
  `year` int(255) NOT NULL,
  `price` int(255) NOT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `pictures`
--

INSERT INTO `pictures` (`id`, `title`, `artist`, `genre`, `country`, `academic_drawing`, `year`, `price`, `image_path`) VALUES
(7, 'тестик', 'тестик', 'тестик', 'тестик', 'тестик', 0, 0, '../uploads/1.jpg'),
(8, 'qweqwe', 'qweq', 'weqw', 'eqwe', 'qwe', 0, 0, '../uploads/1.jpg'),
(9, 'fg', 'sdfs', 'sdf', 'sdf', 'sdf', 2344, 2344, '../uploads/4.jpg'),
(10, '123', '123', '123', '123', '123', 4444, 2222, '../uploads/4.jpg'),
(11, '123', '123', '123', '123', '123', 4444, 2222, '../uploads/4.jpg'),
(12, 'sdf', 'sdf', 'sdf', 'sdf', 'sdf', 999, 888, '../uploads/1.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(6) UNSIGNED NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` enum('user','admin') NOT NULL DEFAULT 'user',
  `avatar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `name`, `email`, `role`, `avatar`) VALUES
(2, 'XeindsTwo', '$2y$10$8FrsCRhSI6uDpkAUTJmS.OkO9XIlJRyeCi2Et9YmCn.US0RN0QuFC', 'email', 'email@gmail.com', 'user', '../uploads/avatar_6566e4900d27d_avatar.jpg'),
(6, 'Nikita', '$2y$10$BCOZU5VeSq2DbU/61Irnt.JpgUe/M.UWip25I3l4cRZYqRvvddBXO', 'Никита', 'email@gmail.com', 'user', NULL),
(13, 'admin', '$2y$10$a2AMNPLeUAS2gtQt17Ob9O4Dl9t1JiNM62mIB91D..XroCDND55Be', 'admin', 'admin.@gmail.com', 'admin', NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `pictures`
--
ALTER TABLE `pictures`
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
-- AUTO_INCREMENT для таблицы `pictures`
--
ALTER TABLE `pictures`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
