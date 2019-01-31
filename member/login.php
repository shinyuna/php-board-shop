<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>LOGIN</title>
</head>
<body>
    <div class="container">
        <form action="./process_login.php" class="form-horizontal" method="POST">
            <div class="form-group">
                <label for="id" class="col-sm-2 control-label">아이디</label>
                <div class="col-sm-10">
                    <input type="text" name="id" class="form-control" id="id" placeholder="id">
                </div>
            </div>
            <div class="form-group">
                <label for="pw" class="col-sm-2 control-label">비밀번호</label>
                <div class="col-sm-10">
                    <input type="password" name="pw" class="form-control" id="pw" placeholder="password">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success">Sign in</button>
                    <a href="./join.php" class="btn btn-primary">Sign up</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>