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

// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: index.html");
    exit;
}

$username= $_POST['username'];
$password = $_POST['password'];
$username_err = $password_err = "";

// Check if username is empty
if(empty(trim($_POST["username"]))){
    $username_err = "Please enter username.";
} 

// Check if password is empty
if(empty(trim($_POST["password"]))){
    $password_err = "Please enter your password.";
}

// Validate credentials
if(empty($username_err) && empty($password_err)){
    // Prepare a select statement
    $sql = "SELECT id, username, password FROM users WHERE username = ?";
    
    if($stmt = $conn->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("s",$username);
        
        
        // Attempt to execute the prepared statement
        if($stmt->execute()){
            // Store result
            $stmt->store_result();
            
            // Check if username exists, if yes then verify password
            if($stmt->num_rows == 1){                    
                // Bind result variables
                $stmt->bind_result($id, $username, $password);
                echo "\n";
                echo "Ok1";
                if($stmt->fetch()){
                    echo "Ok2";
                    // Password is correct, so start a new session
                    echo "ok3";
                    session_start();
                    
                    // Store data in session variables
                    $_SESSION["loggedin"] = true;
                    $_SESSION["id"] = $id;
                    $_SESSION["username"] = $username;                            
                    
                    // Redirect user to welcome page
                    header("location: index.html");
                }
            } else{
                // Display an error message if username doesn't exist
                $username_err = "No account found with that username.";
            }
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
    
    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();

?>