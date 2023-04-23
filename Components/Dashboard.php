<div class="Dashboard">

   <!-- side-bar -->
   <div class="side-bar">

      <h2> SW-Project</h2>

      <!--start admin  -->
      <?php  if (isset($_SESSION['admin_id'])) {?>
      <ul class="link">
       <li><a href="Admin_Info.php">البيانات الشخصيه</a></li>
     </ul>

      <ul class="link">
         <li class="menu">
            اضافه اعضاء
            <ul class="dropdown-menu">
               <li>   <a href="AddAdmin.php">اضافه مسئول جديد</a></li>
               <li>   <a href="AddDoctor.php">اضافه اعضاء التدريس</a></li>
               <li>   <a href="AddStudent.php">اضافه طلاب </a></li>
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