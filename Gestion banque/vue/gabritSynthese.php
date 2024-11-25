<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page synthese Agent</title>
    <link rel="stylesheet" href="../vue/style/Synthes.css">
</head>
<body>
    <header>
        <img src="../vue/logoAwaBank.png" alt="">
    </header>
    <div>
        <form action="frontal.php" method="post">
            <p>
                <label for="z">Entrer l'id du client :</label>
                <input type="text" name="zoneIdpourSynthese"  autofocus>
            </p>
            <?php echo $erreur1 ?>
            <p>
                <input type="submit" name="bouttonSynthes" value="Synthese"> 
                <input type="submit" name="rc" value="Acceuil">
            </p>
           
        </form>
        <?php echo $contenue10 ?>
        <?php echo $contenue8 ?>
        <?php echo $contenue15 ?>
    </div>
    <style>
        
    </style>
</body>
</html>
