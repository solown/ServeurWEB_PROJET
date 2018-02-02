drop table if exists student;
drop table if exists match;
drop table if exists message;
drop table if exists adjective;
drop table if exists token;

create table adjective (
	id_adjective integer not null,
	wording varchar(30) not null,
	primary key (id_adjective)
);

create table student (
	id_student integer not null,
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
	primary key (id_student),
	foreign key (adjective_1) references adjective(id_adjective) ,
	foreign key (adjective_2) references adjective(id_adjective),
	foreign key (adjective_3) references adjective(id_adjective)  
);

create table match (
	id_match integer not null,
	result boolean default false, 
	id_student_god_father integer not null,
	id_student_god_son integer not null,
	primary key (id_match),
	foreign key (id_student_god_father) references Student(id_student),
	foreign key (id_student_god_son) references Student(id_student)
);

create table message (
	id_message integer not null,
	id_recipient integer not null,
	date_message date,
	content text,
	id_sender integer not null,
	primary key (id_message),
	foreign key (id_sender) references Student(id_student)
);



	
create table token (
	birth date,
	token varchar(32),
	is_alive boolean default true,
	id_student integer not null,
	foreign key (id_student) references student(id_student)
);
	


