create database blog;
create database store;

CREATE TABLE post
(
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(128) NOT NULL,
    content TEXT NOT NULL,
    author_id INTEGER NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
