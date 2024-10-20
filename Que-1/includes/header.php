<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="/user/assets/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<header>
    <h1>Shopping Cart</h1>
    <nav>
        <a href="/user/index.php">Home</a>
        <?php if (isset($_SESSION['user'])) { ?>
            <a href="/user/logout.php">Logout</a>
        <?php } else { ?>
            <a href="/user/login.php">Login</a>
            <a href="/user/register.php">Register</a>
        <?php } ?>
    </nav>
</header>
