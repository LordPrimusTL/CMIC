-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2017 at 06:36 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gac_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `appendix_choruses`
--

CREATE TABLE `appendix_choruses` (
  `id` int(10) UNSIGNED NOT NULL,
  `hymn_id` int(11) NOT NULL,
  `english` text COLLATE utf8_unicode_ci NOT NULL,
  `yoruba` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `appendix_hymns`
--

CREATE TABLE `appendix_hymns` (
  `id` int(10) UNSIGNED NOT NULL,
  `english` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `yoruba` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `has_chorus` tinyint(1) DEFAULT NULL,
  `bible_text` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `appendix_hymns`
--

INSERT INTO `appendix_hymns` (`id`, `english`, `yoruba`, `has_chorus`, `bible_text`, `created_at`, `updated_at`) VALUES
(1, 'Hallowed Day and Holy', 'Ose Ose Rere', 0, 'Replace soon', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `appendix_verses`
--

CREATE TABLE `appendix_verses` (
  `id` int(10) UNSIGNED NOT NULL,
  `hymn_id` int(11) NOT NULL,
  `verse_id` int(11) NOT NULL,
  `english` text COLLATE utf8_unicode_ci NOT NULL,
  `yoruba` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `appendix_verses`
--

INSERT INTO `appendix_verses` (`id`, `hymn_id`, `verse_id`, `english`, `yoruba`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Hallowed Day and Holy\r\nThou holy day of rest\r\nWe ought to give one full day\r\nTo God, the good and kind\r\nOther days bring the tear drops\r\nThou wipes the tears away\r\nThou art a day of gladness\r\nI love thy happy morn.', 'Ose, ose rere,\r\nIwo ojo \'simi;\r\nO ye k\' a fi ojo kan,\r\nFun Olorun rere;\r\nB\' ojo mi tile m\' ekun wa,\r\nIwo n\' oju wa nu;\r\nIwo ti s\' ojo ayo,\r\nEmi fe dide re.', NULL, NULL),
(2, 1, 2, 'Hallowed Day and Holy\r\nThere is no work today\r\nWe will suspend our labour\r\nUntil tomorrow\'s day\r\nHow beautiful and how bright\r\nThou blessed day of rest\r\nOther days speak of troubles\r\nBut thou give hope of rest.', 'Ose, ose rere,\r\nA k\'yo sise loni;\r\nA o f\' ise wa gbogbo\r\nFun aisimi ola,\r\nDidan l\' oju re ma dan,\r\n\'Wo arewa ojo;\r\nOjo mi nso ti lala,\r\nIwo nso t\' isimi.', NULL, NULL),
(3, 1, 3, 'Hallowed Day and Holy\r\nHear how the church bell says\r\nGive one day to thy Maker\r\nWho gave to you six days.\r\nWe shall take leave of labour\r\nTo go and worship there\r\nBoth we and all our dear friends\r\nOn to the house of prayer.', 'Ose, ose rere,\r\nAgo tile nwipe,\r\nF\' Eleda re l\' ojo kan,\r\nT\' O fun O ni mefa;\r\nA o f\' ise wa sile,\r\nLati lo sin nibe,\r\nAwa ati ore wa,\r\nAo los\' ile adua.', NULL, NULL),
(4, 1, 4, 'Hallowed Day and Holy\r\nThy hour delight me so\r\nA taste of heaven you give us\r\nLike that eternal rest\r\nLord, let me be partaker\r\nOf rest beyond the grave\r\nTo sing and serve thee ever\r\nWith all thy saints above.', 'Ose, ose rere,\r\nWakati re wu mi;\r\nOjo orun n\' iwo se,\r\n\'Wo apere orun,\r\nOluwa je ki njogun\r\n\'Simi lehin iku,\r\nKi nle ma sin O titi,\r\nPelu enia Re.', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `main_choruses`
--

CREATE TABLE `main_choruses` (
  `id` int(10) UNSIGNED NOT NULL,
  `hymn_id` int(11) NOT NULL,
  `english` text COLLATE utf8_unicode_ci NOT NULL,
  `yoruba` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `main_hymns`
--

CREATE TABLE `main_hymns` (
  `id` int(10) UNSIGNED NOT NULL,
  `english` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `yoruba` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `has_chorus` tinyint(1) DEFAULT NULL,
  `bible_text` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `main_hymns`
--

INSERT INTO `main_hymns` (`id`, `english`, `yoruba`, `has_chorus`, `bible_text`, `created_at`, `updated_at`) VALUES
(1, 'Awake, my soul, and with the sun', 'Ji okan mi ba oorun ji', NULL, NULL, NULL, NULL),
(2, 'Forth in Thy Name, O Lord, I go', 'OLUWA mi, mo njade lo', NULL, NULL, NULL, NULL),
(3, 'Come to me, Lord, when first I wake', 'Wa s?odo mi, Oluwa mi', NULL, NULL, NULL, NULL),
(4, '', 'Wa s? adura ooro', NULL, NULL, NULL, NULL),
(5, 'The morning bright, With rosy light', 'Imole oroo didun yi', NULL, NULL, NULL, NULL),
(6, 'Holy Father, hear me;', 'Baba mi gbo t? emi', NULL, NULL, NULL, NULL),
(7, 'Through all the dangers of the night', 'Ninu gbogbo ewu oru', NULL, NULL, NULL, NULL),
(8, 'Christ, whose glory fills the skies', 'Kristi, Ologo, Olola', NULL, NULL, NULL, NULL),
(9, 'Jesus, Sun of righteousness,', 'JESU Oorun ododo,', NULL, NULL, NULL, NULL),
(10, 'Glory to thee, my God, this night', 'Ogo f?Olorun l?ale yi', NULL, NULL, NULL, NULL),
(11, '', 'Ife Re da wa si l?oni', NULL, NULL, NULL, NULL),
(12, '', 'Ero at? alejo l?aiye', NULL, NULL, NULL, NULL),
(13, '', 'Iwo Imole okan mi,', NULL, NULL, NULL, NULL),
(14, '', 'L ?oju ale, ?gbat ?orun wo,', NULL, NULL, NULL, NULL),
(15, '', '?Wo Imole larin ookun aiye', NULL, NULL, NULL, NULL),
(16, '', 'Jesu, Bukun wa ka to lo', NULL, NULL, NULL, NULL),
(17, '', 'K?a to sun Olugbala wa', NULL, NULL, NULL, NULL),
(18, '', 'Oluwa ojo yi to dopin', NULL, NULL, NULL, NULL),
(19, '', 'Baba a tun pade l? ooko Jesu', NULL, NULL, NULL, NULL),
(20, '', 'A gboju s\'oke si O', NULL, NULL, NULL, NULL),
(21, '', 'Ojo oni lo tan', NULL, NULL, NULL, NULL),
(22, '', 'Ojo oni koja lo', NULL, NULL, NULL, NULL),
(23, '', 'Ooro didan ti re koja', NULL, NULL, NULL, NULL),
(24, '', 'Ki nto sun, fun oore t\'oni', NULL, NULL, NULL, NULL),
(25, 'The God who led His people thro\' the parted sea', 'Olowa t\'o mu isreal la okun ja', NULL, NULL, NULL, NULL),
(26, 'We are never, never weary of the grand old song;', 'Ko su wa lati ma ko orin ti igbani', NULL, NULL, NULL, NULL),
(27, 'Praise Him! Praise Him! Jesus, our blessed Redeemer!', 'Fi iyin fun! Jesu, Olurapada wa,', NULL, NULL, NULL, NULL),
(28, '', 'Em\'o yin Oluwa fun ife re', NULL, NULL, NULL, NULL),
(29, 'Praise the king of Glory, He is God alone', 'Eyin Oba ogo, On ni Olorun:', NULL, NULL, NULL, NULL),
(30, '', 'B? oruko Jesu ti dun to', NULL, NULL, NULL, NULL),
(31, '', 'Kristi ni ipin mi titi', NULL, NULL, NULL, NULL),
(32, 'The God of Abra\'am praise,', 'Yin Olorun Abraham', NULL, NULL, NULL, NULL),
(33, 'Let us, with a gladsome mind', 'E je k? a f? inu didun', NULL, NULL, NULL, NULL),
(34, '', 'Niwaju ite Jehofa', NULL, NULL, NULL, NULL),
(35, '', 'N\'nu gbogbo ayida aiye', NULL, NULL, NULL, NULL),
(36, '', 'Fun anu t\'o po bi iyanrin', NULL, NULL, NULL, NULL),
(37, '', 'Emi ba n\'egberun ahon', NULL, NULL, NULL, NULL),
(38, '', 'E gbe ohun ayo at\'iyin ga, Alle/luya!', NULL, NULL, NULL, NULL),
(39, 'O worship the King all glorious above', 'E wole f?Oba, Ologo julo', NULL, NULL, NULL, NULL),
(40, 'All hail the power of Jesus\' name!', 'Gbogbo aiye, gbe Jesu ga', NULL, NULL, NULL, NULL),
(41, '', 'Alleluyah! Orin t\'odun', NULL, NULL, NULL, NULL),
(42, 'Praise, my soul, the King of heaven;', 'Okan mi yin Oba orun', NULL, NULL, NULL, NULL),
(43, 'To God be the glory, great things He hath done!', 'Ogo ni f? Oluwa, to se ohun nla;', NULL, NULL, NULL, NULL),
(44, 'O Lord of heaven and earth and sea', 'Oluwa orun on aiye', NULL, NULL, NULL, NULL),
(45, '', 'Ji, Okan mi, dide l\'ayo', NULL, NULL, NULL, NULL),
(46, 'Head of Thy Church triumphant', 'Olori ijo t?orun', NULL, NULL, NULL, NULL),
(47, 'All people that on earth do dwell', 'Gbogbo eyin ti ngbe aiye', NULL, NULL, NULL, NULL),
(48, '', 'A f?ope f? Olorun', NULL, NULL, NULL, NULL),
(49, '', 'Yin Olorun Oba wa', NULL, NULL, NULL, NULL),
(50, '', 'Iyin f\'eni Mimo julo', NULL, NULL, NULL, NULL),
(51, 'O Day of rest and gladness,', 'Ojo ?simi at? ayo', NULL, NULL, NULL, NULL),
(52, 'We all love to see Thee', 'A be, A fe ri O', NULL, NULL, NULL, NULL),
(53, 'O mighty Lord of Sabbath day,', 'Oluwa ojo isimi', NULL, NULL, NULL, NULL),
(54, 'Jesus we assembled', 'Jesu a fe pade', NULL, NULL, NULL, NULL),
(55, '', 'Eyi l\'ojo t\'Oluwa da', NULL, NULL, NULL, NULL),
(56, '', 'Ayo l?ojo ?simi fun mi', NULL, NULL, NULL, NULL),
(57, '', 'Gba jesu de lati f\'ere fun wa', NULL, NULL, NULL, NULL),
(58, '', 'Jesu mbo l\'ofurufu pel\'ayo', NULL, NULL, NULL, NULL),
(59, '', 'Ojo nla kan mbo wa', NULL, NULL, NULL, NULL),
(60, 'Hark the glad sound! The Savior comes,', 'Gbo \'gbe ayo! Oluwa de,', NULL, NULL, NULL, NULL),
(61, '', 'Iwo mbo wa, Oluwa mi', NULL, NULL, NULL, NULL),
(62, '', 'Ijo ti nduro pe', NULL, NULL, NULL, NULL),
(63, '', 'Oluwa agbara f\'ohun', NULL, NULL, NULL, NULL),
(64, 'Hark! ?tis the watchman?s cry', 'Gbo ohun alore', NULL, NULL, NULL, NULL),
(65, '', 'Oluwa mbo aiye o mi', NULL, NULL, NULL, NULL),
(66, '', 'Yo enyin onigbagbo', NULL, NULL, NULL, NULL),
(67, '', 'Wa Iwo Jesu t\'a nreti', NULL, NULL, NULL, NULL),
(68, '', 'Sunm\'odo wa, Emmanuel', NULL, NULL, NULL, NULL),
(69, '', 'Olorun kini mo ri yi!', NULL, NULL, NULL, NULL),
(70, '', 'Gbe ori nyin s\'oke, enyin', NULL, NULL, NULL, NULL),
(71, '', 'Oluwa y\'o ti pe to', NULL, NULL, NULL, NULL),
(72, '', 'Ji, wo Kristian, k\'o ki ooro ayo', NULL, NULL, NULL, NULL),
(73, '', 'Enyin Angel l\'orun ogo', NULL, NULL, NULL, NULL),
(74, '', 'Gbo eda orun nko \'rin', NULL, NULL, NULL, NULL),
(75, 'Joy to the world! the Lord is come!', 'Ayo b? aiye! Oluwa de;', NULL, NULL, NULL, NULL),
(76, '', 'Ayo kun okan wa l\'oni', NULL, NULL, NULL, NULL),
(77, 'Burst into joy, ye believers!', 'Onigbagbo e bu s?ayo!', NULL, NULL, NULL, NULL),
(78, 'Oh come, all ye faithful, joyful and triumphant!', 'Wa eyin olooto', NULL, NULL, NULL, NULL),
(79, 'Once in royal Davids city', 'Nigba kan ni Betlehemu', NULL, NULL, NULL, NULL),
(80, '', 'Ni \'dakeje, oru mimo', NULL, NULL, NULL, NULL),
(81, '', 'Jesu Oluwa mi ni Bethlehem\'', NULL, NULL, NULL, NULL),
(82, '', 'Lehin odun die', NULL, NULL, NULL, NULL),
(83, '', 'Igba mi mbe li owo re', NULL, NULL, NULL, NULL),
(84, '', 'Apata Aiyeraye', NULL, NULL, NULL, NULL),
(85, '', 'Olorun t\'odun t\'o koja', NULL, NULL, NULL, NULL),
(86, '', 'Ojo ati akoko nlo', NULL, NULL, NULL, NULL),
(87, '', 'bB\'oorun l\'aiduro ti nrin', NULL, NULL, NULL, NULL),
(88, '', 'Olorun betel, eniti', NULL, NULL, NULL, NULL),
(89, '', 'Alakoso ti orun', NULL, NULL, NULL, NULL),
(90, 'I am so glad that our Father in heav\'n', 'Mo yo, pupo pe Baba wa orun', NULL, NULL, NULL, NULL),
(91, '', 'Jesu Iwo l\'a gb\'ohun si', NULL, NULL, NULL, NULL),
(92, '', 'Duro, omo ogun', NULL, NULL, NULL, NULL),
(93, '', 'Elese, e yi pada', NULL, NULL, NULL, NULL),
(94, '', 'Ojo nla l\'ojo to mo yan', NULL, NULL, NULL, NULL),
(95, '', 'Ipe t\'o no bukun lat\'oke orun', NULL, NULL, NULL, NULL),
(96, '', 'We gba isimi re', NULL, NULL, NULL, NULL),
(97, '', 'Wa nigbati Kristi npe o', NULL, NULL, NULL, NULL),
(98, '', 'Aye si mbe!, Ile Odagutan', NULL, NULL, NULL, NULL),
(99, '', 'Loni ni Jesu pe!', NULL, NULL, NULL, NULL),
(100, '', 'Wa s? odo Mi, alaare', NULL, NULL, NULL, NULL),
(101, '', 'Yara, elese k? o gbon', NULL, NULL, NULL, NULL),
(102, '', 'Pada asako s? ile re', NULL, NULL, NULL, NULL),
(103, '', 'Iwo elese, Emi nfi anu pe', NULL, NULL, NULL, NULL),
(104, '', 'Elese, gba ?hinrere gbo!', NULL, NULL, NULL, NULL),
(105, '', 'B? Olorun oba orun, Ti ma nso? ro nigbani', NULL, NULL, NULL, NULL),
(106, '', 'Iye wa ni wiwo, Enit? a kan mo ?gi', NULL, NULL, NULL, NULL),
(107, '', 'Oluwa ran mi ni ?se Alleluya,', NULL, NULL, NULL, NULL),
(108, '', 'MO gb? ohun Jesu t? o wipe,', NULL, NULL, NULL, NULL),
(109, '', 'Mo mbo nib? agbelebu', NULL, NULL, NULL, NULL),
(110, '', 'Jesu, l? ojo anu yi', NULL, NULL, NULL, NULL),
(111, '', 'Okan mi sunmo ?te anu,', NULL, NULL, NULL, NULL),
(112, '', 'Elese:-mo nfe \'bukun', NULL, NULL, NULL, NULL),
(113, '', 'Jesu, agbara mi', NULL, NULL, NULL, NULL),
(114, '', 'Iwo low? Enit ire nsan', NULL, NULL, NULL, NULL),
(115, '', 'Jina s? ile orun.', NULL, NULL, NULL, NULL),
(116, '', 'Alaimo ni emi', NULL, NULL, NULL, NULL),
(117, '', 'Jesu, jo ranti mi', NULL, NULL, NULL, NULL),
(118, '', 'Bi mo ti kunle, Oluwa', NULL, NULL, NULL, NULL),
(119, '', 'Baba mi yi oju kuro', NULL, NULL, NULL, NULL),
(120, '', 'Oluwa, b? agbowode ni', NULL, NULL, NULL, NULL),
(121, '', 'Ki se l?aini ?reti', NULL, NULL, NULL, NULL),
(122, '', 'Jesu Oluf? okan mi', NULL, NULL, NULL, NULL),
(123, '', 'Apata aiyeraye,Se ibi isadi mi', NULL, NULL, NULL, NULL),
(124, '', 'Bi agbonrin ti nmi hele', NULL, NULL, NULL, NULL),
(125, '', 'Bi mo ti ri ? laisawawi', NULL, NULL, NULL, NULL),
(126, '', 'Olugbala gb?ohun mi', NULL, NULL, NULL, NULL),
(127, '', 'Ekun ko le gba mi;', NULL, NULL, NULL, NULL),
(128, '', 'Oluwa, emi sa ti gb?ohun Re', NULL, NULL, NULL, NULL),
(129, '', 'A jesu, Iwo nduro.', NULL, NULL, NULL, NULL),
(130, '', 'Maa g? esin lo, l? olanla Re', NULL, NULL, NULL, NULL),
(131, '', 'Gbogb? ogo, iyin ola', NULL, NULL, NULL, NULL),
(132, '', '?Hosanna s? Omo Dafidi,?', NULL, NULL, NULL, NULL),
(133, '', 'Awon ewe Salemu', NULL, NULL, NULL, NULL),
(134, '', '?Gba Jesu f? ite Re sile,', NULL, NULL, NULL, NULL),
(135, '', 'Irapada! Itan iyanu', NULL, NULL, NULL, NULL),
(136, '', 'O ti kan itan Agbelebu', NULL, NULL, NULL, NULL),
(137, '', 'W?Olori Alufa Giga', NULL, NULL, NULL, NULL),
(138, '', 'Ogo ni fun Jesu', NULL, NULL, NULL, NULL),
(139, '', 'Oke kan mbe jina rere', NULL, NULL, NULL, NULL),
(140, '', 'Ki Jesu ha nikan jiya', NULL, NULL, NULL, NULL),
(141, '', 'Gbati mo ri agbelebu', NULL, NULL, NULL, NULL),
(142, '', 'Ife l\'o to bayi', NULL, NULL, NULL, NULL),
(143, '', 'Olugbala mi ha gbogbe', NULL, NULL, NULL, NULL),
(144, '', 'O se! Olugbala mi ta', NULL, NULL, NULL, NULL),
(145, 'I gave my life for thee', 'Mo f\'ara Mi fun o', NULL, NULL, NULL, NULL),
(146, '', 'Kristi Olurapada wa ku', NULL, NULL, NULL, NULL),
(147, '', 'Ijinle ni ife Jesu', NULL, NULL, NULL, NULL),
(148, '', 'L? owuro ojo ajinde', NULL, NULL, NULL, NULL),
(150, 'Jesus lives! thy terrors now', 'Jesu ye; titi aiye', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `main_verses`
--

CREATE TABLE `main_verses` (
  `id` int(10) UNSIGNED NOT NULL,
  `hymn_id` int(11) NOT NULL,
  `verse_id` int(11) NOT NULL,
  `english` text COLLATE utf8_unicode_ci NOT NULL,
  `yoruba` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `main_verses`
--

INSERT INTO `main_verses` (`id`, `hymn_id`, `verse_id`, `english`, `yoruba`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Awake, my soul, \nand with the sun\nThy daily stage of duty run;\nShake off dull sloth, and joyful rise,\nTo pay thy morning sacrifice.', 'Ji okan mi ba oorun ji,\r\nMura si ise ojo re; \r\nMase ilora, ji kutu, \r\nKo san gbese ebo oro.', NULL, NULL),
(2, 1, 2, 'All praise to Thee, who safe has kept\r\nAnd hast refreshed me while I slept\r\nGrant, Lord, when I from death shall wake\r\nI may of endless light partake.', 'Ogo fun Enit\'o so mi, \r\nTo tu mi lara loj\' orun; \r\nOluwa ijo mo ba sun, \r\nJi mi saye ainipekun.', NULL, NULL),
(3, 1, 3, 'Lord, I my vows to Thee renew;\r\nDisperse my sins as morning dew.\r\nGuard my first springs of thought and will,\r\nAnd with Thyself my spirit fill.', 'Oluwa mo tun eje je, \r\nTu ese ka b\'iri oro\r\nSo akoronu mi oni\r\nSi f\'Emi Re kun inu mi.', NULL, NULL),
(4, 1, 4, 'Direct, control, suggest, this day,\r\nAll I design, or do, or say,\r\nThat all my powers, with all their might,\r\nIn Thy sole glory may unite.', 'Oro at\'ise mi oni, \r\nKi won le ri bi eko Re; \r\nKemi fi ipa mi gbogbo\r\nSise rere fun ogo Re', NULL, NULL),
(5, 1, 5, 'Thy precious time misspent, redeem,\r\nEach present day thy last esteem,\r\nImprove thy talent with due care;\r\nFor the great day thyself prepare.', 'Ro gbogb\' ojo t\'o fi sofo\r\nBere sir ere �se loni\r\nKiyes\' irin re l\'aiye yi: \r\nK o si mura d\'ojo nla ni.', NULL, NULL),
(6, 1, 6, 'Praise God, from Whom all blessings flow;\r\nPraise Him, all creatures here below;\r\nPraise Him above, ye heavenly host;\r\nPraise Father, Son, and Holy Ghost.', 'Yin Olorun ibu ore; \r\nE yin, enyin eda aiye\r\nE yin, enyin eda orun\r\nYin Baba, Omo on Emi.', NULL, NULL),
(7, 2, 1, 'Forth in Thy Name, O Lord, I go,\r\nMy daily labor to pursue;\r\nThee, only Thee, resolved to know\r\nIn all I think or speak or do.', 'OLUWA mi, mo njade lo, \r\nLati se ise ojo mi; \r\nIwo nikan l\' emi o mo, \r\nL\' oro, l\' ero: ati n\' ise.', NULL, NULL),
(8, 2, 2, 'The task Thy wisdom hath assigned,\r\nO let me cheerfully fulfill;\r\nIn all my works Thy presence find,\r\nAnd prove Thy good and perfect will.', 'Ise t\' O yan mi l\' anu Re\r\nJe ki nle se tayotayo; \r\nKi nr\' oju Re n\'nu ise mi, \r\nK\' emi si le f\'ife Re han.', NULL, NULL),
(9, 2, 3, 'Preserve me from my calling\'s snare,\r\nAnd hide my simple heart above,\r\nAbove the thorns of choking care,\r\nThe gilded baits of worldly love.', 'Dabobo mi lowo \'danwo,\r\nK\' O pa okan mi mo kuro\r\nLowo aniyan  aiye yi, \r\nAti gbogbo ifekufe.', NULL, NULL),
(10, 2, 4, 'Thee may I set at my right hand,\r\nWhose eyes mine inmost substance see,\r\nAnd labor on at Thy command,\r\nAnd offer all my works to Thee.', 'Iwo t\'oju Re r\' okan mi, \r\nMaa wa low\' otun mi titi, \r\nKi nmaa sise lo l\' ase Re, \r\nKi nf\' ise mi gbogbo fun O.', NULL, NULL),
(11, 2, 5, 'Give me to bear Thy easy yoke,\r\nAnd every moment watch and pray,\r\nAnd still to things eternal look,\r\nAnd hasten to Thy glorious day.', 'Jeki nreru Re t\'o fuye, \r\nKi nmaa sora nigba gbogbo, \r\nKi nma f\' oju si nkan t\' orun, \r\nKi nsi mura d\' ojo ogo.', NULL, NULL),
(12, 2, 6, 'For Thee delightfully employ\r\nWhate\'er Thy bounteous grace hath giv\'n;\r\nAnd run my course with even joy,\r\nAnd closely walk with Thee to He', 'Ohunkohun t\' O fi fun mi, \r\nJeki nle lo fun ogo Re, \r\nKi nf\' ayo sure ije mi, \r\nKi mba O rin titi d\' orun.', NULL, NULL),
(13, 3, 1, 'Come to me, Lord, when first I wake,\r\nas the faint lights of morning break;\r\nbid purest thoughts within me rise,\r\nlike crystal dewdrops to the skies', 'Wa s\'odo mi, Oluwa mi, \r\n Ni kutukutu owuro, \r\n Mu k\'ero rere so jade, \r\n Lat\'inu mi soke orun.', NULL, NULL),
(14, 3, 2, 'Come to me in the sultry noon,\r\nor earth\'s low communings will soon\r\nof thy dear face eclipse the light,\r\nand change my fairest day to night.', 'Wa s\'odo mi, Oluwa mi, \r\nNi wakati osan gangan; \r\nKi\'yonu ma ba se mi mo, \r\nNwon a si s\'osan mi d\'oru.', NULL, NULL),
(15, 3, 3, 'Come to me in the evening shade,\r\nand, if my heart from thee hath strayed,\r\nO bring it back, and at thy side\r\nsecurely let me there abide.', 'Wa s\'odo mi, Oluwa mi, \r\nNigbati ale ba nle lo, \r\nBi okan mi ba nsako lo, \r\nMu pada; f\'oju \'re wo mi.', NULL, NULL),
(16, 3, 4, 'Come to me in the midnight hour,\r\nwhen sleep withholds its balmy power;\r\nlet my lone spirit find her rest,\r\nlike John, upon my Savior\'s breast.', 'Wa s\'odo mi, Oluwa mi, \r\nLi oru, nigbati orun\r\nKo woju mi: je k\'okan mi,\r\nRi \'simi je li aiya Re.', NULL, NULL),
(17, 3, 5, 'Come to me through life\'s varied way,\r\nand when its pulses cease to play,\r\nthen, Savior, bid me come to thee,\r\nthat where thou art, thy child may be.', 'Wa s\'odo mi, Oluwa mi\r\nNi gbogbo ojo aiye mi:\r\nNigbati emi mi ba lo,\r\nKi nle n\'ibugbe lodo Re.', NULL, NULL),
(18, 4, 1, 'Come to the Morning Prayer,\r\nCome let us kneel and pray;\r\nPrayer is the Christian pilgrim\'s staff\r\nTo walk with God all day.', 'Wa s\'adura oro, \r\nKunle k\'a gbadura; \r\nAdura ni opa Kristian, \r\nLati b\'Olorun rin.', NULL, NULL),
(19, 4, 2, 'At noon, beneath the Rock\r\nOf Ages, rest and pray;\r\nSweet is that shadow from the heat,\r\nWhen the sun smites by day.', 'Losan, wole labe\r\nApat\'aiyeraiye\r\nItura ojiji Re dun\r\nNigbat\'orun ba mu.', NULL, NULL),
(20, 4, 3, 'At eve, shut to the door,\r\nRound the home-altar pray,\r\nAnd finding there \"the House of God,\"\r\nAt \"heaven\'s gate\" close the day.', 'Je ki gbogbo ile, \r\nWa gba\' dura l\'ale; \r\nKi ile wa di t\' Olorun\r\nAti\' bode orun.', NULL, NULL),
(21, 4, 4, 'When midnight seals our eyes,\r\nLet each in spirit say,\r\n\"I sleep, but my heart waketh, Lord,\r\nWith Thee to watch and pray.\"', 'Nigbat\'o d\'oganjo, \r\nJe k\'a wi l\'emi, pe\r\nMo sun, sugbon okan mi ji\r\nLati ba O sona.', NULL, NULL),
(22, 5, 1, 'The morning bright,With rosy light,\r\nHath waked me from my sleep;\r\nFather, I own Thy love alone\r\nThy little one doth keep.', 'Imole oro didun yi, \r\nJi mi nin\'orun mi, \r\nBaba, ife Tire nikan, \r\nL\' o pa omo Re mo.', NULL, NULL),
(23, 5, 2, 'All through the day, I humbly pray,\r\nBe Thou my Guard and Guide;\r\nMy sins forgive,And let me live,\r\nBlest Jesus, near Thy side.', 'Ni gbogbo oni, mo be O,\r\nMaa se oluso mi, \r\nDariji mi, Jesu mimo, \r\nKi \'m je Tire loni.', NULL, NULL),
(24, 5, 3, 'O make Thy rest Within my breast,\r\nGreat Spirit of all grace;\r\nMake me like Thee; Then shall I be\r\nPrepared to see Thy face.', 'Wa se \'bugbe Re ninu mi,\r\nEmi ore-ofe,\r\nSo mi di mimo l\'aye yi,\r\nK\'emi le r\'oju Re.', NULL, NULL),
(25, 6, 1, 'Holy Father, hear me;\r\nthou art my defender,\r\nbe thou ever near me,\r\nloving, true and tender.', 'Baba mi gbo t\'emi\r\n\'Wo ni Alabo mi, \r\nMa sunmo mi titi; \r\nOninure julo!', NULL, NULL),
(26, 6, 2, 'Jesus, blessed Savior,\r\nLord of life and glory,\r\ngrant me now thy favour\r\nas I kneel before thee.', 'Jesu, Oluwa mi, \r\nIye at\'ogo mi, \r\nKi\' gba naa yara de, \r\nTi ngo de odo Re.', NULL, NULL),
(27, 6, 3, 'Comforter benignest,\r\nwho abiding in me\r\nall my need divinest,\r\nmove me, draw me, win me.', 'Olutunu julo,\r\n\'Wo ti ngbe inu mi, \r\n\'Wo t\'o mo aini mi, \r\nFa mi, k\'o si gba mi.', NULL, NULL),
(28, 6, 4, 'Holy, holy, holy,\r\ncome, and leave me never,\r\nthine abode most lowly,\r\nonly thine for ever.', 'Mimo, mimo, mimo, \r\nMa fi mi sile lai, \r\nSe mi n\'ibugbe Re, \r\nTire nikan lailai.', NULL, NULL),
(29, 7, 1, 'Through all the dangers of the night,\r\nPreserv\'d, O Lord! By thee;\r\nAgain we hail the cheerful light,\r\nAgain we bow the knee.', 'Ninu gbogbo ewu oru,\r\nOluwa l\'o so mi;\r\nAwa si tun ri \'mole yi\r\nA tun te ekun ba.', NULL, NULL),
(30, 7, 2, 'Preserve us, Lord! throughout the day,\r\nAnd guide us by thy arm;\r\nFor they are safe, and only they,\r\nWhom thou preserv\'st from harm.', 'Oluwa, pa wa mo l\'oni,\r\nFi apa Re so wa; \r\nKiki awon ti\'wo pamo, \r\nL\'o nyo ninu ewu.', NULL, NULL),
(31, 7, 3, 'Let all our words and all our ways,\r\nDeclare that we are thine,\r\nThat so the light of truth and grace\r\nBefore the world may shine.', 'K\'oro wa, ati iwa wa,\r\nWipe, tire l\'awa; \r\nTobe t\'imole otito\r\nLe tan loju aye.', NULL, NULL),
(32, 7, 4, 'Let us ne\'er turn away from thee;\r\nDear Saviour, hold us fast,\r\nTill with immortal eyes, we see\r\nThy glorious face at last.', 'Ma je k\'a pada lodo Re,\r\nOlugbala owon; \r\nTiti ao f\'oju wa ri\r\nOju Re li opin.', NULL, NULL),
(33, 8, 1, 'Christ, whose glory fills the skies,\r\nChrist the true, the only Light,\r\nSun of Righteousness, arise!\r\nTriumph o\'er the shades of night:\r\nDayspring from on high, be near;\r\nDaystar, in my heart appear.', 'Kristi, Ologo, Olola\r\nIwo imole aye\r\nOrun ododo, dide\r\nK\'o si bori okunkun\r\n\'Mole oro, sunmo mi\r\n\'Rawo ooro, w\'aya mi', NULL, NULL),
(34, 8, 2, 'Dark and cheerless is the morn\r\nunaccompanied by thee;\r\njoyless is the day\'s return,\r\ntill thy mercy\'s beams I see,\r\ntill they inward light impart,\r\nglad my eyes, and warm my heart.', 'Okunkun l\'owuro je\r\nB\'Iwo ko pelu re wa\r\nAilayo l\'ojo yi je\r\nFun mi n\'imole, Jesu\r\nM\'okan mi gbogbo gbona', NULL, NULL),
(35, 8, 3, 'Visit then this soul of mine!\r\nPierce the gloom of sin and grief!\r\nFill me, Radiancy Divine;\r\nscatter all my unbelief;\r\nmore and more thyself display,\r\nshining to the perfect day.', 'Wa be okan mi yi wo\r\nLe okunkun ese lo\r\nF\'imole orun kun mi\r\nSi tu aigbagbo mi ka\r\nMaa f\'ara Re han mi si\r\nSi maa ran b\'osangangan', NULL, NULL),
(36, 9, 1, 'Jesus, Sun of righteousness,\r\nbrightest beam of love divine,\r\nwith the early morning rays\r\ndo thou on our darkness shine,\r\nand dispel with purest light\r\nall our night.', 'JESU orun ododo, \r\nIwo imole ife; \r\nGbat\'imole owuro, \r\nBa n t\'ila oorun tan wa, \r\nTan\'mole ododo Re\r\nYi wa ka.', NULL, NULL),
(37, 9, 2, 'As on drooping herb and flower\r\nfalls the soft refreshing dew,\r\nlet thy Spirit\'s grace and power\r\nall our weary souls renew;\r\nshowers of blessing over all\r\nsoftly fall.', 'Gege bi iri ti n se,\r\nSori eweko gbogbo, \r\nK\'emi ore\' ofe Re\r\nSo okan wa di ?tun; \r\nRo ojo ibukun Re\r\nSori wa', NULL, NULL),
(38, 9, 3, 'Like the sun\'s reviving ray,\r\nmay thy love with tender glow\r\nall our coldness melt away,\r\nwarm and cheer us forth to go,\r\ngladly serve thee and obey\r\nall the day.', 'B\' imole oorun ti nran,\r\nK\' imole ife Tire, \r\nSi ma gbona l\'okan wa; \r\nK\'o si mu wa l\'ara ya, \r\nKa le ma fayo sin O\r\nLaiye wa.', NULL, NULL),
(39, 9, 4, 'O our only Hope and Guide,\r\nnever leave us nor forsake;\r\nkeep us ever at thy side\r\ntill the eternal morning break;\r\nmoving on to Zion\'s hill,\r\nhomeward still.', 'Amona, ireti wa,\r\nMa fi wa sile titi, \r\nFi wa s\'abe iso Re\r\nTiti opin emi wa. \r\nSin wa la ajo wa ja\r\nS\'ile wa.', NULL, NULL),
(40, 9, 5, 'Lead us all our days and years\r\nin thy straight and narrow way;\r\nlead us through the vale of tears\r\nto the land of perfect day,\r\nwhere thy people, fully blest,\r\nsafely rest.', 'Pa wa mo n\'nu ife Re, \r\nL\'ojo aye wa gbogbo. \r\nSi mu wa bori iku, \r\nMu wa de\'le ayo naa, \r\nKa le ba\' won mimo gba\r\nisimi', NULL, NULL),
(41, 10, 1, 'Glory to thee, my God, this night,\r\nFor all the blessings of the light:\r\nKeep me, O keep me, King of kings,\r\nBeneath thine own almighty wings', 'Ogo f\'Olorun l\'ale yi\r\nFun gbogbo ore Imole\r\nSo mi, Oba awon Oba\r\nL\'abe ojiji iye Re.', NULL, NULL),
(42, 10, 2, 'Forgive me, Lord, for thy dear Son,\r\nthe ill that I this day have done,\r\nthat with the world, myself, and thee,\r\nI, ere I sleep, at peace may be.', 'Oluwa f\'ese mi ji mi,\r\nNitori omo Re, loni\r\nK\'emi le wa l\'alafia, \r\nPelu iwo ati aiye', NULL, NULL),
(43, 10, 3, 'Teach me to live, that I may dread\r\nThe grave as little as my bed.\r\nTeach me to die, that so I may\r\nRise glorious at the judgment day', 'Je k\'okan mi le sun le O,\r\nK\'orun didun p\'oju mi de, \r\nOrun ti y\'o m\'ara mi le, \r\nKi nle sin O li owuro', NULL, NULL),
(44, 10, 4, 'O may my soul on thee repose,\r\nAnd with sweet sleep mine eyelids close,\r\nSleep that may me more vigorous make\r\nTo serve my God when I awake.', 'Bi mo ba dubule laisun,\r\nF\'ero orun kun okan mi, \r\nMa je ki nl\'ala bururu, \r\nMa je k\'ipa okun bo mi', NULL, NULL),
(45, 10, 5, 'Praise God, from whom all blessings flow;\r\nPraise him, all creatures here below;\r\nPraise him above, ye heavenly host;\r\nPraise Father, Son, and Holy Ghost.', 'Yin Olorun, gbogbo eda;\r\nTi mbe nisale aiye yi: \r\nE yin loke, eda Orun, \r\nYin Baba, Omo on Emi', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_07_02_000943_create_tone_types_table', 1),
(4, '2017_07_02_001005_create_tags_table', 1),
(5, '2017_07_02_001033_create_main_hymns_table', 1),
(6, '2017_07_02_001249_create_main_verses_table', 1),
(7, '2017_07_02_001323_create_appendix_hymns_table', 1),
(8, '2017_07_02_001331_create_appendix_verses_table', 1),
(9, '2017_07_02_001359_create_main_choruses_table', 1),
(10, '2017_07_02_001412_create_appendix_choruses_table', 1),
(11, '2017_07_04_234751_create_user_add_edit_hymns_table', 2),
(12, '2014_10_12_000000_create_users_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tone_types`
--

CREATE TABLE `tone_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'prime', '$2y$10$YPH30Sz2gFsQMTlJbCsSieHTn6PAAunPWv3asZdYMf3pYoywctgU2', 'cMqQkNKgmrKjBu0lazXDMXA2d7iOjKyNEAuXboZtNmHVKjBsCjkBdIdmIGMb', NULL, NULL),
(2, 'victor', '$2y$10$LvunmJixm5h3Al.cUBhkUu6WMIoAdyXdzrFWK6rCb1EVRQjWNChMm', NULL, '2017-07-05 07:41:27', '2017-07-05 07:41:27');

-- --------------------------------------------------------

--
-- Table structure for table `user_add_edit_hymns`
--

CREATE TABLE `user_add_edit_hymns` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Action` int(11) NOT NULL,
  `Type` int(11) NOT NULL,
  `Hymn_number` int(11) NOT NULL,
  `verses` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appendix_choruses`
--
ALTER TABLE `appendix_choruses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appendix_hymns`
--
ALTER TABLE `appendix_hymns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appendix_verses`
--
ALTER TABLE `appendix_verses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_choruses`
--
ALTER TABLE `main_choruses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_hymns`
--
ALTER TABLE `main_hymns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_verses`
--
ALTER TABLE `main_verses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tone_types`
--
ALTER TABLE `tone_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- Indexes for table `user_add_edit_hymns`
--
ALTER TABLE `user_add_edit_hymns`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appendix_choruses`
--
ALTER TABLE `appendix_choruses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `appendix_hymns`
--
ALTER TABLE `appendix_hymns`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `appendix_verses`
--
ALTER TABLE `appendix_verses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `main_choruses`
--
ALTER TABLE `main_choruses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `main_hymns`
--
ALTER TABLE `main_hymns`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;
--
-- AUTO_INCREMENT for table `main_verses`
--
ALTER TABLE `main_verses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tone_types`
--
ALTER TABLE `tone_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_add_edit_hymns`
--
ALTER TABLE `user_add_edit_hymns`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
