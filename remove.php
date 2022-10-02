<?php
//including the database connection file
include("config/database.php");

//getting id of the data from url
$id = $_GET['id'];

//deleting the row from table

if(isset($_POST['remove'])) {   
    //updating the table
    $result = mysqli_query($mysqli, "UPDATE products SET activo=0 WHERE id=$id");
        
    //redirectig to the display page. In our case, it is index.php
    header("Location: admin.php");
}

?>

<html>
<head>  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>SIAMES STORE - Hardware shop</title>
    <link rel="icon" href="css/img/SS2.png" type="image/icon type">
    <link rel="stylesheet" href="css/admin.css">
</head>

<body>
    <div id="img"></div>
    <div class="remove-modal">
        <div class="modal-content">
            <div class="modal-body">
                <h1>Esta seguro que desea eliminar este producto?</h1>
            </div>
            <div class="modal-footer">
                <a href="admin.php">
                    <div id="no">No, cancelar</div>
                </a>
                <form method="post">
                    <input type="submit" id="si" name="remove" value="Si, eliminar">
                    <!-- <div id="si">Si, eliminar</div> -->
                </form>
            </div>
        </div>
    </div>
</body>

</html>