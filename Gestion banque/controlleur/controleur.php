<?php
require_once('../vue/vue.php');
require_once('../modele/modele.php');

// POUR LA GESTION DE CONNEXION 

function ctlAfficherAcceuil(){
    afficherAcceuil();
}

function ctlCheckUser($login,$motDepasse){
    $user=checkUser($login,$motDepasse);
    if(checkUser($login,$motDepasse)== NULL){
        throw new exception ("Utilisateur introuvable !");
    }
    else if( $user->categorie=='directeur'){
        afficherGabritDirecteur();
    }
    else if( $user->categorie=='agent'){
        afficherGabritAgent($user->nom);
    }
    else if( $user->categorie=='conseiller'){
        afficherGabritConseiller($user->nom);
    }
}
// FIN GESTION CONNEXION --------------------------------------------------------------



// GESTION RDV

function  ctlafficherPriseRDVNouveau(){
    $motifrdv=getMotifRdv();
    afficherPriseRDVNouveau( $motifrdv);
}
function ctlAfficherErreurdRdvN($msg){
    $motifrdv=getMotifRdv();
    AfficherErreurdRdvN($msg,$motifrdv);
}
function  ctlRdvNouveau($date,$heure,$motif,$numero){
    if(empty($date)||empty($heure)||empty($motif)||empty($numero)){
        throw new exception("l'un des champs est vide !");
    }
    elseif(strlen($numero)<10){
        throw new exception("le numero est incorrecte !");
    }
    elseif($date<date("Y-m-d")){
        throw new exception("La date entree est anterieur a la date courante ! ");
    }
    elseif(!($heure > '07:00:00' && $heure < '19:00:00')){
        throw new exception(" Veuillez choisir un rendez vous entre 8H et 18H ! ");
    }
    elseif(verificationRDVdouble2($numero,$date,$heure)!=NULL){
        throw new exception("Vous avez deja un rendez vous sur le meme crenaux !");
    }
    else{
        $tousLesConseiller=getConseiller();
        $lesConseillerDipo=[];
        foreach($tousLesConseiller as $conseiller){
            if(getconseilerIndsipo($date,$heure,$conseiller->idEmploye)==NULL){
                array_push($lesConseillerDipo, $conseiller->idEmploye);
            }
        }
        if(count($lesConseillerDipo)==0){
            throw new exception ("Aucun conseiller nest disponible a cette date");
        }
        else{
            $idConseiller=$lesConseillerDipo[array_rand($lesConseillerDipo)];
            $infoConseiller=getInfoEmploye($idConseiller);
            enregisterRdv2($idConseiller,$date,$heure,$motif, $numero);
            bloquerCrenaaux2($idConseiller,$date,$heure,$motif);
            $pices=getPieces($motif);
            afficherConfirmationRdvN($date,$heure,$motif,$infoConseiller,$numero, $pices);
        }
    }
}

function ctlrdv($id){
    if(empty($id)){
        throw new exception('le champs est vide !');
    }
    else if(getInfoClient($id)==NULL){
        throw new exception('Ce Id ne correspond a aucun client !');
    }
    else{
        $infoClient=getInfoClient($id);
        $idChargerClient=getInfoClient($id)->chargerClient;
        $infoChargerClient=getInfoEmploye($idChargerClient);
        afficherChargerClient($infoClient,$idChargerClient,$infoChargerClient);
    }
}

function CTlafficherZonePlanning($idCharger,$idClient){
    $infoChargerClient=getInfoEmploye($idCharger);
    $infoClient=getInfoClient($idClient);
    afficherZonePlanning($infoChargerClient,$infoClient);
}
function ctlPlannig($idCharger,$idClient,$date){
    if(empty($date)){
        throw new exception('le champs est vide !');
    }
    else{
        $indisponibilite=getIndisponibilite($idCharger);
        $x=[];
        for ($i = 0; $i < 7; $i++) {
            $currentDate = date('Y-m-d', strtotime($date . " + $i days"));
            array_push($x, $currentDate);
        }
        $datesIndispo=[];
        $nbrElem=count($x);
        for($i=0; $i < $nbrElem; $i++){
            $verification=verificationDispo($idCharger, $x[$i]);
            if($verification!=NULL){
                $heure= $verification->heure;
                $motif=$verification->motif;
                array_push($datesIndispo,'Indisponible le : '.$x[$i].' a '.$heure.' Motif : '.$motif );
            }
            else{
                array_push($datesIndispo,'disponible le : '.$x[$i].' toute la journee  ');
            }
        }
    }
    afficherIndisponibilite($datesIndispo,$date,$x,$idClient,$idCharger);
}

