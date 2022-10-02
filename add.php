<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>SIAMES STORE - Hardware shop</title>
    <link rel="icon" href="css/img/SS2.png" type="image/icon type">
</head>

<body>
<?php
//including the database connection file
include_once("config/database.php");

if(isset($_POST['Submit'])) {   
    $name = $_POST['name'];
    $precio = $_POST['precio'];
    $descripcion = $_POST['descripcion'];
	$categoria = $_POST['categoria'];
    $img = $_POST['img'];
        
    // checking empty fields
    if(empty($name) || empty($precio) || empty($descripcion) || empty($categoria)) {              
        if(empty($name)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
        
        if(empty($precio)) {
            echo "<font color='red'>precio field is empty.</font><br/>";
        }

        if(empty($descripcion)) {
            echo "<font color='red'>descripcion field is empty.</font><br/>";
        }

		if(empty($categoria)) {
            echo "<font color='red'>categoria field is empty.</font><br/>";
        }

        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else { 
        // if all the fields are filled (not empty)             
        //insert data to database
        $result = mysqli_query($mysqli, "INSERT INTO products(name,precio,descripcion,categoria,img) VALUES('$name','$precio','$descripcion','$categoria','$img')");
        
        //display success message
        // echo "<font color='green'>Data added successfully.";
        // echo "<br/><a href='index.php'>View Result</a>";
        header("Location: admin.php");
    }
}
?>
</body>
</html>