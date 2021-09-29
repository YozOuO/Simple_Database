-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2018-01-10 06:17:06
-- Server Version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ezgame_database`
--

-- --------------------------------------------------------

--
-- TABLE `card`
--

CREATE TABLE `card` (
  `Card_id` int(10) UNSIGNED NOT NULL,
  `Card_number` char(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Card_value` int(5) UNSIGNED NOT NULL,
  `Card_change_date` date NOT NULL,
  `Card_state` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- INSERT DATA INTO TABLE `card`
--

INSERT INTO `card` (`Card_id`, `Card_number`, `Card_value`, `Card_change_date`, `Card_state`, `user_id`) VALUES
(1, '000000000100100', 100, '2018-01-09', 'N', 2),
(2, '000000000201000', 1000, '0000-00-00', 'Y', 0),
(3, '000000000302000', 2000, '0000-00-00', 'Y', 0),
(4, '000000000405000', 5000, '0000-00-00', 'Y', 0),
(5, '000000000510000', 10000, '0000-00-00', 'Y', 0);

-- --------------------------------------------------------

--
-- TABLE `developer`
--

CREATE TABLE `developer` (
  `Developer_id` int(10) UNSIGNED NOT NULL,
  `Developer_account` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Developer_password` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Developer_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Developer_charger` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Developer_company_number` int(8) UNSIGNED NOT NULL,
  `Developer_phone_number` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Developer_address` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Developer_amount` int(10) UNSIGNED NOT NULL,
  `Developer_state` char(1) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- INSERT DATA INTO TABLE `developer`
--

INSERT INTO `developer` (`Developer_id`, `Developer_account`, `Developer_password`, `Developer_name`, `Developer_charger`, `Developer_company_number`, `Developer_phone_number`, `Developer_address`, `Developer_amount`, `Developer_state`) VALUES
(0, 'NULL', 'password', 'NULL', 'NULL', 0, 'NULL', 'NULL', 0, 'N'),
(1, 'Rockstar', 'password', 'R星', '老崔', 1, '0000000001', '美國', 180, 'Y'),
(2, 'Ubisoft', 'password', '育碧', '八哥(BUG)', 2, '0000000002', '法國', 0, 'Y'),
(3, 'Blizzard', 'password', '暴雪影業', '爸爸', 3, '0000000003', '美國', 792, 'Y'),
(4, 'Valve', 'password', 'V社', 'G胖', 4, '0000000004', '美國', 136, 'Y');

-- --------------------------------------------------------

--
-- TABLE `game`
--

CREATE TABLE `game` (
  `Game_id` int(10) UNSIGNED NOT NULL,
  `Game_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Game_price` int(5) UNSIGNED NOT NULL,
  `developer_id` int(10) UNSIGNED NOT NULL,
  `developer_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Game_up_date` date NOT NULL,
  `Game_size` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Game_good` int(10) UNSIGNED NOT NULL,
  `Game_bad` int(10) UNSIGNED NOT NULL,
  `Game_introduction` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Game_img` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Game_download` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Game_state` char(1) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- INSERT DATA INTO TABLE `game`
--

INSERT INTO `game` (`Game_id`, `Game_name`, `Game_price`, `developer_id`, `developer_name`, `Game_up_date`, `Game_size`, `Game_good`, `Game_bad`, `Game_introduction`, `Game_img`, `Game_download`, `Game_state`) VALUES
(1, 'Counter-Strike: Global Offensive', 48, 4, 'V社', '2012-08-22', '15GB', 2114522, 239012, '《反恐精英：全球攻勢》（CS: GO）在團隊競技遊戲模式的基礎上加以開發，這一模式自 12 年前發布以來一直引領至今。\r\n\r\nCS: GO 的特色是全新的地圖、人物、武器以及最新版本的 CS 經典內容（de_dust2 等）。此外，CS: GO 引入了全新的遊戲模式、對戰匹配、排行榜以及更多新的內容。\r\n\r\n“當《反恐精英》於 1999 年 8 月發售時，這個並不靠譜的模組立刻成為了世界上擁有玩家數量最多的線上 PC 動作遊戲，遊戲業為之一驚。”Valve 的 Doug Lombardi 如是說道。“在過去的 12 年中，它一直是世界上擁有玩家數量最多的遊戲之一，引領著競技遊戲賽事，並且在全球創下了超過 2500 萬套的遊戲銷量。CS: GO 承諾將增強屢獲殊榮的 CS 系列之遊戲體驗，並把它帶給 PC 平台、次世代主機平台和 Mac 平台的玩家。”', '/img_game/1.jpg', 'https://drive.google.com/file/d/1wAf3jr8wcO9YOeXL2pVPf9GuhVskTA9E/view?usp=sharing', 'Y'),
(2, 'Overwatch', 198, 3, '暴雪影業', '2017-05-24', '12GB', 1, 0, '在《守望先鋒》這款團隊射擊遊戲中，你將控制許多風格迥異的英雄中的其中一個，與戰友組成一支六人隊伍，和對手搶奪目標、決一死戰並奪取最終的勝利！', '/img_game/2.jpg', 'https://drive.google.com/file/d/1wAf3jr8wcO9YOeXL2pVPf9GuhVskTA9E/view?usp=sharing', 'Y'),
(3, 'Grand Theft Auto V', 180, 1, 'R星', '2015-04-14', '72GB', 247442, 115495, '一個初涉江湖的街頭新丁、一個洗手多年的銀行劫匪和一個喪心病狂的殺人狂魔，誤打誤撞中深陷犯罪集團、美國政府和娛樂產業之間盤根錯雜的恐怖困境。他們必須齊心協力，接連完成九死一生的驚天劫案，才能在這個冷血無情的城市中苟延殘喘。不要相信任何人，尤其是你的同夥！ \r\n\r\nPC 版Grand Theft Auto V 能夠以超越 4K 的最高分辨率和 60 幀每秒的幀率，為您呈現屢獲殊榮、令人痴迷的遊戲世界——洛桑托斯市和布雷恩郡。 \r\n\r\n遊戲為 PC 玩家提供了巨細無遺的獨享自定義選項，包括紋理質量、著色器、曲面細分、反鋸齒等超過 25 種不同設定，還有支持鍵鼠操控的廣泛自定義功能。其他選項包括可控制車輛和行人流量的人口密度滑桿，以及對雙屏、三屏、3D 和即插即用手柄的支持。\r\n\r\nGrand Theft Auto V 同時包含 Grand Theft Auto 在線模式，這個活力四射、瞬息萬變的聯網世界支持多達 30 位玩家同時進行遊戲，並且囊括了自發布以來的所有遊戲升級以及內容更新。您可以憑藉非法貿易發家致富，以 CEO 的身份一手打造自己的犯罪帝國；創立摩托車會以稱霸街頭；攜手好友上演逆天搶劫任務；體驗命懸一線的特技競速；在獨特的競爭模式中一展身手；更可以信馬由韁，親手為遊戲創作新內容，並與全世界的 GTA 玩家共享。\r\n\r\nPC 版 Grand Theft Auto V 和 GTA 在線模式同時提供第一視角模式，讓玩家能夠以全新方式探索遊戲中洛桑托斯市和布雷恩郡細膩逼真、令人驚艷的種種細節。 \r\n\r\n隨著 PC 版 Grand Theft Auto V 的推出，Rockstar 編輯器也一併登場。作為一套功能強大的創作工具，它能讓玩家快速輕鬆地錄製、編輯和分享在 Grand Theft Auto V 及 GTA 在線模式中的遊戲影像。Rockstar 編輯器的導演模式能讓玩家使用故事模式中的主要角色、路人，甚至是動物進行搭台布景，任由玩家天馬行空，隨心創作。除了高級鏡頭控制和剪輯特效 （包括快動作和慢動作） 以及多種鏡頭濾鏡以外，玩家還可以將遊戲中的電台曲目作為配樂，或者對遊戲配樂的強度進行動態控制。影片製作完成後，可以直接從 Rockstar 編輯器上傳至社交網絡和 Rockstar Games Social Club，與其他玩家輕鬆分享您的遊戲激情。 \r\n\r\n遊戲原聲音樂的創作者 The Alchemist 和 Oh No 同時回歸遊戲，作為 The Lab FM 電台的主持人。這個電台主打二者以遊戲原聲音樂為靈感創作的全新獨家曲目，合作藝人包括 Earl Sweatshirt、Freddie Gibbs、Little Dragon、Killer Mike、Future Islands 的 Sam Herring 等等。此外，玩家也可以在洛桑托斯市和布雷恩郡尋幽探勝之際，通過由個人電台創建的自定義歌單，聆聽屬於自己的音樂。', '/img_game/3.jpg', 'https://drive.google.com/file/d/1wAf3jr8wcO9YOeXL2pVPf9GuhVskTA9E/view?usp=sharing', 'Y'),
(4, 'Tom Clancy’s Rainbow Six® Siege', 168, 2, '育碧', '2015-12-02', '30GB', 134369, 23084, '《彩虹六號：圍攻》是育碧蒙特利爾工作室旗下即將推出的知名第一人稱射擊模擬系列遊戲的最新作品，專為新一代遊戲機和主機開發，屬於《彩虹六號》系列。該作靈感來源於現實世界中的反恐行動，《彩虹六號：圍攻》誠邀玩家掌控破壞的藝術，遊戲核心是對激烈的近距離對抗，高殺傷力，戰術，團隊合作和爆破行動。《彩虹六號：圍攻》的多人模式繼承系列前作的精髓，為激烈的交火和戰略交鋒創造了新場所。\r\n\r\n遊戲特色\r\n\r\n反恐單位：反恐行動人員被訓練來處理極端情況，比如解救人質，同時進行高精度行動。作為“微距”的專家，他們的訓練主要在室內環境中進行。身處嚴密的編隊，他們是近距離作戰、拆除和協調進攻的專家。《彩虹六號：圍攻》將包括五個世界著名的反恐組織：英國SAS，美國SWAT，法國GIGN，德國GSG9，俄羅斯SPETSNAZ。\r\n\r\n圍攻的遊戲玩法：在彩虹六號中，玩家將首次參與圍攻——一種全新的攻擊方式。敵人能夠把他們所處的環境改造為據點：他們可以設下陷阱，構築防禦工事，並建立防禦系統以阻擋彩虹部隊的突破。為了應對這一挑戰，玩家將獲得《彩虹六號》系列前作無法比擬的高自由度。結合戰術地圖，無人機偵察和全新的繩索系統，彩虹部隊比以往有了更多的選擇來布局，進攻和分散行軍，以應對這些情況。\r\n\r\n程序性破壞：破壞是圍攻的核心玩法。玩家有著前所未有的破壞遊戲環境的能力。墻壁可以被打穿，以開闢新的攻擊路線，天花板和地板可以被打破來創造新的突入點。環境中的一切都現實地、動態地作出反應，並且會根據你使用的子彈大小和口徑，以及你所設置的炸藥數量進行反饋。在《彩虹六號：圍攻》中，破壞是極具意義的，掌握它常常是制勝的關鍵。', '/img_game/4.jpg', 'https://drive.google.com/file/d/1wAf3jr8wcO9YOeXL2pVPf9GuhVskTA9E/view?usp=sharing', 'Y'),
(5, 'Left 4 Dead 2', 68, 4, 'V社', '2009-11-17', '13GB', 209293, 6563, '以僵屍大災難為背景，《求生之路 2》（L4D2）是 2008 年最受歡迎的合作遊戲 —《求生之路》的續集。\r\n這個恐怖的第一人稱射擊遊戲將帶領你和你的好友穿過城市，沼澤，深入南部的墓地，從沙凡那港市到新奧爾�，沿途经过 5 个漫长的战役。\r\n你会扮演四名新生还者中的一名，装备有大量先进的武器。除了枪支之外，你还会有机会用不同的近战武器在感染者上泄愤，例如电锯、斧头、甚至是致命的平底锅。\r\n你会用这些武器与 3 个新的恐怖的难对付的特殊感染者展开战斗（在对抗模式中也可以扮演这些新的特殊感染者）。你也会遭遇 5 个“不寻常”的普通感染者，例如可怕的泥人。\r\n人工智能导演系统 2.0 让《求生之路》更疯狂，有更多的动作体验。升级版的导演系统能程序化地改变沿途天气，还可以根据你的表现调整敌人的数量，效果和音效。根据你的游戏习惯，《求生之路 2》保证每次游戏都能有一个令你满意的，充满挑战的游戏体验。\r\n这是《半条命》、《传送门》、《军团要塞》和《反恐精英》等经典游戏的缔造者的新一代合作游戏。\r\n超过 20 种新武器和物品，超过10种近战武器 — 斧头、电锯、平底锅、棒球棍 — 让你和僵尸亲密接触。\r\n新的生还者。新的故事。新的对白。\r\n5 个辽阔的战役，可以在合作，对抗和生还者模式中进行。 \r\n一个新的多人游戏模式。\r\n每个战役都有专门一种“不寻常”的普通感染者。\r\n人工智能导演系统 2.0：先进技术让《求生之路》拥有独特的游戏体验 — 根据玩家的表现调整敌人数量、效果和音乐。人工智能导演系统 2.0 是《求生之路 2》的特色，它加强了导演系统的能力，能安排布局、物体、天气和灯光来表现出一天的时间变化。\r\n统计，排名，和奖励系统能促使玩家们进行协助。', '/img_game/5.jpg', 'https://drive.google.com/file/d/1wAf3jr8wcO9YOeXL2pVPf9GuhVskTA9E/view?usp=sharing', 'Y'),
(6, 'Assassin’s Creed® Origins', 248, 2, '育碧', '2017-10-27', '42G', 19608, 3060, '《ASSASSIN’S CREED® ORIGINS》是一次全新的开始\r\n\r\n王权和阴谋统治下的古埃及时代正慢慢消失在争权夺位的冷酷之战中。重返刺客兄弟会起源的最初时刻，揭开不为人知的黑暗秘密和被遗忘的神秘事件。\r\n\r\n等待发现的国度\r\n朝着尼罗河下游航行，在探索这片巨大未知国度的过程中，逐步揭开金字塔的神秘面纱，与危险的古代宗教派别和野兽展开殊死一搏。\r\n\r\n每场游历都是全新故事\r\n从富有的权贵人士到绝望的被驱逐者，跟着众多色彩鲜明、令人难忘的角色一同参与各项任务，进入扣人心弦的故事情节。\r\n\r\n畅享动作角色扮演体验\r\n感受全新的战斗方式。掠夺并使用数十款特色和稀有程度各不相同的武器。精研深度发展的机械，并迎战独特强大的头目，发挥你的战术技能。\r\n\r\n奇迹之瞳\r\n在TOBII眼动追踪的帮助下拥有全新的动作体验。视野扩展功能让您更好的感知周围环境，动态光照和阳光效应功能可以根据视线所在提供更为逼真的浸入式体验,使用眼睛标记，瞄准或是锁定目标也显得愈加自然。让您的视线引领前进的道路，提升游戏体验。\r\n兼容全部Tobii眼动追踪游戏设备\r\n---\r\n补充信息: \r\n眼动追踪特性可由Tobii眼动追踪技术实现', '/img_game/6.jpg', 'https://drive.google.com/file/d/1wAf3jr8wcO9YOeXL2pVPf9GuhVskTA9E/view?usp=sharing', 'Y'),
(7, 'Tom Clancy\'s Ghost Recon® Wildlands', 288, 2, '育碧', '2017-03-07', '50GB', 15995, 5377, '与最多 3 位好友组队加入《Tom Clancy’s Ghost Recon® Wildlands》，在这个大规模、危险及响应式开放世界中，体验终极军事射击游戏的快感。玩家还可以在 4 对 4 战术战斗《Ghost War》中，畅玩玩家对战模式。\r\n\r\n摧毁毒品集团\r\n几年前，玻利维亚成为全球最大的可卡因生产国。圣塔布兰卡毒品集团将整个国家搅得乌烟瘴气。作为一名 Ghost，你必须不惜一切手段，阻止集团。 \r\n\r\n成为 Ghost\r\n创建并个性化你的 Ghost、武器和工具。享受绝对自由的游戏风格。 单人进行或联合最多三人一起带领你的团队，摧毁毒品集团。 \r\n\r\n探索玻利维亚\r\n在 Ubisoft 最大的动作冒险开放世界中开启旅程。使用 60 多种载具，在公路、野外和海陆空三界探索 Wildlands 各种各样令人叫绝的地形景色。\r\n\r\n在Tobii眼动追踪技术的帮助下，除去圣布兰卡黑帮的游戏体验变得更为丰富。视野扩展，实现瞄准和聊天轮盘功能可以让您在不改变传统控制方式的情况下，通过自然地眼球移动完成与环境的交互。通过眼动追踪，团队交流变得更为紧密，交火变得更为激烈，对新环境探索的浸入式体验也大大提升。\r\n兼容全部Tobii眼动追踪游戏设备\r\n----\r\n补充信息: \r\n眼动追踪特性可由Tobii眼动追踪技术实现', '/img_game/7.jpg', 'https://drive.google.com/file/d/1wAf3jr8wcO9YOeXL2pVPf9GuhVskTA9E/view?usp=sharing', 'Y'),
(8, 'Portal', 68, 4, 'V社', '2007-10-10', '1GB', 42330, 872, 'Portal™ 是 Valve 新开发的单人游戏。故事背景设定在神秘的光圈科技实验室，Portal 已被誉为业界最具创意的新游戏，它将为玩家带来数十小时独一无二的游戏体验。\r\n\r\n此游戏旨在改变玩家在特定环境中处理、应付和推测可能性情况的方法；与 Half-Life® 2 的“重力枪”开辟在特定环境下处理目标的新方法类似。\r\n\r\n玩家必须通过空间打开前往操纵物体和谜题的入口，解决物理难题和挑战。', '/img_game/8.jpg', 'https://drive.google.com/file/d/1wAf3jr8wcO9YOeXL2pVPf9GuhVskTA9E/view?usp=sharing', 'Y'),
(9, 'Portal 2', 68, 4, 'V社', '2011-04-19', '8GB', 114067, 1474, 'Portal 2 用创新的游戏内容、故事以及最初 Portal 那赢得超过 70 项以上业界奖项般的配乐打造出另一个大奖赢家的继承者。\r\n\r\nPortal 2 的单人游戏部分带来充满活力的新角色、一大堆新鲜的解谜元素，以及更大、更加曲折的试验室。玩家将可以于前所未见的光圈科技实验室中探索，并且与在原游戏中引导你，偶尔想要把你杀掉的电脑陪伴者 GLaDOS 重逢。\r\n\r\n本游戏的双人合作模式将有其独立的战役内容，包含独特的故事、试验室，以及两名新的玩家角色。这项新的游戏模式让玩家必须重新思考所有他们在 Portal 中所了解到的事实。想要过关不只要一起行动，还必须一起思考。\r\n\r\n游戏特色\r\n丰富的单人游戏：次世代的游戏内容与令人注目的故事剧情。\r\n完整双人合作模式：多人连线内容具有其额外的故事、角色，以及游戏内容。\r\n高级物理系统：创造出前所未见的新领域，带来更加有趣的挑战，规模更大但不会更难的游戏。\r\n原创音乐。\r\n大作续集：全球超过 30 个媒体杂志将初代 Portal 选为 2007 年度游戏。\r\n编辑工具：Portal 2 编辑工具将会包含在内。', '/img_game/9.jpg', 'https://drive.google.com/file/d/1wAf3jr8wcO9YOeXL2pVPf9GuhVskTA9E/view?usp=sharing', 'Y'),
(10, 'Assassin’s Creed 2', 48, 2, '育碧', '2010-03-05', '8GB', 11851, 2186, '备受期待的刺客信条的续作塑造了一个全新英雄，艾吉奥·奥迪托雷——一个年轻的意大利贵族，同时塑造了全新的时代背景：文艺复兴时期。《刺客信条2》讲述了一个以古时野蛮的文艺复兴时期的意大利为背景，有关家族，复仇以及阴谋的史诗故事。艾吉奥以朋友方式帮助李奥纳多·达·芬奇，接纳了佛罗伦萨最有实力的家族并且他冒险的足迹贯穿了整条威尼斯运河，而威尼斯也正是他学着成为一个刺客大师的地方。\r\n\r\n艾吉奥，一个新时代下的新刺客：艾吉奥·奥迪托雷是一个年轻的意大利贵族。在他的家族遭到背叛后他开始学习刺客的技巧并且寻求复仇。他是一个风流潇洒的人但他的人格中有着极富人性的一面。通过他，你将逐渐成为一个刺客大师。\r\n\r\n游戏特色\r\n\r\n文艺复兴时期的意大利：15世纪的意大利与其说是一个国家，不如说是城邦的集合，在那时的意大利，拥有政治和经济实力的家族开始统治像佛罗伦萨和威尼斯这样的城市。这次的游戏历程发生在一个文化和艺术的产生都伴随着一些最精彩的关于腐败，贪婪和谋杀的故事的历史背景下，它将历经一些全世界最美丽的城市。\r\n\r\n全新自由度：你能够自由地决定什么时候以什么样的方式进行任务。在这个开放的世界中，你不仅可以自由行走同时也加入了全新的元素，像是游泳，或是飞去冒险地点。游戏体验的多样化使你可以真正的按照你选择的方式进行游戏。\r\n\r\n动态人群：探索一个栩栩如生的世界，这个世界中的每一位角色对于玩家来说都是个机会。混入人群中将变得更加容易，和游戏内的角色一同工作将会给你提供丰富的奖励，同时也会带来令人惊喜的结果。\r\n\r\n成为刺客大师：完善你的技能成为一位刺客大师。你可以挥舞着新的武器，学着解除敌人的武装并使用他们的武器来对抗他们，或是使用双手的袖剑暗杀敌人。', '/img_game/10.jpg', 'https://drive.google.com/file/d/1wAf3jr8wcO9YOeXL2pVPf9GuhVskTA9E/view?usp=sharing', 'Y');

-- --------------------------------------------------------

--
-- TABLE `game_library`
--

CREATE TABLE `game_library` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `game_id` int(10) UNSIGNED NOT NULL,
  `Transaction_date` date NOT NULL,
  `Score` int(1) NOT NULL,
  `Library_state` char(1) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- INSERT DATA INTO TABLE `game_library`
--

INSERT INTO `game_library` (`user_id`, `game_id`, `Transaction_date`, `Score`, `Library_state`) VALUES
(1, 1, '2015-07-01', 0, 'Y'),
(1, 6, '2018-01-01', 0, 'Y'),
(2, 1, '2015-07-01', 1, 'Y'),
(2, 2, '2018-01-09', 1, 'Y'),
(2, 3, '2018-01-09', 1, 'Y'),
(2, 4, '2018-01-09', 0, 'N'),
(2, 5, '2018-01-09', 0, 'N'),
(2, 6, '2018-01-10', -1, 'N'),
(2, 8, '2018-01-09', 0, 'N'),
(2, 9, '2018-01-09', 0, 'N'),
(2, 10, '2018-01-09', 0, 'N');

-- --------------------------------------------------------

--
-- TABLE `shopping_cart`
--

CREATE TABLE `shopping_cart` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `game_id` int(10) UNSIGNED NOT NULL,
  `Add_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- INSERT DATA INTO TABLE `shopping_cart`
--

INSERT INTO `shopping_cart` (`user_id`, `game_id`, `Add_date`) VALUES
(1, 7, '2018-01-08');

-- --------------------------------------------------------

--
-- TABLE `transaction_record`
--

CREATE TABLE `transaction_record` (
  `Record_id` int(15) UNSIGNED NOT NULL,
  `game_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `developer_id` int(10) UNSIGNED NOT NULL,
  `Record_amount` int(5) UNSIGNED NOT NULL,
  `Transaction_date` date NOT NULL,
  `Transaction_type` char(1) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- INSERT DATA INTO TABLE `transaction_record`
--

INSERT INTO `transaction_record` (`Record_id`, `game_id`, `user_id`, `developer_id`, `Record_amount`, `Transaction_date`, `Transaction_type`) VALUES
(0, 1, 0, 4, 0, '0000-00-00', ''),
(1, 1, 2, 4, 48, '2015-07-01', 'B'),
(2, 1, 1, 4, 48, '2015-07-01', 'B'),
(3, 6, 1, 2, 248, '2018-01-01', 'B'),
(4, 6, 1, 2, 248, '2018-01-01', 'R'),
(5, 6, 1, 2, 124, '2018-01-02', 'B'),
(6, 2, 2, 3, 198, '2018-01-08', 'B'),
(7, 2, 2, 3, 198, '2018-01-08', 'B'),
(8, 2, 2, 3, 198, '2018-01-08', 'B'),
(9, 4, 2, 2, 168, '2018-01-08', 'B'),
(10, 2, 2, 3, 198, '2018-01-09', 'B'),
(11, 3, 2, 1, 180, '2018-01-09', 'B'),
(12, 5, 2, 4, 68, '2018-01-09', 'B'),
(13, 3, 2, 1, 180, '2018-01-09', 'B'),
(14, 3, 2, 1, 180, '2018-01-09', 'B'),
(15, 3, 2, 1, 180, '2018-01-09', 'B'),
(16, 5, 2, 4, 68, '2018-01-09', 'B'),
(17, 3, 2, 1, 180, '2018-01-09', 'B'),
(18, 5, 2, 4, 68, '2018-01-09', 'B'),
(19, 10, 2, 2, 48, '2018-01-09', 'B'),
(20, 4, 2, 2, 168, '2018-01-09', 'B'),
(21, 8, 2, 4, 68, '2018-01-09', 'B'),
(22, 9, 2, 4, 68, '2018-01-09', 'B'),
(23, 2, 2, 3, 198, '2018-01-09', 'B'),
(24, 6, 2, 2, 248, '2018-01-10', 'B'),
(25, 6, 2, 2, 248, '2018-01-10', 'R'),
(26, 6, 2, 2, 248, '2018-01-10', 'R'),
(27, 10, 2, 2, 48, '2018-01-10', 'R'),
(28, 10, 2, 2, 48, '2018-01-10', 'R'),
(29, 3, 2, 1, 180, '2018-01-10', 'R'),
(30, 6, 2, 2, 248, '2018-01-10', 'B'),
(31, 6, 2, 2, 248, '2018-01-10', 'R'),
(32, 6, 2, 2, 248, '2018-01-10', 'B'),
(33, 6, 2, 2, 248, '2018-01-10', 'R'),
(34, 2, 2, 3, 198, '2018-01-10', 'R'),
(35, 2, 2, 3, 198, '2018-01-10', 'B'),
(36, 2, 2, 3, 198, '2018-01-10', 'R'),
(37, 2, 2, 3, 198, '2018-01-10', 'B'),
(38, 2, 2, 3, 198, '2018-01-10', 'R'),
(39, 4, 2, 2, 168, '2018-01-10', 'R'),
(40, 5, 2, 4, 68, '2018-01-10', 'R'),
(41, 8, 2, 4, 68, '2018-01-10', 'R'),
(42, 9, 2, 4, 68, '2018-01-10', 'R'),
(43, 10, 2, 2, 48, '2018-01-10', 'B'),
(44, 10, 2, 2, 48, '2018-01-10', 'R'),
(45, 3, 2, 1, 180, '2018-01-10', 'B'),
(46, 3, 2, 1, 180, '2018-01-10', 'R'),
(47, 2, 2, 3, 198, '2018-01-10', 'B'),
(48, 2, 2, 3, 198, '2018-01-10', 'R'),
(49, 2, 2, 3, 198, '2018-01-10', 'B'),
(50, 3, 2, 1, 180, '2018-01-10', 'B');

-- --------------------------------------------------------

--
-- TABLE `user`
--

CREATE TABLE `user` (
  `User_id` int(10) UNSIGNED NOT NULL,
  `User_account` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `User_password` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `User_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `User_birthday` date NOT NULL,
  `User_idcard_number` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `User_phone_number` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `User_gender` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `User_amount` int(10) UNSIGNED NOT NULL,
  `User_state` char(1) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- INSERT DATA INTO TABLE `user`
--

INSERT INTO `user` (`User_id`, `User_account`, `User_password`, `User_name`, `User_birthday`, `User_idcard_number`, `User_phone_number`, `User_gender`, `User_amount`, `User_state`) VALUES
(0, 'NULL', 'password', 'NULL', '0000-00-00', 'N000000000', '0000000000', 'M', 0, 'N'),
(1, 'HY', 'password', '黃宥', '1996-06-06', 'N000000001', '+8860978010831', 'M', 87, 'Y'),
(2, 'HHJ', 'password', '黃漢傑', '1997-03-31', 'N000000002', '+8615392021485', 'M', 999996418, 'Y'),
(3, 'HCA', 'password', '洪誠安', '2018-01-04', 'N444444444', '+8865948759487', 'M', 0, 'N'),
(4, 'BBQ', 'password', 'BBQ', '2002-02-02', '1234567890', '1122334455', 'F', 0, 'Y'),
(5, 'qwq', '123456', 'QWQ', '2018-01-01', '213456', '54645645', 'F', 0, 'Y'),
(6, 'fuk', '133', 'fuker', '2018-01-01', '456789', '123456798', 'F', 0, 'Y'),
(7, 'qwe', '133', 'fuker', '2018-01-01', '456789', '123456798', 'M', 0, 'Y'),
(8, 'sora', '1111', 'SORA', '2018-01-01', '213456213', '213123213213', 'M', 0, 'Y'),
(9, 'sad', 'sad', 'sad', '2018-01-01', 'sad', 'sad', 'M', 0, 'Y'),
(10, 'RBQ', '123456', 'I_am_rbq', '2000-01-01', '1234567890', '1234567890', 'F', 0, 'Y');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`Card_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `developer`
--
ALTER TABLE `developer`
  ADD PRIMARY KEY (`Developer_id`),
  ADD UNIQUE KEY `Developer_name` (`Developer_name`),
  ADD UNIQUE KEY `Developer_account` (`Developer_account`);

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`Game_id`),
  ADD UNIQUE KEY `Game_name` (`Game_name`),
  ADD KEY `developer_name` (`developer_name`),
  ADD KEY `developer_id` (`developer_id`);

--
-- Indexes for table `game_library`
--
ALTER TABLE `game_library`
  ADD PRIMARY KEY (`user_id`,`game_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `game_id` (`game_id`);

--
-- Indexes for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD PRIMARY KEY (`user_id`,`game_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `game_id` (`game_id`);

--
-- Indexes for table `transaction_record`
--
ALTER TABLE `transaction_record`
  ADD PRIMARY KEY (`Record_id`),
  ADD KEY `game_id` (`game_id`),
  ADD KEY `developer_id` (`developer_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`User_id`),
  ADD UNIQUE KEY `User_account` (`User_account`);

--
-- Restriction of TABLE
--

--
-- Restrict TABLE `card`
--
ALTER TABLE `card`
  ADD CONSTRAINT `card_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`User_ID`);

--
-- Restrict TABLE `game`
--
ALTER TABLE `game`
  ADD CONSTRAINT `game_ibfk_1` FOREIGN KEY (`developer_name`) REFERENCES `developer` (`Developer_name`) ON UPDATE CASCADE,
  ADD CONSTRAINT `game_ibfk_2` FOREIGN KEY (`developer_id`) REFERENCES `developer` (`Developer_id`) ON UPDATE CASCADE;

--
-- Restrict TABLE `game_library`
--
ALTER TABLE `game_library`
  ADD CONSTRAINT `game_library_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`User_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `game_library_ibfk_2` FOREIGN KEY (`game_id`) REFERENCES `game` (`Game_id`) ON UPDATE CASCADE;

--
-- Restrict TABLE `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD CONSTRAINT `shopping_cart_ibfk_1` FOREIGN KEY (`game_id`) REFERENCES `game` (`Game_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `shopping_cart_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`User_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrict TABLE `transaction_record`
--
ALTER TABLE `transaction_record`
  ADD CONSTRAINT `transaction_record_ibfk_1` FOREIGN KEY (`game_id`) REFERENCES `game` (`Game_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `transaction_record_ibfk_2` FOREIGN KEY (`developer_id`) REFERENCES `developer` (`Developer_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `transaction_record_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`User_ID`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
