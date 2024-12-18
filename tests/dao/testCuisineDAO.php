<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>CuisineDAO : tests unitaires</title>
    </head>

    <body>
    <?php
    
    use modele\dao\RestoDAO;
    use modele\dao\CuisineDAO;
    use modele\dao\Bdd;
    
    require_once '../../includes/autoload.inc.php';
    
    Bdd::connecter();
    $listeResto = RestoDAO::getAll();
foreach($listeResto as $resto) {
    $listeCuisines = CuisineDAO::getCuisineByResto($resto->getIdR());
    
    // Affiche le nom du restaurant
    echo $resto->getNomR() . " : ";

    // Vérifie si des cuisines ont été récupérées
    if (count($listeCuisines) > 0) {
        // Parcours des cuisines et affichage des libellés
        foreach ($listeCuisines as $uneCuisine) {
            echo "#" . $uneCuisine->getLibelle() . " "; // Affiche chaque libellé
        }
    } else {
        echo "Aucune cuisine disponible.";
    }
    echo "<br>"; // Saut de ligne pour chaque restaurant
}
    
    ?>
    </body>
</html>