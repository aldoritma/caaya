-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jan 17, 2018 at 04:00 PM
-- Server version: 5.6.35
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `pro_caaya`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions_adm`
--

CREATE TABLE `ci_sessions_adm` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions_adm`
--

INSERT INTO `ci_sessions_adm` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('2e3cd4687ba7e853dc613b1e9de4c69f81bff0f0', '::1', 1516179625, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363137303430303b69645f757365727c733a323a223136223b757365726e616d657c733a383a2264656469726f6d65223b6e616d615f6c656e676b61707c733a393a224465646920526f6d65223b656d61696c7c733a303a22223b6e6f5f74656c707c733a31303a2231323334353637383930223b666f746f7c733a303a22223b6c6576656c7c733a353a2261646d696e223b626c6f6b69727c733a313a224e223b757365725f747970655f69647c733a313a2230223b69645f73657373696f6e7c733a303a22223b736573735f61646d696e7c623a313b);

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions_front`
--

CREATE TABLE `ci_sessions_front` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions_front`
--

INSERT INTO `ci_sessions_front` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('5f2af05c6f338aee0fe83b60e1e73bad4e67657b', '::1', 1516165942, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363136353934323b),
('cc2a661df1a01bc4a1c336b7776dbf333d886b1b', '::1', 1516166357, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363136363334313b),
('36c1df5b289f47d4caa2726aff490fb497a49206', '::1', 1516166874, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363136363730393b),
('fb5bd252706ff389b3c50cf9392c8cdf84068066', '::1', 1516167601, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363136373533333b),
('d9387c82aca8434ac7325bcbdfee2d2baa13887b', '::1', 1516168304, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363136383030373b),
('36f20b5c99d49a939500739e69b2702aec5ce2ec', '::1', 1516168308, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363136383330373b),
('1aba5513358fdf97d7da7aa9d17429b777995f76', '::1', 1516168588, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363136383331313b),
('fe5a11a530c0dc2cd21d652e13219fc242ade3cc', '::1', 1516168796, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363136383631353b),
('55de38451b8f10b4bdf3a765c5e5bcdbe8ba28da', '::1', 1516169751, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363136393636323b),
('7ac8be6093628488991911fe8e4cba8d266e171c', '::1', 1516170450, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363137303233303b),
('c0769065ed61e7224f4b816b1b4f68d7049774d6', '::1', 1516170582, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363137303538323b),
('c3d2d8dd31f2f909e554ee88744d07fe640d1475', '::1', 1516170628, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363137303538323b),
('3f1f67775bbbfa7d30229ea95741250b59499fa1', '::1', 1516171317, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363137313237393b),
('c0114cc612d7b6a3f6ae4eb53560dfc08c1c8673', '::1', 1516171851, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363137313630313b),
('9a13b3a9f8afa102ba4f3371854c91dd0b5cba63', '::1', 1516172287, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363137323237383b),
('3f531bc75d85e327640558628bbf57332880b960', '::1', 1516175116, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363137353037363b),
('3730a1a83fe59d5045d8e1a10c2f1a53a1186139', '::1', 1516175825, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363137353737323b),
('785ff4d6e43d8fd5cec3c9701527ab467906c6e9', '::1', 1516179561, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363137393439343b);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_about`
--

CREATE TABLE `tbl_about` (
  `id` int(10) NOT NULL,
  `description` text CHARACTER SET utf8,
  `engdesc` text CHARACTER SET utf8,
  `chidesc` text CHARACTER SET utf8,
  `category` varchar(150) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_about`
--

