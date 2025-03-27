ALTER TABLE `contests` ADD COLUMN `run_mode` int(11) NOT NULL DEFAULT 0;
ALTER TABLE `contests` ADD COLUMN `time_window_mode_last_min` int(11) NOT NULL DEFAULT 0;
ALTER TABLE `contests_registrants` ADD COLUMN `time_window` datetime DEFAULT NULL;

CREATE TABLE `contest_time_window` (
  `contest_id` int(11) NOT NULL,
  `start_time` datetime NOT NULL,
  KEY `contest_id` (`contest_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;


