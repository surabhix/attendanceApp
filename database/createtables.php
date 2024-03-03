<?php

$path=$_SERVER['DOCUMENT_ROOT'];
require_once $path."/attendanceapp/database/database.php";
function clearTable($dbo,$tabName)
{
    $c="delete from :tabname";
    $s=$dbo->conn->prepare($c);
    try{
    $s->execute([":tabname"=>$tabName]);
    }
    catch(PDOException $oo)
    {

    }
}
$dbo=new Database();
$c="create table student_details
(
    id int auto_increment primary key,
    roll_no varchar(20) unique,
    name varchar(50)
)";
$s=$dbo->conn->prepare($c);
try{
$s->execute();
echo("<br>student_details created");
}
catch(PDOException $o)
{
echo("<br>student_details not created");
}

$c="create table course_details
(
    id int auto_increment primary key,
    code varchar(20) unique,
    title varchar(50),
    credit int
)";
$s=$dbo->conn->prepare($c);
try{
$s->execute();
echo("<br>course_details created");
}
catch(PDOException $o)
{
echo("<br>course_details not created");
}


$c="create table faculty_details
(
    id int auto_increment primary key,
    user_name varchar(20) unique,
    name varchar(100),
    password varchar(50)
)";
$s=$dbo->conn->prepare($c);
try{
$s->execute();
echo("<br>faculty_details created");
}
catch(PDOException $o)
{
echo("<br>faculty_details not created");
}


$c="create table session_details
(
    id int auto_increment primary key,
    year int,
    term varchar(50),
    unique (year,term)
)";
$s=$dbo->conn->prepare($c);
try{
$s->execute();
echo("<br>session_details created");
}
catch(PDOException $o)
{
echo("<br>session_details not created");
}



$c="create table course_registration
(
    student_id int,
    course_id int,
    session_id int,
    primary key (student_id,course_id,session_id)
)";
$s=$dbo->conn->prepare($c);
try{
$s->execute();
echo("<br>course_registration created");
}
catch(PDOException $o)
{
echo("<br>course_registration not created");
}

$c="create table course_allotment
(
    faculty_id int,
    course_id int,
    session_id int,
    primary key (faculty_id,course_id,session_id)
)";
$s=$dbo->conn->prepare($c);
try{
$s->execute();
echo("<br>course_allotment created");
}
catch(PDOException $o)
{
echo("<br>course_allotment not created");
}

$c="create table attendance_details
(
    faculty_id int,
    course_id int,
    session_id int,
    student_id int,
    on_date date,
    status varchar(10),
    primary key (faculty_id,course_id,session_id,student_id,on_date)
)";
$s=$dbo->conn->prepare($c);
try{
$s->execute();
echo("<br>attendance_details created");
}
catch(PDOException $o)
{
echo("<br>attendance_details not created");
}
$c="delete from student_details";
$s=$dbo->conn->prepare($c);
  try{
    $s->execute();
    echo("<br> all students deleted");
  }
  catch(PDOException $o)
  {
    echo("<br>duplicate entry");
  }

$c="insert into student_details
(id,roll_no,name)
values
  (1,'1RN21IS123','ROSHNY A KUMAR'),
  (2,'1RN21IS124','RUCHIR ROHAN TRIMURTHY'),
  (3,'1RN21IS125','S R ABHIRAM ANANDH'),
  (4,'1RN21IS126','S R RAKSHITA'),
  (5,'1RN21IS127','SAHANA PARAMESHWAR NAIK'),
  (6,'1RN21IS128','SAMSKRUTHI C'),
  (7,'1RN21IS129','SAMVED C MOULI'),
  (8,'1RN21IS130','SANDRA PAUL'),
  (9,'1RN21IS131','SANJANA TS'),
  (10,'1RN21IS132','SANJANA UPADHYAYA'),
  (11,'1RN21IS133','SANJANA VS'),
  (12,'1RN21IS134','SANKALPA GOWRI'),

  (13,'1RN21IS135','SANSKRUTHI B S'),
  (14,'1RN21IS136','SANTOSH V'),
  (15,'1RN21IS137','SATHWIK C M'),
  (16,'1RN21IS138','SHABAZ M NADAF'),
  (17,'1RN21IS139','SHASHANK GN'),
  (18,'1RN21IS140','SHASHANK MP'),
  (19,'1RN21IS141','SHASHANK S'),
  (20,'1RN21IS142','SHASHANK VH'),
  (21,'1RN21IS143','SHREYAS G ATHREYA'),
  (22,'1RN21IS144','SHRIRAM C'),
  (23,'1RN21IS145','SHRISTI JAIN'),
  (24,'1RN21IS146','SHUBHAM')";

  $s=$dbo->conn->prepare($c);
  try{
    $s->execute();
  }
  catch(PDOException $o)
  {
    echo("<br>duplicate entry");
  }
  $c="delete from faculty_details";
  $s=$dbo->conn->prepare($c);
    try{
      $s->execute();
      echo("<br> all teachers deleted");
    }
    catch(PDOException $o)
    {
      echo("<br>duplicate entry");
    }

  $c="insert into faculty_details