INSERT INTO `tbl_about` (`id`, `description`, `engdesc`, `chidesc`, `category`, `created`) VALUES
(1, '&lt;p open=&quot;&quot; sans&quot;,=&quot;&quot; sans-serif;=&quot;&quot; letter-spacing:=&quot;&quot; normal;&quot;=&quot;&quot;&gt;Dua bidang pelaksanaan Asian Games 2018 Jakarta-Palembang, bidang prestasi dan infrastruktur akan menjadi fokus kunjungan kerja Ketua Dewan Pengarah Asian Games 2018, Jusuf Kalla, Selasa, (3/10/2017). Dalam kunjungan yang dijadwalkan berlangsung selama empat jam itu, Wakil Presiden RI meninjau pelatnas cabang bulutangkis di Cipayung, pencak silat di Padepokan Pencak Silat, TMII, dan panahan di Senayan.&lt;/p&gt;&lt;p open=&quot;&quot; sans&quot;,=&quot;&quot; sans-serif;=&quot;&quot; letter-spacing:=&quot;&quot; normal;&quot;=&quot;&quot;&gt;Usai melihat dari dekat latihan para atlet nasional tersebut, JK juga akan memantau perkembangan pembangunan arena pertandingan di kawasan Gelora Bung Karno (GBK), Senayan. Di kompleks olahraga yang dibangun untuk menggelar Asian Games IV tahun 1962 itu, JK akan mendatangi Stadion Utama GBK, Istora, lapangan panahan, hoki, bisbol, dan tiga lapangan latihan ABC.&lt;/p&gt;&lt;p open=&quot;&quot; sans&quot;,=&quot;&quot; sans-serif;=&quot;&quot; letter-spacing:=&quot;&quot; normal;&quot;=&quot;&quot;&gt;Berkaitan dengan situasi terkini, kunjungan kerja ini penting untuk memastikan program yang berkaitan dengan bidang prestasi dan infrastruktur berjalan lancar. Seperti diketahui, di bidang prestasi, Indonesia menargetkan raihan 20-22 medali emas demi mengamankan peringkat 10 besar Asia di Asian Games 2018.&lt;/p&gt;&lt;p open=&quot;&quot; sans&quot;,=&quot;&quot; sans-serif;=&quot;&quot; letter-spacing:=&quot;&quot; normal;&quot;=&quot;&quot;&gt;&amp;lt;iframe frameborder=&quot;0&quot; src=&quot;//www.youtube.com/embed/-utVHe0-yLo&quot; width=&quot;640&quot; height=&quot;360&quot; class=&quot;note-video-clip&quot;&amp;gt;&amp;lt;/iframe&gt;&lt;/p&gt;&lt;p open=&quot;&quot; sans&quot;,=&quot;&quot; sans-serif;=&quot;&quot; letter-spacing:=&quot;&quot; normal;&quot;=&quot;&quot;&gt;Sementara di bidang infrastruktur, sesuai agenda dari Kementerian Pekerjaan Umum dan Perumahan Rakyat (PUPR), mayoritas dari 14 venue yang ada di kawasan GBK siap diserahterimakan dalam waktu tiga bulan lagi.&lt;/p&gt;&lt;p open=&quot;&quot; sans&quot;,=&quot;&quot; sans-serif;=&quot;&quot; letter-spacing:=&quot;&quot; normal;&quot;=&quot;&quot;&gt;“Sementara berkaitan dengan penyelenggaraan yang menjadi tanggung jawab kami di INASGOC, pekan lalu, saya sudah melaporkan secara langsung kepada Ketua Dewan Pengarah. Baik itu mengenai ketetapan 40 cabang yang akan dipertandingkan di Asian Games tahun depan, progress di bidang sponsorship, hingga negosiasi kesepakatan baru dalam host city contract (HCC) antara kita dengan OCA,” jelas Ketua Panitia Pelaksana Asian Games 2018 (INASGOC), Erick Thohir, Rabu.&lt;/p&gt;&lt;p open=&quot;&quot; sans&quot;,=&quot;&quot; sans-serif;=&quot;&quot; letter-spacing:=&quot;&quot; normal;&quot;=&quot;&quot;&gt;Menurut Erick, dalam pertemuan di Kantor Wapres, Medan Merdeka Utara, Kamis (28/9) itu, JK memahami dasar keputusan yang diambil OCA berkaitan dengan ketetapan 40 cabang di Asian Games 2018. Sedangkan mengenai kesepakatan baru dengan OCA dalam HCC, terutama percepatan dalam penggunaan dana dari sponsor , JK memberikan dukungannya.&lt;/p&gt;&lt;p open=&quot;&quot; sans&quot;,=&quot;&quot; sans-serif;=&quot;&quot; letter-spacing:=&quot;&quot; normal;&quot;=&quot;&quot;&gt;“Pada HCC yang lama, seluruh dana sponsor yang masuk ke OCA baru akan dicairkan setelah pembukaan Asian Games pada 18 Agustus 2018. Kini dengan kontrak baru HCC, dana dari sponsor Asian Games 2018 bisa langsung digunakan INASGOC, meskipun harus masuk ke Badan Layanan Umum (BLU). Sebagai satuan kerja, INASGOC tidak boleh menerima penerimaan, sementara kita perlu. Oleh karena itu, digunakan BLU,” lanjut Erick.&lt;/p&gt;', '&lt;p&gt;Two areas of Asian Games 2018 Jakarta-Palembang implementation, field of achievement and infrastructure will be the focus of working visit Chairman of the Asian Games 2018 Steering Committee, Jusuf Kalla, Tuesday (3/10/2017). During the four-hour scheduled visit, the Vice President of the Republic of Indonesia reviewed the badminton court in Cipayung, Pencak Silat at Pencak Silat, TMII, and archery at Senayan.&lt;/p&gt;&lt;p&gt;After closely watching the training of the national athletes, JK will also monitor the development of the arena of the game in the area of ​​Bung Karno (GBK), Senayan. In the sports complex built to host the 1962 Asian Games, JK will attend the GBK Main Stadium, Istora, archery field, hockey, baseball and three ABC training ground.&lt;/p&gt;&lt;p&gt;In relation to the current situation, the working visit is important to ensure that programs related to areas of achievement and infrastructure work well. As is known, in the field of achievement, Indonesia targets achievement of 20-22 gold medals in order to secure the top 10 Asia rankings in the Asian Games 2018.&lt;/p&gt;&lt;p&gt;&amp;lt;iframe frameborder=&quot;0&quot; src=&quot;//www.youtube.com/embed/-utVHe0-yLo&quot; width=&quot;640&quot; height=&quot;360&quot; class=&quot;note-video-clip&quot;&amp;gt;&amp;lt;/iframe&gt;&lt;/p&gt;&lt;p&gt;While in the infrastructure sector, according to the agenda of the Ministry of Public Works and People\'s Housing (PUPR), the majority of the 14 venues in the area of ​​GBK are ready to be handed over within three months.&lt;/p&gt;&lt;p&gt;&quot;While it is related to the organization under our responsibility at INASGOC, last week, I have reported directly to the Chairman of the Steering Committee. Whether it\'s about the 40 branches that will be competed in next year\'s Asian Games, sponsorship progress, to negotiating a new deal in host city contract (HCC) between us and OCA, &quot;said Erick Thohir, Chairman of the 2018 Asian Games Organizing Committee (INASGOC) , Wednesday.&lt;/p&gt;&lt;p&gt;According to Erick, at a meeting at the Vice President\'s Office, Medan Merdeka Utara, on Thursday (28/9), JK understood the basic decisions taken by OCA regarding the 40 branch offices in the 2018 Asian Games. As for the new agreement with OCA in HCC, the use of funds from sponsors, JK gave his support.&lt;/p&gt;&lt;p&gt;&quot;In the old HCC, all the sponsorship funds coming to the new OCA will be released after the opening of the Asian Games on August 18, 2018. Now with the new HCC contract, funds from the 2018 Asian Games sponsors can be directly used by INASGOC, BLU). As a unit of work, INASGOC should not accept acceptance, while we need to. Therefore, BLU is used, &quot;Erick continued.&lt;/p&gt;', '&lt;p&gt;雅加达2018年亚运会的两个领域实施，成就领域和基础设施将成为亚运会2018年指导委员会主席Jusuf Kalla周二（3/10/2017）工作访问的重点。在为期四小时的访问中，印度尼西亚共和国副总统审查了Cipayung的羽毛球场，Penicak Silat的Pencak Silat，TMII和Senayan的射箭场。&lt;/p&gt;&lt;p&gt;在密切关注国家运动员的训练之后，JK还将监测在Senayan的Bung Karno（GBK）比赛场地的发展。 JK参加1962年亚运会的体育场馆，JK将参加GBK主体育场，Istora，射箭场，曲棍球，棒球和三个ABC训练场。&lt;/p&gt;&lt;p&gt;就目前情况而言，工作访问对于确保与成就领域和基础设施有关的方案工作良好非常重要。众所周知，在成就领域，印度尼西亚的目标是取得20-22枚金牌，以确保2018年亚运会前十名的亚洲排名。&lt;/p&gt;&lt;p&gt;&amp;lt;iframe frameborder=&quot;0&quot; src=&quot;//www.youtube.com/embed/-utVHe0-yLo&quot; width=&quot;640&quot; height=&quot;360&quot; class=&quot;note-video-clip&quot;&amp;gt;&amp;lt;/iframe&gt;&lt;/p&gt;&lt;p&gt;而在基础设施领域，公共工程和公共住房（PUPR）部的议程，大多数在该地区的14个场馆GBK准备待三个月内移交。&lt;/p&gt;&lt;p&gt;“虽然上周在INASGOC负责我们的组织，但我直接向指导委员会主席汇报。无论是上提供40个分公司在亚运要争夺明年在赞助领域的进展，谈判在美国和亚奥理事会的主办城市合同（HCC）的新协议，“2018年亚运会组委会（INASGOC），埃里克·托尔的主席说星期三&lt;/p&gt;&lt;p&gt;据埃里克，在副总统，独立乌达拉，周四办公室（28/9），一个会议，JK了解相关规定亚奥理事会在亚运会40个分公司在2018年作为与OCA肝癌，特别是在加速新协议的基本决策赞助商的资金使用JK给了他的支持。&lt;/p&gt;&lt;p&gt;“在HCC长，是进入新OCA所有的赞助资金将在亚运会开幕后提出8月18日，2018年现在有了一个新的合同HCC，从赞助2018亚运会可以直接使用INASGOC，尽管有去公共服务机构的资金（ BLU）。作为一个工作单位，INASGOC不应该接受接受，而我们需要。所以使用BLU，“Erick继续说道。&lt;/p&gt;', 'about', '2017-11-21 05:50:14'),
(2, '&lt;p&gt;&lt;img src=&quot;http://localhost/asiangames2018/adminasg/../assets/news/ec5315d6e521f48950116438bf20b0d0.jpg&quot; &gt;&lt;/p&gt;&lt;p Open Sans&quot;, sans-serif; letter-spacing: normal;&quot;&gt;INASGOC atau Indonesia Asian Games 2018 Organizing Committee adalah komite resmi yang dibentuk oleh pemerintah Indonesia setelah ditunjuknya Indonesia sebagai tuan rumah Asian Games ke-18. Sesuai hasil rapat pada Olympic Council of Asia Meeting di Incheon, Korea Selatan tanggal 19 September 2014.&lt;/p&gt;&lt;p Open Sans&quot;, sans-serif; letter-spacing: normal;&quot;&gt;INASGOC bertanggung jawab sebagai panitia pelaksana yang akan menyusun rencana, menyiapkan dan menyelenggarakan Asian Games 2018. Penyelenggaraan acara tersebut akan berlangsung di Provinsi Daerah Khusus Ibukota Jakarta, Provinsi Sumatera Selatan, Provinsi Jawa Barat, dan Provinsi Banten pada tahun 2018. Panitia Nasional INASGOC bertanggung jawab langsung kepada Presiden Republik Indonesia.&lt;/p&gt;&lt;p Open Sans&quot;, sans-serif; letter-spacing: normal;&quot;&gt;Sejak tahun 2016 INASGOC berfokus untuk merampungkan revitalisasi berbagai lokasi pertandingan yang akan diadakan di 4 Provinsi tersebut di atas. INASGOC juga mulai merekrut sekitar 15.000 relawan untuk membantu pre-event dan main event Asian Games 2018 mendatang.&lt;/p&gt;', '&lt;p&gt;&lt;img src=&quot;http://localhost/asiangames2018/adminasg/../assets/news/c27b448f7e39f8a0c3fdfea6c86afe35.jpg&quot; &gt;&lt;/p&gt;&lt;p&gt;INASGOC or Indonesia Asian Games 2018 Organizing Committee is an official committee established by the Indonesian government after the appointment of Indonesia as host of the 18th Asian Games. According to the results of the meeting at the Olympic Council of Asia Meeting in Incheon, South Korea on 19 September 2014.&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;INASGOC is responsible as an organizing committee that will plan, prepare and organize the Asian Games 2018. The event will take place in the Provinces of the Special Capital Region of Jakarta, South Sumatera Province, West Java Province and Banten Province in 2018. INASGOC National Committee is responsible directly to the President of the Republic of Indonesia.&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;Since 2016 INASGOC has focused on finalizing the revitalization of various match locations to be held in the above 4 Provinces. INASGOC also began recruiting around 15,000 volunteers to help pre-event and play the upcoming 2018 Asian Games.&lt;/p&gt;', '&lt;p&gt;&lt;img src=&quot;http://localhost/asiangames2018/adminasg/../assets/news/668d8f42f9442561fabbf9eb41ed07ab.jpg&quot; &gt;&lt;/p&gt;&lt;p&gt;INASGOC或印度尼西亚亚运会2018年组委会是印度尼西亚政府在任命第十八届亚运会之后成立的一个正式委员会。 根据2014年9月19日在韩国仁川举行的亚奥理事会会议的结果。&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;INASGOC负责组织委员会，计划，筹备和组织2018年亚洲运动会。该活动将于2018年在雅加达，南苏门答腊省，西爪哇省和万丹省的特别首都地区举行。INASGOC国家委员会负责 直接给印度尼西亚共和国总统。&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;自2016年以来，INASGOC一直致力于完成上述4个省份举办的各种游戏活动。 INASGOC也开始招募大约15,000名志愿者，帮助赛前参加2018亚运会。&lt;/p&gt;', 'inasgoc', '2017-11-21 06:14:44'),
(3, '&lt;p&gt;Jiwa dari &quot;&lt;em&gt;Energy of Asia&quot;&lt;/em&gt;&amp;nbsp;terbentang pada keberagaman budaya, bahasa dan peninggalan sejarah. Saat semua elemen ini bersatu, ini akan menjadi kekuatan utama yang diperhitungkan dunia.&lt;/p&gt;\n&lt;p&gt;Hal ini juga terdapat pada nilai yang dipegang teguh Indonesia, rumah bagi ratusan etnis dengan begitu banyak bahasa yang berbeda. Para Bapak Pendiri kita telah membayangkan sebuah bangsa yang kuat dan bersatu di bawah filosofi Bhinneka Tunggal Ika.&lt;/p&gt;\n&lt;p&gt;Dengan nilai keberagaman dan kesatuan itulah kami memperkenalkan 3 maskot dengan energi berbeda, merepresentasikan energi yang terdapat pada Asian Games.&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&lt;img style=&quot;display: block; margin-left: auto; margin-right: auto;&quot; src=&quot;/asiangames2018/assets/news/64a461a7fd7557757d9e0210b8a3525d.png&quot; alt=&quot;&quot; width=&quot;300&quot; height=&quot;288&quot; /&gt;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&lt;strong&gt;BHIN BHIN&lt;/strong&gt;&lt;/p&gt;\n&lt;p&gt;&lt;strong&gt;Bhin Bhin&lt;/strong&gt; adalah seekor burung Cendrawasih (&lt;em&gt;Paradisaea Apoda&lt;/em&gt;) yang merepresentasikan strategi. Bhin Bhin mengenakan rompi dengan motif Asmat dari Papua.&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&lt;img style=&quot;display: block; margin-left: auto; margin-right: auto;&quot; src=&quot;/asiangames2018/assets/news/91b4c811918617545b63b37a357ea073.png&quot; width=&quot;300&quot; height=&quot;455&quot; /&gt;&lt;/p&gt;\n&lt;p&gt;&lt;strong&gt;ATUNG&lt;/strong&gt;&lt;/p&gt;\n&lt;p&gt;&lt;strong&gt;Atung&amp;nbsp;&lt;/strong&gt;adalah seekor rusa Bawean (&lt;em&gt;Hyelaphus Kuhlii&lt;/em&gt;) yang merepresentasikan kecepatan. Atung mengenakan sarung dengan motif tumpal dari Jakarta.&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&lt;img style=&quot;display: block; margin-left: auto; margin-right: auto;&quot; src=&quot;/asiangames2018/assets/news/3380384f4e5bb455a5a5130a3743a46e.png&quot; alt=&quot;&quot; width=&quot;300&quot; height=&quot;370&quot; /&gt;&lt;/p&gt;\n&lt;p&gt;&lt;strong&gt;KAKA&lt;/strong&gt;&lt;/p&gt;\n&lt;p&gt;&lt;strong&gt;Kaka&amp;nbsp;&lt;/strong&gt;adalah seekor badak bercula satu (&lt;em&gt;Rhinoceros Sondaicus&lt;/em&gt;) yang merepresentasikan kekuatan. Kaka mengenakan pakaian tradisional dengan motif bunga khas Palembang.&lt;/p&gt;', '&lt;p&gt;The Energy of Asia lies in the diversity of it&amp;rsquo;s culture, heritage, and legacy. When all these elements come together, they will be a major force to reckon in the world.&lt;/p&gt;\n&lt;p&gt;The same principle applies to Indonesia, home to hundreds of ethnic groups speaking many different languages. Our Founding Fathers had envisioned a strong and united nation under the Bhinneka Tunggal Ika philosophy. That is why we decide to propose three different animals as the official game&amp;rsquo;s mascot.&lt;/p&gt;\n&lt;p&gt;Also in correlation to Asian Games, each of these animals represents an aspect of the sport competition such as strategy, speed and power.&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&lt;img style=&quot;display: block; margin-left: auto; margin-right: auto;&quot; src=&quot;/asiangames2018/assets/news/64a461a7fd7557757d9e0210b8a3525d.png&quot; alt=&quot;&quot; width=&quot;300&quot; height=&quot;288&quot; /&gt;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&lt;strong&gt;BHIN BHIN&lt;/strong&gt;&lt;/p&gt;\n&lt;p&gt;&lt;strong&gt;Bhin Bhin&lt;/strong&gt; is a bird of paradise (&lt;em&gt;Paradisaea Apoda&lt;/em&gt;) that represent strategy.&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&lt;img style=&quot;display: block; margin-left: auto; margin-right: auto;&quot; src=&quot;/asiangames2018/assets/news/91b4c811918617545b63b37a357ea073.png&quot; width=&quot;300&quot; height=&quot;455&quot; /&gt;&lt;/p&gt;\n&lt;p&gt;&lt;strong&gt;ATUNG&lt;/strong&gt;&lt;/p&gt;\n&lt;p&gt;&lt;strong&gt;Atung&amp;nbsp;&lt;/strong&gt;is a Bawean deer (&lt;em&gt;Hyelaphus Kuhlii&lt;/em&gt;) that represents speed.&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&lt;img style=&quot;display: block; margin-left: auto; margin-right: auto;&quot; src=&quot;/asiangames2018/assets/news/3380384f4e5bb455a5a5130a3743a46e.png&quot; alt=&quot;&quot; width=&quot;300&quot; height=&quot;370&quot; /&gt;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&lt;strong&gt;KAKA&lt;/strong&gt;&lt;/p&gt;\n&lt;p&gt;&lt;strong&gt;Kaka&amp;nbsp;&lt;/strong&gt;is a single-horned rhinoceros (&lt;em&gt;Rhinoceros Sondaicus&lt;/em&gt;) that represents strength.&lt;/p&gt;', '&lt;p&gt;&amp;ldquo;亚洲精力&amp;ldquo;的灵魂躺在文化，语言，历史文物的多样性。当这些元素团结后，这将成为世界考虑之内的主力。&lt;/p&gt;\n&lt;p&gt;这也含有在印尼坚定值，成为一个家为了数百个民族跟各种各样的语言。我们的创始父亲已相像一个在Bhinneka Tunggal Ika的哲学下一个强大而团结的国家。&lt;/p&gt;\n&lt;p&gt;与这些多样性和统一性的价值，我们要介绍3吉祥物拥有不同的力量。代表了亚洲运动会的精力。&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&lt;img style=&quot;display: block; margin-left: auto; margin-right: auto;&quot; src=&quot;/asiangames2018/assets/news/64a461a7fd7557757d9e0210b8a3525d.png&quot; alt=&quot;&quot; width=&quot;300&quot; height=&quot;288&quot; /&gt;&lt;/p&gt;\n&lt;p&gt;&lt;strong&gt;BHIN BHIN&lt;/strong&gt;&lt;/p&gt;\n&lt;p&gt;&lt;strong&gt;Bhin Bhin&amp;nbsp;&lt;/strong&gt;是一只天堂鸟(&lt;em&gt;Paradisaea Apoda&lt;/em&gt;). 它代表了战略。Bhin Bhin身穿带有巴布亚Asmat图案的背心。&lt;/p&gt;\n&lt;p&gt;&lt;img style=&quot;display: block; margin-left: auto; margin-right: auto;&quot; src=&quot;/asiangames2018/assets/news/91b4c811918617545b63b37a357ea073.png&quot; width=&quot;300&quot; height=&quot;455&quot; /&gt;&lt;/p&gt;\n&lt;p&gt;&lt;strong&gt;ATUNG&lt;/strong&gt;&lt;/p&gt;\n&lt;p&gt;&lt;strong&gt;Atung&amp;nbsp;&lt;/strong&gt;是一只巴岛花鹿(&lt;em&gt;Hyelaphus Kuhlii&lt;/em&gt;), 它代表了速度。 Atung身穿雅加达的tumpal图案的shalong。&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&lt;img style=&quot;display: block; margin-left: auto; margin-right: auto;&quot; src=&quot;/asiangames2018/assets/news/3380384f4e5bb455a5a5130a3743a46e.png&quot; alt=&quot;&quot; width=&quot;300&quot; height=&quot;370&quot; /&gt;&lt;/p&gt;\n&lt;p&gt;&lt;strong&gt;KAKA&lt;/strong&gt;&lt;/p&gt;\n&lt;p&gt;&lt;strong&gt;Kaka&amp;nbsp;&lt;/strong&gt;是一只单角犀牛(&lt;em&gt;Rhinoceros Sondaicus&lt;/em&gt;), 它代表实力。 Kaka 身穿传统服装与花卉典型的巨港模式。&lt;/p&gt;', 'mascot', '2017-11-21 06:14:44');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contactus`
--

CREATE TABLE `tbl_contactus` (
  `id` int(5) NOT NULL,
  `name` varchar(15) NOT NULL,
  `fname` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `ipaddres` varchar(40) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_contactus`
