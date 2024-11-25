<?php
    function afficherAcceuil(){
        $erreur='';
        $erreur1='';
        $erreurConexion='';
        $contenue1='';
        require_once('gabritAcceuil.php');
    }
    function afficherAcceuilConseiller(){
        $contenue='';
        $erreur='';
        $erreur1='';
        require_once('gabaritConseiller.php');
    }
    // pour la page gestion de connexion
    function afficherErreurConnexion($msg){
        $erreurConexion='<p class="erreurConnexion">'.$msg.'</p>';
        require_once('gabritAcceuil.php');
    }
    function  afficherAcceuilAgent(){
        $contenue='';
        require_once('gabaritAgent.php');

    }
    // fin ----------

    // pour rediriger chaque employer sur son infarce personelle
    function afficherGabritDirecteur(){
        $contenue='<h1 class="message">Bonjour Mr le directeur</h1>';
        require_once('gabaritDirecteur.php');
    }
    function afficherGabritAgent($nom){
        $contenue='<h1 class="message">Bonjour Agent '.$nom.'</h1>';
        require_once('gabaritAgent.php');
    }
    function  afficherGabritConseiller($nom){
        $erreur1='';
        $erreur='';
        $contenue='<h1 class="message">Bonjour Conseiller '.$nom.'</h1>';
        require_once('gabaritConseiller.php');
    }
//     // fin -------------

//GESTION DE SYNTHESE


function afficherAceuilSynthese(){
    $contenue6='';
    $contenue5='';
    $contenue8='';
    $contenue1='';
    $erreur1='';
    $contenue2="";
    $contenue3="";
    $contenue4='';
    $contenue10='';
    $contenue7='';
    $contenue15='';
    require_once('gabritSynthese.php');
}

function afficherSyntheseClient($information,$contrats,$comptes){
    $contenue7='';
    $contenue8='';
    $contenue6='';
    $contenue5='';
    $contenue1="";
    $erreur1='';
    $contenue2="";
    $contenue10='';
    $contenue0='';
    $contenue15='';
    $contenue3='<table class="tab3"><tr><th colspan="4">liste des contrats du
     client</th></tr><tr><th>Id du contrat</th><th>nom du contrat</th><th>Mensualite</th>
     <th>Date douverture</th></tr>';
    $contenue4='<table class="tab2"><tr><th colspan="5">liste des comptes du
     client </th></tr><tr><th>Id du compte</th><th>nom du compte</th>
     <th>Decouvert autoriser</th><th>solde</th><th>Date d\'ouverture</th></tr>';
    $erreur1='';
    $contenue1='<table><tr><th colspan="11">Information du client</th><tr><th
    >Id du client</th><th>Nom</th><th>Prenom</th><th>Date de naissance</th><th>Adresse</th>
    <th>Numero de telephone</th><th>Email</th><th>Profession</th><th>Situation
    familiale</th><th>Charger client</th><th>Date d\'inscription</th></tr>
    <tr><td> '.$information->idClient .'</td> <td> '.$information->nom .'</td>  
    <td> '.$information->prenom .'</td> <td> '.$information->dateDeNaissance .'</td> 
    <td> '.$information->adresse .'</td> <td> '.$information->numeroTel .'</td> 
    <td> '.$information->email .'</td> <td> '.$information->profession .'</td> 
    <td> '.$information->situationFamiliale .'</td>  <td> '.$information->chargerClient 
    .'</td>  <td> '.$information->dateInscription .'</td> </table>';

    foreach($contrats as $ligne){
        $contenue2.='<tr><td>'.$ligne->idContrat.'</td><td>'.$ligne->nomducontrat.'</td>
        <td>'.$ligne->Mensualite.'</td><td>'.$ligne->dateouverture.'</td></tr>';
    }
    $contenue3.=$contenue2.'</table>';

    foreach($comptes as $ligne){
        $contenue0.='<tr><td>'.$ligne->idCompte.'</td><td>'.$ligne->nomducompte.'</td>
        <td>'.$ligne->Decouvertautoriser.'</td><td>'.$ligne->solde.'</td><td>'.$ligne->Dateouverture.'</tr>';
    }
    $contenue4.=$contenue0.'</table>';
    $contenue10='<form><fieldset><legend>Synthese du Client</legend>'.$contenue1.'<p>
    </p>'.$contenue3.'<p></p>'.$contenue4.'</fieldset></form>';
    require_once('gabritSynthese.php');
}
function afficherSyntheseSansContratSansCompte($information){
    $contenue7='';
    $contenue8='';
    $contenue6='';
    $contenue5='';
    $contenue1="";
    $erreur1='';
    $contenue2="";
    $contenue10='';
    $contenue0='';
    $contenue15='';
    $contenue5='<table><tr><th colspan="11">Information du client</th><tr><th>Id du client
    </th><th>Nom</th><th>Prenom</th><th>Date de naissance</th><th>Adresse</th>
    <th>Numero de telephone</th><th>Email</th><th>Profession</th><th>Situation familiale
    </th><th>Charger client</th><th>Date d\'inscription</th></tr>
    <tr><td> '.$information->idClient .'</td> <td> '.$information->nom .'</td>  
    <td> '.$information->prenom .'</td> <td> '.$information->dateDeNaissance .'</td> 
    <td> '.$information->adresse .'</td> <td> '.$information->numeroTel .'</td> <td> 
    '.$information->email .'</td> <td> '.$information->profession .'</td> 
    <td> '.$information->situationFamiliale .'</td>  <td> '.$information->chargerClient .
    '</td>  <td> '.$information->dateInscription .'</td> </table>';

    $contenue6='<table class="tab4"><tr><th>Liste des contrats du client</th></tr><tr><th>
    Ce client n\'a pas encore de contrats</th></tr></table>';
    $contenue7='<table class="tab4"><tr><th>Liste des comptes du client</th></tr><tr><th>
    Ce client n\'a pas encore de comptes</th></tr></table>';
    $contenue8='<form><fieldset><legend>Synthese du Client</legend>'.$contenue5.
    '<p></p>'.$contenue6.'<p></p>'.$contenue7.'</fieldset></form>';

    require_once('gabritSynthese.php');
}
function afficherSyntheseSansContrat($information,$comptes){
    $contenue7='';
    $contenue0='';
    $contenue4='';
    $contenue8='';
    $contenue6='';
    $contenue5='';
    $contenue1="";
    $erreur1='';
    $contenue2="";
    $contenue10='';
     $contenue4='<table class="tab2"><tr><th colspan="5">liste des comptes du 
     client </th></tr><tr><th>Id du compte</th><th>nom du compte</th><th>Decouvert 
     autoriser</th><th>solde</th><th>Date d\'ouverture</th></tr>';
    $contenue15='';
    $contenue5='<table><tr><th colspan="11">Information du client</th><tr><th>Id 
    du client</th><th>Nom</th><th>Prenom</th><th>Date de naissance</th><th>Adresse</th>
    <th>Numero de telephone</th><th>Email</th><th>Profession</th><th>Situation 
    familiale</th><th>Charger client</th><th>Date d\'inscription</th></tr>
    <tr><td> '.$information->idClient .'</td> <td> '.$information->nom .'</td>  
    <td> '.$information->prenom .'</td> <td> '.$information->dateDeNaissance .'</td> 
    <td> '.$information->adresse .'</td> <td> '.$information->numeroTel .'</td> 
    <td> '.$information->email .'</td> <td> '.$information->profession .'</td> 
    <td> '.$information->situationFamiliale .'</td>  <td> '.$information->chargerClient .
    '</td>  <td> '.$information->dateInscription .'</td> </table>';
    $contenue6='<table class="tab4"><tr><th>Liste des contrats du client</th></tr><tr><th>
    Ce client n\'a pas encore de contrats</th></tr></table>';
    foreach($comptes as $ligne){
        $contenue0.='<tr><td>'.$ligne->idCompte.'</td><td>'.$ligne->nomducompte.'</td>
        <td>'.$ligne->Decouvertautoriser.'</td><td>'.$ligne->solde.'</td><td>'.$ligne->Dateouverture.'</tr>';
    }
    $contenue4.=$contenue0.'</table>';
    $contenue10='<form><fieldset><legend>Synthese du Client</legend>'.$contenue5.'<p>
    </p>'.$contenue6.'<p></p>'.$contenue4.'</fieldset></form>';
    require_once('gabritSynthese.php');
}
function afficherSyntheseSansCompte($information,$contrats){
    $contenue7='';
    $contenue0='';
    $contenue4='';
    $contenue8='';
    $contenue6='';
    $contenue5='';
    $contenue1="";
    $erreur1='';
    $contenue3='<table class="tab3"><tr><th colspan="4">liste des contrats du client</th>
    </tr><tr><th>Id du contrat</th><th>nom du contrat</th><th>Mensualite</th><th>Date douverture</th></tr>';
    $contenue2="";
    $contenue10='';
     $contenue4='<table class="tab2"><tr><th colspan="5">liste des comptes du client </th>
     </tr><tr><th>Id du compte</th><th>nom du compte</th><th>Decouvert autoriser</th><th>solde</th><th>Date d\'ouverture</th></tr>';
    $contenue15='';
    $contenue5='<table><tr><th colspan="11">Information du client</th><tr>
    <th>Id du client</th><th>Nom</th><th>Prenom</th><th>Date de naissance</th><th>Adresse</th>
    <th>Numero de telephone</th><th>Email</th><th>Profession</th><th>Situation
     familiale</th><th>Charger client</th><th>Date d\'inscription</th></tr>
    <tr><td> '.$information->idClient .'</td> <td> '.$information->nom .'</td>  
    <td> '.$information->prenom .'</td> <td> '.$information->dateDeNaissance .'</td> 
    <td> '.$information->adresse .'</td> <td> '.$information->numeroTel .'</td> <td> 
    '.$information->email .'</td> <td> '.$information->profession .'</td> 
    <td> '.$information->situationFamiliale .'</td>  <td> '.$information->chargerClient 
    .'</td>  <td> '.$information->dateInscription .'</td> </table>';
    $contenue6='<table class="tab4"><tr><th>Liste des contrats du client</th></tr><tr><th>
    Ce client n\'a pas encore de comptes</th></tr></table>';
    foreach($contrats as $ligne){
        $contenue2.='<tr><td>'.$ligne->idContrat.'</td><td>'.$ligne->nomducontrat.
        '</td><td>'.$ligne->Mensualite.'</td><td>'.$ligne->dateouverture.'</td></tr>';
    }
    $contenue3.=$contenue2.'</table>';
    $contenue10='<form><fieldset><legend>Synthese du Client</legend>'.$contenue5.'<p>
    </p>'.$contenue3.'<p></p>'.$contenue6.'</fieldset></form>';
    require_once('gabritSynthese.php');
}
function  afficherErreurNiveauSynthes($msg){
    $contenue7='';
    $contenue6='';
    $erreur1='';
    $contenue1='';
    $contenue8='';
    $contenue2="";
    $contenue3="";
    $contenue4='';
    $contenue10='';
    $contenue15='';
    $erreur1='<p class="erreur">'.$msg.'</p>';
    require_once('gabritSynthese.php');  
}
//FIN/////////////////////////////////////////////////////////////////////////

// gestion modification  client
function  afficherAceuilModifierClient(){

    $contenue='';
    $erreur='';
    $erreur1='';
    $contenue1='';
    $contenuex="";
    require_once('gabaritNodifierClient.php');
}
function  afficherErreurId($msg){
    // $ccc="";
    $contenue='';
    $contenue1='';
    $erreur='';
    $erreur1='';
    $contenue1='';
    $contenuex="";
    $erreur='<p class="erreurId">'.$msg.'</p>';
    require_once('gabaritNodifierClient.php');
}
function afficherInformation($information){
    // $ccc="";
    $contenue='';
    $contenue1='';
    $erreur='';
    $erreur1='';
    $contenuex="";
    $contenue='<form action="frontal.php" method="post">
    <p><p><label for="">Id du client concerner :</label> <input class="xxs"
     type="texte" name="idClient" value="'.$information->idClient.'" readonly> </p>
    <p><label for="">Adresse :</label> <input class="xx" type="texte" name="adresse" 
    value="'.$information->adresse.'" readonly> 
    <input  class="btnModif" type="submit" name="modifierAdresse"  value="Modifier" 
    onclick="modif()"  ></p><p><label for="">Email : </label> <input type="text" name="email" value="'.$information->email.'" readonly> 
    <input class="btnModif" type="submit" name="modifEmail2" value="Modifier"></p>
    <p><label for="">Numero de Tel : </label> <input class="xx" type="texte" 
    name="adresse" value="'.$information->numeroTel.'" readonly>   <input class="btnModif" 
    type="submit" name="modifierNumeroTel" value="Modifier"></p>
    <p><label for="">Profession : </label> <input class="xx" type="texte" name="adresse" 
    value="'.$information->profession.'" readonly>   <input class="btnModif" type="submit" 
    name="modifierProfession" value="Modifier"></p><p><label for="">Situation familiale: 
    </label> <input class="xx" type="texte" nam="adresse" value="'.$information->situationFamiliale.
    '" readonly>   <input class="btnModif" type="submit" name="modifierSituation" value="Modifier"></p>
    </form>';
    require_once('gabaritNodifierClient.php');
}

function afficherErreurModification($msg){
    $contenue='';
    $contenue1='';
    $erreur='';
    $erreur1='';
    $contenuex="";
    $erreur1='';
    $erreur1='<p>'.$msg.'</p>';
    require_once('gabaritNodifierClient.php');
}

function  afficherMiseAjourAdresse($information){ // Pour la  modification de l'adresse
    $contenue='';
    $contenue1='';
    $erreur='';
    $erreur1='';
    $contenuex="";
    $contenue1='<form action="frontal.php" method="post"><p>
    <input class="x1" type="text" name="nouvelleAdresse" placeholder="Nouvelle adresse" pattern="[a-zA-Z]+" title="Saisissez uniquement des lettres A-Z">
    <input class="z1" type="submit" name="validerModifAdress" value="valider">
    <input class="z1" type="submit" name="anuller" value="Annuler"></form></p>';
    $contenue='<form action="frontal.php" method="post">
    <p><p><label for="">Id du client concerner :</label> <input class="xxs" type="texte" 
    name="idClient" value="'.$information->idClient.'" readonly> </p>
    <p><label for="">Adresse :</label> <input class="xx" type="texte" name="adresse" 
    value="'.$information->adresse.'" readonly>
    <input  class="btnModif" type="submit" name="modifierAdresse"  value="Modifier"   ></p>
    <p>'.$contenue1.'</p>
    <p><label for="">Email : </label> <input class="xx" type="texte" name="email" 
    value="'.$information->email. '" readonly>  <input class="btnModif" type="submit" 
    name="modifierEmail" value="Modifier"></p>
    <p><label for="">Numero de Tel : </label> <input class="xx" type="texte" 
    name="numeroTel" value="'.$information->numeroTel.'" readonly>   <input 
    class="btnModif" type="submit" name="modifierNumeroTel" value="Modifier"></p>
    <p><label for="">Profession : </label> <input class="xx" type="texte" 
    name="profesion" value="'.$information->profession.'" readonly>   
    <input class="btnModif" type="submit" name="modifierProfession" value="Modifier"></p>
    <p><label for="">Situation familiale: </label> <input class="xx" type="texte" 
    name="situationF" value="'.$information->situationFamiliale.'" readonly> 
      <input class="btnModif" type="submit" name="modifierSituation" value="Modifier"></p>
    </form>';
    require_once('gabaritNodifierClient.php');
}

