<?php
session_start();
include_once "../DataBase/database.php";
if (!isset($_SESSION["admin_id"])) {
    header("location:../index.php");
    exit();
}

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
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
    //    //images
    $from = $_FILES['image']['tmp_name'];
    $to = "../Students/images/" . $_FILES['image']['name'];
    move_uploaded_file($from, $to);
    $image = $_FILES['image']['name'];

    //       //sql

    try {
        $sql = $con->query("INSERT INTO `student`(`St_ID`, `Password`,`Image`,`Full_Name`,`Gender`, `Nationality`,`Religion`,`Address`,`Date_Birth`,`National_ID`,`Phone_Number`, `Academic_Email`,`School`,`Qualification`,`Total_Degree`,`Average`,`Date_Coordination`, `Number_Coordination`,`Faculty`,`University`,`Department`,`Joining_Date`) VALUES ('$id', '$national_id', '$image','$name','$gender','$nationality','$religion','$address','$date_birth','$national_id','$phone','$email','$school', '$qualification','$total_degree','$average','$date_coordination','$number_Coordination','$faculty','$university','$department','$joining_date')");

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
    $delete = $con->query("DELETE FROM `student` WHERE `St_ID`=$delete_id");
    if ($delete) {
        echo "تم الحذف بنجاح";
        header("Location: AddAdmin.php");
        exit();
    }
}

?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">

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

    <title>student</title>
</head>