--

INSERT INTO `tbl_contactus` (`id`, `name`, `fname`, `email`, `phone`, `message`, `ipaddres`, `user_agent`, `created`) VALUES
(1, 'dedi', 'Rome', 'Dedi@gmail.com', '1234567890', 'Hello Kita Jumpa Lagi Yah', '0', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.11; rv:55.0) Gecko/20100101 Firefox/55.0', '2017-10-17 20:47:45'),
(2, 'dedi', 'Dedi', 'Dedirome@gmail.com', '123456789', 'Hello World', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.11; rv:55.0) Gecko/20100101 Firefox/55.0', '2018-01-17 13:14:24');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_log`
--

CREATE TABLE `tbl_log` (
  `id` int(100) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `userid` int(20) DEFAULT NULL,
  `activity_type` varchar(30) DEFAULT NULL,
  `account_type` varchar(10) DEFAULT NULL,
  `level` varchar(15) DEFAULT NULL,
  `status` varchar(7) DEFAULT NULL,
  `message` text,
  `url` varchar(100) DEFAULT NULL,
  `ip_address` varchar(32) DEFAULT NULL,
  `user_agent` text,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member`
--

CREATE TABLE `tbl_member` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `name` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `first_name` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(32) CHARACTER SET latin1 DEFAULT NULL,
  `screen_name` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `provider` varchar(16) CHARACTER SET latin1 DEFAULT NULL,
  `provider_uid` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `gender` enum('MALE','FEMALE') CHARACTER SET latin1 DEFAULT 'MALE',
  `city` varchar(150) COLLATE latin1_general_ci DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `profile_url` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `profile_image_url` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `email` varchar(64) CHARACTER SET latin1 DEFAULT NULL,
  `phone` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `ip_address` varchar(30) COLLATE latin1_general_ci DEFAULT NULL,
  `user_agent` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `create_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menuwebsite`
--

CREATE TABLE `tbl_menuwebsite` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `title` varchar(50) NOT NULL,
  `title_english` varchar(50) DEFAULT NULL,
  `slug` varchar(100) NOT NULL,
  `slug_english` varchar(100) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `url_english` varchar(255) DEFAULT NULL,
  `icon` varchar(25) DEFAULT NULL,
  `dropdown` varchar(10) NOT NULL,
  `sort` int(5) NOT NULL,
  `app` varchar(10) NOT NULL DEFAULT 'frontend',
  `place_on` varchar(7) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_menuwebsite`
--

INSERT INTO `tbl_menuwebsite` (`id`, `parent_id`, `title`, `title_english`, `slug`, `slug_english`, `url`, `url_english`, `icon`, `dropdown`, `sort`, `app`, `place_on`, `is_active`, `created`) VALUES
(1, 0, 'Dashboard', NULL, 'dashboard', NULL, 'dashboard', NULL, 'pg-home', '', 0, 'back-end', NULL, 1, '2015-03-02 00:16:34'),
(5, 0, 'User', NULL, 'user', NULL, 'user', NULL, 'pg-layouts3', 'open', 0, 'back-end', NULL, 1, '2015-03-02 00:53:46'),
(6, 5, 'List User', NULL, 'List User', NULL, 'list-user', NULL, 'pg-arrow_right', '', 0, 'back-end', NULL, 1, '2015-03-02 00:55:04'),
(7, 5, 'Add User', NULL, 'add', NULL, 'add-user', NULL, 'pg-arrow_right', '', 0, 'back-end', NULL, 1, '2015-03-02 00:56:41'),
(8, 5, 'Roles User', NULL, 'roles', NULL, 'roles', NULL, 'pg-arrow_right', '', 0, 'back-end', NULL, 1, '2015-03-02 01:02:08'),
(27, 0, 'Navigation', NULL, 'navigation', NULL, 'navigation', NULL, 'pg-settings', 'open', 0, 'back-end', NULL, 1, '2015-06-04 05:15:34'),
(28, 27, 'Back End', NULL, 'back-end', NULL, 'back-end', NULL, 'pg-arrow_right', '', 0, 'back-end', NULL, 1, '2015-06-04 05:17:12'),
(39, 38, 'list Members', NULL, 'listmembers', NULL, 'listmembers', NULL, 'pg-arrow_right', '', 0, 'back-end', NULL, 1, '2017-01-20 00:34:04'),
(58, 0, 'Contact Us', NULL, 'contactus', NULL, 'contactus', '', 'pg-layouts3', 'open', 0, 'back-end', NULL, 1, '2015-05-16 14:24:27'),
(59, 58, 'List Contact Us', NULL, 'listcontactus', '', 'listcontactus', NULL, 'pg-arrow_right', '', 0, 'back-end', NULL, 1, '2015-05-16 14:29:45');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rolespermission`
--

CREATE TABLE `tbl_rolespermission` (
  `id` int(10) NOT NULL,
  `roles` varchar(10) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_rolespermission`
--

INSERT INTO `tbl_rolespermission` (`id`, `roles`, `menu_id`, `created`) VALUES
(1, 'User', 1, '2017-10-30 08:49:55'),
(2, 'User', 23, '2017-10-30 08:49:55'),
(3, 'User', 24, '2017-10-30 08:49:55'),
(4, 'User', 37, '2017-10-30 08:49:55'),
(5, 'User', 38, '2017-10-30 08:49:55'),
(6, 'User', 39, '2017-10-30 08:49:55'),
(7, 'User', 58, '2017-10-31 06:45:00'),
(8, 'User', 59, '2017-10-31 06:45:00'),
(9, 'User', 60, '2017-10-31 06:45:00'),
(10, 'User', 61, '2017-10-31 06:45:00'),
(11, 'User', 62, '2017-10-31 06:45:00'),
(12, 'User', 63, '2017-11-06 06:31:49'),
(13, 'User', 64, '2017-11-06 06:31:49'),
(14, 'User', 65, '2017-11-06 06:31:49'),
(15, 'User', 66, '2017-11-06 06:31:49'),
(16, 'User', 67, '2017-11-06 06:31:49'),
(17, 'User', 68, '2017-11-07 19:21:17'),
(18, 'User', 69, '2017-11-07 19:21:17'),
(19, 'User', 70, '2017-11-07 19:21:17'),
(20, 'User', 71, '2017-11-07 19:21:17');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `password` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `nama_lengkap` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `email` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `no_telp` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `foto` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `level` varchar(20) COLLATE latin1_general_ci DEFAULT 'user',
  `blokir` enum('Y','N') COLLATE latin1_general_ci DEFAULT 'N',
  `user_type_id` int(11) DEFAULT NULL,
  `id_session` varchar(100) COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id_user`, `username`, `password`, `nama_lengkap`, `email`, `no_telp`, `foto`, `level`, `blokir`, `user_type_id`, `id_session`) VALUES
(16, 'dedirome', '873d8e0847d7ff67dc6a3c4684cb8f07', 'Dedi Rome', '', '1234567890', '', 'admin', 'N', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_usertype`
--

CREATE TABLE `tbl_usertype` (
  `type_id` int(5) NOT NULL,
  `type_name` varchar(20) NOT NULL,
  `type_slug` varchar(30) NOT NULL,
  `type_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_usertype`
--

INSERT INTO `tbl_usertype` (`type_id`, `type_name`, `type_slug`, `type_date`) VALUES
(1, 'Admin', 'admin', '2014-02-06 09:10:37'),
(2, 'User', 'user', '2015-02-22 02:19:41'),
(3, 'Client', 'client', '2015-02-22 02:19:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions_adm`
--
ALTER TABLE `ci_sessions_adm`
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `ci_sessions_front`
--
ALTER TABLE `ci_sessions_front`
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `tbl_about`
--
ALTER TABLE `tbl_about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_contactus`
--
ALTER TABLE `tbl_contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_log`
--
ALTER TABLE `tbl_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_member`
--
ALTER TABLE `tbl_member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_menuwebsite`
--
ALTER TABLE `tbl_menuwebsite`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_rolespermission`
--
ALTER TABLE `tbl_rolespermission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_about`
--
ALTER TABLE `tbl_about`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_contactus`
--
ALTER TABLE `tbl_contactus`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_log`
--
ALTER TABLE `tbl_log`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_member`
--
ALTER TABLE `tbl_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_menuwebsite`
--
ALTER TABLE `tbl_menuwebsite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT for table `tbl_rolespermission`
--
ALTER TABLE `tbl_rolespermission`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;