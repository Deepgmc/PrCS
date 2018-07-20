-- phpMyAdmin SQL Dump
-- version 4.6.3
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Июл 20 2018 г., 01:46
-- Версия сервера: 5.7.14
-- Версия PHP: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `prcs`
--

-- --------------------------------------------------------

--
-- Структура таблицы `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` varchar(10) NOT NULL,
  `text` text NOT NULL,
  `add_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `companies`
--

CREATE TABLE `companies` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `inn` varchar(12) NOT NULL,
  `info` text NOT NULL,
  `ceo_fio` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `companies`
--

INSERT INTO `companies` (`id`, `name`, `inn`, `info`, `ceo_fio`, `address`, `phone`) VALUES
(1, 'Сбербанк России', '7707083893', 'Северо-Западный банк ПАО Сбербанк работает на территории 7 субъектов РФ — Санкт-Петербурга, Ленинградской, Калининградской, Мурманской, Псковской, Новгородской областей, а также Республики Карелия. В настоящее время Северо-Западный банк Сбербанка России располагает самой развитой сетью в регионе — более 1 тыс. офисов по обслуживанию клиентов.', 'Греф Герман Оскарович', 'Москва, ул. Вавилова, д.19', '(495) 123-45-67'),
(2, 'Лукойл', '7708004767', 'ЛУКОЙЛ — одна из крупнейших публичных вертикально интегрированных нефтегазовых компаний в мире, на долю которой приходится более 2% мировой добычи нефти и около 1% доказанных запасов углеводородов.', 'Аликперов Вагит Юсуфович', 'Москва, Сретенский бульвар. д 11', '(495)627-44-44'),
(3, 'ПКР', '1234567890', 'Консалтинговая компания «Профессиональные Комплексные Решения» (ПКР) - это команда профессиональных менеджеров, с большим практическим опытом в области корпоративных финансов, маркетинга, оценки имущества и налогового учета.', 'Новицкий Даниил Сергеевич', 'Санкт-Петербург, ул. Марата, д. 82', '(812) 363-48-99'),
(4, 'Exxon Mobil', '7705673123', '«ЭксонМобил» - крупнейшая открытая акционерная нефтегазовая компания, применяет технологические достижения  и инновации для удовлетворения растущего спроса мирового энергетического рынка. Мы располагаем крупнейшими в отрасли производственными ресурсами и входим в число крупнейших мировых компаний по переработке, производству  и маркетингу нефтепродуктов и продуктов нефтехимии.', 'Даррен Вудз', 'Москва, ул. Вавилова, д.25', '(495) 123-45-67'),
(5, 'McDonalds', '7708123767', 'Dick and Mac McDonald moved to California to seek opportunities they felt unavailable in New England. Failing in the movie business, they subsequently proved successful in operating drive-in restaurants. In 1948 they took a risk by streamlining their operations and introducing their Speedee Service System featuring 15 cent hamburgers. The restaurant’s success led the brothers to begin franchising their concept—nine becoming operating restaurants.', 'Steve Easterbrook', 'Москва, ул. Вавилова, д.7', '(800) 707 44 99');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `login` varchar(25) NOT NULL,
  `acc_type` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `login`, `acc_type`) VALUES
(1, 'Сергей Сухоруков', 'Sergey', 1),
(4, 'Tom Abramovich', 'Tom', 1),
(3, 'Иван Сидоров', 'Ivan', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_id` (`company_id`),
  ADD KEY `user_id` (`user_id`);
ALTER TABLE `comments` ADD FULLTEXT KEY `type` (`type`);

--
-- Индексы таблицы `companies`
--
ALTER TABLE `companies`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
