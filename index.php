<?php

include("PHP/setup/connectBDD.php");

$message = '';

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        session_start();
        $_SESSION['user_id'] = $user['id_user'];
        header('Location: pages/accueil.php');
    } else {
        $message = 'Mauvais identifiants';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Ecoshpere</title>
</head>
<body>
    <img class="logo" src="assets/images/plogob.png" />
    <div class="wrapper">
        <form action="./index.php" method="POST">
        <h1 >Login</h1>
        <div class="input-box">
            <input type="text" name="username" placeholder="Username"
            required>
            <i class='bx bxs-user'></i>
        </div> 
        <div class="input-box">
            <input type="password"
            placeholder="Password" name="password" required>
            <i class='bx bxs-lock-alt' ></i>
        </div>

        <div class="remember-forgot">
            <a href="pages/password.html">Forgot password?</a>
        </div>

        <input type="submit" class="btn" value="Se connecter" />
        
        <div class="register-link">
            <p>Don't have an account ? <a href="pages/register.php">Register</a></p>
        </div>
        </form>
</div>
</body>
</html>