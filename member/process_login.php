<?php
require_once('../inc/dbCon.php');
session_cache_expire(5*60);
session_start();

if(!isset($_POST['id']) || !isset($_POST['pw'])) exit;
// id, pw가 post로 안 넘어오면 exit

$user_id = mysqli_real_escape_string($conn, $_POST['id']);
$user_pw = md5(mysqli_real_escape_string($conn, $_POST['pw']));
// echo $user_id."<br>".$user_pw;
// $hash = crypt($user_pw, '$user_pw');
// echo "<br>".$hash;

if ( ($user_id=='') || ($user_pw=='') ) {
    echo "<script>alert('아이디 또는 패스워드를 입력하여 주세요.');history.back();</script>";
    exit;
}
  
$sql = "SELECT * FROM `users` WHERE id='$user_id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$num = mysqli_num_rows($result);
// echo $num;

// echo $user_pw."<br>";
// echo $row['pw'];

if($num === 1){  
    if($user_pw === $row['pw']){
        $_SESSION['name'] = $row['name'];
        $_SESSION['id'] = $row['id'];
        echo '<script>location.href="../index.php";</script>';
    }else{
        echo "<script>alert('비밀번호가 일치하지 않습니다.');history.back();</script>";
    }
}else{
    echo "<script>alert('아이디가 일치하지 않습니다.');history.back();</script>";
}

?>