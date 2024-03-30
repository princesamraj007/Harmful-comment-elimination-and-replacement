<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["reg_username"];
    $email = $_POST["reg_email"];
    $password = $_POST["reg_password"];
    $otp = $_POST["stored_otp"];
    $cotp = $_POST["cotp"];

        echo $otp;
        echo $cotp;
        if ($cotp == $otp) {
            
            $servername = "localhost";
            $dbusername = "root";
            $dbpassword = "1234";
            $dbname = "policy_holders";

            $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO users (username, email, password, score) VALUES (?, ?, ?, 0)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sss", $username, $email, $hashedPassword);

            if ($stmt->execute()) {
                echo "Welcome, " . $username . "! Registration successful!";
                header("Location: ind.php/?username=$username");                
                exit();
            } else {
                echo "Error: " . $conn->error;
            }

            $stmt->close();
            $conn->close();
        } else {
            echo "Invalid OTP. Please try again.";
        }
     
        
        
    
}

