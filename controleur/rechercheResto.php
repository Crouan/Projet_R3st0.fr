<?php
use modele\dao\Bdd;
use modele\dao\RestoDAO;


/**
 * Contrôleur rechercheResto
 * Gère la recherche de restaurants par filtrage
 * 
 * Vues contrôlées : vueRechercheResto, vueListeRestos
 * Données GET : critere (nom, adresse, multi) = critere de filtrage
 * 
 * @version 07/2021 intégration couche modèle objet
 */

Bdd::connecter();
    
// creation du menu burger
$menuBurger = array();
$menuBurger[] = Array("url"=>"./?action=recherche&critere=nom","label"=>"Recherche par nom");
$menuBurger[] = Array("url"=>"./?action=recherche&critere=adresse","label"=>"Recherche par adresse");

$menuBurger[] = Array("url"=>"./?action=recherche&critere=multi","label"=>"Recherche multicritère");

// recuperation des donnees GET, POST, et SESSION
// critere de recherche par defaut : le nom
$critere = "nom";
if (isset($_GET["critere"])) {
    $critere = $_GET["critere"];
}

$nomR="";
if (isset($_POST["nomR"])){
    $nomR = $_POST["nomR"];
}

$voieAdrR="";
if (isset($_POST["voieAdrR"])){
    $voieAdrR = $_POST["voieAdrR"];
}

$cpR="";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST["cpR"])) {
        // Vérifie si le code postal est composé de 5 chiffres
        if (preg_match('/^\d{5}$/', $_POST["cpR"])) {
            $cpR = $_POST["cpR"];
        } else {
            ajouterMessage("le code postal saisie n'est pas valide");
        }
    }
}

$villeR="";
if (isset($_POST["villeR"])){
    $villeR = $_POST["villeR"];
}

$tabIdTC = array();
if(isset($_POST["tabIdTC"])){
    $tabIdTC = $_POST["tabIdTC"];
}


// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 
switch($critere){
    case 'nom':
        // recherche par nom
        $listeRestos = RestoDAO::getAllByNomR($nomR);
        break;
    case 'adresse':
        // recherche par adresse
        $listeRestos = RestoDAO::getAllByAdresse($voieAdrR, $cpR, $villeR);
        break;
        
    case 'multi':
        // recherche multi-critere
        $listeRestos = RestoDAO::getAllMultiCriteres($nomR,$voieAdrR, $cpR, $villeR,$tabIdTC);
        break;
    
} 

$titre = "Recherche d'un restaurant";
require_once "$racine/vue/entete.html.php";
if (empty($_POST)) {
    require_once "$racine/vue/vueRechercheResto.php";
}else{
    // affichage des resultats de la recherche
    include "$racine/vue/vueListeRestos.php";
}
require_once "$racine/vue/pied.html.php";


