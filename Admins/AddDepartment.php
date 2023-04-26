<?php
session_start();
include_once("../DataBase/database.php");
if (!isset($_SESSION["admin_id"])) {

    header("location:../index.php");
    exit();   
}
if(isset($_POST['add'])){
    $id=$_POST['Departmanet_ID'];
    $name=$_POST['Departmanet_Name'];
    $date=$_POST['Departmanet_Date'];
    $manger=$_POST['Departmanet_manger'];
    $student=$_POST['Departmanet_Student'];
    $doctors=$_POST['Departmanet_Doctors']; 
    //images
    $from=$_FILES['Departmanet_Image']['tmp_name'];
    $to ="images/".$_FILES['Departmanet_Image']['name'];
    move_uploaded_file($from,$to);
    $image=$_FILES['Departmanet_Image']['name'];
     
    try{
        $sql=$con->query("INSERT INTO `departments` (`Departmanet_ID`, `Departmanet_Name`, `Departmanet_Date`, `Departmanet_manger`, `Departmanet_Student`, `Departmanet_Doctors`, `Departmanet_Image`) VALUES ('$id','$name','$date','$manger','$student','$doctors','$image')");

        echo "<div class='success'>  تم انشاء القسم بنجاح</div>";

           }catch(PDOException $e){

            echo "<div class='faild'>";
            echo " يرجى ادخال البيانات بشكل صحيح <br>";
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
    <title>Department</title>
    <link rel="stylesheet" href="../CssComponent/all.min.css">
    <link rel="stylesheet" href="../CssComponent/AddData.css">
    <link rel="stylesheet" href="../CssComponent/Dashboard.css">
</head>
<body>

<!-- Start nav-bar -->    
<?php   include_once("../Components/NavBar.php"); ?>
 <!-- end nav bar -->


<section  class="section">
  
 <!-- Dashboard -->
 <?php   include_once("../Components/Dashboard.php") ?>
 <!-- end Dashboard -->


    <div class="container">
        <form action="" method="POST" enctype="multipart/form-data">
            <!-- <div class="athers">
                <h3 class="title">اضافة اكثر قسم:</h3>
                <div class="input-filed">
                    <label for="adddepartment">اضافة بيانات قسم</label>
                    <input type="file" id="adddepartment"  >
                </div>
            </div> -->
             
            <div class="oneuser">
                <h3 class="title">اضافة قسم:</h3>
                

                <div class="allinput">
                    <div class="input-filed">
                        <label for="departmanet_id"> كود القسم</label>
                        <input type="text" placeholder="يرجي اضافه الاسم كامل باللغه العربيه" id="departmanet_id" name="Departmanet_ID" required >
                    </div>
                    <div class="input-filed">
                        <label for="departmanet_name"> اسم القسم</label>
                        <input type="text" id="departmanet_name" name="Departmanet_Name" required>
                    </div>  
                    <div class="input-filed">
                        <label for="departmanet_image">اضافة صورة </label>
                     <input type="file" id="departmanet_image"name="Departmanet_Image"accept="image/*">
                    </div>   
                    <div class="input-filed">
                        <label for="departmanet_date"> تاريخ انشاء القسم</label>
                        <input type="date" id="departmanet_date" name="Departmanet_Date">
                    </div>
                    <div class="input-filed">
                        <label for="departmanet_manger"> رئيس القسم</label>
                        <input type="text" id="departmanet_manger"  name="Departmanet_manger">
                    </div>
                    <div class="input-filed">
                        <label for="departmanet_student">عدد طلاب القسم </label>
                        <input type="number" id="departmanet_student" name="Departmanet_Student">
                    </div>
                    <div class="input-filed">
                        <label for="departmanet_doctors"> عدد اعضاء القسم</label>
                        <input type="number" id="departmanet_doctors" name="Departmanet_Doctors">
                    </div>
                  
                </div>
            </div>
            <div class="save">
                <input type="submit" value="اضافة" name="add">
            </div>
        </form>
    </div>
  </section>
    <script src="../JsComponent/Action.js"></script>
    <script src="Js/main.js"></script>
</body>
</html>