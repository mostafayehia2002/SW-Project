<?php
session_start();

if (!isset($_SESSION["doctor_id"])) {
    header("location:../index.php");
    exit();
}
$ID = $_SESSION["doctor_id"];
include_once("../DataBase/database.php");


if (isset($_GET['update_post'])) {
    $update_post = $_GET['update_post'];
} else {
    header('Location: subject.php');
    exit();
}


if (isset($_POST['update'])) {

    $subject = $_POST['subject_name'];
    $content = $_POST['content'];
    $img_to = "./Posts/" . $_FILES['img']['name'];
    $img_from = $_FILES['img']['tmp_name'];
    move_uploaded_file($img_from, $img_to);
    $img = $_FILES['img']['name'];

    //
    $pdf_to = "./Posts/" . $_FILES['pdf']['name'];
    $pdf_from = $_FILES['pdf']['tmp_name'];
    move_uploaded_file($pdf_from, $pdf_to);
    $pdf = $_FILES['pdf']['name'];
    //
    $con->query("UPDATE `create_post`  SET  `Doctor_ID`= '$ID', `Subject_Name`='$subject', `Content`='$content', `Pdf`='$pdf', `Img`='$img'");
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
    <title>تعديل منشور</title>

    <style>
        .container .input-filed input,
        .container .input-filed select,
        .container .input-filed textarea {
            outline: none;
            font-size: 14px;
            font-weight: 400;
            color: #333;
            border-radius: 7px;
            border: 1px solid #1B9C85;
            padding: 0 15px;
            height: 42px;
            margin: 8px 0;
            background-color: #fff;
        }

        .container .input-filed textarea {
            height: 170px;
            resize: none;
            padding: 10px;
        }

        .container .oneuser .allinput {
            display: flex;
            flex-direction: column;
            width: 50%;
            margin: auto;
            padding: 40px 0;
        }

        @media (max-width:768px) {
            .container .oneuser .allinput {
                width: 80%;
            }
        }

        .container .oneuser .allinput .input-filed {
            display: flex;
            flex-direction: column;
            gap: 8px;
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

            <form action="" method="POST" enctype="multipart/form-data">

                <div class="oneuser">

                    <h3 class="title">تعديل منشور:</h3>
                    <div class="allinput">


                        <div class="input-filed">
                            <label for="subject_name"> يجب تحديد المادة</label>
                            <select name="subject_name" id="subject_name" required>
                                <?php
                                $doctor_subject = $con->query("SELECT * FROM `doctor_subject`WHERE Doctor_Id=$ID");
                                $doctor_subject = $doctor_subject->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($doctor_subject as $d) {
                                ?>
                                    <option value="<?php echo $d['Subject_Name'] ?>"><?php echo $d['Subject_Name'] ?>
                                    </option>


                                <?php } ?>
                            </select>
                        </div>

                        <div class="input-filed">
                            <label for="pdf">اختر ملف </label>
                            <input type="file" id="pdf" name="pdf">
                        </div>

                        <div class="input-filed">
                            <label for="img">اختر صورة </label>
                            <input type="file" id="img" name="img" accept="image/*">
                        </div>

                        <div class="input-filed">
                            <label for="content"> اكتب تعليق</label>
                            <textarea name="content" id="content"></textarea>
                        </div>

                        <div class="save">
                            <input type="submit" value="تعديل" name="update">
                        </div>
                    </div>

                </div>
            </form>

        </div>


    </section>


    <script src="../JsComponent/bootstrap.bundle.min.js"></script>
    <script src="../JsComponent/jquery-3.6.0.min.js"></script>
    <script src="../JsComponent/datatables.min.js"></script>
    <script src="../JsComponent/pdfmake.min.js"></script>
    <script src="../JsComponent/vfs_fonts.js"></script>
    <script src="../JsComponent/custom.js"></script>
    <script src="../JsComponent/Action.js"></script>
</body>

</html>