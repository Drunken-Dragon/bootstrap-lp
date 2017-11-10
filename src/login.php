<?php
    session_start();
    $msg = "";
    $dbHost = $_ENV['DB_HOST'];
    $dbName = $_ENV['DB_NAME_USR'];
    $userName = $_ENV['DB_USERNAME'];
    $dbPassword = $_ENV['DB_PASSWORD'];
if (isset($_POST['submit'])) {
    $pdo = new PDO('mysql:host='.$dbHost.';dbname='.$dbName.';charset=utf8', $userName, $dbPassword);
    $name = $_POST['name'];
    $password = $_POST['password'];
    $data = ($pdo->query("SELECT id, password, name FROM users WHERE name = '$name'")->fetchAll());
    if (password_verify($password, $data[0]['password'])) {
        $_SESSION['username'] = ($data[0]['name']);
        header("location: /landing");
    } else {
        $msg = "Please check input data";
    }
};
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
</head>
<body>
    <div class="container" style="margin-top: 100px">
        <div class="row justify-content-center">
            <div class="col-md-6" align="center">
                <h2>Please sign in</h2>
                    <?php if ($msg != "") : ?>
                        <?= $msg ?>
                        <br><br>
                    <?php endif; ?>
                <form method="post" action="">
                    <input class="form-control" type="text" name="name" placeholder="User name"><br>
                    <input class="form-control" type="password" name="password" placeholder="User password"><br>
                    <input class="btn btn-primary" type="submit" name="submit" value="Sign in"><br>
                </form>
            </div>
        </div>
    </div>
</body>
</html>