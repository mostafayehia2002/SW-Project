<?php
session_start();
include_once("../DataBase/database.php");
if (!isset($_SESSION["admin_id"])) {

    header("location:../index.php");
    exit();
}
//error in line 42
// if($con){
//     if(isset($_POST['submit'])){
//       $st_id=$_POST['st_id'];
//       $password=$_POST['password'];
//       $name=$_POST['full-name'];
//       $gender=$_POST['gender'];
//       $nationality=$_POST['nationality'];
//       $religion=$_POST['religion'];
//       $address=$_POST['address'];
//       $date_birth=$_POST['date_birth'];
//       $national_id=$_POST['national_id'];
//       $phone=$_POST['phone'];
//       $email=$_POST['email'];
//       $school=$_POST['school'];
//       $qualification=$_POST['qualification'];
//       $total_degree=$_POST['total_degree'];
//       $average=$_POST['average'];
//       $date_of_coordination=$_POST['date_of_Coordination'];
//       $number_of_Coordination=$_POST['number_of_Coordination'];
//       $faculty=$_POST['faculty'];
//       $university=$_POST['university'];
//       $department=$_POST['department'];
//       $joining_date=$_POST['joining_date'];
//    //images
//       $from=$_FILES['image']['tmp_name'];
//       $to ="images/".$_FILES['image']['name'];
//       move_uploaded_file($from,$to);
//       $image=$_FILES['image']['name'];

//       //sql

//        try{ 
//         $sql=$con->query("INSERT INTO `student` (`St_ID`, `Password`, `Image`, `Full_Name`, `Gender`, `Nationality`, `Religion`, `Address`, `Date_of_Birth`,  `Phone_Number`,`Academic_Email`,`School`,`Qualification`, `Total_Degree`, `Average`,`Date_of_Coordination`,`Number_of_Coordination`,`Faculty`,`University`, `Department`,`Joining_Date`) VALUES('$st_id', '$password', '$image','$name','$gender','$nationality','$religion','$address','$date_birth','$phone','$email','$school','$qualification','$total_degree','$average', '$date_of_coordination',$number_of_Coordination','$faculty','$university','$department','$joining_date')");
//         //22
//         echo "<div class='success'>  تم اضافه البيانات بنجاح</div>";

//            }catch(PDOException $e){

//             echo "<div class='faild'>";
//             echo " يرجي عدم تكرار الرقم القومي والتاكد من تسجيل البيانات بشكل صحيح"."<br>";
//             echo $e->getMessage();
//             echo "</div>";

//            }
       

      
//     }

// }



?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>student</title>
    <link rel="stylesheet" href="../CssComponent/all.min.css">
    <link rel="stylesheet" href="../CssComponent/AddData.css">
    <link rel="stylesheet" href="../CssComponent/Dashboard.css">

</head>
<body>

 <!-- Start nav-bar -->    
 <?php    include_once("../Components/NavBar.php"); ?>
 <!-- end nav bar -->


 <section  class="section">
  
 <!-- Dashboard -->
 <?php   include_once("../Components/Dashboard.php") ?>
 <!-- end Dashboard -->


    <div class="container">
        <form action="" method="POST" enctype="multipart/form-data">

            <div class="athers">
                <h3 class="title">اضافة اكثر من طالب :</h3>
                <div class="input-filed">
                    <label for="alluser">اضافة بيانات الطلاب</label>
                    <input type="file" id="alluser"  >
                </div>
            </div>
            
            <div class="break"></div>

            <div class="oneuser">
                <h3 class="title">اضافة طالب :</h3>

                <div class="allinput">
                    <div class="input-filed"> 
                        <label for="name">الاسم كاملا</label>
                        <input type="text" placeholder="يرجي اضافه الاسم كامل باللغه العربيه" id="name" name="full-name" required >
                    </div>
                    <div class="input-filed">
                        <label for="st_id">رقم الاكاديمي</label>
                        <input type="number" id="st_id" name="st_id">
                    </div>
                    <div class="input-filed">
                        <label for="password"> كلمة المرور</label>
                        <input type="number" id="password" name="password">
                    </div>

                    <div class="input-filed">
                        <label for="gender">النوع</label>
                        <div class="gender">
                            <div class="male">
                                <input type="radio" name="gender" id="male">
                                <label for="male">ذكر</label>
                            </div>
                            <div class="female">
                                <input type="radio" name="gender" id="female">
                                <label for="female">انثي</label>
                            </div>
                        </div>
                    </div>
                    <div class="input-filed spcail">
                        <label for="image"> اضافة صورة</label>
                        <input type="file"  accept="image/*" id="image" name="image">
                    </div>          
                    <div class="input-filed">
                        <label for="nationality">الجنسية</label>
                        <input type="text" id="nationality"  name="nationality" value="مصري">
                    </div>
                    <div class="input-filed">
                        <label for="religion">الديانة </label>
                        <input type="text" id="religion" name="religion">
                    </div>
                    <div class="input-filed">
                        <label for="address">العنوان</label>
                        <input type="text" id="address" name="address">
                    </div>
                    <div class="input-filed">
                        <label for="date_birth"> تاريخ الميلاد</label>
                        <input type="date" id="date_birth" name="date_birth" >
                    </div>
                    <div class="input-filed">
                        <label for="national_id">الرقم القومي</label>
                        <input type="number" id="national_id" name="national_id" required>
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
                        <input type="text"id="qualification" name="qualification">
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
                        <label for="date_of_Coordination">تاريخ التنسيق</label>
                        <input type="date" id="date_of_Coordination" name="date_of_Coordination">
                    </div>
                    <div class="input-filed">
                        <label for="number_of_Coordination">رقم التنسيق</label>
                        <input type="number" id="number_of_Coordination" name="number_of_Coordination">
                    </div>
                    <div class="input-filed">
                        <label for="faculty"> الكلية</label>
                        <input type="text" id="faculty" name="faculty" value="الحاسبات والمعلومات" >
                    </div>
                    <div class="input-filed">
                        <label for="university"> الجامعة</label>
                        <input type="text" id="university" name="university" value="المنوفية">
                    </div>
                    <div class="input-filed">
                        <label for="department"> القسم</label>   
                        <input type="text" id="department" name="department"  value="العام">
                    </div>
                    <div class="input-filed">
                        <label for="joining_date">تاريخ الالتحاق</label>
                        <input type="date" id="joining_date" name="joining_date">
                    </div>
                </div>
                
            </div>
            <div class="save">
                <input type="submit" value="حفظ" name="submit">
            </div>
        </form>
    </div>
 </section>
 <script src="../JsComponent/Action.js"></script>
</body>
</html> 