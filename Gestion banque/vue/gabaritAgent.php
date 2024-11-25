<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page acceuil Agent</title>
    <link rel="stylesheet" href="../vue/style/gabaritAgent.css">
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
                    <input type="submit" name="x1"  value="Synthese client">
                    </p> 
                    <p>
                        <input type="submit" name="boutonDepot"  value="Depot">
                    </p>
                    <p>
                        <input type="submit" name="boutonRetrait"  value="Retrait">
                    </p>
                </div>
                <div class="groupGauche">
                    <p>
                        <input type="submit"  name='boutonMofifierClient'  value="Modifier client">
                    </p>
                    <p>
                        <input type="submit" name="btnPrendreRDV"  value="Prendre rendez-vous">
                    </p>
                    <p>
                        <input type="submit"  name="rechercherId"  value="Rehercher id client">
                    </p>
                    <p>
                        <input type="submit" name="boutonPlanning"  value="Planning">
                    </p>
                </div>

            </div>
            <p class="boutonDeconnexion"><input type="submit" name="BoutonDeconnexionAgent" value="Se deconnecter"></p>  
        </form>
    </div>
</body>
</html>