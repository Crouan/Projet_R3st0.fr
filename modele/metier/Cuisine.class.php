<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace modele\metier;

/**
 * Description of Cuisine
 *
 * @author Maiwenn Doucet Chardron
 */
class Cuisine {
    
    private $idCuisine;
    private $libelle;
    
    public function __construct($idCuisine, $libelle) {
        $this->idCuisine = $idCuisine;
        $this->libelle = $libelle;
    }
    
    public function getIdCuisine() {
        return $this->idCuisine;
    }

    public function getLibelle() {
        return $this->libelle;
    }

    public function setIdCuisine($idCuisine): void {
        $this->idCuisine = $idCuisine;
    }

    public function setLibelle($libelle): void {
        $this->libelle = $libelle;
    }
     
}
