<?php

$username1 = $_POST['username'];
$password1 = $_POST['password'];

// connect to database
$conn = new mysqli("localhost","root","","blog");

if($conn->connect_error){
    die("Connection failed: ".$conn->connect_error);
}

$query = "SELECT * FROM userdata WHERE username = '$username1' AND password='$password1' ";

$result = $conn->query($query);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        echo 'User logged in!';
    } else {
        echo 'Invalid username or password!';
    }
} 
else {
    echo 'Error: ' . mysqli_error($conn);
}

// close connection
mysqli_close($conn);