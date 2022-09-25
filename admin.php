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
        <link rel="stylesheet" href="css/admin.css">
        <link rel="stylesheet" href='https://fonts.googleapis.com/css?family=DM+Sans%3A700%7CHeebo%3A400%2C700%7CAldrich%3A400&#038;display=swap&#038;ver=6.0.2' media='all'>
        <script type="text/javascript" src="js/funtions.js" defer></script>
    </head>
    <body>
        <section id="home">
            <div id="img"></div>
            <div class="centered">
                <div id="title">
                    <h1>AdminPanel</h1>
                </div>
                <div id="agregar" class="btn-create">
                    <h1>AGREGAR PRODUCTO</h1>
                </div>
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
                            <div id="buttoms">
                                <div id="edit" class="btn-edit"></div>
                                <div id="remove" class="btn-remove"></div>
                            </div>
                            <div id="card-footer">
                                <h3><?php echo $row['nombre']; ?></h3>
                                <h4>$<?php echo number_format($row['precio'], 0, ','); ?></h4>
                            </div>
                        </div>
                    </div> 
                <?php } ?>   
            </div>
            </div>
        </section>

        <!-- ############################################################################## -->

        <!-- The Modal -->
        <div class="create-modal">
            <div class="modal-content">
                <div class="modal-header">
                <h2>Agrega un nuevo producto</h2>
                </div>
                <div class="modal-body">
                    <form>
                        <label for="username">Título</label>
                        <input type="text" placeholder="Ingresa el título del producto">
                        <label for="username">Precio</label>
                        <input type="text" placeholder="Ingresa el precio del producto">
                        <label for="descripcion">Descripción</label>
                        <textarea id="desc" cols="33" rows="3" maxlength="95"></textarea>
                        <label for="username">Imagen</label>
                        <input type="text" placeholder="Ingresa la url de la imagen">
                    </form>
                </div>
                <div class="modal-footer">
                    <div id="create-c">CANCELAR</div>
                    <div id="create-g">GUARDAR</div>
                </div>
            </div>
        </div>
        <div class="edit-modal">
            <div class="modal-content">
                <div class="modal-header">
                <h2>Razer Huntsman</h2>
                </div>
                <div class="modal-body">
                    <form>
                        <label for="username">Título</label>
                        <input type="text" placeholder="Razer Huntsman">
                        <label for="username">Precio</label>
                        <input type="text" placeholder="$120.000">
                        <label for="descripcion">Descripción</label>
                        <textarea id="desc" cols="33" rows="3" maxlength="95">TECLADO GAMER RAZER HUNTSMAN MINI RGB MECANICO MX PURPLE</textarea>
                        <label for="username">Imagen</label>
                        <input type="text" placeholder="Ingresa la url de la nueva imagen">
                    </form>
                </div>
                <div class="modal-footer">
                    <div id="cancelar">CANCELAR</div>
                    <div id="guardar">GUARDAR</div>
                </div>
            </div>
        </div>
        <div class="remove-modal">
            <div class="modal-content">
                <div class="modal-body">
                    <h1>Esta seguro de que desea eliminar este producto?</h1>
                </div>
                <div class="modal-footer">
                    <div id="no">No, cancelar</div>
                    <div id="si">Si, eliminar</div>
                </div>
            </div>
        </div>

    </body>
</html>