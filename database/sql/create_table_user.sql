create table user
(
	email varchar(50) not null,
	ID varchar(50) not null
		primary key,
	password varchar(50) not null,
	conHeat int default '0' not null,
	eduHeat int default '0' not null,
	entHeat int default '0' not null,
	femHeat int default '0' not null,
	finHeat int default '0' not null,
	heaHeat int default '0' not null,
	milHeat int default '0' not null,
	nbaHeat int default '0' not null,
	parHeat int default '0' not null,
	spoHeat int default '0' not null,
	stoHeat int default '0' not null,
	tecHeat int default '0' not null,
	topHeat int default '0' not null,
	conSubscription char default 'n' not null,
	eduSubsription char default 'n' not null,
	femSubsription char default 'n' not null,
	finSubsription char default 'n' not null,
	heaSubsription char default 'n' not null,
	milSubsription char default 'n' not null,
	nbaSubsription char default 'n' not null,
	parSubsription char default 'n' not null,
	spoSubsription char default 'n' not null,
	stoSubsription char default 'n' not null,
	tecSubsription char default 'n' not null,
	topSubsription char default 'n' not null,
	entSubsription char default 'n' not null,
	constraint user_email_uindex
		unique (email)
)
;

