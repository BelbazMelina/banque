<?php
function getConnect(){
    require_once('connect.php');
    $connexion=new PDO('mysql:host='.SERVEUR.';dbname='.BDD,USER,PASSWORD);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $connexion->query('SET NAMES UTF8');
    return $connexion;
}
function getCategorie($login,$motDepasse){
    $connexion=getconnect();
    $requete="SELECT categorie FROM employes WHERE identifiant ='$login' and motDepasse='$motDepasse'";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $personnel=$resultat->fetch();

    return $personnel;
}
function checkUser($login,$motDepasse){
    $connexion=getConnect();
    $requete="SELECT*FROM employes where motDePasse='$motDepasse' and identifiant='$login'";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $resulat=$resultat->fetch();

    return $resulat;
}
function getNomUser($login,$motDepasse){
    $connexion=getConnect();
    $requete="SELECT nom FROM employes where login='$login' and motDepasse='$motDepasse'";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $personnel=$resultat->fetch();

    return $personnel;
}

function getInfoClient($idClient){
    $connexion=getConnect();
    $requete="SELECT*FROM clients where idClient='$idClient'";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $information=$resultat->fetch();

    return $information;
}
function getCompteClientx($idClient){
    $connexion=getConnect();
    $requete="SELECT*FROM comptesclient where idClient='$idClient'";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $listeCompte=$resultat->fetchAll();

    return  $listeCompte;
}
function getCompteClient($idClient){
    $connexion=getConnect();
    $requete="SELECT*FROM comptesclient where idClient='$idClient'";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    // $listeCompte=$resultat->fetch();

    return  $resultat;
}
function getContratClientx($idClient){
    $connexion=getConnect();
    $requete="SELECT*FROM contratsclient where idClient='$idClient'";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $listeContrat=$resultat->fetchAll();

    return  $listeContrat;
}


function modifierAdresse($nouvelleAdresse,$idDuclientAmodifier){
    $connexion=getConnect();
    $requete="UPDATE clients SET adresse='$nouvelleAdresse' WHERE idClient='$idDuclientAmodifier'";
    $resultat=$connexion->query($requete);
    $resultat->closeCursor();
}

function modifierEmail($nouveauEmail,$idDuclientAmodifier){
    $connexion=getConnect();
    $requete="UPDATE clients SET email='$nouveauEmail' WHERE idClient='$idDuclientAmodifier'";
    $resultat=$connexion->query($requete);
    $resultat->closeCursor();
}

function modifierNumeroTel($nouveauNumero,$idDuclientAmodifier){
    $connexion=getConnect();
    $requete="UPDATE clients SET numeroTel='$nouveauNumero' WHERE idClient='$idDuclientAmodifier'";
    $resultat=$connexion->query($requete);
    $resultat->closeCursor();
}
function modifierProfession($nouvelleProfession,$idDuclientAmodifier){
    $connexion=getConnect();
    $requete="UPDATE clients SET profession='$nouvelleProfession' WHERE idClient='$idDuclientAmodifier'";
    $resultat=$connexion->query($requete);
    $resultat->closeCursor();
}
function modifierSituationF($nouvelleSituation,$idDuclientAmodifier){
    $connexion=getConnect();
    $requete="UPDATE clients SET situationFamiliale='$nouvelleSituation' WHERE idClient='$idDuclientAmodifier'";
    $resultat=$connexion->query($requete);
    $resultat->closeCursor();
}
function RechercherId($nomDuclient,$dateDeNaissance){
    $connexion=getConnect();
    $requete="SELECT idClient FROM clients where nom='$nomDuclient' and dateDeNaissance='$dateDeNaissance'";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    // $information=$resultat->fetch();

    return   $resultat;
}
function RechercherIdAvecNumeroTel($num){
    $connexion=getConnect();
    $requete="SELECT idClient FROM clients where numeroTel='$num'";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    // $information=$resultat->fetch();

    return   $resultat;
}

