<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page deppot</title>
    <link rel="stylesheet" href="../vue/style/Depot.css">
</head>
<body>
    <header>
        <img src="../vue/logoAwaBank.png" alt="">
    </header>
    <div class="conteneur">
        <form action="frontal.php"  method="post">
            <fieldset>
                <legend>Gestion de depot</legend>
                <p>
                <label for="z">Entrer l'id du client :</label>
                <input type="text" name="zoneIdpourDepot" id="z" pattern="[0-9]+"
                 title="Veuillez entrer uniquement des chiffre de 0 à 9 " autofocus>
                </p>
                <?php echo $erreur ?>
                <p>
                    <input type="submit" name="bouttnValiderIdPourDepot" value="Valider">
                    <input type="submit" name="rc" value="Acceuil">
                </p>
            </fieldset>
                <?php echo $Scontenue ?>
                <?php echo $x?>
        </form>
        <style>
            
        </style>
    </div>
</body>
</html>