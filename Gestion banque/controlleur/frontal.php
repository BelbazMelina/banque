<?php
  require_once('controleur.php') ;
    if (isset($_POST['boutonSeconnecter'])){
        try{
            $login=$_POST['login'];
            $motDepasse=$_POST['password'];
            ctlCheckUser($login,$motDepasse);
        }
        catch(Exception $e){
            $msg=$e->getMessage();
            afficherErreurConnexion($msg);
        }
    }
//_________________________________ZONE AGENT__________________________
     
   
    // GESTION SYTHESE

    else if(isset($_POST['x1'])){
        afficherAceuilSynthese();
    }
    else if(isset($_POST['bouttonSynthes'])){
        try{
            $idClient=$_POST['zoneIdpourSynthese'];
            ctlSynthese($idClient);
        }
        catch(Exception $e){
            $msg=$e->getMessage();
            afficherErreurNiveauSynthes($msg);
        }
    }
    else if(isset($_POST['rc'])){
        $nom='';
        afficherGabritAgent($nom);
    }




// GESTION MODIFICATION CLIENT

    else if(isset($_POST['boutonMofifierClient'])){
        afficherAceuilModifierClient();
    }
    else if(isset($_POST['bouttnValiderIdModification'])){
        try{
            $idamodifier=$_POST['zoneIdpourModification'];
            ctlIdClient($idamodifier);  //Pour verifier si l'id est valide 
        }
        catch(Exception $e){
            $msg=$e->getMessage();
            afficherErreurId($msg);
        }
    }
    else if(isset($_POST['modifierAdresse'])){
        $idDuclientAmodifier=$_POST['idClient'];
        ctlAdresse( $idDuclientAmodifier);
        
    }
    else if(isset($_POST['modifEmail2'])){ // appelle la fonction du ctl qui aaffiche la zone de modi
        $idDuclientAmodifier=$_POST['idClient'];
        ctlEmail($idDuclientAmodifier);
    }

    else if(isset($_POST['validerModifEmail'])){ //pour valider la modification
        try{
            $nouveauEmail=$_POST['m1'];
            $idDuclientAmodifier=$_POST['idClient']; 
            ctlModifierEmail($nouveauEmail,$idDuclientAmodifier);
        }
        catch(Exception $e){
            $msg=$e->getMessage();
            afficherErreurModification($msg);
        }
    }


    else if(isset($_POST['anuller'])){
        $idDuclientAmodifier=$_POST['idClient'];
        ctlAnuller( $idDuclientAmodifier);
    }
    else if(isset($_POST['validerModifAdress'])){ //pour valider la modification de l'adresse
        try{
            $nouvelleAdresse=$_POST['nouvelleAdresse'];
            $idDuclientAmodifier=$_POST['idClient']; 
            ctlModifierAdresse($nouvelleAdresse,$idDuclientAmodifier);
        }
        catch(Exception $e){
            $msg=$e->getMessage();
            ctlErreurafficherErreurModification($msg,$idDuclientAmodifier);
        }
    }
    else if(isset($_POST['modifierNumeroTel'])){ //pour aficher la zone de modification du num tel
        $idDuclientAmodifier=$_POST['idClient'];
        ctlNumtel( $idDuclientAmodifier);
        
    }
    else if (isset($_POST['validerModifNumtel'])){
        try{
            $nouveauNUmTel=$_POST['nouveauNumTel'];
            $idDuclientAmodifier=$_POST['idClient']; 
            ctlModifierNumTel( $nouveauNUmTel,$idDuclientAmodifier);
        }
        catch(Exception $e){
            $msg=$e->getMessage();
            ctlErreurafficherErreurModification($msg,$idDuclientAmodifier);
        }
           
    }
    else if(isset($_POST['modifierProfession'])){ // pour afficher la zone de modification de la profession
        $idDuclientAmodifier=$_POST['idClient'];
        ctlProfession($idDuclientAmodifier);
        
    }
    else if(isset($_POST['validerModifProfession'])){ //pour valider la modification de l'adresse
            $nouvelleProfession=$_POST['valeurSelect'];
            $idDuclientAmodifier=$_POST['idClient']; 
            ctlModifierProfession( $nouvelleProfession,$idDuclientAmodifier);
    }
    else if(isset($_POST['modifierSituation'])){ // pour afficher la zone de modification de la situation Familiale
        $idDuclientAmodifier=$_POST['idClient'];
        ctlSituationF($idDuclientAmodifier);
        
    }
    else if(isset($_POST['validerModifSituationF'])){ //pour valider la modification de l'adresse
        $nouvelleSituation=$_POST['valeurSelect'];
        $idDuclientAmodifier=$_POST['idClient']; 
        ctlModifierSituationF($nouvelleSituation,$idDuclientAmodifier);
    }

 // GESTION SYTHESE RECHERCHE ID
    else if(isset($_POST['rechercherId'])){
        afficherAceuilRechercheId();
    }
    else if(isset($_POST['ValiderRecher'])){
        try{
            $nomDuclient=$_POST['NomDuClient'];
            $dateDeNaissance=$_POST['date'];
            ctlRechercheId($nomDuclient,$dateDeNaissance);
        }
        catch(Exception $e){
            $msg=$e->getMessage();
            afficherErreurRechercheId($msg);
        }
    }
    else if(isset($_POST['precision'])){
        try{
            $numeroTel=$_POST['numeroTel'];
            ctrlAfficherIdDuClient($numeroTel);
        }
        catch(Exception $e){
            $msg=$e->getMessage();
            afficherErreurZonePrecision($msg);
        }
        
    }

    // GESTION DEPOT
    else if (isset($_POST['boutonDepot'])){
        afficherZoneDepot();
    }
    else if(isset($_POST['bouttnValiderIdPourDepot'])){
        try{
            $id=$_POST['zoneIdpourDepot'];
            ctlAfficherListe($id);
        }
        catch(Exception $e){
            $msg=$e->getMessage();
            afficherErreur($msg);
        }
    }
    else if(isset($_POST['procederDepot'])){
        try{
            $comptesChoisit=$_POST['listesCompte'];
            $id=$_POST['zoneIdpourDepot'];
            ctlDepot($comptesChoisit);
        }
        catch(Exception $e){
            $msg=$e->getMessage();
            fficherErreur($msg);
        }
        
    }
    else if(isset($_POST['Anouveau'])){
        afficherZoneDepot();
    }
    else if(isset($_POST['anuuler'])){
        afficherAcceuilAgent();
    }
    else if(isset($_POST['validerDepot'])){
        try{
            $idDuCompte=$_POST['idChoisit'];
            $ancienSolde=$_POST['ancienSolde'];
            $somme=$_POST['somme'];
            ctlFaireDepot($idDuCompte,$ancienSolde,$somme);
        }
        catch(Exception $e){
            $msg=$e->getMessage();
            ctlAfficherErreurDepot($msg,$ancienSolde,$idDuCompte);
        }
    }

    /// GESTION RETRAIT
    
    else if(isset($_POST['boutonRetrait'])){
        afficherZoneRetrait();
    }
    else if(isset($_POST['bouttnValiderIdPourRetrait'])){
        try{
            $id=$_POST['zoneIdpourRetrait'];
            ctlAfficherListeComptes($id);
        }
        catch(Exception $e){
            $msg=$e->getMessage();
            afficherErreurRetrait($msg);
        }
    }
    else if(isset($_POST['procederRetrait'])){
        try{
            $comptesChoisit=$_POST['listesCompte'];
            $id=$_POST['zoneIdpourRetrait'];
            ctlRetrait($comptesChoisit);
        }
        catch(Exception $e){
            $msg=$e->getMessage();
            fficherErreurRetrait($msg);
        }
        
    }
    else if(isset($_POST['nouveau'])){
        afficherZoneRetrait();
    }
    else if(isset($_POST['Anuuler'])){
        afficherAcceuilAgent();
    }
    else if(isset($_POST['validerRetrait'])){
        try{
            $idDuCompte=$_POST['idChoisit'];
            $ancienSolde=$_POST['ancienSolde'];
            $somme=$_POST['somme'];
            ctlFaireRetrait($idDuCompte,$somme);
        }
        catch(Exception $e){
            $msg=$e->getMessage();
            ctlAfficherErreurRetrait($msg,$ancienSolde,$idDuCompte);
        }
    }

    //GESTION DE RENDEZ VOUS

    else if(isset($_POST['btnPrendreRDV'])){
        afficherAcceuilRDv();
    }
    else if(isset($_POST['pasClient'])){
        ctlafficherPriseRDVNouveau();
    }
    else if(isset($_POST['validerRdvN'])){
        try{
            $date=$_POST['dateRdvN'];
            $numero=$_POST['telephone'];
            $heure=$_POST['heureRdvN'];
            $motif=$_POST['mrdvN'];
            ctlRdvNouveau($date,$heure,$motif, $numero);
        }
        catch(Exception $e){
            $msg=$e->getMessage();
            ctlAfficherErreurdRdvN($msg);
        }
    }
    else if(isset($_POST['vldpourIdRdv'])){
        try{
            $id=$_POST['idclientPourRdv'];
            ctlrdv($id);
        }
        catch(Exception $e){
            $msg=$e->getMessage();
            AfficherErreurdRDV($msg);
        }
    }
    else if(isset($_POST['afficherPlaning'])){
        $idCharger=$_POST['idCharger'];
        $idClient=$_POST['idC'];
        CTlafficherZonePlanning($idCharger,$idClient);
    }
    else if(isset($_POST['planning'])){
        try{
            $date=$_POST['datePlng'];
            $idCharger=$_POST['idCharger2'];
            $idClient=$_POST['idClient2'];
            ctlPlannig($idCharger,$idClient,$date);
        }
        catch(Exception $e){
            $msg=$e->getMessage();
            ctlAfficherErreurdateRDV($msg,$idCharger,$idClient,$date);
        }
    }
    else if(isset($_POST['priseRdv'])){
        $idCharger=$_POST['idChargerx'];
        $idClient=$_POST['idClientx'];
        ctlafficherZonePriseDerdv($idCharger,$idClient);
    }

    else if(isset($_POST['validerRdv'])){
        try{
            $idCharger=$_POST['idChargerx2'];
            $idClient=$_POST['idClientx2'];
            $date=$_POST['dateRdv'];
            $heure=$_POST['heureRdv'];
            $motif=$_POST['mrdv'];
           ctlRdv2($idCharger,$idClient, $date,$heure, $motif);
        }
        catch(Exception $e){
            $msg=$e->getMessage();
            ctlafficherErreurrr($msg,$idCharger,$idClient);
        }
        
    }
