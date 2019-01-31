<?php
    $conn = mysqli_connect("localhost", "root", "landrover", "mydb");
    
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "SELECT * FROM `users` WHERE id='$id'";
    $result = mysqli_query($conn, $sql); //성공하면 ture 실패하면  false
    $num = mysqli_num_rows($result);
    // echo $num;

    if( $num === 1 ){
        echo "이미 존재하는 아이디입니다.";
    }else{
        echo "사용 가능한 아이디입니다.";
    }
?>
<button onclick="window.close()">확인</button>