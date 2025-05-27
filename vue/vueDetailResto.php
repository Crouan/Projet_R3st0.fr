<?php
/**
 * --------------
 * vueDetailResto
 * --------------
 * 
 * @version 07/2021 par NB : intégration couche modèle objet
 * 
 * Variables transmises par le contrôleur detailResto contenant les données à afficher :  */
/** @var Resto  $unResto restaurant à afficher */
/** @var array $lesPhotos  */
/** @var float $noteMoy note moyenne des critiques du restaurant */
/** @var int $idU  */
/** @var string $mailU  */
/** @var bool $aimer  */
/** @var array $critiques  */
/**  @var Critique $maCritique  */
/** @var string $monCommentaire */
/**
 * Variables supplémentaires :  */

/** @var Photo $laPhoto */
/** @var Critique $uneCritique */
?>

<!DOCTYPE html>

<header>
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
</header>

<h1><?= $unResto->getNomR(); ?>
    
    <?php if ($aimer != false) { ?>
        <a href="./?action=aimer&idR=<?= $unResto->getIdR(); ?>" ><img class="aimer" src="images/aime.png" alt="j'aime ce restaurant"></a>
    <?php } else { ?>
        <a href="./?action=aimer&idR=<?= $unResto->getIdR(); ?>" ><img class="aimer" src="images/aimepas.png" alt="je n'aime pas encore ce restaurant"></a>
    <?php } ?>

</h1>

<span id="note">
    <!-- Afficher la note moyenne non arrondie avec 1 chiffre apres la virgule -->
    <strong> <?= number_format($noteMoy, 1); ?></strong>
    <?php for ($i = 1; $i <= 5; $i++) { ?>
        <a class="aimer" href="./?action=noter&note=<?= $i ?>&idR=<?= $unResto->getIdR(); ?>" >
            <?php if ($i <= $noteMoy) { ?>
                <img class="note" src="images/like.png" alt="">
            <?php } else {
                ?>
                <img class="note" src="images/neutre.png" alt="line neutre">
            <?php } ?>
        </a>
    <?php } ?>
</span>

<p id="principal">
    <div>
        <?php
    
        if(!empty($lesCuisines)){ ?>
        Cuisine<br>
        <?php foreach($lesCuisines as $uneCuisine) {
                echo "<span style='color: red;'>#</span>" . $uneCuisine->getLibelle() . " ";
            }
        }?>
    </div>        
   <?php if (count($lesPhotos) > 0) {
        $laPhoto = $lesPhotos[0]; // photo principale = la première de la liste
        ?>
        <img src="photos/<?= $laPhoto->getCheminP() ?>" alt="photo du restaurant" />
    <?php } ?>
    <br />
    <?= $unResto->getDescR(); ?>
</p>
<h2 id="adresse">
    Adresse
</h2>
<p>
    <?= $unResto->getNumAdr(); ?>
    <?= $unResto->getVoieAdr(); ?><br />
    <?= $unResto->getCpR(); ?>
    <?= $unResto->getVilleR(); ?>
</p>

<!-- Stockage des coordonnées dans le DOM -->
<span id="location-data" longitude="<?= htmlspecialchars($longitude) ?>" latitude="<?= htmlspecialchars($latitude) ?>"></span>
<!-- Conteneur de la carte -->
<div id="map" style="height: 400px; width: 100%; margin-top: 20px;"></div>


<h2 id="photos">
    Photos  
</h2>
<ul id="galerie">
    <?php
    foreach ($lesPhotos as $laPhoto) {
        ?>
        <li> <img class="galerie" src="photos/<?= $laPhoto->getCheminP() ?>" alt="" /></li>
        
        <?php
    }
    ?>

</ul>

<h2 id="horaires">
    Horaires
</h2> 
<?= $unResto->getHorairesR(); ?>


<h2 id="crit">Critiques</h2>

<ul id="critiques">
    <?php
    foreach ($critiques as $uneCritique) {
        ?>
        <li>
            <span>
                <?= $uneCritique->getLeUtilisateur()->getPseudoU() ?> 
                <?php
                // Si la critique est émise par l'utilisteur actuellement connecté
                if ($uneCritique->getLeUtilisateur()->getIdU() == $idU) {
                    // Il doit pouvoir la supprimer
                    ?>
                    <a href='./?action=supprimerCritique&idR=<?= $unResto->getIdR(); ?>'>Supprimer</a>
                <?php } ?>
            </span>
            <div>
                <span>
                    <?php
                    // Si une note a été émise
                    if ($uneCritique->getNote()) {
                        // L'afficher
                        ?>
                        <?= $uneCritique->getNote() ?>/5
                        <?php
                    }
                    ?>
                </span>
                <span><?= $uneCritique->getCommentaire() ?> </span>
            </div>

        </li>
    <?php } ?>

</ul>

<?php
if ($mailU) {
    ?>
    <form action="./?action=commenter&idR=<?= $unResto->getIdR(); ?>" method="POST">
        <textarea id="commentaireForm" name="commentaire"><?= $monCommentaire ?></textarea><br />
        <input type="submit" value="Enregistrer le commentaire" />
    </form>

    <?php
}
?>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Récupérer les coordonnées depuis l'élément caché
        const locationElement = document.getElementById('location-data');
        const longitude = parseFloat(locationElement.getAttribute('longitude'));
        const latitude = parseFloat(locationElement.getAttribute('latitude'));

        // Initialiser la carte centré sur la position
        const map = L.map('map').setView([latitude, longitude], 13);

        // Ajouter une couche de tuiles
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Ajouter un marqueur à la position
        const marker = L.marker([latitude, longitude]).addTo(map);
        marker.bindPopup("Position du restaurant").openPopup();
    });
</script>

