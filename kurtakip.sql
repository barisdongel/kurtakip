-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 13 Haz 2022, 02:29:13
-- Sunucu sürümü: 10.4.24-MariaDB
-- PHP Sürümü: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `kurtakip`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `dovizler`
--

CREATE TABLE `dovizler` (
  `id` int(11) NOT NULL,
  `doviz_kodu` varchar(50) NOT NULL,
  `doviz_adi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `dovizler`
--

INSERT INTO `dovizler` (`id`, `doviz_kodu`, `doviz_adi`) VALUES
(1, 'USD', '$ Amerikan Doları'),
(2, 'EUR', '€ Euro'),
(3, 'RUB', 'Ruble'),
(4, 'GBP', '£ İngiliz Sterlini'),
(5, 'JPY', 'Japon Yeni'),
(6, 'gram-altin', 'Gram Altın'),
(7, 'AZN', 'Azerbaycan  Manatı'),
(10, 'AED', 'Birleşik Arap Emirlikleri Dirhemi');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `doviz_takip`
--

CREATE TABLE `doviz_takip` (
  `id` int(11) NOT NULL,
  `doviz_id` int(11) NOT NULL,
  `uye_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `doviz_takip`
--

INSERT INTO `doviz_takip` (`id`, `doviz_id`, `uye_id`) VALUES
(23, 10, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uye`
--

CREATE TABLE `uye` (
  `id` int(11) NOT NULL,
  `kullanici_adi` varchar(255) NOT NULL,
  `kullanici_sifre` varchar(255) NOT NULL,
  `kullanici_yetki` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `uye`
--

INSERT INTO `uye` (`id`, `kullanici_adi`, `kullanici_sifre`, `kullanici_yetki`) VALUES
(1, 'admin', '123', 0);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `dovizler`
--
ALTER TABLE `dovizler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `doviz_takip`
--
ALTER TABLE `doviz_takip`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `uye`
--
ALTER TABLE `uye`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `dovizler`
--
ALTER TABLE `dovizler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `doviz_takip`
--
ALTER TABLE `doviz_takip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Tablo için AUTO_INCREMENT değeri `uye`
--
ALTER TABLE `uye`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
