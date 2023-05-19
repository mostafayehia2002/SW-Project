<?php
session_start();
include_once("../DataBase/database.php");
if (!isset($_SESSION["admin_id"])) {
    header("location:../index.php");
    exit();
}

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $name = $_POST['full-name'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $nationality = $_POST['nationality'];
    $religion = $_POST['religion'];
    $date_birth = $_POST['date_birth'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $degree = $_POST['degree'];
    $faculty = $_POST['faculty'];
    $university = $_POST['university'];
    $department = $_POST['department'];
    //images
    $from = $_FILES['image']['tmp_name'];
    $to = "../Doctors/images/" . $_FILES['image']['name'];
    move_uploaded_file($from, $to);
    $image = $_FILES['image']['name'];

    //sql

    try {
        $sql = $con->query("INSERT INTO `doctor` (`Doctor_ID`, `Password`, `Image`, `Full_Name`, `Gender`, `Nationality`, `Religion`, `Date_Birth`, `Address`, `Phone_Number`, `Degree`, `University`, `Faculty`, `Department`, `Email_Address`) VALUES('$id', '$id', '$image','$name','$gender','$nationality','$religion','$date_birth','$address','$phone','$degree','$university','$faculty','$department','$email')");

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
    $delete = $con->query("DELETE FROM `doctor` WHERE `Doctor_ID`='$delete_id'");
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
        
        <title>Doctor</title>
    </head>


    <body>
        <!-- Dashboard -->
        <?php  include_once("../Components/Dashboard.php") ?>
        <!-- end Dashboard -->
        <section class="section">
            <!-- Start nav-bar -->
            
            <?php  include_once("../Components/NavBar.php"); ?>
            <!-- end nav bar -->
            <div class="container">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="athers">
                        <h3 class="title">اضافة اكثر من عضو هيئه التدريس:</h3>
                        <div class="input-filed">
                            <label for="alluser">اضافة بيانات عضو هيئه التدريس</label>
                            <input type="file" id="alluser">
                        </div>
                    </div>
                    <div class="break"></div>
                    <div class="oneuser">
                        <h3 class="title">اضافة دكتور:</h3>
                        <div class="allinput">
                            <div class="input-filed">
                                <label for="name">الاسم كاملا</label>
                                <input type="text" placeholder="يرجي اضافه الاسم كامل باللغه العربيه" id="name"
                                    name="full-name" required>
                            </div>
                            <div class="input-filed">
                                <label for="id">الرقم القومي</label>
                                <input type="number" id="id" name="id" required>
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
                            <div class="input-filed spcail">
                                <label for="image"> اضافة صورة</label>
                                <input type="file" accept="image/*" id="image" name="image">
                            </div>
                            <div class="input-filed">
                                <label for="degree">الدرجه العلميه</label>
                                <input type="text" id="degree" name="degree">
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
                                     
                               <?php 
                               $departments= $con->query("SELECT * FROM `departments`");
                               $data_departments=$departments->fetchAll(PDO::FETCH_ASSOC);
                               
                               ?>       
                                <label for="department"> القسم</label>
                                <input list="list1"  name="department">
                                <datalist  id="list1" >
                                    <?php 
                              foreach( $data_departments as $d){
                              ?>
                                    <option value="<?php  echo $d['Department_English_Name']  ?>" > 
                                    <?php echo $d['Department_Arabic_Name']  ?> </option>

                                    <?php } ?>
                                </datalist>
                                




                            </div>


                            <div class="input-filed">
                                <label for="gender">النوع</label>
                                <div class="gender">
                                    <div class="male">
                                        <input type="radio" name="gender" id="male" checked value="ذكر"
                                        
                                        >
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
                <h3 class="titleTabel">جدول لعرض بيانات اعضاء هيئه التدريس</h3>
            <div class="col-12">
                <div class="data_table">
                    <table id="example" class="table table-striped table-bordered">
                        <thead class="table-dark">
                            <tr>
                            <th class="th_text">الرقم القومي</th>
                            <th class="th_text">الاسم</th>
                            <th class="th_text">الايميل</th>
                            <th class="th_text">العنوان</th>
                            <th class="th_text">الموبايل</th>
                            <th class="th_text">الدرجة العلميه</th>
                            <th class="th_text">التحكم</th>
                            </tr>
                        </thead>
                        
                        <tbody class="table-content">

                            <?php
                        $all_admins = $con->query("SELECT * FROM `doctor`");
                        $all_admins = $all_admins->fetchAll(PDO::FETCH_ASSOC);
                        if (!empty($all_admins)) {
                            foreach ($all_admins as  $user) {
                        ?>
                            <tr>
                                <td><?php echo $user['Doctor_ID'] ?></td>
                                <td><?php echo $user['Full_Name'] ?></td>
                                <td><?php echo $user['Email_Address'] ?></td>
                                <td><?php echo $user['Address'] ?></td>
                                <td><?php echo $user['Phone_Number'] ?></td>
                                <td><?php echo $user['Degree'] ?></td>
                                <td>
                                <button><a  class="update" href="update_doctor.php?update=<?php echo $user['Doctor_ID'] ?>"
                                        class="delete-btn"><i class="fa-solid fa-edit"></i> تعديل</a> </button>

                                 <button ><a class="delete" href="AddDoctor.php?delete=<?php echo $user['Doctor_ID'] ?>" class="delete-btn"
                                        onclick="return confirm('Are you soure Delete this user ?');"><i
                                            class="fa-solid fa-trash"></i> حذف</a> </button>


                                            
                                </td>
                            </tr>
                            <?php
                            }
                        } else {
                            echo '<p class="empty">no doctor available</p>';
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