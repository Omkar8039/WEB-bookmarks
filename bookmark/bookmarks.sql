create database bookmarks;
use bookmarks;
create table user 
 (
  username varchar(16) primary key,
  passwd varchar(16) not null,
  email varchar(100) not null
  );
create table bookmark
 (
   username varchar(16) not null,
   bm_URL varchar(255) not null,
   index(username),
   index(bm_URL)
 );
 create table recommend
 (
 username varchar(16) not null,
   bm_URL varchar(255) not null,
   index(username),
   index(bm_URL)
  
 );
grant select,insert,update,delete
on bookmarks.*
to bm_user@localhost identified by '';
