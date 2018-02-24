<?php
$db=mysqli_connect('localhost','root','') or die('unable to connect .check the munachully parametrs');

$query = "CREATE DATABASE face_recognition";

mysqli_query($db, $query);


mysqli_select_db($db,'face_recognition') or die(mysqli_error($db));

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




$query='CREATE TABLE deperment(dept_name VARCHAR(10) NOT NULL PRIMARY KEY)';
		mysqli_query($db,$query) or die(mysqli_error($db));
		
		$query='CREATE TABLE subject(
		sub_id VARCHAR(10) NOT NULL,
		sub_name VARCHAR(120) NOT null,
		sem INT NOT NULL,
		dept_name VARCHAR(10) NOT NULL,
		PRIMARY KEY(sub_id),
		FOREIGN KEY (dept_name) REFERENCES deperment(dept_name)
		)';
		mysqli_query($db,$query) or die(mysqli_error($db));
		
		$query='CREATE TABLE Student(
		stud_id VARCHAR(20) NOT NULL,
		stud_name VARCHAR(30) NOT NULL,
		stud_pass VARCHAR(50) NOT NULL,
		dept_name VARCHAR(10) NOT NULL,
		sem INT NOT NULL,
		photo BLOB,
		primary key(stud_id),
		FOREIGN KEY (dept_name) REFERENCES deperment(dept_name))';
		mysqli_query($db,$query) or die(mysqli_error($db));
		
		
        $query='CREATE TABLE teacher(
		tea_id INT(20) NOT NULL,
		tea_name VARCHAR(30) NOT NULL,
		tea_pass VARCHAR(80) NOT NULL,
		tea_desi VARCHAR(80) NOT NULL,
		dept_name VARCHAR(10) NOT NULL,
		tea_gender VARCHAR(10) NOT NULL,
		PRIMARY KEY(tea_id),
		FOREIGN KEY (dept_name) REFERENCES deperment(dept_name))';
		mysqli_query($db,$query) or die(mysqli_error($db)); 
		
		$query='CREATE TABLE attandance(
		att_id INT(20) NOT NULL AUTO_INCREMENT,
		sub_id VARCHAR(10) NOT NULL,
		stud_id VARCHAR(20) NOT NULL,
		date DATE,
		PRIMARY KEY(att_id),
		FOREIGN KEY (sub_id) REFERENCES subject(sub_id),
		FOREIGN KEY (stud_id) REFERENCES student(stud_id))';
		mysqli_query($db,$query) or die(mysqli_error($db));
		?>