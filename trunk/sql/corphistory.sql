create table corphistory(
	`id`        int(20) not null auto_increment, 
	`corp`      int(10) not null, 
	`character` int(10) not null, 
	primary key(`id`), 
	unique key(`corp`, `character`), 
	foreign key(`corp`)      references `corporations`(`id`) on delete cascade, 
	foreign key(`character`) references `characters`(`id`)   on delete cascade
);
