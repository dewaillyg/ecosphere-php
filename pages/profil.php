<?php

include '../PHP/setup/connectBDD.php';

session_start();

$username = $_SESSION['user_id'];

// afficher le level aussi ?
$sqlQuery = 'SELECT * FROM user WHERE username = :username';
$recipesStatement = $pdo->prepare($sqlQuery);
$recipesStatement->execute(['username' => $username]);
$recipes = $recipesStatement->fetchAll();

$user_data = array();

// On affiche chaque recette une à une
foreach ($recipes as $recipe) {
    $user_data["username"] = $recipe['username'];
    $user_data["mail"] = $recipe['mail'];
    $user_data["localisation"] = $recipe['localisation'];
    $user_data["numero"] = $recipe['numero'];
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/profil.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Ecosphere</title>
</head>
<body>
    <header>
        <div class="vide"></div>
        <div class="logo">
            <a href="accueil.php"><img src="../assets/images_accueil/logo.svg" alt=""></a> 
        </div>
        <div class="icons">
            <a href="../PHP/deconnexion.php"><i class="fa-solid fa-right-from-bracket"></i></a>
        </div>
    </header>
    <main class="wrapper">
        <form action="../PHP/traitementprofil.php" method="POST">
            
        <h1 >Profil</h1>
        <div class="top">
            <p>Actuel</p>
            <p>Modification</p>
        </div>
        <div class="input-box input_box_1">
        <p><?php echo $user_data["username"] ?></p>
            <input type="text" placeholder="pseudo"
            >
        </div> 

        <div class="input-box input_box_1">
        <p><?php if ($user_data["localisation"] == NULL) {
            echo 'vide';
        } else {
            echo $user_data["localisation"];    
        } ?></p>
            
            <input type="text" placeholder="Localisation"
            >
        </div> 

        <div class="input-box input_box_1">
        <p>
        <?php if ($user_data["numero"] == NULL) {
            echo 'vide';
        } else {
            echo $user_data["numero"];    
        } ?>
        </p>

            <input type="number" min="0000000000" max="9999999999" step="1" placeholder="téléphone"
            >
        </div> 
        <div class="input-box input_box_1">
        <p><?php echo $user_data["mail"] ?></p>

            <input type="email" placeholder="mail"
            >
        </div> 

        <div class="input-box">
            <input type="password"
            placeholder="Ancien mot de passe" >
        </div>

        <div class="input-box">
            <input type="password"
            placeholder="Nouveau mot de passe" >
        </div>

        <div class="input-box">
            <input type="password"
            placeholder="Confirmer nouveau mot de passe" >
        </div>

        <button type="submit" class="btn">Confirmer</button>
    
        
        </form>
    </main>
</body>
</html>