-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 23 2020 г., 16:13
-- Версия сервера: 5.6.43
-- Версия PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `eltransport`
--

-- --------------------------------------------------------

--
-- Структура таблицы `accounts`
--

CREATE TABLE `accounts` (
  `ID` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `surname` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `patronomyc` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activation` int(1) NOT NULL DEFAULT '0',
  `balans` int(5) DEFAULT '0',
  `admin` tinyint(1) DEFAULT '0',
  `office_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `accounts`
--

INSERT INTO `accounts` (`ID`, `name`, `surname`, `patronomyc`, `password`, `email`, `phone`, `activation`, `balans`, `admin`, `office_id`) VALUES
(55, 'Егор', 'Рожко', 'Сергеевич', '123', 'mail', '321', 1, 9910, 1, 1),
(71, 'Андрей', 'Рожко', 'Сергеевич', '123', 'mail1', '321', 1, 750, 0, NULL),
(72, 'Сергей', 'Рожко', 'Васильевич', '123', 'mail2', '231', 0, 500, 0, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `offices`
--

CREATE TABLE `offices` (
  `id` int(11) NOT NULL,
  `adress` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `offices`
--

INSERT INTO `offices` (`id`, `adress`) VALUES
(1, 'Соломенковская 5а'),
(2, 'Горького 86');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `transport_id` int(11) NOT NULL,
  `date_start` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_finish` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cost` int(11) DEFAULT NULL,
  `finish` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `transport_id`, `date_start`, `date_finish`, `cost`, `finish`) VALUES
(2, 55, 7, '2020-6-13 11:43', '2020-6-22 22:20', 0, 1),
(4, 55, 7, '2020-6-14 16:30', '2020-6-22 22:20', 0, 1),
(5, 55, 7, '2020-6-14 16:57', '2020-6-22 22:20', 0, 1),
(6, 55, 7, '2020-6-15 10:10', '2020-6-22 22:20', 0, 1),
(7, 55, 7, '2020-6-15 10:17', '2020-6-22 22:20', 0, 1),
(8, 55, 7, '2020-6-15 10:23', '2020-6-22 22:20', 0, 1),
(9, 55, 7, '2020-6-15 10:56', '2020-6-22 22:20', 0, 1),
(10, 55, 8, '2020-6-18 18:50', '2020-6-22 21:50', 90, 1),
(11, 55, 10, '2020-6-19 08:29', '2020-6-20 15:33', 310, 1),
(12, 55, 10, '2020-6-19 08:31', '2020-6-20 15:33', 310, 1),
(13, 55, 10, '2020-6-19 08:35', '2020-6-20 15:33', 310, 1),
(14, 55, 7, '2020-6-20 15:38', '2020-6-22 22:20', 0, 1),
(15, 55, 8, '2020-6-20 17:10', '2020-6-22 21:50', 90, 1),
(16, 55, 7, '2020-6-20 19:27', '2020-6-22 22:20', 0, 1),
(17, 55, 8, '2020-6-20 19:27', '2020-6-22 21:50', 90, 1),
(18, 71, 9, '2020-6-20 11:52', '2020-6-21 13:00', 250, 1),
(19, 71, 8, '2020-6-22 12:41', '2020-6-22 21:50', 90, 1),
(20, 55, 8, '2020-6-22 21:50', '2020-6-22 21:50', 90, 1),
(21, 55, 7, '2020-6-22 22:19', '2020-6-22 22:20', 0, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `reserved_transport`
--

CREATE TABLE `reserved_transport` (
  `id_transport` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `support`
--

CREATE TABLE `support` (
  `id` int(11) NOT NULL,
  `theme` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_check` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `support`
--

INSERT INTO `support` (`id`, `theme`, `message`, `contact`, `answer`, `user_check`) VALUES
(1, '123', '123', 'mail', 'Вопрос. Ответил сотрудник службы поддержки: Рожко Егор Сергеевич.', 1),
(2, '123', '2123', 'mail', 'ответ. Ответил сотрудник службы поддержки: Рожко Егор Сергеевич.', 1),
(3, '123', '123', 'mail', 'ответ. Ответил сотрудник службы поддержки: Рожко Егор Сергеевич.', 1),
(4, 'Забыл пароль', 'забыл пароль', 'mail', NULL, 1),
(5, 'Тема', 'Памагити', '123', NULL, 0),
(6, '123', 'Памагити', '123', NULL, 0),
(7, 'Ghbvth', 'gfdg', 'mail', NULL, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `transport`
--

CREATE TABLE `transport` (
  `id` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_office` int(11) DEFAULT NULL,
  `image` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT 'images/no-image.png',
  `max_weight` int(3) DEFAULT NULL,
  `max_speed` int(3) DEFAULT NULL,
  `power_engine` int(4) DEFAULT NULL,
  `mileage_single_charge` int(3) DEFAULT NULL,
  `color` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reserved` tinyint(4) NOT NULL DEFAULT '0',
  `cost` int(2) NOT NULL DEFAULT '10',
  `in_order` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `transport`
--

INSERT INTO `transport` (`id`, `title`, `id_office`, `image`, `max_weight`, `max_speed`, `power_engine`, `mileage_single_charge`, `color`, `reserved`, `cost`, `in_order`) VALUES
(7, 'Электровелосипед', 2, 'images/no-image.png', 120, 40, 110, 30, 'Красный', 0, 10, 0),
(8, 'Гироскутер', 1, 'images/no-image.png', 90, 35, 90, 10, 'Синий', 0, 10, 0),
(9, 'Электросамокат', 2, 'images/no-image.png', 110, 50, 120, 40, 'Зеленый', 0, 10, 0),
(10, 'Гироскутер', 1, 'images/no-image.png', 90, 30, 80, 30, 'Желтый', 0, 10, 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `offices`
--
ALTER TABLE `offices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `transport_id` (`transport_id`);

--
-- Индексы таблицы `reserved_transport`
--
ALTER TABLE `reserved_transport`
  ADD KEY `id_transport` (`id_transport`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `support`
--
ALTER TABLE `support`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `transport`
--
ALTER TABLE `transport`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_office` (`id_office`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `accounts`
--
ALTER TABLE `accounts`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT для таблицы `offices`
--
ALTER TABLE `offices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `support`
--
ALTER TABLE `support`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `transport`
--
ALTER TABLE `transport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`transport_id`) REFERENCES `transport` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `accounts` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `reserved_transport`
--
ALTER TABLE `reserved_transport`
  ADD CONSTRAINT `reserved_transport_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `accounts` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `reserved_transport_ibfk_2` FOREIGN KEY (`id_transport`) REFERENCES `transport` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `transport`
--
ALTER TABLE `transport`
  ADD CONSTRAINT `transport_ibfk_1` FOREIGN KEY (`id_office`) REFERENCES `offices` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