function  afficherZoneModifEmail($information){ //pour la modification de l'email
    // $ccc="";
    $contenue='';
    $contenue1='';
    $erreur='';
    $erreur1='';
    $contenuex="";
    $contenue1='<form action="frontal.php" method="post"><p>
    <input class="x1" type="email" name="m1" placeholder="Nouvel email" 
    pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" title="Entrez une adresse email valide" >
    <input class="z1" type="submit" name="validerModifEmail" value="valider">
    <input class="z1" type="submit" name="anuller" value="Annuler"></form></p>';
    $contenue='<form action="frontal.php" method="post">
    <p><p><label for="">Id du client concerner :</label> <input class="xxs"
     type="texte" name="idClient" value="'.$information->idClient.'" readonly> </p>
    <p><label for="">Adresse :</label> <input class="xx" type="texte" name="adresse" 
    value="'.$information->adresse.'" readonly><input  class="btnModif" type="submit"
     name="modifierAdresse"  value="Modifier" ></p><p><label for="">Email : </label>
      <input class="xx" type="texte" name="email" value="'.$information->email.'" readonly > 
      <input class="btnModif" type="submit" name="modifierEmail" value="Modifier"></p>
    <p>'.$contenue1.'</p><p><label for="">Numero de Tel : </label> <input class="xx" 
    type="texte" name="numeroTel" value="'.$information->numeroTel.'" readonly>  
     <input class="btnModif" type="submit" name="modifierNumeroTel" value="Modifier"></p>
    <p><label for="">Profession : </label> <input class="xx" type="texte"
     name="profesion" value="'.$information->profession.'" readonly>   
     <input class="btnModif" type="submit" name="modifierProfession" value="Modifier"></p>
    <p><label for="">Situation familiale: </label> <input class="xx" type="texte" 
    name="situationF" value="'.$information->situationFamiliale.'" readonly>   
    <input class="btnModif" type="submit" name="modifierSituation" value="Modifier">
    <input type="submit" name="rc" value="Acceuil"></p>
    </form>';
    require_once('gabaritNodifierClient.php');
}

function afficherZoneModifNumTel($information){ //Pour la modification du numero de tel
    $contenue='';
    $contenue1='';
    $erreur='';
    $erreur1='';
    $contenuex="";
    $contenue1='<form action="frontal.php" method="post"><p>
    <input class="x1" type="text" name="nouveauNumTel" placeholder="Nouveau Numero" " 
    maxlength="10" pattern="[0-9]+"  title="Saisissez uniquement des chiffres de 0 à 9 " >
    <input class="z1" type="submit" name="validerModifNumtel" value="valider">
    <input class="z1" type="submit" name="anuller" value="Annuler"></form></p>';
    $contenue='<form action="frontal.php" method="post">
    <p><p><label for="">Id du client concerner :</label> <input class="xxs" 
    type="texte" name="idClient" value="'.$information->idClient.'" readonly> </p>
    <p><label for="">Adresse :</label> <input class="xx" type="texte" name="adresse" 
    value="'.$information->adresse.'" readonly>
    <input  class="btnModif" type="submit" name="modifierAdresse"  value="Modifier" ></p>
    <p><label for="">Email : </label> <input class="xx" type="texte" name="email" 
    value="'.$information->email. '" readonly>  <input class="btnModif" type="submit" 
    name="modifierEmail" value="Modifier"></p>
    <p><label for="">Numero de Tel : </label> <input class="xx" type="texte" name="numeroTel" 
    value="'.$information->numeroTel.'" readonly>   <input class="btnModif" type="submit" 
    name="modifierNumeroTel" value="Modifier"></p><p>'.$contenue1.'</p>
    <p><label for="">Profession : </label> <input class="xx" type="texte" name="profesion" 
    value="'.$information->profession.'" readonly>   <input class="btnModif" type="submit"
     name="modifierProfession" value="Modifier"></p>
    <p><label for="">Situation familiale: </label> <input class="xx" type="texte" 
    name="situationF" value="'.$information->situationFamiliale.'" readonly>   
    <input class="btnModif" type="submit" name="modifierSituation" value="Modifier"></p>
    </form>';
    require_once('gabaritNodifierClient.php');

}
function  afficherZoneModifProfession( $information){ // pour la modification de la profession
    $contenue='';
    $contenue1='';
    $erreur='';
    $erreur1='';
    $contenuex="";
    $contenue1='<form action="frontal.php" method="post"><p>
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
    <input class="z1" type="submit" name="validerModifProfession" value="valider">
    <input class="z1" type="submit" name="anuller" value="Annuler"></form></p>';
    $contenue='<form action="frontal.php" method="post">
    <p><p><label for="">Id du client concerner :</label> <input class="xxs" type="texte" 
    name="idClient" value="'.$information->idClient.'" readonly> </p>
    <p><label for="">Adresse :</label> <input class="xx" type="texte" name="adresse" 
    value="'.$information->adresse.'" readonly>
    <input  class="btnModif" type="submit" name="modifierAdresse"  value="Modifier"   ></p>
    <p><label for="">Email : </label> <input class="xx" type="texte" name="email" 
    value="'.$information->email. '" readonly >  <input class="btnModif" type="submit" 
    name="modifierEmail" value="Modifier"></p><p><label for="">Numero de Tel : 
        </label> <input class="xx" type="texte" name="numeroTel" value="'.$information->numeroTel.'" 
        readonly>   <input class="btnModif" type="submit" name="modifierNumeroTel" value="Modifier"></p>
    <p><label for="">Profession : </label> <input class="xx" type="texte" name="profesion" value="'.$information->profession.'" readonly>   
    <input class="btnModif" type="submit" name="modifierProfession" value="Modifier"></p>
    <p>'.$contenue1.'</p><p><label for="">Situation familiale: </label> <input class="xx" type="texte" 
    name="situationF" value="'.$information->situationFamiliale.'" readonly>   <input class="btnModif" type="submit" 
    name="modifierSituation" value="Modifier"></p>
    </form>';
    require_once('gabaritNodifierClient.php');

}
function  afficherZoneModifSituationF( $information){ // pour la modification de la profession
    $contenue='';
    $contenue1='';
    $erreur='';
    $erreur1='';
    $contenuex="";
    $contenue1='<form action="frontal.php" method="post"><p>
        <select name="valeurSelect">
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
    <input class="z1" type="submit" name="validerModifSituationF" value="valider">
    <input class="z1" type="submit" name="anuller" value="Annuler"></form></p>';
    $contenue='<form action="frontal.php" method="post">
    <p><p><label for="">Id du client concerner :</label> <input class="xxs" type="texte" 
    name="idClient" value="'.$information->idClient.'" readonly> </p>
    <p><label for="">Adresse :</label> <input class="xx" type="texte" name="adresse" 
    value="'.$information->adresse.'" readonly>
    <input  class="btnModif" type="submit" name="modifierAdresse"  value="Modifier"   ></p>
    <p><label for="">Email : </label> <input class="xx" type="texte" name="email" 
    value="'.$information->email. '" readonly >  <input class="btnModif" type="submit" 
    name="modifierEmail" value="Modifier"></p><p><label for="">Numero de Tel : 
        </label> <input class="xx" type="texte" name="numeroTel" value="'.$information->numeroTel.'" 
        readonly>   <input class="btnModif" type="submit" name="modifierNumeroTel" value="Modifier"></p>
    <p><label for="">Profession : </label> <input class="xx" type="texte" name="profesion" value="'.$information->profession.'" readonly>   
    <input class="btnModif" type="submit" name="modifierProfession" value="Modifier"></p>
 <p><label for="">Situation familiale: </label> <input class="xx" type="texte" 
    name="situationF" value="'.$information->situationFamiliale.'" readonly>   <input class="btnModif" type="submit" 
    name="modifierSituation" value="Modifier"></p>
    <p>'.$contenue1.'</p>
    </form>';
    require_once('gabaritNodifierClient.php');

}


function  afficherInformationXX( $information,$msg){
    $contenue='';
    $contenue1='';
    $erreur='';
    $erreur1='';
    $contenuex="";
    $contenue='<form action="frontal.php" method="post">
    <p><p><label for="">Id du client concerner :</label> <input class="xxs" type="texte" 
    name="idClient" value="'.$information->idClient.'" readonly> </p>
    <p><label for="">Adresse :</label> <input class="xx" type="texte" name="adresse" 
    value="'.$information->adresse.'" readonly>
    <input  class="btnModif" type="submit" name="modifierAdresse"  value="Modifier"   ></p>
    <p>'.$contenue1.'</p>
    <p><label for="">Email : </label> <input class="xx" type="texte" name="email" 
    value="'.$information->email. '" readonly>  <input class="btnModif" type="submit" 
    name="modifierEmail" value="Modifier"></p>
    <p><label for="">Numero de Tel : </label> <input class="xx" type="texte" 
    name="numeroTel" value="'.$information->numeroTel.'" readonly>   <input 
    class="btnModif" type="submit" name="modifierNumeroTel" value="Modifier"></p>
    <p><label for="">Profession : </label> <input class="xx" type="texte" 
    name="profesion" value="'.$information->profession.'" readonly>   
    <input class="btnModif" type="submit" name="modifierProfession" value="Modifier"></p>
    <p><label for="">Situation familiale: </label> <input class="xx" type="texte" 
    name="situationF" value="'.$information->situationFamiliale.'" readonly> 
      <input class="btnModif" type="submit" name="modifierSituation" value="Modifier"></p>
    </form> <table><fieldset class="fieldsetErreur"><legend>Notification derreur</legend><p class="erreur">'.$msg.'</p></fieldset></table>';
    
    require_once('gabaritNodifierClient.php');
}


function afficherAceuilRechercheId(){
    $contenu='';
    $contenu1='';
    $erreur='';
    $contenu2='';
    require_once('gabaritRechercheId.php');
}
function  afficherErreurRechercheId($msg){
    $contenu='';
    $contenu1='';
    $contenu2='';
    $erreur='<p class="erreur">'.$msg.'</p>';
    require_once('gabaritRechercheId.php');
}
function afficherZoneDePrecision(){
    $erreur='';
    $contenu1='';
    $contenu2='';
    $contenu='<form action="frontal.php" method="post"><p class="messageAlerte">En raison de 
    plusieurs client  ayant le meme nom et la  meme date de naissance ,</br>
     Veuillez entrer le numero de telephone  du client Pour plus de precision !</p> 
     <p><input type="text" name="numeroTel" pattern="[0-9]+"  
     title="Saisissez uniquement des chiffres de 0 à 9 " maxlength="10"></p>
     <p><input type="submit" name="precision" value="rechercher">
     <input type="submit" name="rc" value="Acceuil"></p></form>';
     require_once('gabaritRechercheId.php');
}
function afficherErreurZonePrecision($msg){
    $erreur='';
    $contenu1='';
    $contenu2='';
    $contenu='<form action="frontal.php" method="post"><p class="messageAlerte">En raison de 
    plusieurs client  ayant le meme nom et la  meme date de naissance ,</br>
     Veuillez entrer le numero de telephone  du client Pour plus de precision !</p> 
     <p><input type="text" name="numeroTel" pattern="[0-9]+"  
     title="Saisissez uniquement des chiffres de 0 à 9 " maxlength="10"></p>
     <p class="erreur">'.$msg.'</p>
     <p><input type="submit" name="precision" value="rechercher">
     <input type="submit" name="rc" value="Acceuil"></p></form>';
     require_once('gabaritRechercheId.php');
}
function afficherId($id){
    $contenu='';
    $erreur='';
    $contenu2='';
    $contenu1='<label>Id du client rechercher :</label><input class="id"  class="" type="text" value="'.$id->idClient.'">';
    require_once('gabaritRechercheId.php');

}
function afficherIdx($id,$num){
    $erreur='';
    $contenu='';
    $contenu1='';
    $contenu2='<p>Numero de telephone entrer : <input class="zN" type="text" name="numeroTel" value="'.$num.'" readonly>
    </p><label>Id du client rechercher :</label><input class="id" type="text" value="'.$id->idClient.'" readonly>
    <input type="submit" name="rc" value="Acceuil">';
    require_once('gabaritRechercheId.php');
}

//GESTION DEPOT ////////////////////////////////////////////////////////
function  afficherZoneDepot(){
    $x='';
    $contenue='';
    $Scontenue='';
    $erreur='';
    require_once('gabaritDepot.php');
}
function afficherErreur($msg){
    $x='';
    $contenue='';
    $Scontenue='';
    $erreur='<p class="erreur">'.$msg.'</p>';
    require_once('gabaritDepot.php');
}
function  afficherComptesClient($comptes){
    $x='';
    $erreur='';
    $contenue='';
    $Scontenue='<form action ="frontal.php" methode="post">
    <fieldset class="f1"><legend>Comptes du clients</legend>
    <label for="">Liste des comptes duc client:</label> <select name="listesCompte" >
    <option value=""></option>';
    foreach($comptes as $ligne){
        $contenue.='<option value="'.$ligne->idCompte.'">'.$ligne->nomducompte.'</option>';
    }
    $Scontenue.= $contenue.'</select> <input type="submit" name="procederDepot" value="Proceder au depot">
    <input type="submit" name="rc" value="Acceuil"></p>
    </fieldset></form>';
    require_once('gabaritDepot.php');

}
function fficherErreur($msg){
    $erreur='';
    $contenue='';
    $Scontenue='';
    $x='<form action="frontal.php" method="post"> <fieldset class="f2"><legend>Notification d\'erreur</legend>
    <p class="erreur">'.$msg.'</p><p class="erreurs">Cliquer sur <input type="submit" 
    name="Anouveau" value="Ok"> et entrer a nouveau l\'id du client  ou sur 
    <input type="submit" 
    name="anuuler" value="Annuler"> pour anuller l\'operation</p>
    <input type="submit" name="rc" value="Acceuil"></fieldset></form>';
    require_once('gabaritDepot.php');

}
function afficherZone2($idCompteChoisit,$solde){
    $x='';
    $erreur='';
    $contenue='';
    $Scontenue='<form action ="frontal.php" methode="post">
    <fieldset class="f2"><legend>Depot</legend>
    <div>
    <p><label>Id du compte choisit :<label><input class="I1" type="text" name="idChoisit" 
    value="'.$idCompteChoisit.'"><label class="g">Ancien solde :</label><input class="z" type="texte" 
    name="ancienSolde" value="'.$solde.' Euro"></p><p><label>Somme a deposer :</label>
     <input class="z" type="text" name="somme" pattern="[0-9]+"  title="Saisissez uniquement des chiffres de 0 à 9 " 
     autofocus> <label class="g">solde :</label><input class="z" type="text" name="" value="" > 
     <p><input type="submit" name="validerDepot" value="deposer"></p></div></fieldset></form>';
    
    require_once('gabaritDepot.php');
}
function test($idCompteChoisit,$solde,$somme){
    $x='';
    $erreur='';
    $contenue='';
    $Scontenue='<form action ="frontal.php" methode="post">
    <fieldset class="f2">
    <p><label>Id du compte choisit :<label><input readonly type="text" name="idChoisit" 
    value="'.$idCompteChoisit.'"><label class="g" >Ancien solde :</label><input class="z" type="texte" 
    name="ancienSolde" value="'.$somme.'" readonly></p><label>Somme a deposer :</label>
     <input type="text" name="somme" pattern="[0-9]+"  title="Saisissez uniquement des chiffres de 0 à 9 " 
     > <label class="g">solde :</label><input class="z" type="text" name="" value="'.$solde.' Euro" readonly> 
     <p class="validation">Depot valider ! vous pouvez a present observer votre nouveau solde .</p>
     <p><input type="submit" name="validerDepot" value="deposer">
     <input type="submit" name="rc" value="Acceuil"></p> </fieldset></form>';
    
    require_once('gabaritDepot.php');
}

function afficherErreurDepot($msg,$somme,$idCompteChoisit){
    $x='';
    $erreur='';
    $contenue='';
    $Scontenue='<form action ="frontal.php" methode="post">
    <fieldset class="f2">
    <p><label>Id du compte choisit :<label><input type="text" name="idChoisit" 
    value="'.$idCompteChoisit.'"> <label class="g">Ancien solde :</label><input class="g" type="texte" 
    name="ancienSolde" value="'.$somme.' Euro" readonly></p><label>Somme a deposer :</label>
     <input class="z"type="text" name="somme" pattern="[0-9]+"  title="Saisissez uniquement des chiffres de 0 à 9 " 
     > <label class="g">solde :</label><input class="z" type="text" name="" value="'.$somme.' Euro" readonly > 
     <p class="erreur">'.$msg.'</p>
     <p><input type="submit" name="validerDepot" value="deposer">
     <input type="submit" name="rc" value="Acceuil"></p></fieldset>';
    
    require_once('gabaritDepot.php');
}
// FIN ///////////////////////////////////////////////////////////////////////////////


