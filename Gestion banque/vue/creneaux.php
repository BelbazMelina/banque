<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../vue/style/BlcCrenaux.css">
</head>
<body>
    <header>
        <img src="../vue/logoAwaBank.png" alt="">
    </header>
    <div class="conteneur">
        <form action="frontal.php"  method="post">
            <h1>Blocage de crenaux</h1>
            <p>
                <label for="">Entrer votre id :</label>
                <input type="text" name="id" placeholder="Id" size="15px" pattern="[0-9]+"  
                title="Saisissez uniquement des chiffres de 0 à 9 ">
            </p>
            <p>
                <label for="">Motif d'indisponibilite :</label>
                <input type="text" name="motif" placeholder="Ex : malade" size="15px" >
            </p>
            <p>
                <label for="">Date :</label>
                <input type="date" name="date" size="15px">
            </p>
            <p>
                <label for="">Heure :</label>
                <input type="time" name="heure"  size="15px"  step="3600">
            </p>
            <p><input type="submit" name="bloquer" value="Bloquer"> <input type="submit" 
            name="annuler" value="Retour acceuil"></p>
            <?php echo $contenu ?>
            <?php echo $contenu1 ?>
        </form>
        <style>
           
        </style>
    </div>
</body>
</html>