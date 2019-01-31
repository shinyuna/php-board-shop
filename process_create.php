<?php
    // var_dump($_POST);
    require_once('./inc/dbCon.php');
    session_start();

    $filtered = array(
        'pd_name'=>mysqli_real_escape_string($conn, $_POST['pd_name']),
        'pd_user'=>mysqli_real_escape_string($conn, $_POST['pd_user'])
    );

    $sql = "
        insert into board
            (pd_name, pd_user, create_at)
            values(
                '{$filtered['pd_name']}',
                '{$filtered['pd_user']}',
                NOW()
            )
    ";
    $result = mysqli_query($conn, $sql);

    if($result == false){
        echo '에러.. 관리자에게 문의';
        error_log(mysqli_error($conn));
    }else{
        echo "<script>alert('상품이 등록되었습니다.');location.href='./index.php';</script>";
    }
    // echo $sql;
?>