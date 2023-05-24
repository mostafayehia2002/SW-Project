<?php
session_start();
if (!isset($_SESSION["student_id"])) {

    header("location:../index.php");
    exit();
}

include_once("../DataBase/database.php");

 $ID = $_SESSION['student_id'];
$posts=$con->query("SELECT * FROM `course_registration` t1 INNER JOIN `create_post` t2  INNER JOIN `doctor` t3 on t1.Subject_Name=t2.Subject_Name AND t1.Registration=1 AND t2.Doctor_ID=t3.Doctor_ID AND t1.Student_ID='$ID' ORDER BY t2.Date DESC");
$posts=$posts->fetchAll(PDO::FETCH_ASSOC);





?>


<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../CssComponent/all.min.css">
        <link rel="stylesheet" href="../CssComponent/Info.css">
        <link rel="stylesheet" href="../CssComponent/post.css">
        <link rel="stylesheet" href="../CssComponent/Dashboard.css">
        <title>الاخبار</title>
    </head>



    <body>
        <!-- Dashboard -->
        <?php include_once("../Components/Dashboard.php") ?>
        <!-- end Dashboard -->
        <section class="section">
            <!-- Start nav-bar -->
            <?php include_once("../Components/NavBar.php"); ?>
            <!-- end nav bar -->
    <div class="container">
      <div class="posts">

      <?php foreach($posts as $p){ ?>

        <div class="post">
          <div class="head">
            <div class="profile">
              <img src="../Doctors/images/<?php echo $p['Image'] ?>" alt="">
            </div>
            <div class="content">
              <h3><?php echo $p['Full_Name'] ?></h3>
              <div class="descrption">
                <span><?php echo $p['Date'] ?></span>
                <span><?php echo $p['Subject_Name'] ?></span>
              </div>
            </div>
          </div>
          <p><?php echo $p['Content'] ?></p>

          <?php if(!empty($p['Img'])){?>
            
            <div class="image">
              <img src="../Doctors/Posts/<?php echo $p['Img'] ?>" alt="">  
            </div> 
            <?php }?>


       <?php if(!empty($p['Pdf'])){?>

        <div class="pdf">
           <a href="../Doctors/Posts/<?php echo $p['Pdf'] ?>" download><img src="./images/pdf.jpeg" alt=""></a>
          </div>
          <?php }?>

          </div>     

        <?php }?>
      </div>
   
    </div>


        </section>
        <script src="../JsComponent/Action.js"></script>
    </body>

</html>