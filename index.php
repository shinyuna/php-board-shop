<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>Document</title>
</head>
<body>
<?php     
    require_once('./inc/dbCon.php');
    session_cache_expire(5*60);
    session_start();
    if(!isset($_SESSION['name'])){
?>
    <script>location.href="./member/login.php"</script>
<?php
    }else{
        $sql = "select * from board limit 1000";
        $result = mysqli_query($conn, $sql); // 가져올 속성이 없으면 null
        $list = '';
        while($row = mysqli_fetch_array($result)){
            if($row['pd_user'] === $_SESSION['name']){
                $list = $list."
                <tr>
                    <td>{$row['idx']}</td>
                    <td>{$row['pd_name']}</td>
                    <td>{$row['pd_user']}</td>
                    <td>{$row['create_at']}</td>
                    <td><a href=\"edit.php?id={$row['idx']}\" class=\"btn btn-primary\">edit</a></td>
                    <td>
                        <form action=\"process_delete.php\" method=\"POST\" onclick=\"ask()\">
                            <input type=\"hidden\" name=\"idx\" value=\"{$row['idx']}\">
                            <input type=\"submit\" value=\"delete\" class=\"btn btn-danger\">
                        </form>
                    </td>
                </tr>
                ";
            }else{
                $list = $list."
                <tr>
                    <td>{$row['idx']}</td>
                    <td>{$row['pd_name']}</td>
                    <td>{$row['pd_user']}</td>
                    <td>{$row['create_at']}</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                ";
            }
            
        }
?>
    <div class="container">
    <div class="header">
        <a href="./member/logout.php" class="btn btn-danger">로그아웃</a>
        <span class="btn btn-warning" style="color:#fff;"><?="{$_SESSION['name']}님"?></span>
    </div>
        
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>상품번호</th>
                    <th>상품명</th>
                    <th>등록자</th>
                    <th>등록일</th>
                    <th>&nbsp;</th>
                    <th><a href="create.php" class="btn btn-primary">add product</a></th>
                </tr>
            </thead>
            <tbody>
                <?=$list?>
            </tbody>
        </table>
    </div>
<?php 
    }
?>   
<script>
    function ask(){
        if(confirm('정말 삭제하시겠습니까?') !== true){
            event.preventDefault();
        }
    }
</script>
</body>
</html>