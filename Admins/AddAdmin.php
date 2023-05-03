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
    <title>اضافه ادمن</title>
    <link rel="stylesheet" href="../CssComponent/all.min.css">
    <link rel="stylesheet" href="../CssComponent/AddData.css">
    <link rel="stylesheet" href="../CssComponent/Table.css">
    <link rel="stylesheet" href="../CssComponent/Dashboard.css">
    <!--   Tabel CSS  -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" rel="stylesheet">
    </link>
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
            <div class="main-content">
                <h3 class="titleTabel">جدول لعرض بيانات المسؤلين عن ادارة شئون الطلاب</h3>
                <table id="files_list" class="table table-striped dt-responsive  " style="width:100%">
                    <thead class="thead_dark">
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
                    <tbody>
                        <?php
                        $all_admins = $con->query("SELECT * FROM `admin`");
                        $all_admins = $all_admins->fetchAll(PDO::FETCH_ASSOC);
                        if (!empty($all_admins)) {
                            foreach ($all_admins as  $user) {
                        ?>
                                <tr class='row-table'>
                                    <td><?php echo $user['Ad_ID'] ?></td>
                                    <td><?php echo $user['Full_Name'] ?></td>
                                    <td><?php echo $user['Email_Address'] ?></td>
                                    <td><?php echo $user['Address'] ?></td>
                                    <td><?php echo $user['Phone_Number'] ?></td>
                                    <td><?php echo $user['Gender'] ?></td>
                                    <?php
                                    if ($info_admin['status'] == 1) : ?>
                                        <td class="flex-btn">
                                            <a href="update_admin.php?update=<?php echo $user['Ad_ID'] ?>" class="delete-btn"><i class="fa-solid fa-edit"></i>
                                                تعديل</a>
                                            <a href="AddAdmin.php?delete=<?php echo $user['Ad_ID'] ?>" class="delete-btn" onclick="return confirm('Are you soure Delete this user ?');"><i class="fa-solid fa-trash"></i> حذف</a>
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
    </section>
    <script src="../JsComponent/Action.js"></script>
    <script src="JS/main.js"></script>
    <!-- Tabel  -->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#files_list').DataTable({
                "aLengthMenu": [
                    [5, 10, 25, -1],
                    [5, 10, 25, "All"]
                ],
                "iDisplayLength": 10,

                "language": {
                    "sProcessing": "جارٍ التحميل...",
                    "sLengthMenu": "أظهر _MENU_ مدخلات",
                    "sZeroRecords": "لم يعثر على أية سجلات",
                    "sInfo": "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
                    "sInfoEmpty": "يعرض 0 إلى 0 من أصل 0 سجل",
                    "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
                    "sInfoPostFix": "",
                    "sSearch": "ابحث:",
                    "sUrl": "",
                    "oPaginate": {
                        "sFirst": "الأول",
                        "sPrevious": "السابق",
                        "sNext": "التالي",
                        "sLast": "الأخير"
                    }
                }
            });
        });
    </script>
</body>

</html>