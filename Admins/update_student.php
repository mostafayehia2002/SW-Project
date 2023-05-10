<?php
session_start();
include_once("../DataBase/database.php");
if (!isset($_SESSION["admin_id"])) {
    header("location:../index.php");
    exit();
}
if (isset($_GET['update'])) {
    $student_id = $_GET['update'];
    $old_data_student = $con->query("SELECT * FROM `student` WHERE `St_ID`=$student_id");
    $old_data_student = $old_data_student->fetch(PDO::FETCH_ASSOC);
} else {
    header("location: AddAdmin.php");
    exit();
}

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $password = $_POST['password'];
    $name = $_POST['full-name'];
    $gender = $_POST['gender'];
    $nationality = $_POST['nationality'];
    $religion = $_POST['religion'];
    $address = $_POST['address'];
    $date_birth = $_POST['date_birth'];
    $national_id = $_POST['national_id'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $school = $_POST['school'];
    $qualification = $_POST['qualification'];
    $total_degree = $_POST['total_degree'];
    $average = $_POST['average'];
    $date_coordination = $_POST['date_Coordination'];
    $number_Coordination = $_POST['number_Coordination'];
    $faculty = $_POST['faculty'];
    $university = $_POST['university'];
    $department = $_POST['department'];
    $joining_date = $_POST['joining_date'];
    //images
    $image = isset($_FILES['image']) ? $_FILES['image']['name'] : '';
    try {
        if (empty($image)) {
            $sql = $con->query("UPDATE `student` SET `St_ID`=$id, `Password`='$password',`Full_Name`='$name',`Gender`='$gender', `Nationality`='$nationality',`Religion`='$religion',`Address`='$address',`Date_Birth`='$date_birth',`National_ID`='$national_id',`Phone_Number`='$phone', `Academic_Email`='$email',`School`='$school',`Qualification`='$qualification',`Total_Degree`='$total_degree',`Average`='$average',`Date_Coordination`='$date_coordination',`Number_Coordination`='$number_Coordination',`Faculty`='$faculty',`University`='$university',`Department`='$department',`Joining_Date`='$joining_date' WHERE `St_ID`=$student_id");
        } else {
            $sql = $con->query("UPDATE `student` SET `St_ID`=$id, `Password`='$password',`Image`='$image',`Full_Name`='$name',`Gender`='$gender', `Nationality`='$nationality',`Religion`='$religion',`Address`='$address',`Date_Birth`='$date_birth',`National_ID`='$national_id',`Phone_Number`='$phone', `Academic_Email`='$email',`School`='$school',`Qualification`='$qualification',`Total_Degree`='$total_degree',`Average`='$average',`Date_Coordination`='$date_coordination', `Number_Coordination`='$number_Coordination',`Faculty`='$faculty',`University`='$university',`Department`='$department',`Joining_Date`='$joining_date' WHERE `St_ID`=$student_id");
            $from = $_FILES['image']['tmp_name'];
            $to = "../Students/images/" . $_FILES['image']['name'];
            move_uploaded_file($from, $to);
        }
        $student_id = $id;
        $old_data_student = $con->query("SELECT * FROM `student` WHERE `St_ID`=$student_id");
        $old_data_student = $old_data_student->fetch(PDO::FETCH_ASSOC);
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
    <title> تحديث بيانات طالب </title>
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
                    <h3 class="title">تحديث بيانات طالب :</h3>
                    <div class="allinput">
                        <div class="input-filed">
                            <label for="name">الاسم كاملا</label>
                            <input type="text" value="<?= $old_data_student['Full_Name'] ?>" placeholder="يرجي اضافه الاسم كامل باللغه العربيه" id="name" name="full-name" required>
                        </div>
                        <div class="input-filed">
                            <label for="password">الباسورد</label>
                            <input type="text" value="<?= $old_data_student['Password'] ?>" id="password" name="password" required>
                        </div>
                        <div class="input-filed">
                            <label for="id">رقم الاكاديمي</label>
                            <input type="number" id="id" name="id" value="<?= $old_data_student['St_ID'] ?>">
                        </div>
                        <div class=" input-filed spcail">
                            <label for="image"> اضافة صورة</label>
                            <input type="file" accept="image/*" id="image" name="image">
                        </div>
                        <div class="input-filed">
                            <label for="nationality">الجنسية</label>
                            <input type="text" id="nationality" name="nationality" value="<?= $old_data_student['Nationality'] ?>">
                        </div>
                        <!-- <div class="input-filed">
                                <label for="religion">الديانة </label>
                                <input type="text" id="religion" name="religion"
                                    value="<?= $old_data_student['Religion'] ?>">
                            </div> -->
                        <div class="input-filed">
                            <label for="address">العنوان</label>
                            <input type="text" id="address" name="address" value="<?= $old_data_student['Address'] ?>">
                        </div>
                        <div class="input-filed">
                            <label for="date_birth"> تاريخ الميلاد</label>
                            <input type="date" id="date_birth" name="date_birth" value="<?= $old_data_student['Date_Birth'] ?>">
                        </div>
                        <div class="input-filed">
                            <label for="national_id">الرقم القومي</label>
                            <input type="number" id="national_id" name="national_id" required placeholder="يرجي كتابه الرقم القومي " value="<?= $old_data_student['National_ID'] ?>">
                        </div>
                        <div class="input-filed">
                            <label for="phone">رقم المحمول</label>
                            <input type="number" id="phone" name="phone" placeholder="+20************" value="<?= $old_data_student['Phone_Number'] ?>">
                        </div>
                        <div class="input-filed">
                            <label for="email">الايميل الاكاديمي</label>
                            <input type="email" id="email" name="email" value="<?= $old_data_student['Academic_Email'] ?>">
                        </div>
                        <div class="input-filed">
                            <label for="school"> المدرسة</label>
                            <input type="text" id="school" name="school" value="<?= $old_data_student['School'] ?>">
                        </div>
                        <div class="input-filed">
                            <label for="qualification">الموهل التعليمي</label>
                            <input type="text" id="qualification" name="qualification" value="<?= $old_data_student['Qualification'] ?>">
                        </div>
                        <div class="input-filed">
                            <label for="total_degree">مجموع الدرجات</label>
                            <input type="number" id="total_degree" name="total_degree" value="<?= $old_data_student['Total_Degree'] ?>">
                        </div>
                        <div class="input-filed">
                            <label for="average">النسبة المئوية</label>
                            <input type="number" id="average" name="average" value="<?= $old_data_student['Average'] ?>">
                        </div>
                        <div class="input-filed">
                            <label for="date_Coordination">تاريخ التنسيق</label>
                            <input type="date" id="date_Coordination" name="date_Coordination" value="<?= $old_data_student['Date_Coordination'] ?>">
                        </div>
                        <div class="input-filed">
                            <label for="number_Coordination">رقم التنسيق</label>
                            <input type="number" id="number_Coordination" name="number_Coordination" value="<?= $old_data_student['Number_Coordination'] ?>">
                        </div>
                        <div class="input-filed">
                            <label for="faculty"> الكلية</label>
                            <input type="text" id="faculty" name="faculty" value="<?= $old_data_student['Faculty'] ?>">
                        </div>
                        <div class="input-filed">
                            <label for="university"> الجامعة</label>
                            <input type="text" id="university" name="university" value="<?= $old_data_student['University'] ?>">
                        </div>
                        <div class="input-filed">
                            <label for="department"> القسم</label>
                            <input type="text" id="department" name="department" value="<?= $old_data_student['Department'] ?>">
                        </div>
                        <div class="input-filed">
                            <label for="joining_date">تاريخ الالتحاق</label>
                            <input type="date" id="joining_date" name="joining_date" value="<?= $old_data_student['Joining_Date'] ?>">
                        </div>
                        <div class="input-filed">
                            <label for="gender">النوع</label>
                            <div class="gender">
                                <div class="male">
                                    <input type="radio" name="gender" id="male" value="ذكر" <?Php echo
                                                                                            $old_data_student['Gender'] == "ذكر" ? 'checked' : ''; ?>>
                                    <label for="male">ذكر</label>
                                </div>
                                <div class="female">
                                    <input type="radio" name="gender" id="female" value="انثي" <?Php echo
                                                                                                $old_data_student['Gender'] == "انثي" ? 'checked' : ''; ?>>
                                    <label for="female">انثي</label>
                                </div>
                            </div>
                        </div>
                        <div class="input-filed">
                            <label for="religion">الديانه</label>
                            <div class="religion">
                                <div class="mos">
                                    <input type="radio" name="religion" id="mos" value="مسلم" <?Php echo  $old_data_student['Religion'] == 'مسلم'  ? 'checked' : ''; ?>>
                                    <label for="mos">مسلم</label>
                                </div>
                                <div class="mec">
                                    <input type="radio" name="religion" id="mec" value="مسيحي" <?Php echo  $old_data_student['Religion'] == 'مسيحي'  ? 'checked' : ''; ?>>
                                    <label for="mec">مسيحي</label>
                                </div>

                            </div>

                        </div>




                    </div>
                </div>
                <div class="save">
                    <input type="submit" value="تحديث" name="submit">
                </div>
            </form>
        </div>
    </section>
    <script src="../JsComponent/Action.js"></script>
    <script src="../JsComponent/admin.js"></script>
</body>

</html>