<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'acceuil</title>
    <link rel="stylesheet" href="../vue/style/Acceuil1.css">
</head>
<body>
    <div class="main">
        <img class="xx" src="../vue/logoAwaBank.png" width="400px" alt="logo de awaBank">
        <div class="blocLogin">
            <div class="logo"><img src="../vue/image.png" width="100px" alt=""></div>
            <div>
                <form method="post" action="../controlleur/frontal.php">
                    <p>
                        <input type="text" name="login" placeholder="Login" autofocus maxlength="10" required>
                    </p>
                    <p>
                        <input type="password" name="password" placeholder="Password" maxlength="10" required>
                    </p>
                    <p class="boutonSecoonecter">
                        <input type="submit" name="boutonSeconnecter" value="Se connecter">
                    </p>
                    <?php echo $erreurConexion ?>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>