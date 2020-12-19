-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 11 2020 г., 06:54
-- Версия сервера: 5.6.38
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `project1`
--

-- --------------------------------------------------------

--
-- Структура таблицы `universities`
--

CREATE TABLE `universities` (
  `id` int(10) NOT NULL,
  `name` varchar(355) NOT NULL,
  `description` varchar(355) NOT NULL,
  `count_places` int(10) NOT NULL,
  `photo` varchar(355) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `universities`
--

INSERT INTO `universities` (`id`, `name`, `description`, `count_places`, `photo`) VALUES
(1, 'МГУ им. Ломоносова', 'Лучший университет России', 100, 'img/msu.jpg'),
(2, 'Московский Государственный Институт Международных Отношений', 'Московский государственный институт международных отношений МИД Российской Федерации — один из ведущих российских университетов, готовящий специалистов по 18 направлениям', 100, 'img/mgimo.png'),
(3, 'Университет ИТМО', 'Университет ИТМО — первый неклассический университет. Стать высококлассным и продвинутым программистом, ученым, инженером, предпринимателем, выбрать профессию будущего на стыке новых направлений и исполнить свою мечту очень легко. Нужно выбрать Университет ИТМО.\r\n\r\n', 100, 'img/itmo.jpg'),
(4, 'Universal University', 'Первый в России университет креативных индустрий, где учат и учатся по-другому. В Universal University учат учиться и закладывать полученное знание в жизнеспособные проекты, которые становятся движущей силой в креативных индустриях в масштабах города, страны и мира.', 100, 'img/uu.png');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `universities`
--
ALTER TABLE `universities`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `universities`
--
ALTER TABLE `universities`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
