<?php

require_once 'Input/Form.php';
require_once 'Input/InputText.php';
require_once 'Input/InputPassword.php';
require_once 'Input/InputSubmit.php';




session_start(); // Démarrer la session

if(isset($_SESSION['user_id'])) {
    // Rediriger si l'utilisateur est déjà connecté
    header("Location: Accueil.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Traitement du formulaire de connexion
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Vous devez implémenter la logique de validation des informations d'identification ici
    // Vérification dans la base de données, par exemple
    $userExists = validateUser($username, $password);
    echo $userExists;
    if ($userExists) {
        // Enregistrez l'ID de l'utilisateur dans la session
        $_SESSION['user_id'] = $username; // Remplacez par l'ID réel de l'utilisateur

        // Rediriger vers la page d'accueil
        header("Location: Accueil.php");
        exit();
    } else {
        $errorMessage = "Identifiants incorrects";
    }
}

function validateUser($username, $password) {
    // Vous devez implémenter la logique de validation des informations d'identification ici
    // Vérification dans la base de données, par exemple
    // Remplacez par la logique réelle de validation des informations d'identification
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
