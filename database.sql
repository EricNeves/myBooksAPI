create database if not exists api;

use api;

create table if not exists users (
	id char(36) not null default uuid(),
  name varchar(255) not null,
  email varchar(255) not null,
  passwd varchar(255) not null,
  primary key(id)
);

create table if not exists books (
	id char(36) not null default uuid(),
  title varchar (155) not null,
  year_created YEAR not null,
  user_id char(36) not null,
  primary key (id),
  foreign key (user_id) references users (id)
);