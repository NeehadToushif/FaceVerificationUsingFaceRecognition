<?php
require_once "db_connect.php";

$query = "DROP TABLE IF EXISTS teacher";
mysqli_query($db,$query) or die(mysqli_error($db));
$query = "DROP TABLE IF EXISTS attendance";
mysqli_query($db,$query) or die(mysqli_error($db));
$query = "DROP TABLE IF EXISTS student";
mysqli_query($db,$query) or die(mysqli_error($db));
$query = "DROP TABLE IF EXISTS subject";
mysqli_query($db,$query) or die(mysqli_error($db));
$query = "DROP TABLE IF EXISTS department";
mysqli_query($db,$query) or die(mysqli_error($db));




$query='CREATE TABLE department(
        dept_name VARCHAR(10) NOT NULL PRIMARY KEY
        )';
mysqli_query($db,$query) or die(mysqli_error($db));
		
$query='CREATE TABLE subject(
		sub_id VARCHAR(10) NOT NULL,
		sub_name VARCHAR(120) NOT null,
		sem INT NOT NULL,
		dept_name VARCHAR(10) NOT NULL,
		PRIMARY KEY(sub_id)/*,
		FOREIGN KEY (dept_name) REFERENCES department(dept_name)*/
		)';
mysqli_query($db,$query) or die(mysqli_error($db));
		
$query='CREATE TABLE student(
		stud_id VARCHAR(20) NOT NULL,
		stud_name VARCHAR(30) NOT NULL,
		stud_pass VARCHAR(50) NOT NULL,
		dept_name VARCHAR(10) NOT NULL,
		sem INT NOT NULL,
		photo TEXT,
		primary key(stud_id)/*,
		FOREIGN KEY (dept_name) REFERENCES department(dept_name)*/
		)';
mysqli_query($db,$query) or die(mysqli_error($db));
		
		
$query='CREATE TABLE teacher(
		tea_id INT(20) NOT NULL AUTO_INCREMENT,
		tea_name VARCHAR(30) NOT NULL,
		tea_pass VARCHAR(80) NOT NULL,
		tea_desi VARCHAR(80) NOT NULL,
		dept_name VARCHAR(10) NOT NULL,
		tea_gender VARCHAR(10) NOT NULL,
		PRIMARY KEY(tea_id)/*,
		FOREIGN KEY (dept_name) REFERENCES department(dept_name)*/
		)';
mysqli_query($db,$query) or die(mysqli_error($db));
		
$query='CREATE TABLE attendance(
		att_id INT(20) NOT NULL AUTO_INCREMENT,
		sub_id VARCHAR(10) NOT NULL,
		stud_id VARCHAR(20) NOT NULL,
		stud_name VARCHAR(20) NOT NULL,
		date DATE,
		PRIMARY KEY(att_id)/*,
		FOREIGN KEY (sub_id) REFERENCES subject(sub_id),
		FOREIGN KEY (stud_id) REFERENCES student(stud_id),
		FOREIGN KEY (stud_name) REFERENCES student(stud_name)*/
		)';
mysqli_query($db,$query) or die(mysqli_error($db));

$query='CREATE TABLE attendance_window(
		id INT NOT NULL AUTO_INCREMENT,
		sub_name VARCHAR(20) NOT NULL,
		sem INT(10) NOT NULL,
		started_by TEXT NOT NULL,
		is_on BOOLEAN NOT NULL,
		classes INT NOT NULL,
		dept_name VARCHAR(20) NOT NULL,
		start_time TIMESTAMP NOT NULL,
		stop_time TIMESTAMP NOT NULL
		PRIMARY KEY(id)/*
		FOREIGN KEY (sub_name) REFERENCES subject(sub_name),
		FOREIGN KEY (dept_name) REFERENCES student(dept_name)*/
		)';
mysqli_query($db,$query) or die(mysqli_error($db));


?>