(id,user_name,password,name)
values
(1,'SL','123','SURESH L'),
(2,'SN','123','SHYLA N'),
(3,'JBN','123','JAGADEESHA B N'),
(4,'KB','123','KAVITHA B'),
(5,'AG','123','AISHWARYA G'),
(6,'AU','123','ARUNA U')";

  $s=$dbo->conn->prepare($c);
  try{
    $s->execute();
  }
  catch(PDOException $o)
  {
    echo("<br>duplicate entry");
  }
  $c="delete from session_details";
  $s=$dbo->conn->prepare($c);
    try{
      $s->execute();
      echo("<br> all sessions deleted");
    }
    catch(PDOException $o)
    {
      echo("<br>duplicate entry");
    }

  $c="insert into session_details
(id,year,term)
values
(1,2023,'4th SEM'),
(2,2023,'5TH SEM')";

  $s=$dbo->conn->prepare($c);
  try{
    $s->execute();
  }
  catch(PDOException $o)
  {
    echo("<br>duplicate entry");
  }
  $c="delete from course_details";
  $s=$dbo->conn->prepare($c);
    try{
      $s->execute();
      echo("<br> all courses deleted");
    }
    catch(PDOException $o)
    {
      echo("<br>duplicate entry");
    }

  $c="insert into course_details
(id,title,code,credit)
values
  (1,'Database management system ','21CS53',3),
  (2,'Computer Networks','21CS52',4),
  (3,'Automata Theory And Compiler Design','21CS51',3),
  (4,'ARTIFICIAL INTELLIGENCE','21CS54',3),
  (5,'Angular JS and Node JS ','21CSl581',1),
  (6,'Research Methodology ','21CS56',1)";
  $s=$dbo->conn->prepare($c);
  try{
    $s->execute();
  }
  catch(PDOException $o)
  {
    echo("<br>duplicate entry");
  }

  //if any record already there in the table delete them
  clearTable($dbo,"course_registration");
  $c="insert into course_registration
  (student_id,course_id,session_id)
  values
  (:sid,:cid,:sessid)";
  $s=$dbo->conn->prepare($c);
  //iterate over all the 24 students
  //for each of them chose max 3 random courses, from 1 to 6

  for($i=1;$i<=24;$i++)
  {
    for($j=0;$j<3;$j++)
    {
        $cid=rand(1,6);
        //insert the selected course into course_registration table for 
        //session 1 and student_id $i
        try{
           $s->execute([":sid"=>$i,":cid"=>$cid,":sessid"=>1]); 
        }
        catch(PDOException $pe)
        {

        }

        //repeat for session 2
        $cid=rand(1,6);
        //insert the selected course into course_registration table for 
        //session 2 and student_id $i
        try{
           $s->execute([":sid"=>$i,":cid"=>$cid,":sessid"=>2]); 
        }
        catch(PDOException $pe)
        {

        }
    }
  }


  //if any record already there in the table delete them
  clearTable($dbo,"course_allotment");
  $c="insert into course_allotment
  (faculty_id,course_id,session_id)
  values
  (:fid,:cid,:sessid)";
  $s=$dbo->conn->prepare($c);
  //iterate over all the 6 teachers
  //for each of them chose max 2 random courses, from 1 to 6

  for($i=1;$i<=6;$i++)
  {
    for($j=0;$j<2;$j++)
    {
        $cid=rand(1,6);
        //insert the selected course into course_allotment table for 
        //session 1 and fac_id $i
        try{
           $s->execute([":fid"=>$i,":cid"=>$cid,":sessid"=>1]); 
        }
        catch(PDOException $pe)
        {

        }

        //repeat for session 2
        $cid=rand(1,6);
        //insert the selected course into course_allotment table for 
        //session 2 and student_id $i
        try{
           $s->execute([":fid"=>$i,":cid"=>$cid,":sessid"=>2]); 
        }
        catch(PDOException $pe)
        {

        }
    }
  }
