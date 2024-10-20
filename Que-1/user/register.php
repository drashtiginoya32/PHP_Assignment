<?php
include('../includes/db.php');

// Validate reCAPTCHA
$secretKey = "6Lfo32AcAAAAAPcFf7bG9EXAMPLEKEY67890";  // Replace with your secret key
$responseKey = $_POST['g-recaptcha-response'];
$userIP = $_SERVER['REMOTE_ADDR'];

$captcha_url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&remoteip=$userIP";
$response = file_get_contents($captcha_url);
$responseData = json_decode($response);

if ($responseData->success) {
    // CAPTCHA was successfully verified
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
    // Insert user into the database
    $conn->query("INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')");
    
    echo "Registration successful. <a href='login.php'>Login here</a>";
} else {
    echo "CAPTCHA verification failed. Please try again.";
}
?>

<form action="login.php" method="post">
    <input type="text" name="username" placeholder="Username" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <div class="g-recaptcha" data-sitekey="your_site_key"></div>
    <button type="submit">Register</button>
</form>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
