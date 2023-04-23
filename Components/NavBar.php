<?php
include_once("../DataBase/database.php");
session_start();

if($con){
   if(isset($_SESSION['admin_id'])){
      $admin_id=$_SESSION['admin_id'];
      $q=$con->query("SELECT * FROM `admin` WHERE Ad_ID='$admin_id'");
      $d=$q->fetch(PDO::FETCH_ASSOC);
   }

   $full_name= $d['Full_Name'];
   $job=$d['Job'] ;
   $img=$d['Image'];



}

?>
<!-- Start nav-bar -->    
<div class="nav-bar">
    <div class="icon">
    <i class="fa-solid fa-bars-staggered"></i>
    </div>

     <div class="profile">
        <div class="user">
        <p class="username"><?php echo  $full_name ?></p>
         <p class="job"><?php echo $job ?></p>
        </div>

        <div class="img">
        <img src=<?php echo"images/$img" ?> alt="error"  height="30px" width="30px">
        </div>       
      
   </div> 

</div>
<!-- end nav-bar -->