//_________________________________FIN ZONE AGENT__________________________







//_________________________________ZONE CONSEILLER__________________________

    //GESTION NOUVEAU CONTRAT

    else if(isset($_POST['btnNouveauContrat'])){
        try{
            ctlAfficherQuestion2();
         }
         catch(Exception $e){
             $msg=$e->getMessage();
             affihcherErreurGC($msg);
        }
    
    }

    else if (isset($_POST['oui'])){ // si clique sur le bouton "oui Je suis deja client"
       afficherSaisieNum(); // affiche la zone de saisie du numero
    }

    else if(isset($_POST['btnValider'])){  
        try{
            $numero=$_POST['numero'];
            ctlRecupId($numero); // verifie le numero saisi
        }
        catch(Exception $e){
            $msg=$e->getMessage();
            affihcherErreurNum($msg); // AFFICHE ERREUR NUMERO
        }
        
    }
    else if(isset($_POST['annuler'])){ // POUR REVENIR A LA PAGE DACCEUILLE DU CONSEILLER
        afficherAcceuilConseiller();
    }
 
    else if(isset($_POST['choisir'])){ // boutton pour choisir un type de compte
        try{
            $id=$_POST['id'];
            $contratChoisit=$_POST['typeContrat'];
            ctlCreerContrat($id,$contratChoisit); // ctl pour pour verifier ls donnees entreee
        }
        catch(Exception $e){
            $msg=$e->getMessage();
            affihcherErreurCreation($msg,$id,$contratChoisit); // fonction pour afficher lerreur des donnee
        }
    }

    else if(isset($_POST['creation'])){ // LA ZONE DE CREATION DU CONTRAT
        try{
            $contrat=$_POST['c'];
            $id=$_POST['id'];
            $date=$_POST['date'];
            ctlCreationContrat($contrat,$id,$date);
        }
        catch(Exception $e){
            $msg=$e->getMessage();
            ctlaffihcherErreurCreation($msg,$id,$contrat); // fonction qui affiche lerreur du creation du contrat
        }
    }


    else if(isset($_POST['non'])){ // si clique sur le bouton "non Je suis pas client"
        afficherZoneInscription(); // affiche la zone dinscription 
    }
    else if(isset($_POST['continuer'])){ // si clique sur le boutton continuer apres liscription 
        afficherSaisieNum(); // affiche la zone de saisie du numero
    }

    else if(isset($_POST['inscrire'])){ // si clique sur le bouton inscrire 
        try{
            $nom=$_POST['nom'];
            $prenom=$_POST['prenom'];
            $dateDeNaissance=$_POST['dateDeNaissance'];
            $adresse=$_POST['Adresse'];
            $numerotel=$_POST['Numerodetel'];
            $email=$_POST['Email'];
            $situationF=$_POST['valeurSelect1'];
            $profession=$_POST['valeurSelect'];
            $idCharger=$_POST['idChargerClient'];
            $dateInscription=$_POST['dateInscription'];
            ctlInscriptionPourContrat($nom,$prenom,$dateDeNaissance,$adresse,$numerotel,
            $email,$situationF,$profession,$idCharger,$dateInscription); // verifie les donnee entrees pour liscription 
        }
        catch(Exception $e){
            $msg=$e->getMessage();
            affihcherErreurInscription($msg);
        }
       
    }

    //GESTION OUVRIR UN COMPTE

    else if(isset($_POST['boutonOuvrirCompte'])){
        try{
           ctlAfficherQuestion();
        }
        catch(Exception $e){
            $msg=$e->getMessage();
            affihcherErreurGC2($msg);
        }
        
    }
    else if (isset($_POST['ouiC'])){// si clique sur le bouton "oui Je suis deja client"
        afficherSaisieNumC(); // affiche la zone de saisie du numero
    }
    else if(isset($_POST['btnValiderNumC'])){
        try{
            $numero=$_POST['numero'];
            ctlRecupIdPourC($numero); // verifie le numero saisi
        }
        catch(Exception $e){
            $msg=$e->getMessage();
            affihcherErreurNumC($msg); // AFFICHE ERREUR NUMERO
        }
    }

    
     else if(isset($_POST['choisirC'])){ // boutton pour choisir un type de compte
        try{
            $id=$_POST['id'];
            $compteChoisit=$_POST['typeCompte'];
            ctlZoneOuvertureCompte($id, $compteChoisit);  // ctl pour pour verifier ls donnees entreee
        }
        catch(Exception $e){
            $msg=$e->getMessage();
            affihcherErreurCreation2($msg,$id,$compteChoisit); // fonction pour afficher lerreur des donnee sur la meme page
        }
    }




    else if(isset($_POST['creationC'])){ // LA ZONE DE CREATION DU CONTRAT
        try{
            $compte=$_POST['c2'];
            $id=$_POST['id2'];
            $date=$_POST['dateC'];
            $decouvert=$_POST['DecouvertAutoriser'];
            ctlOuverureCompte($compte,$id,$date,$decouvert);
        }
        catch(Exception $e){
            $msg=$e->getMessage();
            affihcherErreurCompe($msg,$id,$compte);
        }
    }
     else if(isset($_POST['nonC'])){ 
        afficherZoneInscriptionC();
    }
    else if(isset($_POST['inscrireClientPourCompte'])){
        try{
            $nom=$_POST['nom'];
            $prenom=$_POST['prenom'];
            $dateDeNaissance=$_POST['dateDeNaissance'];
            $adresse=$_POST['Adresse'];
            $numerotel=$_POST['Numerodetel'];
            $email=$_POST['Email'];
            $situationF=$_POST['valeurSelect1'];
            $profession=$_POST['valeurSelect'];
            $idCharger=$_POST['idChargerClient'];
            $dateInscription=$_POST['dateInscription'];
            CTLnscriptionC($nom,$prenom,$dateDeNaissance,$adresse,$numerotel,
            $email,$situationF,$profession,$idCharger,$dateInscription);
        }
        catch(Exception $e){
            $msg=$e->getMessage();
            affihcherErreurInscriptionC($msg);
        }
    }
    else if(isset($_POST['continuerC'])){
        afficherSaisieNumC();
    }



    //GESTION NOUVEAU CLIENT


    else if(isset($_POST['btnNouveauCLient'])){
        afficherZoneInscriptionNC();
    }
    else if(isset($_POST['inscrireNC'])){
        try{
            $nom=$_POST['nom'];
            $prenom=$_POST['prenom'];
            $dateDeNaissance=$_POST['dateDeNaissance'];
            $adresse=$_POST['Adresse'];
            $numerotel=$_POST['Numerodetel'];
            $email=$_POST['Email'];
            $situationF=$_POST['valeurSelect1'];
            $profession=$_POST['valeurSelect'];
            $idCharger=$_POST['idChargerClient'];
            $dateInscription=$_POST['dateInscription'];
            ctlInscriptionNC($nom,$prenom,$dateDeNaissance,$adresse,$numerotel,
            $email,$situationF,$profession,$idCharger,$dateInscription);
        }
        catch(Exception $e){
            $msg=$e->getMessage();
            affihcherErreurInscriptionNC($msg);
        }
    }
    else if(isset($_POST['boutonBloquerCreneaux'])){
        afficherZoneCreneaux();
    }
    // GESTION BLOQUER CRENAUX

    else if(isset($_POST['bloquer'])){
        try{
            $id=$_POST['id'];
            $motif=$_POST['motif'];
            $date=$_POST['date'];
            $heure=$_POST['heure'];
            ctlBloquerCreneaux($id,$motif,$date,$heure);
        }
        catch(Exception $e){
            $msg=$e->getMessage();
            affihcherErreurBlocage($msg);
        }
    }

    //GESTION DECOUVERT
    
    else if(isset($_POST['boutonGestionDecouvert'])){
        afficherZONGestionDecouvert();
    }
    else if(isset($_POST['Valider'])){
        try{
            $id=$_POST['zoneIdpourD'];
            ctlVerificationId($id);
        }
        catch(Exception $e){
            $msg=$e->getMessage();
            affihcherErreurIdPouGD($msg);
        }
    }

    else if(isset($_POST['CompteChoisit'])){
        $compteChoisit=$_POST['listeCompte'];
        $idClient=$_POST['id'];
        afficherZoneModifierDecouvert($compteChoisit,$idClient);
    }
    else if(isset($_POST['vld'])){
        try{
            $compteChoisit=$_POST['compteChoisit'];
            $idClient=$_POST['id'];
            $valeurDecouvert=$_POST['valeurDecouvert'];
            ctlModifierDecouvert($compteChoisit,$idClient, $valeurDecouvert);
        }
        catch(Exception $e){
            $msg=$e->getMessage();
            affihcherErreurModification($msg,$compteChoisit,$idClient, $valeurDecouvert);
        }
       
    }
    // FIN GESTION DECOUVERT


    // GESTION RESILISER COMPTE

    else if(isset($_POST['boutonResilier'])){
        afficherChoixCompteOuContrat();
    }
    else if(isset($_POST['compte'])){
        afficherZoneSaisiNumClient();
    }
    else if(isset($_POST['vldNumClient'])){
       try{
            $numero=$_POST['numero'];
            ctlafficherCompteclient($numero);
       }
       catch(Exception $e){
            $msg=$e->getMessage();
            affihcherErreurNumR($msg);
        }
    }
    else if(isset($_POST['resilier'])){
        $id=$_POST['id'];
        if(isset($_POST['Case'])){
            $case=$_POST['Case'];
            ctlResilierCompte($case,$id);
        }
        else{
            ctlaffihcherErreurResiliationCompte($id);
        }
        
    }
