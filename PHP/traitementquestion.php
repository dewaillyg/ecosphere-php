<?php

session_start();

include('./setup/connectBDD.php');

$data = array();
$total = 0;
$l = "";       

foreach ($_GET as $key => $value) {
   array_push($data, substr($value, -1));
} 

for ($i = 0; $i < count($data); $i++) {
    $total += $data[$i];
}



if ($total >= 0 && $total < 12) {
    $l = "débutant";
    
} else if ($total >= 12 &&  $total < 18) {
    $l = "intermédiaire";
    
} else if ($total >= 18 && $total < 22) {
    $l = "expert";

}

$username = $_SESSION['user_id'];


$sql = "UPDATE user SET level_user = :l WHERE username = :username";
$stmt = $pdo->prepare($sql);
$stmt->execute(['username' => $username, 'l' => $l]);
$user = $stmt->fetch();


header('Location: ../pages/accueil.php');



?>