//GESTION RETRAIT/////////////////////////////////////////////////////////////////////
function afficherZoneRetrait(){
    $x='';
    $Scontenue='';
    $erreur='';
    require_once('gabaritRetrait.php');
}
function  afficherErreurRetrait($msg){
    $x='';
    $Scontenue='';
    $erreur='
 <p class="erreur">'.$msg.'</p>';
    require_once('gabaritRetrait.php');
}

function afficherComptesClientx($comptes){
    $x='';
    $erreur='';
    $contenue='';
    $Scontenue='<form class="f1" action ="frontal.php" methode="post">
    <label for="">Liste des comptes duc client:</label> <select name="listesCompte" >
    <option value=""></option>';
    foreach($comptes as $ligne){
        $contenue.='<option value="'.$ligne->idCompte.'">'.$ligne->nomducompte.'</option>';
    }
    $Scontenue.= $contenue.'</select> <input type="submit" name="procederRetrait" 
    value="Proceder au retrait"</p>
    <input type="submit" name="rc" value="Acceuil"></form>';
    require_once('gabaritRetrait.php');
}
function afficherZone3($idCompteChoisit,$solde){
    $x='';
    $erreur='';
    $contenue='';
    $Scontenue='<form class="f1" action ="frontal.php" methode="post">
    <p><label>Id du compte choisit :</label><input class="zI" type="text" name="idChoisit" 
    value="'.$idCompteChoisit.'"> <label class="g">Ancien solde : </label> <input class="g" type="texte" 
    name="ancienSolde" value="'.$solde.'" readonly></p><p><label>Somme a retirer :</label>
     <input class="z" type="text" name="somme" pattern="[0-9]+"  title="Saisissez uniquement des chiffres de 0 à 9 " 
     autofocus><label class="g"> solde :</label><input class="z" type="text" name="" value=""> 
     <p><input type="submit" name="validerRetrait" value="retirer">
     <input type="submit" name="rc" value="Acceuil"></p></form>';
    
    require_once('gabaritRetrait.php');
}

function fficherErreurRetrait($msg){
    $erreur='';
    $contenue='';
    $Scontenue='';
    $x='<form class="f1" action="frontal.php" method="post"><fieldset><legend>Notification d\'erreur</legend>
    <p class="erreur">'.$msg.'</p><p>Cliquer sur <input type="submit" 
    name="nouveau" value="Ok"> et entrer a nouveau l\'id du client  ou sur 
    <input type="submit" 
    name="Anuuler" value="Annuler"> pour anuller l\'operation</p>
    <input type="submit" name="rc" value="Acceuil"></fieldset></form>';
    require_once('gabaritRetrait.php');

}
function afficherErreurRetrait2($msg,$somme,$idCompteChoisit){
    $x='';
    $erreur='';
    $contenue='';
    $Scontenue='<form class="f1" action ="frontal.php" methode="post">
    <p><label>Id du compte choisit :</label><input class="zI" type="text" name="idChoisit" 
    value="'.$idCompteChoisit.'"> <label class="g" >Ancien solde :</label> <input class="g" type="texte" 
    name="ancienSolde" value="'.$somme.'" readonly></p><p><label>Somme a deposer : </label>
     <input class="z" type="text" name="somme" pattern="[0-9]+"  title="Saisissez uniquement des chiffres de 0 à 9 " 
     > <label class="g">solde :</label><input class="z" type="text" name="" value="'.$somme.' Euro" readonly > 
     <input type="submit" name="validerRetrait" value="retirer"><p class="erreur">'.$msg.'</p>
     <p>
     <input type="submit"  name="boutonGestionDecouvert"  value="Gestion decouvert">
    </p>
     <input type="submit" name="rc" value="Acceuil"></form>';
    
    require_once('gabaritRetrait.php');

}
function test2($idCompteChoisit,$solde,$somme,){
    $x='';
    $erreur='';
    $contenue='';
    $Scontenue='<form class="f2" action ="frontal.php" methode="post">
   <p><label>Id du compte choisit :</label> <input readonly type="text" name="idChoisit" 
    value="'.$idCompteChoisit.'"readonly> 
    <label class="g">Ancien solde :<label> <input class="z" type="texte" name="ancienSolde" value="'.$somme.'" readonly></p>
    <p><label>Somme a Retirer :</label> <input class="z" type="text" name="somme" pattern="[0-9]+"  
    title="Saisissez uniquement des chiffres de 0 à 9 " 
     > <label class="g"> solde :</label> <input type="text" name="" value="'.$solde.' Euro" readonly> 
     <p class="validation">Retrait valider ! vous pouvez a present observer votre nouveau solde .</p>
     <p><input type="submit" name="validerRetrait" value="Retirer">
     <input type="submit" name="rc" value="Acceuil"></p></form>';
    
    require_once('gabaritRetrait.php');

}
//FIN/////////////////////////////////////////////////////////////////////////

//GESTION DE RENDEZ VOUS 
function afficherAcceuilRDv(){
    $contenue0='';
    $contenue='';
    $contenu2='';
    $contenu1='';
    $contenue='<form class="f1" action="frontal.php" method="post">
    <h1>Prise de rendez vous </h1>
    <p>
        Entrer lid du client : <input type="text" name="idclientPourRdv" pattern="[0-9]+"  
        title="Saisissez uniquement des chiffres de 0 à 9 ">
    </p>
    <p><input type="submit" name="vldpourIdRdv" value="valider"></p>
    <p>Vous netes pas encore client chez nous ? cliquer sur
     <input type="submit" name="pasClient" value="je suis nouveau">
     <input type="submit" name="rc" value="Acceuil"></p>
    </form>';
    require_once('gabaritRendezVous.php');
}
function afficherPriseRDVNouveau($motifrdv){
        $contenu1='';
        $contenu2='';
        $contenue='';
        $contenu0='';
        $contenuex='<select name="mrdvN">
        <option value=""></option>';
    
        foreach($motifrdv as $ligne){
            $contenu2.='<option value="'.$ligne->nomMotif.'">'.$ligne->nomMotif.'</option>';
        }
        $contenuex.= $contenu2.'</select>';
        $contenue='<form class="f1" action="frontal.php" method="post">
        <p>Numero tel :<input  type="text" name="telephone"  maxlength="10"pattern="[0-9]+"  
        title="Saisissez uniquement des chiffres de 0 à 9 " >
        <h4>Entrer une date et une heure de rendez vous pour le client ainsi que le motif.<h4>
        <p>Date :<input type="date" name="dateRdvN">  Heure :<input type="time" name="heureRdvN"  step="3600"></p>
        <p>Motif : '.$contenuex.'</p>
        <p><input type="submit" name="validerRdvN" value="valider le rendez vous">
        <input type="submit" name="rc" value="Acceuil"></p></form>';
        require_once('gabaritRendezVous.php');
}
function  AfficherErreurdRdvN($msg,$motifrdv){
    $contenu1='';
    $contenu2='';
    $contenue='';
    $contenu0='';
    $contenuex='<select name="mrdvN">
    <option value=""></option>';

    foreach($motifrdv as $ligne){
        $contenu2.='<option value="'.$ligne->nomMotif.'">'.$ligne->nomMotif.'</option>';
    }
    $contenuex.= $contenu2.'</select>';
    $contenue='<form class="f1" action="frontal.php" method="post">
    <p>Numero tel :<input  type="text" name="telephone" maxlength="10"pattern="[0-9]+"  
    title="Saisissez uniquement des chiffres de 0 à 9 " ></p>
    <h4>Entrer une date et une heure de rendez vous pour le client ainsi que le motif.<h4>
    <p>Date :<input type="date" name="dateRdvN">  Heure :<input type="time" name="heureRdvN"  step="3600"></p>
    <p>Motif : '.$contenuex.'</p>
    <p><input type="submit" name="validerRdvN" value="valider le rendez vous">
    <input type="submit" name="rc" value="Acceuil"></p>
    <p class="erreur">'.$msg.'</p></form>';
    require_once('gabaritRendezVous.php');
}
function  afficherConfirmationRdvN($date,$heure,$motif,$infoConseiller,$numero, $pieces){
    $contenu1='';
    $contenu2='';
    $contenue0='';
    foreach($pieces as $ligne){
        $contenu2.='<p>'.$ligne->pieces.'</p>';
    }
    $contenue='<form class="f1" action="frontal.php" method="post">
    <h1>Recaputilatif de votre Rendez vous </h1>
    <p><strong>Numero tel :</strong>'.$numero.'</p>
    <p><strong>Motif :</strong>'.$motif.'</p>
    <p><strong>Conseiller charger :</strong>'.$infoConseiller->nom.' '.$infoConseiller->prenom.'</p>
    <p><strong>Date :</strong>'.$date.'</p>
    <p><strong>Heure :</strong>'.$heure.'</p>
    <p><strong>Pieces requis:</strong>'.$contenu2.'</p>
    <input type="submit" name="rc" value="Acceuil">';
    require_once('gabaritRendezVous.php');
}

// function  affihcerIdDesConseillerDispo($lesConseillerDipo,$date,$heure,$motif){
//     $contenu1='';
//     $contenue='';
//     $contenu2='';
//     $contenu0='';
//     $contenuex='';
//     foreach($lesConseillerDipo as $ligne){
//         $contenue.="$ligne.'>'.$ligne ";
//     }
//     require_once('gabaritRendezVous.php');
// }

function  afficherChargerClient($infoClient,$idChargerClient,$infoChargerClient){
    $contenue0='';
    $contenue='';
    $contenu1='';
    $contenu2='';
    $contenue='<form class="f1" action="frontal.php" method="post">
    <h1>Prise de rendez vous </h1>
    <p>
      <strong> Nom : </strong>'.$infoClient->nom.'
    </p>
    <p>
      <strong> Prenom : </strong>'.$infoClient->prenom.'
    </p>
    <p>
      <strong> Conseiller charger : </strong>'.$infoChargerClient->nom.' '.$infoChargerClient->prenom.'
    </p>
    <p><input class="x" type="text" name="idCharger" value="'.$infoChargerClient->idEmploye.'"></p>
    <p><input class="x" type="text" name="idC" value="'.$infoClient->idClient.'"></p>
    <p><input type="submit" name="afficherPlaning" value="Afficher planning du conseiller">
    <input type="submit" name="rc" value="Acceuil"></p>
    </form>';
    require_once('gabaritRendezVous.php');
}
function  afficherZonePlanning($infoChargerClient, $infoClient){
    $contenue0='';
    $contenue='';
    $contenu2='';
    $contenu1='';
    $contenue0='<p>Entrer une date :<input type="date" name="datePlng"></p>';
    $contenue='<form class="f1" action="frontal.php" method="post">
    <h1>Prise de rendez vous </h1>
    <p>
      <strong> Nom : </strong>'.$infoClient->nom.'
    </p>
    <p>
      <strong> Prenom : </strong>'.$infoClient->prenom.'
    </p>
    <p>
      <strong> Conseiller charger : </strong>'.$infoChargerClient->nom.' '.$infoChargerClient->prenom.'
    </p>
    <p><input class="x" type="text" name="idCharger2" value="'.$infoChargerClient->idEmploye.'"></p>
    <p><input class="x" type="text" name="idClient2" value="'.$infoClient->idClient.'"></p>
    <p>Entrer une date :<input type="date" name="datePlng">
    <input type="submit" name="planning" value="Afficher planning">
    <input type="submit" name="rc" value="Acceuil">
    </form>';
    require_once('gabaritRendezVous.php');
}

function afficherIndisponibilite($datesIndispo,$dateX,$x,$idClient,$idCharger){
    $contenu1='';
    $contenu2='';
    $contenue0='';
    $contenue='<form class="f1" action="frontal.php" method="post">
    <p><input class="x" type="text" name="idClientx" value="'.$idClient.'">
    <p><input class="x" type="text" name="idChargerx" value="'.$idCharger.'">
    </p><h1>Planning du conseiller pour la semaine du '.$dateX.'</h1><table>';
        $taille=count($datesIndispo);
        for($i=0; $i < $taille; $i++){
            $contenue0.="<tr><td>$datesIndispo[$i]</td></tr>";
        }
        $contenue.= $contenue0.'</table>
        <p><input type="submit" name="priseRdv" value="Prendre un rendez vous">
        <input type="submit" name="rc" value="Acceuil"></p>
        </form>';
    require_once('gabaritRendezVous.php');
   
}
function afficherZonePriseDerdv($idChargerx,$idClientx,$motifrdv){
    $contenu1='';
    $contenu2='';
    $contenu0='';
    $contenuex='<select name="mrdv">
    <option value=""></option>';

    foreach($motifrdv as $ligne){
        $contenu2.='<option value="'.$ligne->nomMotif.'">'.$ligne->nomMotif.'</option>';
    }
    $contenuex.= $contenu2.'</select>';
    $contenue='<form class="f1" action="frontal.php" method="post">
    <p><input class="x" type="text" name="idClientx2" value="'.$idClientx.'">
    <p><input class="x" type="text" name="idChargerx2" value="'.$idChargerx.'">
    <h4>Entrer une date et une heure de rendez vous pour le client ainsi que le motif.<h4>
    <p>Date :<input type="date" name="dateRdv">  Heure :<input type="time" name="heureRdv"  step="3600" ></p>
    <p>Motif : '.$contenuex.'</p>
    <p><input type="submit" name="validerRdv" value="valider le rendez vous">
    <input type="submit" name="rc" value="Acceuil"></p></form>';
    require_once('gabaritRendezVous.php');
}
function  afficherConfirmatifRdv($pieces,$information,$infoConseiller,$date,$heure,$motif){
    $contenu1='';
    $contenu2='';
    $contenue0='';
    foreach($pieces as $ligne){
        $contenu2.='<p>'.$ligne->pieces.'</p>';
    }
    $contenue='<form class="f1" action="frontal.php" method="post">
    <h1>Recaputilatif de votre Rendez vous </h1>
    <p><strong>Nom :</strong>'.$information->nom.'</p>
    <p><strong>Prenom :</strong>'.$information->prenom.'</p>
    <p><strong>Motif :</strong>'.$motif.'</p>
    <p><strong>Conseiller charger :</strong>'.$infoConseiller->nom.' '.$infoConseiller->prenom.'</p>
    <p><strong>Date :</strong>'.$date.'</p>
    <p><strong>Heure :</strong>'.$heure.'</p>
    <p><strong>Pieces requis:</strong>'.$contenu2.'</p>
    <input type="submit" name="rc" value="Acceuil">';
    require_once('gabaritRendezVous.php');
}
function afficherErreurrr($msg,$idChargerx,$idClientx,$motifrdv){
    $contenu1='';
    $contenu2='';
    $contenu0='';
    $contenuex='<select name="mrdv">
    <option value=""></option>';

    foreach($motifrdv as $ligne){
        $contenu2.='<option value="'.$ligne->nomMotif.'">'.$ligne->nomMotif.'</option>';
    }
    $contenuex.= $contenu2.'</select>';
    $contenue='<form class="f1" action="frontal.php" method="post">
    <p><input class="x" type="text" name="idClientx2" value="'.$idClientx.'">
    <p><input class="x" type="text" name="idChargerx2" value="'.$idChargerx.'">
    <h4>Entrer une date et une heure de rendez vous pour le client ainsi que le motif.<h4>
    <p>Date :<input type="date" name="dateRdv">  Heure :<input type="time" name="heureRdv" step="3600"></p>
    <p>Motif : '.$contenuex.'</p>
    <p><input type="submit" name="validerRdv" value="valider"></p>
    <p class="erreur">'.$msg.'</p>
    <input type="submit" name="rc" value="Acceuil"></form>';
    require_once('gabaritRendezVous.php');
}
      
