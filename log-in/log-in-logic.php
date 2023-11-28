<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    //Връзки
    $conn = new mysqli("sql11.freemysqlhosting.net", "sql11665896", "Mfc5Y2lNTe", "sql11665896"); 

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Данни 
    $sql = "SELECT id, username, password FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        // Потвърждаване на парола
        if (password_verify($password, $row["password"])) {
            $_SESSION["user_id"] = $row["id"];
            $_SESSION["username"] = $row["username "];
            readfile("D:/SaitOnline/server/Server/htdocs/index/index.php"); // Прехвърляне
            exit();
        } 
        else {
            echo "Incorrect password. <a href='/log-in/log-in.php'>Try again</a>.";
        }
    } 
    else {
        echo "User not found. <a href='/sign-up/sign-up.php'>Sign up</a> if you don't have an account.";
    }

    $stmt->close();
    $conn->close();
    
}
?>
