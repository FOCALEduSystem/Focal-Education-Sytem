create database tester; 

use tester;
/* table containing persons who log into system - email is primary Key */
CREATE TABLE Login(                                          
	email VARCHAR(39) not null,
	passwordHash BINARY(64), 
	fname varchar(30) not null,
	lname varchar(30) not null,
	PRIMARY KEY (email)	
);

drop table Login;

INSERT INTO Login (email, passwordHash, fname, lname) 
values ("gabrielle.thompson@stu.focal.edu", "student2", "Gabrielle","Thompson"),
("virginia.bond@stu.focal.edu", "student1", "Virginia", "Bond"),
("andrew.bower@stu.focal.edu", "student", "Andrew", "Bower"); 

SELECT * FROM Login;

INSERT INTO Login (email, passwordHash, fname, lname) 
values ("elizabeth.anderson@focal.edu.jm","tester","Elizabeth", "Anderson"),
("donavon.williams@focal.edu.jm","test", "Donavon", "Williams"),
("colleen.davis@focal.edu.jm", "tests", "Colleen", "Davis"),
("lisa.fearonson@focal.edu.jm", "testers", "Lisa", "Fearonson"),
("mark.williams@focal.edu.jm", "testings", "Mark", "Williams");


/* list of staff members - connected to User_Role & Login tables */
CREATE TABLE Staff (                                                    
	sta_ID int AUTO_INCREMENT,
	sta_fname VARCHAR(30) not null,
	sta_lname VARCHAR(45) not null,
	sta_telnum VARCHAR(12),
	sta_email VARCHAR(39) not null,
    role_id int (2),
	PRIMARY KEY (sta_ID),
    foreign key (sta_email)
	REFERENCES Login (email)
    on update cascade on delete no action,
    foreign key (role_id)
    references User_Role (role_id)
    on update cascade on delete restrict
);

/* Staff Id will start at 1000 */
ALTER TABLE Staff AUTO_INCREMENT=1000; 

SELECT * FROM Staff;

DROP TABLE Staff;



INSERT INTO Staff (sta_fname, sta_lname, sta_telnum, sta_email, role_id)             
values ("Joseph", "Fisher", "876-429-5932", "joseph.fisher@focal.edu.jm", 01),
("Elizabeth", "Anderson", "876-342-9110", "elizabeth.anderson@focal.edu.jm", 01),
("Donavon", "Williams", "876-442-0876", "donavon.williams@focal.edu.jm", 01),
("Colleen", "Davis", "876-538-4962", "colleen.davis@focal.edu.jm", 01),
("Lisa", "Fearonson", "876-324-2167", "lisa.fearonson@focal.edu.jm", 01),
("Mark", "Williams", "876-324-1647", "mark.williams@focal.edu.jm", 01);



/* list of genders - Connected to Student table */
CREATE TABLE Gender (                             
	Gen_Code int NOT NULL,
	Gen CHAR(6),
	PRIMARY KEY (Gen_Code)
);

INSERT into Gender (Gen_Code, Gen)                            
values (1, "MALE"),
(2, "FEMALE");

/* Parent table connected to student table */
CREATE TABLE Parent (                                              
	P_ID INT NOT NULL,
	P_fname varchar (25),
	P_lname varchar (25),
    P_address1 varchar (30),
    P_address2 Varchar (30),
    P_parish varchar (15),
    P_telnumber varchar (12),
	P_email varchar (39),          
    primary key (P_ID)
    );
    
select * from Parent;

insert into Parent                                                       
Values (20, "George", "Thompson", "12 Clacken Street", "Spanish Town", "St Catherine", "876-459-7893", "gthompson@gmail.com"),
(30, "Andrew", "Bond", "16 Tower Hill Drive", "Kingston 16", "Kingston", "876-720-3851", "abond20@gmail.com"),
(40, "Winsome", "Bower", "25 Manhatten Drive", "Kingston 11", "Kingston", "876-592-3929", "swilson@gmail.com"),
(10, "Sandra", "Wilson", "146 Stewart Avenue", "Kingston 10", "Kingston", "876-456-1789", "swilson@gmail.com");

    
/* student table connected to Gender, Parent, Grade & Login tables */
CREATE TABLE Student (                                                           
	StuID int AUTO_INCREMENT,
	S_Fname CHAR(30),
	S_Mname CHAR(30),
	S_Lname CHAR(45),
	Gen int NOT NULL,
	DOB DATE NOT NULL,
	S_email VARCHAR(319),
	S_address1 VARCHAR(30),
	S_address2 VARCHAR(30),
	S_parish VARCHAR(30),
	S_nationality VARCHAR(15),
	S_telnum VARCHAR(12),
	P_ID INT (2),
    Grd varchar (3),
	PRIMARY KEY (StuID),
    foreign key (Gen)
    references Gender (Gen_Code)
    on update cascade on delete no action,
	foreign key (P_ID)
    references Parent (P_ID)
    on update cascade on delete no action,
    foreign key (Grd)
    references Grade (grd_id)
    on update cascade on delete no action,
	foreign key (S_email)
    references Login (email)
    on update cascade on delete no action
);
/* starting number for student set at "20221000" */ 
ALTER TABLE Student AUTO_INCREMENT=20221000; 