function AfficherErreurdateRDV($msg,$infoChargerClient, $infoClient){
    $contenue0='';
    $contenue='';
    $contenu1='';
    $contenue0='<p>Entrer une date :<input type="date" name="datePlng"></p>';
    $contenue='<form class="f1" action="frontal.php" method="post">
    <h1>Prise de rendez vous </h1>
    <p>
      <strong> Nom : </strong>'.$infoClient->nom.'
    </p>
    <p>
      <strong> Prenom : </strong>'.$infoClient->prenom.'
    </p>
    <p>
      <strong> Conseiller charger : </strong>'.$infoChargerClient->nom.' '.$infoChargerClient->prenom.'
    </p>
    <p><input class="x" type="text" name="idCharger2" value="'.$infoChargerClient->idEmploye.'"></p>
    <p><input class="x" type="text" name="idClient2" value="'.$infoClient->idClient.'"></p>
    <p>Entrer une date :<input type="date" name="datePlng">
    <p class="erreur">'.$msg.'</p>
    <input type="submit" name="planning" value="Afficher planning">
    <input type="submit" name="annuler" value="annuler">
    </form>';
    require_once('gabaritRendezVous.php');
  
}






function AfficherErreurdRDV($msg){
    $contenue0='';
    $contenue='';
    $contenu2='';
    $contenu1='';
    $contenue='<form class="f1" action="frontal.php" method="post">
    <h1>Prise de rendez vous </h1>
    <p>
        Entrer lid du client : <input type="text" name="idclientPourRdv" pattern="[0-9]+"  
        title="Saisissez uniquement des chiffres de 0 à 9 ">
    </p>
    <p class="erreur">'.$msg.'</p>
    <p><input type="submit" name="vldpourIdRdv" value="valider"></p>
    <p>Vous netes pas encore client chez nous ? cliquer sur
    <input type="submit" name="pasClient" value="je suis nouveau">
    <input type="submit" name="annuler" value="annuler"></p>
    </form>';
    require_once('gabaritRendezVous.php');
}

//____________________________________  PARTIE CONSEILLER ___________________________________

// GESTION NOUVEAU CONTRAT 

function afficherQuestion(){ // affiche la question 'etes vous client?'
    $contenu='';
    $contenu1='<form class="f1" action="frontal.php" method="post"> <label  class="l" for="choix">Etes vous deja client ?</label>
     <p><input type="submit" name="oui" value="Oui">
    <input type="submit" name="non" value="Non"> </p><p><input type="submit" name="annuler" value="annuler"></form>';
    require_once('nouveauContrat.php');
}


function  afficherSaisieNum(){  // affiche la zone de saisi du numero
    $contenu='';
    $contenu1='<form action="frontal.php" method="post"> <label for="n">
    Entrer votre numero de telephone :</label> <input type="tel" name="numero" id="n" 
    maxlength="10" pattern="^[0][0-9]+"  title="Saisissez uniquement des chiffres de 0 à 9 ">
    <input type="submit" name="btnValider" value="Valider"> <input type="submit" name="annuler" value="annuler" </p></form>';
    require_once('nouveauContrat.php');
}


function afficherNouveauContrat($contrat,$Id){ // afficher la liste des contrats dans une liste deroulate
    $contenu='';
    $question='';
    $contenu1='<form  class="f2"action="frontal.php" method="post">
    <p>Hereux de vous retrouver Mr '.$Id->nom.'</p>
    <lable>Votre id est :</label><input class="zonId" type="text" 
    name="id" value="'.$Id->idClient.'" readonly>
    <p>Quel type de contrats vous faut il ?</p>
    <p><label for="z1">Les types de contrats proposer :</label> <select class="z1" 
    name="typeContrat" id="z1"></p></form>';
    foreach($contrat as $ligne){
        $contenu.='<option value="'.$ligne->nomContrat.'">'.$ligne->nomContrat.'  '.$ligne->mensualite.'€/Mois </option>';
    }
    $contenu1.=$contenu.'</select><input type="submit" name="choisir" value="Choisir">
    <input type="submit" name="annuler" value="annuler"></form>' ;
    require_once('nouveauContrat.php');
}

function afficherNouveauContratx($contratChoisit,$id){ // LA ZONE DE CREATION DU COMPTE
    $contenu='';
    $question='';
    $contenu1='<form  class="f3"action="frontal.php" method="post">
    <p>Vous avez choisit un contrat <strong>'.$contratChoisit.'</strong></p>
    <input class="x" type="text" name="c" value="'.$contratChoisit.'" readonly>
    <p><lable>Votre id est :</label><input class="zonId" type="text" 
    name="id" value="'.$id.'" readonly></p>
    <p> Entrer la date et appuyer sur le bouton creation du contrat</p>
    <label for="x">date de creation :</label>
    <input id="x" type="date" name="date"></p>
    <p><input type="submit" name="creation" value="Creation du contrat"></p>
    <input type="submit" name="annuler" value="annuler"></form>' ;
    require_once('nouveauContrat.php');
}

function afficherRecaputilatif($id,$contrat,$mensualite,$dateOuverture,$information){ // fonction daffichage du recaputilatif creation contrat
    $contenu='';
    $question='';
    $contenu1='<form  class="f3"action="frontal.php" method="post">
    <h1>Recaputilatif de votre contrat</h1>
    <p><strong>Nom :</strong>'.$information->nom.'</p>
    <p><strong>Prenom :</strong>'.$information->prenom.'</p>
    <p><strong>Date de naissance :</strong>'.$information->dateDeNaissance.'</p>
    <p><strong>Adresse :</strong>'.$information->adresse.'</p>
    <p><strong>Type de contrat :</strong>'.$contrat.'</p>
    <p><strong>Mensualite :</strong>'.$mensualite->Mensualite.' €/Mois</p>
    <p><strong> Date d\'ouverture:</strong>'.$dateOuverture.'</p>
    <p><strong> Id du charger client:</strong>'.$information->chargerClient.'</p>
    <input type="submit" name="annuler" value="Retour acceuil"></form>' ;
    require_once('nouveauContrat.php');
}
function affihcherErreurCreation($msg,$id,$contratChoisit){ // fonction qui affiche lerreur du creation du contrat
    $contenu='';
    $question='';
    $contenu1='<form  class="f3"action="frontal.php" method="post">
    <p>Vous avez choisit un contrat <strong>'.$contratChoisit.'</strong></p>
    <input class="x" type="text" name="c" value="'.$contratChoisit.'"readonly>
    <lable>Votre id est :</label><input class="zonId" type="text" 
    name="id" value="'.$id.'" readonly>
    <p>Entrer la date et appuyer sur le bouton creation du contrat</p>
    </p><label for="x">date de creation :</label>
    <input id="x" type="date" name="date"></p>
    <p><input type="submit" name="creation" value="Creation du contrat"></p>
    <p class="erreur">'.$msg.'</p>
    <input type="submit" name="annuler" value="annuler"></form>' ;
    require_once('nouveauContrat.php');
}

function  afficherZoneInscription(){ // ZONE DINSCRIPTION POUR DEVENIR CLIENT AVANT LA CREATION DU CONTRAT
    $erreur='';
    require_once('zoneInscrption.php');

}

function  affihcherErreurInscription($msg){ // FONCTION DAFFICHAGE DERRUEUR DINSCRIPTION 
    $erreur='<p class="erreur">'.$msg.'</p>';
    require_once('zoneInscrption.php');
}

function  afficherConfirmation(){ // confirmation de creation contrat
    $erreur='';
    $contenu='';
    $question='';
    $contenu1='<form  class="5" action="frontal.php" method="post">
    <h1 class="confirmation">Client ajouter !</h1>
    <p>Cliquer sur <input type="submit" name="continuer" value="Continuer l\'incription"> 
    pour Continuer !</p></form>';
    require_once('nouveauContrat.php');
}



function afficherQuestion2(){
    $contenu='';
    $contenu1='<form class="f1" action="frontal.php" method="post"> <label  class="l" for="choix">Etes vous deja client ?</label>
     <p><input type="submit" name="ouiC" value="Oui">
    <input type="submit" name="nonC" value="Non"> </p><p><input type="submit" name="annuler" value="annuler"></form>';
    require_once('ouvrirCompte.php');
}
function  afficherSaisieNumC(){
    $contenu='';
    $contenu1='<form action="frontal.php" method="post"> <label for="n">
    Entrer votre numero de telephone :</label> <input type="tel" name="numero" id="n" 
    maxlength="10" pattern="[0-9]+"  title="Saisissez uniquement des chiffres de 0 à 9 ">
    <input type="submit" name="btnValiderNumC" value="Valider"> <input type="submit" name="annuler" value="annuler" </p></form>';
    require_once('ouvrirCompte.php');
}

function afficherZoneChoixDucompte($compte,$Id){
    $contenu='';
    $question='';
    $contenu1='<form  class="f2"action="frontal.php" method="post">
    <p>Hereux de vous retrouver Mr '.$Id->nom.'</p>
    <lable>Votre id est :</label><input class="zonId" type="text" 
    name="id" value="'.$Id->idClient.'" readonly>
    <p>Quel type de contrats vous faut il ?</p>
    <p><label for="z1">Les types de contrats proposer :</label> <select class="z1" 
    name="typeCompte" id="z1"></p></form>';
    foreach($compte as $ligne){
        $contenu.='<option value="'.$ligne->nomCompte.'">'.$ligne->nomCompte.'</option>';
    }
    $contenu1.=$contenu.'</select> <input type="submit" name="choisirC" value="Choisir">
    <input type="submit" name="annuler" value="annuler"></form>' ;
    require_once('ouvrirCompte.php');
}

function affihcherErreurNumC($msg){
    $contenu='';
    $contenu1='<form action="frontal.php" method="post"> <label for="n">
    Entrer votre numero de telephone :</label> <input type="tel" name="numero" id="n" 
    maxlength="10" pattern="[0-9]+"  title="Saisissez uniquement des chiffres de 0 à 9 ">
    <input type="submit" name="btnValiderNumC" value="Valider"> <input type="submit" name="annuler" value="annuler" </p>
    <p class="erreur">'.$msg.'</p></form>';

    require_once('ouvrirCompte.php');

}
function affihcherErreurNum($msg){
    $contenu='';
    $contenu1='<form action="frontal.php" method="post"> <label for="n">
    Entrer votre numero de telephone :</label> <input type="tel" name="numero" id="n" 
    maxlength="10" pattern="[0-9]+"  title="Saisissez uniquement des chiffres de 0 à 9 ">
    <input type="submit" name="btnValiderNumC" value="Valider"> <input type="submit" name="annuler" value="annuler" </p>
    <p class="erreur">'.$msg.'</p></form>';

   require_once('nouveauContrat.php');

}


function affihcherErreurGC2($msg){
    $contenue='';
    $erreur='';
    $erreur1='';
    $erreur=$msg;
    require_once('gabaritConseiller.php');
}


function affihcherErreurGC($msg){
    $contenue='';
    $erreur='';
    $erreur1=$msg;
    require_once('gabaritConseiller.php');
}



function  afficheZoneOuvertureCompte($compteChoisit,$id){
    $contenu='';
    $question='';
    $contenu1='<form  class="f3"action="frontal.php" method="post">
    <p>Vous avez choisit l\'ouverture d\'un <strong>'.$compteChoisit.'</strong></p>
    <input class="x" type="text" name="c2" value="'.$compteChoisit.'" readonly>
    <p><lable>Votre id est :</label><input class="zonId" type="text" 
    name="id2" value="'.$id.'" readonly></p>
    <p> Entrer la date et appuyer sur le bouton ouvrir le compte</p>
    <label for="x">date de creation :</label>
    <input id="x" type="date" name="dateC"></p>
    <label for="x">Decouvert autoriser :</label>
    <input id="x" type="text" name="DecouvertAutoriser" placeholder="Exemple -500"></p>
    <p><input type="submit" name="creationC" value="Ouvrir le compte"></p>
    <input type="submit" name="annuler" value="annuler"></form>' ;
    require_once('ouvrirCompte.php');
}
function afficherRecaputilatifCompte($id,$compte,$decouvert,$dateOuverture,$information){
    $contenu='';
    $question='';
    $contenu1='<form  class="f3"action="frontal.php" method="post">
    <h1>Recaputilatif de votre contrat</h1>
    <p><strong>Nom :</strong>'.$information->nom.'</p>
    <p><strong>Prenom :</strong>'.$information->prenom.'</p>
    <p><strong>Date de naissance :</strong>'.$information->dateDeNaissance.'</p>
    <p><strong>Adresse :</strong>'.$information->adresse.'</p>
    <p><strong>Type de contrat :</strong>'.$compte.'</p>
    <p><strong>Decouvert autoriser :</strong>'.$decouvert.' Euro</p>
    <p><strong> Date d\'ouverture:</strong>'.$dateOuverture.'</p>
    <p><strong> Id du charger client:</strong>'.$information->chargerClient.'</p>
    <input type="submit" name="annuler" value="Retour acceuil"></form>' ;
    require_once('ouvrirCompte.php');
}
function affihcherErreurCompe($msg,$id,$compte){
    $contenu='';
    $question='';
    $contenu1='<form  class="f3"action="frontal.php" method="post">
    <p>Vous avez choisit l\'ouverture d\'un <strong>'.$compte.'</strong></p>
    <input class="x" type="text" name="c2" value="'.$compte.'" readonly>
    <p><lable>Votre id est :</label><input class="zonId" type="text" 
    name="id2" value="'.$id.'" readonly></p>
    <p> Entrer la date et appuyer sur le bouton ouvrir le compte</p>
    <label for="x">date de creation :</label>
    <input id="x" type="date" name="dateC"></p>
    <label for="x">Decouvert autoriser :</label>
    <input id="x" type="text" name="DecouvertAutoriser"  placeholder="Exemple -500"></p>
    <p><input type="submit" name="creationC" value="Ouvrir le compte"></p>
    <p class="erreur">'.$msg.'</p>
    <input type="submit" name="annuler" value="annuler"></form>' ;
    require_once('ouvrirCompte.php');
}
function  afficherZoneInscriptionC(){
    $erreur='';
    require_once('zoneInscrptionC.php');
}
function  afficherConfirmationC(){
    $erreur='';
    $contenu='';
    $question='';
    $contenu1='<form  class="5" action="frontal.php" method="post">
    <h1 class="confirmation">Client ajouter !</h1>
    <p>Cliquer sur <input type="submit" name="continuerC" value="Continuer l\'ouverture du compte"> 
    pour Continuer !</p></form>';
    require_once('ouvrirCompte.php');
}
function  affihcherErreurInscriptionC($msg){
    $erreur='<p class="erreur">'.$msg.'</p>';
    require_once('zoneInscrptionC.php');
}

//GESTION NOUVEAU CLIENT
function  afficherZoneInscriptionNC(){
    $erreur='';
    $contenu='';
    require_once('zoneInscrptionNC.php');
}
function  afficherConfirmationNC(){
    $erreur='';
    $contenu='';
    $question='';
    $contenu='<form  class="5" action="frontal.php" method="post">
    <h1 class="confirmation">Client ajouter !</h1>
    <p><input type="submit" name="annuler" value="Retour acceuil"></p></form>';
    require_once('zoneInscrptionNC.php');
}
function  afficherConfirmationNCpourCompte(){
    $erreur='';
    $contenu='';
    $question='';
    $contenu1='<form  class="5" action="frontal.php" method="post">
    <h1 class="confirmation">Client ajouter !</h1>
    <p>Cliquer sur <input type="submit" name="continuerC" 
    value="Continuer l\'ouverture du compte"> 
    pour Continuer !</p></form>';
    require_once('ouvrirCompte.php');
}
function  affihcherErreurInscriptionNC($msg){
    $contenu='';
    $erreur='<p class="erreur">'.$msg.'</p>';
    require_once('zoneInscrptionNC.php');
}
//GESTION BLOCAGE CRENEAUX
function afficherZoneCreneaux(){
    $contenu1='';
    $contenu='';
    require_once('creneaux.php');
}
function afficherConfirm(){
    $contenu='';
    $contenu1='<p class="confirmation">votre creneaux a ete bloquer</p>';
 require_once('creneaux.php');
}
function affihcherErreurBlocage($msg){
    $contenu1='';
    $contenu='<p class="erreur">'.$msg.'</p>';
    require_once('creneaux.php');
}
//GESTION DECOUVERT
function  afficherZONGestionDecouvert(){
    $erreur='';
    $contenu='<form action="frontal.php"  method="post">
    <p><label for="z">Entrer l\'id du client :</label><input type="text" name="zoneIdpourD" id="z" pattern="[0-9]+"
        title="Veuillez entrer uniquement des chiffre de 0 à 9 " autofocus></p>
        <p><input type="submit" name="Valider" value="Valider">
        <input type="submit" name="annuler" value="annuler"></p></form>';
    require_once('gabaritGD.php');
}

