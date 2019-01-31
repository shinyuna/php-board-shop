<?php
    // var_dump($_POST);
    require_once('./inc/dbCon.php');
    session_start();

    $filtered = array(
        'idx'=>mysqli_real_escape_string($conn, $_POST['idx'])
    );

    $sql = "delete from board where idx = '{$filtered['idx']}' and pd_name = '{$_SESSION['name']}'";
    $result = mysqli_query($conn, $sql);

    if($result == false){
        echo '에러.. 관리자에게 문의';
        error_log(mysqli_error($conn));
    }else{
        echo "<script>alert('상품이 삭제되었습니다.'); location.href='./index.php';</script>";
    }
?>