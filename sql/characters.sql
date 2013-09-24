create table characters(
	`id`         int(10)      not null, 
	`name`       varchar(255) not null default '', 
	`race`       varchar(255) not null default '', 
	`gender`     varchar(32)  not null default '', 
	`user`       int(10)      not null, 
	`cacheUntil` timestamp    not null,
	primary key(`id`), 
	unique  key(`name`), 
   foreign key(`user`) references `users`(`id`) on delete cascade
);
