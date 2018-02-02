drop table Student
drop table Match
drop table Message
drop table Adjective
drop table Token

create table Student (
	IdStudent integer not null,
	SurnameStudent varchar(30) not null,
	Email varchar(50) not null,
	PasswordStudent varchar(10) not null,
	Year integer not null,
	Pic 
	Description longtext,
	Score integer not null,
	Adjective1 integer not null,
	Adjective2 integer not null,
	Adjective3 integer not null,
	validateAccount boolean default false,
	primary key (IdStudent),
	foreign key (Adjective1) references Adjective(IdAdjective) ,
	foreign key (Adjective2) references Adjective(IdAdjective),
	foreign key (Adjective3) references Adjective(IdAdjective)  
)

create table Match (
	IdMatch integer not null,
	Result boolean default false;, 
	IdStudentGodFather integer not null,
	IdStudentGodSon integer not null,
	primary key (IdMatch),
	foreign key (IdStudentGodFather) references Student(IdStudent),
	foreign key (IdStudentGodSon) references Student(IdStudent)
)

create table Message (
	IdMessage integer not null,
	IdRecipient integer not null,
	DateMessage date,
	Content longtext,
	IdSender integer not null,
	primary key (IdMessage),
	foreign key (IdSender) references Student(IdStudent)
)

create table Adjective (
	IdAdjective integer not null,
	Wording varchar(30) not null,
	primary key (IdAdjective)
)
	
	
create table token (
	Birth date,
	Token varchar(32),
	IsAlive boolean default true,
	IdStudent integer not null,
	foreign key (IdStudent) references Student(IdStudent)
)	
	

