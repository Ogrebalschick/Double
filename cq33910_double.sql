-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Фев 05 2022 г., 08:36
-- Версия сервера: 5.7.35-38
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `c291470u_double`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `login` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `admins`
--

INSERT INTO `admins` (`id`, `login`, `email`, `password`) VALUES
(1, 'ilya', 'ilya.ya.2011@bk.ru', '$2y$10$/bI0PRgAV9oMMEEIEm7dJ.opVl4gLFDuTpYxH9A2f8DMCquw19BF.'),
(2, '123', '123@mail.ru', '$2y$10$hSfCyZE5/IYY96iGCDIfle9qcxFdQbg0KQXFZVwmJk84k7E9Wi0Hu'),
(3, '1', '12212121@mail.ru', '$2y$10$OGlu.f.I/67ugkXvavyWqe9qjHbxuR/rQWO4KIh8ihhyfcGSv9gpG'),
(4, 'Argonaft', '1223@mail.ru', '$2y$10$HORd39liIy5oADiwp0HHCuIBbb4FMhs/meIc1h/2hHzMg6ETGh/5q'),
(5, 'Argonaft123', NULL, '$2y$10$QzdnCNTqfV7LueTGRB6OCeFE6DWpaPQQPxu/LGoL1K6sOOAMDjZXW'),
(6, 'Argonaft1234', NULL, '$2y$10$EBN8WLb8HJifyVfE4Iv6PONiN6JLvE9Wfbb7vbSlGz1mG18yrLtyO'),
(7, 'ilya1', NULL, '$2y$10$rw1n72eU4WZOetYrw7JG.u0R3tuHAIZm/GxP1Bh/HirKbCSPFppQ6');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `pdf`
--

CREATE TABLE IF NOT EXISTS `pdf` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `file` text NOT NULL,
  `hide` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `pdf`
--

INSERT INTO `pdf` (`id`, `name`, `file`, `hide`) VALUES
(51, '1.pdf', '../../music/1.pdf', 'false'),
(52, 'Get_Started_With_Smallpdf.pdf', '../../music/Get_Started_With_Smallpdf.pdf', 'false'),
(53, 'Screenshot_60-конвертирован.pdf', '../../music/Screenshot_60-конвертирован.pdf', 'false');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` bigint(20) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `title`, `price`, `description`) VALUES
(4, '1d', 3, '2'),
(5, '121', 33, '23'),
(8, '123', 123, '123'),
(9, '12', 213, '31'),
(10, '2121', 2112212121, '22121'),
(11, '2121', 2112212121, '22121'),
(12, '2121', 2112212121, '22121');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` text NOT NULL,
  `password` text NOT NULL,
  `access` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `access`) VALUES
(1, 'test', 'test', 'admin'),
(2, 'test2', '1234', 'user'),
(3, 'test', 'test12221212', 'user'),
(5, 'pasha', 'qwerty', 'admin'),
(6, 'admin', 'admin', 'admin');

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
