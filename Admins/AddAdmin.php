<?php
session_start();
include_once("../DataBase/database.php");
if (!isset($_SESSION["admin_id"])) {
    header("location:../index.php");
    exit();
} else {
    $id = $_SESSION["admin_id"];
}

$info_admin = $con->query("SELECT * FROM `admin` WHERE `Ad_ID`=$id ");
$info_admin = $info_admin->fetch(PDO::FETCH_ASSOC);




if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $name = $_POST['full-name'];
    $gender = $_POST['type'];
    $address = $_POST['address'];
    $job = $_POST['job'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $faculty = $_POST['faculty'];
    $university = $_POST['university'];
    //images
    $from = $_FILES['image']['tmp_name'];
    $to = "images/" . $_FILES['image']['name'];
    move_uploaded_file($from, $to);
    $image = $_FILES['image']['name'];
    //sql
    try {
        $sql = $con->query("INSERT INTO `admin` (`Ad_ID`, `Password`, `Image`, `Full_Name`, `Gender`, `Address`, `Job`, `Email_Address`, `Phone_Number`, `Faculty`, `University`) VALUES ('$id','$id','$image','$name','$gender','$address','$job','$email','$phone','$faculty',' $university')");
        echo "<div class='success'>  تم اضافه البيانات بنجاح</div>";
    } catch (PDOException $e) {
        echo "<div class='faild'>";
        echo " يرجي عدم تكرار الرقم القومي والتاكد من تسجيل البيانات بشكل صحيح" . "<br>";
        echo $e->getMessage();
        echo "</div>";
    }
}




if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    $delete = $con->query("DELETE FROM `admin` WHERE `Ad_ID`=$delete_id");
    if ($delete) {
        echo "تم الحذف بنجاح";
        header("Location: AddAdmin.php");
        exit();
    }
}

?>