function afficherListeCompte($ListeCompte,$id,$information){
    $erreur='';
    $contenu1='';
    $contenu='<form action="frontal.php" method="post">
    <input type="text" class="x" name="id" value="'.$id.'">
    <p><strong>Id du client :</strong>'.$information->idClient.'</p>
    <p><strong>Nom :</strong>'.$information->nom.'</p>
    <p><strong>Prenom :</strong>'.$information->prenom.'</p>
    <label for="">Liste des comptes du client :</label>
    <select name="listeCompte" >';
    foreach($ListeCompte as $ligne){
        $contenu1.='<option value="'.$ligne->nomducompte.'">'.$ligne->nomducompte.'</option>';
    }
    $contenu.= $contenu1.'</select> <input type="submit" class="" name="CompteChoisit" value="Choisir">
    <input type="submit" name="annuler" value="annuler"></form>';
    require_once('gabaritGD.php');
}

function affihcherErreurIdPouGD($msg){
   $contenu='<form action="frontal.php"  method="post">
    <p><label for="z">Entrer l\'id du client :</label><input type="text" name="zoneIdpourD" id="z" pattern="[0-9]+"
    title="Veuillez entrer uniquement des chiffre de 0 à 9 "
    autofocus></p><p><input type="submit" name="Valider" value="Valider">
    <input type="submit" name="annuler" value="annuler"></p>
    <p class="erreur">'.$msg.'</p></form>';
    require_once('gabaritGD.php');
}

function afficherZoneModifierDecouvert($compteChoisit,$idClient){
    $contenu='<form action="frontal.php"  method="post">
    <p><strong>Id du client :</strong>'.$idClient.'</p>
    <p><strong>Compte choisit :</strong>'.$compteChoisit.'</p>
    <input type="text" class="x" name="id" value="'.$idClient.'">
    <input type="text" class="x" name="compteChoisit" value="'.$compteChoisit.'">
    <p><strong>Nouveeau decouvert :</strong>
    <input type="text" class="vd" name="valeurDecouvert" autofocus placeholder="Exemple -500" 
    pattern="[0-9-]+"
    title="Veuillez entrer uniquement des chiffre de 0 à 9 " ></p>
    <input type="submit"  name="vld" value="modifier">
    <input type="submit" name="annuler" value="annuler"></form>';
    require_once('gabaritGD.php');
}
function  affihcherErreurModification($msg,$compteChoisit,$idClient){
    $contenu='<form action="frontal.php"  method="post">
    <p><strong>Id du client :</strong>'.$idClient.'</p>
    <p><strong>Compte choisit :</strong>'.$compteChoisit.'</p>
    <input type="text" class="x" name="id" value="'.$idClient.'">
    <input type="text" class="x" name="compteChoisit" value="'.$compteChoisit.'">
    <p><strong>Nouveeau decouvert :</strong>
    <input type="text" class="vd" name="valeurDecouvert" autofocus placeholder="Exemple -500" 
    pattern="[0-9-]+"
    title="Veuillez entrer uniquement des chiffre de 0 à 9 "  ></p>
    <input type="submit"  name="vld" value="modifier">
    <p class="erreur">'.$msg.'</p></form>';
    require_once('gabaritGD.php');
}
function  afficherConfirmationDeM($valeurDecouvert){
    $contenu='<form action="frontal.php"  method="post"> 
    <h1 class="confirmation">Operation terminer avec succes !</h1>
    <p>Votre nouveau decouvert est de '.$valeurDecouvert.' euro</p>
    <p><input type="submit" name="annuler" value="Retour acceuil"></p></form>';
    require_once('gabaritGD.php');
}

//GESTION RESILIER COMPTE
function afficherChoixCompteOuContrat(){
    $contenue2='';
    $contenu0='';
    $contenue='<form action="frontal.php" method="post">
    <h1>Choisisez une option.</h1>
    <p><input type="submit" name="compte" value="Compte"> OU 
    <input type="submit" name="contrat" value="Contrat"></p>
    <input type="submit" name="annuler" value="annuler"></form>';
    require_once('gabaritResilie.php');
}

function afficherZoneSaisiNumClient(){
    $contenue2='';
    $contenu0='';
    $contenue='<form action="frontal.php" method="post"> <label for="n">
    Numero de telephone du client :</label> <input type="tel" name="numero" id="n" 
    maxlength="10" pattern="[0-9]+"  title="Saisissez uniquement des chiffres de 0 à 9 ">
    <input type="submit" name="vldNumClient" value="Valider"> <input type="submit" name="annuler" value="annuler" </p>
    </form>';
    require_once('gabaritResilie.php');
}
function affihcherErreurNumR($msg){
    $contenue2='';
    $contenu0='';
    $contenue='<form action="frontal.php" method="post"> <label for="n">
    Numero de telephone du client :</label> <input type="tel" name="numero" id="n" 
    maxlength="10" pattern="[0-9]+"  title="Saisissez uniquement des chiffres de 0 à 9 ">
    <input type="submit" name="vldNumClient" value="Valider"> 
    <input type="submit" name="annuler" value="annuler" </p>
    <p class="erreur">'.$msg.'</p></form>';
    require_once('gabaritResilie.php');
}

function  afficherChoixComptes($compte,$x,$information){
    $contenue2='';
    $contenu0='';
    foreach($compte as $ligne){
        $contenu0.='<p><input type="checkbox" id="case" name="Case[]" value="'.$ligne->nomducompte.'">
        '.$ligne->nomducompte.'</p>';
    }
    $contenue='<form action="frontal.php" method="post">
    <input type="text" class="x" name="id" value="'.$x->idClient.'">
    <p><strong>Id du client :</strong>'.$information->idClient.'</p>
    <p><strong>Nom :</strong>'.$information->nom.'</p>
    <p><strong>Prenom :</strong>'.$information->prenom.'</p>
    <label for="">Liste des comptes du client :</label>'.$contenu0.'
    <p>Cocher les comptes a resilier et cliquer sur le bouton rerislier</p>
    <p><input type="submit" name="resilier" value="Resilier"></p></form>';
    require_once('gabaritResilie.php');
}

function  afficherConfrimation(){
    $contenue2='';
    $contenu0='';
    $contenue='<form action="frontal.php"  method="post"> 
    <h1 class="confirmation">Operation terminer avec succes !</h1>
    <p><input type="submit" name="annuler" value="Retour acceuil"></p></form>';
    require_once('gabaritResilie.php');
}
function  afficherErreurResiliationComptes($id,$compte,$information){
    $contenue='';
    $contenu0='';
    foreach($compte as $ligne){
        $contenu0.='<p><input type="checkbox" id="case" name="Case[]" value="'.$ligne->nomducompte.'">
        '.$ligne->nomducompte.'</p>';
    }
    $contenue='<form action="frontal.php" method="post">
    <input type="text" class="x" name="id" value="'.$id.'">
    <p><strong>Id du client :</strong>'.$information->idClient.'</p>
    <p><strong>Nom :</strong>'.$information->nom.'</p>
    <p><strong>Prenom :</strong>'.$information->prenom.'</p>
    <label for="">Liste des comptes du client :</label>'.$contenu0.'
    <p><input type="submit" name="resilier" value="Resilier"></p>
   <p class="erreur">Veuillez choisir aumoins un compte a resilier</p></form>';
    require_once('gabaritResilie.php');
}

//GESTION RESILIER CONTRAT
function afficherZoneSaisiNumClient2(){
    $contenu0='';
    $contenue='<form action="frontal.php" method="post"> <label for="n">
    Numero de telephone du client :</label> <input type="tel" name="numero" id="n" 
    maxlength="10" pattern="[0-9]+"  title="Saisissez uniquement des chiffres de 0 à 9 ">
    <input type="submit" name="vldNumClient2" value="Valider"> <input type="submit" name="annuler" value="annuler" </p>
    </form>';
    require_once('gabaritResilie.php');
}
function  afficherChoixContrat($contrat,$x,$information){
    $contenu0='';
    foreach($contrat as $ligne){
        $contenu0.='<p><input type="checkbox" name="caseCocher[]" value="'.$ligne->nomducontrat.'">
        '.$ligne->nomducontrat.'</p>';
    }
    $contenue='<form action="frontal.php" method="post">
    <input type="text" class="x" name="id" value="'.$x->idClient.'">
    <p><strong>Id du client :</strong>'.$information->idClient.'</p>
    <p><strong>Nom :</strong>'.$information->nom.'</p>
    <p><strong>Prenom :</strong>'.$information->prenom.'</p>
    <label for="">Liste des contrats du client :</label>'.$contenu0.'
    <p>Cocher les comptes a resilier et cliquer sur le bouton rerislier</p>
    <p><input type="submit" name="resilier2" value="Resilier"></p></form>';
    require_once('gabaritResilie.php');
}
function affihcherErreurNumR2($msg){
    $contenu0='';
    $contenue='<form action="frontal.php" method="post"> <label for="n">
    Numero de telephone du client :</label> <input type="tel" name="numero" id="n" 
    maxlength="10" pattern="[0-9]+"  title="Saisissez uniquement des chiffres de 0 à 9 ">
    <input type="submit" name="vldNumClient2" value="Valider"> 
    <input type="submit" name="annuler" value="annuler" </p>
    <p class="erreur">'.$msg.'</p></form>';
    require_once('gabaritResilie.php');
}
function afficherErreurResiliationContrat($id,$contrat,$information){
    $contenue='';
    $contenu0='';
    foreach($contrat as $ligne){
        $contenu0.='<p><input type="checkbox" id="case" name="caseCocher[]" value="'.$ligne->nomducontrat.'">
        '.$ligne->nomducontrat.'</p>';
    }
    $contenue='<form action="frontal.php" method="post">
    <input type="text" class="x" name="id" value="'.$id.'">
    <p><strong>Id du client :</strong>'.$information->idClient.'</p>
    <p><strong>Nom :</strong>'.$information->nom.'</p>
    <p><strong>Prenom :</strong>'.$information->prenom.'</p>
    <label for="">Liste des contrats du client :</label>'.$contenu0.'
    <p><input type="submit" name="resilier2" value="Resilier"></p>
   <p class="erreur">Veuillez choisir aumoins un contrat a resilier</p></form>';
    require_once('gabaritResilie.php');
}

function  afficherConfrimationR(){
    $contenue2='';
    $contenu0='';
    $contenue='<form action="frontal.php"  method="post"> 
    <h1 class="confirmation">Operation terminer avec succes !</h1>
    <p><input type="submit" name="annuler" value="Retour acceuil"></p></form>';
    require_once('gabaritResilie.php');
}

// gestion nouveau employer
function afficherZoneCreationEmployer(){
    $contenu0='';
    $contenue=' <form class="f1" action="frontal.php" method="post"> <fieldset><legend>Creer un employer</legend>
    <div class="groupe"><div class="GG"><p><label for="">Nom :</label><input type="text" 
    name="nom" id=""></p><p><label for="">Prenom :</label><input type="text" name="prenom" id=""></p><p>
    <label for="">Login :</label><input type="text" name="login" id=""></p></div>
    <div class="GD"><p><label for="">Mot de passe :</label><input type="text"
    name="mdp" id=""></p><p><label for="">Categorie :</label>
    <select name="select">
        <option value="agent">Agent</option>
        <option value="conseiller">Conseiller</option>
    </select></p></div></div>
    <p><input type="submit" name="creer" value="Creer"></p>
    <input type="submit" name="AC" value="Retour Acceuil"></fieldset></form>';
    require_once('gabaritCreerEmploye.php');
}
function affihcherErreurCreerE($msg){
    $contenu0='';
    $contenue=' <form class="f1" action="frontal.php" method="post"> <fieldset><legend>Creer un employer</legend>
    <div class="groupe"><div class="GG"><p><label for="">Nom :</label><input type="text" 
    name="nom" id=""></p><p><label for="">Prenom :</label><input type="text" name="prenom" id=""></p><p>
    <label for="">Login :</label><input type="text" name="login" id=""></p></div>
    <div class="GD"><p><label for="">Mot de passe :</label><input type="text"
    name="mdp" id=""></p><p><label for="">Categorie :</label>
    <select name="select">
        <option value="agent">Agent</option>
        <option value="conseiller">Conseiller</option>
    </select></p></div></div>
    <p><input type="submit" name="creer" value="Creer">
    <input type="submit" name="AC" value="Retour Acceuil"></p>
    <p class="erreur">'.$msg.'</p></fieldset></form>';
    require_once('gabaritCreerEmploye.php');

}
function afficherConfirmationAE(){
    $contenu0='';
    $contenue='<form action="frontal.php"  method="post"> 
    <h1 class="confirmation">Operation terminer avec succes !</h1>
    <p><input type="submit" name="AC" value="Retour Acceuil"></p></form>';
    require_once('gabaritCreerEmploye.php');
}
// GESTION MODIER EMPLOYER
function  afficherZoneModifierEmployer($employe){
    $contenu0='';
    $contenue='<form action="frontal.php" method="post"><p>
    <label for="">Liste des employers : </label><select name="employer">';
    foreach($employe as $ligne){
        $contenu0.='<option value="'.$ligne->idEmploye.'"> Id : ' .$ligne->idEmploye.  '
         Nom : ' .$ligne->nom.  ' Prenom : ' .$ligne->prenom.  ' Categorie : ' .$ligne->categorie.'</option></p>';
    }
    $contenue.=$contenu0.'</select> <input type="submit" name="choisirx" value="choisir">
    <input type="submit" name="AC" value="Retour Acceuil"></p></form>';
    require_once('gabaritCreerEmploye.php');
}
// MODIFICATION MOT DE PASSE
function afficherZoneDeM($id,$motDepasse,$identifiant,$nom,$prenom,$categorie){
    $contenue='<form class="f1" action="frontal.php" method="post">
    <p><strong>Nom :</strong> '.$nom.' </p>
    <p><strong>Prenom :</strong> '.$prenom.' </p>
    <p><strong>Categorie :</strong> '.$categorie.' </p>
    <p><input class="x" type="text" name="id" value="'.$id.'"></p>
    <p>Ancien mot de passe : <input class="ab" type="text" name="ancienMdp" value="'.$motDepasse.'" readonly>
    <input  class="btnModif" type="submit" name="modifierMdp"  value="Modifier"></p>
    <p>Ancien Login : <input  class="ab" type="text" name="ancienLogin" value="'.$identifiant.'" readonly>  
    <input  class="btnModif" type="submit" name="modifierLogin" value="Modifier">
    <input type="submit" name="AC" value="Retour Acceuil"></p>
    </form>';
    require_once('gabaritCreerEmploye.php');
}

function afficherZoneDeModificationMdp($id,$motDepasse,$identifiant,$nom,$prenom,$categorie){
    $contenue0='<input class="ab" type="text" name="Nmdp" placeholder="Nouveau mot de passe">
    <input class="z1" type="submit" name="validerModifMdp" value="valider">
    <input class="z1" type="submit" name="annulerModif" value="Annuler"></p>';
    $contenue='<form class="f1" action="frontal.php" method="post">
    <p><strong>Nom :</strong> '.$nom.' </p>
    <p><strong>Prenom :</strong> '.$prenom.' </p>
    <p><strong>Categorie :</strong> '.$categorie.' </p>
    <p><input class="x" type="text" name="id" value="'.$id.'"></p>
    <p>Ancien mot de passe : <input class="ab" type="text" name="ancienMdp" value="'.$motDepasse.'" readonly>
    <p>'.$contenue0.'
    <input type="submit" name="AC" value="Retour Acceuil"></p>
    <p class="b"> Ancien  Login : <input  class="ab" type="text" name="ancienLogin" value="'.$identifiant.'" readonly>  
    <input  class="btnModif" type="submit" name="modifierLogin" value="Modifier" ></p> </form>';
    require_once('gabaritCreerEmploye.php');
}
function  affihcherErreurModifiMdp($id,$motDepasse,$identifiant,$nom,$prenom,$categorie,$msg){
    $contenue0='<input class="ab" type="text" name="Nmdp" placeholder="Nouveau mot de passe">
    <input class="z1" type="submit" name="validerModifMdp" value="valider">
    <input class="z1" type="submit" name="annulerModif" value="Annuler"></p>';
    $contenue='<form class="f1" action="frontal.php" method="post">
    <p><strong>Nom :</strong> '.$nom.' </p>
    <p><strong>Prenom :</strong> '.$prenom.' </p>
    <p><strong>Categorie :</strong> '.$categorie.' </p>
    <p><input class="x" type="text" name="id" value="'.$id.'"></p>
    <p>Ancien mot de passe : <input class="ab" type="text" name="ancienMdp" value="'.$motDepasse.'" readonly>
    <p>'.$contenue0.'
    <input type="submit" name="AC" value="Retour Acceuil"></p>
    <p class="erreur">'.$msg.'</p>
    <p class="b"> Ancien  Login : <input  class="ab" type="text" name="ancienLogin" value="'.$identifiant.'" readonly>  
    <input  class="btnModif" type="submit" name="modifierLogin" value="Modifier" ></p> </form>';
    require_once('gabaritCreerEmploye.php');
}

