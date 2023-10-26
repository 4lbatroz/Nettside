<?php
$servername = "Norwagion_fragrenses";
$username = "Daniel";
$password = "Akademiet99";
$database = "database1";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    echo "Login successful. Redirect to your dashboard.";
} else {
    echo "Login failed. Please check your credentials.";
}

$conn->close();
?>
