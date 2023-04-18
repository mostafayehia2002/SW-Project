<?php
session_start();

if (!isset($_SESSION["admin_id"])) {

    header("location:../index.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <!-- font Awesome -->
    <link rel="stylesheet" href="./CSS Style/all.min.css">
    <!-- custom css style -->
    <link rel="stylesheet" href="./CSS Style/Dashboard.css">
</head>

<body>

    <!-- Start section sidebar -->

    
    <!-- nav-bar -->
    <div class="nav-bar">
            <div class="icon">
            <i class="fa-solid fa-bars-staggered"></i>
            </div>
             <div class="profile">
                <div class="user">
                <span class="username">mostafa</span>
                 <span class="job">admin</span>
                </div>
        
                <div class="img">
                <img src="./images//pic-1.jpg" alt=""  height="30px" width="30px">
                </div>        
              
           </div> 




        </div>
        <!-- side-bar -->
        <div class="side-bar">
         <h2> SW-Project</h2> 


        </div>

    




<script>
let list=document.querySelector(".icon i");
let navBar=document.querySelector(".nav-bar");
let sideBar=document.querySelector(".side-bar");
list.onclick=()=>{
      
    if(sideBar.classList.contains("hidden")){
        sideBar.classList.remove("hidden") ;
        navBar.style.cssText="width:82%";
    }else{
     sideBar.classList.add("hidden");
    navBar.style.cssText="width:100%";
    }
    
}

</script>


<script src="./Admins/JS/Admin.js"></script> 
</body>

</html>