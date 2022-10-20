<?php
// including the database connection file
include_once("config/database.php");

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
	$categoria = $res['categoria'];
    $img = $res['img'];
}
?>

<html>
<head>  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>SIAMES STORE - Hardware shop</title>
    <link rel="icon" href="css/img/SS2.png" type="image/icon type">
    <link rel="stylesheet" href="css/add.css">
    <script type="text/javascript" src="js/funtions.js" defer></script>
</head>

<body>    
    <div id="img"></div>
    <div class="container-all" id="modal">
    <div class="popup">
        <a href="index.php#products" id="cerrar" class="btn-close-popup">X</a>
        <div id="contenido">
            <img class="img" src="<?php echo $img; ?>">
            <div class="titulo"><?php echo $name;?></div>
            <div class="precio"><span>$</span><?php echo number_format($precio, 0, ','); ?></div>
        </div>
    
        <div class="container-text">
            <p><?php echo $desc;?></p>
        </div>   
    </div>
</div>

</body>

</html>
