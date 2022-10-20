<?php

session_start();
if(!isset($_SESSION['AdminLoginId'])) {
    header("Location: login.php");
}

if(isset($_POST['Logout'])) {
    session_destroy();
    header("Location: index.php");
}

require "config/database.php";
$result = mysqli_query($mysqli, "SELECT id, name, descripcion, precio, img FROM products WHERE activo=1 ORDER BY id"); // using mysqli_query instead
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>SIAMES STORE - Hardware shop</title>
        <link rel="icon" href="css/img/SS2.png" type="image/icon type">
        <link rel="stylesheet" href="css/admin.css">
        <script type="text/javascript" src="js/funtions.js" defer></script>
    </head>
    <body>
        <section id="home">
            <div id="img"></div>
            <div class="centered">
                <div id="title">
                    <h1>AdminPanel</h1>
                </div>
                <div id="top-buttoms">
                    <a href="add.html">
                        <div id="agregar" class="btn-create">
                            AGREGAR PRODUCTO
                        </div>
                    </a>
                    <form method="POST">
                        <input type="submit" id="cerrar" name="Logout" value="LOGOUT">
                    </form>
                </div>
                <div id="container">
                <?php while($row = mysqli_fetch_array($result)) { ?>
                    <div class="card">
                        <div class="face front">
                            <img src="<?php echo $row['img']; ?>">
                            <div id="buttoms">
                                <a href="edit.php?id=<?php echo $row['id']?>">
                                    <div id="edit" class="btn-edit"></div>
                                </a>
                                <a href="remove.php?id=<?php echo $row['id']?>">
                                    <div id="remove" class="btn-remove"></div>
                                </a>
                            </div>
                            <div id="card-footer">
                                <h3><?php echo mb_strimwidth($row['name'], 0, 17, "..."); ?></h3>
                                <h4>$<?php echo number_format($row['precio'], 0, ','); ?></h4>
                            </div>
                        </div>
                    </div>
                <?php } ?>   
                </div>
            </div>
        </section>
    </body>
</html>