<?php

include '../PHP/setup/connectBDD.php';

session_start();

if (is_int($_SESSION['user_id'])) {
    $id = $_SESSION['user_id'];
    $sql = "SELECT username, mail, location, password  FROM user WHERE id_user = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    $user = $stmt->fetch();
} else if (isset($_SESSION['id_user'])) {
    $id = $_SESSION['id_user'];
    $sql = "SELECT username, mail, location, password  FROM user WHERE id_user = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    $user = $stmt->fetch();
} else {
    $id = $_SESSION['id'];
    $sql = "SELECT username, mail, location, password, id_user  FROM user WHERE username = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    $user = $stmt->fetch();
}

$error = "";

if ($user['location'] == "") {
    $user['location'] = "non défini";
}

if (isset($_POST['passwordCheck'])) {
    if (password_verify($_POST["passwordCheck"], $user['password'])) {
        var_dump($_SESSION);
        var_dump($_POST);
        if ($_POST['username'] != '') {
            $username = $_POST["username"];
        } else {
            $username = $user['username'];
        }
        if ($_POST['mail'] != '') {
            $mail = $_POST["mail"];
        } else {
            $mail = $user["mail"];
        }

        $id = $user['id_user'];
        
        $sql = "UPDATE user SET username = :username, mail = :mail WHERE id_user = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['username' => $username, 'mail' => $mail,'id' => $id]);
        $user = $stmt->fetch();
        $_SESSION['id'] = $username;

        header('Location: ./accueil.php');


    } else {
            $error = "Mot de passe incorrect !";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $username . " | profil"; ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="../styles/profil.css"/>
</head>
<body>
    <div id="error">
        <?php echo $error; ?>
    </div>
    <div id="return">
        <a href="./accueil.php">
            <i class="fa-regular fa-circle-xmark"></i>
        </a>
    </div>

    <div id="off">
        <a href="../PHP/deconnexion.php">
        <i class="fa-solid fa-power-off"></i>
        </a>
    </div>
    <header>
        <div class="header_top">
            <h1 class="title">
                <?php echo $user["username"]; ?>
            </h1>
        </div>
        <div class="header_bottom">
            <div class="avatar">
                <i class="fa-solid fa-user"></i>
            </div>
        </div>
    </header>
    <form action="./profil.php" method="POST">
        <main>
            <div class="username">
                <div class="left">
                    <i class="fa-solid fa-user"></i>    
                </div>
                <div class="right">
                    <input type="text" placeholder="<?php echo $user["username"] ?>" name="username" id="username" />
                </div>
            </div>
            <div class="mail">
                <div class="left">
                    <i class="fa-solid fa-envelope"></i>                </div>
                <div class="right">
                    <input type="email" placeholder="<?php echo $user['mail']; ?>" name="mail" id="mail" />
                </div>
            </div>
            <div class="localisation">
                <div class="left">
                    <i class="fa-solid fa-map"></i> 
                </div>
                <div class="right">
                    <input type="text" placeholder="<?php echo $user["location"]; ?>" name="location" id="location" />
                </div>
            </div>
            <div class="password">
                <div class="left">
                    <i class="fa-solid fa-lock"></i>                </div>
                <div class="right">
                    <input type="password" placeholder="Nouveau mot de passe" name="password" id="password" />
                    <i class="fa-solid eye fa-eye-slash"></i>
                </div>
            </div>
            <div class="confPassword">
                <div class="left">
                    <i class="fa-solid fa-lock"></i>                </div>
                <div class="right">
                    <input type="password" placeholder="Mot de passe actuel" name="passwordCheck" id="passwordCheck" />
                    <i class="fa-solid eye fa-eye-slash"></i>
                </div>
            </div>
        </main>
        <footer>
            <input type="submit" value="Editer" class="btn">
        </footer>
    </form>
    <script src="../script/profil.js"></script>
</body>
</html>