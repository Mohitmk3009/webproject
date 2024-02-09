-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2023 at 05:24 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `author_id` int(11) NOT NULL,
  `author_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`author_id`, `author_name`) VALUES
(1, 'Amish Tripathi'),
(2, 'Akash Gupta'),
(3, 'Alex Michaelides'),
(4, 'Holly Jackson'),
(5, 'James Clear'),
(6, 'Ram V'),
(7, 'Kentaro Miuara'),
(8, 'Yuki Tabata'),
(9, 'Junji Ito'),
(10, 'Takehiko Inoue'),
(11, 'Nidhi Upadhyay'),
(12, 'Masashi Kishimoto'),
(13, 'Morgan Housel'),
(14, 'Eiichiro Oda'),
(15, 'Hector Gracia'),
(16, 'JK Rowling'),
(17, 'Takeru Hokazono'),
(18, 'Ashok Kumar'),
(19, 'Ashneer Grover'),
(20, 'Jessica Cluess'),
(21, 'Collen Hoover'),
(22, 'Gege Akutami'),
(23, 'Sadhguru'),
(24, 'Neelima Dalmia Adhar'),
(25, 'One'),
(26, 'Jason aaron'),
(27, 'Gene Luen Yang'),
(28, 'James Tynion\r\n'),
(29, 'Jed Mackay');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'Comic\r\n'),
(2, 'Religious Fiction '),
(3, 'Murder Mystery'),
(4, 'Psychological'),
(5, 'Business'),
(6, 'Fantasy'),
(7, 'Thriller'),
(8, 'Romance'),
(9, 'Self-Help'),
(10, 'Literature'),
(11, 'Science Fiction '),
(12, 'Manga');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `method` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` int(100) NOT NULL,
  `placed_on` varchar(50) NOT NULL,
  `payment_status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `number`, `email`, `method`, `address`, `total_products`, `total_price`, `placed_on`, `payment_status`) VALUES
(10, 2, 'Mohit Kumar', '9560611324', 'mk137440@gmail.com', 'cash on delivery', 'flat no. 54, Harijan Basti, West Jyoti Nagar, Shahdara, India - 110094', ', Atomic Habits (1) , The Immortals of Meluha - Shiva Triology - Part 1  (1) ', 864, '14-Dec-2023', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `book_name` varchar(100) NOT NULL,
  `book_desc` mediumtext NOT NULL,
  `book_isbn` varchar(100) NOT NULL,
  `book_category` text NOT NULL,
  `book_author` text NOT NULL,
  `book_price` int(100) NOT NULL,
  `book_image` varchar(100) NOT NULL,
  `book_page` int(10) NOT NULL,
  `category_id` int(11) UNSIGNED NOT NULL,
  `author_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `book_name`, `book_desc`, `book_isbn`, `book_category`, `book_author`, `book_price`, `book_image`, `book_page`, `category_id`, `author_id`) VALUES
