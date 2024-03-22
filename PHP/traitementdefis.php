<?php

include './setup/connectBDD.php';

session_start();

if (is_int($_SESSION['user_id'])) {
    $id = $_SESSION['user_id'];
    $sql = "SELECT level_user  FROM user WHERE id_user = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    $user = $stmt->fetch();
} else if (isset($_SESSION['id_user'])) {
    $id = $_SESSION['id_user'];
    $sql = "SELECT level_user  FROM user WHERE id_user = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    $user = $stmt->fetch();
} else {
    $id = $_SESSION['id'];
    $sql = "SELECT level_user  FROM user WHERE username = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    $user = $stmt->fetch();
}

echo $user['level_user'];

?>