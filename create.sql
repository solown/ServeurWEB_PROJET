drop table if exists student CASCADE;
drop table if exists match CASCADE;
drop table if exists message CASCADE;
drop table if exists adjective CASCADE;
drop table if exists token CASCADE;

create table adjective (
	id_adjective SERIAL primary key,
	wording varchar(30) not null
);

create table student (
	id_student SERIAL primary key,
	surname varchar(30) not null,
	email varchar(50) not null,
	password_student text not null,
	year integer not null,
	pic varchar(30), 
	description text,
	score integer default 0,
	adjective_1 integer ,
	adjective_2 integer ,
	adjective_3 integer ,
	validate_account boolean default false,
	foreign key (adjective_1) references adjective(id_adjective) ,
	foreign key (adjective_2) references adjective(id_adjective),
	foreign key (adjective_3) references adjective(id_adjective)  
);

create table match (
	id_match SERIAL primary key,
	result boolean default false, 
	id_student_god_father integer not null,
	id_student_god_son integer not null,
	foreign key (id_student_god_father) references Student(id_student),
	foreign key (id_student_god_son) references Student(id_student)
);

create table message (
	id_message SERIAL primary key,
	id_recipient integer not null,
	date_message date,
	content text,
	id_sender integer not null,
	foreign key (id_sender) references Student(id_student)
);

create table token (
	birth date,
	token varchar(32),
	is_alive boolean default true,
	id_student integer primary key,
	foreign key (id_student) references student(id_student)
);

insert into adjective (wording) values ('froid') ;
insert into adjective (wording) values ('calculateur') ;
insert into adjective (wording) values ('michto') ;
insert into adjective (wording) values ('chaud') ;
insert into adjective (wording) values ('studieux') ;
insert into adjective (wording) values ('geek') ;
insert into adjective (wording) values ('crédule') ;
insert into adjective (wording) values ('stoner') ;
insert into adjective (wording) values ('beau') ;
insert into adjective (wording) values ('intelligent') ;
insert into adjective (wording) values ('sportif') ;
insert into adjective (wording) values ('magnifique') ;
insert into adjective (wording) values ('universel') ;
insert into adjective (wording) values ('ambicieux') ;
insert into adjective (wording) values ('altruiste') ;
insert into adjective (wording) values ('cupide') ;
insert into adjective (wording) values ('sympatique') ;
insert into adjective (wording) values ('rigoureux') ;
insert into adjective (wording) values ('créatif') ;
insert into adjective (wording) values ('coquin') ;
insert into adjective (wording) values ('mauvais joueur') ;
insert into adjective (wording) values ('franc') ;
insert into adjective (wording) values ('serviable') ;
insert into adjective (wording) values ('timide') ;
insert into adjective (wording) values ('souple') ;
insert into adjective (wording) values ('arogant') ;
insert into adjective (wording) values ('charmant') ;
insert into adjective (wording) values ('cinéphile') ;
insert into adjective (wording) values ('gamer') ;
insert into adjective (wording) values ('dynamique') ;
insert into adjective (wording) values ('drole') ;
insert into adjective (wording) values ('sudiste') ;
insert into adjective (wording) values ('tyranique') ;
insert into adjective (wording) values ('sociable') ;
insert into adjective (wording) values ('fetard') ;
insert into adjective (wording) values ('extravertis') ;
insert into adjective (wording) values ('gourmand') ;
insert into adjective (wording) values ('A l\'écoute') ;
insert into adjective (wording) values ('vrai') ;
insert into adjective (wording) values ('faux') ;
insert into adjective (wording) values ('digne de confiance') ;







































