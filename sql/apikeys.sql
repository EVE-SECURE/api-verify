create table apikeys(
	`id`          int(10)     not null auto_increment, 
	`vkey`        varchar(32) not null default '', 
	`vcode`       varchar(64) not null default '', 
	`user`        int(10)     not null, 
	primary key(`id`), 
	unique  key(`vkey`), 
	foreign key(`user`) references `users`(`id`) on delete cascade
);
