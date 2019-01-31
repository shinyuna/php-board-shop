<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>JOIN</title>
</head>
<body>
    <div class="container">
        <form action="./process_join.php" class="form-horizontal" method="POST">
            <div class="form-group">
                <label for="id" class="col-sm-2 control-label">아이디</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="id" placeholder="id" name="id">
                    <button type="button" class="btn btn-info duplication_btn" onclick="idChk()">중복검사</button>
                </div>
            </div>
            <div class="form-group">
                <label for="pw" class="col-sm-2 control-label">비밀번호</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="pw" placeholder="password" name="pw">
                </div>
            </div>
            <div class="form-group">
                <label for="pw_ck" class="col-sm-2 control-label">비밀번호 확인</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="pw_ck" placeholder="password check" name="pw_ck" onKeyup="pwChk()">
                    <p class="check"></p>
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">이름</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" placeholder="name" name="name"> 
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success">Sign up</button>
                </div>
            </div>
        </form>
    </div>

<script>
    function idChk(){
        let id = document.getElementById('id').value;
        if(id){
            url = "check.php?id="+id;
            window.open(url,"chkid","width=400,height=200");
        }else{
            alert('아이디를 입력하세요.');
        }
    }

    function pwChk(){
        let pw = document.getElementById('pw').value;
        let pw_ck = document.getElementById('pw_ck').value;
        if(pw != pw_ck){
            document.querySelector('.check').innerHTML = "비밀번호가 일치하지 않습니다.";
            document.querySelector('.check').style.color = "red";
            return false;
        }else{
            document.querySelector('.check').innerHTML = "";
        }
    }

    document.addEventListener('keydown', function(event) {
        if (event.keyCode === 13) {
            event.preventDefault();
        }
    }, true);
    
</script>
</body>
</html>