DROP TABLE Student;

insert into Student (S_Fname, S_Mname, S_Lname, Gen, DOB, S_email, S_address1, S_address2, S_parish, S_nationality, S_telnum, P_ID, Grd)
Values ("Gabrielle","Annette", "Thompson",2, "2010-01-28", "gabrielle.thompson@stu.focal.edu", "12 Clacken Street", "Spanish Town", "St. Catherine", "Jamaican", "876-430-7405", 20, "8A"),
("Virginia","Elizabeth", "Bond",2, "2010-08-16", "virginia.bond@stu.focal.edu", "16 Tower Hill Drive", "Kingston 16", "Kingston", "Jamaican", "876-506-6921", 30, "8A"),
("Andrew","Phillip", "Bower",1, "2010-05-19", "andrew.bower@stu.focal.edu", "25 Manhatten Drive", "Kingston 11", "Kingston", "Jamaican", "876-692-3074", 40, "8A"),
("Joseph","", "Fisher",1, "2014-09-16", "joseph.fisher@focal.edu.jm", "146 Stewart Avenue", "Kingston 10", "Kingston", "Jamaican", "876-456-7890", 10, "2D"); 


/* this table store the name of the student class - interacts with student table */
create table Grade (                                                       
grd_id varchar (3),
grd_desc varchar(50),
primary key (grd_id)
);

insert into Grade                                                             
Values ("8A", "Grade 8A"),
("8C", "Grade 8C"),
("8D", "Grade 8D"),
("2D", "Grade 2D"),
("7A", "Grade 7A"),
("8B", "Grade 8B"),
("10C", "Grade 10C"),
("11D", "Grade 11D");



/* this table stores the photo of the student, Student Id is used as foreign key in it */
create table Photo (
photo_id int (3) not null auto_increment,
photo_img blob,
StuID int (8),
primary key (photo_id),
foreign key (StuID)
references Student (StuID)
);



DROP TABLE User_Role;

/* this table stores the role of each staff member - interacts with Staff table */
Create table User_Role (                                                                            
role_id int (2) not null,
role_title varchar (15),
role_desc varchar (50),
primary key (role_id)
);


insert into User_Role                                                           
Values (01, "Teacher", "Teacher of several subjects"),
(02, "Dean", "Dean of Discipline/Student"),
(03, "Principal", "Head of School"),
(04, "HOD", "Head of Department"),
(05, "Vice Principal", "Second in Command"),
(10, "Admin", "Administrator of System");

DELETE FROM table_name WHERE condition;


/* the table list the all subjects to be taught */
create table Subject (                                               
subj_id varchar (6) not null,
subj_name varchar (50),
primary key (subj_id)
);

DELETE FROM Subject WHERE subj_name = ENG2;

update Subject
set subj_id = 'ENG108' where subj_id = 'ENG2';

select * from Subject;

insert into Subject                                                      
Values ("ENG2", "English - Second Grade"),
("MTH2", "Mathematics - Second Grade"),
("SCI2", "Science - Second Grade"),
("DRA2", "Drama - Second Grade"),
("DNC2", "Dance - Second Grade"),
("ART2", "Art & Craft - Second Grade"),
("ENG108", "English - Eight Grade"),
("MTH108", "Mathematics - Eight Grade"),
("HIS108", "History - Eight Grade"),
("PE108", "Physical Education - Eight Grade"),
("SCI108", "Integrated Science - Eight Grade"),
("LIT108", "English Literature - Eight Grade"),
("MUS108", "Music - Eight Grade"),
("DRA108", "Drama - Eight Grade"),
("HEC108", "Home Economics - Eight Grade");



/* the table list class time, teacher and room - interacts with Staff and Subject tables */
create table Class (               
class_id int (3) not null auto_increment,
class_day varchar (10),
class_time varchar (5),
class_rm varchar (6),
subj_id varchar (6),
sta_ID int (6),
primary key (class_id),
foreign key (sta_ID)
references Staff (sta_ID)
on update cascade on delete no action,
foreign key (subj_id)
references Subject (subj_id)
on update cascade on delete no action
);



