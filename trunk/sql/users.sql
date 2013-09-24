create table users(
	id int(10) not null auto_increment, 
	username varchar(32) not null default '', 
	password varchar(64) not null default '', 
	active int(1) not null default 0,
	primary key(id), 
	unique key(username)
);
