-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2018 at 02:27 PM
-- Server version: 5.7.9
-- PHP Version: 7.0.0

--
-- Database: `cakesilvercms`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8_general_mysql500_ci NOT NULL,
  `slug` text COLLATE utf8_general_mysql500_ci,
  `excerpt` text COLLATE utf8_general_mysql500_ci,
  `content` longtext COLLATE utf8_general_mysql500_ci NOT NULL,
  `url` text COLLATE utf8_general_mysql500_ci,
  `is_home` tinyint(1) NOT NULL DEFAULT '0',
  `sort_order` int(11) DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `modified_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `slug`, `excerpt`, `content`, `url`, `is_home`, `sort_order`, `status`, `created_at`, `modified_at`) VALUES
(1, 'What is Lorem Ipsum?', NULL, NULL, '<div style="margin: 0px 14.3906px 0px 28.7969px; padding: 0px; width: 436.797px; float: left;"><h2 style="text-align: center; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; line-height: 24px;"><span style="color: rgb(255, 0, 0);">What is Lorem Ipsum?</span></h2><p style="text-align: center; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px;"><span style="color: rgb(0, 255, 0);">Lorem Ipsum</span>&nbsp;i<span style="color: rgb(153, 0, 0);">s simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p></div><div style="margin: 0px 28.7969px 0px 14.3906px; padding: 0px; width: 436.797px; float: right;"><h2 style="text-align: center; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; line-height: 24px;"><span style="color: rgb(255, 0, 0);">Why do we use it?</span></h2><p style="text-align: center; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px;"><span style="color: rgb(204, 0, 0);">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of <span style="background-color: rgb(255, 255, 255);">using Lorem Ipsum</span> is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</span></p><div style="text-align: center;"><br></div></div>', 'what-is-lorem-ipsum', 0, 0, 1, '2018-02-20 02:24:00', '2018-06-08 08:32:12'),
(3, 'Why do we use it?', NULL, NULL, '<blockquote><span style="color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</span></blockquote>', 'why-do-we-use-it', 0, 0, 1, '2018-02-21 00:43:06', '2018-06-06 23:24:14'),
(4, 'Where does it come from?', NULL, NULL, '<p style="margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p><p style="margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;">The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', 'where-does-it-come-from', 0, 0, 1, '2018-02-22 08:48:58', NULL),
(5, 'J Ajay', NULL, NULL, '<p class="title" style="line-height: 20px; color: rgb(44, 119, 161); font-size: 15px; text-align: justify; font-family: Verdana, Geneva, sans-serif;"><i>A target-oriented dynamic professional specialized in converting end user requirements into real time applications by providing them cost effective and timely solution. Worked on very high pressured environment and making best use of available resources. Good technical knowledge which I use to help my colleagues. Believe in growing as a team rather then an individual.</i></p><p style="line-height: 20px; color: rgb(102, 102, 102); font-family: Verdana, Geneva, sans-serif; font-size: 12px;">My Objective is to pursue a challenging work in Software industry as Team / Tech Lead where I can contribute my technical and soft skills towards the prosperity of the company.</p>', 'a-target-oriented', 1, 0, 1, '2018-02-22 08:55:19', '2018-06-06 23:27:19'),
(6, 'Test Menu', NULL, NULL, 'This test menu', 'test-article', 0, 0, 1, '2018-03-27 01:02:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `article_translations`
--

DROP TABLE IF EXISTS `article_translations`;
CREATE TABLE IF NOT EXISTS `article_translations` (
  `article_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `culture` varchar(10) COLLATE utf8_general_mysql500_ci NOT NULL,
  `title` text COLLATE utf8_general_mysql500_ci,
  `slug` text COLLATE utf8_general_mysql500_ci,
  `excerpt` text COLLATE utf8_general_mysql500_ci,
  `content` longtext COLLATE utf8_general_mysql500_ci,
  `url` text COLLATE utf8_general_mysql500_ci,
  PRIMARY KEY (`article_id`,`language_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Dumping data for table `article_translations`
--

INSERT INTO `article_translations` (`article_id`, `language_id`, `culture`, `title`, `slug`, `excerpt`, `content`, `url`) VALUES
(1, 3, 'ur', 'Lorem Ipsum کیا ہے؟', NULL, NULL, '<div>Lorem Ipsum کیا ہے؟</div><div>Lorem Ipsum صرف پرنٹنگ اور اقسام کی صنعت کی ڈمی متن ہے. Lorem Ipsum 1500 کی دہائی سے پہلے معیاری معیاری ڈمی متن رہا ہے، جب نامعلوم نامعلوم پرنٹر نے قسم کی ایک گلی لیا اور اسے نمونہ نمونہ کتاب بنانے کے لئے تیار کیا. یہ صرف پانچ صدیوں سے نہیں بچا ہے،</div><div>بلکہ الیکٹرانک اقسام کی ترتیب میں چھلانگ بھی باقی ہے. یہ 1960 ء میں مقبولیت کے لۓ لاٹریس شیٹس کی رہائی کے ساتھ مقبول ہوا تھا، اور حال ہی میں ڈیسک ٹاپ پبلشنگ سوفٹ ویئر جیسے آرڈس پیجمیکر کے ساتھ، Lorem Ipsum کے ورژن شامل ہیں.</div><div><br></div><div>ہم اسے کیوں استعمال کرتے ہیں؟</div><div>یہ ایک طویل قائم حقیقت یہ ہے کہ اس کے لے آؤٹ کو دیکھتے ہوئے ایک ریڈر کسی صفحے کے قابل قابل مواد سے مشغول ہوجائے گا. Lorem Ipsum کا استعمال کرتے ہوئے نقطۂٔٔٔٔٔٔٔٔٔٔٔٔٔٔٔ یہ ہے کہ یہ خطوط کی زیادہ سے زیادہ یا کم عام تقسیم ہے، جیسا کہ ''مواد یہاں، مواد یہاں'' استعمال کرنے کے مخالف ہے، اسے پڑھنے قابل انگریزی کی طرح نظر آتا ہے.</div><div>بہت سے ڈیسک ٹاپ پبلشنگ پیکجوں اور ویب پیج ایڈیٹرز اب Lorem Ipsum کا استعمال کرتے ہوئے اپنے ڈیفالٹ ماڈل متن کے طور پر استعمال کرتے ہیں، اور ''lorem ipsum'' کے لئے تلاش بہت سارے ویب سائٹس کو ان کی انفیکشن میں بے نقاب کرے گا. مختلف ورژنوں میں، کبھی کبھی حادثے کی طرف سے، کبھی کبھی مقصد (انجکشن مزاحیہ اور پسند) پر سالوں میں تیار ہوا ہے.</div><div><br></div>', 'Lorem Ipsum کیا ہے؟'),
(1, 2, 'hi', 'Lorem Ipsum क्या है?', NULL, NULL, '<div>Lorem Ipsum क्या है?</div><div>Lorem Ipsum प्रिंटिंग और टाइपसेटिंग उद्योग के बस डमी पाठ है। Lorem Ipsum 1500 के दशक के बाद से उद्योग के मानक डमी पाठ रहा है, जब एक अज्ञात प्रिंटर ने एक प्रकार की गैली ली और इसे एक प्रकार की नमूना किताब बनाने के लिए स्कैम्बल किया। यह न केवल पांच शताब्दियों तक जिया,</div><div>लेकिन इलेक्ट्रॉनिक टाइपसेटिंग में भी छलांग, अनिवार्य रूप से अपरिवर्तित बनी हुई है। इसे 1 9 60 के दशक में लोरमेट इप्सम मार्गों वाले लेट्रसेट शीट्स के रिलीज के साथ लोकप्रिय किया गया था, और हाल ही में डेस्कटॉप प्रकाशन सॉफ्टवेयर जैसे एल्डस पेजमेकर के साथ लॉरम इप्सम के संस्करण भी शामिल थे।</div><div><br></div><div>हम इसका उपयोग क्यों करते हैं?</div><div>यह एक लंबे समय से स्थापित तथ्य है कि एक पाठक अपने लेआउट को देखते समय किसी पृष्ठ की पठनीय सामग्री से विचलित हो जाएगा। लोरम इप्सम का उपयोग करने का मुद्दा यह है कि इसमें ''सामग्री यहां, यहां सामग्री'' का उपयोग करने के विरोध में अक्षरों का कम से कम सामान्य वितरण होता है, जो इसे पठनीय अंग्रेजी जैसा दिखता है।</div><div>कई डेस्कटॉप प्रकाशन पैकेज और वेब पेज संपादक अब लॉरेम इप्सम का उपयोग अपने डिफ़ॉल्ट मॉडल टेक्स्ट के रूप में करते हैं, और ''लोरेम इप्सम'' की खोज से कई वेब साइटें अभी भी अपने बचपन में उजागर हो जाएंगी। कई संस्करण वर्षों से विकसित हुए हैं, कभी-कभी दुर्घटना से, कभी-कभी उद्देश्य (इंजेक्शन हास्य और इसी तरह) पर।</div><div><br></div>', 'Lorem Ipsum क्या है'),
(5, 2, 'hi', 'जे अजय', NULL, NULL, '<div class="title" style="line-height: 20px; color: rgb(44, 119, 161); font-size: 15px; text-align: justify; font-family: Verdana, Geneva, sans-serif;">एक लक्षित उन्मुख गतिशील पेशेवर, अंतिम उपयोगकर्ता आवश्यकताओं को वास्तविक समय के अनुप्रयोगों में लागत प्रभावी और समय पर समाधान प्रदान करके विशेष रूप से परिवर्तित करने में विशिष्ट है। बहुत अधिक दबाव वाले वातावरण पर काम किया और उपलब्ध संसाधनों का सबसे अच्छा उपयोग किया। अच्छा तकनीकी ज्ञान जो मैं अपने सहयोगियों की मदद के लिए उपयोग करता हूं।</div><div class="title" style="line-height: 20px; color: rgb(44, 119, 161); font-size: 15px; text-align: justify; font-family: Verdana, Geneva, sans-serif;">एक टीम के रूप में एक व्यक्ति के रूप में बढ़ने पर विश्वास करें।</div><div><br></div><div>मेरा उद्देश्य सॉफ्टवेयर उद्योग में टीम / टेक लीड के रूप में चुनौतीपूर्ण काम करना है जहां मैं कंपनी की समृद्धि की दिशा में अपने तकनीकी और सॉफ्ट कौशल का योगदान कर सकता हूं।</div><div><br></div>', 'जे अजय'),
(5, 3, 'ur', '(جے اجے)', NULL, NULL, '<div class="title" style="line-height: 20px; color: rgb(44, 119, 161); font-size: 15px; text-align: justify; font-family: Verdana, Geneva, sans-serif;">لاگت مؤثر اور بروقت حل فراہم کر کے حقیقی وقت کی ایپلی کیشنز میں اختتامی صارف کی ضروریات کو تبدیل کرنے میں ایک ھدف پر مبنی متحرک پیشہ ورانہ مہارت. بہت زیادہ پریس ماحول پر کام کیا اور دستیاب وسائل کا بہترین استعمال کرنا. اچھا تکنیکی علم جسے میں اپنے ساتھیوں کی مدد کرنے کے لئے استعمال کرتا ہوں.</div><div class="title" style="line-height: 20px; color: rgb(44, 119, 161); font-size: 15px; text-align: justify; font-family: Verdana, Geneva, sans-serif;">ایک ٹیم کے طور پر بڑھ کر ایک فرد کے طور پر بڑھتی ہوئی پر یقین رکھو.</div><div><br></div><div>میرا مقصد سافٹ ویئر انڈسٹری میں ٹیم / ٹیک لیڈ کے طور پر ایک مشکل کام کا پیچھا کرنا ہے جہاں میں کمپنی کی خوشحالی کی طرف سے اپنی تکنیکی اور نرم مہارتوں میں شراکت کر سکتا ہوں.</div><div><br></div>', '(جے اجے)'),
(3, 2, 'hi', '', NULL, NULL, '', ''),
(3, 3, 'ur', '', NULL, NULL, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

DROP TABLE IF EXISTS `languages`;
CREATE TABLE IF NOT EXISTS `languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_general_mysql500_ci NOT NULL,
  `culture` varchar(10) COLLATE utf8_general_mysql500_ci NOT NULL,
  `direction` enum('ltr','rtl') COLLATE utf8_general_mysql500_ci NOT NULL DEFAULT 'ltr',
  `is_default` tinyint(1) NOT NULL DEFAULT '0',
  `is_system` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `modified_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `culture` (`culture`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `culture`, `direction`, `is_default`, `is_system`, `status`, `created_at`, `modified_at`) VALUES
(1, 'English', 'en', 'ltr', 0, 1, 1, '2018-06-05 06:23:38', '2018-06-11 00:03:23'),
(2, 'Hindi/हिंदी', 'hi', 'ltr', 1, 0, 1, '2018-06-05 06:24:05', '2018-06-11 00:12:25'),
(3, 'Urdu/اردو', 'ur', 'rtl', 0, 0, 1, '2018-06-05 08:34:40', '2018-06-11 00:10:59');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_region_id` int(11) NOT NULL,
  `menu_title` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
  `menu_type` enum('custom','object','module') COLLATE utf8_general_mysql500_ci NOT NULL DEFAULT 'custom',
  `custom_link` text COLLATE utf8_general_mysql500_ci,
  `object_type` varchar(30) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `object_id` bigint(20) NOT NULL DEFAULT '0',
  `module_id` int(11) NOT NULL DEFAULT '0',
  `redirection` enum('self','new-window') COLLATE utf8_general_mysql500_ci NOT NULL DEFAULT 'self',
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `menu_region_id` (`menu_region_id`),
  KEY `menu_type` (`menu_type`),
  KEY `object_type` (`object_type`),
  KEY `object_id` (`object_id`),
  KEY `module_id` (`module_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `menu_region_id`, `menu_title`, `menu_type`, `custom_link`, `object_type`, `object_id`, `module_id`, `redirection`, `sort_order`, `status`) VALUES
(1, 1, 'What is Lorem Ipsum?', 'object', NULL, 'article', 1, 0, 'self', 0, 1),
(2, 2, 'Why do we use it?', 'object', NULL, 'article', 3, 0, 'self', 0, 1),
(3, 3, 'Where does it come from?', 'object', NULL, 'article', 4, 0, 'self', 0, 1),
(4, 3, 'Test Ajay', 'custom', 'http://ajayjagad.com', '', 0, 0, 'new-window', 0, 1),
(9, 1, 'J Ajay', 'object', NULL, 'article', 5, 0, 'self', 0, 1),
(6, 2, 'Test Menu', 'object', NULL, 'article', 3, 0, 'self', 0, 1),
(8, 1, 'Test', 'object', NULL, 'article', 6, 0, 'self', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu_regions`
--

DROP TABLE IF EXISTS `menu_regions`;
CREATE TABLE IF NOT EXISTS `menu_regions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `region` varchar(35) COLLATE utf8_general_mysql500_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8_general_mysql500_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Dumping data for table `menu_regions`
--

INSERT INTO `menu_regions` (`id`, `region`, `slug`, `status`) VALUES
(1, 'Top Menu', 'top-menu', 1),
(2, 'Sidebar Menu', 'sidebar-menu', 1),
(3, 'Footer menu', 'footer-menu', 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu_translations`
--

DROP TABLE IF EXISTS `menu_translations`;
CREATE TABLE IF NOT EXISTS `menu_translations` (
  `menu_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `culture` varchar(10) COLLATE utf8_general_mysql500_ci NOT NULL,
  `menu_title` varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  PRIMARY KEY (`menu_id`,`language_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Dumping data for table `menu_translations`
--

INSERT INTO `menu_translations` (`menu_id`, `language_id`, `culture`, `menu_title`) VALUES
(8, 2, 'hi', 'परीक्षा'),
(8, 3, 'ur', ''),
(1, 2, 'hi', 'Lorem Ipsum क्या है'),
(1, 3, 'ur', 'ٹیسٹ'),
(9, 2, 'hi', 'जे अजय'),
(9, 3, 'ur', 'جے اجے');
