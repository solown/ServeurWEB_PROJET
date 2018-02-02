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
	password_student varchar(10) not null,
	year integer not null,
	pic varchar(30) not null, 
	description text,
	score integer not null,
	adjective_1 integer not null,
	adjective_2 integer not null,
	adjective_3 integer not null,
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
	


