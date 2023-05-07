<?php
include_once("DataBase/database.php");
$developer = $con->query("SELECT *,Datediff(curdate(),date_birth) AS age  FROM `developer`");
$developer = $developer->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./CssComponent/all.min.css">
  <link rel="stylesheet" href="./CssComponent/developer.css">
  <title>Others</title>
</head>

<body>
  <div class="container">
    <div class="boxs-content">
      <?php foreach ($developer as $person) { ?>
        <div class="box">
          <img src="images/<?php echo $person['image'] ?>" alt="">
          <h3><?php echo $person['name'] ?></h3>
          <p> <?php echo $person['track'] ?></p>
          <p><?php echo (int) ($person['age'] / 365)  ?> Year</p>
          <p><?php echo $person['faculty']?></p>
          <p><?php echo $person['department'] ?></p>
          <div class="social">
            <a href="<?php echo $person['facebook'] ?>"><i class="fa-brands fa-facebook"></i></a>
            <a href="<?php echo $person['linkedin'] ?>"><i class="fa-brands fa-linkedin"></i></a>
            <a href="https://wa.me/+20<?php echo $person['phone'] ?>"><i class="fa-brands fa-whatsapp"></i></a>
            <a href="mailto:<?php echo $person['email'] ?>"><i class="fa-solid fa-envelope"></i></a>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</body>

</html>