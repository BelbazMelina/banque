<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PageRecherId</title>
    <link rel="stylesheet" href="../vue/style/RechercheId.css">
</head>
<body>
   
<header>
        <img src="../vue/logoAwaBank.png" alt="">
    </header>
    <div class="conteneur">
        <form action="frontal.php"  method="post">
            <p>
                <label for="">Entrer nom du client :</label>
                <input type="text" name="NomDuClient" pattern="[a-zA-Z]+" title="Saisissez uniquement des lettres A-Z">
            </p>
            <p>
                <label for="">Entrer date de naissance du client :</label>
                <input type="date" name="date">
            </p>
            <p>
                <input type="submit" name="ValiderRecher" value="Valider">
                <input type="submit" name="rc" value="Acceuil">
            </p>
            <?php echo $erreur ?>
            <?php echo  $contenu?>
            <?php echo  $contenu1?>
            <?php echo  $contenu2?>
        </form>
    </div>
</body>
</html>