<?php
session_start();

function dbConnect() {
    $conn = new mysqli("sql309.infinityfree.com", "if0_35510034", "15NZ44uf0qs6uUL", "if0_35510034_web");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    // User is logged in
    $loginLinkText = "Liked"; // Change the text for logged-in users
    $logoutOption = logout();



    
} else {
    // User is not logged in
    $loginLinkText = "<a href=\"/log-in/log-in.php \">Sign in </a>"; // Default text for login link

}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Perform input validation and sanitation before querying the database

    // Your existing login logic
    // ...

    if (isset($_SESSION['user_id'])) {
        // User successfully logged in
        $loginLinkText = ' Liked '; // Change the text for logged-in users after login
        $logoutOption = logout();
    }
}

if (!isset($_SESSION['user_id'])) {
    echo "Please sign in.";
}

// Close the database connection when done
if (isset($conn)) {
    $conn->close();
}
?>
