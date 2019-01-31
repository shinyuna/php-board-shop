<?php
 require_once('../inc/dbCon.php');
 session_start();

 $filtered = array(
    'id'=>mysqli_real_escape_string($conn, $_POST['id']),
    'pw'=>md5(mysqli_real_escape_string($conn, $_POST['pw'])),
    'name'=>mysqli_real_escape_string($conn, $_POST['name'])
 );

$sql = "
        insert into users 
            (id, pw, name)
        values(
            '{$filtered['id']}',
            '{$filtered['pw']}',
            '{$filtered['name']}'
        )
";
$result = mysqli_query($conn, $sql); 

if($result == false){
    echo "에러 관리자에게 문의";
    error_log(mysqli_error($conn));
}else{
    echo "<script>alert(`환영합니다 {$filtered['id']}님 로그인 후 이용해 주세요.`); location.href='./login.php';</script>";
}

?>