insert into Class (class_day, class_time, sta_ID, class_rm, subj_id)
Values ("Monday", "08:00",1010, "RM 2A","ENG108"),
("Monday", "09:00", 1007, "RM 2B", "SCI108"),
("Monday", "10:00", 1008, "RM 2C","HIS108"),
("Monday", "12:00", 1009, "HELAB", "HEC108"),
("Monday", "01:00", 1006, "MUSLAB","MUS108"),
("Tuesday", "08:00", 1010, "RM 2D","LIT108"),
("Tuesday", "09:00", 1006, "RM 2E","MTH108"),
("Tuesday", "10:00", 1008, "FIELD","PE108"),
("Tuesday", "12:00", 1010, "RM 2A","ENG108"),
("Tuesday", "01:00", 1008, "RM 2C", "HIS108"),
("Wednesday", "08:00", 1008, "RM 2C", "HIS108"),
("Wednesday", "09:00", 1007, "RM 2B","SCI108"),
("Wednesday", "10:00", 1006, "MUSLAB","MUS108"),
("Wednesday", "12:00", 1008, "FIELD","PE108"),
("Wednesday", "01:00", 1006, "RM 2A", "DRA108"),
("Thursday", "08:00", 1009,"HELAB","HEC108"),
("Thursday", "09:00", 1006, "RM 2E","MTH108"),
("Thursday", "10:00", 1008, "FIELD", "PE108"),
("Thursday", "12:00", 1007, "RM 2B","SCI108"),
("Thursday", "01:00", 1006, "MUSLAB","MUS108"),
("Friday", "08:00", 1010,"RM 2A","ENG108"),
("Friday", "09:00", 1011, "HELAB","HEC108"),
("Friday", "10:00", 1010,"RM 2D","LIT108"),
("Friday", "12:00", 1006, "RM 2E","MTH108"),
("Friday", "01:00", 1006, "RM 2A","DRA108");


/* the table list the grade awarded by teacher per subject - interacts with Subject, Staff and Student tables */
Create table GradeBook (                 
gb_id int (4) auto_increment,
subj_id varchar (6),
StuID int (8),
marks decimal (5,2)
CHECK (marks between 0.00 and 100.00),
sta_ID int (6),
post_date date,
primary key (gb_id),
foreign key (subj_id)
references subject (subj_id)
on update cascade on delete no action,
foreign key (StuID)
references student (StuID)
on update cascade on delete no action,
foreign key (sta_ID)
references staff (sta_ID)
on update cascade on delete no action
);

SELECT * FROM Student;
drop table GradeBook;

insert into GradeBook (subj_id, StuID, marks, sta_ID, post_date)
Values ("ENG108", "20221008",50.00, 1006,"2022-02-16"),
("ENG108", "20221009",90.00, 1006,"2022-02-16"),
("ENG108", "20221010",85.50, 1006,"2022-02-16"),
("SCI108", "20221008",80.00, 1007,"2022-02-17"),
("SCI108", "20221009",90.00, 1007,"2022-02-17"),
("SCI108", "20221010",750.00, 1007,"2022-02-17"),
("HIS108", "20221008",80.00, 1008,"2022-02-18"),
("HIS108", "20221009",60.00, 1008,"2022-02-18"),
("HIS108", "20221010",86.00, 1008,"2022-02-18"),
("HEC108", "20221008",70.00, 1008,"2022-02-16"),
("HEC108", "20221009",39.00, 1008,"2022-02-16"),
("HEC108", "20221010",83.00, 1008,"2022-02-16"),
("MUS108", "20221008",79.50, 1009,"2022-02-17"),
("MUS108", "20221009",83.90, 1009,"2022-02-17"),
("MUS108", "20221010",82.40, 1009,"2022-02-17"),
("LIT108", "20221008",93.40, 1006,"2022-02-18"),
("LIT108", "20221009",40.5, 1006,"2022-02-18"),
("LIT108", "20221010",88.20, 1006,"2022-02-18"),
("MTH108", "20221008",65.90, 1008,"2022-02-16"),
("MTH108", "20221009",83.30, 1008,"2022-02-16"),
("MTH108", "20221010",82.80, 1008,"2022-02-16"),
("PE108", "20221008",88.80, 1010,"2022-02-17"),
("PE108", "20221009",90.80, 1010,"2022-02-17"),
("PE108", "20221010",100.00, 1010,"2022-02-17"),
("DRA108", "20221008",100.0, 1010,"2022-02-18"),
("DRA108", "20221009",80.80, 1009,"2022-02-18"),
("DRA108", "20221010",92.80, 1009,"2022-02-18");


select * from GradeBook;

/* this table shows the lettergrade for grade received - will be connected to GradeBook table */
create table LetterGrade (
lg_id int (2) not null,
lg_amt varchar (3),
lg_desc varchar (15),
primary key (lg_id)
);


insert into LetterGrade
values (1, "A", "Distinction"),
(2, "B", "Credit"),
(3, "C", "Pass"),
(4, "F", "Fail");




/* to rectify in the future */

SELECT lname, COUNT(DISTINCT(email)),
FROM Login,
GROUP BY lname;

select lname, count distinct email,
from Login;

select * from Login;

