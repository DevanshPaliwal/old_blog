<?php

$username1 = $_POST['username'];
$password1 = $_POST['password'];


$servername="localhost";
$username="root";
$password="";
$dbname="blog";

$conn=new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error){
    die("Connection failed: ".$conn->connect_error);
} 


function insertData($username1,$password1){
    global $conn;
    $sql = "INSERT INTO userdata (username,password) VALUES (?,?)";
    $stmt=$conn->prepare($sql);
    $stmt->bind_param("ss", $username1, $password1);
    
    if ($stmt->execute()) {
    echo "Account created successfully!";
    } 
    else {
        $errval=mysqli_error($conn);
        if(str_contains($errval,'Duplicate')){
            echo "User already exists!";
        }
    }
    $stmt->close();
    
}

  
  // Call function to insert data
  insertData($username1, $password1);
  $conn->close();
