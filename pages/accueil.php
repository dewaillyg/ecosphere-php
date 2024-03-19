<?php
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header('Location: ../index.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/accueil.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Ecosphere</title>
</head>
<body class="body">
    
    <header>
        <div class="top">
            <div class="header-content">
                <div class="icons">
                   <a href="./profil.php"> <i class="fa-solid fa-user"></i></a>
                </div>
            </div>
            <div class="header-content">
                <div class="menu">
                    <div class="burger-container">
                        <div class="burger"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom">
            <div class="xpbar">
                <div class="fond-vert"></div>
            </div>
        </div>

    </header>


    <div class="box-menu">

        <div class="title-menu"><h2>Animaux</h2></div>

        <div class="icones-menu animaux">
            <img src="../assets/animaux svg/papillon.svg" alt="">
            <img src="../assets/animaux svg/cerf.svg" alt="">
            <img src="../assets/animaux svg/chat.svg" alt="">
        </div>
        <div class="icones-menu animaux" id="animaux2">
            <img src="../assets/animaux svg/lapin.svg" alt="">
            <img src="../assets/animaux svg/renard.svg" alt="">
            <img src="../assets/animaux svg/ecureuil.svg" alt="">
        </div>
        
        <div class="title-menu"><h2>Accessoires</h2></div>
        
        <div class="icones-menu">
            <img src="../assets/accesseoires svg/guirlande.svg "alt="">
            <img src="../assets/accesseoires svg/nid.svg" alt="">
            <img src="../assets/accesseoires svg/noeud.svg" alt="">
        </div>

        
        <div class="title-menu"><h2>Fruits</h2></div>
        
            <div class="icones-menu">
                <img src="../assets/fruits svg/fruits-10.svg" alt="">
                <img src="../assets/fruits svg/fruits-11.svg" alt="">
                <img src="../assets/fruits svg/fruits-12.svg" alt="">
            </div>
    </div>


    <main>
        <!-- <img src="./assets/images_accueil/arbre.png" alt="Image d'un arbre"> -->
    </main>


    <footer>
        <div class="icons icons-2">
           <a href="./defis.html"> <img src="../assets/icones-footer/defis.svg" alt=""> </a>
        </div>
            <div class="icons icons-1">
               <a href="./accueil.php"> <img src="../assets/icones-footer/arbre.svg" alt=""> </a>
            </div>
            <div class="icons icons-3">
               <a href="./map.php"> <img src="../assets/icones-footer/maps.svg" alt=""> </a>
            </div>
    </footer>




    <div class="fond">
        <div class="arbre">

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="../script/accueil.js"></script>
</body>
</html>.