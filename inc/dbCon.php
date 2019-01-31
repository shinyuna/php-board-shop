<?php
// try{
//     // $db = new PDO("mysql:host=localhost;dbname=mydb;charset=utf8","root","landrover");
// }
// catch(PDOException $e){
//     echo $e->getMessage();
//     echo $e->getCode();
//     echo "에러";
//     // exit;
// }

    $conn = mysqli_connect("localhost", "root", "landrover", "mydb");
    if(mysqli_connect_errno()){
        echo "Faild to connect to MySQL: " .mysqli_connect_error();
    }

?>