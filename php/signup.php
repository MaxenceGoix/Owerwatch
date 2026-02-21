<?php
session_start();
$message = '';

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        $conn = new PDO("mysql:host=db;dbname=app", "app", "app");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO Utilisateurs (Email, Password) VALUES ('$email', '$password')";
        $conn->exec($sql);
        $message = "<div class='success'>Compte créé avec succès ! Tu peux maintenant te connecter.</div>";
    } catch (PDOException $e) {
        $message = "<div class='error'>Erreur lors de la création : " . $e->getMessage() . "</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - OW Site</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body class="auth-page">

    <header>
        <nav>
            <ul class="menu-flex">
                <li class="logo-item"><a href="../html/index.html"><img src="../media/Logo.png" alt="Logo"></a></li>
                <li><a href="../html/index.html">Accueil</a></li>
                <li><a href="../html/apropos.html">Infos</a></li>
                <li><a href="../html/heros.html">Heros</a></li>
                <li><a href="../html/boutique.html">Boutique</a></li>
                <li class="connexion"><a href="signin.php">Sign in</a></li>
                <li class="connexion"><a href="signup.php">Sign up</a></li>
            </ul>
        </nav>
    </header>

    <main class="auth-container">
        <div class="auth-box">
            <h2>Créer un compte</h2>
            
            <?php echo $message; ?>
            
            <form action="signup.php" method="POST" class="auth-form">
                <div class="form-group">
                    <label for="email">Adresse Email</label>
                    <input type="text" name="email" placeholder="hero@overwatch.com" required>
                </div>

                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" name="password" required>
                </div>

                <button type="submit" class="shop-btn-large">S'inscrire</button>
                <p class="auth-switch">Déjà un compte ? <a href="signin.php">Connecte-toi ici</a>.</p>
            </form>
        </div>
    </main>

</body>
</html>