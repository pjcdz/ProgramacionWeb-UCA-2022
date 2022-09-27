<?php

require "config/database.php";
$result = mysqli_query($mysqli, "SELECT id, nombre, descripcion, precio FROM products WHERE activo=1 ORDER BY id"); // using mysqli_query instead
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>SIAMES STORE - Hardware shop</title>
        <link rel="icon" href="img/SS2.png" type="image/icon type">
        <link rel="stylesheet" href="css/index.css">
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
                <li><a href="#">PANTALLAS</a></li>
                <li><a href="#">TECLADOS</a></li>
                <li><a href="#">MOUSE</a></li>
                <li><a href="#">GABINETES</a></li>
                <li><a href="#">MÁS PRODUCTOS</a></li>
            </ul>
            <div id="container">
                <?php while($row = mysqli_fetch_array($result)) { ?>
                    <div class="card">
                        <div class="face front">
                            <?php 
                            
                            $id = $row['id'];
                            $imagen = "css/img/products/" . $id . "/principal.jpg";

                            if (!file_exists($imagen)) {
                                $imagen = "css/img/products/" . $id . "/principal.png";
                            }
                            if (!file_exists($imagen)) {
                                $imagen = "css/img/products/" . $id . "/principal.jpeg";
                            }
                            if (!file_exists($imagen)) {
                                $imagen = "css/img/No_Image_Available.jpg";
                            }

                            ?>
                            <img src="<?php echo $imagen; ?>">
                            <div>
                                <h3><?php echo $row['nombre']; ?></h3>
                                <h4><span>$</span><?php echo number_format($row['precio'], 0, ','); ?></h4>
                            </div>
                        </div>
                        <div class="face back">
                            <p><?php echo $row['descripcion']; ?></p>
                            <div class="link">
                                <a href="#">Más información</a>
                            </div>
                        </div>
                    </div> 
                <?php } ?>   
            </div>
            <div class="contenedor">
                <form action="">
                    <h1>INGRESA TU MAIL AQUÍ!!</h1>
                    <p>recibe ofertas y nuestros nuevos productos</p>
                    <div class="email-box">
                    <input class="tbox" type="email" name="" value="" placeholder="Enter your email">
                    <button class="btn" type="button" name="button">Subscribe</button>
                    </div>
                </form>
                </div>
            </div>
            <!-- The Modal -->
            

        </section>

    </body>
</html>
