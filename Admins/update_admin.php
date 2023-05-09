<?php
session_start();
include_once("../DataBase/database.php");
if (!isset($_SESSION["admin_id"])) {
    header("location:../index.php");
    exit();
}


if (isset($_GET['update'])) {
    $admin_id = $_GET['update'];
    $old_data_admin = $con->query("SELECT * FROM `Admin` WHERE `Ad_ID`=$admin_id");
    $old_data_admin = $old_data_admin->fetch(PDO::FETCH_ASSOC);
} else {
    header("location: AddAdmin.php");
    exit();
}

if (isset($_POST['update_data'])) {
    $new_full_name = $_POST['full-name'];
    $new_address = $_POST['address'];
    $new_id = $_POST['id'];
    $new_password = $_POST['password'];
    $new_phone = $_POST['phone'];
    $new_email = $_POST['email'];
    $new_type = $_POST['type'];
    $new_faculty = $_POST['faculty'];
    $new_university = $_POST['university'];
    $new_job = $_POST['job'];
    //images
    $new_imge = isset($_FILES['image']) ? $_FILES['image']['name'] : 'profile.jpg';

    try {
        if (empty($new_imge)) {
            $update_admin = $con->query("UPDATE `Admin` SET `Ad_ID`='$new_id',`Password`='$new_password',`Full_Name`='$new_full_name',`Address`='$new_address',`Email_Address`='$new_email',`Phone_Number`='$new_phone',`Gender`='$new_type', `Faculty`='$new_faculty',`University`='$new_university',`Job`='$new_job' WHERE `Ad_ID`=$admin_id");
        } else {
            $update_admin = $con->query("UPDATE `Admin` SET `Ad_ID`='$new_id',`Password`='$new_password',`Full_Name`='$new_full_name',`Address`='$new_address',`Email_Address`='$new_email',`Phone_Number`='$new_phone',`Gender`='$new_type', `Faculty`='$new_faculty',`University`='$new_university',`Job`='$new_job',`Image`='$new_imge' WHERE `Ad_ID`=$admin_id");
            $from = $_FILES['image']['tmp_name'];
            $to = "images/" . $_FILES['image']['name'];
            move_uploaded_file($from, $to);
        }
        if ($_SESSION['admin_id'] == $admin_id) {
            $_SESSION['admin_id'] = $new_id;
        }
        $admin_id = $new_id;
        $old_data_admin = $con->query("SELECT * FROM `Admin` WHERE `Ad_ID`=$admin_id");
        $old_data_admin = $old_data_admin->fetch(PDO::FETCH_ASSOC);
        echo "<div class='success'>  تم تعديل البيانات بنجاح</div>";
    } catch (Exception $e) {
        echo "<div class='faild'> حدث خطا لم تتم تعديل البيانات يرجي المحاوله مره اخري";
        echo $e->getMessage();
        echo "</div>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../CssComponent/all.min.css">
        <link rel="stylesheet" href="../CssComponent/AddData.css">
        <link rel="stylesheet" href="../CssComponent/Dashboard.css">
        <title>تحديث بيانات ادمن</title>
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
                                <input type="text" value="<?php echo $old_data_admin['Full_Name'] ?>"
                                    placeholder="يرجي كتابه الاسم باللغه العربيه كاملا" name="full-name" id="name"
                                    required>
                            </div>
                            <div class="input-filed spcail">
                                <label for="image"> اضافة صورة</label>
                                <input type="file" id="image" name="image" accept="image/*">
                            </div>
                            <div class="input-filed">
                                <label for="address">العنوان</label>
                                <input type="text" value="<?php echo $old_data_admin['Address'] ?>" id="address"
                                    name="address">
                            </div>
                            <div class="input-filed">
                                <label for="id">الرقم القومي</label>
                                <input type="number" value="<?php echo $old_data_admin['Ad_ID'] ?>"
                                    placeholder="يرجي كتابه الرقم القومي بشكل صحيح " id="id" name="id" required>
                            </div>
                            <div class="input-filed">
                                <label for="phone">رقم المحمول</label>
                                <input type="number" value="<?php echo $old_data_admin['Phone_Number'] ?>"
                                    placeholder="+20**********" id="phone" name="phone">
                            </div>
                            <div class="input-filed">
                                <label for="faculty"> الكلية</label>
                                <input type="text" value="<?php echo $old_data_admin['Faculty'] ?>" placeholder
                                    id="faculty" name="faculty">
                            </div>
                            <div class="input-filed">
                                <label for="university"> الجامعة</label>
                                <input type="text" value="<?php echo $old_data_admin['University'] ?>" placeholder
                                    id="university" name="university">
                            </div>
                            <div class="input-filed">
                                <label for="job"> الوظيفة</label>
                                <input type="text" value="<?php echo $old_data_admin['Job'] ?>" placeholder id="job"
                                    name="job">
                            </div>
                            <div class="input-filed">
                                <label for="email"> البريد الالكتروني</label>
                                <input type="email" value="<?php echo $old_data_admin['Email_Address'] ?>" id="email"
                                    name="email" required>
                            </div>
                            <div class="input-filed">
                                <label for="password"> الرقم السري</label>
                                <input type="password" value="<?php echo $old_data_admin['Password'] ?>" id="password"
                                    name="password" required>
                            </div>
                            <div class="input-filed">
                                <label for="gender">النوع</label>
                                <div class="gender">
                                    <div class="male">
                                        <input type="radio" name="type" id="male" value="ذكر"
                                            <?php echo $old_data_admin['Gender'] == "ذكر" ? 'checked' : '' ?>>
                                        <label for="male">ذكر</label>
                                    </div>
                                    <div class="female">
                                        <input type="radio" name="type" id="female" value="انثي"
                                            <?php echo $old_data_admin['Gender'] == "انثي" ? 'checked' : '' ?>>
                                        <label for="female">انثي</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="save">
                        <input type="submit" value="تحديث" name="update_data">
                        <a href="AddAdmin.php" class="previus">الرجوع الي الصفحة السابقه</a>
                    </div>
                </form>
            </div>
        </section>
        <script src="../JsComponent/Action.js"></script>
        <script src="../JsComponent/admin.js"></script>
    </body>

</html>