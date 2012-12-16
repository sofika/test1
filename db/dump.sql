CREATE TABLE IF NOT EXISTS `user` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(32) COLLATE utf8_bin NOT NULL,
  `lastname` varchar(32) COLLATE utf8_bin NOT NULL,
  `usermail` varchar(64) COLLATE utf8_bin NOT NULL,
  `password` varchar(32) COLLATE utf8_bin NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `gender` tinyint(4) NOT NULL DEFAULT '0',
  `newsletter` tinyint(4) NOT NULL DEFAULT '0',
  `code` varchar(10) COLLATE utf8_bin NOT NULL DEFAULT 'NULL',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `usermail`, `password`, `status`, `gender`, `newsletter`, `code`) VALUES
(1, 'Andrej', 'Filipenko', 'af@meets-ecommerce.de', 'f5d1278e8109edd94e1e4197e04873b9', 0, 2, 1, '1f0e3dad99');