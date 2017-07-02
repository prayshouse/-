create table version_control
(
	id int auto_increment
		primary key,
	versiontime int default CURRENT_TIMESTAMP not null
)
;

