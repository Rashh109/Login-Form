<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'user_db');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert user
$username = 'testuser';
$password = password_hash('testpassword', PASSWORD_DEFAULT);

$sql = "INSERT INTO users (username, password) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param('ss', $username, $password);

if ($stmt->execute()) {
    echo "User registered successfully.";
} else {
    echo "Error: " . $stmt->error;
}

$conn->close();
?>
