
<?php

include'connection.php';

try{

	$stmt = $conn->prepare("INSERT INTO users (name, email, password, phone_number) 
    VALUES (:name, :email, :password, :phone_number)");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':phone_number', $phone_number);

    // insert a row
    $name = $_POST['Name'];
    $email = $_POST['Email'];
    $password = md5($_POST['Password']);
    $phone_number = $_POST['PhoneNumber'];
    $stmt->execute();
    
    header("Location: index.php");
    //echo "New records created successfully";
    }
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }

?>