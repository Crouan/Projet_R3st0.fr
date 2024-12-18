<?php
use \modele\metier\Resto;
use \modele\metier\Utilisateur;

use modele\metier\Critique;
use modele\metier\Photo;

require_once '../../includes/autoload.inc.php';

// Création de l'utilisateur
$user = new Utilisateur(6, 'test@bts.sio', 'seSzpoUAQgIl', 'testeur SIO');
$desCritiques = array();
$desCritiques[] = new Critique(5, "Parfait", $user);
$desCritiques[] = new Critique(3, "Perfectible ...", $user);

$desPhotos = array();
$desPhotos[] = new Photo(6, "cidrerieDuFronton.jpg");
$desPhotos[] = new Photo(7, "bar_de_la-cidrerie.jpg");

// Création du restaurant avec latitude et longitude
$unResto = new Resto(4, "Cidrerie du fronton", "3", "Place du Fronton", "64210", "Arbonne", 43.3879, -1.4836, "odenf","Ouvert 24/24 et 7/7");

$unResto->setLesPhotos($desPhotos);
$unResto->setLesCritiques($desCritiques);

?>
<h2>Test unitaire de la classe Utilisateur</h2>

<!-- Affichage du restaurant -->
<?php
var_dump($unResto);

// Test de la latitude et de la longitude
echo "<h3>Latitude: " . $unResto->getLatitudeDegR() . "</h3>";
echo "<h3>Longitude: " . $unResto->getLongitudeDegR() . "</h3>";
?>
