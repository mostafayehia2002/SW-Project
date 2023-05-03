<?php
session_start();
include_once("../DataBase/database.php");
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
  <link rel="stylesheet" href="../CssComponent/all.min.css">
  <link rel="stylesheet" href="../CssComponent/AddData.css">
  <link rel="stylesheet" href="../CssComponent/Table.css">
  <link rel="stylesheet" href="../CssComponent/Dashboard.css">
  <title> اعدادات القسم</title>

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
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="athers">
          <h3 class="title">اضافة مواد القسم:</h3>
          <div class="input-filed">
            <label for="alluser">اضافة مواد القسم</label>
            <input type="file" id="alluser">
          </div>
        </div>
        <div class="break"></div>
        <div class="oneuser">
          <h3 class="title">اضافة ماده:</h3>
          <div class="allinput">
            <div class="input-filed">
              <label for="Subject_Name"> اسم الماده</label>
              <input type="text" id="Subject_Name" name="Subject_Name" required>
            </div>
            <div class="input-filed">
              <label for="Subject_Code"> كود الماده</label>
              <input type="text" id="Subject_Code" name="Subject_Code" required />
            </div>
            <div class="input-filed">
              <label for="Subject_Hours">
                عدد ساعات الماده
              </label>
              <input type="number" id="Subject_Hours" name="Subject_Hours" required />
            </div>
            <div class="input-filed">
              <label for="Subject_Levels">المستوي</label>
              <input type="number" id="Subject_Levels" name="Subject_Levels" required />
            </div>
            <div class="input-filed">
              <label for="Depandance_Subject_ID">المتطلب السابق:</label>
              <select name="Depandance_Subject_ID" id="Depandance_Subject_ID">
                <option value=""> </option>
                <option value=""> </option>
                <option value=" "> </option>
                <option value=" "> </option>
              </select>
            </div>
          </div>
          <div class="save">
            <input type="submit" value="اضافه" name="submit">
          </div>
        </div>
      </form>
    </div>
  </section>
  <script src="../JsComponent/Action.js"></script>
  <script src="Js/main.js"></script>
</body>

</html>