//GESTION MODIFIER LOGIN 
function afficherZoneDeModificationLogin($id,$motDepasse,$identifiant,$nom,$prenom,$categorie){
    $contenue0='<input class="ab" type="text" name="NLogin" placeholder="Nouveau Login">
    <input class="z1" type="submit" name="validerModifLogin" value="valider">
    <input class="z1" type="submit" name="annulerModif" value="Annuler"></p>';
    $contenue='<form class="f1" action="frontal.php" method="post">
    <p><strong>Nom :</strong> '.$nom.' </p>
    <p><strong>Prenom :</strong> '.$prenom.' </p>
    <p><strong>Categorie :</strong> '.$categorie.' </p>
    <p><input class="x" type="text" name="id" value="'.$id.'"></p>
    <p>Ancien mot de passe : <input class="ab" type="text" name="ancienMdp" value="'.$motDepasse.'" readonly>
    <input  class="btnModif" type="submit" name="modifierMdp"  value="Modifier"></p>
    <p class="b"> Ancien  Login : <input  class="ab" type="text" name="ancienLogin" value="'.$identifiant.'" readonly>  
    <p>'.$contenue0.'<input type="submit" name="AC" value="Retour Acceuil">
    </p></form>';
    require_once('gabaritCreerEmploye.php');
}
function  affihcherErreurModifiLogin($id,$motDepasse,$identifiant,$nom,$prenom,$categorie,$msg){
    $contenue0='<input class="ab" type="text" name="NLogin" placeholder="Nouveau login">
    <input class="z1" type="submit" name="validerModifLogin" value="valider">
    <input class="z1" type="submit" name="annulerModif" value="Annuler"></p>';
    $contenue='<form class="f1" action="frontal.php" method="post">
    <p><strong>Nom :</strong> '.$nom.' </p>
    <p><strong>Prenom :</strong> '.$prenom.' </p>
    <p><strong>Categorie :</strong> '.$categorie.' </p>
    <p><input class="x" type="text" name="id" value="'.$id.'"></p>
    <p>Ancien mot de passe : <input class="ab" type="text" name="ancienMdp" value="'.$motDepasse.'" readonly>
    <p class="b"> Ancien  Login : <input  class="ab" type="text" name="ancienLogin" value="'.$identifiant.'" readonly> 
    <p>'.$contenue0.'</p>
    <p class="erreur">'.$msg.'</p> 
    <input  class="btnModif" type="submit" name="modifierLogin" value="Modifier" >
    <input type="submit" name="AC" value="Retour Acceuil"></p> </form>';
    require_once('gabaritCreerEmploye.php');
}
// GESTION MODIFIER CONTRAT
function  afficherLesTypeContrat($contrat){
    $contenu0='';
    foreach($contrat as $ligne){
        $contenu0.='<option value="'.$ligne->nomContrat.'">'.$ligne->nomContrat.'</option>';
    }
    $contenue='<form class="f1" action="frontal.php" method="post">
    <p><label>Listes de contrats  proposes par AwaBank :</label><select 
    name="typeContratChoisit">'.$contenu0.'</select>
    <input type="submit" name="mdfTCO" value="choisir et modifier">
    <input type="submit" name="AC" value="Retour Acceuil"></p>
    </form>';
    require_once('gabaritCreerEmploye.php');
}

function afficherLaZdeModification($contratChoisit,$infoContrat){
    $contenue='<form class="f1" action="frontal.php" method="post">
    <p><input class="x" type="text" name="Cchoisit" value="'.$contratChoisit.'"></p>
    <p><strong>Contrat a modifier : </strong>'.$contratChoisit.'</p>
    <p>Ancienne Mensualite : <input class="ab" type="text" name="ancienMdp" 
    value="'.$infoContrat.' Euro/mois" readonly>
    <input  class="btnModif" type="submit" name="modifiermensualite" value="Modifier" >
    <input type="submit" name="AC" value="Retour Acceuil"></p> </form>  ';
    require_once('gabaritCreerEmploye.php');
}
function  afficherZMM($contratChoisit,$mensualite){
    $contenue0='<input class="ab" type="text" name="nouvelleMEns"
    pattern="[0-9]+" placeholder="Nouvelle mensualite">
    <input class="z1" type="submit" name="validerMens" value="valider">
    <input class="z1" type="submit" name="annulerModifMens" value="Annuler"></p>';
    $contenue='<form class="f1" action="frontal.php" method="post">
    <p><input class="x" type="text" name="Cchoisit" value="'.$contratChoisit.'"></p>
    <p><strong>Contrat a modifier : </strong>'.$contratChoisit.'</p>
    <p>Ancienne Mensualite : <input class="ab" type="text" name="ancienMdp" 
    value="'.$mensualite.' Euro/mois" readonly></p>
    <p>'.$contenue0.'</p> 
    <input type="submit" name="AC" value="Retour Acceuil"></form>';
    require_once('gabaritCreerEmploye.php');
}
function  afficherConfirmationMens($contratChoisit,$mensualite){
    $contenue='<form class="f1" action="frontal.php" method="post">
    <p><input class="x" type="text" name="Cchoisit" value="'.$contratChoisit.'"></p>
    <h1 class="confirmation"> Operation terminer avec succes !</h1>
    <p>La nouvelle Mensualite du contrat '.$contratChoisit.' est de : <strong>'.$mensualite.' Euro/mois </strong>
    <input type="submit" name="AC" value="Retour Acceuil"></p></form>  ';
    require_once('gabaritCreerEmploye.php');

}
function  afficherErreurmodifierMens($msg,$contratChoisit,$mensualite){
    $contenue0='<input class="ab" type="text" name="nouvelleMEns"
    pattern="[0-9]+" placeholder="Nouvelle mensualite">
    <input class="z1" type="submit" name="validerMens" value="valider">
    <input class="z1" type="submit" name="annulerModifMens" value="Annuler"></p>';
    $contenue='<form class="f1" action="frontal.php" method="post">
    <p><input class="x" type="text" name="Cchoisit" value="'.$contratChoisit.'"></p>
    <p><strong>Contrat a modifier : </strong>'.$contratChoisit.'</p>
    <p>Ancienne Mensualite : <input class="ab" type="text" name="ancienMdp" 
    value="'.$mensualite.' Euro/mois" readonly></p>
    <p>'.$contenue0.'</p><p class="erreur">'.$msg.'</p>
    <input type="submit" name="AC" value="Retour Acceuil"></form>';
    require_once('gabaritCreerEmploye.php');

}
 //  FIN GESTION MODIFIER CONTRAT

//GESTION CREER TYPE COMPTE CONTRAT

function  afficherZoneOption(){
    $contenue='<form class="f1" action="frontal.php" method="post">
    <h1>Choisissez une option</h1>
    <p><input type="submit" name="creerTypecompte" value="Creer type compte">
    <input type="submit" name="creerTypecontrat" value="Creer type contrat"></p>
    <p><input type="submit" name="ModifierContrat" value="Modifier contrat">
    <input type="submit" name="AC" value="Retour Acceuil"></form>';
    require_once('gabaritCreerEmploye.php');
}
function afficherZoneCreerTypeCompte(){
    $erreur='';
    $confirmation='';
    require_once('gabaritCreerMotif.php');
}
function afficherErreurCreationType($msg){
    $confirmation='';
    $erreur='<p class="erreur">'.$msg.'</p>';
    require_once('gabaritCreerMotif.php');
}
function  afficherConfirmationAjout(){
    $erreur='';
    $confirmation='
    <form class="f1" action="frontal.php" method="post">
    <p class="confirmation">Operation effectuer avec succes !</p> ';
    require_once('gabaritCreerMotif.php');
}

//GESTION CREER TYPE CONTRAT
function afficherZoneCreerTypeContrat(){
    $erreur='';
    $confirmation='';
    require_once('gabaritCreeTypeContrat.php');
}
function afficherErreurCreationTypeContrat($msg){
    $confirmation='';
    $erreur='<p class="erreur">'.$msg.'</p>';
    require_once('gabaritCreeTypeContrat.php');
}
function  afficherConfirmationAjout2(){
    $erreur='';
    $confirmation=' <form class="f1" action="frontal.php" method="post">
    <p class="confirmation">Operation effectuer avec succes !</p>';
    require_once('gabaritCreeTypeContrat.php');
}

// GESTION SUPPRIMER TYPE COMPTE
function afficherTypeCompte($comptes){
    $contenu0='';
    foreach($comptes as $ligne){
        $contenu0.='<p><input type="checkbox" name="caseTC[]" value="'.$ligne->nomCompte.'">'.$ligne->nomCompte.'</p>';
    }
    $contenue='<form class="f1" action="frontal.php" method="post">
    <p><label>Listes de comptes  proposes par AwaBank :</label>'.$contenu0.'</p>
    <input type="submit" name="supprimerTC" value="Supprimer">
    <input type="submit" name="AC" value="Retour Acceuil">
    </form>';
    require_once('gabaritCreerEmploye.php');
}
function afficherConfirmationSU($comptes){
    $contenu0='';
    foreach($comptes as $ligne){
        $contenu0.='<p><input type="checkbox" name="caseTC[]" value="'.$ligne->nomCompte.'">'.$ligne->nomCompte.'</p>';
    }
    $contenue='<form class="f1" action="frontal.php" method="post">
    <p><label>Listes de comptes  proposes par AwaBank :</label>'.$contenu0.'</p>
    <input type="submit" name="supprimerTC" value="Supprimer">
    <input type="submit" name="AC" value="Retour Acceuil">
    <p class="confirmation">Operation terminer</p>
    </form>';
    require_once('gabaritCreerEmploye.php');

}
 function afficherErreurSuppre($comptes,$msg){
    $contenu0='';
    foreach($comptes as $ligne){
        $contenu0.='<p><input type="checkbox" name="caseTC[]" value="'.$ligne->nomCompte.'">'.$ligne->nomCompte.'</p>';
    }
    $contenue='<form class="f1" action="frontal.php" method="post">
    <p><label>Listes de comptes  proposes par AwaBank :</label>'.$contenu0.'</p>
    <input type="submit" name="supprimerTC" value="Supprimer">
    <input type="submit" name="AC" value="Retour Acceuil">
    <p class="erreur">'.$msg.'</p>
    </form>';
    require_once('gabaritCreerEmploye.php');

 }
 function afficherErreurSuppre2($comptes){
    $contenu0='';
    foreach($comptes as $ligne){
        $contenu0.='<p><input type="checkbox" name="caseTC[]" value="'.$ligne->nomCompte.'">'.$ligne->nomCompte.'</p>';
    }
    $contenue='<form class="f1" action="frontal.php" method="post">
    <p><label>Listes de comptes  proposes par AwaBank :</label>'.$contenu0.'</p>
    <input type="submit" name="supprimerTC" value="Supprimer">
    <input type="submit" name="AC" value="Retour Acceuil">
    <p class="erreur">Cocher aumoins un type de compte a supprimer</p>
    </form>';
    require_once('gabaritCreerEmploye.php');

 }
 // GESTION SUPPRIMER TYPE CONTRAT
 function afficherTypeContrat($contrat){
    $contenu0='';
    foreach($contrat as $ligne){
        $contenu0.='<p><input type="checkbox" name="caseTCO[]" value="'.$ligne->nomContrat.'">'.$ligne->nomContrat.'</p>';
    }
    $contenue='<form class="f1" action="frontal.php" method="post">
    <p><label>Listes de contrats  proposes par AwaBank :</label>'.$contenu0.'</p>
    <input type="submit" name="supprimerTCO" value="Supprimer">
    <input type="submit" name="AC" value="Retour Acceuil">
    </form>';
    require_once('gabaritCreerEmploye.php');
}
function afficherConfirmationSUC($contrat){
    $contenu0='';
    foreach($contrat as $ligne){
        $contenu0.='<p><input type="checkbox" name="caseTCO[]" value="'.$ligne->nomContrat.'">'.$ligne->nomContrat.'</p>';
    }
    $contenue='<form class="f1" action="frontal.php" method="post">
    <p><label>Liste de contrats  proposes par AwaBank :</label>'.$contenu0.'</p>
    <input type="submit" name="supprimerTCO" value="Supprimer">
    <input type="submit" name="AC" value="Retour Acceuil">
    <p class="confirmation">Operation terminer !</p>
    </form>';
    require_once('gabaritCreerEmploye.php');

}
function afficherErreurSuppreCO($contrat,$msg){
    $contenu0='';
    foreach($contrat as $ligne){
        $contenu0.='<p><input type="checkbox" name="caseTCO[]" value="'.$ligne->nomContrat.'">'.$ligne->nomContrat.'</p>';
    }
    $contenue='<form class="f1" action="frontal.php" method="post">
    <p><label>Liste des contrats proposes par AwaBank :</label>'.$contenu0.'</p>
    <input type="submit" name="supprimerTCO" value="Supprimer">
    <input type="submit" name="AC" value="Retour Acceuil">
    <p>'.$msg.'</p></form>';
    require_once('gabaritCreerEmploye.php');
 }
 function afficherErreurSuppre2C($contrat){
    $contenu0='';
    foreach($contrat as $ligne){
        $contenu0.='<p><input type="checkbox" name="caseTCO[]" value="'.$ligne->nomContrat.'">'.$ligne->nomContrat.'</p>';
    }
    $contenue='<form class="f1" action="frontal.php" method="post">
    <p><label>Liste des contrats  proposes par AwaBank :</label>'.$contenu0.'</p>
    <input type="submit" name="supprimerTCO" value="Supprimer">
    <input type="submit" name="AC" value="Retour Acceuil">
    <p class="erreur">Cocher aumoins un type de compte a supprimer</p></form>';
    require_once('gabaritCreerEmploye.php');
 }
 // GESTION MODIFIER PIECES
 function afficherchoixCompteOuContrat2(){
    $contenue='<form class="f1" action="frontal.php" method="post">
    <h1><label>Choisissez une option !</h1>
    <input type="submit" name="piecesContrat" value="Modifier pieces contrat">
     <input type="submit" name="piecesCompte" value="Modifier pieces compte">
     <input type="submit" name="AC" value="Retour Acceuil">
    </form>';

    require_once('gabaritCreerEmploye.php');
 }
 function afficherZoneChoistypeContrat($contrat){
    $contenu0='';
    foreach($contrat as $ligne){
        $contenu0.='<option value="'.$ligne->nomContrat.'">'.$ligne->nomContrat.'</option>';
    }
    $contenue='<form class="f1" action="frontal.php" method="post">
    <p><label>Listes de contrats  proposes par AwaBank :</label><select 
    name="ctrtChoisit">'.$contenu0.'</select>
    <input type="submit" name="MDFpices" value="choisir et modifier">
    <input type="submit" name="AC" value="Retour Acceuil"></p>

    </form>';

    require_once('gabaritCreerEmploye.php');
 }
 function afficherpieceContrat($pieces,$contrat){
    $contenu0='';
    foreach($pieces as $ligne){
        $contenu0.='<option value="'.$ligne->pieces.'">'.$ligne->pieces.'</option>';
    }
    $contenue='<form class="f1" action="frontal.php" method="post">
    <input class="x" type="text" name="ctrt" value="'.$contrat.'">
    <p><label>Listes des pieces du contrats '.$contrat.' : </label><select 
    name="pieceChoisit">'.$contenu0.'</select>
     <input type="submit" name="MDFlapiece" value="Supprimer">
    <input type="submit" name="ajouterLaPieces" value="Ajouter pieces Requis">
    <input type="submit" name="AC" value="Retour Acceuil"></p>
    </form>';

    require_once('gabaritCreerEmploye.php');

 }
 function afficherErreurSupprePiecs($pieces,$contrat){
    $contenu0='';
    foreach($pieces as $ligne){
        $contenu0.='<option value="'.$ligne->pieces.'">'.$ligne->pieces.'</option>';
    }
    $contenue='<form class="f1" action="frontal.php" method="post">
    <input class="x" type="text" name="ctrt" value="'.$contrat.'">
    <p><label>Listes des pieces du contrats '.$contrat.' : </label><select 
    name="pieceChoisit">'.$contenu0.'</select>
     <input type="submit" name="MDFlapiece" value="Supprimer">
    <input type="submit" name="ajouterLaPieces" value="Ajouter pieces Requis">
    <input type="submit" name="AC" value="Retour Acceuil"></p>
    <p class="erreur">Le champs est vide !</p>
    </form>';

    require_once('gabaritCreerEmploye.php');

 }

 // GESTION AJOUT PIECES CONTRAT
 function afficherZoneAjoutPiece($contrat){
    $contenue='<form action="frontal.php" method="post"><fieldset><legend>Ajouter pieces</legend>
    <p><label></label><input class="x" type="text" name="contratSelec" value="'.$contrat.'"></p> 
    <p><strong>Contrat selectionne : </strong> '.$contrat.'</p> 
    <p><label>Enter le nom de la pieces : </label><input type="text" name="pieceAajouter"
    pattern="[a-zA-Z]+*" title="Saisissez uniquement des lettres A-Z" ></p>
    <p><input type="submit" name="btnAjoutP" value="Ajouter">
    <input type="submit" name="AC" value="Retour Acceuil"></p></form> ';
    require_once('gabaritCreerEmploye.php');
 }
 function afficherErreurAjoutPeces($msg,$contrat){
    $contenue='<form action="frontal.php" method="post"><fieldset><legend>Ajouter pieces</legend>
    <p><label></label><input class="x" type="text" name="contratSelec" value="'.$contrat.'"></p> 
    <p><strong>Contrat selectionne : </strong> '.$contrat.'</p> 
    <p><label>Enter le nom de la pieces : </label><input type="text" name="pieceAajouter"
    pattern="[a-zA-Z]+*" title="Saisissez uniquement des lettres A-Z" ></p>
    <p><input type="submit" name="btnAjoutP" value="Ajouter">
    <input type="submit" name="AC" value="Retour Acceuil"></p>
    <p>'.$msg.'</p></form> ';
    require_once('gabaritCreerEmploye.php');

 }
 function afficherZoneAjoutPieceConfirmation($contrat){
    $contenue='<form action="frontal.php" method="post"><fieldset><legend>Ajouter pieces</legend>
    <p><label></label><input class="x" type="text" name="contratSelec" value="'.$contrat.'"></p> 
    <p><strong>Contrat selectionne : </strong> '.$contrat.'</p> 
    <p><label>Enter le nom de la pieces : </label><input type="text" name="pieceAajouter"></p>
    <p><input type="submit" name="btnAjoutP" value="Ajouter">
    <input type="submit" name="AC" value="Retour Acceuil"></p>
    <p class="confirmation">Pieces ajouter !</p></form> ';
    require_once('gabaritCreerEmploye.php');

}
 // GESTION AJOUT PIECES COMPTE
 
