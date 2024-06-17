-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2022 at 08:03 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `startup_investor`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_user_id` bigint(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `passcode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_user_id`, `username`, `passcode`) VALUES
(9001, 'admin', 'harshyash');

-- --------------------------------------------------------

--
-- Table structure for table `friendship_notifications`
--

CREATE TABLE `friendship_notifications` (
  `notification_id` bigint(255) NOT NULL,
  `sender_id` bigint(255) NOT NULL,
  `receiver_id` bigint(255) NOT NULL,
  `notification` varchar(5000) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `friendship_request`
--

CREATE TABLE `friendship_request` (
  `friend_id` bigint(255) NOT NULL,
  `receiver` varchar(255) NOT NULL,
  `sender` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `investment`
--

CREATE TABLE `investment` (
  `id` int(11) NOT NULL,
  `investor` bigint(255) NOT NULL,
  `startup` bigint(255) NOT NULL,
  `date` date NOT NULL,
  `amount` bigint(255) NOT NULL,
  `equity_percent` bigint(255) NOT NULL,
  `status` bigint(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `investment`
--

INSERT INTO `investment` (`id`, `investor`, `startup`, `date`, `amount`, `equity_percent`, `status`) VALUES
(1, 305143584, 1217681388, '2022-05-05', 654987, 5, 1),
(2, 305143584, 1217681388, '2022-05-05', 794653, 9, 2);

-- --------------------------------------------------------

--
-- Table structure for table `investor`
--

CREATE TABLE `investor` (
  `unique_id` bigint(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `pan` varchar(255) NOT NULL,
  `number` bigint(255) NOT NULL,
  `describes` varchar(255) NOT NULL,
  `invested_before` int(255) NOT NULL,
  `budget` int(255) NOT NULL,
  `property` int(255) NOT NULL,
  `status` int(255) NOT NULL,
  `profile_pic_url` varchar(255) NOT NULL,
  `chat_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `investor`
--

