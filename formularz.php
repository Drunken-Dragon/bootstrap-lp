<!DOCTYPE html>
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
    	?>
      <p>Your name is: <?= $name;?>
        <strong><?= $empty_name;?></strong></p><br>
      <p>Your email is: <?= $email;?>
        <strong><?= $empty_email;?></strong>
        <strong><?= $email_error;?></strong></p><br>
      <p>Your phone is: <?= $phone;?>
        <strong><?= $empty_phone;?></strong></p><br>
    </body>
</html>