function afficherZoneChoistypeCompte($compte){
    $contenu0='';
    foreach($compte as $ligne){
        $contenu0.='<option value="'.$ligne->nomCompte.'">'.$ligne->nomCompte.'</option>';
    }
    $contenue='<form class="f1" action="frontal.php" method="post">
    <p><label>Listes des comptes  proposes par AwaBank :</label><select 
    name="cmptChoisit">'.$contenu0.'</select>
    <input type="submit" name="MDFpices2" value="choisir et modifier">
    <input type="submit" name="AC" value="Retour Acceuil"></p>
    </form>';

    require_once('gabaritCreerEmploye.php');
}
function afficherpieceCompte($pieces,$compte){
    $contenu0='';
    foreach($pieces as $ligne){
        $contenu0.='<option value="'.$ligne->pieces.'">'.$ligne->pieces.'</option>';
    }
    $contenue='<form class="f1" action="frontal.php" method="post">
    <input class="x" type="text" name="ctrt2" value="'.$compte.'">
    <p><label>Listes des pieces du contrats '.$compte.' : </label><select 
    name="pieceChoisit2">'.$contenu0.'</select>
        <input type="submit" name="MDFlapiece2" value="Supprimer">
    <input type="submit" name="ajouterLaPieces2" value="Ajouter pieces Requis">
    <input type="submit" name="AC" value="Retour Acceuil"></p>
    </form>';
    require_once('gabaritCreerEmploye.php');
}
function afficherErreurSupprePiecs2($pieces,$compte){
    $contenu0='';
    foreach($pieces as $ligne){
        $contenu0.='<option value="'.$ligne->pieces.'">'.$ligne->pieces.'</option>';
    }
    $contenue='<form class="f1" action="frontal.php" method="post">
    <input class="x" type="text" name="ctrt2" value="'.$compte.'">
    <p><label>Listes des pieces du contrats '.$compte.' : </label><select 
    name="pieceChoisit2">'.$contenu0.'</select>
     <input type="submit" name="MDFlapiece2" value="Supprimer">
    <input type="submit" name="ajouterLaPieces2" value="Ajouter pieces Requis">
    <input type="submit" name="AC" value="Retour Acceuil"></p>
    <p class="erreur">Le champs est vide !</p>
    </form>';

    require_once('gabaritCreerEmploye.php');
}
function  afficherZoneAjoutPiece2( $comptes){
    $contenue='<form action="frontal.php" method="post"><fieldset><legend>Ajouter pieces</legend>
    <p><label></label><input class="x" type="text" name="contratSelec2" value="'.$comptes.'"></p> 
    <p><strong>Compte selectionne : </strong> '.$comptes.'</p> 
    <p><label>Enter le nom de la pieces : </label><input type="text" name="pieceAajouter2"
    pattern="[a-zA-Z]+*" title="Saisissez uniquement des lettres A-Z" > ></p>
    <p><input type="submit" name="btnAjoutP2" value="Ajouter">
    <input type="submit" name="AC" value="Retour Acceuil"></p></form> ';
    require_once('gabaritCreerEmploye.php');
}
function afficherZoneAjoutPieceConfirmation2($comptes){
    $contenue='<form action="frontal.php" method="post"><fieldset><legend>Ajouter pieces</legend>
    <p><label></label><input class="x" type="text" name="contratSelec2" value="'.$comptes.'"></p> 
    <p><strong>Compte selectionne : </strong> '.$comptes.'</p> 
    <p><label>Enter le nom de la pieces : </label><input type="text" name="pieceAajouter2"
    pattern="[a-zA-Z]+*" title="Saisissez uniquement des lettres A-Z" ></p>
    <p><input type="submit" name="btnAjoutP2" value="Ajouter">
    <input type="submit" name="AC" value="Retour Acceuil"></p>
    <p class="confirmation">Pieces ajouter !</p></form> ';
    require_once('gabaritCreerEmploye.php');
}
function afficherErreurAjoutPeces2($msg,$comptes){
    $contenue='<form action="frontal.php" method="post"><fieldset><legend>Ajouter pieces</legend>
    <p><label></label><input class="x" type="text" name="contratSelec2" value="'.$comptes.'"></p> 
    <p><strong>Contrat selectionne : </strong> '.$comptes.'</p> 
    <p><label>Enter le nom de la pieces : </label><input type="text" name="pieceAajouter2"
    pattern="[a-zA-Z]+*" title="Saisissez uniquement des lettres A-Z" ></p>
    <p><input type="submit" name="btnAjoutP2" value="Ajouter">
    <input type="submit" name="AC" value="Retour Acceuil"></p>
    <p class="erreur">'.$msg.'</p></form> ';
    require_once('gabaritCreerEmploye.php');
}
// GESTION STATISTIQUE
function  ctlafficherZoneStatistique(){
    $contenue='<form class="f1" action="frontal.php" method="post">
    <h1><label>Choisissez une option !</h1>
    <p>
    <input type="submit" name="nbrcs" value="Nombre contrats souscrit">
      <input type="submit" name="nbrRdv" value="Nombre de rendez vous">
    </p>
    <p>
     <input type="submit" name="nbrClient" value="Nombre total de clients">
      <input type="submit" name="soldeTot" value="Solde total">
     </p>
    <p> <input type="submit" name="AC" value="Retour Acceuil"></p>
    </form>';

    require_once('gabaritCreerEmploye.php');
}
function  afficherZoneNbrcs(){
    $contenue='<form class="f1" action="frontal.php" method="post">
    <h1><label>Entrer un intervalle de date !</h1>
    <p><input type="date" name="date1" >
    <input type="date" name="date2"></p>
      <p><input type="submit" name="aficher" value="Valider">
      <input type="submit" name="AC" value="Retour Acceuil"></p>
    </p>
    </form>';
    require_once('gabaritCreerEmploye.php');
}
function  affciherNbrContrat($nbrContrat,$date1,$date2){
    $contenue='<form class="f1" action="frontal.php" method="post">
    <h1><label>Entrer un intervalle de date !</h1>
    <p><input type="date" name="date1" placeholder="Date 1">
    <input type="date" name="date2" placeholder="Date 2"></p>
      <p><input type="submit" name="aficher" value="Valider">
      <input type="submit" name="AC" value="Retour Acceuil"></p>
    <p>'.$nbrContrat.'  Contrats souscrit  entre '.$date1.' et '.$date2.'</p>
    </form>';
    require_once('gabaritCreerEmploye.php');
}
function afficherErreurDate($msg){
    $contenue='<form class="f1" action="frontal.php" method="post">
    <h1><label>Entrer un intervalle de date !</h1>
    <p><input type="date" name="date1" placeholder="Date 1">
    <input type="date" name="date2" placeholder="Date 2"></p>
    <p class="erreur">'.$msg.'</p>
      <p><input type="submit" name="aficher" value="Valider">
      <input type="submit" name="AC" value="Retour Acceuil"></p>
      
    </p>
    </form>';
    require_once('gabaritCreerEmploye.php');
}
function afficherZonenbrClient(){
    $contenue='<form class="f1" action="frontal.php" method="post">
    <h1><label>Entrer une date !</h1>
    <p><input type="date" name="date3" >
      <p><input type="submit" name="afficher" value="Valider">
      <input type="submit" name="AC" value="Retour Acceuil"></p>
    </p>
    </form>';
    require_once('gabaritCreerEmploye.php');
}

function afficherZonenbrClientConfirmation($nbrTotalClient,$date3){
    $contenue='<form class="f1" action="frontal.php" method="post">
    <h1><label>Entrer une date !</h1>
    <p><input type="date" name="date3" >
      <p><input type="submit" name="afficher" value="Valider">
      <input type="submit" name="AC" value="Retour Acceuil"></p>
    <p>'.$nbrTotalClient.' Clients depuis '.$date3.'</p>
    </form>';
    require_once('gabaritCreerEmploye.php');
}
function afficherErreurDate2($msg){
    $contenue='<form class="f1" action="frontal.php" method="post">
    <h1><label>Entrer une date !</h1>
    <p><input type="date" name="date3" >
    <p class="erreur">'.$msg.'</p>
      <p><input type="submit" name="afficher" value="Valider">
      <input type="submit" name="AC" value="Retour Acceuil"></p>
     </p>
    </form>';
    require_once('gabaritCreerEmploye.php');
}
function afficherZoneSoldeTot(){
    $contenue='<form class="f1" action="frontal.php" method="post">
    <h1><label>Entrer une date !</h1>
    <p><input type="date" name="date4" >
      <p><input type="submit" name="afficher1" value="Valider">
      <input type="submit" name="AC" value="Retour Acceuil"></p>
    </p>
    </form>';
    require_once('gabaritCreerEmploye.php');
}
function afficherafficherSoldeTot($total,$date4){
    $contenue='<form class="f1" action="frontal.php" method="post">
    <h1><label>Entrer une date !</h1>
    <p><input type="date" name="date4" >
      <p><input type="submit" name="afficher1" value="Valider">
      <input type="submit" name="AC" value="Retour Acceuil"></p>
    <p>'.$total.' Euro depuis '.$date4.'</p>
    </form>';
    require_once('gabaritCreerEmploye.php');
}
function afficherErreurDate3($msg){
    $contenue='<form class="f1" action="frontal.php" method="post">
    <h1><label>Entrer une date !</h1>
    <p><input type="date" name="date4" >
    <p class="erreur">'.$msg.'</p>
      <p><input type="submit" name="afficher1" value="Valider">
      <input type="submit" name="AC" value="Retour Acceuil"></p>
     </p>
    </form>';
    require_once('gabaritCreerEmploye.php');
}
function  afficherZonenbrRDV(){
    $contenue='<form class="f1" action="frontal.php" method="post">
    <h1><label>Entrer un intervalle de date !</h1>
    <p><input type="date" name="date5">
    <input type="date" name="date6"></p>
      <p><input type="submit" name="afficher3" value="Valider">
      <input type="submit" name="AC" value="Retour Acceuil"></p>
    </p>
    </form>';
    require_once('gabaritCreerEmploye.php');
}
function affciherNbrRDV( $nbrRdv,$date1,$date2){
    $contenue='<form class="f1" action="frontal.php" method="post">
    <h1><label>Entrer un intervalle de date !</h1>
    <p><input type="date" name="date5">
    <input type="date" name="date6"></p>
      <p><input type="submit" name="afficher3" value="Valider">
      <input type="submit" name="AC" value="Retour Acceuil"></p>
    </p>
    <p>'.$nbrRdv.'  Rendez vous pris par les agents d\'acceuil  entre '.$date1.' et '.$date2.'</p>
    </form>';
    require_once('gabaritCreerEmploye.php');

}
function afficherErreurDate4($msg){
    $contenue='<form class="f1" action="frontal.php" method="post">
    <h1><label>Entrer un intervalle de date !</h1>
    <p><input type="date" name="date5">
    <input type="date" name="date6"></p>
    <p class="erreur">'.$msg.'</p>
      <p><input type="submit" name="afficher3" value="Valider">
      <input type="submit" name="AC" value="Retour Acceuil"></p>
    </p>
    </form>';
    require_once('gabaritCreerEmploye.php');
}
function afficherZoneplanning2(){
    $contenue0='';
    $contenue='<form class="f1" action="frontal.php" method="post">
    <p class="btnP"><input type="submit" name="PJ" value="Afficher planning du jour">
    <input type="submit" name="PC" value="Afficher planning d\'un conseiller">
    </p> </form>';
    require_once('planing.php');
}
function afficherZoneChoixjour(){
    $contenue0='';
    $contenue='<form class="f1" action="frontal.php" method="post">
    <h1>Choisissez une date</h1>
    <p><input type="date" name="jour">
    <input type="submit" name="AP" value="Afficher">
    <input type="submit" name="annuler" value="Retour Acceuil">
</p> </form>';
    require_once('planing.php');
}
function afficherTaches($taches,$date){
    $contenue0='';
    $contenue='<form class="f1" action="frontal.php" method="post">
    <table>
    <tr><th colspan="6">Planning du '.$date.'</th></tr><tr><th>id Rdv</th><th>Motif</th>
    <th>Date</th><th>Heure</th><th>id client</th>
    <Th>id du charger</Th></tr>';
    foreach($taches as $ligne){
        $contenue0.="<tr><td>$ligne->idRdv</td><td>$ligne->motif</td>
        <td>$ligne->dateRdv</td><td>$ligne->heureRdv</td><td>$ligne->idClient</td>
        <td>$ligne->idConseiler </td></tr>";
    }
    $contenue.=$contenue0.'</table>
    <p><input type="submit" name="annuler" value="Retour Acceuil"></p></form>';
    require_once('planing.php');
}
function affihcherErplaning($msg){
    $contenue0='';
    $contenue='<form class="f1" action="frontal.php" method="post">
    <h1>Choisissez une date</h1>
    <p><input type="date" name="jour">
    <input type="submit" name="AP" value="Afficher">
    <input type="submit" name="annuler" value="Retour Acceuil">
    </p> 
    <p>'.$msg.'</p></form>';
    require_once('planing.php');
}
function  afficherZoneidConseiller(){
    $contenue0='';
    $contenue='<form class="f1" action="frontal.php" method="post">
    <p>Entrer l\'id du conseiller : <input type="text" size="5" name="idconseillerx"</p>
    <p>Choisissez une date : <input type="date" name="datx"
    pattern="[0-9]+"  title="Saisissez uniquement des chiffres de 0 à 9 "></p>
    <input type="submit" name="afficherPC" value="Afficher">
    <input type="submit" name="annuler" value="Retour Acceuil"></p>
    </form>';
    require_once('planing.php');
}
function affihcherErId($msg){
    $contenue0='';
    $contenue='<form class="f1" action="frontal.php" method="post">
    <p>'.$msg.'</p>
    <input type="submit" name="annuler" value="Retour Acceuil">';
    require_once('planing.php');
}
function affichertachesDuconseiller($taches,$date){
    $contenue0='';
    $contenue='<form class="f1" action="frontal.php" method="post">
    <p>Planning du Conseiller : <select name="plage">';
    foreach ($taches as $ligne){
        $contenue0.='<option value="'.$ligne->idClient.'"> id Rendez vous : '. $ligne->idRdv .
        ' Motif : '. $ligne->motif.' Date : '. $ligne->dateRdv.' Heure : '. $ligne->heureRdv
        .' id Client : '. $ligne->idClient.' id charger : ' .$ligne->idConseiler.'</option>';
    }
    $contenue.= $contenue0.'</select> 
    <input class="x" type="text" name="day" value="'.$date.'">
    <input type="submit" name="afficherSts" value="Afficher Synthese">
    <p><input type="submit" name="annuler" value="Retour Acceuil"></p></form>';
    require_once('planing.php');
}
function affichertachesDuconseiller2($taches,$date){
    $contenue0='';
    $contenue='<form class="f1" action="frontal.php" method="post">
    <p>Planning du Conseiller :</p>';
    foreach ($taches as $ligne){
        $contenue0.='<p>A cette date suivante "'.$date.'" le conseiller a
        bloquer un crenaux pour motif "'.$ligne->motif.'"';
    }
    $contenue.= $contenue0.'
    <p><input type="submit" name="annuler" value="Retour Acceuil"></p></form>';
    require_once('planing.php');
}
function affihcherErplaningDuconseiller($msg){
    $contenue0='';
    $contenue='<form class="f1" action="frontal.php" method="post">
    <p>Entrer l\'id du conseiller : <input type="text" size="5" name="idconseillerx"</p>
    <p>Choisissez une date : <input type="date" name="datx"
    pattern="[0-9]+"  title="Saisissez uniquement des chiffres de 0 à 9 "></p>
    <input type="submit" name="afficherPC" value="Afficher">
    <input type="submit" name="annuler" value="Retour Acceuil"></p>
    <p>'.$msg.'</p>
    </form>';
    require_once('planing.php');
}

