<?php
	// tous d'abord il faut démarrer le système de sessions
	session_start();
	

	$servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "ece_amazon";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    
    // sql to delete a record
    $sql = "DELETE FROM panier";
    
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
	
	session_destroy();

	header('location:main.php');
?>

