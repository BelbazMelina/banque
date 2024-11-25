<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page modifier client</title>
    <link rel="stylesheet" href="../vue/style/Client.css">
</head>
<body>
    <header>
        <img src="../vue/logoAwaBank.png" alt="">
    </header>
    <div class="conteneur">
        <form action="frontal.php"  method="post">
            <fieldset>
                <legend>Modifier un client</legend>
                <p>
                <label for="z">Entrer l'id du client :</label>
                <input class="zone" type="text" name="zoneIdpourModification" id="z">
                </p>
                <?php echo  $erreur ?>
                <p>
                    <input type="submit" name="bouttnValiderIdModification" value="Valider">
                    <input type="submit" name="rc" value="Acceuil">
                </p>
            </fieldset>
            <fieldset>
                <legend>Informations du client</legend>
                <?php echo $contenue ?>
                <?php echo $erreur1?>
        </fieldset>
    
        </form>
    </div>
    <style>
        .xx{
            width: 90px;
        }
        .z1{
            border-radius: 10px;
        }
        .btnModif{
            border-radius: 10px;
            border: 1px solid black;
            background-color: rgba(136, 147, 81, 0.51);
            color: white;
        }
        .x1{
            width: 98px;
            border-radius: 1px;
        }
        .xxs{
            width: 15px;
        }
        .erreur{
            color: red;
    
        }
        .fieldsetErreur{
            width: 250px;
        }
        .erreurId{
            color: red;
        }
    </style>
     <script>
        function modif(){
            chaine='<form action="frontal.php" method="post"><p>'+
            '<input class="x1" type="text" placeholder="Anciene adresse" name="ancienneAdresse" autofocus >'+
            ' <input class="x1" type="text" name="nouvelleAdresse" placeholder="Nouvelle adresse" >'+
            ' <input class="z1" type="submit" name="validerModif" value="valider">'+
            ' <input class="z1" type="submit" name="anuller" value="Annuler"</form></p>'
            document.getElementById('id1').innerHTML=chaine;
        }
    </script>
    
</body>
</html>