-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Янв 27 2021 г., 07:55
-- Версия сервера: 5.7.31
-- Версия PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- База данных: `nix_edu`
--

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `text` text NOT NULL,
  `published` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `title`, `text`, `published`, `created_at`) VALUES
(1, 'Update title Y', 'article description 1 article description article description article description article description article description article description ', 1, '2021-01-20 11:07:25'),
(2, 'article title 2', 'article description 2 article description article description article description article description article description article description ', 1, '2021-01-20 11:07:25'),
(3, 'article title 3', 'article description 3 article description article description article description article description article description article description ', 1, '2021-01-20 11:07:53'),
(4, 'article title 4', 'article description 4 article description article description article description article description article description article description ', 1, '2021-01-20 11:07:53'),
(5, 'article title 5', 'article description 5 article description article description article description article description article description article description ', 1, '2021-01-20 11:08:03'),
(6, 'test', 'text', 0, '2021-01-22 10:16:49'),
(7, 'test', 'text', 0, '2021-01-22 10:18:33'),
(8, 'Update title X', 'text', 1, '2021-01-22 11:40:36'),
(9, 'test', 'text', 0, '2021-01-25 13:53:27'),
(10, 'test', 'text', 0, '2021-01-25 13:53:30'),
(11, 'test', 'text', 0, '2021-01-25 13:53:45'),
(12, 'test', 'text', 0, '2021-01-25 13:53:48'),
(13, 'test', 'text', 0, '2021-01-25 13:53:48'),
(14, 'test', 'text', 0, '2021-01-25 13:54:19'),
(15, 'test', 'text', 0, '2021-01-25 13:54:32'),
(16, 'test', 'text', 0, '2021-01-25 13:56:01'),
(17, 'test', 'text', 0, '2021-01-25 13:56:36'),
(18, 'test', 'text', 0, '2021-01-25 13:59:09'),
(19, 'test', 'text', 0, '2021-01-25 13:59:12');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL DEFAULT '',
  `login` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `login`, `password`, `created_at`) VALUES
(1, 'John Do', 'admin', '$2y$10$HBi00H3b2ZwuWWgntTIt.eprhQufeCoD28aLAWySagnaOvsY.3RZ6', '2021-01-26 12:36:03');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;
