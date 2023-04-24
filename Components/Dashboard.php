<div class="Dashboard">

   <!-- side-bar -->
   <div class="side-bar">

      <h1><i class="fa-solid fa-building-columns"></i></h1>

      <!--start admin  -->
      <?php  if (isset($_SESSION['admin_id'])) {?>
      <ul class="link">
       <li><a href="Admin_Info.php"><i class="fa-sharp fa-solid fa-circle-info"></i>البيانات الشخصية</a> </li>
 
      
     </ul>

      <ul class="link">
         <li class="menu">
         <i class="fa-solid fa-users"></i>اضافه اعضاء<span class="fa-solid fa-caret-down"></span>
            <ul class="dropdown-menu">
               <li><a href="AddAdmin.php"><i class="fa-sharp fa-solid fa-people-roof"></i>اضافه مسئول جديد</a></li>
               <li><a href="AddDoctor.php"><i class="fa-solid fa-user-doctor"></i>اضافه اعضاء هيئه تدريس</a></li>
               <li>   <a href="AddStudent.php"><i class="fa-solid fa-graduation-cap"></i>اضافه طلاب</a></li>
               
            </ul>

         </li>

      </ul>
  

<!-- start doctor -->
     <?php }elseif(isset($_SESSION['doctor_id'])){?>

      <ul class="link">
       <li><a href="Doctor_Info.php">البيانات الشخصيه</a></li>
     </ul>




      <!-- start student -->
      <?php }elseif(isset($_SESSION['student_id'])){ ?>
         <ul class="link">
       <li><a href="Student_Info.php">البيانات الشخصيه</a></li>
     </ul>

     <?php  }?>
     
   </div>

</div>
<!-- end Dasgboard -->