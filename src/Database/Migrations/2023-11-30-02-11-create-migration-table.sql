CREATE TABLE `migrations` (
    `file` varchar(255) NOT NULL,
    `run_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `failed` bool DEFAULT 1,
    unique KEY (file)
) ENGINE=INNODB CHARSET=utf8