<?php
$db=mysqli_connect('localhost','root','') or die('unable to connect .check the munachully parametrs');


mysqli_select_db($db,'Facereco') or die(mysqli_error($db));

$query = "DROP TABLE IF EXISTS Teacher";
mysqli_query($db,$query) or die(mysqli_error($db));
$query = "DROP TABLE IF EXISTS Attandance";
mysqli_query($db,$query) or die(mysqli_error($db));
$query = "DROP TABLE IF EXISTS Student";
mysqli_query($db,$query) or die(mysqli_error($db));
$query = "DROP TABLE IF EXISTS Subject";
mysqli_query($db,$query) or die(mysqli_error($db));
$query = "DROP TABLE IF EXISTS Deperment";
mysqli_query($db,$query) or die(mysqli_error($db));




$query='CREATE table Deperment(dept_name varchar(255) NOT NULL PRIMARY KEY)';
		mysqli_query($db,$query) or die(mysqli_error($db));
		
		$query='create table Subject(
		sub_id int(12) NOT NULL AUTO_INCREMENT,
		sub_name varchar(120) NOT null,
		sem int NOT NULL,
		PRIMARY kEY(sub_id),
		dept_name VARCHAR(255) NOT NULL,
		FOREIGN KEY (dept_name) REFERENCES Deperment(dept_name)
		)';
		mysqli_query($db,$query) or die(mysqli_error($db));
		
		$query='create table Student(
		stud_id int(12) NOT NULL AUTO_INCREMENT,
		stud_name varchar(23) NOT NULL,
		stud_pass VARCHAR(80) NOT NULL,
		dept_name VARCHAR(255) NOT NULL,
		sem int NOT NULL,
		photo BLOB,
		primary key(stud_id),
		FOREIGN KEY (dept_name) REFERENCES Deperment(dept_name))';
		mysqli_query($db,$query) or die(mysqli_error($db));
		
		
        $query='create table Teacher(
		tea_id int(12) NOT NULL AUTO_INCREMENT,
		tea_name varchar(23) NOT NULL,
		tea_pass VARCHAR(80) NOT NULL,
		tea_desi VARCHAR(80) NOT NULL,
		dept_name VARCHAR(255) NOT NULL,
		tea_gender VARCHAR(20) NOT NULL,
		PRIMARY KEY(tea_id),
		FOREIGN KEY (dept_name) REFERENCES Deperment(dept_name))';
		mysqli_query($db,$query) or die(mysqli_error($db)); 
		
		$query='create table Attandance(
		att_id int(12) NOT NULL AUTO_INCREMENT,
		sub_id int(12) NOT NULL,
		stud_id int(12) NOT NULL,
		date DATE,
		PRIMARY KEY(att_id),
		FOREIGN KEY (sub_id) REFERENCES Subject(sub_id),
		FOREIGN KEY (stud_id) REFERENCES Student(stud_id))';
		mysqli_query($db,$query) or die(mysqli_error($db));
		?>