<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- table -->
    <link rel="stylesheet" href="../CssComponent/bootstrap.min.css">
    <link rel="stylesheet" href="../CssComponent/datatables.min.css">
    <!--  -->
    <link rel="stylesheet" href="../CssComponent/all.min.css">
    <link rel="stylesheet" href="../CssComponent/AddData.css">
    <link rel="stylesheet" href="../CssComponent/Table.css">
    <link rel="stylesheet" href="../CssComponent/Dashboard.css">
    <!--   Tabel CSS  -->

    <title>اضافه ادمن</title>

    <style>
        .ptb-50 {
            padding: 50px 0px;
        }

        .mtb-15 {
            margin: 15px 0;
        }


        /* ==== Scoll  = Start ===== */
        .totop {
            position: fixed;
            bottom: 0px;
            right: 10px;
            height: 45px;
            width: 45px;
            cursor: pointer;
            display: none;
            background: rgba(0, 0, 0, 0.3);
            color: #fff;
            border-radius: 5px 5px 0 0;
            line-height: 47px;
            font-size: 20px;
            text-align: center;
        }

        .totop:hover {
            line-height: 40px;
            color: #fff;
            background: #194274;
            text-shadow: 0 0 5px #000;
        }

        /* ==== Scoll  = End ===== */
        /* ==== Data table  = Start ===== */

        .data_table {
            background: #fff;
            padding: 15px;
            box-shadow: 1px 3px 5px #aaa;
            border-radius: 5px;
        }

        .data_table .btn {
            padding: 5px 10px;
            margin: 10px 3px 10px 0;
        }

        /* ==== Data table  = End  ===== */


        /* Start Delete And Update And add*/
        .table-content td button {
            margin: 1px;
            font-size: 14px;
            font-weight: bold;
            outline: none;
            border: none;
        }

        .table-content td a {
            color: #fff;
            padding: 4px 8px;
            border-radius: 3px;
        }

        .table-content td a.add {
            background-color: #080;
        }

        .table-content td a.delete {
            background-color: #f00;
        }

        .table-content td a.update {
            background-color: #00f;
        }

        /* End Delete And Update And add*/
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
                <div class="athers">
                    <div class="input-filed">
                    </div>
                </div>
                <div class="oneuser">
                    <div class="allinput">
                        <div class="input-filed">
                            <label for="name">الاسم كاملا</label>
                            <input type="text" placeholder="يرجي كتابه الاسم باللغه العربيه كاملا" name="full-name" id="name" required>
                        </div>
                        <div class="input-filed spcail">
                            <label for="image"> اضافة صورة</label>
                            <input type="file" id="image" name="image" accept="images/*">
                        </div>
                        <div class="input-filed">
                            <label for="address">العنوان</label>
                            <input type="text" id="address" name="address">
                        </div>
                        <div class="input-filed">
                            <label for="id">الرقم القومي</label>
                            <input type="number" placeholder="يرجي كتابه الرقم القومي بشكل صحيح " id="id" name="id" required>
                        </div>
                        <div class="input-filed">
                            <label for="phone">رقم المحمول</label>
                            <input type="number" placeholder="+20**********" id="phone" name="phone">
                        </div>
                        <div class="input-filed">
                            <label for="faculty"> الكلية</label>
                            <input type="text" value="الحاسبات والمعلومات" id="faculty" name="faculty">
                        </div>
                        <div class="input-filed">
                            <label for="university"> الجامعة</label>
                            <input type="text" value="المنوفيه" id="university" name="university">
                        </div>
                        <div class="input-filed">
                            <label for="job"> الوظيفة</label>
                            <input type="text" value="مسئول عن اداره شئون الطلاب" id="job" name="job">
                        </div>
                        <div class="input-filed">
                            <label for="email"> البريد الالكتروني</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        <div class="input-filed">
                            <label for="gender">النوع</label>
                            <div class="gender">
                                <div class="male">
                                    <input type="radio" name="type" id="male" value="ذكر" checked>
                                    <label for="male">ذكر</label>
                                </div>
                                <div class="female">
                                    <input type="radio" name="type" id="female" value="انثي">
                                    <label for="female">انثي</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="save">
                    <input type="submit" value="حفظ" name="submit">
                </div>
            </form>



            <!-- data tabel  -->
            <div class="row">
                <h3 class="titleTabel">جدول لعرض بيانات المسؤلين عن ادارة شئون الطلاب</h3>
                <div class="col-12">
                    <div class="data_table">
                        <table id="example" class="table table-striped table-bordered">

                            <thead class="table-dark">
                                <th class="th_text">الرقم القومي</th>
                                <th class="th_text">الاسم</th>
                                <th class="th_text">الايميل</th>
                                <th class="th_text">العنوان</th>
                                <th class="th_text">الموبايل</th>
                                <th class="th_text">النوع</th>
                                <?php
                                if ($info_admin['status'] == 1) {
                                    echo "<th>التحكم</th>";
                                }
                                ?>
                            </thead>



                            <tbody class="table-content">

                                <?php
                                $all_admins = $con->query("SELECT * FROM `admin`");
                                $all_admins = $all_admins->fetchAll(PDO::FETCH_ASSOC);
                                if (!empty($all_admins)) {
                                    foreach ($all_admins as  $user) {
                                ?>
                                        <tr>
                                            <td><?php echo $user['Ad_ID'] ?></td>
                                            <td><?php echo $user['Full_Name'] ?></td>
                                            <td><?php echo $user['Email_Address'] ?></td>
                                            <td><?php echo $user['Address'] ?></td>
                                            <td><?php echo $user['Phone_Number'] ?></td>
                                            <td><?php echo $user['Gender'] ?></td>

                                            <?php
                                            if ($info_admin['status'] == 1) : ?>
                                                <td>
                                                    <button> <a class="update" href="update_admin.php?update=<?php echo $user['Ad_ID'] ?>" class="delete-btn"><i class="fa-solid fa-edit"></i>
                                                            تعديل</a> </button>




                                                    <button> <a class="delete" href="AddAdmin.php?delete=<?php echo $user['Ad_ID'] ?>" class="delete-btn" onclick="return confirm('Are you soure Delete this user ?');"><i class="fa-solid fa-trash"></i> حذف</a></button>

                                                </td>
                                            <?php
                                            endif;
                                            ?>
                                        </tr>
                                <?php
                                    }
                                } else {
                                    echo '<p class="empty">no Admin available</p>';
                                }
                                ?>






                            </tbody>
                        </table>
                    </div>
                </div>
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
    <script src="../JsComponent/admin.js"></script>
    </script>
</body>

</html>