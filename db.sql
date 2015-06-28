
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Anamakine: localhost
-- Üretim Zamanı: 28 Haz 2015, 06:49:05
-- Sunucu sürümü: 5.1.66
-- PHP Sürümü: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Veritabanı: `u708425281_anka`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `anketonline`
--

CREATE TABLE IF NOT EXISTS `anketonline` (
  `nick` text NOT NULL,
  `islem_zamani` varchar(255) NOT NULL DEFAULT '',
  `ip` varchar(255) NOT NULL DEFAULT '',
  `ondurum` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin5;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `anketor`
--

CREATE TABLE IF NOT EXISTS `anketor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `yer` varchar(255) NOT NULL DEFAULT '',
  `tarih` text NOT NULL,
  `detay` text NOT NULL,
  `organizator` varchar(255) NOT NULL DEFAULT '',
  `katilanlar` varchar(255) NOT NULL DEFAULT '',
  `gun` int(11) NOT NULL DEFAULT '0',
  `ay` int(11) NOT NULL DEFAULT '0',
  `yil` int(11) NOT NULL DEFAULT '0',
  `saat` text NOT NULL,
  `zirve` text NOT NULL,
  `sira` int(11) NOT NULL DEFAULT '0',
  `tavsiye` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `yer` (`yer`),
  KEY `organizator` (`organizator`),
  KEY `katilanlar` (`katilanlar`),
  KEY `gun` (`gun`),
  KEY `ay` (`ay`),
  KEY `yil` (`yil`),
  KEY `sira` (`sira`)
) ENGINE=MyISAM DEFAULT CHARSET=latin5 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `anketyorum`
--

CREATE TABLE IF NOT EXISTS `anketyorum` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `yazan` varchar(255) NOT NULL DEFAULT '',
  `gun` int(11) NOT NULL DEFAULT '0',
  `ay` int(11) NOT NULL DEFAULT '0',
  `yil` int(11) NOT NULL DEFAULT '0',
  `saat` text NOT NULL,
  `tarih` text NOT NULL,
  `comment` text NOT NULL,
  `list` varchar(255) NOT NULL DEFAULT '',
  `falanfilan` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `yazan` (`yazan`),
  KEY `gun` (`gun`),
  KEY `ay` (`ay`),
  KEY `yil` (`yil`),
  KEY `list` (`list`)
) ENGINE=MyISAM DEFAULT CHARSET=latin5 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayar`
--

CREATE TABLE IF NOT EXISTS `ayar` (
  `site` varchar(255) NOT NULL DEFAULT '',
  `reg` varchar(255) NOT NULL DEFAULT '',
  `hit` varchar(255) NOT NULL DEFAULT '',
  KEY `site` (`site`),
  KEY `reg` (`reg`),
  KEY `hit` (`hit`)
) ENGINE=MyISAM DEFAULT CHARSET=latin5;

--
-- Tablo döküm verisi `ayar`
--

INSERT INTO `ayar` (`site`, `reg`, `hit`) VALUES
('on', 'on', '1139');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ban`
--

CREATE TABLE IF NOT EXISTS `ban` (
  `id` int(250) NOT NULL AUTO_INCREMENT,
  `ip` varchar(250) NOT NULL DEFAULT '0',
  `sayfasi` varchar(250) NOT NULL,
  `zaman` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin5 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `basliktakip`
--

CREATE TABLE IF NOT EXISTS `basliktakip` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `yazar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `baslik` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2024 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `eniyiler`
--

CREATE TABLE IF NOT EXISTS `eniyiler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `eid` text NOT NULL,
  `oysayisi` text NOT NULL,
  `yazar` text NOT NULL,
  `baslik` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `id_2` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin5 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `gidenmsg`
--

CREATE TABLE IF NOT EXISTS `gidenmsg` (
  `id` int(11) NOT NULL DEFAULT '0',
  `konu` text NOT NULL,
  `kime` varchar(50) NOT NULL DEFAULT '',
  `sentid` int(11) NOT NULL DEFAULT '0',
  `tarih` int(12) NOT NULL DEFAULT '0',
  `gun` int(12) NOT NULL DEFAULT '0',
  `ay` int(12) NOT NULL DEFAULT '0',
  `yil` int(12) NOT NULL DEFAULT '0',
  `saat` varchar(50) NOT NULL DEFAULT '',
  `gonderen` varchar(50) NOT NULL DEFAULT '',
  `mesaj` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin5;

--
-- Tablo döküm verisi `gidenmsg`
--

INSERT INTO `gidenmsg` (`id`, `konu`, `kime`, `sentid`, `tarih`, `gun`, `ay`, `yil`, `saat`, `gonderen`, `mesaj`) VALUES
(0, '..', 'ghurjhan', 85, 2147483647, 8, 10, 2009, '16:19', 'penishasan', 'u: kullandığım zaman entry gözükmüyo neden.'),
(0, '242 nolu entry', 'burcu', 97, 2147483647, 8, 10, 2009, '19:06', 'endoplazmikretikulum', 'ilk entry tanım olmalıdır.\r<br>sadece bkz vermiyoruz ilk entry de :)'),
(0, '242 nolu entry', 'endoplazmikretikulum', 98, 2147483647, 8, 10, 2009, '19:09', 'burcu', '\r<br>-------------- orijinal mesaj --------------\r<br>gönderen: endoplazmikretikulum\r<br>kime: burcu\r<br>tarih: 8/10/2009 19:06\r<br>konu: 242 nolu entry\r<br>ilk entry tanım olmalıdır.\r<br>sadece bkz vermiyoruz ilk entry de :)\r<br>\r<br>tamam :)'),
(0, '284 nolu entry', 'celxx', 99, 2147483647, 8, 10, 2009, '19:11', 'endoplazmikretikulum', 'i harfi yok mu klavyenizde?'),
(0, '', 'celxx', 101, 2147483647, 8, 10, 2009, '19:21', 'insan okuz olmasin', 'hocam imla bilgisine vs. biraz daha dikkat lütfen.'),
(0, 'hü', 'endoplazmikretikulum', 102, 2147483647, 8, 10, 2009, '19:22', 'endoplazmikretikulum', 'hö'),
(0, '297 nolu entry', '01', 106, 2147483647, 8, 10, 2009, '19:59', 'endoplazmikretikulum', 'mantığı anlayamadım?'),
(0, '297 nolu entry', 'endoplazmikretikulum', 112, 2147483647, 8, 10, 2009, '20:25', '01', '\r<br>-------------- orijinal mesaj --------------\r<br>gönderen: endoplazmikretikulum\r<br>kime: 01\r<br>tarih: 8/10/2009 19:59\r<br>konu: 297 nolu entry\r<br>mantığı anlayamadım?\r<br>\r<br>beşiktaş kelimesin,, daha iyi anlatmak iiçin cümle içinde kullandım mantık bu'),
(0, '297 nolu entry', '01', 113, 2147483647, 8, 10, 2009, '20:27', 'endoplazmikretikulum', 'sikik beşiktaş bir cümle değildir yalnız'),
(0, '297 nolu entry', 'endoplazmikretikulum', 114, 2147483647, 8, 10, 2009, '20:27', '01', '\r<br>-------------- orijinal mesaj --------------\r<br>gönderen: endoplazmikretikulum\r<br>kime: 01\r<br>tarih: 8/10/2009 20:27\r<br>konu: 297 nolu entry\r<br>sikik beşiktaş bir cümle değildir yalnız\r<br>\r<br>olsun sen anladın ya yeter\r<br>\r<br>'),
(0, '326 nolu entry', 'stormex', 115, 2147483647, 8, 10, 2009, '20:45', 'yazamaz', 'eyvallah ;)'),
(0, '303 nolu entry', 'endoplazmikretikulum', 116, 2147483647, 8, 10, 2009, '20:45', 'yazamaz', 'eyvallah ;)'),
(0, '326 nolu entry', 'yazamaz', 118, 2147483647, 8, 10, 2009, '22:32', 'stormex', 'cruel ben. : )\r<br>-------------- orijinal mesaj --------------\r<br>gönderen: yazamaz\r<br>kime: stormex\r<br>tarih: 8/10/2009 20:45\r<br>konu: 326 nolu entry\r<br>eyvallah ;)\r<br>'),
(0, '386 nolu entry', 'ghurjhan', 121, 2147483647, 8, 10, 2009, '23:34', 'yumuklu sucurta', 'seveceksin tabi yarak.\r<br>benden iyisini mi bulacan!'),
(0, '406 nolu entry', 'ghurjhan', 123, 2147483647, 8, 10, 2009, '23:55', 'yumuklu sucurta', 'skerler seni cocuk.'),
(0, '406 nolu entry', 'ghurjhan', 125, 2147483647, 8, 10, 2009, '23:56', 'yumuklu sucurta', 'oyle istiyorlar.\r<br>ne diye yazdigimi cikartmiyorsun lan guduk.\r<br>-------------- orijinal mesaj --------------\r<br>gönderen: ghurjhan\r<br>kime: yumuklu sucurta\r<br>tarih: 8/10/2009 23:55\r<br>konu: 406 nolu entry\r<br>niyeki\r<br>-------------- orijinal mesaj --------------\r<br>gönderen: yumuklu sucurta\r<br>kime: ghurjhan\r<br>tarih: 8/10/2009 23:55\r<br>konu: 406 nolu entry\r<br>skerler seni cocuk.\r<br>\r<br>'),
(0, '406 nolu entry', 'ghurjhan', 127, 2147483647, 8, 10, 2009, '23:58', 'yumuklu sucurta', 'olsun gene de skerler seni.\r<br>-------------- orijinal mesaj --------------\r<br>gönderen: ghurjhan\r<br>kime: yumuklu sucurta\r<br>tarih: 8/10/2009 23:57\r<br>konu: 406 nolu entry\r<br>abi sistemin bi engellemesi o. spam tarzı kabul edebiliyor bazen. sunucuya mail attım ilgilenicekler. bilmembişey limiti varmış. benle ilgisi yok yani\r<br>-------------- orijinal mesaj --------------\r<br>gönderen: yumuklu sucurta\r<br>kime: ghurjhan\r<br>tarih: 8/10/2009 23:56\r<br>konu: 406 nolu entry\r<br>oyle istiyorlar.\r<br>ne diye yazdigimi cikartmiyorsun lan guduk.\r<br>-------------- orijinal mesaj --------------\r<br>gönderen: ghurjhan\r<br>kime: yumuklu sucurta\r<br>tarih: 8/10/2009 23:55\r<br>konu: 406 nolu entry\r<br>niyeki\r<br>-------------- orijinal mesaj --------------\r<br>gönderen: yumuklu sucurta\r<br>kime: ghurjhan\r<br>tarih: 8/10/2009 23:55\r<br>konu: 406 nolu entry\r<br>skerler seni cocuk.\r<br>\r<br>\r<br>\r<br>'),
(0, '', 'ghurjhan', 133, 2147483647, 9, 10, 2009, '23:16', 'opmiyim terliyim', 'lan! geliosun yarın di mi'),
(0, '506 nolu entry', 'ghurjhan', 136, 2147483647, 9, 10, 2009, '23:27', 'foolia', 'tamam aşkım :( bekliyorum\r<br>-------------- orijinal mesaj --------------\r<br>gönderen: ghurjhan\r<br>kime: foolia\r<br>tarih: 9/10/2009 23:25\r<br>konu: 506 nolu entry\r<br>aşkım.\r<br>msn açılmıyor bi türlü. hatayı bulup gelicem :s\r<br>'),
(0, '', 'ghurjhan', 137, 2147483647, 9, 10, 2009, '23:28', 'opmiyim terliyim', 'asdfghjklş taamdır. kafam çok iyi gürcaaaaan ha bi de ne biçim ağzın var senin de bi türlü bitmedi zımbırtıları !'),
(0, '562 nolu entry', 'ghurjhan', 140, 2147483647, 10, 10, 2009, '00:18', 'yumuklu sucurta', 'seni kesin sikerler.'),
(0, '631 nolu entry', 'ghurjhan', 142, 2147483647, 10, 10, 2009, '14:01', 'yumuklu sucurta', 'hizli calisiyor olm sozluk.\r<br>boklamasin sonra bu hizi?\r<br>\r<br>-------------- orijinal mesaj --------------\r<br>gönderen: ghurjhan\r<br>kime: yumuklu sucurta\r<br>tarih: 10/10/2009 13:36\r<br>konu: 631 nolu entry\r<br>abi sorunu bulduk sonunda. server loadlarından kaynaklanıyormuş. \r<br>madem öyle diyip hemen yeni bir hosting firmasıyla görüştüm. şimdi geçişi başlatıyorum. 24 saat sonra sorun kalmayacaktır.\r<br>'),
(0, '326 nolu entry', 'stormex', 144, 2147483647, 10, 10, 2009, '18:12', 'yazamaz', 'alskjdaskdjasşlkdas\r<br>\r<br>-------------- orijinal mesaj --------------\r<br>gönderen: stormex\r<br>kime: yazamaz\r<br>tarih: 8/10/2009 22:32\r<br>konu: 326 nolu entry\r<br>cruel ben. : )\r<br>-------------- orijinal mesaj --------------\r<br>gönderen: yazamaz\r<br>kime: stormex\r<br>tarih: 8/10/2009 20:45\r<br>konu: 326 nolu entry\r<br>eyvallah ;)\r<br>\r<br>'),
(0, '326 nolu entry', 'yazamaz', 145, 2147483647, 10, 10, 2009, '18:26', 'stormex', 'gasfdgasfdgad\r<br>-------------- orijinal mesaj --------------\r<br>gönderen: yazamaz\r<br>kime: stormex\r<br>tarih: 10/10/2009 18:12\r<br>konu: 326 nolu entry\r<br>alskjdaskdjasşlkdas\r<br>\r<br>-------------- orijinal mesaj --------------\r<br>gönderen: stormex\r<br>kime: yazamaz\r<br>tarih: 8/10/2009 22:32\r<br>konu: 326 nolu entry\r<br>cruel ben. : )\r<br>-------------- orijinal mesaj --------------\r<br>gönderen: yazamaz\r<br>kime: stormex\r<br>tarih: 8/10/2009 20:45\r<br>konu: 326 nolu entry\r<br>eyvallah ;)\r<br>\r<br>\r<br>'),
(0, 'sorun', 'ghurjhan', 146, 2147483647, 11, 10, 2009, '01:00', 'stormex', 'oylama butonlarında sorun var sanırsam.'),
(0, 'sorun', 'ghurjhan', 148, 2147483647, 11, 10, 2009, '12:48', 'stormex', 'tıkladığımda 20-30 tane oy penceresi birden açılıyor.\r<br>-------------- orijinal mesaj --------------\r<br>gönderen: ghurjhan\r<br>kime: stormex\r<br>tarih: 11/10/2009 01:08\r<br>konu: sorun\r<br>ne gibi bir sorun tam olarak iletirmisin.\r<br>az önce sana $ukela verdim ve bir sorun göremedim.\r<br>-------------- orijinal mesaj --------------\r<br>gönderen: stormex\r<br>kime: ghurjhan\r<br>tarih: 11/10/2009 01:00\r<br>konu: sorun\r<br>oylama butonlarında sorun var sanırsam.\r<br>\r<br>'),
(0, 'falan', 'dresvarpr', 152, 2147483647, 12, 10, 2009, '08:06', 'oynama hanim sikerim', 'baslık: la liga\r<br>\r<br>aslında o "gölgede" olsa. hayaller gerçek olsa.\r<br>\r<br>ps: evet hala dahi anlamındaki de ye takılan denyolar var :p'),
(0, '..', 'angelus', 154, 2147483647, 12, 10, 2009, '21:47', 'penishasan', 'pardon bişi sorucam gereksiz ama merak ettim kontrol merkezinde senn ismin nickin yanında "sus yoksa altına işerim" yazıyor onu nasıl yazıyorsun yoksa sadece yöneticiler mi yazıyor.'),
(0, '', 'ghurjhan', 156, 2147483647, 12, 10, 2009, '23:15', 'aqril', 'amk lan :d'),
(0, '', 'ghurjhan', 158, 2147483647, 12, 10, 2009, '23:18', 'aqril', '\r<br>yatıyom sonra bakcam bu sözlüğe ..');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `haberler`
--

CREATE TABLE IF NOT EXISTS `haberler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `konu` varchar(255) NOT NULL DEFAULT '',
  `aciklama` text NOT NULL,
  `tarih` varchar(255) NOT NULL DEFAULT '',
  `gun` int(5) NOT NULL DEFAULT '0',
  `ay` int(5) NOT NULL DEFAULT '0',
  `yil` int(5) NOT NULL DEFAULT '0',
  `saat` varchar(255) NOT NULL DEFAULT '',
  `yazar` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `konu` (`konu`),
  KEY `tarih` (`tarih`),
  KEY `gun` (`gun`),
  KEY `ay` (`ay`),
  KEY `yil` (`yil`),
  KEY `saat` (`saat`),
  KEY `yazar` (`yazar`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin5 AUTO_INCREMENT=19 ;

--
-- Tablo döküm verisi `haberler`
--

INSERT INTO `haberler` (`id`, `konu`, `aciklama`, `tarih`, `gun`, `ay`, `yil`, `saat`, `yazar`) VALUES
(18, 'kutsal ankaç', 'was here', '201506211059', 21, 6, 2015, '10:59', 'renvacy');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `history`
--

CREATE TABLE IF NOT EXISTS `history` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `olay` text NOT NULL,
  `mesaj` text NOT NULL,
  `moderat` text NOT NULL,
  `tarih` text NOT NULL,
  `gun` text NOT NULL,
  `ay` text NOT NULL,
  `yil` text NOT NULL,
  `saat` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin5 AUTO_INCREMENT=53 ;

--
-- Tablo döküm verisi `history`
--

INSERT INTO `history` (`id`, `olay`, `mesaj`, `moderat`, `tarih`, `gun`, `ay`, `yil`, `saat`) VALUES
(1, 'profil inceleme', 'renvacy accountu incelendi', 'renvacy', '14/04/2015', '14', '04', '2015', '22:48'),
(2, 'guncelleme', 'istatistikler güncellendi', 'gri', '15/04/2015', '15', '04', '2015', '00:30'),
(3, 'profil inceleme', 'tek yol devrim accountu incelendi', 'gri', '15/04/2015', '15', '04', '2015', '00:31'),
(4, 'guncelleme', 'istatistikler güncellendi', 'gri', '15/04/2015', '15', '04', '2015', '00:32'),
(5, 'profil inceleme', 'gri accountu incelendi', 'gri', '15/04/2015', '15', '04', '2015', '00:34'),
(6, 'başlık sil', 'şu an sözlükte kendi kendime konuşuyor olma sorunsalım adlı başlık uçuruldu', 'gri', '15/04/2015', '15', '04', '2015', '00:36'),
(7, 'guncelleme', 'istatistikler güncellendi', 'gri', '15/04/2015', '15', '04', '2015', '08:06'),
(8, 'guncelleme', 'istatistikler güncellendi', 'gri', '15/04/2015', '15', '04', '2015', '08:18'),
(9, 'guncelleme', 'istatistikler güncellendi', 'renvacy', '15/04/2015', '15', '04', '2015', '08:48'),
(10, 'profil inceleme', 'dine xude accountu incelendi', 'gri', '15/04/2015', '15', '04', '2015', '09:38'),
(11, 'guncelleme', 'istatistikler güncellendi', 'gri', '15/04/2015', '15', '04', '2015', '18:42'),
(12, 'guncelleme', 'istatistikler güncellendi', 'gri', '15/04/2015', '15', '04', '2015', '18:42'),
(13, 'başlık sil', 'rose adlı yazarı götten siktim o esnada kutluhan tekerlekli sandalyesinde adlı başlık uçuruldu', 'gri', '15/04/2015', '15', '04', '2015', '19:16'),
(14, 'profil inceleme', 'am fakiri accountu incelendi', 'gri', '15/04/2015', '15', '04', '2015', '19:18'),
(15, 'profil inceleme', 'dine xude accountu incelendi', 'gri', '15/04/2015', '15', '04', '2015', '19:19'),
(16, 'guncelleme', 'istatistikler güncellendi', 'gri', '15/04/2015', '15', '04', '2015', '19:20'),
(17, 'profil inceleme', 'am fakiri accountu incelendi', 'gri', '15/04/2015', '15', '04', '2015', '19:31'),
(18, 'profil inceleme', 'gri kurt accountu incelendi', 'gri', '15/04/2015', '15', '04', '2015', '19:32'),
(19, 'profil inceleme', 'renvacy accountu incelendi', 'renvacy', '15/04/2015', '15', '04', '2015', '19:40'),
(20, 'profil inceleme', 'gri kurt accountu incelendi', 'gri', '15/04/2015', '15', '04', '2015', '19:46'),
(21, 'entry sil', '#2116 nolu entry silindi', 'gri kurt', '201504151710', '15', '04', '2015', '20:10'),
(22, 'profil inceleme', 'supervisor accountu incelendi', 'gri', '15/04/2015', '15', '04', '2015', '20:25'),
(23, 'profil inceleme', 'am fakiri accountu incelendi', 'gri', '15/04/2015', '15', '04', '2015', '21:27'),
(24, 'profil inceleme', 'kederlininja accountu incelendi', 'gri', '15/04/2015', '15', '04', '2015', '21:32'),
(25, 'profil inceleme', 'kederlininja accountu incelendi', 'gri', '15/04/2015', '15', '04', '2015', '21:36'),
(26, 'guncelleme', 'istatistikler güncellendi', 'gri', '16/04/2015', '16', '04', '2015', '03:57'),
(27, 'profil inceleme', 'gri kurt accountu incelendi', 'gri kurt', '16/04/2015', '16', '04', '2015', '03:59'),
(28, 'entry sil', '#3548 nolu entry silindi', 'gri kurt', '201504160121', '16', '04', '2015', '04:21'),
(29, 'başlık düzenle', 'milletce alkisliyoruz konusu düzenlendi.', 'gri kurt', '16/04/2015', '16', '04', '2015', '15:05'),
(30, 'başlık sil', 'dıyarbakır karpuzu adlı başlık uçuruldu', 'gri kurt', '16/04/2015', '16', '04', '2015', '15:31'),
(31, 'profil inceleme', 'sutlukahve accountu incelendi', 'gri', '16/04/2015', '16', '04', '2015', '15:32'),
(32, 'başlık düzenle', 'modlar konusu düzenlendi.', 'gri kurt', '16/04/2015', '16', '04', '2015', '15:54'),
(33, 'başlık düzenle', 'ibneler konusu düzenlendi.', 'gri kurt', '16/04/2015', '16', '04', '2015', '15:55'),
(34, 'başlık düzenle', 'lan oğlum özgürce esrar içebilecez konusu düzenlendi.', 'kederlininja', '16/04/2015', '16', '04', '2015', '19:00'),
(35, 'profil inceleme', 'gamling accountu incelendi', 'gri', '16/04/2015', '16', '04', '2015', '21:09'),
(36, 'profil inceleme', 'gamling accountu incelendi', 'gri', '16/04/2015', '16', '04', '2015', '21:46'),
(37, 'profil inceleme', 'yuce amon accountu incelendi', 'kederlininja', '16/04/2015', '16', '04', '2015', '23:12'),
(38, 'başlık düzenle', 'bu kadınla evlenene adamın da amına koyayım konusu düzenlendi.', 'gri kurt', '17/04/2015', '17', '04', '2015', '00:46'),
(39, 'profil inceleme', 'kederlininja accountu incelendi', 'kederlininja', '17/04/2015', '17', '04', '2015', '03:55'),
(40, 'profil inceleme', 'kederlininja accountu incelendi', 'gri kurt', '17/04/2015', '17', '04', '2015', '04:01'),
(41, 'başlık düzenle', 'kederlininja olarak modluğu bırakıyorum konusu düzenlendi.', 'gri kurt', '17/04/2015', '17', '04', '2015', '04:03'),
(42, 'başlık düzenle', 'yüksek ihtimal beni bir daha görmeyeceksiniz konusu düzenlendi.', 'gri kurt', '17/04/2015', '17', '04', '2015', '04:16'),
(43, 'başlık düzenle', 'yüksek ihtimal oruspuluğu bırakacağım konusu düzenlendi.', 'gri kurt', '17/04/2015', '17', '04', '2015', '04:18'),
(44, 'başlık düzenle', '5 kişi konusu düzenlendi.', 'gri kurt', '17/04/2015', '17', '04', '2015', '04:26'),
(45, 'başlık düzenle', 'elif nerde beyler konusu düzenlendi.', 'kederlininja', '17/04/2015', '17', '04', '2015', '17:47'),
(46, 'guncelleme', 'istatistikler güncellendi', 'gri', '18/04/2015', '18', '04', '2015', '00:30'),
(47, 'guncelleme', 'istatistikler güncellendi', 'gri', '18/04/2015', '18', '04', '2015', '02:45'),
(48, 'entry duzenle', '#6402 nolu entry duzenlendi', 'gri', '18/04/2015', '18', '04', '2015', '02:46'),
(49, 'profil inceleme', 'yuce amon accountu incelendi', 'gri', '18/04/2015', '18', '04', '2015', '02:47'),
(50, 'başlık düzenle', 'miraba lavaş qiri kıvamında ki tatlişkolar konusu düzenlendi.', 'kederlininja', '18/04/2015', '18', '04', '2015', '12:55'),
(51, 'başlık düzenle', 'güne sikrillex ve hardwell dinlemeden başlayamıyorum konusu düzenlendi.', 'gri kurt', '18/04/2015', '18', '04', '2015', '15:41'),
(52, 'başlık düzenle', 'harwell konusu düzenlendi.', 'gri kurt', '18/04/2015', '18', '04', '2015', '16:44');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ilansayfasi`
--

CREATE TABLE IF NOT EXISTS `ilansayfasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ilanbaslik` text NOT NULL,
  `ilanbilgi` text NOT NULL,
  `ip` varchar(255) NOT NULL DEFAULT '',
  `tarih` varchar(255) NOT NULL DEFAULT '',
  `gun` int(11) NOT NULL DEFAULT '0',
  `ay` int(11) NOT NULL DEFAULT '0',
  `yil` int(11) NOT NULL DEFAULT '0',
  `saat` varchar(255) NOT NULL DEFAULT '',
  `nick` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ip` (`ip`),
  KEY `tarih` (`tarih`),
  KEY `gun` (`gun`),
  KEY `ay` (`ay`),
  KEY `yil` (`yil`),
  KEY `saat` (`saat`)
) ENGINE=MyISAM DEFAULT CHARSET=latin5 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ipban`
--

CREATE TABLE IF NOT EXISTS `ipban` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `id_2` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin5 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `konucuklar`
--

CREATE TABLE IF NOT EXISTS `konucuklar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sira` int(11) NOT NULL DEFAULT '0',
  `baslik` varchar(255) NOT NULL DEFAULT '',
  `ip` varchar(255) NOT NULL DEFAULT '',
  `tarih` varchar(255) NOT NULL DEFAULT '',
  `gun` int(11) NOT NULL DEFAULT '0',
  `ay` int(11) NOT NULL DEFAULT '0',
  `yil` int(11) NOT NULL DEFAULT '0',
  `saat` varchar(255) NOT NULL DEFAULT '',
  `hit` int(11) NOT NULL DEFAULT '0',
  `statu` varchar(255) NOT NULL DEFAULT '',
  `tasi` varchar(255) NOT NULL DEFAULT '',
  `silmod` varchar(255) NOT NULL DEFAULT '',
  `siltarih` varchar(255) NOT NULL DEFAULT '',
  `silsebep` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `sira` (`sira`),
  KEY `baslik` (`baslik`),
  KEY `ip` (`ip`),
  KEY `tarih` (`tarih`),
  KEY `gun` (`gun`),
  KEY `ay` (`ay`),
  KEY `yil` (`yil`),
  KEY `saat` (`saat`),
  KEY `hit` (`hit`),
  KEY `statu` (`statu`),
  KEY `tasi` (`tasi`),
  KEY `silmod` (`silmod`),
  KEY `siltarih` (`siltarih`),
  KEY `silsebep` (`silsebep`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin5 AUTO_INCREMENT=2 ;

--
-- Tablo döküm verisi `konucuklar`
--

INSERT INTO `konucuklar` (`id`, `sira`, `baslik`, `ip`, `tarih`, `gun`, `ay`, `yil`, `saat`, `hit`, `statu`, `tasi`, `silmod`, `siltarih`, `silsebep`) VALUES
(1, 0, 'renvacy', '88.226.94.122', '201504181832', 18, 4, 2015, '18:18', 107, '', '', '', '', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `mesajciklar`
--

CREATE TABLE IF NOT EXISTS `mesajciklar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sira` int(11) NOT NULL DEFAULT '0',
  `mesaj` text NOT NULL,
  `yazar` varchar(255) NOT NULL DEFAULT '',
  `ip` varchar(255) NOT NULL DEFAULT '',
  `tarih` varchar(255) NOT NULL DEFAULT '',
  `gun` int(11) NOT NULL DEFAULT '0',
  `ay` int(11) NOT NULL DEFAULT '0',
  `yil` int(11) NOT NULL DEFAULT '0',
  `saat` varchar(255) NOT NULL DEFAULT '',
  `oy` varchar(255) NOT NULL DEFAULT '',
  `update2` varchar(255) NOT NULL DEFAULT '',
  `updater` varchar(255) NOT NULL DEFAULT '',
  `updatesebep` varchar(255) NOT NULL DEFAULT '',
  `statu` varchar(255) NOT NULL DEFAULT '',
  `silen` varchar(255) NOT NULL DEFAULT '',
  `silsebep` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `sira` (`sira`),
  KEY `yazar` (`yazar`),
  KEY `ip` (`ip`),
  KEY `tarih` (`tarih`),
  KEY `gun` (`gun`),
  KEY `ay` (`ay`),
  KEY `yil` (`yil`),
  KEY `saat` (`saat`),
  KEY `oy` (`oy`),
  KEY `update2` (`update2`),
  KEY `statu` (`statu`),
  KEY `silsebep` (`silsebep`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin5 AUTO_INCREMENT=2 ;

--
-- Tablo döküm verisi `mesajciklar`
--

INSERT INTO `mesajciklar` (`id`, `sira`, `mesaj`, `yazar`, `ip`, `tarih`, `gun`, `ay`, `yil`, `saat`, `oy`, `update2`, `updater`, `updatesebep`, `statu`, `silen`, `silsebep`) VALUES
(1, 1, 'was here', 'renvacy', '88.226.94.122', '201504181832', 18, 4, 2015, '18:32', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `online`
--

CREATE TABLE IF NOT EXISTS `online` (
  `nick` varchar(255) NOT NULL DEFAULT '',
  `islem_zamani` varchar(255) NOT NULL DEFAULT '',
  `ip` varchar(255) NOT NULL DEFAULT '',
  `ondurum` varchar(255) NOT NULL DEFAULT '',
  KEY `nick` (`nick`),
  KEY `islem_zamani` (`islem_zamani`),
  KEY `ip` (`ip`),
  KEY `ondurum` (`ondurum`)
) ENGINE=MyISAM DEFAULT CHARSET=latin5;

--
-- Tablo döküm verisi `online`
--

INSERT INTO `online` (`nick`, `islem_zamani`, `ip`, `ondurum`) VALUES
('renvacy', '1434894029', '88.227.210.109', 'on');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `oylar`
--

CREATE TABLE IF NOT EXISTS `oylar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entry_id` int(11) NOT NULL DEFAULT '0',
  `nick` varchar(255) NOT NULL DEFAULT '',
  `entry_sahibi` varchar(255) NOT NULL DEFAULT '',
  `oy` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `entry_id` (`entry_id`),
  KEY `nick` (`nick`),
  KEY `entry_sahibi` (`entry_sahibi`),
  KEY `oy` (`oy`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin5 AUTO_INCREMENT=1020 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `privmsg`
--

CREATE TABLE IF NOT EXISTS `privmsg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `konu` varchar(255) NOT NULL DEFAULT '',
  `mesaj` text NOT NULL,
  `kime` varchar(255) NOT NULL DEFAULT '',
  `gonderen` varchar(255) NOT NULL DEFAULT '',
  `tarih` varchar(255) NOT NULL DEFAULT '',
  `okundu` varchar(255) NOT NULL DEFAULT '',
  `gun` int(11) NOT NULL DEFAULT '0',
  `ay` int(11) NOT NULL DEFAULT '0',
  `yil` int(11) NOT NULL DEFAULT '0',
  `saat` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `konu` (`konu`),
  KEY `kime` (`kime`),
  KEY `gonderen` (`gonderen`),
  KEY `tarih` (`tarih`),
  KEY `okundu` (`okundu`),
  KEY `gun` (`gun`),
  KEY `ay` (`ay`),
  KEY `yil` (`yil`),
  KEY `saat` (`saat`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin5 AUTO_INCREMENT=1172 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `rehber`
--

CREATE TABLE IF NOT EXISTS `rehber` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kim` varchar(250) NOT NULL DEFAULT '',
  `kimin` varchar(250) NOT NULL DEFAULT '',
  `num` char(1) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin5 AUTO_INCREMENT=2 ;

--
-- Tablo döküm verisi `rehber`
--

INSERT INTO `rehber` (`id`, `kim`, `kimin`, `num`) VALUES
(1, 'renvacy', 'renvacy', '0');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sikayet`
--

CREATE TABLE IF NOT EXISTS `sikayet` (
  `e` text NOT NULL,
  `k` text NOT NULL,
  `m` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin5;

--
-- Tablo döküm verisi `sikayet`
--

INSERT INTO `sikayet` (`e`, `k`, `m`) VALUES
('orhangaziweb@gmail.com', 'sansar', '#6402 nolu başlığı siliniz lütfen. ifşa var.');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `soru`
--

CREATE TABLE IF NOT EXISTS `soru` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `soru` text NOT NULL,
  `cevap` text NOT NULL,
  `gun` int(11) NOT NULL DEFAULT '0',
  `ay` int(11) NOT NULL DEFAULT '0',
  `yil` int(11) NOT NULL DEFAULT '0',
  `saat` text NOT NULL,
  `tarih` int(11) NOT NULL DEFAULT '0',
  `soran` text NOT NULL,
  `durum` enum('h','e') NOT NULL DEFAULT 'h',
  PRIMARY KEY (`id`),
  KEY `gun` (`gun`),
  KEY `ay` (`ay`),
  KEY `yil` (`yil`),
  KEY `tarih` (`tarih`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin5 AUTO_INCREMENT=3 ;

--
-- Tablo döküm verisi `soru`
--

INSERT INTO `soru` (`id`, `soru`, `cevap`, `gun`, `ay`, `yil`, `saat`, `tarih`, `soran`, `durum`) VALUES
(1, 'noliy lan?', '', 17, 4, 2015, '04:12', 17042015, 'sansar', 'h'),
(2, 'sdasdasd', '', 17, 4, 2015, '04:12', 17042015, 'sansar', 'h');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sorular`
--

CREATE TABLE IF NOT EXISTS `sorular` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `baslik` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `id_2` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin5 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `stat`
--

CREATE TABLE IF NOT EXISTS `stat` (
  `baslik` text NOT NULL,
  `entry` text NOT NULL,
  `silbaslik` text NOT NULL,
  `silentry` text NOT NULL,
  `hit` text NOT NULL,
  `tekil` text NOT NULL,
  `yazar` text NOT NULL,
  `okur` text NOT NULL,
  `moderat` text NOT NULL,
  `moderatust` text NOT NULL,
  `op` text NOT NULL,
  `admin` text NOT NULL,
  `ortbaslik` text NOT NULL,
  `ortentry` text NOT NULL,
  `tarih` text NOT NULL,
  `enhitbaslik` text NOT NULL,
  `gun` text NOT NULL,
  `pilot` text NOT NULL,
  `eniyientry1` text NOT NULL,
  `eniyientry2` text NOT NULL,
  `eniyientry3` text NOT NULL,
  `eniyientry4` text NOT NULL,
  `eniyientry5` text NOT NULL,
  `eniyientry6` text NOT NULL,
  `eniyientry7` text NOT NULL,
  `eniyientry8` text NOT NULL,
  `eniyientry9` text NOT NULL,
  `eniyientry10` text NOT NULL,
  `encokyazar1` text NOT NULL,
  `encokyazar2` text NOT NULL,
  `encokyazar3` text NOT NULL,
  `encokyazar4` text NOT NULL,
  `encokyazar5` text NOT NULL,
  `encokyazar6` text NOT NULL,
  `encokyazar7` text NOT NULL,
  `encokyazar8` text NOT NULL,
  `encokyazar9` text NOT NULL,
  `encokyazar10` text NOT NULL,
  `temadefault` text NOT NULL,
  `temamavi` text NOT NULL,
  `temaportakal` text NOT NULL,
  `temayesil` text NOT NULL,
  `temazeppelin` text NOT NULL,
  `temadiablo` text NOT NULL,
  `temaekolayzir` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin5;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `statmonth`
--

CREATE TABLE IF NOT EXISTS `statmonth` (
  `baslik` text NOT NULL,
  `entry` text NOT NULL,
  `silbaslik` text NOT NULL,
  `silentry` text NOT NULL,
  `hit` text NOT NULL,
  `tekil` text NOT NULL,
  `ortbaslik` text NOT NULL,
  `ortentry` text NOT NULL,
  `tarih` text NOT NULL,
  `enhitbaslik` text NOT NULL,
  `gun` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin5;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `temalar`
--

CREATE TABLE IF NOT EXISTS `temalar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tema` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `id_2` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin5 AUTO_INCREMENT=19 ;

--
-- Tablo döküm verisi `temalar`
--

INSERT INTO `temalar` (`id`, `tema`) VALUES
(1, 'sozluk'),
(2, 'absolute'),
(3, 'ankaragucu'),
(4, 'gece'),
(5, 'firat'),
(6, 'renvacy'),
(7, 'gotik'),
(8, 'ibneler'),
(9, 'kirmizisiyah'),
(10, 'kizilayran'),
(11, 'mavisayran'),
(12, 'rosemor'),
(13, 'sade'),
(14, 'ruxgspoqer'),
(15, 'sariferrari'),
(16, 'simsiyah'),
(17, 'toa'),
(18, 'kederlininja2');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ukde`
--

CREATE TABLE IF NOT EXISTS `ukde` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `baslik` varchar(255) NOT NULL DEFAULT '',
  `aciklama` varchar(255) NOT NULL DEFAULT '',
  `yazar` varchar(255) NOT NULL DEFAULT '',
  `tarih` varchar(255) NOT NULL DEFAULT '',
  `gun` varchar(255) NOT NULL DEFAULT '',
  `ay` varchar(255) NOT NULL DEFAULT '',
  `yil` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `baslik` (`baslik`),
  KEY `aciklama` (`aciklama`),
  KEY `yazar` (`yazar`),
  KEY `tarih` (`tarih`),
  KEY `gun` (`gun`),
  KEY `ay` (`ay`),
  KEY `yil` (`yil`)
) ENGINE=MyISAM DEFAULT CHARSET=latin5 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `isim` varchar(255) NOT NULL DEFAULT '',
  `nick` varchar(255) NOT NULL DEFAULT '',
  `sifre` varchar(255) NOT NULL DEFAULT '',
  `yetki` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `durum` varchar(255) NOT NULL DEFAULT '',
  `dt` varchar(255) NOT NULL DEFAULT '',
  `cinsiyet` varchar(255) NOT NULL DEFAULT '',
  `sehir` varchar(255) NOT NULL DEFAULT '',
  `regip` varchar(255) NOT NULL DEFAULT '',
  `regtarih` varchar(255) NOT NULL DEFAULT '',
  `online` varchar(255) NOT NULL DEFAULT '',
  `tema` varchar(255) NOT NULL DEFAULT '',
  `ileti` text,
  `olanbiten` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `isim` (`isim`),
  KEY `nick` (`nick`),
  KEY `sifre` (`sifre`),
  KEY `yetki` (`yetki`),
  KEY `email` (`email`),
  KEY `durum` (`durum`),
  KEY `tema` (`tema`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin5 AUTO_INCREMENT=71 ;

--
-- Tablo döküm verisi `user`
--

INSERT INTO `user` (`id`, `isim`, `nick`, `sifre`, `yetki`, `email`, `durum`, `dt`, `cinsiyet`, `sehir`, `regip`, `regtarih`, `online`, `tema`, `ileti`, `olanbiten`) VALUES
(1, 'halit', 'renvacy', '2467dcded8fb063c2baea811ddfd01de', 'admin', 'halitartuc@gmail.com', 'on', '1/1/1989', 'm', 'Ankara', '88.227.210.109', '2015/04/14 19:46', '', 'sozluk', 'validen', '0');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yorum`
--

CREATE TABLE IF NOT EXISTS `yorum` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kime` varchar(250) NOT NULL DEFAULT '',
  `kimden` varchar(250) NOT NULL DEFAULT '',
  `yorum` text NOT NULL,
  `num` varchar(250) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `kime` (`kime`),
  KEY `kimden` (`kimden`),
  KEY `num` (`num`)
) ENGINE=MyISAM DEFAULT CHARSET=latin5 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `zirvecom`
--

CREATE TABLE IF NOT EXISTS `zirvecom` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `yazan` varchar(255) NOT NULL DEFAULT '',
  `gun` int(11) NOT NULL DEFAULT '0',
  `ay` int(11) NOT NULL DEFAULT '0',
  `yil` int(11) NOT NULL DEFAULT '0',
  `saat` int(11) NOT NULL DEFAULT '0',
  `tarih` text NOT NULL,
  `comment` text NOT NULL,
  `list` varchar(255) NOT NULL DEFAULT '',
  `falanfilan` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `yazan` (`yazan`),
  KEY `gun` (`gun`),
  KEY `ay` (`ay`),
  KEY `yil` (`yil`),
  KEY `saat` (`saat`),
  KEY `list` (`list`)
) ENGINE=MyISAM DEFAULT CHARSET=latin5 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `zirvemax`
--

CREATE TABLE IF NOT EXISTS `zirvemax` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `yer` varchar(255) NOT NULL DEFAULT '',
  `tarih` text NOT NULL,
  `detay` text NOT NULL,
  `sehir` varchar(255) NOT NULL DEFAULT '',
  `organizator` varchar(255) NOT NULL DEFAULT '',
  `katilanlar` varchar(255) NOT NULL DEFAULT '',
  `gun` int(11) NOT NULL DEFAULT '0',
  `ay` int(11) NOT NULL DEFAULT '0',
  `yil` int(11) NOT NULL DEFAULT '0',
  `saat` int(11) NOT NULL DEFAULT '0',
  `zirve` text NOT NULL,
  `sira` int(11) NOT NULL DEFAULT '0',
  `tavsiye` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `yer` (`yer`),
  KEY `sehir` (`sehir`),
  KEY `organizator` (`organizator`),
  KEY `katilanlar` (`katilanlar`),
  KEY `gun` (`gun`),
  KEY `ay` (`ay`),
  KEY `yil` (`yil`),
  KEY `saat` (`saat`),
  KEY `sira` (`sira`)
) ENGINE=MyISAM DEFAULT CHARSET=latin5 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `zirveonline`
--

CREATE TABLE IF NOT EXISTS `zirveonline` (
  `nick` text NOT NULL,
  `islem_zamani` varchar(255) NOT NULL DEFAULT '',
  `ip` varchar(255) NOT NULL DEFAULT '',
  `ondurum` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin5;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `zirveuser`
--

CREATE TABLE IF NOT EXISTS `zirveuser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `zuser` varchar(255) NOT NULL DEFAULT '',
  `muzik` varchar(255) NOT NULL DEFAULT '',
  `kitap` varchar(255) NOT NULL DEFAULT '',
  `film` varchar(255) NOT NULL DEFAULT '',
  `mekan` varchar(255) NOT NULL DEFAULT '',
  `tanim` text NOT NULL,
  `ruh` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `zuser` (`zuser`),
  KEY `muzik` (`muzik`),
  KEY `kitap` (`kitap`),
  KEY `film` (`film`),
  KEY `mekan` (`mekan`),
  KEY `ruh` (`ruh`)
) ENGINE=MyISAM DEFAULT CHARSET=latin5 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
