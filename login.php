<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $port = 3307;
    $servername = "localhost";
    $dbusername = "root";
    $dbpassword = "1234";
    $dbname = "policy_holders";

    
    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM users WHERE username = '$username' LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $hashedPassword = $row["password"];
        $score = $row["score"];

        if (password_verify($password, $hashedPassword)) {
            if ($score < 150) { 
                session_start(); // Start the session
                $_SESSION["username"] = $username; // Store the username in the session
                header("Location: http://127.0.0.1:5000/?username=$username");
                exit();
            } else {
                // Redirect to another page because score is >= 100
                header("Location: blacklist.php/?username=$username");
                exit();
            }
        } else {
            echo "Invalid credentials. Please try again.";
        }
    } else {
        echo "Invalid credentials. Please try again.";
    }

    $conn->close();
}

