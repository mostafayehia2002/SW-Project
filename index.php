<?php
session_start();
include_once("DataBase/database.php");

$err = [];

if (isset($_POST["Login"])) {
  $ID = $_POST["username"];
  $Password = $_POST["password"];
  $Type_User = $_POST["type_user"];


if (empty($_POST['username'])){
  $err["id"] = "UserName IS Required";
}
if (empty($_POST['password'] )) {
  $err["password"] = "Password IS Required";

}if(empty($_POST['type_user'])) {
  $err['type'] = "Type Of User IS Required";
}

  switch ($Type_User) {
    case "admin":
      $sql = $con->query("SELECT * FROM `admin` WHERE Ad_ID ='$ID' AND Password='$Password'");
      $count = $sql->rowCount();
      $data = $sql->fetch(PDO::FETCH_ASSOC);
      if ($count == 1) {
        $_SESSION["admin_id"] = $ID;
        header("Location: ./Admins/Admin_Info.php");
        exit();
      }

      break;

    case "doctor":
      $sql = $con->query("SELECT * FROM `doctor` WHERE Doctor_ID ='$ID' AND Password='$Password'");
      $count = $sql->rowCount();
      $data = $sql->fetch(PDO::FETCH_ASSOC);

      if ($count == 1) {
        $_SESSION["doctor_id"] = $ID;
        header("Location:./Doctors/Doctor_info.php");
        exit();
      }

      break;

    case "student":
      $sql = $con->query("SELECT * FROM `student` WHERE St_ID ='$ID' AND Password='$Password'");
      $count = $sql->rowCount();
      $data = $sql->fetch(PDO::FETCH_ASSOC);
      if ($count == 1) {
        $_SESSION["student_id"] = $ID;
        header("Location:./Students/Student_info.php");
        exit();
      }
      break;
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./CssComponent/all.min.css">
  <link rel="stylesheet" href="./CssComponent/login.css">
  <title> Login Form</title>
</head>
<body>
  <div class="container">
    <div class="form-box">
      <video class="title" loop autoplay height="100px" width="100px">
            <source src="Images/logo.mp4">
          </video>
      <form action="" method="POST">
        <div class="input-group">
          <div class="input-filed" id="nameFiled">
            <i class="fa-solid fa-user"></i>
            <input type="text" placeholder="Username" name="username" autocomplete="off">
          </div>
          <div class="input-filed">
            <i class="fa-solid fa-lock"></i>
            <input type="password" placeholder="Password" name="password" autocomplete="off">
          </div>
          <div class="forget-pass">
            <a href="#">Forget Password?</a>
          </div>
          <div class="input-radio">
            <div class="admin">
              <input type="radio" id="admin" name="type_user" value="admin" checked>
              <label for="admin">Admin</label>
            </div>
            <div class="docter">
              <input type="radio" id="docter" name="type_user" value="doctor">
              <label for="docter">Doctor</label>
            </div>
            <div class="user">
              <input type="radio" id="user" name="type_user" value="student">
              <label for="user">Student</label>
            </div>
          </div>
        </div>

        <div class="btn-filed">
          <input type="submit" value="Login" name="Login">
        </div>
        <div class="developer">
        <a href="developer.php">Show  System Developer</a>
        </div>
        <?php 
        if(isset($err['id'])){

          echo "<span  class='message-error'>".$err['id'] ."</span>";

        }elseif(isset($err['password'])){

          echo "<span  class='message-error'>".$err['password'] ."</span>";

        }elseif(isset($err['type'])){

          echo "<span  class='message-error'> ".$err['type'] ."</span>";
        } 
        ?>
        <script>
          let error=document.querySelector(".message-error");
          if(error){
            setTimeout(()=>{
          error.style.display="none";
            },2000)
          }
        </script>

      </form>

 
    </div>
  </div>



</body>

</html>

