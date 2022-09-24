<?php
// including the database connection file
include_once("config/database.php");

if(isset($_POST['update']))
{	

	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	
	$nombre = mysqli_real_escape_string($mysqli, $_POST['nombre']);
	$descripcion = mysqli_real_escape_string($mysqli, $_POST['descripcion']);
	$precio = mysqli_real_escape_string($mysqli, $_POST['precio']);	
	
	// checking empty fields
	if(empty($nombre) || empty($descripcion) || empty($precio)) {	
			
		if(empty($nombre)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($descripcion)) {
			echo "<font color='red'>Age field is empty.</font><br/>";
		}
		
		if(empty($precio)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}		
	} else {	
		//updating the table
		// $result = mysqli_query($mysqli, "UPDATE products SET nombre='$nombre', descripcion='$descripcion', precio='$precio' WHERE id=$id");
		$result = mysqli_query($mysqli, "UPDATE products SET nombre='$nombre',descripcion='$descripcion',precio='$precio' WHERE id=$id");
		//redirectig to the display page. In our case, it is index.php
		header("Location: admin.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
// $result = mysqli_query($mysqli, "SELECT id, nombre, descripcion, precio FROM products WHERE id=$id"); // using mysqli_query instead
$result = mysqli_query($mysqli, "SELECT * FROM products WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$name = $res['nombre'];
	$age = $res['descripcion'];
	$email = $res['precio'];
}
?>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	<a href="index.php">Home</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table>
			<tr> 
				<td>Name</td>
				<td><input type="text" name="name" value="<?php echo $name;?>"></td>
			</tr>
			<tr> 
				<td>Age</td>
				<td><input type="text" name="age" value="<?php echo $age;?>"></td>
			</tr>
			<tr> 
				<td>Email</td>
				<td><input type="text" name="email" value="<?php echo $email;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>