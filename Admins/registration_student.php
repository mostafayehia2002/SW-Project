<?php 
include_once("../DataBase/database.php");

//department
$ID_department=$_GET['department_id'];
$name_department=$con->query("SELECT * FROM `departments` WHERE `ID`='$ID_department'");
$name_department=$name_department->fetch(PDO::FETCH_ASSOC);
$department_table=$name_department['Department_English_Name']."_subject";
//

//department subject
 $subject_department=$con->query("SELECT * FROM `$department_table`");
$subject_department=$subject_department->fetchAll(PDO::FETCH_ASSOC);

//


//course registration table
$course_registration=$con->query("SELECT DISTINCT  `Student_ID` FROM `course_registration`");
$course_registration=$course_registration->fetchAll(PDO::FETCH_ASSOC);
//


//number of student
 $student= $con->query("SELECT * FROM `student`");
 $number_student= $student->rowCount();
 $student=$student->fetchAll(PDO::FETCH_ASSOC);
 //
 
 

//add subject to student
 for($i=0;$i<$number_student;$i++){
  $student_id=$student[$i]['St_ID'];
  if( $student_id !==$course_registration[$i]['Student_ID']){

    foreach($subject_department as $sub){

     $subject_name=$sub['Subject_Name'];
     
     $con->query("INSERT INTO `course_registration` (`Student_ID`,`Subject_Name`)VALUES('$student_id','$subject_name')"); 
     
    }
    }

}

//add student to doctor 




?>