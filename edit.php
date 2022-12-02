<?php
// including the database connection file
session_start();
if(!isset($_SESSION['AdminLoginId'])) {
    header("Location: login.php");
}

include_once("config/database.php");

if(isset($_POST['update']))
{   
    $id = $_POST['id'];
    
	$name=$_POST['name'];
    $desc=$_POST['descripcion'];
	$precio=$_POST['precio'];
	$categoria=$_POST['categoria'];
    $img=$_POST['img'];
    
    // checking empty fields
    if(empty($name) || empty($desc) || empty($precio) || empty($categoria) || empty($img)) {          
        if(empty($name)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
        
        if(empty($desc)) {
            echo "<font color='red'>Desc field is empty.</font><br/>";
        }

		if(empty($precio)) {
            echo "<font color='red'>Precio field is empty.</font><br/>";
        }

		if(empty($categoria)) {
            echo "<font color='red'>Categoria field is empty.</font><br/>";
        }

        if(empty($img)) {
            echo "<font color='red'>img field is empty.</font><br/>";
        }
    } else {    
        //updating the table
        $result = mysqli_query($mysqli, "UPDATE products SET name='$name',descripcion='$desc',precio='$precio',categoria='$categoria',img='$img' WHERE id=$id");
        
        //redirectig to the display page. In our case, it is index.php
        header("Location: admin.php");
    }
}
?>
<?php
//getting id from url

if(empty($_GET["id"])){
    header('Location: admin.php');
} else {
    $id = $_GET['id'];
}

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM products WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$name = $res['name'];
    $desc = $res['descripcion'];
	$precio = $res['precio'];
	$categoria_id = $res['categoria'];
    $img = $res['img'];
}

$result2 = mysqli_query($mysqli, "SELECT * FROM categorias WHERE cat_id=$categoria_id");

while($res2 = mysqli_fetch_array($result2))
{
	$categoria = $res2['cat_desc'];
}

?>
<html>
<head>  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>SIAMES STORE - Hardware shop</title>
    <link rel="icon" href="css/img/SS2.png" type="image/icon type">
    <link rel="stylesheet" href="css/add.css">
</head>

<body>
    <div id="img"></div>
    <div class="edit-modal">
        <div class="modal-content">
            <div class="modal-header">
            <h2><?php echo mb_strimwidth($name, 0, 22, "...");?></h2>
            </div>
            <div class="modal-body">
                <form name="form1" method="post" action="edit.php">
                    <label for="name">Título</label>
                    <input type="text" name="name" value="<?php echo $name;?>">
                    <label for="precio">Precio</label>
                    <input type="text" name="precio" value="<?php echo $precio;?>">
                    <label for="descripcion">Descripción</label>
                    <!-- <input type="text" name="descripcion" value="<?php echo $desc;?>"> -->
                    <!-- <textarea id="desc" name="descripcion" cols="33" rows="3" maxlength="95"><?php echo $desc;?></textarea> -->
                    <textarea id="desc" name="descripcion" cols="33" rows="3"><?php echo $desc;?></textarea>
                    <label for="categoria">Categoria</label>
                    <select id="categoria" name="categoria">
                        <option value="<?php echo $categoria_id;?>">Actual: <?php echo $categoria;?></option>
                        <option value=1>Teclado</option>
                        <option value=2>Mouse</option>
                        <option value=3>Auricular</option>
                        <option value=4>Pantalla</option>
                        <option value=5>Gabinete</option>
                        <option value=6>PC</option>
                        <option value=7>Laptop</option>
                    </select>
                    <label for="imagen">Imagen</label>
                    <input type="text" name="img" value="<?php echo $img;?>">
                    <div class="modal-footer">
                        <a href="admin.php">
                            <div id="cancelar">CANCELAR</div>
                        </a>
                        <input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
                        <input type="submit" id="guardar" name="update" value="GUARDAR">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>