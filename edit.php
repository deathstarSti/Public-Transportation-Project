<?php
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "users";

 // Create connection
 $conn = new mysqli($servername, $username, $password,$dbname);

 // Check connection
 if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
 }
 echo "Connected successfully";
 
 $id=$_SESSION["id"];
 $email= $_POST['email'];
 $username= $_POST['username'];
 $password = $_POST['password'];
 $firstname = $_POST['firstname'];
 $lastname = $_POST['lastname'];  

 if(!empty($_POST['username'])) {
    $sql1 = "UPDATE users SET username=$username WHERE id=$id";
    if($conn->query($sql1) === true){
        echo "Records were updated successfully.";
    } 
    else{
        echo "ERROR: Could not able to execute $sql1. " . $mysqli->error;    
    }   
 }
  // Check if email has been entered and is valid
 else if(!empty($_POST['email'])) {
    $sql2 = "UPDATE users SET email=$email WHERE id=$id";
    if($conn->query($sql2) === true){
        echo "Records were updated successfully.";
    } 
    else{
        echo "ERROR: Could not able to execute $sql1. " . $mysqli->error;    
    }
 }
 else if(!empty($_POST['password'])) {
    $sql3 = "UPDATE users SET password=$password WHERE id=$id";
    if($conn->query($sql3) === true){
        echo "Records were updated successfully.";
    } 
    else{
        echo "ERROR: Could not able to execute $sql1. " . $mysqli->error;    
    }
 }
 else if(!empty($_POST['firstname'])) {
    $sql4 = "UPDATE users SET firstname=$firstname WHERE id=$id";
    if($conn->query($sql4) === true){
        echo "Records were updated successfully.";
    } 
    else{
        echo "ERROR: Could not able to execute $sql1. " . $mysqli->error;    
    }
 }
 else if(!empty($_POST['lastname'])) {
    $sql5 = "UPDATE users SET lastname=$lastname WHERE id=$id";
    if($conn->query($sql5) === true){
        echo "Records were updated successfully.";
    } 
    else{
        echo "ERROR: Could not able to execute $sql1. " . $mysqli->error;    
    }
 }

// Close connection
$conn->close();
header("location: index_login.html");
?>