function getIdcompteClient($idClient){
    $connexion=getConnect();
    $requete="SELECT idCompte FROM comptesclient where idClient='$idClient'";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    // $listeCompte=$resultat->fetchAll();

    return $resultat;
}
 //gestion depot
 function getSolde($idComptes){
    $connexion=getConnect();
    $requete="SELECT solde FROM comptesclient where idCompte='$idComptes'";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $listeCompte=$resultat->fetch();

    return $listeCompte;
}
function faireDepot($idDuCompte,$somme){
    $connexion=getConnect();
    $requete="UPDATE comptesClient SET solde='$somme' WHERE idCompte='$idDuCompte'";
    $resultat=$connexion->query($requete);
    $resultat->closeCursor();
}

function getDecouverAutoriser($idComptes){
    $connexion=getConnect();
    $requete="SELECT Decouvertautoriser FROM comptesclient where idCompte='$idComptes'";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $listeCompte=$resultat->fetch();

    return $listeCompte;
}
function faireRetrait($idDuCompte,$somme){
    $connexion=getConnect();
    $requete="UPDATE comptesClient SET solde='$somme' WHERE idCompte='$idDuCompte'";
    $resultat=$connexion->query($requete);
    $resultat->closeCursor();
}
function getTypeContrat(){
    $connexion=getConnect();
    $requete="SELECT*FROM typeContrat";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $listeCompte=$resultat->fetchAll();

    return  $listeCompte;
}
function getTypeCompte(){
    $connexion=getConnect();
    $requete="SELECT*FROM typecompte";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $listeCompte=$resultat->fetchAll();

    return  $listeCompte;
}

function getIdByNumTel($num){
    $connexion=getConnect();
    $requete="SELECT*FROM clients where numeroTel='$num'";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $Id=$resultat->fetch();

    return   $Id;
}
function getPieces($typeContrat){
    $connexion=getConnect();
    $requete="SELECT*FROM  inter where type='$typeContrat'";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $pieces=$resultat->fetchAll();

    return  $pieces;

}
// ajouterCreationContrat($id,$contrat,$mensualite,$dateOuverture);
function ajouterCreationContrat($id,$contratChoisit,$mensualite,$dateOuverture){
    $connexion=getConnect();
    $requete="INSERT into contratsClient values(0,'$id','$contratChoisit','$mensualite','$dateOuverture')";
    $resultat=$connexion->query($requete);
}
function ouvertureCompte($compteChoisit,$id,$dateOuverture,$decouvert){
    $connexion=getConnect();
    $requete="INSERT into comptesClient (idCompte,idClient,nomducompte,Decouvertautoriser,solde,Dateouverture) 
    values(0,'$id','$compteChoisit','$decouvert',0,'$dateOuverture')";
    $resultat=$connexion->query($requete);
}


function getMensualite($contrat){
    $connexion=getConnect();
    $requete="SELECT Mensualite FROM typeContrat where nomContrat='$contrat'";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $mensualite=$resultat->fetch();

    return  $mensualite;
}
function verificationContratDouble($id,$contrat){
    $connexion=getConnect();
    $requete="SELECT*FROM contratsclient where idClient='$id' and  nomducontrat='$contrat'";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $information=$resultat->fetch();

    return  $information;
}
function verificationComptetDouble($id,$compte){
    $connexion=getConnect();
    $requete="SELECT*FROM comptesClient where idClient='$id' and  nomducompte='$compte'";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $information=$resultat->fetch();

    return  $information;
}
function inscription($nom,$prenom,$dateDeNaissance,$adresse,$numerotel,
$email,$situationF,$profession,$idCharger,$dateInscription){
    $connexion=getConnect();
    $requete="INSERT INTO clients (idClient,nom,prenom,dateDeNaissance,adresse,numeroTel,
    email,profession,situationFamiliale,chargerClient,dateInscription) Values (0,'$nom','$prenom','$dateDeNaissance','$adresse','$numerotel','$email',
    '$situationF','$profession','$idCharger','$dateInscription')";
    $resultat=$connexion->query($requete);
}
function  bloquerCreneaux($id,$motif,$date,$heure){
    $connexion=getConnect();
    $requete="INSERT INTO crenauxbloquer (idConseiller,motif,heure,date)
    Values ($id,'$motif','$heure','$date')";
    $resultat=$connexion->query($requete);
}
function existanceId($id){
    $connexion=getConnect();
    $requete="SELECT*FROM employes where idEmploye='$id' and categorie='conseiller'";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $information=$resultat->fetch();

    return  $information;
}
function modifierDecouvert($compteChoisit,$idClient,$valeurDecouvert){
    $connexion=getConnect();
    $requete="UPDATE comptesClient SET Decouvertautoriser='$valeurDecouvert' WHERE idClient='$idClient' and 
    nomducompte='$compteChoisit'";
    $resultat=$connexion->query($requete);
    $resultat->closeCursor();
}

