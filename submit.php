<?php

//including the database connection file
include_once("config/database.php");

$response = array('success' => false);

if(isset($_POST['email']) && $_POST['email']!='') {   
    $email = $_POST['email'];
    
    // if all the fields are filled (not empty)             
    //insert data to database
    $result = mysqli_query($mysqli, "INSERT INTO contacts(email) VALUES('$email')");
    //display success message
    $response['success'] = true;
    // echo "<font color='green'>Data added successfully.";
    // echo "<br/><a href='index.php'>View Result</a>";
}

echo json_encode($response);

// $check = mysqli_query($mysqli, "SELECT * FROM contacts WHERE email = '$email'");
// if($check == true) {
//     $response['success'] = false;
// } elseif ($check != true && isset($_POST['email']) && $_POST['email']!='') {   
//     $email = $_POST['email'];

//     // if all the fields are filled (not empty)             
//     //insert data to database
//     $result = mysqli_query($mysqli, "INSERT INTO contacts(email) VALUES('$email')");
//     //display success message
//     $response['success'] = true;
//     // echo "<font color='green'>Data added successfully.";
//     // echo "<br/><a href='index.php'>View Result</a>";
// }

?>