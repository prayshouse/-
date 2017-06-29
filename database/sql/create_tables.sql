USE news;

create table top
(
    title       NVARCHAR(100) PRIMARY KEY,
    newstime    CHAR(16),
    src         TINYTEXT,
    category    VARCHAR(16),
    pic         TINYTEXT,
    content     TEXT,
    url         TINYTEXT,
    weburl      TINYTEXT
) ENGINE=Innodb DEFAULT CHARSET=utf8;

create table financial
(
    title       NVARCHAR(100) PRIMARY KEY,
    newstime    CHAR(16),
    src         TINYTEXT,
    category    VARCHAR(16),
    pic         TINYTEXT,
    content     TEXT,
    url         TINYTEXT,
    weburl      TINYTEXT
) ENGINE=Innodb DEFAULT CHARSET=utf8;

create table sport
(
    title       NVARCHAR(100) PRIMARY KEY,
    newstime    CHAR(16),
    src         TINYTEXT,
    category    VARCHAR(16),
    pic         TINYTEXT,
    content     TEXT,
    url         TINYTEXT,
    weburl      TINYTEXT
) ENGINE=Innodb DEFAULT CHARSET=utf8;

create table entertainment
(
    title       NVARCHAR(100) PRIMARY KEY,
    newstime    CHAR(16),
    src         TINYTEXT,
    category    VARCHAR(16),
    pic         TINYTEXT,
    content     TEXT,
    url         TINYTEXT,
    weburl      TINYTEXT
) ENGINE=Innodb DEFAULT CHARSET=utf8;

create table military
(
    title       NVARCHAR(100) PRIMARY KEY,
    newstime    CHAR(16),
    src         TINYTEXT,
    category    VARCHAR(16),
    pic         TINYTEXT,
    content     TEXT,
    url         TINYTEXT,
    weburl      TINYTEXT
) ENGINE=Innodb DEFAULT CHARSET=utf8;

create table education
(
    title       NVARCHAR(100) PRIMARY KEY,
    newstime    CHAR(16),
    src         TINYTEXT,
    category    VARCHAR(16),
    pic         TINYTEXT,
    content     TEXT,
    url         TINYTEXT,
    weburl      TINYTEXT
) ENGINE=Innodb DEFAULT CHARSET=utf8;

create table technology
(
    title       NVARCHAR(100) PRIMARY KEY,
    newstime    CHAR(16),
    src         TINYTEXT,
    category    VARCHAR(16),
    pic         TINYTEXT,
    content     TEXT,
    url         TINYTEXT,
    weburl      TINYTEXT
) ENGINE=Innodb DEFAULT CHARSET=utf8;

create table nba
(
    title       NVARCHAR(100) PRIMARY KEY,
    newstime    CHAR(16),
    src         TINYTEXT,
    category    VARCHAR(16),
    pic         TINYTEXT,
    content     TEXT,
    url         TINYTEXT,
    weburl      TINYTEXT
) ENGINE=Innodb DEFAULT CHARSET=utf8;

create table stock
(
    title       NVARCHAR(100) PRIMARY KEY,
    newstime    CHAR(16),
    src         TINYTEXT,
    category    VARCHAR(16),
    pic         TINYTEXT,
    content     TEXT,
    url         TINYTEXT,
    weburl      TINYTEXT
) ENGINE=Innodb DEFAULT CHARSET=utf8;

create table constellation
(
    title       NVARCHAR(100) PRIMARY KEY,
    newstime    CHAR(16),
    src         TINYTEXT,
    category    VARCHAR(16),
    pic         TINYTEXT,
    content     TEXT,
    url         TINYTEXT,
    weburl      TINYTEXT
) ENGINE=Innodb DEFAULT CHARSET=utf8;

create table female
(
    title       NVARCHAR(100) PRIMARY KEY,
    newstime    CHAR(16),
    src         TINYTEXT,
    category    VARCHAR(16),
    pic         TINYTEXT,
    content     TEXT,
    url         TINYTEXT,
    weburl      TINYTEXT
) ENGINE=Innodb DEFAULT CHARSET=utf8;

create table health
(
    title       NVARCHAR(100) PRIMARY KEY,
    newstime    CHAR(16),
    src         TINYTEXT,
    category    VARCHAR(16),
    pic         TINYTEXT,
    content     TEXT,
    url         TINYTEXT,
    weburl      TINYTEXT
) ENGINE=Innodb DEFAULT CHARSET=utf8;

create table parenting
(
    title       NVARCHAR(100) PRIMARY KEY,
    newstime    CHAR(16),
    src         TINYTEXT,
    category    VARCHAR(16),
    pic         TINYTEXT,
    content     TEXT,
    url         TINYTEXT,
    weburl      TINYTEXT
) ENGINE=Innodb DEFAULT CHARSET=utf8;