function resilierCompte($id,$compte){
    $connexion=getConnect();
    $requete="DELETE FROM comptesClient Where idClient='$id' and nomduCompte='$compte'";
    $resultat=$connexion->query($requete);
    $resultat->closeCursor();
}
function resilierContrat($id,$contrat){
    $connexion=getConnect();
    $requete="DELETE FROM contratsClient Where idClient='$id' and nomduContrat='$contrat'";
    $resultat=$connexion->query($requete);
    $resultat->closeCursor();
}
function ajouterEmployer($nom,$prenom,$login,$mdp,$categorie){
    $connexion=getConnect();
    $requete="INSERT INTO employes (idEmploye,nom,prenom,identifiant,motDepasse,categorie)
    Values (0,'$nom','$prenom','$login','$mdp','$categorie')";
    $resultat=$connexion->query($requete);
}

//  fonction de ayoub
function verifierLogin($login)
{
    $connexion=getConnect();
    $requete="SELECT*from employes where identifiant='$login'";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    return $resultat;
}

function getEmployer(){
    $connexion=getConnect();
    $requete="SELECT*FROM employes";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $employe=$resultat->fetchAll();

    return  $employe;

}
function getInfoEmploye($id){
    $connexion=getConnect();
    $requete="SELECT*FROM employes where idEmploye='$id'";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $info=$resultat->fetch();

    return  $info;
}
function modifierMdp($id,$nouveauMdp){
    $connexion=getConnect();
    $requete="UPDATE employes SET motDepasse='$nouveauMdp' WHERE idEmploye='$id'";
    $resultat=$connexion->query($requete);
    $resultat->closeCursor();
}
function modifierLogin($id,$nouveauLogin){
    $connexion=getConnect();
    $requete="UPDATE employes SET identifiant='$nouveauLogin' WHERE idEmploye='$id'";
    $resultat=$connexion->query($requete);
    $resultat->closeCursor();
}

function verifierMotif($motif)
{
    $connexion=getConnect();
    $requete="SELECT nomMotif from motif where nomMotif='$motif'";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    return $resultat;
}
function ajouterMotif($motif){
    $connexion=getConnect();
    $requete="INSERT INTO motif Values ('$motif')";
    $resultat=$connexion->query($requete);
}

function verificationPiece($piece){
    $connexion=getConnect();
    $requete="SELECT nompiece from pieces where nompiece='$piece'";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    return $resultat;
}
function  ajouterMotifAtypeCompte($motif){
    $connexion=getConnect();
    $requete="INSERT INTO typecompte Values ('$motif')";
    $resultat=$connexion->query($requete);
}
function  ajouterPieceMotif($piece,$motif){
    $connexion=getConnect();
    $requete="INSERT INTO inter Values ('$motif','$piece')";
    $resultat=$connexion->query($requete);
}
function  ajouterMotifAtypeContrat($motif,$mensualite){
    $connexion=getConnect();
    $requete="INSERT INTO typecontrat Values ('$motif','$mensualite')";
    $resultat=$connexion->query($requete);
}
function verifierCompte($compte){
    $connexion=getConnect();
    $requete="SELECT*FROM comptesclient where nomducompte='$compte'";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $info=$resultat->fetch();

    return  $info;

}
function verifierContrat($contrat){
    $connexion=getConnect();
    $requete="SELECT*FROM contratsclient where nomducontrat='$contrat'";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $info=$resultat->fetch();

    return  $info;

}
function SupprimerCompte($compte){
    $connexion=getConnect();
    $requete="DELETE FROM typecompte Where nomCompte='$compte'";
    $resultat=$connexion->query($requete);
    $resultat->closeCursor();
}
function SupprimerMotif($compte){
    $connexion=getConnect();
    $requete="DELETE FROM motif Where nomMotif='$compte'";
    $resultat=$connexion->query($requete);
    $resultat->closeCursor();
}

