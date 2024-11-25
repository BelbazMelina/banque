<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pag conseiller</title>
    <link rel="stylesheet" href="../vue/style/Conseiller.css">
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
                    <input type="submit" name="btnNouveauCLient"  value="Nouveau Client">
                    </p> 

                    <p>
                    <input type="submit" name="btnNouveauContrat"  value="Nouveau contrat"> 
                    </p>
                    <?php echo  $erreur1 ?>
                   

                    <p>
                        <input type="submit" name="boutonOuvrirCompte"  value="Ouvrir un compte">
                    </p>
                    <?php echo  $erreur ?>
                       
                    <p>
                        <input type="submit" name="boutonPlanning"  value="Planning">
                    </p>
                </div>
                <div class="groupGauche">
                    <p>
                        <input type="submit"  name='boutonGestionDecouvert'  value="Gestion decouvert">
                    </p>

                    <p>
                        <input type="submit" name="boutonResilier"  value="Resilier">
                    </p>
                    <p>
                        <input type="submit"  name="boutonBloquerCreneaux"  value="BloquerCreneaux">
                    </p>

                </div>

            </div>
            <p class="boutonDeconnexion"><input type="submit" name="BoutonDeconnexion" value="Se deconnecter"></p>  
            
        </form>
    </div>
    
</body>
</html>