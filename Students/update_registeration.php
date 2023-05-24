<?php
session_start();
if (!isset($_SESSION["student_id"])) {

    header("location:../index.php");
    exit();
}

include_once("../DataBase/database.php");
 $ID = $_SESSION['student_id'];
    

//course registration
 $data=$con->query("SELECT * FROM `course_registration` WHERE Student_ID='$ID' and Registration=0 LIMIT 6 ");
 $data=$data->fetchAll(PDO::FETCH_ASSOC);

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CssComponent/all.min.css">
    <link rel="stylesheet" href="../CssComponent/Info.css">
    <link rel="stylesheet" href="../CssComponent/Dashboard.css">
    <title>Information</title>

    <style>
        
table{ 
  border-collapse: collapse;
  border-spacing: 0;
  box-shadow: 0 2px 15px rgba(64,64,64,.2);
  border-radius: 12px 12px 0 0;
  overflow: hidden;
  width: 90%;
  background-color: #fafafa;
  margin:50px auto;
}
th{
  background-color: #229678;
  color: #fafafa;
  font-weight: 200;
  text-transform: uppercase;
}
td,
th{
  padding: 15px 20px;
  text-align: center;
 
}

tr.one{
  border-bottom: 2px solid #1B9C85;
}
tr{
  width: 100%;
 
}

td input{
  background-color: var(--main-color);
  padding: 7px 22px;
  border-radius: 3px;
  accent-color:var(--main-color);
}

input[type="submit"]{
  color:white;
}
    </style>
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

        <table>
        <form action="" method="POST">
        <thead>
          <tr>
         
            <?php 
              $c=1;
            foreach($data as $s){
            ?>
            <th><label for="s<?Php echo $c;?>">الماده <?Php echo $c++;?></label></th>
           <?php 
          }?>
          </tr>

        </thead>
        <tbody>

          <tr class="one">
           <?php 
             $count=1;
            foreach($data as $d){
         
            ?>
          <td>
            <label for="s<?Php echo $count;?>" ><?php echo $d['Subject_Name']?> </label>
            <br>

           <input type="checkbox"  name="<?php echo $d['Subject_Name']?>"  id="s<?Php echo $count++;?>" value="<?php echo $d['Subject_Name']?>">
          </td>  
           <?php }?>

          
          </tr> 
        </tbody>
        <tfoot>
          <tr>
            <td>
              <input type="submit" value="تسجيل" name="regist">
            </td>       
          </tr>      
        </tfoot>
      </form>
      </table>



        </div>
    </section>
    <script src="../JsComponent/Action.js"></script>
</body>

</html>