function SupprimerContrat($contrat){
    $connexion=getConnect();
    $requete="DELETE FROM typecontrat Where nomContrat='$contrat'";
    $resultat=$connexion->query($requete);
    $resultat->closeCursor();
}
function getInfoContrat($contrat){
    $connexion=getConnect();
    $requete="SELECT*FROM typecontrat where nomContrat='$contrat'";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $info=$resultat->fetch();

    return  $info;

}
function modifierMens($contratChoisit,$nouvelleMens){
    $connexion=getConnect();
    $requete="UPDATE typecontrat SET mensualite='$nouvelleMens' WHERE nomContrat='$contratChoisit'";
    $resultat=$connexion->query($requete);
    $resultat->closeCursor();
}
function supprimerPieces($pieces,$contrat){
    $connexion=getConnect();
    $requete="DELETE FROM inter Where type='$contrat' and pieces='$pieces'";
    $resultat=$connexion->query($requete);
    $resultat->closeCursor();
}

function verifiactionPices($contrat,$piecesAajouter){
    $connexion=getConnect();
    $requete="SELECT*FROM inter where type='$contrat' and pieces='$piecesAajouter'";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $info=$resultat->fetch();

    return  $info;
}

// GESTION STATISTIQUE

function getNbrContrat($date1,$date2){
    $connexion=getConnect();
    $requete="SELECT*FROM contratsclient where dateouverture between '$date1' and '$date2'";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    // $nbrContrat=$resultat->fetch();

    return  $resultat;
}
function getNbrTotalClients($date3){
    $connexion=getConnect();
    $requete="SELECT*FROM clients where dateInscription <='$date3'";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    // $nbrContrat=$resultat->fetch();

    return  $resultat;
}
function getCompteClientPourS($date){
    $connexion=getConnect();
    $requete="SELECT*FROM comptesclient where Dateouverture <='$date'";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $listeCompte=$resultat->fetchAll();

    return  $listeCompte;
}
function getNbrRdv($date1,$date2){
    $connexion=getConnect();
    $requete="SELECT*FROM rdv where dateRdv between '$date1' and '$date2'";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    // $nbrContrat=$resultat->fetch();

    return  $resultat;
}



// GESTION RDV
function getIndisponibilite($idConseiller){
    $connexion=getConnect();
    $requete="SELECT * FROM crenauxbloquer WHERE idConseiller ='$idConseiller'";
    $result =$connexion->query($requete);
    $result->setFetchMode(PDO::FETCH_OBJ);
    // $information=$result->fetch();

    return  $result;

}
function verificationDispo($idConseiller,$date){
    $connexion=getConnect();
    $requete="SELECT * FROM crenauxbloquer WHERE idConseiller ='$idConseiller' and date='$date'";
    $result =$connexion->query($requete);
    $result->setFetchMode(PDO::FETCH_OBJ);
    $information=$result->fetch();

    return    $information;
}
function verificationRdv($idConseiller,$date,$heure){
    $connexion=getConnect();
    $requete="SELECT * FROM crenauxbloquer WHERE idConseiller ='$idConseiller' 
    and date='$date' and heure='$heure'";
    $result =$connexion->query($requete);
    $result->setFetchMode(PDO::FETCH_OBJ);
    $information=$result->fetch();

    return    $information;
}
function getMotif($idConseiller,$date,$heure){
    $connexion=getConnect();
    $requete="SELECT * FROM crenauxbloquer WHERE idConseiller ='$idConseiller' 
    and date='$date' and heure='$heure'";
    $result =$connexion->query($requete);
    $result->setFetchMode(PDO::FETCH_OBJ);
    $information=$result->fetch();

    return    $information;
}
function enregisterRdv($idConseiller,$date,$heure,$idClient,$motif, $numeroTel){
    $connexion=getConnect();
    $requete="INSERT INTO rdv (idRdv,motif,dateRdv,
    heureRdv,idClient,idConseiler,numeroTel) VALUES(0,'$motif','$date',
    '$heure','$idClient','$idConseiller','$numeroTel')";
    $result =$connexion->query($requete);
}
function enregisterRdv2($idConseiller,$date,$heure,$motif, $numeroTel){
    $connexion=getConnect();
    $requete="INSERT INTO rdv (idRdv,motif,dateRdv,
    heureRdv,idConseiler,numeroTel) VALUES(0,'$motif','$date',
    '$heure','$idConseiller','$numeroTel')";
    $result =$connexion->query($requete);
}
function getMotifRdv(){
    $connexion=getConnect();
    $requete="SELECT * FROM motif "; 
    $result =$connexion->query($requete);
    $result->setFetchMode(PDO::FETCH_OBJ);
    $information=$result->fetchAll();

    return    $information;
}

