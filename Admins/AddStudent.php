<?php
session_start();

if (!isset($_SESSION["admin_id"])) {

    header("location:../index.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>student</title>
    <link rel="stylesheet" href="CssStyle/all.min.css">
    <link rel="stylesheet" href="CssStyle/AddData.css">
    <link rel="stylesheet" href="CssStyle/Dashboard.css">

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
        <form action="">

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
                        <label for="imge">الاسم كاملا</label>
                        <input type="text" placeholder="">
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
                        <label for="imge"> اضافة صورة</label>
                        <input type="file">
                    </div>
                    <div class="input-filed">
                        <label for="imge">الجنسية</label>
                        <input type="text">
                    </div>
                    <div class="input-filed">
                        <label for="imge">الديانة </label>
                        <input type="text">
                    </div>
                    <div class="input-filed">
                        <label for="imge">العنوان</label>
                        <input type="text">
                    </div>
                    <div class="input-filed">
                        <label for="imge"> تاريخ الميلاد</label>
                        <input type="date">
                    </div>
                    <div class="input-filed">
                        <label for="imge">الرقم القومي</label>
                        <input type="number">
                    </div>
                    <div class="input-filed">
                        <label for="imge">رقم المحمول</label>
                        <input type="number">
                    </div>
                    <div class="input-filed">
                        <label for="imge">الايميل الاكاديمي</label>
                        <input type="email">
                    </div>
                    <div class="input-filed">
                        <label for="imge"> المدرسة</label>
                        <input type="text">
                    </div>
                    <div class="input-filed">
                        <label for="imge">الموهل التعليمي</label>
                        <input type="text">
                    </div>
                    <div class="input-filed">
                        <label for="imge">مجموع الدرجات</label>
                        <input type="number">
                    </div>
                    <div class="input-filed">
                        <label for="imge">النسبة المئوية</label>
                        <input ytpe="number">
                    </div>
                    <div class="input-filed">
                        <label for="imge">تاريخ التنسيق</label>
                        <input type="date">
                    </div>
                    <div class="input-filed">
                        <label for="imge">رقم التنسيق</label>
                        <input ytpe="number">
                    </div>
                    <div class="input-filed">
                        <label for="imge"> الكلية</label>
                        <input type="text">
                    </div>
                    <div class="input-filed">
                        <label for="imge"> الجامعة</label>
                        <input type="text">
                    </div>
                    <div class="input-filed">
                        <label for="imge"> القسم</label>
                        <select>
                            <option>علوم الحاسب</option>
                            <option>تكنو لوجيا المعلومات </option>
                            <option>نظم المعلومات</option>
                        </select>
                    </div>
                    <div class="input-filed">
                        <label for="imge">تاريخ الالتحاق</label>
                        <input type="text">
                    </div>
                </div>
                
            </div>
            <div class="save">
                <input type="submit" value="حفظ">
            </div>
        </form>
    </div>
 </section>
 <script src="JS/Admin.js"></script>
</body>
</html>