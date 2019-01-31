<?php
    // var_dump($_POST);
    require_once('./inc/dbCon.php');
    session_start();

    $filtered = array(
        'idx'=>mysqli_real_escape_string($conn, $_POST['idx']),
        'pd_name'=>mysqli_real_escape_string($conn, $_POST['pd_name']),
        'pd_user'=>mysqli_real_escape_string($conn, $_POST['pd_user'])
    );

    $sql = "
        update board set
            pd_name = '{$filtered['pd_name']}',
            pd_user = '{$filtered['pd_user']}'
        where idx = '{$filtered['idx']}'
    ";
    $result = mysqli_query($conn, $sql);

    if($result == false){
        echo '에러.. 관리자에게 문의';
        error_log(mysqli_error($conn));
    }else{
        echo "<script>alert('상품이 수정되었습니다.');location.href='./index.php';</script>";
    }
?>