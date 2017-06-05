-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 05, 2017 at 08:20 PM
-- Server version: 5.7.18-0ubuntu0.16.04.1
-- PHP Version: 7.0.15-0ubuntu0.16.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `acmdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `clawer`
--

CREATE TABLE `clawer` (
  `username` varchar(100) NOT NULL,
  `ojname` varchar(100) NOT NULL,
  `ojusername` varchar(100) NOT NULL,
  `sloved` int(11) DEFAULT NULL,
  `recent` varchar(1000) DEFAULT NULL,
  `problemurl` varchar(200) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=gbk;

--
-- Dumping data for table `clawer`
--

INSERT INTO `clawer` (`username`, `ojname`, `ojusername`, `sloved`, `recent`, `problemurl`, `rating`) VALUES
('321321', 'bestcoder', 'qq547276542', 22, '2016_Astar_Contest_-_Round_2B 702 2016_Astar_Contest_-_Round_2A 701 BestCoder_Round_#83 696 BestCoder_Round_#81_(div.1) 692 BestCoder_Round_#80 688 BestCoder_Round_#79_(div.2) 686 BestCoder_Round_#77_(div.2) 682 BestCoder_Round_#76_(div.1) 680 BestCoder_Round_#70 666 BestCoder_Round_#68_(div.1) 663 BestCoder_Round_#67_(div.1) 661 BestCoder_Round_#66_(div.1) 659 BestCoder_Round_#65 654 BestCoder_Round_#64_(div.2) 652 BestCoder_Round_#28 564 BestCoder_Round_#22 555 BestCoder_Round_#17 548', 'http://bestcoder.hdu.edu.cn/contests/contest_show.php?cid=', 1899),
('321321', 'codeforces', 'nopy', 2, 'Codeforces_Round_#274_(Div._2) 479 Codeforces_Round_#250_(Div._2) 437', 'http://codeforces.com/contest/', 1362),
('321321', 'hdu', 'nopy', 84, '1000 1001 1016 1028 1085 1166 1398 1532 1671 1707 1708 1709 1710 1711 1712 1713 1788 1939 2000 2003 2023 2063 2084 2089 2130 2188 2222 2255 2485 2491 2492 2544 2553 2602 2779 2973 3037 3343 3345 3346 3347 3348 3349 3549 3673 3853 4018 4020 4041 4193 4336 4405 4565 4578 4902 4939 4941 4952 5015 5067 5194 5241 5284 5288 5289 5294 5301 5318 5319 5325 5344 5347 5348 5349 5351 5352 5355 5358 5360 5363 5372 5375 5378 5379 1936 2059 2896 2974 3203 3208 3397 3555 3679 4043 4893 5237', 'http://acm.hdu.edu.cn/showproblem.php?pid=', NULL),
('321321', 'poj', 'qq547276542', 94, '1000 1001 1002 1003 1004 1005 1006 1008 1013 1017 1035 1046 1061 1062 1067 1068 1089 1094 1185 1207 1218 1221 1222 1258 1265 1316 1321 1328 1459 1552 1573 1611 1635 1753 1755 1789 1821 1836 1837 1840 1845 1961 2000 2017 2031 2049 2105 2109 2115 2182 2187 2240 2253 2299 2367 2388 2406 2417 2418 2442 2485 2488 2499 2506 2513 2524 2528 2533 2586 2632 2689 2752 2777 2965 2993 2996 3006 3026 3067 3071 3164 3177 3253 3259 3264 3278 3295 3321 3349 3352 3368 3468 3762 3764', 'http://poj.org/problem?id=', NULL),
('432432', 'bestcoder', 'qq547276542', 22, '2016_Astar_Contest_-_Round_2B 702 2016_Astar_Contest_-_Round_2A 701 BestCoder_Round_#83 696 BestCoder_Round_#81_(div.1) 692 BestCoder_Round_#80 688 BestCoder_Round_#79_(div.2) 686 BestCoder_Round_#77_(div.2) 682 BestCoder_Round_#76_(div.1) 680 BestCoder_Round_#70 666 BestCoder_Round_#68_(div.1) 663 BestCoder_Round_#67_(div.1) 661 BestCoder_Round_#66_(div.1) 659 BestCoder_Round_#65 654 BestCoder_Round_#64_(div.2) 652 BestCoder_Round_#28 564 BestCoder_Round_#22 555 BestCoder_Round_#17 548', 'http://bestcoder.hdu.edu.cn/contests/contest_show.php?cid=', 1899),
('432432', 'hdu', 'qq547276542', 134, '1000 1001 1002 1003 1028 1106 1134 1143 1166 1241 1251 1255 1276 1358 1506 1513 1542 1576 1671 1686 1695 1698 1754 1800 1828 1863 1870 1874 1879 1978 2000 2001 2002 2003 2004 2005 2006 2007 2008 2009 2010 2011 2012 2013 2014 2015 2016 2017 2018 2019 2020 2021 2022 2023 2024 2025 2026 2027 2028 2029 2030 2031 2032 2033 2034 2035 2039 2040 2041 2044 2045 2046 2047 2050 2051 2054 2055 2057 2058 2064 2066 2070 2071 2072 2073 2075 2076 2077 2080 2081 2083 2084 2085 2086 2087 2089 2096 2098 2222 2444 2516 2521 2544 2577 2642 2795 2815 2824 2896 2969 3037 3065 3068 3074 3336 3342 3351 3555 3746 3966 4336 5120 5122 5289 5294 5301 5348 5452 5510 5512 5578 5583 5656 6011 1285 3265 4305 5167 5293 5402 5442', 'http://acm.hdu.edu.cn/showproblem.php?pid=', NULL),
('a547276542', 'codeforces', 'nopy', 2, 'Codeforces_Round_#274_(Div._2) 479 Codeforces_Round_#250_(Div._2) 437', 'http://codeforces.com/contest/', 1362),
('a547276542', 'poj', 'qq547276542', 94, '1000 1001 1002 1003 1004 1005 1006 1008 1013 1017 1035 1046 1061 1062 1067 1068 1089 1094 1185 1207 1218 1221 1222 1258 1265 1316 1321 1328 1459 1552 1573 1611 1635 1753 1755 1789 1821 1836 1837 1840 1845 1961 2000 2017 2031 2049 2105 2109 2115 2182 2187 2240 2253 2299 2367 2388 2406 2417 2418 2442 2485 2488 2499 2506 2513 2524 2528 2533 2586 2632 2689 2752 2777 2965 2993 2996 3006 3026 3067 3071 3164 3177 3253 3259 3264 3278 3295 3321 3349 3352 3368 3468 3762 3764', 'http://poj.org/problem?id=', NULL),
('a547276542', 'poj', 'shjwudp', 15, '1000 1141 1151 1222 1635 1742 2104 2371 2761 2763 3070 3237 3254 3436 3764', 'http://poj.org/problem?id=', NULL),
('c547276542', 'poj', 'nopy', 79, '1000 1035 1062 1068 1088 1094 1125 1200 1214 1258 1321 1328 1419 1426 1459 1573 1611 1753 1789 1840 1860 1936 2002 2049 2051 2096 2109 2135 2151 2155 2240 2251 2253 2274 2299 2342 2362 2388 2406 2418 2442 2485 2488 2503 2506 2513 2524 2528 2586 2632 2752 2777 2808 2823 2965 2993 2996 3009 3020 3026 3041 3071 3077 3078 3080 3083 3253 3259 3264 3274 3278 3295 3349 3436 3468 3624 3667 3687 3744', 'http://poj.org/problem?id=', NULL),
('c547276542', 'poj', 'qq547276542', 94, '1000 1001 1002 1003 1004 1005 1006 1008 1013 1017 1035 1046 1061 1062 1067 1068 1089 1094 1185 1207 1218 1221 1222 1258 1265 1316 1321 1328 1459 1552 1573 1611 1635 1753 1755 1789 1821 1836 1837 1840 1845 1961 2000 2017 2031 2049 2105 2109 2115 2182 2187 2240 2253 2299 2367 2388 2406 2417 2418 2442 2485 2488 2499 2506 2513 2524 2528 2533 2586 2632 2689 2752 2777 2965 2993 2996 3006 3026 3067 3071 3164 3177 3253 3259 3264 3278 3295 3321 3349 3352 3368 3468 3762 3764', 'http://poj.org/problem?id=', NULL),
('c547276542', 'poj', 'shjwudp', 15, '1000 1141 1151 1222 1635 1742 2104 2371 2761 2763 3070 3237 3254 3436 3764', 'http://poj.org/problem?id=', NULL),
('chenyz', 'poj', 'qq547276542', 94, '1000 1001 1002 1003 1004 1005 1006 1008 1013 1017 1035 1046 1061 1062 1067 1068 1089 1094 1185 1207 1218 1221 1222 1258 1265 1316 1321 1328 1459 1552 1573 1611 1635 1753 1755 1789 1821 1836 1837 1840 1845 1961 2000 2017 2031 2049 2105 2109 2115 2182 2187 2240 2253 2299 2367 2388 2406 2417 2418 2442 2485 2488 2499 2506 2513 2524 2528 2533 2586 2632 2689 2752 2777 2965 2993 2996 3006 3026 3067 3071 3164 3177 3253 3259 3264 3278 3295 3321 3349 3352 3368 3468 3762 3764', 'http://poj.org/problem?id=', NULL),
('codeforce', 'codeforces', 'nopy', 2, 'Codeforces_Round_#274_(Div._2) 479 Codeforces_Round_#250_(Div._2) 437', 'http://codeforces.com/contest/', 1362),
('codeforce', 'codeforces', 'shjwudp', 34, 'Codeforces_Round_#351_(VK_Cup_2016_Round_3,_Div._2_Edition) 673 Codeforces_Round_#350_(Div._2) 670 Good_Bye_2015 611 Codeforces_Round_#333_(Div._2) 602 Codeforces_Round_#332_(Div._2) 599 Codeforces_Round_#329_(Div._2) 593 Codeforces_Round_#327_(Div._2) 591 Codeforces_Round_#325_(Div._2) 586 Codeforces_Round_#320_(Div._2)_[Bayan_Thanks-Round] 579 Codeforces_Round_#319_(Div._1) 576 Codeforces_Round_#Pi_(Div._2) 567 Codeforces_Round_#312_(Div._2) 558', 'http://codeforces.com/contest/', 1825),
('codeforce', 'hdu', 'qq547276542', 134, '1000 1001 1002 1003 1028 1106 1134 1143 1166 1241 1251 1255 1276 1358 1506 1513 1542 1576 1671 1686 1695 1698 1754 1800 1828 1863 1870 1874 1879 1978 2000 2001 2002 2003 2004 2005 2006 2007 2008 2009 2010 2011 2012 2013 2014 2015 2016 2017 2018 2019 2020 2021 2022 2023 2024 2025 2026 2027 2028 2029 2030 2031 2032 2033 2034 2035 2039 2040 2041 2044 2045 2046 2047 2050 2051 2054 2055 2057 2058 2064 2066 2070 2071 2072 2073 2075 2076 2077 2080 2081 2083 2084 2085 2086 2087 2089 2096 2098 2222 2444 2516 2521 2544 2577 2642 2795 2815 2824 2896 2969 3037 3065 3068 3074 3336 3342 3351 3555 3746 3966 4336 5120 5122 5289 5294 5301 5348 5452 5510 5512 5578 5583 5656 6011 1285 3265 4305 5167 5293 5402 5442', 'http://acm.hdu.edu.cn/showproblem.php?pid=', NULL),
('codeforce', 'poj', 'nopy', NULL, NULL, NULL, NULL),
('qq2294011886', 'poj', 'qq547276542', 94, '1000 1001 1002 1003 1004 1005 1006 1008 1013 1017 1035 1046 1061 1062 1067 1068 1089 1094 1185 1207 1218 1221 1222 1258 1265 1316 1321 1328 1459 1552 1573 1611 1635 1753 1755 1789 1821 1836 1837 1840 1845 1961 2000 2017 2031 2049 2105 2109 2115 2182 2187 2240 2253 2299 2367 2388 2406 2417 2418 2442 2485 2488 2499 2506 2513 2524 2528 2533 2586 2632 2689 2752 2777 2965 2993 2996 3006 3026 3067 3071 3164 3177 3253 3259 3264 3278 3295 3321 3349 3352 3368 3468 3762 3764', 'http://poj.org/problem?id=', NULL),
('qq547276542', 'bestcoder', 'qq547276542', 22, '2016_Astar_Contest_-_Round_2B 702 2016_Astar_Contest_-_Round_2A 701 BestCoder_Round_#83 696 BestCoder_Round_#81_(div.1) 692 BestCoder_Round_#80 688 BestCoder_Round_#79_(div.2) 686 BestCoder_Round_#77_(div.2) 682 BestCoder_Round_#76_(div.1) 680 BestCoder_Round_#70 666 BestCoder_Round_#68_(div.1) 663 BestCoder_Round_#67_(div.1) 661 BestCoder_Round_#66_(div.1) 659 BestCoder_Round_#65 654 BestCoder_Round_#64_(div.2) 652 BestCoder_Round_#28 564 BestCoder_Round_#22 555 BestCoder_Round_#17 548', 'http://bestcoder.hdu.edu.cn/contests/contest_show.php?cid=', 1899),
('qq547276542', 'codeforces', 'qq547276542', 48, 'Codeforces_Round_#404_(Div._2) 785 Codeforces_Round_#403_(Div._2,_based_on_Technocup_2017_Finals) 782 Codeforces_Round_#402_(Div._2) 779 Codeforces_Round_#401_(Div._2) 777 ICM_Technex_2017_and_Codeforces_Round_#400_(Div._1_+_Div._2,_combined) 776 Codeforces_Round_#397_by_Kaspersky_Lab_and_Barcelona_Bootcamp_(Div._1_+_Div._2_combined) 765 Codeforces_Round_#396_(Div._2) 766 Codeforces_Round_#352_(Div._2) 672 Codeforces_Round_#351_(VK_Cup_2016_Round_3,_Div._2_Edition) 673 Codeforces_Round_#350_(Div._2) 670 Codeforces_Round_#344_(Div._2) 631 Codeforces_Round_#341_(Div._2) 621 Codeforces_Round_#340_(Div._2) 617 Codeforces_Round_#338_(Div._2) 615 Good_Bye_2015 611 Codeforces_Round_#336_(Div._2) 608 Codeforces_Round_#335_(Div._2) 606 Codeforces_Round_#334_(Div._2) 604 Codeforces_Round_#332_(Div._2) 599 Codeforces_Round_#329_(Div._2) 593 Codeforces_Round_#274_(Div._2) 479', 'http://codeforces.com/contest/', 1593),
('qq547276542', 'hdu', 'qq547276542', 134, '1000 1001 1002 1003 1028 1106 1134 1143 1166 1241 1251 1255 1276 1358 1506 1513 1542 1576 1671 1686 1695 1698 1754 1800 1828 1863 1870 1874 1879 1978 2000 2001 2002 2003 2004 2005 2006 2007 2008 2009 2010 2011 2012 2013 2014 2015 2016 2017 2018 2019 2020 2021 2022 2023 2024 2025 2026 2027 2028 2029 2030 2031 2032 2033 2034 2035 2039 2040 2041 2044 2045 2046 2047 2050 2051 2054 2055 2057 2058 2064 2066 2070 2071 2072 2073 2075 2076 2077 2080 2081 2083 2084 2085 2086 2087 2089 2096 2098 2222 2444 2516 2521 2544 2577 2642 2795 2815 2824 2896 2969 3037 3065 3068 3074 3336 3342 3351 3555 3746 3966 4336 5120 5122 5289 5294 5301 5348 5452 5510 5512 5578 5583 5656 6011 1285 3265 4305 5167 5293 5402 5442', 'http://acm.hdu.edu.cn/showproblem.php?pid=', NULL),
('qq547276542', 'poj', 'qq547276542', 94, '1000 1001 1002 1003 1004 1005 1006 1008 1013 1017 1035 1046 1061 1062 1067 1068 1089 1094 1185 1207 1218 1221 1222 1258 1265 1316 1321 1328 1459 1552 1573 1611 1635 1753 1755 1789 1821 1836 1837 1840 1845 1961 2000 2017 2031 2049 2105 2109 2115 2182 2187 2240 2253 2299 2367 2388 2406 2417 2418 2442 2485 2488 2499 2506 2513 2524 2528 2533 2586 2632 2689 2752 2777 2965 2993 2996 3006 3026 3067 3071 3164 3177 3253 3259 3264 3278 3295 3321 3349 3352 3368 3468 3762 3764', 'http://poj.org/problem?id=', NULL),
('wangxin', 'poj', 'nopy', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `usertype` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `score` int(11) DEFAULT NULL,
  `teamname` varchar(255) DEFAULT NULL,
  `lastdate` date DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL,
  `gender` varchar(30) DEFAULT NULL,
  `Tshirtsize` varchar(30) DEFAULT NULL,
  `major` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `blog` varchar(50) DEFAULT NULL,
  `avatar` varchar(100) DEFAULT NULL,
  `power_num` int(11) DEFAULT NULL,
  `power_ds` int(11) DEFAULT NULL,
  `power_math` int(11) DEFAULT NULL,
  `power_dp` int(11) DEFAULT NULL,
  `power_graph` int(11) DEFAULT NULL,
  `power_cal` int(11) DEFAULT NULL,
  `power_mn` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`username`, `password`, `usertype`, `email`, `score`, `teamname`, `lastdate`, `name`, `gender`, `Tshirtsize`, `major`, `tel`, `blog`, `avatar`, `power_num`, `power_ds`, `power_math`, `power_dp`, `power_graph`, `power_cal`, `power_mn`) VALUES
('321321', '321321', '正式队员', '547276542@qq.com', 1782, 'shjwudp', '2017-03-09', '马化腾', '男', 'S', '数据科学与工程', '132299999', 'http://blog.csdn.net/qq547276542', '321321_avatar.jpg', 20, 3, 2, 8, 2, 7, 6),
('432432', '432432', '正式队员', '432432@qq.com', 1220, '打酱油', NULL, '陈远哲', '男', 'L', '软件工程', '13323232323', 'http://blog.csdn.net/qq547276542', 'init_avatar.jpg', 20, 3, 5, 1, 2, 4, 4),
('a547276542', '8313178', '正式队员', '321@dsa.cas', 812, 'shjwudp', NULL, '陈打算', '男', 'XL', '打铁', '12312312312', 'http://blog.csdn.net/qq547276542', 'a547276542_avatar.jpg', 20, NULL, NULL, NULL, NULL, NULL, NULL),
('bfdbfdbfd', '321321', '正式队员', '2294011886@qq.com', 322, 'shjyoudp', NULL, 'dfe43f', '男', 'XXL', 'e12', '123123', '123321312', 'init_avatar.jpg', 20, NULL, NULL, NULL, NULL, NULL, NULL),
('c547276542', '321321', '正式队员', 'dsasd@dsa.csa', 632, 'shjwudp', NULL, '大大', '女', 'S', '打铁', '43243223', 'http://blog.csdn.net/qq547276542', 'c547276542_avatar.jpg', 20, NULL, NULL, NULL, NULL, NULL, NULL),
('codeforce', '321321', '正式队员', 'fefef@qq.com', 730, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'init_avatar.jpg', 10, 1, 1, 1, 1, 1, 1),
('csacsa', '321321', '正式队员', '321321321123@qwd.com', 111, 'shjyoudp', NULL, 'das', '女', 'L', 'dqwd', '123312312', 'dasdasdsadas', 'init_avatar.jpg', 20, NULL, NULL, NULL, NULL, NULL, NULL),
('easqwqw', '321321', '正式队员', '312321@dsa.com', 323, 'shjyoudp', NULL, 'gfre', '男', 'M', '312312', '321312', '', 'init_avatar.jpg', 20, NULL, NULL, NULL, NULL, NULL, NULL),
('kkkkk44444', '321321', '正式队员', 'gerrg@dw.dwq', 65, 'shjyoudp', NULL, 'fewfew', '女', 'M', '312321', '312312312312', '31231232', 'init_avatar.jpg', 20, NULL, NULL, NULL, NULL, NULL, NULL),
('qq123123', '123123', '正式队员', 'sdada@eqw.com', NULL, '打酱油', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'init_avatar.jpg', 20, NULL, NULL, NULL, NULL, NULL, NULL),
('qq2294011886', 'liu371425156', '正式队员', '423432@dqw.asc', 752, 'shjwudp', NULL, '刘欢', '女', 'S', '软件工程', '18764233805', 'http://blog.csdn.net/qq547276542', 'qq2294011886_avatar.jpg', 20, NULL, NULL, NULL, NULL, NULL, NULL),
('qq547276542', '8313178', '正式队员', '547276542@qwe.com', 3412, 'shjwudp', NULL, '陈远哲', '男', 'XL', '软件工程', '13932313123', 'http://blog.csdn.net/qq547276542', 'qq547276542_avatar.jpg', 20, 4, 3, 2, 5, 8, 5),
('qwdwqd', '321321', '正式队员', '43243224@qq.com', 212, 'shjyoudp', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'init_avatar.jpg', 20, NULL, NULL, NULL, NULL, NULL, NULL),
('shjwudp', '321321', '正式队员', '547276542@qq.com', NULL, NULL, NULL, '常学神', '男', 'L', '计算机', '12321312321321', 'https://qq547276542.github.io', 'shjwudp_avatar.png', 10, 0, 0, 0, 0, 0, 0),
('wangxin', '123456', '正式队员', '1475797048@qq.com', 0, NULL, NULL, '王鑫', '男', '', '软件工程', '', '', 'init_avatar.jpg', 10, 1, 1, 1, 1, 1, 1),
('wefew22', '321321', '正式队员', '312321@dsa.com', 432, 'shjyoudp', NULL, 'fewfew', '女', 'XXXL', '32r3', '312321', '123123321', 'init_avatar.jpg', 20, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `score_record`
--

CREATE TABLE `score_record` (
  `username` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `score` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=gbk;

--
-- Dumping data for table `score_record`
--

INSERT INTO `score_record` (`username`, `date`, `score`) VALUES
('321321', '2017-05-08', 600),
('321321', '2017-05-09', 660),
('321321', '2017-05-10', 780),
('321321', '2017-05-11', 780),
('321321', '2017-05-12', 780),
('321321', '2017-05-13', 850),
('321321', '2017-05-14', 950),
('321321', '2017-05-15', 950),
('321321', '2017-05-16', 980),
('321321', '2017-05-17', 1010),
('321321', '2017-05-18', 1100),
('321321', '2017-05-19', 1018),
('321321', '2017-05-20', 1782),
('321321', '2017-06-04', 1782),
('432432', '2017-05-08', 600),
('432432', '2017-05-09', 480),
('432432', '2017-05-10', 550),
('432432', '2017-05-11', 650),
('432432', '2017-05-12', 750),
('432432', '2017-05-13', 650),
('432432', '2017-05-14', 850),
('432432', '2017-05-15', 950),
('432432', '2017-05-16', 700),
('432432', '2017-05-17', 850),
('432432', '2017-05-18', 1050),
('432432', '2017-05-19', 920),
('432432', '2017-05-20', 1220),
('432432', '2017-06-04', 1220),
('a547276542', '2017-05-08', 600),
('a547276542', '2017-05-09', 800),
('a547276542', '2017-05-10', 850),
('a547276542', '2017-05-11', 950),
('a547276542', '2017-05-12', 900),
('a547276542', '2017-05-13', 800),
('a547276542', '2017-05-14', 1050),
('a547276542', '2017-05-15', 800),
('a547276542', '2017-05-16', 830),
('a547276542', '2017-05-17', 760),
('a547276542', '2017-05-18', 1050),
('a547276542', '2017-05-19', 869),
('a547276542', '2017-05-20', 812),
('a547276542', '2017-06-04', 812),
('b547276542', '2017-05-11', 479),
('bfdbfdbfd', '2017-05-13', 0),
('c547276542', '2017-05-08', 600),
('c547276542', '2017-05-09', 800),
('c547276542', '2017-05-10', 850),
('c547276542', '2017-05-11', 950),
('c547276542', '2017-05-12', 850),
('c547276542', '2017-05-13', 1450),
('c547276542', '2017-05-14', 1050),
('c547276542', '2017-05-15', 1150),
('c547276542', '2017-05-16', 1180),
('c547276542', '2017-05-17', 1000),
('c547276542', '2017-05-18', 1250),
('c547276542', '2017-05-19', 158),
('c547276542', '2017-05-20', 632),
('c547276542', '2017-06-04', 632),
('chenyz', '2017-05-08', 300),
('chenyz', '2017-05-09', 800),
('chenyz', '2017-05-10', 850),
('chenyz', '2017-05-11', 950),
('chenyz', '2017-05-12', 1050),
('chenyz', '2017-05-13', 1150),
('chenyz', '2017-05-14', 1050),
('chenyz', '2017-05-15', 1250),
('chenyz', '2017-05-16', 1080),
('chenyz', '2017-05-17', 950),
('chenyz', '2017-05-18', 850),
('chenyz', '2017-05-19', 188),
('chenyz', '2017-05-20', 752),
('chenyz', '2017-06-04', 752),
('codeforce', '2017-06-04', 730),
('csacsa', '2017-05-10', 522),
('csacsa', '2017-05-11', 980),
('csacsa', '2017-05-12', 600),
('csacsa', '2017-05-13', 700),
('csacsa', '2017-05-17', 900),
('csacsa', '2017-05-18', 920),
('csacsa', '2017-05-19', 1211),
('kkkkk44444', '2017-05-09', 50),
('kkkkk44444', '2017-05-10', 90),
('kkkkk44444', '2017-05-11', 0),
('kkkkk44444', '2017-05-13', 577),
('qq2294011886', '2017-05-20', 752),
('qq2294011886', '2017-06-04', 752),
('qq547276542', '2017-05-08', 600),
('qq547276542', '2017-05-09', 800),
('qq547276542', '2017-05-10', 850),
('qq547276542', '2017-05-11', 950),
('qq547276542', '2017-05-12', 950),
('qq547276542', '2017-05-13', 950),
('qq547276542', '2017-05-14', 250),
('qq547276542', '2017-05-15', 350),
('qq547276542', '2017-05-16', 422),
('qq547276542', '2017-05-17', 500),
('qq547276542', '2017-05-18', 650),
('qq547276542', '2017-05-19', 1904),
('qq547276542', '2017-05-20', 3412),
('qq547276542', '2017-06-04', 3412),
('test', '2017-05-14', 1221),
('wangxin', '2017-06-04', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clawer`
--
ALTER TABLE `clawer`
  ADD PRIMARY KEY (`username`,`ojname`,`ojusername`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `score_record`
--
ALTER TABLE `score_record`
  ADD PRIMARY KEY (`username`,`date`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;