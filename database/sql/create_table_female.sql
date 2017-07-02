create table female
(
	title varchar(100) not null,
	newstime char(16) null,
	src tinytext null,
	category varchar(16) null,
	pic tinytext null,
	content text null,
	url tinytext null,
	weburl tinytext null,
	id int auto_increment
		primary key,
	constraint female_title_uindex
		unique (title)
)
;

