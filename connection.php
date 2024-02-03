
<?php
// db connection parremeter


$host = "localhost";  //change if db is on diffrent server

$username = "root";   // change to db username

$password = "";       // change to db passward

$database = "ezdata";  // change to db name


$conn = new mysqli($host, $username, $password, $database);


// checking the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];


  
    // prevention from sql injection 
  
    $stmt = $conn->prepare("INSERT INTO user (name, email, password) VALUES (?, ?, ?)");

  
    // binding paremeters
  
    $stmt->bind_param("sss", $name, $email, $password);

  
    // statement exicution
    if ($stmt->execute()) {
        echo "Registration successful...";
    } else {
        echo "Error: " . $stmt->error;
        echo "SQL Error: " . $stmt->errno . " - " . $stmt->error;
    }


  //closing the statement
    $stmt->close();
    $conn->close();
}


?>
