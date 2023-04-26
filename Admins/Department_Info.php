<?php
session_start();
if (!isset($_SESSION["admin_id"])) {

  header("location:../index.php");
  exit();
}

include_once("../DataBase/database.php");
if ($con) {
  $sql = $con->query("SELECT * FROM `departments`");
  $data = $sql->fetchAll(PDO::FETCH_ASSOC);
}

?>




<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../CssComponent/all.min.css">
  <link rel="stylesheet" href="CssStyle//Department.css">
  <link rel="stylesheet" href="../CssComponent/Dashboard.css">

  <title>Departments information</title>
</head>

<body>
  <!-- Start nav-bar -->
  <?php include_once("../Components/NavBar.php"); ?>
  <!-- end nav bar -->

  <section class="section">


    <!-- Dashboard -->
    <?php include_once("../Components/Dashboard.php") ?>
    <!-- end Dashboard -->

    <div class="container">
      <div class="departments">
        <?php if ($sql->rowCount() != 0) {
          foreach ($data as $value) {


        ?>
            <div class="box">
              <img src="<?php echo "images/" . $value['Departmanet_Image'] ?>" alt="">
              <div class="content">
                <h3><?php echo   $value['Departmanet_Name']  ?></h3>
                <p>كودالقسم: <span><?php echo   $value['Departmanet_ID'] ?></span></p>
                <p>تاريخ الانشاء: <span><?php echo   $value['Departmanet_Date']  ?></span></p>
                <p>رئيس القسم :د/ <span> <?php echo  $value['Departmanet_manger']  ?></span></p>
                <p> عدد الاعضاء: <span> <?php echo   $value['Departmanet_Doctors']  ?> </span> عضو</p>
                <p> عدد الطلاب: <span><?php echo   $value['Departmanet_Student']  ?></span>طالب</p>
              </div>
              <div class="info">
                <a href="#">قراءة المزيد </a>
                <i class="fas fa-long-arrow-alt-left"></i>
              </div>
            </div>

        <?php }
        } ?>
      </div>
    </div>

  </section>
  <script src="../JsComponent/Action.js"></script>
  <script src="Js/main.js"></script>
</body>

</html>