function afficherSyntheseClient2($information,$contrats,$comptes,$pieces){
    $contenue7='';
    $contenue8='';
    $contenue6='';
    foreach($pieces as $ligne){
        $contenue6.=$ligne->pieces.'</br>';
    }
    $contenue5='<p>Pieces a fournir requis pour le rendez vous</p>
    <p>'.$contenue6.'</p>';
    $contenue1="";
    $erreur1='';
    $contenue2="";
    $contenue10='';
    $contenue0='';
    $contenue15='';
    $contenue3='<table class="tab3"><tr><th colspan="4">liste des contrats du
     client</th></tr><tr><th>Id du contrat</th><th>nom du contrat</th><th>Mensualite</th>
     <th>Date douverture</th></tr>';
    $contenue4='<table class="tab2"><tr><th colspan="5">liste des comptes du
     client </th></tr><tr><th>Id du compte</th><th>nom du compte</th>
     <th>Decouvert autoriser</th><th>solde</th><th>Date d\'ouverture</th></tr>';
    $erreur1='';
    $contenue1='<table><tr><th colspan="11">Information du client</th><tr><th
    >Id du client</th><th>Nom</th><th>Prenom</th><th>Date de naissance</th><th>Adresse</th>
    <th>Numero de telephone</th><th>Email</th><th>Profession</th><th>Situation
    familiale</th><th>Charger client</th><th>Date d\'inscription</th></tr>
    <tr><td> '.$information->idClient .'</td> <td> '.$information->nom .'</td>  
    <td> '.$information->prenom .'</td> <td> '.$information->dateDeNaissance .'</td> 
    <td> '.$information->adresse .'</td> <td> '.$information->numeroTel .'</td> 
    <td> '.$information->email .'</td> <td> '.$information->profession .'</td> 
    <td> '.$information->situationFamiliale .'</td>  <td> '.$information->chargerClient 
    .'</td>  <td> '.$information->dateInscription .'</td> </table>';

    foreach($contrats as $ligne){
        $contenue2.='<tr><td>'.$ligne->idContrat.'</td><td>'.$ligne->nomducontrat.'</td>
        <td>'.$ligne->Mensualite.'</td><td>'.$ligne->dateouverture.'</td></tr>';
    }
    $contenue3.=$contenue2.'</table>';

    foreach($comptes as $ligne){
        $contenue0.='<tr><td>'.$ligne->idCompte.'</td><td>'.$ligne->nomducompte.'</td>
        <td>'.$ligne->Decouvertautoriser.'</td><td>'.$ligne->solde.'</td><td>'.$ligne->Dateouverture.'</tr>';
    }
    $contenue4.=$contenue0.'</table>';
    $contenue10='<form class="f1" action="frontal.php" method="post"><fieldset><legend>Synthese du Client</legend>'.$contenue1.'<p>
    </p>'.$contenue3.'<p></p>'.$contenue4.'</fieldset>
    <p class="midel">'.$contenue5.'<p>
    <p><input type="submit" name="annuler" value="Retour Acceuil"><p></form>';
    require_once('gabritSynthese2.php');
}





function afficherSyntheseSansContratSansCompte22(){
    $contenue7='';
    $contenue8='';
    $contenue6='';
    $contenue2='<p>Pieces a fournir requis pour le rendez vous</p>
    <p>'.$contenue8.'</p>';
    $contenue5='';
    $contenue1="";
    $erreur1='';
    $contenue2="";
    $contenue10='';
    $contenue0='';
    $contenue15='';
    $contenue5='<table><tr><th colspan="11">Information du client</th><tr><th>Id du client
    </th><th>Nom</th><th>Prenom</th><th>Date de naissance</th><th>Adresse</th>
    <th>Numero de telephone</th><th>Email</th><th>Profession</th><th>Situation familiale
    </th><th>Charger client</th><th>Date d\'inscription</th></tr>
    <tr><td> '.$information->idClient .'</td> <td> '.$information->nom .'</td>  
    <td> '.$information->prenom .'</td> <td> '.$information->dateDeNaissance .'</td> 
    <td> '.$information->adresse .'</td> <td> '.$information->numeroTel .'</td> <td> 
    '.$information->email .'</td> <td> '.$information->profession .'</td> 
    <td> '.$information->situationFamiliale .'</td>  <td> '.$information->chargerClient .
    '</td>  <td> '.$information->dateInscription .'</td> </table>';

    $contenue6='<table class="tab4"><tr><th>Liste des contrats du client</th></tr><tr><th>
    Ce client n\'a pas encore de contrats</th></tr></table>';
    $contenue7='<table class="tab4"><tr><th>Liste des comptes du client</th></tr><tr><th>
    Ce client n\'a pas encore de comptes</th></tr></table>';
    $contenue8='<form class="f1" action="frontal.php" method="post"><fieldset><legend>Synthese du Client</legend>'.$contenue5.
    '<p></p>'.$contenue6.'<p></p>'.$contenue7.'</fieldset>
    <p class="midel">'.$contenue2.'<p>
    <p><input type="submit" name="annuler" value="Retour Acceuil"><p></form>';

    require_once('gabritSynthese2.php');
}
function afficherSyntheseSansContratSansCompte2($information,$pieces){
    $contenue7='';
    $contenue8='';

    $contenue6='';
    foreach($pieces as $ligne){
        $contenue8.=$ligne->pieces.'</br>';
    }
    $contenue2='<p>Pieces a fournir requis pour le rendez vous</p>
    <p>'.$contenue8.'</p>';
    $contenue5='';
    $contenue1="";
    $erreur1='';
    $contenue2="";
    $contenue10='';
    $contenue0='';
    $contenue15='';
    $contenue5='<table><tr><th colspan="11">Information du client</th><tr><th>Id du client
    </th><th>Nom</th><th>Prenom</th><th>Date de naissance</th><th>Adresse</th>
    <th>Numero de telephone</th><th>Email</th><th>Profession</th><th>Situation familiale
    </th><th>Charger client</th><th>Date d\'inscription</th></tr>
    <tr><td> '.$information->idClient .'</td> <td> '.$information->nom .'</td>  
    <td> '.$information->prenom .'</td> <td> '.$information->dateDeNaissance .'</td> 
    <td> '.$information->adresse .'</td> <td> '.$information->numeroTel .'</td> <td> 
    '.$information->email .'</td> <td> '.$information->profession .'</td> 
    <td> '.$information->situationFamiliale .'</td>  <td> '.$information->chargerClient .
    '</td>  <td> '.$information->dateInscription .'</td> </table>';

    $contenue6='<table class="tab4"><tr><th>Liste des contrats du client</th></tr><tr><th>
    Ce client n\'a pas encore de contrats</th></tr></table>';
    $contenue7='<table class="tab4"><tr><th>Liste des comptes du client</th></tr><tr><th>
    Ce client n\'a pas encore de comptes</th></tr></table>';
    $contenue8='<form class="f1" action="frontal.php" method="post"><fieldset><legend>Synthese du Client</legend>'.$contenue5.
    '<p></p>'.$contenue6.'<p></p>'.$contenue7.'</fieldset>
    <p class="midel">'.$contenue2.'<p>
    <p><input type="submit" name="annuler" value="Retour Acceuil"><p></form>';

    require_once('gabritSynthese2.php');
}
function afficherSyntheseSansContrat2($information,$comptes,$pieces){
    $contenue7='';
    $contenue0='';
    $contenue4='';
    $contenue8='';
    $contenue6='';
    foreach($pieces as $ligne){
        $contenue8.=$ligne->pieces.'</br>';
    }
    $contenue7='<p>Pieces a fournir requis pour le rendez vous</p>
    <p>'.$contenue8.'</p>';
    $contenue5='';
    $contenue1="";
    $erreur1='';
    $contenue2="";
    $contenue10='';
     $contenue4='<table class="tab2"><tr><th colspan="5">liste des comptes du 
     client </th></tr><tr><th>Id du compte</th><th>nom du compte</th><th>Decouvert 
     autoriser</th><th>solde</th><th>Date d\'ouverture</th></tr>';
    $contenue15='';
    $contenue5='<table><tr><th colspan="11">Information du client</th><tr><th>Id 
    du client</th><th>Nom</th><th>Prenom</th><th>Date de naissance</th><th>Adresse</th>
    <th>Numero de telephone</th><th>Email</th><th>Profession</th><th>Situation 
    familiale</th><th>Charger client</th><th>Date d\'inscription</th></tr>
    <tr><td> '.$information->idClient .'</td> <td> '.$information->nom .'</td>  
    <td> '.$information->prenom .'</td> <td> '.$information->dateDeNaissance .'</td> 
    <td> '.$information->adresse .'</td> <td> '.$information->numeroTel .'</td> 
    <td> '.$information->email .'</td> <td> '.$information->profession .'</td> 
    <td> '.$information->situationFamiliale .'</td>  <td> '.$information->chargerClient .
    '</td>  <td> '.$information->dateInscription .'</td> </table>';
    $contenue6='<table class="tab4"><tr><th>Liste des contrats du client</th></tr><tr><th>
    Ce client n\'a pas encore de contrats</th></tr></table>';
    foreach($comptes as $ligne){
        $contenue0.='<tr><td>'.$ligne->idCompte.'</td><td>'.$ligne->nomducompte.'</td>
        <td>'.$ligne->Decouvertautoriser.'</td><td>'.$ligne->solde.'</td><td>'.$ligne->Dateouverture.'</tr>';
    }
    $contenue4.=$contenue0.'</table>';
    $contenue10='<form class="f1" action="frontal.php" method="post"><fieldset><legend>Synthese du Client</legend>'.$contenue5.'<p>
    </p>'.$contenue6.'<p></p>'.$contenue4.'</fieldset>
    <p class="midel">'.$contenue7.'<p>
    <p><input type="submit" name="annuler" value="Retour Acceuil"><p></form>';
    require_once('gabritSynthese2.php');
}
function afficherSyntheseSansCompte2($information,$contrats,$pieces){
    $contenue7='';
    $contenue0='';
    $contenue4='';
    $contenue8='';
    $contenue6='';
    foreach($pieces as $ligne){
        $contenue8.=$ligne->pieces.'</br>';
    }
    $contenue7='<p>Pieces a fournir requis pour le rendez vous</p>
    <p>'.$contenue8.'</p>';
    $contenue5='';
    $contenue1="";
    $erreur1='';
    $contenue3='<table class="tab3"><tr><th colspan="4">liste des contrats du client</th>
    </tr><tr><th>Id du contrat</th><th>nom du contrat</th><th>Mensualite</th><th>Date douverture</th></tr>';
    $contenue2="";
    $contenue10='';
     $contenue4='<table class="tab2"><tr><th colspan="5">liste des comptes du client </th>
     </tr><tr><th>Id du compte</th><th>nom du compte</th><th>Decouvert autoriser</th><th>solde</th><th>Date d\'ouverture</th></tr>';
    $contenue15='';
    $contenue5='<table><tr><th colspan="11">Information du client</th><tr>
    <th>Id du client</th><th>Nom</th><th>Prenom</th><th>Date de naissance</th><th>Adresse</th>
    <th>Numero de telephone</th><th>Email</th><th>Profession</th><th>Situation
     familiale</th><th>Charger client</th><th>Date d\'inscription</th></tr>
    <tr><td> '.$information->idClient .'</td> <td> '.$information->nom .'</td>  
    <td> '.$information->prenom .'</td> <td> '.$information->dateDeNaissance .'</td> 
    <td> '.$information->adresse .'</td> <td> '.$information->numeroTel .'</td> <td> 
    '.$information->email .'</td> <td> '.$information->profession .'</td> 
    <td> '.$information->situationFamiliale .'</td>  <td> '.$information->chargerClient 
    .'</td>  <td> '.$information->dateInscription .'</td> </table>';
    $contenue6='<table class="tab4"><tr><th>Liste des contrats du client</th></tr><tr><th>
    Ce client n\'a pas encore de comptes</th></tr></table>';
    foreach($contrats as $ligne){
        $contenue2.='<tr><td>'.$ligne->idContrat.'</td><td>'.$ligne->nomducontrat.
        '</td><td>'.$ligne->Mensualite.'</td><td>'.$ligne->dateouverture.'</td></tr>';
    }
    $contenue3.=$contenue2.'</table>';
    $contenue10='<form class="f1" action="frontal.php" method="post"><fieldset><legend>Synthese du Client</legend>'.$contenue5.'<p>
    </p>'.$contenue3.'<p></p>'.$contenue6.'</fieldset>
    <p class="midel">'.$contenue7.'<p>
    <p><input type="submit" name="annuler" value="Retour Acceuil"><p></form>';
    require_once('gabritSynthese2.php');
}
