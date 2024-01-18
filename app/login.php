<?php

require_once 'vue/Input/Form.php';
require_once 'vue/Input/InputText.php';
require_once 'vue/Input/InputPassword.php';
require_once 'vue/Input/InputSubmit.php';


session_start();


if(isset($_SESSION['user_id'])) {
    header("Location: Acceuil.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $userExists = validateUser($username, $password);
    echo $userExists;
    if ($userExists) {
        $_SESSION['user_id'] = $username;
        header("Location: Acceuil.php");
        exit();
    } else {
        $errorMessage = "Identifiants incorrects";
    }
}

function validateUser($username, $password) {
    return $username === 'free' && $password === 'free';
}

$form = new Form('POST','login.php');
$form->addInput(new InputText('username', 'user','Nom d\'utilisateur', 'free','username'));
$form->addInput(new InputPassword('password', 'password','Mot de passe', 'free','password'));
$form->addInput(new InputSubmit('submit','submit' ,'Se connecter', 'Se connecter'));

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="vue/CSS/connexion.css">
    <title>Connexion</title>
</head>
<body>

<h1>Connexion</h1>

<?php
if (isset($errorMessage)) {
    echo "<p style='color: red;'>$errorMessage</p>";
}

echo $form->render();
?>


</body>
</html>
