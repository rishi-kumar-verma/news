-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 12, 2022 at 10:29 AM
-- Server version: 5.7.34
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE `albums` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lang_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `album_categories`
--

CREATE TABLE `album_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lang_id` bigint(20) UNSIGNED NOT NULL,
  `album_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `analytics`
--

CREATE TABLE `analytics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uri` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `session` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `article_post`
--

CREATE TABLE `article_post` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `article_content` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `article_post`
--

INSERT INTO `article_post` (`id`, `post_id`, `article_content`, `created_at`, `updated_at`) VALUES
(1, 1, '\n<p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary.</p>\n<p><img class=\"images\" src=\"http://localhost/front_web/images/default.jpg\" width=\"380\" height=\"253\" /></p>\n<p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary.</p>', '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(2, 2, '\n<p><img class=\"images\" src=\"http://localhost/front_web/images/default.jpg\" width=\"423\" height=\"282\" /></p>\n<p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary.</p>\n<p><img class=\"images\" src=\"http://localhost/assets/image/post-image/post-19.jpg\" width=\"380\" height=\"253\" /></p>', '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(3, 3, '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable.&nbsp;</p>\n<p><img class=\"images\" src=\"http://localhost/front_web/images/default.jpg\" width=\"423\" height=\"282\" /></p>\n<p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary.</p>\n<p><img class=\"images\" src=\"http://localhost/front_web/images/default.jpg\" width=\"380\" height=\"253\" /></p>\n<p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of</p>', '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(4, 4, '<p>How all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself</p>.\n\n<p>Because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?</p>\n\n<p>When our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds.</p>', '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(5, 5, '<p>How all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself</p>.', '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(6, 6, '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable.&nbsp;</p>\n<p><img class=\"images\" src=\"http://localhost/front_web/images/default.jpg\" width=\"423\" height=\"282\" /></p>\n<p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary.</p>\n<p><img class=\"images\" src=\"http://localhost/front_web/images/default.jpg\" width=\"380\" height=\"253\" /></p>\n<p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of.</p>\n<p>How all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself.</p>', '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(7, 7, '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable.&nbsp;</p>\n<p><img class=\"images\" src=\"http://localhost/front_web/images/default.jpg\" width=\"423\" height=\"282\" /></p>\n<p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary.</p>\n<p><img class=\"images\" src=\"http://localhost/front_web/images/default.jpg\" width=\"380\" height=\"253\" /></p>\n<p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of</p>', '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(8, 8, '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable.&nbsp;</p>\n<p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary.</p>\n<p><img class=\"images\" src=\"http://localhost/front_web/images/default.jpg\" width=\"380\" height=\"253\" /></p>\n<p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of</p>', '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(9, 9, '\n                <p>In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.</p>\n\n<p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish.</p>\n\n<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.</p>\n                ', '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(10, 10, '\n                <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.</p>', '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(11, 11, '\n<p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish.</p>\n                <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.</p>', '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(12, 12, '\n<p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish.</p>\n                <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.</p>', '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(13, 13, '\n                <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.</p>', '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(14, 14, '<p>\nتقليديا ، شدد العديد من اللغويين على أهمية إتقان الهياكل النحوية أولاً أثناء تدريس اللغة الإنجليزية. في السنوات الأخيرة ، أصبح غالبية اختصاصيي التوعية أكثر وعيًا بأخطاء هذا النهج ، واكتسبت المناهج الأخرى التي تعزز تطوير المفردات شعبية. تم اكتشاف أنه بدون مفردات لوضعها على رأس نظام القواعد ، يمكن للمتعلمين في الواقع أن يقولوا القليل جدًا على الرغم من قدرتهم على التلاعب بالبنى النحوية المعقدة في التدريبات الرياضية. من الواضح أنه لتعلم اللغة الإنجليزية ، يحتاج المرء إلى تعلم العديد من الكلمات.\n</p>\n<p>\nالمتحدثون الأصليون لديهم مفردات من حوالي 20000 كلمة لكن المتعلمين الأجانب للغة الإنجليزية يحتاجون أقل بكثير. يحتاجون فقط إلى حوالي 5000 كلمة ليكونوا مؤهلين تمامًا في التحدث والاستماع. سبب هذا العدد الصغير على ما يبدو هو طبيعة الكلمات وتكرار ظهورها في اللغة. يبدو واضحًا أن الكلمات المتكررة يجب أن تكون من بين الكلمات الأولى التي يجب تعلمها لأنها ستقابل معظم الكلمات العشر وستكون مطلوبة في الكلام أو الكتابة.\n</p>', '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(15, 15, '<p>التوحد هو اضطراب في نمو الدماغ يضعف التفاعل الاجتماعي والتواصل ويسبب سلوكًا مقيدًا ومتكررًا ، كل ذلك يبدأ قبل أن يبلغ الطفل سن الثالثة. تعتبر جينات التوحد معقدة ومن غير الواضح بشكل عام الجينات المسؤولة عن ذلك. يؤثر التوحد على أجزاء كثيرة من الدماغ ولكن كيفية حدوث ذلك غير مفهومة بشكل جيد. يرتبط التوحد ارتباطًا وثيقًا بالعوامل التي تسبب تشوهات خلقية. الأسباب الأخرى المقترحة ، مثل لقاحات الطفولة ، مثيرة للجدل وتفتقر فرضيات اللقاح إلى أدلة علمية مقنعة.\nزاد عدد الأشخاص المعروف أنهم مصابون بالتوحد بشكل كبير منذ الثمانينيات. عادة ما يلاحظ الآباء العلامات في العامين الأولين من حياة طفلهم. يمكن أن يساعد التدخل المعرفي السلوكي المبكر الأطفال على اكتساب مهارات الرعاية الذاتية ، ومهارات التواصل الاجتماعي ، ولكن لا يوجد علاج لذلك. قلة من الأطفال المصابين بالتوحد يعيشون بشكل مستقل بعد بلوغهم سن الرشد ، لكن الأمر نفسه أصبح ناجحًا وتطورت ثقافة التوحد ، مع السعي للحصول على علاج واعتقد آخرون أن التوحد هو حالة وليست اضطرابًا.</p>', '2022-11-12 04:58:52', '2022-11-12 04:58:52');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `show_in_menu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `show_in_home_page` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lang_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `show_in_menu`, `show_in_home_page`, `color`, `lang_id`, `created_at`, `updated_at`) VALUES
(1, 'Animal', 'animal', '1', '1', '#b51cb2', 1, '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(2, 'Gaming', 'gaming', '1', '0', '#2bc3a9', 1, '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(3, 'Music', 'music', '0', '1', '#d514a5', 2, '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(4, 'Technology', 'technology', '0', '0', '#2a10ac', 2, '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(5, 'Sports', 'sports', '1', '1', '#5c1030', 1, '2022-11-12 04:58:52', '2022-11-12 04:58:52');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(160) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lang_id` bigint(20) UNSIGNED NOT NULL,
  `album_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(160) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gallery_post`
--

CREATE TABLE `gallery_post` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `gallery_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_description` text COLLATE utf8mb4_unicode_ci,
  `gallery_content` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gallery_post`
--

INSERT INTO `gallery_post` (`id`, `post_id`, `gallery_title`, `image_description`, `gallery_content`, `created_at`, `updated_at`) VALUES
(1, 16, 'Contrary to popular belief, Lorem Ipsum is not simply random text', 'Avoids a pain that produces no resultant pleasure', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(2, 16, 'Implementing these goals requires a careful examination', 'The standard chunk of Lorem Ipsum used since the', 'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains', '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(3, 17, 'Class aptent taciti sociosqu ad litora torquent per conubia nostra', 'Donec rhoncus feugiat magna ut hendrerit', 'Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec rhoncus feugiat magna ut hendrerit. Mauris non consectetur nunc. Nam scelerisque ex a posuere porttitor. Morbi tincidunt eget odio nec pretium. Morbi aliquam, elit nec interdum commodo, metus neque tincidunt tellus, a hendrerit risus magna sit amet turpis.', '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(4, 17, 'Vivamus sit amet turpis at nisl elementum pellentesque', 'Nam sapien neque, interdum at mi quis', 'Integer non cursus ligula, et varius diam. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Vestibulum auctor, tellus sit amet dapibus ultricies, lorem tortor efficitur enim, et gravida eros felis et lectus. Cras a condimentum felis. Sed congue mauris vel lectus scelerisque, id rutrum velit dictum. Nam sapien neque, interdum at mi quis, viverra pellentesque metus. Etiam in ante nunc.', '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(5, 18, 'Effect twenty indeed beyond for not had county', 'These cases are perfectly simple and easy to distinguish', 'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain.', '2022-11-12 04:58:53', '2022-11-12 04:58:53'),
(6, 18, 'Photography Greatly hearted has who believe', 'variations of passages of Lorem Ipsum', 'Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat', '2022-11-12 04:58:53', '2022-11-12 04:58:53'),
(7, 19, 'Quisque efficitur augue eget enim malesuada auctor', 'Maecenas quis maximus ipsum', 'Cras hendrerit enim ut turpis commodo, eget porta massa ullamcorper. Maecenas quis maximus ipsum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed hendrerit magna ligula, nec malesuada lectus finibus vel. Praesent varius rutrum nunc, sit amet tincidunt dolor ultrices nec.', '2022-11-12 04:58:53', '2022-11-12 04:58:53'),
(8, 19, 'Nulla consequat est tellus, non sodales ante congue facilisis', 'Praesent nec purus ac nulla mollis dapibus ac at dolor', 'Phasellus cursus nec massa vel mollis. Sed ut nisl vitae elit blandit tempus at ut tortor. Nullam tempor, ligula non molestie elementum, mi metus imperdiet eros, eu dictum ante lectus sed ligula. Aliquam felis risus, vestibulum sagittis dolor dapibus, laoreet luctus arcu. Donec a eros malesuada, varius augue sit amet, iaculis felis. Praesent nec purus ac nulla mollis dapibus ac at dolor. Ut in vestibulum nibh.', '2022-11-12 04:58:53', '2022-11-12 04:58:53');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `iso_code` varchar(160) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `iso_code`, `is_default`, `created_at`, `updated_at`) VALUES
(1, 'English', 'en', 1, '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(2, 'Arabic', 'ar', 0, '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(3, 'Chinese', 'zh', 0, '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(4, 'Spanish', 'es', 0, '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(5, 'German', 'de', 0, '2022-11-12 04:58:52', '2022-11-12 04:58:52');

-- --------------------------------------------------------

--
-- Table structure for table `mail_settings`
--

CREATE TABLE `mail_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mail_protocol` int(11) NOT NULL,
  `mail_library` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `encryption` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail_port` int(11) NOT NULL,
  `mail_host` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail_username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reply_to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verification` int(11) NOT NULL,
  `contact_messages` int(11) DEFAULT NULL,
  `contact_mail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `send_mail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mail_settings`
--

INSERT INTO `mail_settings` (`id`, `mail_protocol`, `mail_library`, `encryption`, `mail_port`, `mail_host`, `mail_username`, `mail_password`, `mail_title`, `reply_to`, `email_verification`, `contact_messages`, `contact_mail`, `send_mail`, `created_at`, `updated_at`) VALUES
(1, 1, '1', '1', 587, 'mail@codingest.com', 'info@codingest.com', 'mail@123', 'Varient', 'info2@codingest.com', 1, 1, 'info3@codingest.com', 'info4@codingest.com', '2022-11-12 04:58:52', '2022-11-12 04:58:52');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(160) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collection_name` varchar(170) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(170) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(170) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(160) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(170) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversions_disk` varchar(170) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` bigint(20) UNSIGNED NOT NULL,
  `manipulations` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `custom_properties` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `generated_conversions` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `responsive_images` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_column` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_menu_id` bigint(20) UNSIGNED DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `show_in_menu` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `title`, `link`, `parent_menu_id`, `order`, `show_in_menu`, `created_at`, `updated_at`) VALUES
(1, 'Election', 'www.politicsinfo.com', NULL, 2, 1, '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(2, 'Upcoming Sports', 'www.SportsDaily.com', 1, 1, 1, '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(3, 'New Launches', 'www.MyGamez.com', 1, 3, 0, '2022-11-12 04:58:52', '2022-11-12 04:58:52');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_07_26_044558_create_media_table', 1),
(5, '2021_07_28_114939_create_settings_table', 1),
(6, '2021_08_05_085326_create_permission_tables', 1),
(7, '2022_03_09_073651_creat_languages_table', 1),
(8, '2022_03_09_090704_create_categories_table', 1),
(9, '2022_03_09_120141_create_albums_table', 1),
(10, '2022_03_09_120142_create_album_categories_table', 1),
(11, '2022_03_10_054126_create_sub_categories_table', 1),
(12, '2022_03_10_055607_create_menus_table', 1),
(13, '2022_03_10_105057_create_polls_table', 1),
(14, '2022_03_11_054720_create_pages_table', 1),
(15, '2022_03_11_105713_create_navigation_table', 1),
(16, '2022_03_11_121526_create_mail_settings_table', 1),
(17, '2022_03_12_062921_create_seo_tools_table', 1),
(18, '2022_03_14_060718_create_galleries_table', 1),
(19, '2022_03_15_060007_create_posts_table', 1),
(20, '2022_03_17_122201_create_gallery_post', 1),
(21, '2022_03_19_050520_create_article_post', 1),
(22, '2022_03_21_065053_create_sort_list_post', 1),
(23, '2022_03_24_043738_add_parent_menu_id_to_menus_table', 1),
(24, '2022_03_24_111534_change_column_to_article_post_table', 1),
(25, '2022_03_24_123132_create_subscribers', 1),
(26, '2022_03_30_043655_create_analytics_table', 1),
(27, '2022_03_30_085103_create_poll_result_table', 1),
(28, '2022_04_01_062431_create_comments_table', 1),
(29, '2022_04_09_062145_create_contacts_table', 1),
(30, '2022_05_18_103900_change_media_table', 1),
(31, '2022_06_06_075009_add_slug_sub_categories_table', 1),
(32, '2022_07_08_074541_add_dark_mode_field_to_users_table', 1),
(33, '2022_08_24_085555_update_field_type_in_article_post_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(160) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(160) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 1),
(3, 'App\\Models\\User', 1),
(4, 'App\\Models\\User', 1),
(5, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `navigation`
--

CREATE TABLE `navigation` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `navigationable_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `navigationable_id` int(11) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `navigation`
--

INSERT INTO `navigation` (`id`, `navigationable_type`, `navigationable_id`, `order_id`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\Category', 1, 1, NULL, '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(2, 'App\\Models\\Category', 2, 2, NULL, '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(3, 'App\\Models\\Category', 3, 3, NULL, '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(4, 'App\\Models\\Category', 4, 4, NULL, '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(5, 'App\\Models\\Category', 5, 5, NULL, '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(6, 'App\\Models\\SubCategory', 1, 1, 5, '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(7, 'App\\Models\\SubCategory', 2, 1, 3, '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(8, 'App\\Models\\SubCategory', 3, 1, 2, '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(9, 'App\\Models\\SubCategory', 4, 1, 1, '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(10, 'App\\Models\\SubCategory', 5, 1, 4, '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(11, 'App\\Models\\Menu', 1, 6, NULL, '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(12, 'App\\Models\\Menu', 2, 2, 1, '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(13, 'App\\Models\\Menu', 3, 3, 1, '2022-11-12 04:58:52', '2022-11-12 04:58:52');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` int(11) NOT NULL,
  `visibility` tinyint(1) NOT NULL,
  `show_title` tinyint(1) NOT NULL,
  `show_right_column` tinyint(1) NOT NULL,
  `show_breadcrumb` tinyint(1) NOT NULL,
  `permission` tinyint(1) NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `parent_menu_link` bigint(20) UNSIGNED DEFAULT NULL,
  `lang_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `title`, `slug`, `meta_title`, `meta_description`, `location`, `visibility`, `show_title`, `show_right_column`, `show_breadcrumb`, `permission`, `content`, `parent_menu_link`, `lang_id`, `created_at`, `updated_at`) VALUES
(1, 'Olympics', 'Upcoming olympics', 'upcoming-olympics', 'Everything about next olympics', 'Read about where and when will the next winter olympics be held ??', 2, 1, 0, 1, 0, 1, '<p>The 2022 Beijing Winter Olympics will be spread over three distinct zones and merge new venues with existing ones from the 2008 Games, including the Bird\'s Nest stadium.</p>\n\n<p>With 100 days to go, AFP Sport takes an in-depth look at where the Olympics will take place:</p>\n\n<p>Beijing - The 80,000-seater Bird\'s Nest National Stadium -- whose cross-hatched steel girders produce a nest-like appearance -- will stage the opening and closing ceremony.</p>\n\n<p>sting Olympic Park is a 12,000-capacity speed skating oval nicknamed the Ice Ribbon.</p>\n\n<p>New venues have been built in other parts of the city, such as the striking location for some of the skiing and snowboarding events.</p>\n\n<p>The 60-metre-high Big Air jumping platform stands in the shadow of four vast cooling towers at a former steel mill that once employed tens of thousands of workers and is now a trendy bar, restaurant and office complex. </p>\n    </p>', 2, 1, '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(2, 'future of gaming', 'technology used in gaming', 'technology-used-in-gaming', 'Usage of new technology in gaming', 'Which new technology used in gaming Read now !!', 4, 1, 1, 0, 1, 1, '22032022.jpg', 3, 2, '2022-11-12 04:58:52', '2022-11-12 04:58:52');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(160) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(160) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(160) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'manage_menu', 'Manage Menu', 'web', '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(2, 'manage_categories', 'Manage Categories', 'web', '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(3, 'manage_sub_categories', 'Manage Sub Categories', 'web', '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(4, 'manage_albums', 'Manage Albums', 'web', '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(5, 'manage_albums_category', 'Manage Albums Category', 'web', '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(6, 'manage_gallery', 'Manage Gallery', 'web', '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(7, 'manage_pages', 'Manage Pages', 'web', '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(8, 'manage_settings', 'Manage Settings', 'web', '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(9, 'manage_staff', 'Manage Staff', 'web', '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(10, 'manage_roles_permission', 'Manage Roles Permission', 'web', '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(11, 'manage_add_post', 'Manage Add Post ', 'web', '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(12, 'manage_all_post', 'Manage All Post', 'web', '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(13, 'manage_rss_feeds', 'Manage Rss Feeds', 'web', '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(14, 'manage_mail_setting', 'Manage Mail Setting', 'web', '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(15, 'manage_polls', 'Manage polls', 'web', '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(16, 'manage_all_user_can_vote', 'Manage All User Can Vote', 'web', '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(17, 'manage_only_register_user_vote', 'Manage Only Register User Vote', 'web', '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(18, 'manage_gallery_image', 'Manage Gallery Image', 'web', '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(19, 'manage_language', 'Manage Language', 'web', '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(20, 'manage_navigation', 'Manage Navigation', 'web', '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(21, 'manage_seo_tools', 'Manage SEO Tools', 'web', '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(22, 'manage_news_letter', 'Manage News Letter', 'web', '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(23, 'manage_comment', 'Manage Comment', 'web', '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(24, 'manage_contacts', 'Manage Contacts', 'web', '2022-11-12 04:58:52', '2022-11-12 04:58:52');

-- --------------------------------------------------------

--
-- Table structure for table `polls`
--

CREATE TABLE `polls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lang_id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(181) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option1` varchar(181) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option2` varchar(181) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option3` varchar(181) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option4` varchar(181) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option5` varchar(181) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option6` varchar(181) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option7` varchar(181) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option8` varchar(181) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option9` varchar(181) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option10` varchar(181) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `vote_permission` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `poll_result`
--

CREATE TABLE `poll_result` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `poll_id` bigint(20) UNSIGNED NOT NULL,
  `answer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `keywords` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visibility` tinyint(1) NOT NULL,
  `featured` tinyint(1) NOT NULL,
  `breaking` tinyint(1) NOT NULL,
  `slider` tinyint(1) NOT NULL,
  `recommended` tinyint(1) NOT NULL,
  `show_on_headline` tinyint(1) NOT NULL,
  `show_registered_user` tinyint(1) NOT NULL,
  `optional_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_types` int(11) NOT NULL,
  `lang_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `sub_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `scheduled_post` int(11) NOT NULL DEFAULT '0',
  `scheduled_post_time` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `description`, `keywords`, `visibility`, `featured`, `breaking`, `slider`, `recommended`, `show_on_headline`, `show_registered_user`, `optional_url`, `tags`, `post_types`, `lang_id`, `category_id`, `sub_category_id`, `scheduled_post`, `scheduled_post_time`, `status`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'The Coelacanth May Live for a Century. That’s Not Great News', 'the-coelacanth-may-live-for-a-century-thats-not-great-news', 'Easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best', 'The, Coelacanth, May, Live, for, Century., That’s, Not, Great, News', 1, 1, 0, 1, 1, 1, 0, '', 'News', 1, 2, 3, 2, 0, NULL, 1, 1, '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(2, 'Cordially convinced did incommode existence', 'cordially-convinced-did-incommode-existence', 'Easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best', 'incommode', 1, 1, 0, 1, 1, 0, 0, '', 'Rare animal,wild life', 1, 2, 3, 2, 0, NULL, 1, 1, '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(3, 'Situation admitting promotion at or to perceived be', 'situation-admitting-promotion-at-or-to-perceived-be', 'Denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded', 'promotion', 1, 1, 1, 1, 0, 0, 0, '', 'wild life', 1, 2, 3, 2, 0, NULL, 1, 1, '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(4, 'Are own design entire former get should', 'are-own-design-entire-former-get-should', 'To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it', 'design', 1, 1, 1, 1, 1, 1, 0, '', 'Design,music', 1, 1, 2, 4, 0, NULL, 1, 1, '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(5, 'How well do you know the famous places in the world?', 'how-well-do-you-know-the-famous-places-in-the-world', 'Sed bibendum gravida ipsum ac mattis. Morbi id felis a tellus faucibus tempor. Pellentesque tellus justo', 'world', 1, 1, 1, 0, 1, 1, 0, '', 'Environment, Nature', 1, 1, 1, 4, 0, NULL, 1, 1, '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(6, 'Decisively advantages nor expression untrammelled', 'decisively-advantages-nor-expression-untrammelled', 'These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled', 'advantages', 1, 1, 1, 0, 1, 0, 0, '', 'advantages,power', 1, 1, 1, 4, 0, NULL, 1, 1, '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(7, 'Far concluded not his something extremity', 'far-concluded-not-his-something-extremity', 'Far concluded not his something extremity', 'something', 1, 1, 1, 0, 1, 0, 0, '', 'extremity', 1, 1, 2, 3, 0, NULL, 1, 1, '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(8, 'Greatly hearted has who believe', 'greatly-hearted-has-who-believe', 'Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated', 'hearted', 1, 1, 0, 0, 1, 0, 0, '', 'believe', 1, 1, 2, 3, 0, NULL, 1, 1, '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(9, 'Idea of denouncing pleasure and praising pain was born', 'idea-of-denouncing-pleasure-and-praising-pain-was-born', 'But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete ', 'denouncing', 1, 0, 0, 1, 1, 1, 0, '', 'denouncing', 1, 2, 3, 2, 0, NULL, 1, 1, '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(10, 'There are many variations of passages available', 'there-are-many-variations-of-passages-available', 'More recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'available', 1, 1, 1, 1, 1, 0, 0, '', 'extremity', 1, 2, 3, 2, 0, NULL, 1, 1, '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(11, 'When an unknown printer took a galley of type and scrambled', 'when-an-unknown-printer-took-a-galley-of-type-and-scrambled', 'Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for', 'unknown', 1, 1, 1, 0, 1, 0, 0, '', 'unknown', 1, 1, 2, 3, 0, NULL, 1, 1, '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(12, 'Various versions have evolved over the years, sometimes by acciden', 'various-versions-have-evolved-over-the-years-sometimes-by-acciden', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour', 'sometimes', 1, 1, 1, 0, 1, 0, 0, '', 'evolved', 1, 1, 1, 4, 0, NULL, 1, 1, '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(13, 'Contrary to popular belief, Lorem Ipsum is not simply random text', 'contrary-to-popular-belief-lorem-ipsum-is-not-simply-random-text', 'College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word', 'popular', 1, 0, 0, 0, 1, 0, 0, '', 'random', 1, 2, 3, 2, 0, NULL, 1, 1, '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(14, 'لم يزعم المهندسون المعماريون البحريون أبدًا أن السفينة غير قابلة للغرق', 'لم-يزعم-المهندسون-المعماريون-البحريون-أبدا-أن-السفينة-غير-قابلة-للغرق', 'لم يزعم المهندسون المعماريون البحريون أبدًا أن السفينة غير قابلة للإغراق ، لكن غرق عبّارة الركاب والسيارات إستونيا في بحر البلطيق بالتأكيد لم يكن ليحدث أبدًا.', 'المهندسون', 1, 0, 0, 0, 1, 0, 0, '', 'المهندسون, البحريون', 1, 2, 1, 4, 0, NULL, 1, 1, '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(15, 'تقليديا ، شدد العديد من اللغويين على أهمية الإتقان', 'تقليديا-شدد-العديد-من-اللغويين-على-أهمية-الإتقان', 'يبدو من الواضح أن الكلمات المتكررة يجب أن تكون من بين الكلمات الأولى التي يجب تعلمها لأنها ستقابل معظم الكلمات العشر وستكون مطلوبة في الكلام أو الكتابة.', 'أهمية', 1, 0, 0, 0, 0, 0, 0, '', 'العديد, أهمية', 1, 2, 1, 4, 0, NULL, 1, 1, '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(16, 'Through weakness of will, which is the same as saying through', 'through-weakness-of-will-which-is-the-same-as-saying-through', 'There anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil', 'weakness', 1, 1, 1, 0, 1, 0, 0, '', 'weakness', 2, 1, 1, 4, 0, NULL, 1, 1, '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(17, 'Implementing these goals requires a careful examination', 'implementing-these-goals-requires-a-careful-examination', 'But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have', 'goals', 1, 0, 0, 1, 1, 0, 0, '', 'goals', 2, 1, 1, 4, 0, NULL, 1, 1, '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(18, 'NASA and ESA Astronauts Continue Installing Space Station Solar Arrays', 'nasa-and-esa-astronauts-continue-installing-space-station-solar-arrays', 'Spacewalkers Shane Kimbrough of NASA (left) and Thomas Pesquet of the European Space Agency worked to install new roll out solar arrays on the space station.', 'Astronauts', 1, 1, 1, 1, 1, 0, 0, '', 'Strength', 2, 1, 1, 4, 0, NULL, 1, 1, '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(19, 'Hubble Images a Dazzling Dynamic Duo', 'hubble-images-a-dazzling-dynamic-duo', 'A cataclysmic cosmic collision takes center stage in this image taken with the NASA/ESA Hubble Space Telescope.', 'Images', 1, 0, 0, 0, 0, 0, 0, '', 'Adventure', 2, 1, 1, 4, 0, NULL, 1, 1, '2022-11-12 04:58:53', '2022-11-12 04:58:53'),
(20, 'It is a long established fact that a reader will be distracted by the readable', 'it-is-a-long-established-fact-that-a-reader-will-be-distracted-by-the-readable', 'Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infanc', 'explorer', 1, 1, 1, 1, 0, 0, 0, '', 'actual', 3, 1, 1, 4, 0, NULL, 1, 1, '2022-11-12 04:58:53', '2022-11-12 04:58:53'),
(21, 'Implementing these goals requires a careful examination', 'implementing-these-goals-requires-a-careful-examination', 'But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have', 'examination, careful, goals', 1, 0, 0, 1, 0, 0, 0, '', 'sky', 3, 1, 1, 4, 0, NULL, 1, 1, '2022-11-12 04:58:53', '2022-11-12 04:58:53');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(160) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT '0',
  `guard_name` varchar(160) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `is_default`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin', 1, 'web', '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(2, 'staff', 'Staff', 1, 'web', '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(3, 'moderator', 'Moderator', 1, 'web', '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(4, 'author', 'Author', 1, 'web', '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(5, 'user', 'User', 1, 'web', '2022-11-12 04:58:52', '2022-11-12 04:58:52');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(12, 2),
(15, 2),
(18, 2),
(2, 3),
(5, 3),
(6, 3),
(7, 3),
(12, 3),
(13, 4),
(12, 5);

-- --------------------------------------------------------

--
-- Table structure for table `seo_tools`
--

CREATE TABLE `seo_tools` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lang_id` bigint(20) UNSIGNED NOT NULL,
  `site_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `home_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `keyword` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `google_analytics` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seo_tools`
--

INSERT INTO `seo_tools` (`id`, `lang_id`, `site_title`, `home_title`, `site_description`, `keyword`, `google_analytics`, `created_at`, `updated_at`) VALUES
(1, 1, 'InfyNews', 'Home', 'Get Latest News', 'world news website', '', '2022-11-12 04:58:52', '2022-11-12 04:58:52');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'application_name', 'InfyNews', '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(2, 'contact_no', '+91 70963 36561', '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(3, 'email', 'test@email.com', '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(4, 'copy_right_text', 'All Rights Reserved ©2022', '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(5, 'site_key', ' ', '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(6, 'secret_key', ' ', '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(7, 'show_captcha', '0', '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(8, 'facebook_url', 'https://www.facebook.com/infyom/', '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(9, 'twitter_url', 'https://twitter.com/infyom?lang=en', '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(10, 'instagram_url', 'https://www.instagram.com/?hl=en', '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(11, 'pinterest_url', 'https://www.pinterest.com/', '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(12, 'linkedin_url', 'https://www.linkedin.com/organization-guest/company/infyom-technologies?challengeId=AQFgQaMxwSxCdAAAAXOA_wosiB2vYdQEoITs6w676AzV8cu8OzhnWEBNUQ7LCG4vds5-A12UIQk1M4aWfKmn6iM58OFJbpoRiA&submissionId=0088318b-13b3-2416-9933-b463017e531e', '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(13, 'vk_url', 'https://vk.com/?lang=en', '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(14, 'telegram_url', 'https://www.telegram.org/k/', '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(15, 'youtube_url', 'https://www.youtube.com/', '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(16, 'show_cookie', '1', '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(17, 'cookie_warning', 'Your experience on this site will be improved by allowing cookies.', '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(18, 'logo', '/assets/image/infyom-logo.png', '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(19, 'favicon', '/assets/image/favicon-infyom.png', '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(20, 'contact_address', 'C-303, Atlanta Shopping Mall,Nr.Sudama Chowk, Mota Varachha,Surat-394101, Gujarat, India.', '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(21, 'about_text', 'Leading Web & Mobile Development Company with proven expertise, India\'s Leading Laravel Open-Source contributor with over 3 million+ Downloads.', '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(22, 'terms&conditions', '', '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(23, 'privacy', '', '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(24, 'support', '', '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(25, 'comment_approved', '1', '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(26, 'front_language', '1', '2022-11-12 04:58:52', '2022-11-12 04:58:52');

-- --------------------------------------------------------

--
-- Table structure for table `sort_list_post`
--

CREATE TABLE `sort_list_post` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `sort_list_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_description` text COLLATE utf8mb4_unicode_ci,
  `sort_list_content` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sort_list_post`
--

INSERT INTO `sort_list_post` (`id`, `post_id`, `sort_list_title`, `image_description`, `sort_list_content`, `created_at`, `updated_at`) VALUES
(1, 20, 'Quisque efficitur augue eget enim malesuada auctor', 'Maecenas quis maximus ipsum', 'Cras hendrerit enim ut turpis commodo, eget porta massa ullamcorper. Maecenas quis maximus ipsum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed hendrerit magna ligula, nec malesuada lectus finibus vel. Praesent varius rutrum nunc, sit amet tincidunt dolor ultrices nec.', '2022-11-12 04:58:53', '2022-11-12 04:58:53'),
(2, 20, 'Nulla consequat est tellus, non sodales ante congue facilisis', 'Praesent nec purus ac nulla mollis dapibus ac at dolor', 'Phasellus cursus nec massa vel mollis. Sed ut nisl vitae elit blandit tempus at ut tortor. Nullam tempor, ligula non molestie elementum, mi metus imperdiet eros, eu dictum ante lectus sed ligula. Aliquam felis risus, vestibulum sagittis dolor dapibus, laoreet luctus arcu. Donec a eros malesuada, varius augue sit amet, iaculis felis. Praesent nec purus ac nulla mollis dapibus ac at dolor. Ut in vestibulum nibh.', '2022-11-12 04:58:53', '2022-11-12 04:58:53'),
(3, 21, 'Class aptent taciti sociosqu ad litora torquent per conubia nostra', 'Donec rhoncus feugiat magna ut hendrerit', 'Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec rhoncus feugiat magna ut hendrerit. Mauris non consectetur nunc. Nam scelerisque ex a posuere porttitor. Morbi tincidunt eget odio nec pretium. Morbi aliquam, elit nec interdum commodo, metus neque tincidunt tellus, a hendrerit risus magna sit amet turpis.', '2022-11-12 04:58:53', '2022-11-12 04:58:53'),
(4, 21, 'Vivamus sit amet turpis at nisl elementum pellentesque', 'Nam sapien neque, interdum at mi quis', 'Integer non cursus ligula, et varius diam. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Vestibulum auctor, tellus sit amet dapibus ultricies, lorem tortor efficitur enim, et gravida eros felis et lectus. Cras a condimentum felis. Sed congue mauris vel lectus scelerisque, id rutrum velit dictum. Nam sapien neque, interdum at mi quis, viverra pellentesque metus. Etiam in ante nunc.', '2022-11-12 04:58:53', '2022-11-12 04:58:53');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `show_in_menu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `parent_category_id` bigint(20) UNSIGNED NOT NULL,
  `lang_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `name`, `slug`, `show_in_menu`, `parent_category_id`, `lang_id`, `created_at`, `updated_at`) VALUES
(1, 'World Wide Sports', 'world-wide-sports', '1', 5, 1, '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(2, 'Arabic music', 'arabic-music', '0', 3, 2, '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(3, 'Mobile Gaming', 'mobile-gaming', '1', 2, 1, '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(4, 'Wild life', 'wild-life', '1', 1, 2, '2022-11-12 04:58:52', '2022-11-12 04:58:52'),
(5, 'Great Technology', 'great-technology', '1', 4, 1, '2022-11-12 04:58:52', '2022-11-12 04:58:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(160) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date DEFAULT NULL,
  `gender` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `language` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'en',
  `dark_mode` tinyint(1) NOT NULL DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(11) DEFAULT NULL,
  `blood_group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `contact`, `dob`, `gender`, `status`, `language`, `dark_mode`, `email_verified_at`, `password`, `type`, `blood_group`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super', 'Admin', 'admin@infynews.com', '1234567890', NULL, 1, 1, 'en', 0, '2022-11-12 04:58:52', '$2y$10$Vpum7/zLDtR3Us2MNkbZSeX/8tlnksdEiKSoQnZin/umcA/sa/Way', 1, NULL, NULL, '2022-11-12 04:58:52', '2022-11-12 04:58:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`),
  ADD KEY `albums_lang_id_foreign` (`lang_id`);

--
-- Indexes for table `album_categories`
--
ALTER TABLE `album_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `album_categories_album_id_foreign` (`album_id`),
  ADD KEY `album_categories_lang_id_foreign` (`lang_id`);

--
-- Indexes for table `analytics`
--
ALTER TABLE `analytics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `article_post`
--
ALTER TABLE `article_post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `article_post_post_id_foreign` (`post_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_lang_id_foreign` (`lang_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_post_id_foreign` (`post_id`),
  ADD KEY `comments_user_id_foreign` (`user_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `galleries_title_unique` (`title`),
  ADD KEY `galleries_lang_id_foreign` (`lang_id`),
  ADD KEY `galleries_album_id_foreign` (`album_id`),
  ADD KEY `galleries_category_id_foreign` (`category_id`);

--
-- Indexes for table `gallery_post`
--
ALTER TABLE `gallery_post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gallery_post_post_id_foreign` (`post_id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `languages_iso_code_unique` (`iso_code`);

--
-- Indexes for table `mail_settings`
--
ALTER TABLE `mail_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `media_uuid_unique` (`uuid`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menus_parent_menu_id_foreign` (`parent_menu_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `navigation`
--
ALTER TABLE `navigation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pages_parent_menu_link_foreign` (`parent_menu_link`),
  ADD KEY `pages_lang_id_foreign` (`lang_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `polls`
--
ALTER TABLE `polls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `polls_lang_id_foreign` (`lang_id`);

--
-- Indexes for table `poll_result`
--
ALTER TABLE `poll_result`
  ADD PRIMARY KEY (`id`),
  ADD KEY `poll_result_user_id_foreign` (`user_id`),
  ADD KEY `poll_result_poll_id_foreign` (`poll_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_created_by_foreign` (`created_by`),
  ADD KEY `posts_lang_id_foreign` (`lang_id`),
  ADD KEY `posts_category_id_foreign` (`category_id`),
  ADD KEY `posts_sub_category_id_foreign` (`sub_category_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `seo_tools`
--
ALTER TABLE `seo_tools`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seo_tools_lang_id_foreign` (`lang_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sort_list_post`
--
ALTER TABLE `sort_list_post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sort_list_post_post_id_foreign` (`post_id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_categories_parent_category_id_foreign` (`parent_category_id`),
  ADD KEY `sub_categories_lang_id_foreign` (`lang_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `album_categories`
--
ALTER TABLE `album_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `analytics`
--
ALTER TABLE `analytics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `article_post`
--
ALTER TABLE `article_post`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gallery_post`
--
ALTER TABLE `gallery_post`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mail_settings`
--
ALTER TABLE `mail_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `navigation`
--
ALTER TABLE `navigation`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `polls`
--
ALTER TABLE `polls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `poll_result`
--
ALTER TABLE `poll_result`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `seo_tools`
--
ALTER TABLE `seo_tools`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `sort_list_post`
--
ALTER TABLE `sort_list_post`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `albums`
--
ALTER TABLE `albums`
  ADD CONSTRAINT `albums_lang_id_foreign` FOREIGN KEY (`lang_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `album_categories`
--
ALTER TABLE `album_categories`
  ADD CONSTRAINT `album_categories_album_id_foreign` FOREIGN KEY (`album_id`) REFERENCES `albums` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `album_categories_lang_id_foreign` FOREIGN KEY (`lang_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `article_post`
--
ALTER TABLE `article_post`
  ADD CONSTRAINT `article_post_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_lang_id_foreign` FOREIGN KEY (`lang_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `galleries`
--
ALTER TABLE `galleries`
  ADD CONSTRAINT `galleries_album_id_foreign` FOREIGN KEY (`album_id`) REFERENCES `albums` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `galleries_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `album_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `galleries_lang_id_foreign` FOREIGN KEY (`lang_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gallery_post`
--
ALTER TABLE `gallery_post`
  ADD CONSTRAINT `gallery_post_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `menus_parent_menu_id_foreign` FOREIGN KEY (`parent_menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pages`
--
ALTER TABLE `pages`
  ADD CONSTRAINT `pages_lang_id_foreign` FOREIGN KEY (`lang_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pages_parent_menu_link_foreign` FOREIGN KEY (`parent_menu_link`) REFERENCES `menus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `polls`
--
ALTER TABLE `polls`
  ADD CONSTRAINT `polls_lang_id_foreign` FOREIGN KEY (`lang_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `poll_result`
--
ALTER TABLE `poll_result`
  ADD CONSTRAINT `poll_result_poll_id_foreign` FOREIGN KEY (`poll_id`) REFERENCES `polls` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `poll_result_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_lang_id_foreign` FOREIGN KEY (`lang_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_sub_category_id_foreign` FOREIGN KEY (`sub_category_id`) REFERENCES `sub_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `seo_tools`
--
ALTER TABLE `seo_tools`
  ADD CONSTRAINT `seo_tools_lang_id_foreign` FOREIGN KEY (`lang_id`) REFERENCES `languages` (`id`);

--
-- Constraints for table `sort_list_post`
--
ALTER TABLE `sort_list_post`
  ADD CONSTRAINT `sort_list_post_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `sub_categories_lang_id_foreign` FOREIGN KEY (`lang_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sub_categories_parent_category_id_foreign` FOREIGN KEY (`parent_category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
