-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Окт 31 2015 г., 19:35
-- Версия сервера: 5.5.46-0ubuntu0.14.04.2
-- Версия PHP: 5.5.9-1ubuntu4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `eshopper`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `sort_order` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`, `sort_order`, `status`) VALUES
(1, 'Рубашки', 2, 1),
(2, 'Джинсы', 1, 1),
(3, 'Шорты', 3, 1),
(4, 'Майки', 4, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `code` varchar(11) NOT NULL,
  `price` float NOT NULL,
  `avaliability` tinyint(1) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `is_new` tinyint(1) NOT NULL DEFAULT '0',
  `is_recommended` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `name`, `category_id`, `code`, `price`, `avaliability`, `brand`, `image`, `description`, `is_new`, `is_recommended`, `status`) VALUES
(3, 'Товар3', 1, '123321', 150, 1, 'Бренд1', '', 'Описание1', 1, 0, 1),
(4, 'товар4', 3, '456546', 200, 0, 'Бренд4', '', 'Описание4', 0, 1, 1),
(6, 'Товар6', 1, '32432', 32, 0, '', '', '', 0, 1, 1),
(7, 'Товар7', 1, '32432', 12, 0, '', '', '', 1, 1, 1),
(8, 'Товар8', 1, '324', 65, 0, '', '', '', 0, 1, 1),
(9, 'Товар9', 4, '234', 87, 0, '', '', '', 0, 0, 1),
(10, 'Товар10', 1, '4645', 87, 0, '', '', '', 0, 0, 1),
(11, 'Товар11', 1, '321', 90, 0, '', '', '', 0, 0, 1),
(12, 'Товар12', 2, '43543', 54, 0, '', '', '', 0, 0, 1),
(13, 'Товар13', 3, '324', 12, 0, '', '', '', 0, 0, 1),
(14, 'Товар14', 4, '123', 543, 0, '', '', '', 0, 0, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `product_order`
--

CREATE TABLE IF NOT EXISTS `product_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `user_phone` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_comment` text,
  `user_id` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `products` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Дамп данных таблицы `product_order`
--

INSERT INTO `product_order` (`id`, `user_name`, `user_phone`, `user_email`, `user_comment`, `user_id`, `date`, `products`, `status`) VALUES
(6, 'Алекс', '050405601', 'iirioterii@gmail.com', 'l;dfg;dlfmg;lfd', 0, '2015-10-01 16:07:35', '{"14":1,"13":4,"10":1,"9":1,"12":8}', 1),
(7, 'Маська', 'dsflk;gjdf;gldfj', 'iirioterii@gmail.com', 'выавыавы', 1, '2015-10-01 16:09:44', '{"12":2,"13":1,"14":1}', 1),
(9, 'alex', '34435435345', 'alex@gmail.com', 'fddfgfdgfdg', 5, '2015-10-06 12:18:41', '{"20":2,"19":1,"18":2,"16":2}', 1),
(10, 'iirioterii@gmail.com', '345435435435', 'iirioterii@gmail.com', 'dfgdfg', 1, '2015-10-13 09:26:07', '{"13":1}', 1),
(12, 'yuriyreva', '12321321312', 'iirioterii4@gmail.com', 'sada', 8, '2015-10-13 10:02:28', '{"12":1}', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `role`) VALUES
(1, 'iirioterii@gmail.com', 'iirioterii@gmail.com', '122f8837ff7e307b815873b66fc01016', 'admin'),
(8, 'Марк', 'iirioterii4@gmail.com', '122f8837ff7e307b815873b66fc01016', NULL),
(9, 'Маська', 'iirioterii5@gmail.com', '122f8837ff7e307b815873b66fc01016', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