(1, 'Aquaman: Andromeda', 'We are all haunted by our own stories…  Deep in the Pacific Ocean, at the farthest possible distance from any land, sits Point Nemo: the spaceship graveyard. Since the dawn of the space race, the nations of the world have sent their crafts there on splashdown, to sink beneath the silent seas. But there is something…else at Point Nemo. A structure never made by human hands. And that structure seems to be…waking up.  The crew of the experimental submarine Andromeda, powered by a mysterious black-hole drive, have been chosen to investigate this mystery. But they aren’t the only ones pursuing it. Anything of value beneath the ocean is of interest to the master pirate Black Manta… and anything that attracts Black Manta attracts Arthur Curry, his lifelong foe, the Aquaman! But heaven help them all when the doors of the mystery at Point Nemo swing wide to admit them in…  Ram V (Venom, The Swamp Thing) and Christian Ward (Thor, Invisible Kingdom) team up to put Arthur Curry through an exercise in psychological terror', '978-1779517333', 'Comic', 'Ram V', 1967, 'aquaman andromeda-1.jpg', 168, 1, 6),
(2, 'A Good Girl\'s Guide to Murder', 'The case is closed. Five years ago, schoolgirl Andie Bell was murdered by Sal Singh. The police know he did it. Everyone in town knows he did it.  But having grown up in the same small town that was consumed by the murder, Pippa Fitz-Amobi isn\'t so sure. When she chooses the case as the topic for her final year project, she starts to uncover secrets that someone in town desperately wants to stay hidden. And if the real killer is still out there, how far will they go to keep Pip from the truth?', '978-1405293181', 'Murder Mystery', 'Holly Jackson', 320, 'a-good-girls-guide-to-murder.jpeg', 432, 3, 4),
(3, 'Atomic Habits', 'People think that when you want to change your life, you need to think big. But world-renowned habits expert James Clear has discovered another way. He knows that real change comes from the compound effect of hundreds of small decisions: doing two push-ups a day, waking up five minutes early, or holding a single short phone call.  He calls them atomic habits.  In this ground-breaking book, Clears reveals exactly how these minuscule changes can grow into such life-altering outcomes. He uncovers a handful of simple life hacks (the forgotten art of Habit Stacking, the unexpected power of the Two Minute Rule, or the trick to entering the Goldilocks Zone), and delves into cutting-edge psychology and neuroscience to explain why they matter. Along the way, he tells inspiring stories of Olympic gold medalists, leading CEOs, and distinguished scientists who have used the science of tiny habits to stay productive, motivated, and happy.', '978-1847941831', 'Self-Help', 'James Clear', 544, 'atomic habits.jpg', 320, 9, 5),
(4, 'Avengers Vol. 7: The Age of Khonshu', 'As Iron Man fights for his life in the distant past, the Avengers face an uncertain future! Trapped in an icy cave at the dawn of time, Tony Stark has lost most of his armor - and a good chunk of his mind. When the sun goes down and the devil comes around again, he may lost whatever\'s left of his soul. And in the present, Earth\'s mightiest villains unite! What do the king of Atlantis, the lord of vampires, the deposed duke of Hell, a mysterious Russian assassin and the secret boss of Wahington D.C.\'s greatest super-tea, have in common? They all really hate the Avengers! Worse still, mummies are rising from their graves. A dark god has invaded Asgard. And Moon Knight is unleashed! So begins the Age of Khonshu. So fall the Avengers!', '978-1302924867', 'Comic', 'Jason Aaron', 1275, 'Avengers-7.jpg', 136, 1, 26),
(5, 'The Immortals of Meluha - Shiva Triology - Part 1 ', '1900 BC. In what modern Indians mistakenly call the Indus Valley Civilisation.  The inhabitants of that period called it the land of Meluha ? a near perfect empire created many centuries earlier by Lord Ram, one of the greatest monarchs that ever lived.  This once proud empire and its Suryavanshi rulers face severe perils as its primary river, the revered Saraswati, is slowly drying to extinction. They also face devastating terrorist attacks from the east, the land of the Chandravanshis. To make matters worse, the Chandravanshis appear to  have allied with the Nagas, an ostracised and sinister race of deformed humans with astonishing martial skills.  The only hope for the Suryavanshis is an ancient legend: ?When evil reaches epic proportions, when all seems lost, when it appears that your enemies have triumphed, a hero will emerge.?  Is the rough-hewn Tibetan immigrant Shiva, really that hero?  And does he want to be that hero at all?  Drawn suddenly to his destiny, by duty as well as by love, will Shiva lead the Suryavanshi vengeance and destroy evil?  This is the first book in a trilogy on Shiva, the simple man whose karma re-cast him as our Mahadev, the God of God', '9356290520', 'Religious Fiction', 'Amish Tripathi', 320, 'The_Immortals_Of_Meluha.jpg', 415, 2, 1),
(6, 'The Oath of the Vayuputras - Shiva Triology - Part 3', 'Shiva is gathering his forces. He reaches the Naga capital, Panchavati, and Evil is finally revealed. The Neelkanth prepares for a holy war against his true enemy, a man whose name instils dread in the fiercest of warriors.  India convulses under the onslaught of a series of brutal battles. It\'s a war for the very soul of the nation. Many will die. But Shiva must not fail, no matter what the cost. In his desperation, he reaches out to the ones who have never offered any help to him: the Vayuputras.  Will he succeed? And what will be the real cost of battling Evil? To India? And to Shiva\'s soul?  Discover the answer to these mysteries in this concluding part of the bestselling Shiva Trilogy.', '9356290687', 'Religious Fiction', 'Amish Tripathi', 367, 'The_Oath_of_the_Vayuputras.jpg', 575, 2, 1),
(7, 'The Secret of the Nagas- Shiva Triology - Part 2', 'Today, He is a God. 4000 years ago, He was just a man.  The hunt is on. The sinister Naga warrior has killed his friend Brahaspati and now stalks his wife Sati. Shiva, the Tibetan immigrant who is the prophesied destroyer of evil, will not rest till he finds his demonic adversary. His vengeance and the path to evil will lead him to the door of the Nagas, the serpent people. Of that he is certain.  The evidence of the malevolent rise of evil is everywhere. A kingdom is dying as it is held to ransom for a miracle drug. A crown prince is murdered. The Vasudevs - Shiva\'s philosopher guides - betray his unquestioning faith as they take the aid of the dark side. Even the perfect empire Meluha is riddled with a terrible secret in Maika, the city of births. Unknown to Shiva, a master puppeteer is playing a grand game.  In a journey that will take him across the length and breadth of ancient India, Shiva searches for the truth in a land of deadly mysteries - only to find that nothing is what it seems.  Fierce battles will be fought. Surprising alliances will be forged. Unbelievable secrets will be revealed in this second book of the Shiva Trilogy, the sequel to the #1 national bestseller, The Immortals of Meluha.', '9356290601', 'Religious Fiction', 'Amish Tripathi', 312, 'the-secret-nagas.jpg', 398, 2, 1),
(8, 'Raavan : Enemy of Aryavarta (Ram Chandra Series Book 3)', 'WITHOUT THE DARKNESS, LIGHT HAS NO PURPOSE.  WITHOUT THE VILLAIN, WHAT WOULD THE GODS DO?  INDIA, 3400 BCE.  A land in tumult, poverty and chaos. Most people suffer quietly. A few rebel. Some fight for a better world. Some for themselves. Some don?t give a damn. Raavan. Fathered by one of the  most illustrious sages of the time. Blessed by the Gods with talents beyond all. Cursed by fate to be tested to the extremes.  A formidable teenage pirate, he is filled with equal parts courage, cruelty and fearsome resolve. A resolve to be a giant among men, to conquer, plunder, and seize the greatness that he thinks is his right.  A man of contrasts, of brutal violence and scholarly knowledge. A man who will love without reward and kill without remorse.  This exhilarating third book of the Ram Chandra series sheds light on Raavan, the king of Lanka. And the light shines on darkness of the darkest kind. Is he the greatest villain in history or just a man in a dark place, all the time?  Read the epic tale of one of the most complex, violent, passionate and accomplished men of all time.', '9356290970', 'Religious Fiction', 'Amish Tripathi', 271, 'raavan.jpg', 400, 2, 1),
(9, 'Batman/Superman Annual #1', 'The epic epilogue to the Archive of Worlds saga! In his pursuit of perfection, the godlike Auteur.io sought to create and destroy worlds with the wave of a hand and a flair for the dramatic. But against all odds...the World of the Knight and the World of Tomorrow live on! The Batman of the noir-tinged streets of Gotham City finds himself stranded in the sunny, retro-futurist World of Tomorrow-and Superman discovers himself in the opposite predicament. With their home worlds in decay and only one chance to save them, the key to preserving their very existence is but the flip of a coin. Or the flip of this book! This special flip book is two times the story, with one full comic on one side and one full comic on the other, meeting in the middle! Follow Superman\'s journey on one side of this epic flip book annual, and turn the adventure over to crusade with the Batman and his trusty sidekick, Robin!', 'B09BD6YZYY', 'Comic', 'Gene Luen Yang', 625, 'Batman and superman-1.jpg', 42, 1, 27),
(10, 'Batman #106', 'Following the tragic events of Infinite Frontier #1, Batman and his new ally, Ghost-Maker, must reckon with a new gang operating in Gotham City-but are they connected to the reemergence of the Scarecrow? Meanwhile, shadowy billionaire Simon Saint pitches an advanced law-enforcement system to the new mayor! The creative team behind the epic “The Joker War” returns with a thrill-packed, dangerous new storyline called “The Cowardly Lot.” Plus, the backup story “Demon or Detective” begins as Damian Wayne is on the run! After everything Damian has gone through, can he escape Gotham and find his way back to where his journey started-to his mother, Talia al Ghul? This two-part tale concludes this month in Detective Comics #1034!', 'B08WHVLWD9', 'Comic', 'James Tynion', 1250, 'batman106.jpg', 30, 1, 28),
(11, 'Berserk Vol-38', 'Guts the Black Swordsman and company reach the isle of Skellig in hopes that Elven magic can cure the afflicted Casca, but the cure could come at a deadly cost. Meanwhile, Guts’ Band of the Hawk comrade Rickert journeys to the city of Falconia, the seat of power for Griffith, the resurrected former Hawks commander. But the glittering towers of Falconia cast the darkest of shadows, and a legion of demonic monstrosities dwell in the darkness!', '1506703984', 'Manga', 'Kentaro Miuara', 1069, 'berserk.jpg', 208, 12, 7),
(12, 'Black Clover Vol-24', 'In a world of magic, Asta, a boy with anti-magic powers, will do whatever it takes to become the Wizard King!  Asta is a young boy who dreams of becoming the greatest mage in the kingdom. Only one problem—he can\'t use any magic! Luckily for Asta, he receives the incredibly rare five-leaf clover grimoire that gives him the power of anti-magic. Can someone who can\'t use magic really become the Wizard King? One thing\'s for sure—Asta will never give up!  After six months of training in the Heart Kingdom, Asta and his fellow magic knights are ready to show off their improvements. Will Asta’s muscles be enough when the devil-powered Spade Kingdom begins their invasion, or will he need some new tricks?', '1974720004', 'Manga', 'Yuki Tabata', 424, 'black-clover.jpg', 192, 12, 8),
(13, 'Boruto Two Blue Vortex Vol-1', 'Three years later, Sarada has failed to convince Eighth Hokage Shikamaru Nara of Boruto\'s innocence. Code attacks the village with an army of monsters, but Boruto arrives to help fight them off. Shikamaru and the rest of the village are forced to put off dealing with Boruto until they are done fighting Code. Though Boruto defeats Code, Kawaki attacks the former, allowing Code to flee before Boruto can get information about the Ten-Tails from him. Boruto uses the Flying Thunder God Technique from his grandfather Minato Namikaze, the Fourth Hokage, to teleport to the dimension where Code and Ten-Tails are. Koji Kashin supports him while Boruto sits next to the tree where Sasuke is trapped.', '1974743360', 'Manga', 'Masashi Kishimoto', 720, 'boruto.jpg', 88, 12, 12),
(14, 'Uzumaki Vol-1', 'Shortly after Shuichi Saito\'s father becomes obsessed with spiral patterns, he dies mysteriously, his body positioned in the shape of a twisted coil, and soon the entire town is afflicted with a snail-like disease. A Graphic Novel. Original.', '1569317143', 'Manga', 'Junji Ito', 400, 'uzumaki.png', 648, 12, 9),
(15, 'Vegabond Vol-37', 'He lives in the sword, and transforms into a demon. It lives in the earth, and dies in the earth. The solitary discipline of a single life, dedicated to the sword of the present by Musashi, and entrusted to the land of the future by Shuusaku. Two incompatible ways of living intersect through the fragile life of rice, bearing unexpected fruit in his heart.', '8416243662', 'Manga', 'Takehiko Inoue', 1474, 'vegabond-vol37.jpg', 200, 12, 10),
(16, 'Vegabond Vol-30', 'Eisner-award nominated creator Takehiko Inoue’s critically acclaimed take on the life of Miyamoto Mushashi. Transcends the potential of what manga can be.  Striving for enlightenment by way of the sword, Miyamoto Musashi is prepared to cut down anyone who stands in his way. Vagabond is an action-packed portrayal of the life and times of the quintessential warrior-philosopher--the most celebrated samurai of all time!  The greatest samurai duel in the history of Japan between Miyamoto Musashi and Sasaki Kojiro draws closer as their different intertwining paths head toward their imminent conclusion. For now, Kojiro finds himself in a new position as sword instructor to the powerful Hosokawa Clan in Kokura. Meanwhile, Musashi is still dealing with the aftermath of singlehandedly destroying the mighty Yoshioka School.', '1421549309', 'Manga', 'Takehiko Inoue', 1320, 'vegabond-vol30.jpg', 200, 12, 10),
(17, 'Kagurabachi', 'Chihiro Rokuhira, the son of a renowned blacksmith who forged six enchanted swords, seeks a bloody revenge against a gang of sorcerers with the help of a seventh enchanted sword forged by his father before he was assassinated.', 'kagurabachi', 'Manga', 'Takeru Hokazono', 489, 'kagurabachi.jpg', 260, 12, 17),
(18, 'The Silent Patient ', 'Alicia Berenson’s life is seemingly perfect. A famous painter married to an in-demand fashion photographer, she lives in a grand house with big windows overlooking a park in one of London’s most desirable areas. One evening her husband Gabriel returns home late from a fashion shoot, and Alicia shoots him five times in the face, and then never speaks another word.  Alicia’s refusal to talk, or give any kind of explanation, turns a domestic tragedy into something far grander, a mystery that captures the public imagination and casts Alicia into notoriety. The price of her art skyrockets, and she, the silent patient, is hidden away from the tabloids and spotlight at the Grove, a secure forensic unit in North London.  Theo Faber is a criminal psychotherapist who has waited a long time for the opportunity to work with Alicia. His determination to get her to talk and unravel the mystery of why she shot her husband takes him down a twisting path into his own motivations—a search for the truth that threatens to consume him....', '1409181634', 'Thriller', 'Alex Michaelides', 218, 'the silent patient.jpg', 352, 7, 3),
(19, 'I Hear You', 'Most expectant mothers talk to their unborn. But what if the unborn starts to respond? Mahika is hoping that a baby will breathe new life into her dead marriage. But all her pregnancies meet the same fate, because no baby is perfect for Shivam, her genius geneticist husband. Until there is one. Rudra, the world\'s first genetically altered foetus, is Shivam\'s perfect creation and Mahika\'s last hope. The six-week-pregnant Mahika has just walked into her fertility clinic when she discovers an anonymous note that discloses the ugly truth behind her pregnancy. Before Mahika can come to terms with the fact that her husband\'s quest for perfection has marked its territory in her womb, she finds herself locked in her own house. But then she discovers that her unborn son has extraordinary powers. As weeks pass by, Rudra calibrates and recalibrates his powers with one aim-Mahika\'s freedom. But Rudra needs more than his newly acquired powers to free his mother. He needs to betray his creator, his father. And he must do it before it\'s too late.', '0143460242', 'Thriller', 'Nidhi Upadhyay', 170, 'i-hear-you.jpg', 288, 7, 11),
(20, 'The Psychology of Money', 'Doing well with money isn\'t necessarily about what you know. It\'s about how you behave. And behavior is hard to teach, even to really smart people. Money--investing, personal finance, and business decisions--is typically taught as a math-based field, where data and formulas tell us exactly what to do. But in the real world people don\'t make financial decisions on a spreadsheet. They make them at the dinner table, or in a meeting room, where personal history, your own unique view of the world, ego, pride, marketing, and odd incentives are scrambled together. In The Psychology of Money, award-winning author Morgan Housel shares 19 short stories exploring the strange ways people think about money and teaches you how to make better sense of one of life\'s most important topics.', '9390166268', 'Self-Help', 'Morgan Housel', 310, 'pom.jpg', 252, 9, 13),
(21, 'One Piece Vol-103', 'The series focuses on Monkey D. Luffy—a young man made of rubber after unintentionally eating a Devil Fruit—who sets off on a journey from the East Blue Sea to find the deceased King of the Pirates Gol D. Roger\'s ultimate treasure known as the \"One Piece\", and take over his prior title. In an effort to organize his own crew, the Straw Hat Pirates,[Jp 15] Luffy rescues and befriends a pirate hunter and swordsman named Roronoa Zoro, and they head off in search of the titular treasure. They are joined in their journey by Nami, a money-obsessed thief and navigator; Usopp, a sniper and compulsive liar; and Sanji, an amorous but chivalrous cook. They acquire a ship, the Going Merry[Jp 16]—later replaced by the Thousand Sunny[Jp 17]—and engage in confrontations with notorious pirates. As Luffy and his crew set out on their adventures, others join the crew later in the series, including Tony Tony Chopper, an anthropomorphized reindeer doctor; Nico Robin, an archaeologist and former Baroque Works assassin; Franky, a cyborg shipwright; Brook, a skeleton musician and swordsman; and Jimbei, a whale shark-type fish-man and former member of the Seven Warlords of the Sea who becomes their helmsman. Together, they encounter other pirates, bounty hunters, criminal organizations, revolutionaries, secret agents, different types of scientists, soldiers of the morally-ambiguous World Government, and various other friends and foes, as they sail the seas in pursuit of their dreams.', '1974738700', 'Manga\r\n', 'Eiichiro Oda', 835, 'one piece.jpg', 232, 12, 14),
(22, 'Ikigai', 'Ikigai can describe having a sense of purpose in life,[2][3] as well as being motivated.[4] According to a study by Michiko Kumano, feeling ikigai as described in Japanese usually means the feeling of accomplishment and fulfillment that follows when people pursue their passions.[5] Activities that generate the feeling of ikigai are not forced on an individual; they are perceived as being spontaneous and undertaken willingly, and thus are personal and depend on a person\'s inner self.[6]  According to psychologist Katsuya Inoue, ikigai is a concept consisting of two aspects: \"sources or objects that bring value or meaning to life\" and \"a feeling that one\'s life has value or meaning because of the existence of its source or object\". Inoue classifies ikigai into three directions – social ikigai, non-social ikigai, and anti-social ikigai – from a social perspective. Social ikigai refers to ikigai that are accepted by society through volunteer activities and circle activities. An asocial ikigai is an ikigai that is not directly related to society, such as faith or self-discipline. Anti-social ikigai refers to ikigai, which is the basic motivation for living through dark emotions, such as the desire to hate someone or something or to continue having a desire for revenge.', '1786330895', 'Self-Help', 'Hector Gracia', 350, 'ikigai.jpg', 208, 9, 15),
(23, 'Moon Knight #30', 'I AM MOON KNIGHT! The mysterious Mr. Knight has opened his Midnight Mission, his people petitioning for protection from the weird and horrible. The Moon Knight stalks the rooftops and alleys marked with his crescent moon tag, bringing violence to any who would harm his people. Marc Spector, in whichever guise he dons, is back on the streets, a renegade priest of an unworthy god. But while Khonshu languishes in a prison that Moon Knight put him in, Moon Knight must still observe his duty: protecting those who travel at night. Let it be known – Moon Knight will keep the faith.', '75960620137203011', 'Comic', 'Jed Mackay', 520, 'moonknight.jpg', 0, 1, 29),
(24, 'The Hidden Hindu 3', 'Who is Devdhwaja: Nagendra or Om? Parimal and LSD struggle to trust each other while Nagendra is resurrected from the dead, unharmed and more powerful than ever before. Parashurama and Kripacharya are trapped in the collapsed Om\'s past while Vrishkapi is fighting against certain death, which has already consumed Milarepa. Leaving the mighty Ashwatthama clueless, the other immortals are dismantled from all fronts. Where are the remaining words hidden? Will Nagendra find them all and complete the verse, or will the immortals be able to stop him? Unravel the unexpected mystery of the doomed immortals, running out of time.', '0143456555', 'Religious fiction', 'Akshat Gupta', 194, 'the hidden hindu 3.jpg', 256, 2, 2),
(25, 'It Starts with Us', 'Before It Ends with Us, it started with Atlas. Colleen Hoover tells fan favorite Atlas’s side of the story and shares what comes next in this long-anticipated sequel to the “glorious and touching” (USA TODAY) #1 New York Times bestseller It Ends with Us.  Lily and her ex-husband, Ryle, have just settled into a civil coparenting rhythm when she suddenly bumps into her first love, Atlas, again. After nearly two years separated, she is elated that for once, time is on their side, and she immediately says yes when Atlas asks her on a date.  But her excitement is quickly hampered by the knowledge that, though they are no longer married, Ryle is still very much a part of her life—and Atlas Corrigan is the one man he will hate being in his ex-wife and daughter’s life.  Switching between the perspectives of Lily and Atlas, It Starts with Us picks up right where the epilogue for the “gripping, pulse-pounding” (Sarah Pekkanen, author of Perfect Neighbors) bestselling phenomenon It Ends with Us left off. Revealing more about Atlas’s past and following Lily as she embraces a second chance at true love while navigating a jealous ex-husband, it proves that “no one delivers an emotional read like Colleen Hoover” (Anna Todd, New York Times bestselling author).', '1668001225', 'Romance', 'Colleen Hoover', 599, 'it start with us.webp', 336, 8, 21),
(37, 'Rich Dad Poor Dad', 'April of 2022 marks a 25-year milestone for the personal finance classic Rich Dad Poor Dad that still ranks as the #1 Personal Finance book of all time. And although 25 years have passed since Rich Dad Poor Dad was first published,readers will find that very little in the book itself has changed ― and for good reason. While so much in our world is changing a high speed, the lessons about money and the principles of Rich Dad Poor Dad haven’t changed. Today, as money continues to play a key role in our daily lives, the messages in Robert Kiyosaki’s international bestseller are more timely and more important than ever.', '1612681131', 'Self-Help', 'Robert T. Kiyosaki', 429, 'rich-dad-poor-dad-cover.jpg', 0, 0, 0),
(38, 'Doglapan: The Hard Truth about Life and Start-Ups', 'This is the unfettered story of Ashneer Grover-the favourite and misunderstood poster boy of Start-up India. Raw, gut-wrenching in its honesty and completely from the heart, this is storytelling at its finest.  A young boy with a \'refugee\' tag growing up in Delhi\'s Malviya Nagar outpaces his circumstances by becoming a rank-holder at the pinnacle of academic excellence in India-IIT Delhi. He goes on to do an MBA from the hallowed halls of IIM Ahmedabad, builds a career as an investment banker at Kotak Investment Banking and AmEx, and is pivotal in the making of two unicorns-Grofers, as CFO, and BharatPe, as co-founder.  As a judge on the popular TV show Shark Tank India, Ashneer becomes a household name even as his life turns upside down. Controversy, media spotlight, garrulous social media chatter descend, making it difficult to distinguish fact from fiction.', '0670097111', 'Business', 'Ashneer Grover', 290, 'doglapan.webp', 0, 0, 0),
(39, 'KARMA: A YOGI\'S GUIDE TO CRAFTING YOUR DESTINY', 'A new perspective on the overused and misunderstood concept of \"karma\" that offers the key to happiness and enlightenment, from the New York Times bestselling author and world-renowned spiritual master Sadhguru.  What is karma? Most people understand karma as a balance sheet of good and bad deeds, virtues and sins. The mechanism that decrees that we cannot evade the consequences of our own actions. In reality, karma has nothing to do with reward and punishment. Karma simply means action: your action, your responsibility. It isn\'t some external system of crime and punishment, but an internal cycle generated by you. Accumulation of karma is determined only by your intention and the way you respond to what is happening to you. Over time, it\'s possible to become ensnared by your own unconscious patterns of behavior.  In Karma, Sadhguru seeks to put you back in the driver\'s seat, turning you from a terror-struck passenger to a confident driver navigating the course of your own destiny. By living consciously and fully inhabiting each moment, you can free yourself from the cycle. Karma is an exploration and a manual, restoring our understanding of karma to its original potential for freedom and empowerment instead of a source of entanglement. Through Sadhguru\'s teachings, you will learn how to live intelligently and joyfully in a challenging world.', ' 0143452673', 'Psychological', 'Sadhguru', 169, 'karma.jpg', 0, 0, 0),
(40, 'Harry Potter and the Chamber of Secrets', 'Harry Potter\'s summer has included the worst birthday ever, doomy warnings from a house-elf called Dobby, and rescue from the Dursleys by his friend Ron Weasley in a magical flying car! Back at Hogwarts School of Witchcraft and Wizardry for his second year, Harry hears strange whispers echo through empty corridors - and then the attacks start. Students are found as through turned to stone . Dobby\'s sinister predictions seem to be coming true.These new editions of the classic and internationally bestselling, multi-award-winning series feature instantly pick-up-able new jackets by Jonny Duddle, with huge child appeal, to bring Harry Potter to the next generation of readers. It\'s time to PASS THE MAGIC ON .', ' 1408855666', 'Fantasy', 'J.K. Rowling', 389, 'harry_potter_and_the_chamber_of_secrets.jpeg', 0, 0, 0),
(41, 'Harry Potter and the Prisoner of Azkaban', 'When the Knight Bus crashes through the darkness and screeches to a halt in front of him, it\'s the start of another far from ordinary year at Hogwarts for Harry Potter. Sirius Black, escaped mass-murderer and follower of Lord Voldemort, is on the run - and they say he is coming after Harry. In his first ever Divination class, Professor Trelawney sees an omen of death in Harry\'s tea leaves . But perhaps most terrifying of all are the Dementors patrolling the school grounds, with their soul-sucking kiss.  These new editions of the classic and internationally bestselling, multi-award-winning series feature instantly pick-up-able new jackets by Jonny Duddle, with huge child appeal, to bring Harry Potter to the next generation of readers. It\'s time to PASS THE MAGIC ON .', ' 1408855674', 'Fantasy', 'J.K. Rowling', 416, 'harry_potter_azkaban.jpeg', 0, 0, 0),
(43, 'Harry Potter And The Order Of The Phoenix', 'Dumbledore lowered his hands and surveyed Harry through his half-moon glasses. \'It is time,\' he said, \'for me to tell you what I should have told you five years ago, Harry. Please sit down. I am going to tell you everything.\' Harry Potter is due to start his fifth year at Hogwarts School of Witchcraft and Wizardry. He is desperate to get back to school and find out why his friends Ron and Hermione have been so secretive all summer. However, what Harry is about to discover in his new year at Hogwarts will turn his whole world upside down ...But before he even gets to school, Harry has an unexpected and frightening encounter with two Dementors, has to face a court hearing at the Ministry of Magic and has been escorted on a night-time broomstick ride to the secret headquarters of a mysterious group called \'The Order of the Phoenix\'. And that is just the start. A gripping and electrifying novel, full of suspense, secrets, and - of course - magic.', '0747591261', 'Fantasy', 'J.K. Rowling', 391, 'harrypotter-phoenix.jpg', 0, 0, 0),
(44, 'Jujutsu Kaisan Vol-14', 'While Sukuna, who has been temporarily unleashed, is wrecking Shibuya, Fushiguro suffers a serious injury from a curse user who caught him unawares. Fushiguro comes up with a desperate plan to deal with both the rampaging Sukuna and the curse user, but it comes with grave consequences…', '1974725324', 'Manga', 'Gege AkutamiGege Akutami', 777, 'jjk.jpg', 0, 0, 0),
(45, 'The Kid Who Came From Space', 'The stunning new 10+ story from the bestselling and award-winning author of time travelling with a hamster, for anyone who loved the humour of wall-e, the action of star Wars and the deeply touching emotion of et. A small village in the wilds of northumberland is rocked by the disappearance of twelve-year-old Tammy. Only her twin brother, Ethan, knows she is safe  and the extraordinary truth of where she is. It is a secret he must keep, or risk never seeing her again. But that doesn\'t mean hes going to give up. Together with his friend Iggy and the mysterious (and very hairy) hellyann, Ethan teams up with a spaceship called Philip, and Suzy the trained chicken, for a nail-biting chase to get his sister backthat will take him further than anyone has ever been before.', '0008333785', 'Science Fiction', 'Ross WelfordRoss Welford', 281, 'the-kid-who-come-from-space.jpg', 0, 0, 0),
(46, 'House of Dragons', 'Five royal houses will hear the call to compete in the Trial for the dragon throne. A liar, a soldier, a servant, a thief, and a murderer will answer it. Who will win?  When the Emperor dies, the five royal houses of Etrusia attend the Call, where one of their own will be selected to compete for the throne. It is always the oldest child, the one who has been preparing for years to compete in the Trial. But this year is different. This year, these five outcasts will answer the call....  THE LIAR: Emilia must hide her dark magic or be put to death.  THE SOLDIER: Lucian is a warrior who has sworn to never lift a sword again.  THE SERVANT: Vespir is a dragon trainer whose skills alone will keep her in the game.  THE THIEF: Ajax knows that nothing is free--he must take what he wants.  THE MURDERER: Hyperia was born to rule and will stop at nothing to take her throne.', '0525648151', 'Fantasy', 'Jessica Cluess', 999, 'house-of-dragon.jpg', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(20) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `user_type`) VALUES
(1, 'Mohit Kumar', 'mohitkumar300902@gmail.com', '6f8f57715090da2632453988d9a1501b', 'admin'),
(2, 'Mohit Kumar', 'mk0685573@gmail.com', '6f8f57715090da2632453988d9a1501b', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`author_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
