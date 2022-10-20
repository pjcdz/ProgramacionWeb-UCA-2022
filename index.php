<?php

require "config/database.php";
// $result = mysqli_query($mysqli, "SELECT id, name, descripcion, precio, img FROM products WHERE activo=1 ORDER BY id");
// $pantalla = "pantalla";
// $result = mysqli_query($mysqli, "SELECT id, name, descripcion, precio, img FROM products WHERE categoria='$pantalla' ORDER BY id");
// using mysqli_query instead

//getting category from url

if(empty($_GET["categoria"])){
    $result = mysqli_query($mysqli, "SELECT id, name, descripcion, precio, img FROM products WHERE activo=1 ORDER BY id");
} else {
    $categoria = $_GET['categoria'];
    $result = mysqli_query($mysqli, "SELECT id, name, descripcion, precio, img FROM products WHERE categoria='$categoria' AND activo=1 ORDER BY id");
}

// selecting data associated with this particular id
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>SIAMES STORE - Hardware shop</title>
        <link rel="icon" href="css/img/SS2.png" type="image/icon type">
        <link rel="stylesheet" href="css/index.css">
        <script type="text/javascript" src="js/funtions.js" defer></script>
        <link rel="stylesheet" href='https://fonts.googleapis.com/css?family=DM+Sans%3A700%7CHeebo%3A400%2C700%7CAldrich%3A400&#038;display=swap&#038;ver=6.0.2' media='all'>
    </head>

    <body>

        <section id="home">
            <div class="img"></div>
            <div class="centered">
                <div id="title"></div>
            </div>
            <div class="scrolldown">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </section>
        
        <section id="products">
            <div id="h2">
                <h1 class="animated-shadow">NUESTROS PRODUCTOS</h1>
            </div>
            <ul class="nav">
                <li><a href="index.php?categoria=4#products">PANTALLAS</a></li>
                <li><a href="index.php?categoria=1#products">TECLADOS</a></li>
                <li><a href="index.php?categoria=2#products">MOUSE</a></li>
                <li><a href="index.php?categoria=5#products">GABINETES</a></li>
                <li><a href="index.php#products">TODOS</a></li>
            </ul>
            <div id="container">
                <?php while($row = mysqli_fetch_array($result)) { ?>
                    <div class="card">
                        <div class="face front">
                            <img src="<?php echo $row['img']; ?>">
                            <div>
                                <h3><?php echo mb_strimwidth($row['name'], 0, 17, "..."); ?></h3>
                                <h4><span>$</span><?php echo number_format($row['precio'], 0, ','); ?></h4>
                            </div>
                        </div>
                        <div class="face back">
                            <p><?php echo mb_strimwidth($row['descripcion'], 0, 95, "..."); ?></p>
                            <div class="link">
                                <a href="info.php?id=<?php echo $row['id']?>">Más información</a>
                            </div>
                        </div>
                    </div> 
                <?php } ?>   
            </div>
            <div class="contenedor">
                <form id="form1" action="#">
                    <h1>INGRESA TU MAIL AQUÍ</h1>
                    <p>recibi ofertas y nuestros nuevos productos</p>
                    <div class="email-box">
                        <input id="test" class="tbox" type="text" name="email" placeholder="Enter your email">
                        <!-- <button class="btn" type="button" name="submit" onclick="ValidateEmail(document.form1.text1)">Subscribe</button>     -->
                        <input class="btn" type="submit" name="submit" value="Subscribe" onclick="ValidateEmail()"/>
                </form>
            </div>
            
        </section>

    </body>
</html>