function ctlRdv2($idCharger,$idClient,$date,$heure,$motif){
    if(empty($date)){
        throw new exception("l'un des champs est vide !");
    }
    elseif(empty($heure)){
        throw new exception("l'un des champs est vide !");
    }
    elseif(empty($motif)){
        throw new exception("l'un des champs est vide !");
    }
    elseif(!($heure > '07:00:00' && $heure < '19:00:00')){
        throw new exception(" Veuillez choisir un rendez vous entre 8H et 18H ! ");
    }
    elseif($date<date("Y-m-d")){
        throw new exception("La date entree est anterieur a la date courante ! ");
    }
    elseif(verificationRdv($idCharger,$date,$heure)!=NULL){
        $motif=getMotif($idCharger,$date,$heure);
        throw new exception ("Le conseiller est indisponible le : $date a $heure  
        Motif : $motif->motif");
    }
    elseif(verificationRDVdouble($idCharger,$date,$heure)!=NULL){
        throw new exception("Vous avez deja un rendez vous sur le meme crenaux !");
    }
    elseif(verificationRdv($idCharger,$date,$heure)==NULL){
        $numeroTel=getInfoClient($idClient)->numeroTel;
        enregisterRdv($idCharger,$date,$heure,$idClient,$motif, $numeroTel);
        $pieces=getPieces($motif);
        $infoClient=getInfoClient($idClient);
        $infoConseiller=getInfoEmploye($idCharger);
        bloquerCrenaaux2($idCharger,$date,$heure,$motif);
       afficherConfirmatifRdv($pieces,$infoClient,$infoConseiller,$date,$heure,$motif);
    }
   
}
function ctlafficherErreurrr($msg,$idCharger,$idClient){
    $motifrdv=getMotifRdv();
    afficherErreurrr($msg,$idCharger,$idClient,$motifrdv);
}
function ctlafficherZonePriseDerdv($idCharger,$idClient){
    $motifrdv=getMotifRdv();
    afficherZonePriseDerdv($idCharger,$idClient, $motifrdv);
}
function ctlAfficherErreurdateRDV($msg,$idCharger,$idClient){
    $infoChargerClient=getInfoEmploye($idCharger);
    $infoClient=getInfoClient($idClient);
    AfficherErreurdateRDV($msg,$infoChargerClient, $infoClient);
}

// FIN GESTION RDV




// GESTION DE SYNTHESE

function  ctlSynthese($idClient){
    $comptesClient=getCompteClientx($idClient);
    $contratsClient=getContratClientx($idClient);
    $infoClient=getInfoClient($idClient);
    if(!ctype_digit($idClient)){
        throw new exception('Format incorrecte !');
    }
    else if($infoClient==NULL){
        throw new exception('Ce Id ne correspond a aucun client !');
    }
    else if($contratsClient==NULL and $comptesClient==NULL){
        afficherSyntheseSansContratSansCompte($infoClient);
    }
    else if($contratsClient==NULL and $comptesClient!=NULL){
        afficherSyntheseSansContrat($infoClient,$comptesClient);
    }
    else if($contratsClient!=NULL and $comptesClient==NULL){
        afficherSyntheseSansCompte($infoClient,$contratsClient);
    }
    else{
        afficherSyntheseClient($infoClient,$contratsClient,$comptesClient);
    }
}

function  ctlSynthese2($idClient,$date){
    $comptesClient=getCompteClientx($idClient);
    $contratsClient=getContratClientx($idClient);
    $infoClient=getInfoClient($idClient);
    $infoRdv=getRdvClientAvecidEtDate($idClient,$date);
    $motif=$infoRdv->motif;
    $pieces=getPieces($motif);
    if($idClient==NULL){
        throw new exception('il nest pas encore client !');
        // afficherSyntheseSansContratSansCompte22();
    }
    else if($contratsClient==NULL and $comptesClient==NULL){
        afficherSyntheseSansContratSansCompte2($infoClient,$pieces);
    }
    else if($contratsClient==NULL and $comptesClient!=NULL){
        afficherSyntheseSansContrat2($infoClient,$comptesClient,$pieces);
    }
    else if($contratsClient!=NULL and $comptesClient==NULL){
        afficherSyntheseSansCompte2($infoClient,$contratsClient,$pieces);
    }
    else{
        afficherSyntheseClient2($infoClient,$contratsClient,$comptesClient,$pieces);
    }
}
// FIN GESTION SYNTHESE ----------------------------------------


// GESTION MODIFICATION CLIENT

function  ctlIdClient($idamodifier){   //Pour verifier si l'id est valide 
    $informationDuclient=getInfoClient($idamodifier);
    if(empty($idamodifier)){
        throw new exception('Veullez remplir ce champs !');
    }
    else if(!ctype_digit($idamodifier)){
        throw new exception('Format incorrecte !');
    }
    else if($informationDuclient==NULL){
        throw new exception('Ce Id ne correspond a aucun client !');
    }
    else{
        afficherInformation($informationDuclient);
    }
} 
// fin de la verification et affichage des information 

function ctlModifierAdresse($nouvelleAdresse,$idDuclientAmodifier){ //pour modifier ladresse
    if(empty($nouvelleAdresse)){
        throw new exception("Impossible d'entrer une adresse vide !");
    }
    else{
        modifierAdresse($nouvelleAdresse,$idDuclientAmodifier);
        $informationDuclient=getInfoClient($idDuclientAmodifier);
        afficherInformation($informationDuclient); // pour reaficher la mise a jour
    }
}

function  ctlAdresse( $idDuclientAmodifier){ //pour afficher la mise a jour des informations
    $x=getInfoClient($idDuclientAmodifier);
    afficherMiseAjourAdresse($x);
}

function ctlEmail($idDuclientAmodifier){ //pour afficher la zonne de modification
    $idClient=getInfoClient($idDuclientAmodifier);
    afficherZoneModifEmail( $idClient);
}
function ctlModifierEmail($nouveauEmail,$idDuclientAmodifier){ //ctl pour modifier lemail et afficher la mise a jour 
    modifierEmail($nouveauEmail,$idDuclientAmodifier);
    $idClient=getInfoClient($idDuclientAmodifier);
    afficherInformation( $idClient);
}
function ctlNumtel( $idDuclientAmodifier){ // ctl pour aficher la zone de modification du num tel
    $x=getInfoClient($idDuclientAmodifier);
    afficherZoneModifNumTel($x);

}
function ctlModifierNumTel( $nouveauNUmTel,$idDuclientAmodifier){ // pour modifer le numero de tel
    if(strlen($nouveauNUmTel)<10){
        throw new exception("Numero de telephone invalide!");
    }

    else{
        modifierNumeroTel($nouveauNUmTel,$idDuclientAmodifier);
        $idClient=getInfoClient($idDuclientAmodifier);
        afficherInformation( $idClient);
    }
}


function  ctlProfession($idDuclientAmodifier){ // pour afficher la zone de modifcation de la profession
    $idClient=getInfoClient($idDuclientAmodifier);
    afficherZoneModifProfession( $idClient);

}
function ctlModifierProfession($nouvelleAdresse,$idDuclientAmodifier){ // pour modifier la profession et afficher la mise a jour 
    modifierProfession($nouvelleAdresse,$idDuclientAmodifier);
    $idClient=getInfoClient($idDuclientAmodifier);
    afficherInformation( $idClient);

}
function ctlSituationF($idDuclientAmodifier){ // pour afficher la zone de modification de la situation Familiale
    $idClient=getInfoClient($idDuclientAmodifier);
    afficherZoneModifSituationF( $idClient);
}
function   ctlModifierSituationF($nouvelleSituation,$idDuclientAmodifier){
    modifierSituationF($nouvelleSituation,$idDuclientAmodifier);
    $idClient=getInfoClient($idDuclientAmodifier);
    afficherInformation( $idClient);

}
function ctlErreurafficherErreurModification($msg,$idDuclientAmodifier){
    $idClient=getInfoClient($idDuclientAmodifier);
    afficherInformationXX( $idClient,$msg);

}

function ctlAnuller( $idDuclientAmodifier){
    $x=getInfoClient($idDuclientAmodifier);
    afficherInformation($x);
}
// FIN GESTION MODIFICATION ____________________________________________________


// GESTION RECHERCHE ID

function ctlRechercheId($nomDuclient,$dateDeNaissance){
    if(empty($dateDeNaissance) || empty($nomDuclient)){
        throw new exception("L'un des champs est vide ! ");
    }
    else if (RechercherId($nomDuclient,$dateDeNaissance)->fetch()==NULL){
        throw new exception("Client innexistant !");
    }
    else if(RechercherId($nomDuclient,$dateDeNaissance)->rowCount()>1){
        afficherZoneDePrecision();
    }
    else{
        $retour=RechercherId($nomDuclient,$dateDeNaissance);
        afficherId($retour->fetch());
    }
}
function ctrlAfficherIdDuClient($numeroTel){
    if(empty($numeroTel)){
        throw new exception("le champs est vide");
    }
    else if(strlen($numeroTel)<10){
        throw new exception("le numero est invalide !");
    }
    else{
        $id=RechercherIdAvecNumeroTel($numeroTel);
        afficherIdx($id->fetch(),$numeroTel);
    }  
}
// FIN GESTION RECHERCHE ID 


// GESTION DEPOT

function ctlAfficherListe($id){
    if(empty($id)){
        throw new exception('le champs est vide !');
    }
    else if(getInfoClient($id)==NULL ){
        throw new exception('Cet id ne correspond a aucun client ');
    }
    else if(getCompteClient($id)->fetch()==NULL  && getInfoClient($id)!=NULL){
        throw new exception('Ce client est enregistre mais n\'a aucun compte ! ');
    }
    else{
        getCompteClient($id);
        afficherComptesClient(getCompteClient($id));
    }
}

function ctlDepot($comptesChoisit){
    if(empty($comptesChoisit)){
        throw new exception('Vous devez selectioner un compte avant de continuer !');
    }
    else{
        $solde=getSolde($comptesChoisit);
        afficherZone2($comptesChoisit,$solde->solde);
    }
}

function ctlFaireDepot($idDuCompte,$ancienSolde,$somme){
    if(empty($somme)){
        throw new exception('Impossible d\'ajouter une somme null !');
    }
    else if($somme<0){
        throw new exception('Impossible d\'ajouter une somme negative !');
    }
    else{
        $soldeA=getSolde($idDuCompte);
        $somme=intval($somme)+intval($soldeA->solde);
        faireDepot($idDuCompte,$somme);
        $solde=getSolde($idDuCompte);
        test($idDuCompte,$solde->solde,$soldeA->solde);
    }
}
function  ctlAfficherErreurDepot($msg,$ancienSolde,$idDuCompte){
    $solde=getSolde($idDuCompte);
    afficherErreurDepot($msg,$solde->solde,$idDuCompte);
}

// FIN GESTION DEPOT

// GESTION RETRAIT

function ctlAfficherListeComptes($id){
    if(empty($id)){
        throw new exception('le champs est vide !');
    }
    else if(getInfoClient($id)==NULL ){
        throw new exception('Cet id ne correspond a aucun client ');
    }
    else if(getCompteClient($id)->fetch()==NULL  && getInfoClient($id)!=NULL){
        throw new exception('Ce client est enregistre mais n\'a aucun compte ! ');
    }
    else{
        getCompteClient($id);
        afficherComptesClientx(getCompteClient($id));
    }
}
function ctlRetrait($comptesChoisit){
    if(empty($comptesChoisit)){
        throw new exception('Vous devez selectioner un compte avant de continuer !');
    }
    else{
        $solde=getSolde($comptesChoisit);
        afficherZone3($comptesChoisit,$solde->solde);
    }
}
function ctlFaireRetrait($idDuCompte,$somme){
    $decouvert=getDecouverAutoriser($idDuCompte);
    $solde=getSolde($idDuCompte);
    if(empty($somme)){
        throw new exception('Impossible de retirer une somme null !');
    }
    else if($somme<0){
        throw new exception('Impossible de retirer une somme negative !');
    }
    else if(intval($solde->solde)-intval($somme)<intval($decouvert->Decouvertautoriser)){
        throw new exception('Impossible de faire le retrait car votre decouvert sera atteint !');
    }

    else{
        $soldeA=getSolde($idDuCompte);
        $somme=intval($solde->solde)-intval($somme);
        faireRetrait($idDuCompte,$somme);
        $solde=getSolde($idDuCompte);
        test2($idDuCompte,$solde->solde,$soldeA->solde);
    }
}
function  ctlAfficherErreurRetrait($msg,$ancienSolde,$idDuCompte){
    $solde=getSolde($idDuCompte);
    afficherErreurRetrait2($msg,$solde->solde,$idDuCompte);
}


//GESTION NOUVEAU CONTRAT
function ctlAfficherQuestion2(){
    if(getTypeContrat()==NULL){ // VERIFIE SI LA BANQIE PROPOSE DES CONTRAT
        throw new exception("La banque ne popose pas de 
        contrat pour le moment ! ");
    }
    else{
        afficherQuestion();
    }

}

function ctlRecupId($numero){ // VERIFIE SI LE NUMERO APPARTIENT A UN CLIENT
    if(empty($numero)){
        throw new exception('Le champs numero doit etre renseigner !');
    }
    else if(strlen($numero)<10){
        throw new exception("Numero de telephone invalide !");
    }
    else if(getIdByNumTel($numero)==NULL){
        throw new exception('Ce numero ne correspond a aucun client !');
    }
    else{  // SI SI LE NUMERO APPARTIENT A UN CLIENT 

        $x=getIdByNumTel($numero); // recupere 'id du client en fonction de son numero 
        $typeContrat=getTypeContrat();  // getTypeContrat() recupere les type de contrats que propose la banque
        afficherNouveauContrat($typeContrat, $x);  // afficher la liste des contrats 
    }
}

function  ctlCreerContrat($id,$contratChoisit){
    afficherNouveauContratx($contratChoisit,$id); // // LA ZONE DE CREATION DU CONRAT
}

function ctlCreationContrat($contrat,$id,$dateOuverture){ // LA VERIFICATION DES DONEES DE CREATION
    $verification=verificationContratDouble($id,$contrat); // verificationContratDouble($id,$contrat)  Verifie si un si le client a deja ce type de contrat
    if(empty($dateOuverture)){
        throw new exception("Entrer la date de creation !");
    }
    elseif($dateOuverture<date("Y-m-d")){ // Verifie si la date entree est anterieur a la date courante
        throw new exception("La date entree est anterieur a la date courante ! ");
    }
    else if($verification==false){ // si la verification est false on cree le contrat
        $mensualite=getMensualite($contrat); // getMensualite($contrat) recupere la mensualite du contrat choisi
        $information=getInfoClient($id); // getInfoClient($id) recupere les information du client
        ajouterCreationContrat($id,$contrat,$mensualite->Mensualite,$dateOuverture);  //  ajouterCreationContrat cree le contrat
        afficherRecaputilatif($id,$contrat,$mensualite,$dateOuverture,$information); // affihcer le recaputilatif
    }
    else{
        throw new exception("Vous avez deja un contrat de ce type chez nous !");
    }
}
function ctlaffihcherErreurCreation($msg,$id,$contrat){ // afficher lerreur sur la meme page
    $pieces=getPieces($contrat); //getPieces($contrat) recupere la liste des pieces requis pour le contrat choisit
    affihcherErreurCreation($msg,$id,$contrat,$pieces); //affiche lerreur sur la meme page tout en affichant les pieces requis
}
function  ctlInscriptionPourContrat($nom,$prenom,$dateDeNaissance,$adresse,$numerotel, // CONTROLE des donnee entree pour liscription 
$email,$situationF,$profession,$idCharger,$dateInscription){
    if(empty($nom)||empty($prenom)||empty($dateDeNaissance)||empty($adresse)||empty($numerotel)||empty($situationF)
    ||empty($profession)||empty($idCharger)||empty($email)||empty($dateInscription)){
      throw new exception("L'un des champs est vide !");
    }
    else if(getInfoConseil($idCharger)==NULL){
        throw new exception("l'id charger Client ne correspond a aucun conseiller !");
    }
    elseif($dateInscription<date("Y-m-d")){ // si la date dinscription est anterieur a la date courante
        throw new exception("La date entree est anterieur a la date courante ! ");
    }
    elseif($dateDeNaissance>date("Y-m-d")){ // si la date de naissance est superieur a la date courante
        throw new exception("La date de naissance entree est superieur a la date courante ! ");
    }
    else if(strlen($numerotel)<10){ // si le  numero de telephone est inferieur a 10 caractere
        throw new exception("Numero de telephone invalide !");
    }
    elseif( verificationclient($numerotel)!=NULL){ // verificationclient($numerotel) verifie sil existe deja un client avec le meme numTel
        throw new exception("Un client existe deja avec ce numero de telephone ");
    }
    else{
        inscription($nom,$prenom,$dateDeNaissance,$adresse,$numerotel,
        $email,$situationF,$profession,$idCharger,$dateInscription); // Inscrit le client
        afficherConfirmation(); // affiche la confirmation 
    }
   
}


//GESTION NOUVEAU COMPTE
function ctlAfficherQuestion(){ // VERIFIE SI LA BANQIE PROPOSE DES COMPTE
    if(getTypeCompte()==NULL){
        throw new exception("La banque ne popose pas d'ouverture de 
        compte pour le moment ! ");
    }
    else{
        afficherQuestion2();
    }
}

function ctlRecupIdPourC($numero){
    if(empty($numero)){
        throw new exception('Le champs numero doit etre renseigner !');
    }
    else if(getIdByNumTel($numero)==NULL){
        throw new exception('Ce numero ne correspond a aucun client !');
    }
    else{
        $x=getIdByNumTel($numero);
        $typeCompte=getTypeCompte();
        afficherZoneChoixDucompte($typeCompte,$x);
    }
}


function ctlZoneOuvertureCompte($id, $compteChoisit){
    afficheZoneOuvertureCompte($compteChoisit,$id);
}


function  ctlOuverureCompte($compte,$id,$date,$decouvert){
    $verification=verificationComptetDouble($id,$compte);
    if(empty($date)){
        throw new exception("Entrer la date d'ouverture !");
    }
    elseif($date<date("Y-m-d")){
        throw new exception("La date entree est anterieur a la date courante ! ");
    }
    else if(intval($decouvert)>0){
        throw new exception("La valeur du decouvert doit etre inferieur  ou egale a 0 !");
    }

    else if(!is_numeric($decouvert)){
        throw new exception("La valeur du decouvert doit etre inferieur  ou egale a 0 !");
    }

    else if($verification==false){
        $information=getInfoClient($id);
        ouvertureCompte($compte,$information->idClient,$date,$decouvert);
        afficherRecaputilatifCompte($id,$compte,$decouvert,$date,$information);
    }
    else{
        throw new exception("Vous avez deja un compte de ce type chez nous !");
    }
}

function CTLnscriptionC($nom,$prenom,$dateDeNaissance,$adresse,$numerotel,
$email,$situationF,$profession,$idCharger,$dateInscription){
    if(empty($nom)||empty($prenom)||empty($dateDeNaissance)||empty($adresse)||empty($numerotel)||empty($situationF)
    ||empty($profession)||empty($idCharger)||empty($email)||empty($dateInscription)){
      throw new exception("L'un des champs est vide !");
    }
    else if(getInfoConseil($idCharger)==NULL){
        throw new exception("l'id charger Client ne correspond a aucun conseiller !");
    }
   
    elseif($dateInscription<date("Y-m-d")){
        throw new exception("La date d'inscription entree est anterieur a la date courante ! ");
    }
    elseif($dateDeNaissance>date("Y-m-d")){
        throw new exception("La date de naissance entree est superieur a la date courante ! ");
    }
    elseif( verificationclient($numerotel)!=NULL){
        throw new exception("Un client existe deja avec ce numero de telephone ");
    }
    else if(strlen($numerotel)<10){
        throw new exception("Numero de telephone invalide !");
    }
    else{
        inscription($nom,$prenom,$dateDeNaissance,$adresse,$numerotel,
        $email,$situationF,$profession,$idCharger,$dateInscription);
        afficherConfirmationNCpourCompte();
    } 
}

//GESTION NOUVEAU CLIENT

function  ctlInscriptionNC($nom,$prenom,$dateDeNaissance,$adresse,$numerotel,
$email,$situationF,$profession,$idCharger,$dateInscription){
    if(empty($nom)||empty($prenom)||empty($dateDeNaissance)||empty($adresse)||empty($numerotel)||empty($situationF)
    ||empty($profession)||empty($idCharger)||empty($email)||empty($dateInscription)){
      throw new exception("L'un des champs est vide !");
    }
    else if(strlen($numerotel)<10){
        throw new exception("Numero de telephone invalide !");
    }
    else if(getInfoConseil($idCharger)==NULL){
        throw new exception("l'id charger Client ne correspond a aucun conseiller !");
    }
    elseif($dateInscription<date("Y-m-d")){
        throw new exception("La date d'inscription entree est anterieur a la date courante ! ");
    }
    elseif($dateDeNaissance>date("Y-m-d")){
        throw new exception("La date de naissance entree est superieur a la date courante ! ");
    }
    elseif( verificationclient($numerotel)!=NULL){
        throw new exception("Un client existe deja avec ce numero de telephone ");
    }
    else{
        inscription($nom,$prenom,$dateDeNaissance,$adresse,$numerotel,
        $email,$situationF,$profession,$idCharger,$dateInscription);
        afficherConfirmationNC();
    } 
}


function ctlBloquerCreneaux( $id,$motif,$date,$heure){
    if(empty($id)||empty($motif)||empty($date)||empty($heure)){
        throw new exception("L'un des champs est vide !");
    }
    else if(existanceId($id)==NULL){
        throw new exception("Cet id ne correspond a aucun conseiller !");
    }
    elseif($date<date("Y-m-d")){
        throw new exception("La date entree est anterieur a la date courante ! ");
    }
    else if(verifierCrenaux($id,$date,$heure)!=NULL){
        throw new exception("Impossible de bloquer deux crenaux  le meme jour a la meme heure!");
    }

    else{
        bloquerCreneaux($id,$motif,$date,$heure);
        afficherConfirm();
    }
}
//GESTION DECOUVERT
function ctlVerificationId($id){
    $information=getInfoClient($id);
    if($information==NULL){
        throw new exception("Cet id ne correspond a aucun client !");
    }
    else{
        $ListeCompte=getCompteClientx($id);
        afficherListeCompte($ListeCompte,$id,$information);
    }
}
function ctlModifierDecouvert($compteChoisit,$idClient,$valeurDecouvert){
    if(empty($valeurDecouvert)){
        throw new exception("Le champs est vide !");
    }
    else if(!is_numeric($valeurDecouvert)){
        throw new exception("La valeur du decouvert doit etre inferieur  ou egale a 0 !");
    }
    else if(intval($valeurDecouvert)>0){
        throw new exception("La valeur du decouvert doit etre inferieur  ou egale a 0 !");
    }
    else{
        modifierDecouvert($compteChoisit,$idClient,$valeurDecouvert);
        afficherConfirmationDeM($valeurDecouvert);
    }
}
//GESTION RESILIER COMPTE

function ctlafficherCompteclient($numero){
    if(empty($numero)){
        throw new exception('Le champs numero doit etre renseigner !');
    }
    else if(getIdByNumTel($numero)==NULL){
        throw new exception('Ce numero ne correspond a aucun client !');
    }
    else if(getCompteClientx(getIdByNumTel($numero)->idClient)==NULL){
        throw new exception('Ce client n\'a pas encore de compte !');
    }
    else{
        $x=getIdByNumTel($numero);
        $information=getInfoClient($x->idClient);
        $compte=getCompteClientx($x->idClient);
        afficherChoixComptes($compte,$x,$information);
    }   
}
function ctlResilierCompte($cases,$id){
    if(empty($cases)){
        throw new exception('Veuillez cocher aumoins un ou plusieurs comptes a resilier !');
    }
    else {
        foreach($cases as $compte){
            resilierCompte($id,$compte);
            afficherConfrimation();
        }
    }    
}
function ctlaffihcherErreurResiliationCompte($id){
    $information=getInfoClient($id);
    $compte=getCompteClientx($id);
    afficherErreurResiliationComptes($id,$compte,$information);
}

// GESTION RESILIATION CONTRAT

function ctlafficherContratclient($numero){
    if(empty($numero)){
        throw new exception('Le champs numero doit etre renseigner !');
    }
    else if(getIdByNumTel($numero)==NULL){
        throw new exception('Ce numero ne correspond a aucun client !');
    }
    else if(getContratClientx(getIdByNumTel($numero)->idClient)==NULL){
        throw new exception('Ce client n\'a pas encore de contrat !');
    }
    else{
        $x=getIdByNumTel($numero);
        $information=getInfoClient($x->idClient);
        $contrat=getContratClientx($x->idClient);
        afficherChoixContrat($contrat,$x,$information);
    }
}
function ctlaffihcherErreurResiliation($id){
    $information=getInfoClient($id);
    $contrat=getContratClientx($id);
    afficherErreurResiliationContrat($id,$contrat,$information);
}

function ctlResilierContrat($case,$id){
    if(!empty($caseCocher)){
        throw new exception('Veuillez cocher aumoins un ou plusieur comptes a resilier !');
    }
    else{
        foreach($case as $contrat){
            resilierContrat($id,$contrat);
            afficherConfrimationR();
        }
    }
}

function ctlAfficherPlanningDujour($date){
    if(empty($date)){
        throw new exception('le champs est vide !');
    }
    elseif(getTaches($date)==NULL){
        throw new exception("Aucune tache nest prevue ce  $date ");
    }
    else{

        $taches=getTaches($date);
        afficherTaches($taches,$date);
    }
}
function  ctlPlanningDuconseiller($id,$date){
    if(empty($id)||empty($date)){
        throw new exception("L'un des champs est vide !");
    }
    else if(getInfoConseil($id)==NULL){
        throw new exception("cet id ne correspond a aucun conseiller ! ");
    }
    else if(getTachesConseiller($date,$id)==NULL && getTachesConseiller2($date,$id)==NULL){
        throw new exception("ce conseiller n'a aucune tache prevue ce  $date ");
    }
    else if(getTachesConseiller($date,$id)==NULL && getTachesConseiller2($date,$id)!=NULL){
        $taches=getTachesConseiller2($date,$id);
        affichertachesDuconseiller2($taches,$date);
    }
    else{
        $taches=getTachesConseiller($date,$id);
        affichertachesDuconseiller($taches,$date);

    }
}
// GESTION CREER NOUVEAU EMPLOYER
function ctlAjouterEmployer($nom,$prenom,$login,$mdp,$categorie){
    if(empty($nom)||empty($prenom)||empty($login)||empty($mdp)||empty($categorie)){
        throw new exception("L'un des champs est vide !");
    }
    else if(verifierLogin($login)->rowCount()==0) {
        ajouterEmployer($nom,$prenom,$login,$mdp,$categorie);
        afficherConfirmationAE();
    }
    else{
        throw new exception("Ce login est  déjà utiliser !");
    }
}
// GESTION MODIFIER EMPLOYER
 function  CtlafficherZoneModifierEmployer(){
    $employe=getEmployer();
    afficherZoneModifierEmployer($employe);
}
function ctlZoneDeModificaton($id){
    $info=getInfoEmploye($id);
    afficherZoneDeM($id,$info->motDepasse,$info->identifiant,
    $info->nom,$info->prenom,$info->categorie);
}
function ctlModifierMdp($id){
    $info=getInfoEmploye($id);
    afficherZoneDeModificationMdp($id,$info->motDepasse,$info->identifiant,
    $info->nom,$info->prenom,$info->categorie);
}
function  ctlModifieMdp($id,$nouveauMdp){
    if(empty($nouveauMdp)){
        throw new exception('le champs est vide !');
    }
    else{
        modifierMdp($id,$nouveauMdp);
        $info=getInfoEmploye($id);
        afficherZoneDeM($id,$info->motDepasse,$info->identifiant,
        $info->nom,$info->prenom,$info->categorie);
    }
}
function  ctlaffihcherErreurModifiMdp($msg,$id){
    $info=getInfoEmploye($id);
    affihcherErreurModifiMdp($id,$info->motDepasse,$info->identifiant,
    $info->nom,$info->prenom,$info->categorie,$msg);
}
//GESTION MODIFIER LOGIN 
function ctlZoneDeModificaton2($id){
    $info=getInfoEmploye($id);
    afficherZoneDeMl($id,$info->motDepasse,$info->identifiant,
    $info->nom,$info->prenom,$info->categorie);
}
function ctlModifierLogin($id){
    $info=getInfoEmploye($id);
    afficherZoneDeModificationLogin($id,$info->motDepasse,$info->identifiant,
    $info->nom,$info->prenom,$info->categorie);
}
function  ctlModifiLogin($id,$nouveauLogin){
    if(empty($nouveauLogin)){
        throw new exception('le champs est vide !');
    }
    else if(verifierLogin($nouveauLogin)->rowCount()!=0){
        throw new exception("Ce login est  déjà utiliser !");
    }
    else{
        modifierLogin($id,$nouveauLogin);
        $info=getInfoEmploye($id);
        afficherZoneDeM($id,$info->motDepasse,$info->identifiant,
        $info->nom,$info->prenom,$info->categorie);
    }
}
function  ctlaffihcherErreurModifieLogin($msg,$id){
    $info=getInfoEmploye($id);
    affihcherErreurModifiLogin($id,$info->motDepasse,$info->identifiant,
    $info->nom,$info->prenom,$info->categorie,$msg);
}

// GESTION MODIFIER CONTRAT
function CtlmodifierContrat(){
    $contrat=getTypeContrat();
    afficherLesTypeContrat($contrat);
}
function  CtlmodifierLeContratChoisit($contratChoisit){
    $infoContrat=getInfoContrat($contratChoisit);
    afficherLaZdeModification($contratChoisit, $infoContrat->mensualite);
}
function Ctlmodifiermensualite($contratChoisit){
    $infoContrat=getInfoContrat($contratChoisit);
    afficherZMM($contratChoisit, $infoContrat->mensualite);
}
function Ctlmensualite($contratChoisit,$nouvelleMens){
    if(empty($nouvelleMens)){
        throw new exception("le champs est vide !");
    }
    else{
        modifierMens($contratChoisit,$nouvelleMens);
        $mensualite=getMensualite($contratChoisit);
        afficherConfirmationMens($contratChoisit,$mensualite->Mensualite);
    }
}
function ctlafficherErreurmodifierMens($msg,$contratChoisit){
    $mensualite=getMensualite($contratChoisit);
    afficherErreurmodifierMens($msg,$contratChoisit, $mensualite->Mensualite);
}

// GESTION CREER TYPE COMPTE

function CtlAjouter($motif,$nbrpiece){
    if (verifierMotif($motif)->rowCount()!=0) {
       throw new exception("ce type de compte existe deja !");
    }
    else{
        ajouterMotif($motif);
        ajouterMotifAtypeCompte($motif);
    }
   
    for ($i=0; $i < $nbrpiece; $i++) { 
        $piece=$_POST['piece'.$i];
        $piece= str_replace(" ", "", $piece);
        ajouterPieceMotif($piece,$motif);
    }
    afficherConfirmationAjout();
}

// GESTION CREER TYPE CONTRAT
function CtlAjouter2($motif,$nbrpiece, $mensualite){
    if (verifierMotif($motif)->rowCount()!=0) {
       throw new exception("ce type de contrat existe deja !");
    }
    else{
        ajouterMotif($motif);
        ajouterMotifAtypeContrat($motif,$mensualite);
    }
    for ($i=0; $i < $nbrpiece; $i++) { 
        $piece=$_POST['piece'.$i];
        $piece= str_replace(" ", "", $piece);
        ajouterPieceMotif($piece,$motif);
    }
    afficherConfirmationAjout2();
}

//GESTIO  SUPPRIMER TYPE CMPTE
function CtlafficherListeTypeCompte(){
    $comptes=getTypeCompte();
    afficherTypeCompte($comptes);
}
function ctlsupprimerCompte($case){
    if(empty($case)){
        throw new exception("cocher aumoins un type de compte a supprimer");
    }
    else{
        foreach($case as $compte){
            if(verifierCompte($compte)!=NULL){
                throw new Exception("Impossible car des client ont deja  un $compte " );
            }
            else{
                SupprimerMotif($compte); // SUPPRIME LEcompte DE LA TABLE MOTIF
                $pieces=getPieces($compte);// RECUPERE LES PIECES REQUISE POUR LE compte
                foreach($pieces as $ligne){// SUPPRIME LES PIECES requis pour le compte
                    supprimerPieces($ligne->pieces,$compte);
                }
                SupprimerCompte($compte); //Supprime lecompte de la table type compte
                $comptes=getTypeCompte();
                afficherConfirmationSU($comptes);
            }
        }
    }
}
function  ctlafficherErreurSuppre($msg){
    $comptes=getTypeCompte();
    afficherErreurSuppre($comptes,$msg);
}
function  ctlafficherErreurSuppre2(){
    $comptes=getTypeCompte();
    afficherErreurSuppre2($comptes);
}
//GESTIO  SUPPRIMER TYPE CONTRAT
function CtlafficherListeTypeContrat(){
    $contrat= getTypeContrat();
    afficherTypeContrat( $contrat);
}

function ctlsupprimerContrat($case){
    if(empty($case)){
        throw new exception("cocher aumoins un type de compte a supprimer");
    }
    else{
        foreach($case as $contrat){
            if(verifierContrat($contrat)!=NULL){
                throw new Exception("Impossible car des client ont deja  un $contrat " );
            }
            else{
                SupprimerMotif($contrat); // SUPPRIME LE CONTRAT DE LA TABLE MOTIF
                $pieces=getPieces($contrat); // RECUPERE LES PIECES REQUISE POUR LE CONTRAT
                foreach($pieces as $ligne){ // SUPPRIME LES PIECES requis pour le CONTRAT
                    supprimerPieces($ligne->pieces,$contrat);
                }
                SupprimerContrat($contrat); // Supprime le contrat de la table type contrat
                $contrat=getTypeContrat();
                afficherConfirmationSUC($contrat);
            }
        }
    }
}
function  ctlafficherErreurSuppreTCO($msg){
    $contrat=getTypeContrat();
    afficherErreurSuppreCO($contrat,$msg);
}
function  ctlafficherErreurSuppre2C(){
    $contrat=getTypeContrat();
    afficherErreurSuppre2C($contrat);
}
 // GESTION MODIFIER PIECES
 function ctlafficherZoneChoistypeContrat(){
    $contrat=getTypeContrat();
    afficherZoneChoistypeContrat($contrat);
 }
 function ctlafficherpieceContrat($contrat){
    $pieces=getPieces($contrat);
    afficherpieceContrat($pieces,$contrat);
 }
 function ctlSupprimerPiece($pieces,$contrat){
    if(empty($pieces)){
        throw new exception("Le champs est vide !");
    }
    else{
        supprimerPieces($pieces,$contrat);
        $pieces=getPieces($contrat);
        afficherpieceContrat($pieces,$contrat);
    }
 }
 function ctlafficherErreurSupprePiecs($contrat){
    $pieces=getPieces($contrat);
    afficherErreurSupprePiecs($pieces,$contrat);
 }
 function CTLajouterPieces($contrat,$piecesAajouter){
    $piecesAajouter= str_replace(" ", "",$piecesAajouter);
    $verification=verifiactionPices($contrat,$piecesAajouter);
    if(empty($piecesAajouter)){
        throw new exception("Le champs est vide !");
    }
    else if($verification==NULL){
        ajouterPieceMotif($piecesAajouter,$contrat);
        afficherZoneAjoutPieceConfirmation($contrat);
    }
    else{
        throw new exception("Le contrat $contrat requierd deja cette piece !");
    }
 }
 function ctlafficherErreurAjoutPeces($msg,$contrat){
    afficherErreurAjoutPeces($msg,$contrat);
 }
  // GESTION AJOUT PIECES COMPTE
  function  ctlafficherZoneChoistypeCompte(){
    $compte=getTypeCompte();
    afficherZoneChoistypeCompte($compte);
  }
  function  ctlafficherpieceCompte($compte){
    $pieces=getPieces($compte);
    afficherpieceCompte($pieces,$compte);
  }
  function ctlSupprimerPiece2($pieces, $compte){
    if(empty($pieces)){
        throw new exception("Le champs est vide !");
    }
    else{
        supprimerPieces($pieces, $compte);
        $pieces=getPieces( $compte);
        afficherpieceContrat($pieces, $compte);
    }
 }
 function ctlafficherErreurSupprePiecs2($compte){
    $pieces=getPieces($compte);
    afficherErreurSupprePiecs2($pieces,$compte);
 }
 function CTLajouterPieces2($comptes,$piecesAajouter){
    $verification=verifiactionPices($comptes,$piecesAajouter);
    if(empty($piecesAajouter)){
        throw new exception("Le champs est vide !");
    }
    else if((!is_int($piecesAajouter) && !ctype_alpha($piecesAajouter) 
    && !preg_match('/^[a-zA-Z]+$/',$piecesAajouter))){
        throw new exception("Mauvais format !");
    }
    else if($verification==NULL){
        ajouterPieceMotif($piecesAajouter,$comptes);
        afficherZoneAjoutPieceConfirmation2($comptes);
    }
    else{
        throw new exception("Le $comptes requierd deja cette piece !");
    }
 }
 function  ctlafficherErreurAjoutPeces2($msg, $comptes){
    afficherErreurAjoutPeces2($msg,$comptes);
 }
 // GESTION STATISTIQUE 
 function ctlNbrContrat($date1,$date2){
    if(empty($date1)){
        throw new exception("Lun des  champs est vide !");
    }
    else if(empty($date2)){
        throw new exception("Lun des  champs est vide !");
    }
    else{
        $nbrContrat=getNbrContrat($date1,$date2)->rowCount();
        affciherNbrContrat($nbrContrat,$date1,$date2);
    }

 }
 function ctlafficherZonenbrClient($date3){
    if(empty($date3)){
        throw new exception("Le champs est vide !");
    }
    else{
        $nbrTotalClient=getNbrTotalClients($date3)->rowCount();
        afficherZonenbrClientConfirmation($nbrTotalClient,$date3);
    }
 }
function ctlafficherZoneSoldeTot($date4){
    if(empty($date4)){
        throw new exception("Le champs est vide !");
    }
    else{
        $solde=getCompteClientPourS($date4);
        $total=0;
        foreach($solde as $ligne){
            $total=$total+intval($ligne->solde);
        }
        // $solde=getNbrTotalClients($date4)->rowCount();
        afficherafficherSoldeTot($total,$date4);
    }
 }
 function ctlnbrRDV( $date1,$date2){
    if(empty($date1)){
        throw new exception("Lun des  champs est vide !");
    }
    else if(empty($date2)){
        throw new exception("Lun des  champs est vide !");
    }
    else{
        $nbrRdv=getNbrRdv($date1,$date2)->rowCount();
        affciherNbrRDV( $nbrRdv,$date1,$date2);
    }
 }


 
  