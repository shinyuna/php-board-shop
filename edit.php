<?php
    require_once('./inc/dbCon.php');
    session_start();
    if(!isset($_SESSION['id'])){
        echo '<script>location.href="./member/login.php"</script>';
    }else{
        $sql = "select * from board where idx = {$_GET['id']}";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
    
    // if(isset($_GET['idx'])){
    //     $filtered_id = mysqli_real_escape_string($conn, $_GET['idx']);
    //     $sql = "select * from board where id ={$filtered_id}";
    //     $result = mysqli_query($conn, $sql);
    //     $row = mysqli_fetch_array($result);
    //     $article = array(
    //         'idx'=>$row['idx'],
    //         'pd_name'=>$row['pd_name'],
    //         'pd_user'=>$row['pd_user'],
    //         'create_at'=>$row['create_at'],
    //     );
    // }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BLOG</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
    <div class="container">
        <div id="write-blog">
            <form action="./process_edit.php" method="POST">
                    <h1 id="form-title">수정</h1>
                <div class="form-group">
                     <input type="hidden" name="idx"value="<?=$row['idx']?>">
                    <p><input type="text" name="pd_name" id="pd_name" placeholder="상품명" value="<?=$row['pd_name']?>"></p>
                    <p><input type="text" name="pd_user" id="pd_user" placeholder="등록자" value="<?=$row['pd_user']?>" readonly></p>
                </div>
                <button type="submit" class="btn-submit btn btn-success"><span class="glyphicon glyphicon-pencil"></span>상품수정</button>
                <p>&nbsp;</p>
            </form>
        </div>
    </div>  
<?php
    }
?>
</body>
</html>