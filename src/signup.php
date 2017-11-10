<?php
$msg = "";
$dbHost = $_ENV['DB_HOST'];
$dbName = $_ENV['DB_NAME_USR'];
$userName = $_ENV['DB_USERNAME'];
$dbPassword = $_ENV['DB_PASSWORD'];
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $password = $_POST['password'];
    $cPassword = $_POST['cPassword'];
    if ($password != $cPassword) {
        $msg = "Please check your password!";
    } else {
        $hash = password_hash($password, PASSWORD_BCRYPT);
        try {
            $pdo = new PDO('mysql:host='.$dbHost.';dbname='.$dbName.';charset=utf8', $userName, $dbPassword);
            $db_update = $pdo->prepare("INSERT INTO users (name, password) VALUES (:name, :password)");
            $db_update->bindParam(':name', $name);
            $db_update->bindParam(':password', $hash);
            $db_update->execute();
            $msg = "You have successfully signed up!";
        } catch (\Throwable $e) {
            $msg = $e->getMessage();
        }
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
</head>
<body>
<div class="container" style="margin-top: 100px">
    <div class="row justify-content-center">
        <div class="col-md-6" align="center">
            <h2>Please sign up</h2>
            <?php if ($msg != "") : ?>
                <?= $msg ?>
                <br><br>
            <?php endif; ?>
            <form method="post" action="/signup">
                <input class="form-control" type="text" name="name" placeholder="User name"><br>
                <input class="form-control" type="password" name="password" minlength="8" placeholder="User password"><br>
                <input class="form-control" type="password" name="cPassword" minlength="8" placeholder="Confirm User password"><br>
                <input class="btn btn-primary" type="submit" name="submit" value="Sign up"><br><br>
            </form>
            <form method="post" action="/login">
                <input class="btn btn-primary" type="submit" name="login" value="Go to sign in"><br>
            </form>
        </div>
    </div>
</div>
</body>
</html>