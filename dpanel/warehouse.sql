-- phpMyAdmin SQL Dump
-- version 4.0.10.10
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 05 2016 г., 19:08
-- Версия сервера: 5.6.26-log
-- Версия PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `warehouse`
--
CREATE DATABASE IF NOT EXISTS `warehouse` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `warehouse`;

-- --------------------------------------------------------

--
-- Структура таблицы `warehouse`
--

CREATE TABLE IF NOT EXISTS `warehouse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` int(11) NOT NULL COMMENT 'Код товара',
  `name` varchar(32) NOT NULL COMMENT 'Наименование товара',
  `price` int(11) NOT NULL COMMENT 'Цена товара',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Дамп данных таблицы `warehouse`
--

INSERT INTO `warehouse` (`id`, `code`, `name`, `price`) VALUES
(1, 304, 'Вино полусладкое', 150),
(4, 34, 'Арбуз камышинский', 23),
(5, 54, 'Арбуз астраханский', 45),
(6, 105, 'Вино сухое', 67),
(7, 45, 'Клубника виктория', 34),
(8, 78, 'Груша конференц', 23),
(9, 1234, 'Картошка старая', 45),
(10, 764, 'Вино белое', 67),
(11, 875, 'Водка московская', 120);

-- --------------------------------------------------------

--
-- Структура таблицы `wares`
--

CREATE TABLE IF NOT EXISTS `wares` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` int(11) NOT NULL COMMENT 'Код товара',
  `name` varchar(50) NOT NULL COMMENT 'Наименование товара',
  `date` date NOT NULL COMMENT 'Дата поступления товара',
  `col` varchar(11) NOT NULL COMMENT 'Вес товара',
  `price` int(11) NOT NULL COMMENT 'Цена товара',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Дамп данных таблицы `wares`
--

INSERT INTO `wares` (`id`, `code`, `name`, `date`, `col`, `price`) VALUES
(1, 304, 'Вино полусладкое', '2016-04-05', '125 шт.', 150),
(4, 34, 'Арбуз камышинский', '2016-04-05', '123 кг.', 23),
(5, 54, 'Арбуз астраханский', '2016-04-05', '23 кг.', 45),
(6, 105, 'Вино сухое', '2016-04-05', '23 шт.', 67),
(7, 45, 'Клубника виктория', '2016-04-13', '120 кг.', 34),
(8, 78, 'Груша конференц', '2016-04-13', '9 кг.', 23),
(9, 1234, 'Картошка старая', '2016-04-14', '10 кг.', 45),
(10, 764, 'Вино белое', '2016-04-14', '78 шт.', 67),
(11, 875, 'Водка московская', '2016-04-14', '78 шт.', 120);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
