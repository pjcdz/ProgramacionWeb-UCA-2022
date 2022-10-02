<?php

require "config/database.php";

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>SIAMES STORE - Hardware shop</title>
        <link rel="icon" href="css/img/SS2.png" type="image/icon type">
        <link rel="stylesheet" href="css/login.css">
        <link rel="stylesheet" href='https://fonts.googleapis.com/css?family=DM+Sans%3A700%7CHeebo%3A400%2C700%7CAldrich%3A400&#038;display=swap&#038;ver=6.0.2' media='all'>
    </head>
    <body>
        <section id="home">
            <div id="img"></div>
            <div class="centered">
                <div id="title">
                    <h1>AdminPanel</h1>
                </div>
            </div>
            <div class="login-box">
                <img src="css/img/SS2.png" class="avatar" alt="Avatar Image">
                <div id="form">
                    <form method="POST">
                        <label for="username">Nombre de usuario</label>
                        <input name="AdminName" type="text" placeholder="Ingrese su nombre de usuario">
                        <label for="password">Contraseña</label>
                        <input name="AdminPassword" type="password" placeholder="Ingrese su contraseña">
                        <input name="Signin" type="submit" value="Log In">
                    </form>
                </div>
            </div>

            <?php 

            if(isset($_POST['Signin'])) {
                $query="SELECT * FROM admin_login WHERE admin_name='$_POST[AdminName]' AND admin_password='$_POST[AdminPassword]'";
                $result = mysqli_query($mysqli, $query);
                if(mysqli_num_rows($result)==1) {
                    session_start();
                    $_SESSION['AdminLoginId']=$_POST['AdminName'];
                    header("Location: admin.php");
                } else {
                    echo"<script>alert('Incorrect Password');</script>";
                }
            }
            ?>
        </section>
    </body>
</html>