INSERT INTO `investor` (`unique_id`, `name`, `email`, `gender`, `password`, `pan`, `number`, `describes`, `invested_before`, `budget`, `property`, `status`, `profile_pic_url`, `chat_status`) VALUES
(305143584, 'Harsh Kumar', 'harsh@gmail.com', 'Male', 'abc@123', 'JKXPX6297R', 918910345465, 'Business Owner', 1, 10, 1, 1, 'assets/upload/305143584/20220207_123616-03.jpeg', 'Active now'),
(3003387076, 'Neysa Masterson', 'nmastersonj@illinois.edu', 'Female', 'Hazkt0', 'JGEFF8687R', 9105423737, 'Family Office', 1, 13, 1, 4, '', ''),
(3024760851, 'Ellie Ivey', 'eivey9@soundcloud.com', 'Female', 'FqZuwcT0xfT', 'KOAFW3060Z', 2211150987, 'Business Owner', 1, 22, 1, 4, '', ''),
(3076794619, 'Bob Harkins', 'bharkinsc@seattletimes.com', 'Male', 'S5mJkvob', 'RUIFT5360Z', 5518421285, 'Student', 1, 26, 1, 1, '', ''),
(3154972189, 'Ilka Allibone', 'iallibone5@furl.net', 'Female', 'SuG8UAx2VLB', 'YEJAG9353Q', 1723156525, 'Angel Network', 0, 38, 1, 1, '', ''),
(3169806799, 'Myrtle Corde', 'mcordek@google.nl', 'Female', 'BMVLVJG5', 'WVNHG8584X', 5834644845, 'Student', 0, 19, 0, 1, '', ''),
(3171559467, 'Thibaud Hakeworth', 'thakeworth2@patch.com', 'Male', 'stjZdT', 'KHWLF7897I', 3934161028, 'Professional', 0, 43, 1, 0, '', ''),
(3175574353, 'Amanda Lashmar', 'alashmar7@comcast.net', 'Female', 'tUlnCN036', 'JNAGH5698O', 3007219507, 'Accelerator/Incubator', 1, 5, 0, 0, '', ''),
(3205574410, 'Meier Dureden', 'mduredene@theatlantic.com', 'Male', 'ZgUnQpG', 'LMCFV9124L', 5884943010, 'VC & PE Professional', 0, 20, 0, 0, '', ''),
(3244907082, 'Esta Guerrazzi', 'eguerrazzih@home.pl', 'Female', 'vb7lCZLkbT', 'VISGD9140Y', 2299792061, 'VC & PE Fund', 1, 39, 1, 1, '', ''),
(3246695726, 'Gonzales Confort', 'gconfortl@umich.edu', 'Male', 'orh80p', 'NTNLF1399K', 8495452443, 'Family Office', 0, 18, 0, 1, '', ''),
(3251367596, 'Claretta Skurm', 'cskurm3@theatlantic.com', 'Female', 'yWcY4ZiI', 'PUHJW7628P', 5396474660, 'Business Owner', 1, 26, 1, 1, '', ''),
(3263549821, 'Ricky Dibsdale', 'rdibsdalei@chicagotribune.com', 'Female', 'ApMOB0n1', 'QSNFG5259Q', 1464506218, 'Angel Network', 0, 18, 1, 0, '', ''),
(3311917222, 'Rodd Jacmar', 'rjacmarm@stumbleupon.com', 'Male', 'dpI0DukLDz5C', 'KFWHJ2956W', 7492995450, 'Professional', 1, 33, 1, 1, '', ''),
(3486090639, 'Stanley Liggins', 'sligginsa@deliciousdays.com', 'Male', 'v3JYSXS', 'QQFAX1977U', 1419974933, 'Startup Founder', 0, 5, 0, 0, '', ''),
(3510343758, 'Lawrence O\'Carrol', 'locarrol1@boston.com', 'Male', 'lpMfc8d8n', 'NVSTJ3272O', 9873687087, 'Accelerator/Incubator', 0, 20, 1, 0, '', ''),
(3551184479, 'Mathew Striker', 'mstrikerd@epa.gov', 'Male', 'EVzFL41WIL', 'XJELO0342F', 6116619278, 'VC & PE Professional', 0, 49, 1, 1, '', ''),
(3601624182, 'Jana Toner', 'jtonern@ovh.net', 'Female', '0CbhjlLblEbX', 'FUAFH6837M', 3686449331, 'Professional', 0, 36, 0, 0, '', ''),
(3627394540, 'Halley Shipsey', 'hshipsey6@intel.com', 'Female', '3n2S0wsLG', 'BADCM0193J', 2858015681, 'VC & PE Professional', 1, 28, 0, 1, '', ''),
(3627576465, 'Ruddy Conkling', 'rconkling8@imdb.com', 'Male', 'nIsFLkE', 'RJXCK0165N', 4108955457, 'Family Office', 1, 35, 1, 1, '', ''),
(3647202453, 'Christel Burrells', 'cburrells4@berkeley.edu', 'Female', 'lTiwfuwCj', 'KPNFS1126R', 3903317044, 'Student', 0, 19, 0, 1, '', ''),
(3738390121, 'Rebekah Nashe', 'rnasheb@geocities.com', 'Female', 'PNlORSHH2', 'KPLGX2291E', 9935132125, 'Angel Network', 0, 14, 0, 1, '', ''),
(3791053920, 'Pattin Redding', 'preddingg@parallels.com', 'Male', '9GNPYuP', 'VWSTG0688N', 2919641846, 'Family Office', 1, 5, 0, 0, '', ''),
(3817532016, 'Elane Le feaver', 'elef@army.mil', 'Female', 'WV0GJ2g', 'WVNHG8584X', 2173008618, 'Professional', 0, 45, 0, 1, '', ''),
(3821864299, 'El Phillott', 'ephillotto@cloudflare.com', 'Male', 'nXBEOfDCq49', 'DRXPI0032S', 4237838882, 'Family Office', 1, 15, 0, 0, '', ''),
(3933488635, 'Katlin Cassam', 'kcassam0@moonfruit.com', 'Female', '7LaBU7QoPq', 'DQBCL0289G', 5811812857, 'Professional', 0, 37, 0, 1, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(255) NOT NULL,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL,
  `msg` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `myfriends`
--

CREATE TABLE `myfriends` (
  `friend_id` bigint(255) NOT NULL,
  `my_id` varchar(255) NOT NULL,
  `my_friends` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `myfriends`
--

INSERT INTO `myfriends` (`friend_id`, `my_id`, `my_friends`) VALUES
(40000020, '305143584', '1217681388'),
(40000021, '3076794619', '1217681388');

-- --------------------------------------------------------

--
-- Table structure for table `query_reply`
--

CREATE TABLE `query_reply` (
  `reply_id` bigint(255) NOT NULL,
  `reply` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `query_reply`
--

INSERT INTO `query_reply` (`reply_id`, `reply`) VALUES
(700251774, 'asdfghkl'),
(1131718746, 'hsdfg'),
(1643790239, 'hihakl');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `report_id` bigint(255) NOT NULL,
  `unique_id` bigint(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(1000) NOT NULL,
  `description` varchar(10000) NOT NULL,
  `action` bigint(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`report_id`, `unique_id`, `name`, `email`, `subject`, `description`, `action`) VALUES
(700251774, 305143584, 'Harsh Kumar', 'harsh@gmail.com', 'h', 'tag', 1),
(1131718746, 1217681388, 'Mukul Pant', 'harsh@gmail.com', 'hi', 'hsdtf', 1),
(1643790239, 1217681388, 'Mukul Pant', 'harsh@gmail.com', 'a', 'gfs', 1);

-- --------------------------------------------------------

--
-- Table structure for table `startup`
--

CREATE TABLE `startup` (
  `unique_id` bigint(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `founder` int(2) NOT NULL,
  `blog_linku_one` varchar(255) NOT NULL,
  `blog_linkn_one` varchar(255) NOT NULL,
  `startup_name` varchar(255) NOT NULL,
  `reg_startup_name` varchar(255) NOT NULL,
  `website_url` varchar(255) NOT NULL,
  `sector` varchar(255) NOT NULL,
  `stage` varchar(255) NOT NULL,
  `inception_date` varchar(255) NOT NULL,
  `city_opp` varchar(255) NOT NULL,
  `status` int(255) NOT NULL,
  `profile_pic_url` varchar(255) NOT NULL,
  `video_url` varchar(255) NOT NULL,
  `chat_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `startup`
--

INSERT INTO `startup` (`unique_id`, `name`, `email`, `gender`, `number`, `password`, `founder`, `blog_linku_one`, `blog_linkn_one`, `startup_name`, `reg_startup_name`, `website_url`, `sector`, `stage`, `inception_date`, `city_opp`, `status`, `profile_pic_url`, `video_url`, `chat_status`) VALUES
(1217681388, 'Mukul Pant', 'harsh@gmail.com', 'Male', '+917765001349', 'harshyash', 0, 'Mukul Pant', 'mukul@123', 'Startup Management Syatem', 'SMS Pvt Ltd', 'www.startupmanagementsystem.com', 'Computer Vision', 'Idea Stage', '2022-01', 'Bangalore', 1, 'assets/upload/1217681388/Mukul.png', 'assets/upload/1217681388/pexels-arvin-latifi-6466763.mp4', 'Active now'),
(6048980085, 'Skipton Walczynski', 'swalczynski3@hc360.com', 'Male', '1095346452', 'F11CiyW', 0, 'Nélie', 'swalczynski3@github.com', 'Dibbert and Sons', 'swalczynski3@buzzfeed.com', 'https://salon.com/in/congue/etiam.xml', 'Manufacturing', 'Idea Stage', '2011-12', 'Tignapalan', 1, '', '', ''),
(6077590981, 'Alva Cornels', 'acornelsj@mysql.com', 'Male', '1645226227', 'xvbaIjN8K', 0, 'Yénora', 'acornelsj@newsvine.com', 'O\'Connell, Keeling and Stehr', 'acornelsj@lulu.com', 'http://unc.edu/venenatis/lacinia/aenean/sit.jpg', 'Analytics', 'Proof Of Concept', '2010-09', 'Wolonio', 1, '', '', ''),
(6103563103, 'Bobbee Keysel', 'bkeyselk@mediafire.com', 'Female', '8779400767', 'ecHHs08R', 0, 'Nélie', 'bkeyselk@cnn.com', 'Mann-Goyette', 'bkeyselk@pagesperso-orange.fr', 'https://google.co.jp/ipsum/dolor/sit/amet/consectetuer/adipiscing.png', 'Food & Beverages', 'Early Traction', '2015-12', 'Hantang', 1, '', '', ''),
(6110011113, 'Jyoti McAlinden', 'jmcalinden4@hud.gov', 'Female', '6457889993', 'kIBUIIHos', 0, 'Marie-noël', 'jmcalinden4@shareasale.com', 'Becker Inc', 'jmcalinden4@google.com.hk', 'https://imdb.com/ut/mauris/eget/massa.json', 'Media', 'Steady Revenues', '2011-02', 'Uralo-Kavkaz', 1, '', '', ''),
(6156206752, 'Damara Casetti', 'dcasetti2@xinhuanet.com', 'Female', '7777580733', '7hAHnZ8T', 0, 'Östen', 'dcasetti2@xing.com', 'Reichel, Carter and Gleichner', 'dcasetti2@wix.com', 'https://infoseek.co.jp/ultrices/phasellus/id.png', 'Enterprise Software', 'Idea Stage', '2013-01', 'Khatsyezhyna', 0, '', '', ''),
(6189419016, 'Gayelord Dwane', 'gdwanen@boston.com', 'Male', '2895751743', 'FSuoCby4Mi', 0, 'Andréa', 'gdwanen@walmart.com', 'Grant-Runte', 'gdwanen@prlog.org', 'http://springer.com/proin/eu/mi/nulla/ac/enim.xml', 'Safety', 'Proof Of Concept', '2013-02', 'Dongxin', 0, '', '', ''),
(6222395678, 'Nico Mollison', 'nmollisonm@java.com', 'Male', '2648284358', 'pcIG4lR', 0, 'Adèle', 'nmollisonm@studiopress.com', 'Goyette, Heathcote and Lindgren', 'nmollisonm@creativecommons.org', 'http://umich.edu/duis/mattis/egestas/metus/aenean/fermentum/donec.js', 'Legal', 'Proof Of Concept', '2011-03', 'Guanshan', 0, '', '', ''),
(6252070036, 'Alejandrina Tufts', 'atufts1@biblegateway.com', 'Female', '8668071840', 'Iih4P7N76JEi', 0, 'Lauréna', 'atufts1@cnet.com', 'Crist Group', 'atufts1@auda.org.au', 'https://ebay.co.uk/convallis/tortor/risus/dapibus/augue/vel.json', 'HR', 'Steady Revenues', '2010-12', 'Arroio do Meio', 0, '', '', ''),
(6288076267, 'Bill Cordeix', 'bcordeixb@exblog.jp', 'Male', '3828574084', 'wv2wXO7LAgWQ', 0, 'Camélia', 'bcordeixb@yandex.ru', 'Hammes and Sons', 'bcordeixb@mit.edu', 'http://microsoft.com/arcu/libero/rutrum/ac/lobortis/vel/dapibus.jpg', 'Transportation', 'Proof Of Concept', '2015-10', 'Phu Khiao', 0, '', '', ''),
(6290053892, 'Idelle O\'Cahey', 'iocaheyf@washingtonpost.com', 'Female', '5289847508', 'KwEWUb6wX', 0, 'Gösta', 'iocaheyf@tumblr.com', 'Braun LLC', 'iocaheyf@si.edu', 'https://sogou.com/eget.jsp', 'Consumer Goods', 'Steady Revenues', '2018-02', 'Jalal-Abad', 0, '', '', ''),
(6383154213, 'Blisse Wynn', 'bwynn7@ameblo.jp', 'Female', '9086136899', 'rxV1PGH', 0, 'Maëlyss', 'bwynn7@discuz.net', 'MacGyver LLC', 'bwynn7@chronoengine.com', 'https://lycos.com/mauris/laoreet/ut/rhoncus/aliquet/pulvinar.js', 'Gifting', 'Beta Launched', '2013-12', 'Xijiao', 0, '', '', ''),
(6421845681, 'Walt Widdall', 'wwiddallc@de.vu', 'Male', '1423618763', '443AYweSaMq', 0, 'Intéressant', 'wwiddallc@fotki.com', 'Nikolaus, Dach and Prosacco', 'wwiddallc@theglobeandmail.com', 'http://rediff.com/id/pretium.aspx', 'Social Network', 'Early Traction', '2013-01', 'Amos', 0, '', '', ''),
(6434625243, 'Hogan MacGee', 'hmacgeei@slashdot.org', 'Male', '3671902573', 'jHrJoLdet', 0, 'Célia', 'hmacgeei@webeden.co.uk', 'Hahn Inc', 'hmacgeei@nih.gov', 'http://independent.co.uk/volutpat/erat/quisque.xml', 'Communication', 'Idea Stage', '2015-11', 'Aix-les-Bains', 0, '', '', ''),
(6452637832, 'Hew Goodlett', 'hgoodlettg@reference.com', 'Male', '1256470405', 'FSA3ozKCycpv', 0, 'Torbjörn', 'hgoodlettg@mail.ru', 'Lynch-Koelpin', 'hgoodlettg@uiuc.edu', 'http://networksolutions.com/nulla/sed/accumsan/felis/ut/at/dolor.png', 'HR', 'Proof Of Concept', '2011-08', 'Kranjska Gora', 0, '', '', ''),
(6470275131, 'Abra Hacker', 'ahacker8@va.gov', 'Female', '3051662282', '21xNmqOlnfA', 0, 'Amélie', 'ahacker8@usgs.gov', 'Nader-Goodwin', 'ahacker8@jigsy.com', 'http://umich.edu/posuere.jsp', 'Communication', 'Idea Stage', '2013-06', 'Clearwater', 0, '', '', ''),
(6493295700, 'Faber Sentance', 'fsentanced@tamu.edu', 'Male', '4379742811', '7zBd5x5VMPtc', 0, 'Françoise', 'fsentanced@indiegogo.com', 'Runolfsson, Williamson and Wolff', 'fsentanced@simplemachines.org', 'http://slashdot.org/mauris/vulputate/elementum/nullam/varius/nulla.js', 'Analytics', 'Proof Of Concept', '2013-05', 'Borlänge', 1, '', '', ''),
(6523974019, 'Irvin Holliar', 'iholliar0@xrea.com', 'Male', '5851073776', 'xZ6C6R', 0, 'Mélodie', 'iholliar0@psu.edu', 'Sporer, Sporer and Lockman', 'iholliar0@cbc.ca', 'https://usatoday.com/vestibulum/eget/vulputate/ut/ultrices.png', 'Enterprise Software', 'Beta Launched', '2013-03', 'Rochester', 0, '', '', ''),
(6556798727, 'Henrie Ollenbuttel', 'hollenbuttell@cdbaby.com', 'Female', '9351020966', 'T4oqlb8Q1', 0, 'Bécassine', 'hollenbuttell@cdbaby.com', 'Schiller Inc', 'hollenbuttell@shutterfly.com', 'https://elpais.com/habitasse/platea/dictumst/etiam/faucibus.jpg', 'Travel & Tourism', 'Beta Launched', '2012-02', 'El Doncello', 0, '', '', ''),
(6697123615, 'Linea Waterman', 'lwaterman5@noaa.gov', 'Female', '2794538826', 'JTfynPWjhIW', 0, 'Eliès', 'lwaterman5@usa.gov', 'Ondricka, Weimann and Gottlieb', 'lwaterman5@chron.com', 'https://cam.ac.uk/proin/eu/mi/nulla.json', 'Analytics', 'Proof Of Concept', '2012-04', 'Irákleia', 0, '', '', ''),
(6745416209, 'Ingaberg Le Gall', 'ileo@fastcompany.com', 'Female', '8542226514', 'KtYLMjh2U3v', 0, 'Andrée', 'ileo@loc.gov', 'Frami-Schultz', 'ileo@mashable.com', 'http://etsy.com/porttitor/pede/justo.js', 'Analytics', 'Idea Stage', '2018-03', 'Rohia', 0, '', '', ''),
(6773268000, 'Flo Windrus', 'fwindrush@webeden.co.uk', 'Female', '9181647686', 'iebeMR', 0, 'Vérane', 'fwindrush@bandcamp.com', 'Hickle Inc', 'fwindrush@newyorker.com', 'http://who.int/ac/nibh.jsp', 'Services', 'Steady Revenues', '2019-12', 'Jarry', 0, '', '', ''),
(6782289659, 'Travers Arno', 'tarnoe@squidoo.com', 'Male', '8726728696', 'UryTbP', 0, 'Bérangère', 'tarnoe@eepurl.com', 'Rohan and Sons', 'tarnoe@auda.org.au', 'http://cbc.ca/justo.js', 'Nanotechnology', 'Steady Revenues', '2012-06', 'Lyantonde', 0, '', '', ''),
(6910773156, 'Kissiah Scintsbury', 'kscintsbury9@ft.com', 'Female', '6611256278', 'X8MDPX', 0, 'Yú', 'kscintsbury9@theguardian.com', 'Mayert-Mills', 'kscintsbury9@devhub.com', 'http://mit.edu/nulla/nunc/purus/phasellus/in/felis/donec.json', 'Real Estate', 'Idea Stage', '2016-03', 'Vilhena', 0, '', '', ''),
(6950128316, 'Sigismond Coarser', 'scoarsera@google.de', 'Male', '8684898333', 'wSTeoIJis7', 0, 'Kuí', 'scoarsera@goo.gl', 'Collier-Turcotte', 'scoarsera@vkontakte.ru', 'https://gizmodo.com/consequat/dui/nec/nisi.json', 'Social Network', 'Steady Revenues', '2016-02', 'Luxi', 0, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `startup_info`
--

CREATE TABLE `startup_info` (
  `unique_id` bigint(255) NOT NULL,
  `problem` mediumtext NOT NULL,
  `solution` mediumtext NOT NULL,
  `product` mediumtext NOT NULL,
  `traction` mediumtext NOT NULL,
  `bizmodel` mediumtext NOT NULL,
  `market` mediumtext NOT NULL,
  `competition` mediumtext NOT NULL,
  `vision` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `startup_info`
--

INSERT INTO `startup_info` (`unique_id`, `problem`, `solution`, `product`, `traction`, `bizmodel`, `market`, `competition`, `vision`) VALUES
(1217681388, 'hi hello change', 'hi hello change', 'hi hello changehi hello change', 'hi hello change', 'hi hello change', 'hi hello change', 'hi hello change', 'hi hello change');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_user_id`);

--
-- Indexes for table `friendship_notifications`
--
ALTER TABLE `friendship_notifications`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `friendship_request`
--
ALTER TABLE `friendship_request`
  ADD PRIMARY KEY (`friend_id`);

--
-- Indexes for table `investment`
--
ALTER TABLE `investment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `investor`
--
ALTER TABLE `investor`
  ADD PRIMARY KEY (`unique_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `myfriends`
--
ALTER TABLE `myfriends`
  ADD PRIMARY KEY (`friend_id`);

--
-- Indexes for table `query_reply`
--
ALTER TABLE `query_reply`
  ADD PRIMARY KEY (`reply_id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `startup`
--
ALTER TABLE `startup`
  ADD PRIMARY KEY (`unique_id`);

--
-- Indexes for table `startup_info`
--
ALTER TABLE `startup_info`
  ADD PRIMARY KEY (`unique_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_user_id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9002;

--
-- AUTO_INCREMENT for table `friendship_notifications`
--
ALTER TABLE `friendship_notifications`
  MODIFY `notification_id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29999999;

--
-- AUTO_INCREMENT for table `friendship_request`
--
ALTER TABLE `friendship_request`
  MODIFY `friend_id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200022;

--
-- AUTO_INCREMENT for table `investment`
--
ALTER TABLE `investment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `myfriends`
--
ALTER TABLE `myfriends`
  MODIFY `friend_id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40000022;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
