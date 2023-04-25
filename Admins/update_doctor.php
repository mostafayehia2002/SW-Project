<?php
session_start();
include_once("../DataBase/database.php");
if (!isset($_SESSION["admin_id"])) {
    header("location:../index.php");
    exit();
}
if (isset($_GET['update'])) {
    $doctor_id = $_GET['update'];
    $old_data_doctor = $con->query("SELECT * FROM `doctor` WHERE `Dr_ID`=$doctor_id");
    $old_data_doctor = $old_data_doctor->fetch(PDO::FETCH_ASSOC);
} else {
    header("location: AddAdmin.php");
    exit();
}


if (isset($_POST['update_data'])) {
    // $new_full_name = $_POST['full-name'];
    // $new_address = $_POST['address'];
    // $new_id = $_POST['id'];
    // $new_phone = $_POST['phone'];
    // $new_email = $_POST['email'];
    // $new_type = $_POST['type'];
    // try {
    //     $update_admin = $con->query("UPDATE `Admin` SET `Ad_ID`=$new_id ,`Full_Name`='$new_full_name',`Address`='$new_address',`Email_Address`='$new_email',`Phone_Number`=$new_phone,`Gender`='$new_type' WHERE `Ad_ID`=$admin_id ");
    //     echo "<div class='success'>  تم اضافه البيانات بنجاح</div>";
    //     header("location: AddAdmin.php");
    //     exit();
    // } catch (PDOException $e) {
    //     echo "<div class='faild'>";
    //     echo $e->getMessage();
    //     echo "</div>";
    // }
}




?>


<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تحديث بيانات دكتور</title>
    <link rel="stylesheet" href="../CssComponent/all.min.css">
    <link rel="stylesheet" href="../CssComponent/AddData.css">
    <link rel="stylesheet" href="../CssComponent/Dashboard.css">
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
                <div class="oneuser">
                    <h3 class="title">تحديث بيانات دكتور</h3>
                    <div class="allinput">
                        <div class="input-filed">
                            <label for="name">الاسم كاملا</label>
                            <input type="text" value="<?Php echo $old_data_doctor['Full_Name'] ?>" placeholder="يرجي اضافه الاسم كامل باللغه العربيه" id="name" name="full-name" required>
                        </div>
                        <div class="input-filed">
                            <label for="id">الرقم القومي</label>
                            <input type="number" value="<?Php echo $old_data_doctor['Dr_ID'] ?>" id="id" name="id" required>
                        </div>
                        <div class="input-filed">
                            <label for="phone">رقم المحمول</label>
                            <input type="number" value="<?Php echo $old_data_doctor['Phone_Number'] ?>" id="phone" name="phone" placeholder="+20************">
                        </div>
                        <div class="input-filed">
                            <label for="email">الايميل الاكاديمي</label>
                            <input type="email" value="<?Php echo $old_data_doctor['Email_Address'] ?>" id="email" name="email">
                        </div>
                        <div class="input-filed">
                            <label for="password">الرقم السري</label>
                            <input type="password" value="<?Php echo $old_data_doctor['Password'] ?>" id="password" name="password">
                        </div>
                        <div class="input-filed">
                            <label for="nationality">الجنسية</label>
                            <input type="text" id="nationality" name="nationality" value="مصري">
                        </div>
                        <div class="input-filed">
                            <label for="religion">الديانة </label>
                            <input type="text" value="<?Php echo $old_data_doctor['Nationality'] ?>" id="religion" name="religion">
                        </div>
                        <div class="input-filed">
                            <label for="address">العنوان</label>
                            <input type="text" value="<?Php echo $old_data_doctor['Address'] ?>" id="address" name="address">
                        </div>
                        <div class="input-filed">
                            <label for="date_birth"> تاريخ الميلاد</label>
                            <input type="date" id="date_birth" name="date_birth" value="<?Php echo $old_data_doctor['Date_Birth'] ?>">
                        </div>
                        <div class="input-filed spcail">
                            <label for="image"> اضافة صورة</label>
                            <input type="file" accept="image/*" id="image" name="image">
                        </div>
                        <div class="input-filed">
                            <label for="degree">الدرجه العلميه</label>
                            <input type="text" value="<?Php echo $old_data_doctor['Degree'] ?>" id="degree" name="degree">
                        </div>
                        <div class="input-filed">
                            <label for="faculty"> الكلية</label>
                            <input type="text" id="faculty" name="faculty" value="الحاسبات والمعلومات">
                        </div>
                        <div class="input-filed">
                            <label for="university"> الجامعة</label>
                            <input type="text" id="university" value="المنوفيه" name="university">
                        </div>
                        <div class="input-filed">
                            <label for="department"> القسم</label>
                            <input type="text" value="<?Php echo $old_data_doctor['Department'] ?>" id="department" name="department" value="العام">
                        </div>
                        <div class="input-filed">
                            <label for="gender">النوع</label>
                            <div class="gender">
                                <div class="male">
                                    <input type="radio" name="gender" id="male" value="ذكر" <?Php echo
                                                                                            $old_data_doctor['Gender'] == "ذكر" ? 'checked' : ''; ?>>
                                    <label for="male">ذكر</label>
                                </div>
                                <div class="female">
                                    <input type="radio" name="gender" id="female" value="انثي" <?Php echo
                                                                                                $old_data_doctor['Gender'] == "انثي" ? 'checked' : ''; ?>>
                                    <label for="female">انثي</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="save">
                    <input type="submit" value="تحديث" name="update_data">
                </div>
            </form>
        </div>
    </section>
    <script src="../JsComponent/Action.js"></script>
    <script src="JS/main.js"></script>
</body>

</html>