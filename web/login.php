<?php

include 'connection.php';
$email = $_POST['Email'];
$password = $_POST['Password'];
session_start();
try {

    $stmt = $conn->prepare("SELECT * FROM users"); 
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    foreach($stmt->fetchAll() as $k=>$v) { 
        if($v['email'] == $email && $v['password'] == $password){
        	$_SESSION['name'] = ucfirst($v['name']);
        	//echo $_SESSION['name']. " login successfully";
        	header("Location: index.php");
        }
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}




?>