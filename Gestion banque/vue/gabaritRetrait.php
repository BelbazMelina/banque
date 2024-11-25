<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page retrait</title>
    <link rel="stylesheet" href="../vue/style/Gretrait.css">
</head>
<body>
    <header>
        <img src="../vue/logoAwaBank.png" alt="">
    </header>
    <div class="conteneur">
        <form action="frontal.php" method="post">
            <fieldset>
                <legend>Gestion de retrait</legend>
                <p>
                <label for="z">Entrer l'id du client :</label>
                <input type="text" class="zI" name="zoneIdpourRetrait" id="z" pattern="[0-9]+" 
                title="Veuillez entrer uniquement des chiffre de 0 à 9" autofocus>
                </p>
                <?php echo  $erreur ?>
                <p>
                    <input type="submit" name="bouttnValiderIdPourRetrait" value="Valider">
                    <input type="submit" name="rc" value="Acceuil">
                </p>
            </fieldset>
            <?php echo  $Scontenue?>
            <?php echo  $x?>
        </form>
        <style>
         
        </style>
</body>
</html>