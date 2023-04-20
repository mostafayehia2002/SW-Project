<?php
try {
    $host = 'localhost';
    $dbname = 'sw-project';
    $user = 'teefa';
    $password ='2002';

    $con = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8",$user,$password); 
} catch (PDOException $e) {
    echo  $e->getMessage();
}
?>