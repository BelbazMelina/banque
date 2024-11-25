<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'inscription</title>
    <link rel="stylesheet" href="../vue/style/Inscription.css">
</head>
<body>
    <header>
        <img src="../vue/logoAwaBank.png" alt="">
    </header>
    <div class="conteneur">
        <h1>Procedons a votre inscription</h1>
        <form action="frontal.php" method="post">
            <fieldset><legend>Entrer les information du client</legend>
                <div class="main">
                    <div class="gd">
                        <p>
                            <label for="nom">Nom :</label>
                            <input type="text" id="nom" name="nom" placeholder="Entrer votre nom" pattern="[a-zA-Z]+" title="Saisissez uniquement des lettres A-Z">
                        </p>
                        <p>
                            <label for="prenom">Prenom :</label>
                            <input type="text" id="prenom" name="prenom" placeholder="Entrer votre prenom" pattern="[a-zA-Z]+" title="Saisissez uniquement des lettres A-Z">
                        </p>
                        <p>
                            <label for="Datedenaissance">Date de naissance :</label>
                            <input type="date" id="Datedenaissance" name="dateDeNaissance">
                        </p>
                        <p>
                            <label for="Adresse">Adresse :</label>
                            <input type="text" id="Adresse" name="Adresse" placeholder="Entrer votre adresse">
                        </p>
                        <p>
                            <label for="Numerodetel">Numero de tel :</label>
                            <input type="tel" id="Numerodetel" name="Numerodetel" placeholder="+33" maxlength="10" pattern="[0-9]+"  
                            title="Saisissez uniquement des chiffres de 0 à 9 ">
                        </p>
                
                    </div>
                    <div class="gg">
                        <p>
                            <label for="Email">Email :</label>
                            <input type="email" id="Email" placeholder="@gmail.com" name="Email"  
                            pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}"
                             title="Entrez une adresse email valide">
                        </p>
                        <p>
                            <label for="sf">Situation familiale :</label>
                            <select name="valeurSelect1" id="sf">
                                <option value="Celibataire">Celibataire</option>
                                <option value="Veuf(ve)">Veuf(ve)</option>
                                <option value="En couple">En couple</option>
                                <option value="Marié(e)">Marié(e)</option>
                                <option value="Divorcé(e)">Divorcé(e)</option>
                                <option value="Séparé(e)">Séparé(e)</option>
                                <option value="Union libre">Union libre</option>
                                <option value="Cohabitation">Cohabitation</option>
                                <option value="Autre">Autre </option>
                            </select>
                        </p>
                        <p>
                            <label for="">Profession :</label>
                            <select name="valeurSelect">
                                <option value="Etudiant">Etudiant</option>
                                <option value="Eleve">Eleve</option>
                                <option value="Enseignant">Enseignant</option>
                                <option value="Ingénieur">Ingénieur</option>
                                <option value="Entrepreneur">Entrepreneur</option>
                                <option value="Artiste">Artist</option>
                                <option value="Commercial ">Commercial</option>
                                <option value="Sans emploi">Sans emploi</option>
                                <option value="Autre">Autre </option>
                            </select>
                        </p>
                        <p>
                            <label for="">id Charger client :</label>
                            <input type="text" id="" size="2px" name="idChargerClient"  placeholder="Id" pattern="[0-9]+"  
                            title="Saisissez uniquement des chiffres de 0 à 9 ">
                        </p>
                        <p>
                            <label for="">Date d'inscription :</label>
                            <input type="date" id="" name="dateInscription">
                        </p>
                    </div>
                </div>
                <div class="btn">
                    <div><input type="submit" name="inscrireNC" value="InscrireNC"> </div>
                    <div class="anuller"><input type="submit" name="annuler" value="Annuler"></div>
                </div>
                <?php echo  $erreur ?>
                <?php echo  $contenu ?>
            </fieldset>
        </form>
    </div>
</body>
</html>