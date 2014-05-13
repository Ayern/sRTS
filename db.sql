--
-- Table structure for table `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `attacker` int(11) NOT NULL,
  `defender` int(11) NOT NULL,
  `attacker_damage` bigint(20) unsigned NOT NULL,
  `defender_damage` bigint(20) unsigned NOT NULL,
  `gold` bigint(20) unsigned NOT NULL,
  `food` bigint(20) unsigned NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `logs`
--


-- --------------------------------------------------------

--
-- Table structure for table `ranking`
--

CREATE TABLE IF NOT EXISTS `ranking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `attack` int(11) NOT NULL,
  `defense` int(11) NOT NULL,
  `overall` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `ranking`
--


-- --------------------------------------------------------

--
-- Table structure for table `res_bank`
--

CREATE TABLE IF NOT EXISTS `res_bank` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gold` int(11) unsigned NOT NULL,
  `food` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `res_bank`
--


-- --------------------------------------------------------

--
-- Table structure for table `stats`
--

CREATE TABLE IF NOT EXISTS `stats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gold` bigint(20) unsigned NOT NULL,
  `attack` bigint(20) unsigned NOT NULL,
  `defense` bigint(20) unsigned NOT NULL,
  `food` bigint(20) unsigned NOT NULL,
  `income` int(11) unsigned NOT NULL,
  `farming` int(11) unsigned NOT NULL,
  `turns` int(11) NOT NULL,
  `wins` int(11) NOT NULL,
  `diamonds` bigint(20) unsigned NOT NULL,
  `quests` bigint(20) unsigned NOT NULL,
  `mobs` bigint(20) unsigned NOT NULL,
  `experience` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `stats`
--


-- --------------------------------------------------------

--
-- Table structure for table `tool`
--

CREATE TABLE IF NOT EXISTS `tool` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `trowel` int(20) unsigned NOT NULL,
  `pickaxe` int(20) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tool`
--


-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE IF NOT EXISTS `unit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `worker` int(11) NOT NULL,
  `farmer` int(11) NOT NULL,
  `warrior` int(11) NOT NULL,
  `defender` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `unit`
--


-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `user`
--


-- --------------------------------------------------------

--
-- Table structure for table `weapon`
--

CREATE TABLE IF NOT EXISTS `weapon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sword` int(11) unsigned NOT NULL,
  `shield` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `weapon`
--

