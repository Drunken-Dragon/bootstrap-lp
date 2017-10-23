<?php
    session_start();

    $csrf = $_SESSION['csrf'];
?>

<html>
  <head>
    <meta charset="utf-8">
    <title>Form handling</title>
  </head>
    <body>

<?php
    $email_error = "";
    $empty_name = $empty_email = $empty_phone = "";

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (empty($_POST["name"])) {
            $empty_name = "Please enter your name";
        } else {
            $name = sanitize_input($_POST['name']);
        }
        if (empty($_POST["email"])) {
            $empty_email = "Please enter your email address";
        } else {
            $email = sanitize_input($_POST['email']);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $email_error = " Invalid email format";}
        }
        if (empty($_POST["phone"])) {
            $empty_phone = "Please enter your phone number";
        } else {
            $phone = sanitize_input($_POST['phone']);
        }
    }

    function sanitize_input($data){
      return htmlspecialchars($data);
    }

    if (hash_equals($csrf, $_POST['csrf'])) {
        echo 'CSRF token is valid';
    } else {
        die('CSRF token is invalid');
    }
?>
    <p><strong><?= $empty_name;?></strong></p><br>
    <p><strong><?= $empty_email;?></strong>
        <strong><?= $email_error;?></strong></p><br>
    <p><strong><?= $empty_phone;?></strong></p><br>

<?php
    try
    {
        $pdo = new PDO('mysql:host=localhost;dbname=landing_form;charset=utf8','root','root');
        // var_dump($pdo->query('SELECT * FROM form_input')->fetchAll());

        $db_update = $pdo->prepare("INSERT INTO form_input (name, email, phone)
        VALUES (:name, :email, :phone)");
        $db_update->bindParam(':name', $name);
        $db_update->bindParam(':email', $email);
        $db_update->bindParam(':phone', $phone);

        $db_update->execute();

        echo "New records created successfully";
    }
    catch(\Throwable $e)
    {
        echo $e->getMessage();
    }
 ?>
    </body>
</html>