<body>
    <!-- Dashboard -->
    <?php include_once "../Components/Dashboard.php" ?>
    <!-- end Dashboard -->
    <section class="section">
        <!-- Start nav-bar -->
        <?php include_once "../Components/NavBar.php"; ?>
        <!-- end nav bar -->
        <div class="container">
            
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="athers">
                    <h3 class="title">اضافة اكثر من طالب :</h3>
                    <div class="input-filed">
                        <label for="alluser">اضافة بيانات الطلاب</label>
                        <input type="file" id="alluser" name="file_students">
                    </div>
                </div>
                <div class="break"></div>
                <div class="oneuser">
                    <h3 class="title">اضافة طالب :</h3>
                    <div class="allinput">
                        <div class="input-filed">
                            <label for="name">الاسم كاملا</label>
                            <input type="text" placeholder="يرجي اضافه الاسم كامل باللغه العربيه" id="name" name="full-name" required>
                        </div>
                        <div class="input-filed">
                            <label for="id">رقم الاكاديمي</label>
                            <input type="number" id="id" name="id">
                        </div>
                        <div class="input-filed spcail">
                            <label for="image"> اضافة صورة</label>
                            <input type="file" accept="image/*" id="image" name="image">
                        </div>
                        <div class="input-filed">
                            <label for="nationality">الجنسية</label>
                            <input type="text" id="nationality" name="nationality" value="مصري">
                        </div>
                        <div class="input-filed">
                            <label for="address">العنوان</label>
                            <input type="text" id="address" name="address">
                        </div>
                        <div class="input-filed">
                            <label for="date_birth"> تاريخ الميلاد</label>
                            <input type="date" id="date_birth" name="date_birth">
                        </div>
                        <div class="input-filed">
                            <label for="national_id">الرقم القومي</label>
                            <input type="number" id="national_id" name="national_id" required placeholder="يرجي كتابه الرقم القومي ">
                        </div>
                        <div class="input-filed">
                            <label for="phone">رقم المحمول</label>
                            <input type="number" id="phone" name="phone" placeholder="+20************">
                        </div>
                        <div class="input-filed">
                            <label for="email">الايميل الاكاديمي</label>
                            <input type="email" id="email" name="email">
                        </div>

                        <div class="input-filed">
                            <label for="school"> المدرسة</label>
                            <input type="text" id="school" name="school">
                        </div>
                        <div class="input-filed">
                            <label for="qualification">الموهل التعليمي</label>
                            <input type="text" id="qualification" name="qualification">
                        </div>
                        <div class="input-filed">
                            <label for="total_degree">مجموع الدرجات</label>
                            <input type="number" id="total_degree" name="total_degree">
                        </div>
                        <div class="input-filed">
                            <label for="average">النسبة المئوية</label>
                            <input type="number" id="average" name="average">
                        </div>
                        <div class="input-filed">
                            <label for="date_Coordination">تاريخ التنسيق</label>
                            <input type="date" id="date_Coordination" name="date_Coordination">
                        </div>
                        <div class="input-filed">
                            <label for="number_Coordination">رقم التنسيق</label>
                            <input type="number" id="number_Coordination" name="number_Coordination">
                        </div>
                        <div class="input-filed">
                            <label for="faculty"> الكلية</label>
                            <input type="text" id="faculty" name="faculty" value="الحاسبات والمعلومات">
                        </div>
                        <div class="input-filed">
                            <label for="university"> الجامعة</label>
                            <input type="text" id="university" name="university" value="المنوفية">
                        </div>
                        <div class="input-filed"> 
                            <label for="department"> القسم</label>

                            <input type="text" id="department" name="department" value="genral">

                            
                        </div>
                        <div class="input-filed">
                            <label for="joining_date">تاريخ الالتحاق</label>
                            <input type="date" id="joining_date" name="joining_date">
                        </div>
                        <div class="input-filed">
                            <label for="gender">النوع</label>
                            <div class="gender">
                                <div class="male">
                                    <input type="radio" name="gender" id="male" value="ذكر">
                                    <label for="male">ذكر</label>
                                </div>
                                <div class="female">
                                    <input type="radio" name="gender" id="female" value="انثي">
                                    <label for="female">انثي</label>
                                </div>
                            </div>
                        </div>
                        <div class="input-filed">
                            <label for="religion">الديانه</label>
                            <div class="religion">
                                <div class="mos">
                                    <input type="radio" name="religion" id="mos" checked value="مسلم">
                                    <label for="mos">مسلم</label>
                                </div>
                                <div class="mec">
                                    <input type="radio" name="religion" id="mec" value="مسيحي">
                                    <label for="mec">مسيحي</label>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="save">
                    <input type="submit" value="حفظ" name="submit">
                </div>
            </form>
            <div class="row">
                <h3 class="titleTabel">جدول لعرض بيانات الطلاب</h3>
                <div class="col-12">
                    <div class="data_table">
                        <table id="example" class="table table-striped table-bordered">
                            <thead class="table-dark">
                                <th class="th_text">الرقم الاكاديمي</th>
                                <th class="th_text">الاسم</th>
                                <th class="th_text">الايميل الاكاديمي</th>
                                <th class="th_text">القسم</th>
                                <th class="th_text">تاريح الالتحاق بالكليه</th>
                                <th class="th_text">الرقم القومي</th>
                                <th class="th_text">التحكم</th>
                            </thead>

                            <tbody class="table-content">
                                <?php
                                $all_admins = $con->query("SELECT * FROM `student`");
                                $all_admins = $all_admins->fetchAll(PDO::FETCH_ASSOC);
                                if (!empty($all_admins)) {
                                    foreach ($all_admins as $user) {
                                ?>
                                        <tr>
                                            <td><?php echo $user['St_ID'] ?></td>
                                            <td><?php echo $user['Full_Name'] ?></td>
                                            <td><?php echo $user['Academic_Email'] ?></td>
                                            <td><?php echo $user['Department'] ?></td>
                                            <td><?php echo $user['Joining_Date'] ?></td>
                                            <td><?php echo $user['National_ID'] ?></td>
                                            <td class="flex-btn">
                                                <button><a class="update" href="update_student.php?update=<?php echo $user['St_ID'] ?>" class="delete-btn"><i class="fa-solid fa-edit"></i> تعديل</a> </button>


                                                <button> <a class="delete" href="AddStudent.php?delete=<?php echo $user['St_ID'] ?>" class="delete-btn" onclick="return confirm('Are you soure Delete this user ?');"><i class="fa-solid fa-trash"></i> حذف</a> </button>
                                            </td>
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

</body>

</html>