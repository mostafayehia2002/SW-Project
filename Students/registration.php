<?php
session_start();
if (!isset($_SESSION["student_id"])) {

    header("location:../index.php");
    exit();
}

include_once("../DataBase/database.php");
 $ID = $_SESSION['student_id'];
  
 
 //check register of user in table student register
  $student_register=$con->query("SELECT  * FROM `student_register` WHERE St_ID='$ID' ");
 $count=$student_register->rowCount();
 $register_data= $student_register->fetch(PDO::FETCH_ASSOC);
 //
  if($count==1  && $register_data['register']=='1'){
    //  header("Location:update_registeration.php");
     // exit();
    }

/************************************************************************************/
if(isset($_POST['regist'])){
  
  foreach($_POST as $sub){
    
    $con->query("UPDATE `course_registration` SET Registration=1 WHERE Student_ID='$ID' AND Subject_Name='$sub'");
    
    
  }

 if($count==0){
       $con->query("INSERT INTO `student_register` (`St_ID`,`register`) VALUES ('$ID','1')");
    //  header("Location:update_registeration.php");
    //  exit;

    }

  }
 

//course registration
$data=$con->query("SELECT * FROM `course_registration` WHERE Student_ID='$ID' and Registration=0 LIMIT 6 ");
$data=$data->fetchAll(PDO::FETCH_ASSOC);
/********************************************************************************/
?>

<?php 

$subject_success=$con->query("SELECT * FROM course_registration WHERE Student_ID='$ID' AND Registration=1 AND Subject_Status=1 ");

$subject_success=$subject_success->fetchAll(PDO::FETCH_ASSOC);

// echo "<pre>";
// print_r($subject_success);
// echo"</pre>";


$subject_next=$con->query("SELECT * FROM course_registration WHERE Student_ID=$ID AND (Registration=1 OR Registration=0) AND Subject_Status=0 LIMIT 6");
$subject_next=$subject_next->fetchAll(PDO::FETCH_ASSOC);

//  echo "<pre>";
//  print_r($subject_next);
//  echo"</pre>";


 $subject_dependance=$con->query("SELECT * FROM `genral_subject`");
 $row= $subject_dependance->rowCount();
 $subject_dependance=$subject_dependance->fetchAll(PDO::FETCH_ASSOC);


//  echo $row;
//  echo $subject_dependance[0]['Subject_Name'];
//  echo $subject_next[0]['Subject_Name'];


$arr1=[];
$arr2=[];
$array_subject=[];
foreach($subject_next as $next){

  foreach($subject_dependance as $dp){
  
    if(trim($dp['Subject_Name'])===trim($next['Subject_Name'])){

    
         if($dp['De_Subject_Name']==0){

             array_push($arr1, $next['Subject_Name']);
            
           }

         foreach($subject_success as $success){
         if(trim($dp['De_Subject_Name'])===trim($success['Subject_Name'])){
           
           array_push($arr2,$next['Subject_Name']);
          

      }
      
   }

  }
  }

}

 $array_subject=array_merge($arr1,$arr2);
// echo "<pre>";
// print_r($array_subject);
// echo"</pre>";

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
            foreach($array_subject as $s){
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
            foreach($array_subject as $d){
         
            ?>
          <td>
            <label for="s<?Php echo $count;?>" ><?php echo $d?> </label>
            <br>

           <input type="checkbox"  name="<?php echo $d?>"  id="s<?Php echo $count++;?>" value="<?php echo $d?>">
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


