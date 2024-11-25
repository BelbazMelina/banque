<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page directeur</title>
    <link rel="stylesheet" href="../vue/style/gabaritDi.css">
</head>
<body>
    <header>
            <img src="../vue/logoAwaBank.png" alt="">
    </header>
    <div class="conteneur">
        <?php echo $contenue ?>
        <p class="question">Qu'avez vous envie de faire ?</p>
        <form action="frontal.php" method="post">
            <div class="boutonOption">
                <div class="groupDroit">
                    <p>
                    <input type="submit" name="btnCreerEmployer"  value="Nouveau Employer">
                    </p> 
                    <p>
                        <input type="submit" name="ModifierEmployer"  value="Modifier employer">
                    </p>
                    <p>
                        <input type="submit"  name='CreerTypeContratouCompte'  value="+ type compte ou contrat">
                    </p>
                    <p>
                        <input type="submit"  name="SupprimerTypeCompte"  value="Supprimer Type Compte">
                    </p>
                </div>
                <div class="groupGauche">
                    <p>
                        <input type="submit" name="SupprimerTypeContrat"  value="Supprimer Type Contrat">
                    </p>
                    <p>
                    <input type="submit" name="modifierPiece"  value="Modifier Pieces">
                    </p> 
                    <p>
                        <input type="submit" name="statistique"  value="Stastique" requierd>
                    </p>
                   
                </div>
            </div>
            <p class="boutonDeconnexion"><input class="boutonDeconnexion2" type="submit" name="BoutonDeconnexion" value="Se deconnecter"></p>  
        </form>
    </div>
   
    
</body>
</html>