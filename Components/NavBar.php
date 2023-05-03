<?php
include_once("../DataBase/database.php");
if ($con) {
   if (isset($_SESSION['admin_id'])) {

      $admin_id = $_SESSION['admin_id'];
      $q = $con->query("SELECT * FROM `admin` WHERE Ad_ID='$admin_id'");
      $d = $q->fetch(PDO::FETCH_ASSOC);
      $imgPath = "../Admins/images/";
      $profile = "../Admins/Admin_Info.php";
   } elseif (isset($_SESSION['doctor_id'])) {

      $doctor_id = $_SESSION['doctor_id'];
      $q = $con->query("SELECT * FROM `doctor` WHERE Dr_ID='$doctor_id'");
      $d = $q->fetch(PDO::FETCH_ASSOC);
      $imgPath = "../Doctors/images/";
      $profile = "../Doctors/Doctor_info.php";
   } elseif (isset($_SESSION['student_id'])) {

      $student_id = $_SESSION['student_id'];
      $q = $con->query("SELECT * FROM `student` WHERE St_ID='$student_id'");
      $d = $q->fetch(PDO::FETCH_ASSOC);
      $imgPath = "../Students/images/";
      $profile = "../Students/Student_info.php";
   }


   $full_name = $d['Full_Name'];
   $job = $d['Job'];
   $img = $imgPath . $d['Image'];
}

?>
<!-- Start nav-bar -->
<div class="nav-bar1">
   <div class="icon">
      <i class="fa-solid fa-bars-staggered"></i>
   </div>

   <div class="profile">
      <div class="user">
         <p class="username"><?php echo  $full_name ?></p>
         <p class="job"><?php echo $job ?></p>
      </div>

      <div class="img">
         <img src=<?php echo $img ?> alt="error" height="30px" width="30px">
      </div>

      <ul class="profile-list">
         <li> <a href=<?php echo "$profile" ?>><i class="fa-solid fa-user"></i>الصفحه الرئيسيه</li>
         <li><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i>تسجيل خروج</a></li>
      </ul>
   </div>


</div>
<!-- end nav-bar -->