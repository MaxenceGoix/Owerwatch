<?php
session_start();
$message = '';

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    /* Ceci permettra la connexion à la base de données */
    try {
        $pdo = new PDO("mysql:host=db;dbname=app;charset=utf8", "app", "app");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $pdo->prepare("SELECT * FROM Utilisateurs WHERE Email = :email AND Password = :password");
        $stmt->execute([
            'email' => $email,
            'password' => $password
        ]);

        $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($utilisateur) {
            $_SESSION['pseudo'] = $utilisateur['Email']; 
            $message = "Connexion réussie ! Bienvenue.";
        } else {
            $message = "Adresse email ou mot de passe incorrect.";
        }

    } catch (PDOException $e) {
        $message = "Erreur de connexion : " . $e->getMessage();
    }

    $_SESSION['pseudo'] = $email;
    $message = "Connexion réussie ! Bienvenue.";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In - OW Site</title>
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
            <h2>Identification</h2>
            <p><?php echo $message; ?></p>
            
            <form action="signin.php" method="POST" class="auth-form">
                <div class="form-group">
                    <label for="email">Adresse Email</label>
                    <input type="text" name="email">
                </div>

                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" name="password">
                </div>

                <button type="submit" class="shop-btn-large">Se connecter</button>
            </form>
        </div>
    </main>

</body>
</html>