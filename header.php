<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" 
    crossorigin="anonymous">
            
    <?php
        // choose correct style path
        if (isset($_POST["login-submit"])) {
                echo '<link rel="stylesheet" type="text/css" href="../style/style.php">';
        }
        else {
            echo '<link rel="stylesheet" type="text/css" href="style/style.php">';
        }
    ?>

    <title>Login/SignUp Site</title>
</head>
<body class="container">