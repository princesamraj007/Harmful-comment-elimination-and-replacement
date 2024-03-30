<?php
if (isset($_GET['username'])) {
    $variable = urldecode($_GET['username']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blacklisted</title>
    <style>
        body {
            background-image: url(http://localhost/login-register/images/santhosh.jpg);
            background-size: cover;
            background-repeat: no-repeat;
            
            
        }

        h1 {
            font-size: 3em;
            text-align: center;
        }

        p {
            font-size: 1.5em;
            text-align: center;
        }
        .background {
            background-color: rgba(255,255,255,0.5);
            padding: 20px;
            display: inl;
        }
    </style>
</head>
<body>
    
    
    
    <h1 style="padding: 20px; background-color: #fff; opacity: 75%;">
    <?php
    session_start();
    
        $uppercase_username = strtoupper($variable);
        echo "<p >Sorry " . $uppercase_username . "</p>";
    
    ?>
    You got blacklisted</h1>
    <p style="padding: 20px; background-color: #fff; opacity: 65%; font-size: 40px">We regret to inform you that due to repeated instances of toxic behavior in the comments section, you have been blacklisted from our platform. We understand the frustration this may cause and apologize for any inconvenience.

        Please note that this decision was made after multiple warnings were issued regarding your behavior. We strive to maintain a positive and respectful community environment for all users, and unfortunately, your actions were not in line with our guidelines.
        
        We value your presence in our community and believe in second chances. Should you wish to rejoin our platform, we ask that you adhere to our community guidelines and show respect towards others.
        
        Thank you for your understanding.</p>
</body>
</html>