// FIN GESTION RESILIER COMPTE

    //GESTION RESILIER CONTRAT

    else if(isset($_POST['contrat'])){
        afficherZoneSaisiNumClient2();
    }
    else if(isset($_POST['vldNumClient2'])){
        try{
             $numero=$_POST['numero'];
             ctlafficherContratclient($numero);
        }
        catch(Exception $e){
         $msg=$e->getMessage();
         affihcherErreurNumR2($msg);
        }
     }
    else if(isset($_POST['resilier2'])){
        $id=$_POST['id'];
        if(isset($_POST['caseCocher'])){
            $case=$_POST['caseCocher'];
            ctlResilierContrat($case,$id);
        }
        else{
            ctlAffihcherErreurResiliation($id);
        } 
     }
     // GESTION PLANNING

     else if(isset($_POST['boutonPlanning'])){
        afficherZoneplanning2();
     }
     else if(isset($_POST['PJ'])){
        afficherZoneChoixjour();
     }
     else if(isset($_POST['AP'])){
        try{
            $date=$_POST['jour'];
            ctlAfficherPlanningDujour($date);
        }
        catch(Exception $e){
            $msg=$e->getMessage();
            affihcherErplaning($msg);
        }
        
     }
     else if(isset($_POST['PC'])){
        afficherZoneidConseiller();
     }
     
     else if(isset($_POST['afficherSts'])){
        try{
            $id=$_POST['plage'];
            $date=$_POST['day'];
            ctlSynthese2($id,$date);
        }
        catch(Exception $e){
            $msg=$e->getMessage();
            affihcherErId($msg);
        }
       
     }
     
     else if(isset($_POST['afficherPC'])){
        try{
            $id=$_POST['idconseillerx'];
            $date=$_POST['datx'];
            ctlPlanningDuconseiller($id,$date);
        }
        catch(Exception $e){
            $msg=$e->getMessage();
            affihcherErplaningDuconseiller($msg);
        }
     }
     
