<?php
/**
 * ----------
 * vueAccueil
 * ----------
 * 
 * * @version 07/2021 par NB : intégration couche modèle objet
 
 * Variables transmises par le contrôleur accueil contenant les données à afficher :
 * ---------------------------------------------------------------------------------  */
/** @var array $listeRestos : tableau d'objets métier de type Resto : les 4 restaurants les mieux notés en moyenne */
/**
 * Variables supplémentaires :  
   ------------------------- */
/** @var Resto  $unResto */
/** @var Photo  $laPhotoPrincipale */

?>
<div id="accroche">Decouvrez les meilleurs restaurants avec resto.fr</div>
<h1>Top 4 des meilleurs restaurants</h1>

<?php

foreach ($listeRestos as $unResto) {
     ?>
    <div class="card">
        <div class="photoCard">
            <?php
            $lesPhotos = $unResto->getLesPhotos();
            if (count($lesPhotos) > 0) {
                $laPhotoPrincipale = $lesPhotos[0];
                ?>
                <img src="photos/<?= $laPhotoPrincipale->getCheminP() ?>" alt="photo du restaurant" />
    <?php } ?>

        </div>
        <div class="descrCard">
            <a href="./?action=detail&idR=<?= $unResto->getIdR() ?>"><?= $unResto->getNomR() ?></a>
            <br />
            <?= $unResto->getNumAdr() ?>
            <?= $unResto->getVoieAdr() ?>
            <br />
    <?= $unResto->getCpR() ?>
    <?= $unResto->getVilleR() ?>

            <div>
            <br>
                <?php  
                    // Afficher les cuisines
                $lesCuisines = $unResto->getLesCuisines();
                foreach($lesCuisines as $uneCuisine) {
                    echo "<span style='color: red;'>#</span>" . $uneCuisine->getLibelle() . " ";
                }
                ?>
            </div> 

        </div>
        
    </div>
<?php
}
?>

Classement basé sur les critiques de nos utilisateurs.

<div style="text-align: right;">Mise à jour effectuée par équipe n°A</div>
