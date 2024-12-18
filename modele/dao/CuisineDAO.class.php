<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace modele\dao;

use modele\metier\Cuisine;
use modele\dao\Bdd;
use PDO;
use PDOException;
use Exception;


/**
 * Description of CuisineDAO
 *
 * @author Maiwenn Doucet Chardron
 */
class CuisineDAO {
    
     /**
     * Récupérer cuisines pour chaque restaurant
     * @param int $idResto
     * @return array : renvoie une liste d'objets 'Cuisine'
     * @throws Exception transmission des erreurs
     */
    public static function getCuisineByResto(int $idResto) :array {
        $lesCuisines = [];
        // Exécution de la requête qui récupérera les types de cuisine associées au restaurant
        try {
            $query = "SELECT c.idTC, c.libelleTC
                      FROM cuisine c
                      INNER JOIN cuisine_restaurant cr ON c.idTC = cr.idcuisine
                      WHERE cr.idresto = :idresto";

            $stmt = Bdd::getConnexion()->prepare($query);
            $stmt->bindParam(':idresto', $idResto, PDO::PARAM_INT);
            $stmt->execute();

            // Pour chaque enregistrement, créer un objet Cuisine et l'ajouter à la liste
            while ($enreg = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $lesCuisines[] = self::enregistrementVersObjet($enreg);
            } 
        }catch (PDOException $e) {
            throw new Exception("Erreur dans CuisineDAO::getCuisinesByRestaurantId : <br/>" . $e->getMessage());
        }
        return $lesCuisines;        
    }
    
    /**
     * Créer un objet de type 'Cuisine' à partir d'un enregistrement de la table cuisine
     * @param array $enreg
     * @return Cuisine : un objet de type 'Cuisine'
     */
    private static function enregistrementVersObjet(array $enreg): Cuisine {
        // Instanciation de l'objet Cuisine
        $laCuisine = new Cuisine(
                $enreg['idTC'], $enreg['libelleTC']
        );
        return $laCuisine;
    }

}