//_________________________________FIN ZONE CONSEILLER__________________________









//_________________________________ZONE DIRECTEUR__________________________

     // GESTION NOUVEAU EMPLOYER

     else if (isset($_POST['btnCreerEmployer'])){
        afficherZoneCreationEmployer();
     }
     else if (isset($_POST['AC'])){
        afficherGabritDirecteur();
     }
     else if(isset($_POST['creer'])){
        try{
            $nom=$_POST['nom'];
            $prenom=$_POST['prenom'];
            $login=$_POST['login'];
            $mdp=$_POST['mdp'];
            $categorie=$_POST['select'];
            ctlAjouterEmployer($nom,$prenom,$login,$mdp,$categorie);
        }
        catch(Exception $e){
            $msg=$e->getMessage();
            affihcherErreurCreerE($msg);
        }
     }
      // GESTION MODIFIER EMPLOYER 
    else if(isset($_POST['ModifierEmployer'])){
        CtlafficherZoneModifierEmployer();
    }
    else if(isset($_POST['choisirx'])){
        $id=$_POST['employer'];
        ctlZoneDeModificaton($id);
    } 
    else if(isset($_POST['modifierMdp'])){
        $id=$_POST['id'];
        ctlModifierMdp($id);
    } 
    else if(isset($_POST['annulerModif'])){
        $id=$_POST['id'];
        ctlZoneDeModificaton($id);
    } 
    else if(isset($_POST['validerModifMdp'])){
        try{
            $id=$_POST['id'];
            $nouveauMdp=$_POST['Nmdp'];
            ctlModifieMdp($id,$nouveauMdp);
        }
        catch(Exception $e){
            $msg=$e->getMessage();
            ctlaffihcherErreurModifiMdp($msg,$id);
        }
    } 
    //GESTION MODIFIER LOGIN 
    else if(isset($_POST['choisirx'])){
        $id=$_POST['employer'];
        ctlZoneDeModificaton2($id);
    } 
    else if(isset($_POST['modifierLogin'])){
        $id=$_POST['id'];
        ctlModifierLogin($id);
    } 
    else if(isset($_POST['annulerModif'])){
        $id=$_POST['id'];
        ctlZoneDeModificaton2($id);
    } 
    else if(isset($_POST['validerModifLogin'])){
        try{
            $id=$_POST['id'];
            $nouveauLogin=$_POST['NLogin'];
            ctlModifiLogin($id,$nouveauLogin);
        }
        catch(Exception $e){
            $msg=$e->getMessage();
            ctlaffihcherErreurModifieLogin($msg,$id);
        }
    } 
    // FIN GESTION MODIFIER LOGIN

    else if(isset($_POST['CreerTypeContratouCompte'])){
        afficherZoneOption();
    }
    else if(isset($_POST['creerTypecompte'])){
        afficherZoneCreerTypeCompte();
    }
    else if (isset($_POST['ajouterPieces'])){
        try {
            $motif=$_POST['motif'];
            $motif = str_replace(" ", "", $motif);
            $nbrpiece=$_POST['nbrpiece'];
            CtlAjouter($motif, $nbrpiece);
        }
        catch(Exception $e) {
            $msg = $e->getMessage() ; 
            afficherErreurCreationType($msg); 
       }
    }
   // GESTION CREER TYPE COMPTE
    else if(isset($_POST['creerTypecontrat'])){
        afficherZoneCreerTypeContrat();
    }
    else if (isset($_POST['ajouterPieces'])){
        try {
            $motif=$_POST['motif'];
            $motif = str_replace(" ", "", $motif);
            $nbrpiece=$_POST['nbrpiece'];
            CtlAjouter($motif, $nbrpiece);
        }
        catch(Exception $e) {
            $msg = $e->getMessage() ; 
            afficherErreurCreationType($msg); 
       }
    }
    // GESTION MOFIDIER CONTRAT
    else if (isset($_POST['ModifierContrat'])){
        try {
            CtlmodifierContrat();
        }
        catch(Exception $e) {
            $msg = $e->getMessage() ; 
            afficherErreurmodifierContrat($msg); 
       }
    }
    else if (isset($_POST['mdfTCO'])){
        $contratChoisit=$_POST['typeContratChoisit'];
            CtlmodifierLeContratChoisit($contratChoisit);
    }
    else if (isset($_POST['modifiermensualite'])){
        $contratChoisit=$_POST['Cchoisit'];
            Ctlmodifiermensualite($contratChoisit);
    }
    else if (isset($_POST['validerMens'])){
        try{
            $nouvelleMens=$_POST['nouvelleMEns'];
            $contratChoisit=$_POST['Cchoisit'];
            Ctlmensualite($contratChoisit,$nouvelleMens);
        }
        catch(Exception $e) {
        $msg = $e->getMessage() ; 
        ctlafficherErreurmodifierMens($msg,$contratChoisit); 
       }
       
    }
    else if (isset($_POST['annulerModifMens'])){
        $contratChoisit=$_POST['Cchoisit'];
        CtlmodifierLeContratChoisit($contratChoisit);
    }
       // GESTION CREER TYPE COntrat
    else if (isset($_POST['ajouterPieces2'])){
        try {
            $motif=$_POST['motif'];
            $mensualite=$_POST['mensualite'];
            $motif = str_replace(" ", "", $motif);
            $nbrpiece=$_POST['nbrpiece'];
            CtlAjouter2($motif, $nbrpiece, $mensualite);
        }
        catch(Exception $e) {
            $msg = $e->getMessage() ; 
            afficherErreurCreationTypeContrat($msg); 
       }
    }
    // GESTION SUPPRIMER TYPE COMPTE
    else if (isset($_POST['SupprimerTypeCompte'])){
        CtlafficherListeTypeCompte();
    }
    else if(isset($_POST['supprimerTC'])){
        if(isset($_POST['caseTC'])){
            $case=$_POST['caseTC'];
            try{
                ctlsupprimerCompte($case);
            }
            catch(Exception $e) {
                $msg = $e->getMessage() ; 
                ctlafficherErreurSuppre($msg); 
            } 
        }
        else{
            ctlafficherErreurSuppre2();
        }
        
    }
    // GESTION SUPPRIMER TYPE COntrat
    else if (isset($_POST['SupprimerTypeContrat'])){
        CtlafficherListeTypeContrat();
    }
    else if(isset($_POST['supprimerTCO'])){
        if(isset($_POST['caseTCO'])){
            $case=$_POST['caseTCO'];
            try{
                ctlsupprimerContrat($case);
            }
            catch(Exception $e) {
                $msg = $e->getMessage() ; 
                ctlafficherErreurSuppreTCO($msg); 
            } 
        }
        else{
            ctlafficherErreurSuppre2C();
        }
        
    }
 // GESTION MODIFIER PIECES
    else if (isset($_POST['modifierPiece'])){
        afficherchoixCompteOuContrat2();
    }
    else if (isset($_POST['piecesContrat'])){
        ctlafficherZoneChoistypeContrat();
    }
    else if (isset($_POST['MDFpices'])){
        $contrat=$_POST['ctrtChoisit'];
        ctlafficherpieceContrat($contrat);
    }
    else if (isset($_POST['MDFlapiece'])){
            $contrat=$_POST['ctrt'];
            if(isset($_POST['pieceChoisit'])){
                $pieces=$_POST['pieceChoisit'];
                ctlSupprimerPiece($pieces,$contrat);
            }
            else{
                ctlafficherErreurSupprePiecs($contrat);
            }
    }
    // GESTION AJouter PIECES contrat
     else if (isset($_POST['ajouterLaPieces'])){
        $contrat=$_POST['ctrt'];
        afficherZoneAjoutPiece($contrat);
    }
    else if (isset($_POST['btnAjoutP'])){
        try{
            $contrat=$_POST['contratSelec'];
            $piecesAajouter=$_POST['pieceAajouter'];
            CTLajouterPieces($contrat,$piecesAajouter);
        }
        catch(Exception $e) {
            $msg = $e->getMessage() ; 
            ctlafficherErreurAjoutPeces($msg,$contrat); 
        } 
       
    }
     // GESTION AJOUT PIECES COMPTE
     else if (isset($_POST['piecesCompte'])){
        ctlafficherZoneChoistypeCompte();
    }
    else if (isset($_POST['MDFpices2'])){
        $compte=$_POST['cmptChoisit'];
        ctlafficherpieceCompte($compte);
    }
    else if (isset($_POST['MDFlapiece2'])){
        $compte=$_POST['ctrt2'];
        if(isset($_POST['pieceChoisit2'])){
            $pieces=$_POST['pieceChoisit2'];
            ctlSupprimerPiece2($pieces, $compte);
        }
        else{
            ctlafficherErreurSupprePiecs2( $compte);
        }
    }
    else if (isset($_POST['ajouterLaPieces2'])){
        $comptes=$_POST['ctrt2'];
        afficherZoneAjoutPiece2( $comptes);
    }
    else if (isset($_POST['btnAjoutP2'])){
        try{
            $comptes=$_POST['contratSelec2'];
            $piecesAajouter=$_POST['pieceAajouter2'];
            CTLajouterPieces2($comptes,$piecesAajouter);
        }
        catch(Exception $e) {
            $msg = $e->getMessage() ; 
            ctlafficherErreurAjoutPeces2($msg, $comptes); 
        } 
    }
     // GESTION STATISTIQUE
     else if (isset($_POST['statistique'])){
        ctlafficherZoneStatistique();
    }
     else if (isset($_POST['nbrcs'])){
        afficherZoneNbrcs();
    }
  
     else if (isset($_POST['aficher'])){
        try{
            $date1=$_POST['date1'];
            $date2=$_POST['date2'];
            ctlNbrContrat( $date1,$date2);
        }
        catch(Exception $e) {
            $msg = $e->getMessage() ; 
            afficherErreurDate($msg); 
        } 
       
    }
    else if (isset($_POST['nbrClient'])){
        afficherZonenbrClient();
    }
   
    else if (isset($_POST['afficher'])){
        try{
            $date3=$_POST['date3'];
            ctlafficherZonenbrClient($date3);
        }
        catch(Exception $e) {
            $msg = $e->getMessage() ; 
            afficherErreurDate2($msg); 
        } 
    }
    else if(isset($_POST['soldeTot'])){
        afficherZoneSoldeTot();
    }
    else if(isset($_POST['afficher1'])){
        try{
            $date4=$_POST['date4'];
            ctlafficherZoneSoldeTot($date4);
        }
        catch(Exception $e) {
            $msg = $e->getMessage() ; 
            afficherErreurDate3($msg); 
        } 
    }
    else if (isset($_POST['nbrRdv'])){
        afficherZonenbrRDV();
    }
    else if (isset($_POST['afficher3'])){
        try{
            $date1=$_POST['date5'];
            $date2=$_POST['date6'];
            ctlnbrRDV( $date1,$date2);
        }
        catch(Exception $e) {
            $msg = $e->getMessage() ; 
            afficherErreurDate4($msg); 
        } 
    }
    else{
        ctlAfficherAcceuil();
    }



