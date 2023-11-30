<?php
session_start();

function dbConnect() {
    $conn = new mysqli("sql11.freemysqlhosting.net", "sql11665896", "Mfc5Y2lNTe", "sql11665896"); 
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
    $loginLinkText = "<a href=\"/log-in/log-in.php \"> Вписване </a>"; // Default text for login link

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
