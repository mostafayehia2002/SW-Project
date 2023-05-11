<?php
session_start();
if (!isset($_SESSION["doctor_id"])) {
  header("location:../index.php");
  exit();
}
include_once("../DataBase/database.php");

$department = $_GET['department'] . "_doctor_subjects";
$subject = $con->query("SELECT * FROM `$department`");
$data_subjects = $subject->fetchAll(PDO::FETCH_ASSOC);
$count = $subject->rowCount();
?>


<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../CssComponent/all.min.css">
  <link rel="stylesheet" href="../CssComponent/subject.css">
  <link rel="stylesheet" href="../CssCOmponent/Dashboard.css">
  <title>Subject</title>
</head>

<body>

  <!-- Dashboard -->
  <?php include_once("../Components/Dashboard.php")
  ?>
  <!-- end Dashboard -->
  <section class="section">
    <!-- Start nav-bar -->
    <?php include_once("../Components/NavBar.php");
    ?>
    <!-- end nav bar -->

    <div class="container">
      <div class="boxs">
        <?php if ($count >= 1) {

          foreach ($data_subjects as $d) {
        ?>
            <div class="box">
              <h2>
                اسم المقرر:
                <span>
                  <?php echo  $d['Subject_Name'] ?>
                </span>
              </h2>
              <div class="info">
                <a href="subject_setting.php?subject_name=<?php echo  $d['Subject_Name'] ?>"> الاعدادت </a>
                <i class="fas fa-long-arrow-alt-left"></i>
              </div>
            </div>

        <?php }
        } ?>
      </div>


    </div>
  </section>

  <script src="../JsComponent/Action.js"></script>
</body>

</html>