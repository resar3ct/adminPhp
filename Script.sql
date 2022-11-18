CREATE DATABASE kolesaAdm;
use kolesaAdm;

CREATE TABLE
    messages (
        id int UNSIGNED not null primary key auto_increment,
		title varchar(150) NOT NULL,
		body text,
        created_at DATETIME NOT NULL DEFAULT NOW()
    );
select * from messages;
insert into messages (title, body)
	values ("Продам", "iphone 14 new")
	





