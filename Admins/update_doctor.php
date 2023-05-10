<?php
session_start();
include_once("../DataBase/database.php");
if (!isset($_SESSION["admin_id"])) {
    header("location:../index.php");
    exit();
}
if (isset($_GET['update'])) {
    $doctor_id = $_GET['update'];
    $old_data_doctor = $con->query("SELECT * FROM `doctor` WHERE `Doctor_ID`=$doctor_id");
    $old_data_doctor = $old_data_doctor->fetch(PDO::FETCH_ASSOC);
} else {
    header("location: AddAdmin.php");
    exit();
}


if (isset($_POST['update_data'])) {
    $new_id = $_POST['id'];
    $new_full_name = $_POST['full-name'];
    $new_nationality = $_POST['nationality'];
    $new_phone = $_POST['phone'];
    $new_email = $_POST['email'];
    $new_password = $_POST['password'];
    $new_religion = $_POST['religion'];
    $new_address = $_POST['address'];
    $new_date_birth = $_POST['date_birth'];
    $new_degree = $_POST['degree'];
    $new_faculty = $_POST['faculty'];
    $new_university = $_POST['university'];
    $new_department = $_POST['department'];
    $new_gender = $_POST['gender'];
    $new_imge = isset($_FILES['image']) ? $_FILES['image']['name'] : '';

    try {
        if (empty($new_imge)) {
            $update_doctor = $con->query("UPDATE `doctor` SET `Doctor_ID`='$new_id',`Password`='$new_password',`Full_Name`='$new_full_name',`Address`='$new_address',`Email_Address`='$new_email',`Nationality`='$new_nationality',`Religion`='$new_religion',`Phone_Number`='$new_phone',`Gender`='$new_gender',`Degree`='$new_degree', `Faculty`='$new_faculty',`University`='$new_university',`Department`='$new_department', `Date_Birth`='$new_date_birth' WHERE `Doctor_ID`=$doctor_id");
        } else {
            $update_doctor = $con->query("UPDATE `doctor` SET `Doctor_ID`='$new_id',`Password`='$new_password',`Full_Name`='$new_full_name',`Address`='$new_address',`Email_Address`='$new_email',`Nationality`='$new_nationality',`Religion`='$new_religion',`Phone_Number`='$new_phone',`Gender`='$new_gender',`Degree`='$new_degree', `Faculty`='$new_faculty',`University`='$new_university',`Department`='$new_department', `Date_Birth`='$new_date_birth',`Image`='$new_imge' WHERE `Doctor_ID`=$doctor_id");
            $from = $_FILES['image']['tmp_name'];
            $to = "images/" . $_FILES['image']['name'];
            move_uploaded_file($from, $to);
        }
        $doctor_id = $new_id;
        $old_data_doctor = $con->query("SELECT * FROM `doctor` WHERE `Doctor_ID`=$doctor_id");
        $old_data_doctor = $old_data_doctor->fetch(PDO::FETCH_ASSOC);
        echo "<div class='success'>  تم تعديل البيانات بنجاح</div>";
    } catch (Exception $e) {
        echo "<div class='faild'> حدث خطا لم تتم تعديل البيانات يرجي المحاوله مره اخري";
        echo $e->getMessage();
        echo "</div>";
    }
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
        <link rel="stylesheet" href="../CssComponent/Dashboard.css">
        <title>تحديث بيانات دكتور</title>
    </head>

    <body>

        <!-- Dashboard -->
        <?php //include_once("../Components/Dashboard.php") ?>
        <!-- end Dashboard -->
        <section class="section">
            <!-- Start nav-bar -->
            <?php //include_once("../Components/NavBar.php"); ?>
            <!-- end nav bar -->
            <div class="container">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="oneuser">
                        <h3 class="title">تحديث بيانات دكتور</h3>
                        <div class="allinput">
                            <div class="input-filed">
                                <label for="name">الاسم كاملا</label>
                                <input type="text" value="<?Php echo $old_data_doctor['Full_Name'] ?>"
                                    placeholder="يرجي اضافه الاسم كامل باللغه العربيه" id="name" name="full-name"
                                    required>
                            </div>
                            <div class="input-filed">
                                <label for="id">الرقم القومي</label>
                                <input type="number" value="<?Php echo $old_data_doctor['Doctor_ID'] ?>" id="id"
                                    name="id" required>
                            </div>
                            <div class="input-filed">
                                <label for="phone">رقم المحمول</label>
                                <input type="number" value="<?Php echo $old_data_doctor['Phone_Number'] ?>" id="phone"
                                    name="phone" placeholder="+20************">
                            </div>
                            <div class="input-filed">
                                <label for="email">الايميل الاكاديمي</label>
                                <input type="email" value="<?Php echo $old_data_doctor['Email_Address'] ?>" id="email"
                                    name="email">
                            </div>
                            <div class="input-filed">
                                <label for="password">الرقم السري</label>
                                <input type="password" value="<?Php echo $old_data_doctor['Password'] ?>" id="password"
                                    name="password">
                            </div>
                            <div class="input-filed">
                                <label for="nationality">الجنسية</label>
                                <input type="text" id="nationality"
                                    value="<?Php echo $old_data_doctor['Nationality'] ?>" name="nationality">
                            </div>
                            <div class="input-filed">
                                <label for="address">العنوان</label>
                                <input type="text" value="<?Php echo $old_data_doctor['Address'] ?>" id="address"
                                    name="address">
                            </div>
                            <div class="input-filed">
                                <label for="date_birth"> تاريخ الميلاد</label>
                                <input type="date" id="date_birth" name="date_birth"
                                    value="<?Php echo $old_data_doctor['Date_Birth'] ?>">
                            </div>
                            <div class="input-filed spcail">
                                <label for="image"> اضافة صورة</label>
                                <input type="file" accept="image/*" id="image" name="image">
                            </div>
                            <div class="input-filed">
                                <label for="degree">الدرجه العلميه</label>
                                <input type="text" value="<?Php echo $old_data_doctor['Degree'] ?>" id="degree"
                                    name="degree">
                            </div>
                            <div class="input-filed">
                                <label for="faculty"> الكلية</label>
                                <input type="text" id="faculty" value="<?Php echo $old_data_doctor['Faculty'] ?>"
                                    name="faculty">
                            </div>
                            <div class="input-filed">
                                <label for="university"> الجامعة</label>
                                <input type="text" id="university" value="<?Php echo $old_data_doctor['University'] ?>"
                                    name="university">
                            </div>
                            <div class="input-filed">
                                <label for="department"> القسم</label>
                                <input type="text" value="<?Php echo $old_data_doctor['Department'] ?>" id="department"
                                    name="department">
                            </div>
                            <div class="input-filed">
                                <label for="gender">النوع</label>
                                <div class="gender">
                                    <div class="male">
                                        <input type="radio" name="gender" id="male" value="ذكر" <?Php echo
                                            $old_data_doctor['Gender']=="ذكر" ? 'checked' : '' ; ?>>
                                        <label for="male">ذكر</label>
                                    </div>

                                    <div class="female">
                                        <input type="radio" name="gender" id="female" value="انثي" <?Php echo
                                            $old_data_doctor['Gender']=="انثي" ? 'checked' : '' ; ?>>
                                        <label for="female">انثي</label>
                                    </div>
                                </div>
                            </div>

                            <div class="input-filed">
                                <label for="religion">الديانه</label>
                                <div class="religion">
                                    <div class="mos">
                                <input type="radio" name="religion" id="mos" value="مسلم"
                                <?Php echo  $old_data_doctor['Religion']=='مسلم'  ? 'checked': '' ;?>  >
                                        <label for="mos">مسلم</label>
                                    </div>
                                    <div class="mec">
                                        <input type="radio" name="religion" id="mec" value="مسيحي"
                                        <?Php echo  $old_data_doctor['Religion']=='مسيحي'  ? 'checked': ''; ?> >
                                        <label for="mec">مسيحي</label>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="save">
                        <input type="submit" value="تحديث" name="update_data">
                    </div>
                    <a href="./AddDoctor.php">العوده للصفحه السابقه</a>
                </form>
            </div>
        </section>
        <script src="../JsComponent/Action.js"></script>
        <script src="../JsComponent/admin.js"></script>
    </body>

</html>