// GESTION BLOQUER CRENAUX

function bloquerCrenaaux2($idConseiller,$date,$heure,$motif){
    $connexion=getConnect();
    $requete="INSERT INTO crenauxbloquer (idConseiller,motif,date,
    heure) VALUES($idConseiller,'$motif','$date','$heure')";
    $result =$connexion->query($requete);
}
function getInfoConseil($id){
    $connexion=getConnect();
    $requete="SELECT*FROM employes where idEmploye='$id' and categorie='conseiller'";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $info=$resultat->fetch();

    return  $info;
}
function getTaches($date){
    $connexion=getConnect();
    $requete="SELECT*FROM rdv where dateRdv='$date'";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $info=$resultat->fetchALL();

    return  $info;
}
function getTachesConseiller($date,$id){
    $connexion=getConnect();
    $requete="SELECT*FROM rdv where dateRdv='$date' and idConseiler='$id'";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $info=$resultat->fetchALL();

    return  $info;
}

function getTachesConseiller2($date,$id){
    $connexion=getConnect();
    $requete="SELECT*FROM crenauxbloquer where date='$date' and idConseiller='$id'";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $info=$resultat->fetchALL();

    return  $info;
}
function verifierCrenaux($id,$date,$heure){
    $connexion=getConnect();
    $requete="SELECT*FROM crenauxbloquer where date='$date' and idConseiller='$id'
    and heure='$heure'";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $info=$resultat->fetch();

    return  $info;
}

function getconseilerIndsipo($date,$heure,$idConseiller){
    $connexion=getConnect();
    $requete="SELECT*FROM crenauxbloquer where date='$date' and heure='$heure'
    and idConseiller='$idConseiller'";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $info=$resultat->fetchALL();

    return  $info;
}

function getConseiller(){
    $connexion=getConnect();
    $requete="SELECT*FROM employes where categorie='conseiller'";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $info=$resultat->fetchAll();

    return  $info;
}
function getConseillerVecNum($num){
    $connexion=getConnect();
    $requete="SELECT*FROM employes where categorie='conseiller'";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $info=$resultat->fetchAll();

    return  $info;
}
function getRdvClientAvecidEtDate($id,$date){
    $connexion=getConnect();
    $requete="SELECT*FROM rdv where dateRdv='$date' and idClient='$id'";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $info=$resultat->fetch();

    return  $info;

}
function verificationRDVdouble($idConseiller,$date,$heure){
    $connexion=getConnect();
    $requete="SELECT*FROM rdv where dateRdv='$date' and idConseiler='$idConseiller'
    and heureRdv='$heure'";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $info=$resultat->fetch();

    return  $info;
}
function verificationclient($num){
    $connexion=getConnect();
    $requete="SELECT*FROM clients where numeroTel='$num'";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $info=$resultat->fetch();

    return  $info;
}
function verificationRDVdouble2($numero,$date,$heure){
    $connexion=getConnect();
    $requete="SELECT*FROM rdv where dateRdv='$date' and numeroTel='$numero'
    and heureRdv='$heure'";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $info=$resultat->fetch();

    return  $info;
}