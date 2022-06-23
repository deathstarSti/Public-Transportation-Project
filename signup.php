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

  $email= $_POST['email'];
  $username= $_POST['username'];
  $password = $_POST['password'];
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];    
  if(isset($_POST['submit'])) {
    // Check if name has been entered
    if(empty($_POST['user'])) {
      $errName= 'Please enter your user name';
    }
    // Check if email has been entered and is valid
    else if(empty($_POST['email'])) {
      $errEmail = 'Please enter a valid email address';
    }
    // check if a password has been entered and if it is a valid password
    else if(empty($_POST['password']) || (preg_match("/^.*(?=.{8,})(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*$/", $_POST["password"]) === 0)) {
      $errPass = '<p class="errText">Password must be at least 8 characters and must contain at least one lower case letter, one upper case letter and one digit</p>';
    } else {
      echo "The form has been submitted";
    }
  }
  echo "queries";
  $SELECT="SELECT email from users Where email=? Limit 1";
  $INSERT="INSERT Into users (username,password,firstname,lastname,email) values(?,?,?,?,?)";
  //prep statement
  $stmt= $conn->prepare($SELECT);
  $stmt->bind_param("s",$email);
  $stmt->execute();
  $stmt->bind_result($email);
  $stmt->store_result();
  $rnum=$stmt->num_rows;
  if ($rnum==0){
    $stmt->close();

    $stmt= $conn->prepare($INSERT);
    $stmt->bind_param("sssss",$username,$password,$firstname,$lastname,$email);
    $stmt->execute();
    echo '<script language="javascript">';
    echo 'alert("The record has been inserted")';
    echo '</script>';
    
  }
  else{
    echo "Email already submitted";
  }
  
  $stmt->close();
  $conn->close();
  header('Location: register_complete.html');
  exit;
?>
