<?php

session_start();
if (!isset($_SESSION["doctor_id"])) {
  header("location:../index.php");
  exit();
}
include_once("../DataBase/database.php");
//table data
$subject_name = $_GET['subject_name'];

//


$subject_marks = $con->query("SELECT t1.Full_Name,
t2.Student_ID,
t2.Subject_Name,
t2.Subject_Marks,
t2.Subject_Midterm,
t2.Subject_Quiz,
t2.Subject_Attendance,
t2.Total_Marks
FROM
`student` t1
 INNER JOIN
 `subject_marks` t2 
 on t1.St_ID=t2.Student_ID
  AND t2.Subject_Name='$subject_name'
");
$subject_marks = $subject_marks->fetchAll(PDO::FETCH_ASSOC);









//All Post privete Subject
$allPosts = $con->query("SELECT * FROM `create_post` INNER JOIN `doctor` ON create_post.Doctor_ID=doctor.Doctor_ID  AND create_post.Subject_Name='$subject_name'");
$allPosts = $allPosts->fetchAll(PDO::FETCH_ASSOC);


//Delete Post
if (isset($_GET['delete_post'])) {
  $delete_post = $_GET['delete_post'];
  $post = $con->query("SELECT * FROM `create_post` WHERE `id`=$delete_post");
  $post = $post->fetch(PDO::FETCH_ASSOC);
  $delete = $con->query("DELETE FROM `create_post` WHERE  `id`=$delete_post");
  if ($delete) {
    if (!empty($post['Pdf'])) {
      $Pdf = $post['Pdf'];
      unlink("Posts/$Pdf");
    }
    if (!empty($post['Img'])) {
      $Img = $post['Img'];
      unlink("Posts/$Img");
    }
    header("Location: subject_setting.php?subject_name=$subject_name");
    exit();
  }
}
?>


<!DOCTYPE html>
<html lang="ar">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- table -->
  <link rel="stylesheet" href="../CssComponent/bootstrap.min.css">
  <link rel="stylesheet" href="../CssComponent/datatables.min.css">
  <!--  -->
  <link rel="stylesheet" href="../CssComponent/all.min.css">
  <link rel="stylesheet" href="../CssComponent/subject.css">
  <link rel="stylesheet" href="../CssComponent/AddData.css">
  <link rel="stylesheet" href="../CssComponent/Table.css">
  <link rel="stylesheet" href="../CssCOmponent/Dashboard.css">
  <title>Subject Setting</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

    .posts {
      display: flex;
      flex-direction: column;
      gap: 25px;
      max-width: 700px;
      margin: auto;
    }

    .posts .post {
      background: #fff;
      box-shadow: 0 4px 8px rgba(0, 0, 0, .1);
      border-radius: 3px;
      padding: 20px;
    }

    .posts .post .head {
      display: flex;
      position: relative;

    }

    .posts .post .head .profile {
      width: 60px;
      height: 60px;
      overflow: hidden;
      margin-left: 20px;
    }

    .posts .post .head .profile img {
      width: 100%;
      height: 100%;
      border-radius: 50%;
      object-fit: cover;
    }

    .posts .post .head .content h3 {
      font-weight: 400;
      color: #0e0e0e;
    }

    .posts .post .head .content .descrption span {
      margin-left: 10px;
      color: #999;
      font-weight: 300;
    }

    .posts .post .head .control {
      position: absolute;
      left: 12px;
      top: 8px;
      z-index: 22;
    }

    .posts .post .head .control i {
      cursor: pointer;
    }

    .posts .post .head .content-challenge {
      position: absolute;
      left: 12px;
      top: 25px;
      z-index: 20;
      display: none;
      flex-direction: column;
      background: #eee;
      border-radius: 5px;
      padding: 5px 16px;
    }

    .posts .post .head .content-challenge.active {
      display: flex;
    }

    .posts .post .head .content-challenge a {
      color: #2f2d2d;
      margin: 0;
      padding: 2px 0;
    }

    .posts .post .head .content-challenge a:hover {
      color: #1B9C85;
    }

    .posts .post .head .content-challenge a i {
      margin-left: 7px;
    }

    .posts .post p {
      margin: 8px 25px 14px;
      font-size: 15px;
      font-weight: 200;
      color: #4d4b4b;
    }

    .posts .post .image {
      overflow: hidden;
      border-radius: 4px;
      width: 90%;
      height: 400px;
      margin: auto;
    }

    .posts .post .image img {
      width: 100%;
      height: 100%;
      object-fit: fill;
      object-position: top;
    }

    .posts .post a {
      font-size: 17px;
      font-style: italic;
      font-weight: 200;
      color: #312a2a;
      padding: 20px 30px;
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
      <div class="row">
        <div class="col-12">
          <div class="data_table">
            <table id="example" class="table table-striped table-bordered">
              <thead class="table-dark">
                <tr>
                  <th>الرقم الاكاديمي</th>
                  <th>اسم الطالب</th>
                  <th>اسم المقرر</th>
                  <th>درجة المقرر</th>
                  <th>درجة نصف الترم</th>
                  <th>درجة الكويز</th>
                  <th>درجة الغياب</th>
                  <th> المجموع الكلي</th>
                  <th> التحكم</th>
                </tr>
              </thead>

              <tbody class="table-content">
                <?php foreach ($subject_marks as $data) { ?>
                  <tr>
                    <td><?php echo $data['Student_ID'] ?></td>
                    <td><?php echo $data['Full_Name'] ?></td>
                    <td><?php echo $data['Subject_Name'] ?></td>
                    <td><?php echo $data['Subject_Marks'] ?></td>
                    <td><?php echo $data['Subject_Midterm'] ?></td>
                    <td><?php echo $data['Subject_Quiz'] ?></td>
                    <td><?php echo $data['Subject_Attendance'] ?></td>
                    <td><?php echo $data['Total_Marks'] ?></td>
                    <td>
                      <button><a href="Add_Marks.php?id=<?php echo $data['Student_ID'] ?>&subject=<?php echo $data['Subject_Name'] ?>" class="update">تعديل</a></button>

                    </td>
                  </tr>

                <?php } ?>

              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!-- end table -->
    </div>
    <div class="container">
      <!-- All Posts -->
      <div class="posts">
        <?php foreach ($allPosts as $post) { ?>
          <div class="post">
            <div class="head">
              <div class="profile">
                <img src="images/<?= $post['Image'] ?>" alt="">
              </div>
              <div class="content">
                <h3><?= $post['Full_Name'] ?> </h3>
                <div class="descrption">
                  <span><?= $post['Date'] ?></span>
                  <span><?= $post['Subject_Name'] ?></span>
                </div>
              </div>
              <div class="control"><i class="fa-solid fa-ellipsis"></i></div>
              <div class="content-challenge">
                <a href="update_post.php?update_post=<?= $post['id'] ?>" class="update"> <i class="fa-solid fa-pen-to-square"></i>تعديل</a>
                <a href="subject_setting.php?subject_name=<?= $subject_name ?>&delete_post=<?= $post['id'] ?>" class="delete"> <i class="fa-solid fa-trash-can"></i>حذف</a>
              </div>
            </div>
            <p><?= $post['Content'] ?></p>
            <?php
            if (!empty($post['Img'])) { ?>
              <div class="image">
                <img src="Posts/<?= $post['Img'] ?>" alt="">
              </div>
            <?php }
            ?>
          </div>
        <?php } ?>
      </div>
    </div>
  </section>


  <script src="../JsComponent/bootstrap.bundle.min.js"></script>
  <script src="../JsComponent/jquery-3.6.0.min.js"></script>
  <script src="../JsComponent/datatables.min.js"></script>
  <script src="../JsComponent/pdfmake.min.js"></script>
  <script src="../JsComponent/vfs_fonts.js"></script>
  <script src="../JsComponent/custom.js"></script>
  <script src="../JsComponent/Action.js"></script>
  <script>
    document.querySelectorAll(".control").forEach((e) => {
      e.onclick = () => {
        e.nextElementSibling.classList.toggle("active");
      }
    });
  </script>
</body>

</html>