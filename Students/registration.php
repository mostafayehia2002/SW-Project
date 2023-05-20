<?php
session_start();
if (!isset($_SESSION["student_id"])) {

    header("location:../index.php");
    exit();
}

include_once("../DataBase/database.php");
if ($con) {
    $ID = $_SESSION['student_id'];
    $sql = $con->query("SELECT * FROM `student` WHERE St_ID='$ID'");
    $data = $sql->fetch(PDO::FETCH_ASSOC);
}


?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CssComponent/all.min.css">
    <link rel="stylesheet" href="../CssComponent/Info.css">
    <link rel="stylesheet" href="../CssComponent/Dashboard.css">
    <title>Information</title>

    <style>
        
table{ 
  border-collapse: collapse;
  border-spacing: 0;
  box-shadow: 0 2px 15px rgba(64,64,64,.2);
  border-radius: 12px 12px 0 0;
  overflow: hidden;
  width: 80%;
  background-color: #fafafa;
  margin:50px auto;
}
th{
  background-color: #229678;
  color: #fafafa;
  font-weight: 200;
  text-transform: uppercase;
}
td,
th{
  padding: 15px 20px;
  text-align: center;
 
}

tr.one{
  border-bottom: 2px solid #1B9C85;
}
tr{
  width: 100%;
 
}
/* tr:nth-child(even){
  background-color: #eeeeee;
} */
td input{
  background-color: var(--main-color);
  padding: 7px 22px;
  border-radius: 3px;
  accent-color:var(--main-color);
}

input[type="submit"]{
  color:white;
}
    </style>
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

        <table>
        <form action="" method="post">
        <thead>
          <tr>
            <th><label for="s1">الماده الاولي</label></th>
            <th><label for="s2">الماده الثانيه</label></th>
            <th><label for="s3">الماده الثالثه</label></th>
            <th><label for="s4">الماده الرابعه</label></th>
            <th><label for="s5"> الماده الخامسه</label></th>
            <th><label for="s6"> الماده السادسه</label></th>




         
          </tr>
        </thead>
        <tbody>
          <tr class="one">
            <tr>
              <td><label for="s1">اسم الماده</label></td>
              <td><label for="s2">اسم الماده</label></td>
              <td><label for="s3">اسم الماده</label></td>
              <td><label for="s4">اسم الماده</label></td>
              <td><label for="s5">اسم الماده</label></td>
              <td><label for="s6">اسم الماده</label></td>
           
            </tr>
          </tr>
          <tr class="one">
            <td> <input type="checkbox"  name=""  id="s1"></td>
            <td> <input type="checkbox"  name="" id="s2"></td>
            <td> <input type="checkbox"  name="" id="s3"></td>
            <td> <input type="checkbox"  name="" id="s4"></td>
            <td> <input type="checkbox"  name="" id="s5"></td>
            <td> <input type="checkbox"  name="" id="s6"></td>
          </tr>
          
        </tbody>
        <tfoot>
          <tr>
            <td>
              <input type="submit" value="تسجيل">
            </td>       
          </tr>      
        </tfoot>
      </form>
      </table>



        </div>
    </section>
    <script src="../JsComponent/Action.js"></script>
</body>

</html>