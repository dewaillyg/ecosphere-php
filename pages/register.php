<?php

session_start();

include('../PHP/setup/connectBDD.php');

$message = '';

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = $_POST['email'];

    $sql = "INSERT INTO user (mail, username, password) VALUES (:email, :username, :password)";
    $stmt = $pdo->prepare($sql);
    $result = $stmt->execute(['email' => $email, 'username' => $username, 'password' => $password]);

    if ($result) {
        $_SESSION['user_id'] = $_POST['username'];
        $message = 'Inscription réussie!';
        header('Location: question.php');
    } else {
        $message = 'Erreur lors de l\'inscription.';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style2.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Ecoshpere</title>
</head>
<body>
    <img class="logo" src="../assets/images/plogob.png" />
    <div class="wrapper">
        <form action="./register.php" method="POST">
        <h1 class="titre">Create an account</h1>
        <div class="input-box">
            <input type="text" placeholder="Create username"
            required name="username">
            <i class='bx bxs-user'></i>
        </div> 
        <div class="input-box">
            <input type="text" placeholder="Mail"
            required name="email">
            <i class='bx bx-envelope'></i>
        </div> 
        <div class="input-box">
            <input type="password"
            placeholder="Password" name="password" required>
            <i class='bx bx-lock-alt' ></i>
        </div>
        <div class="input-box">
            <input type="password"
            placeholder="Confirm password" name="password" required>
            <i class='bx bxs-lock-alt' ></i>
        </div>

        <input type="submit" value="S'inscrire" class="btn">
        
        </form>
</div>
</body>
</html>