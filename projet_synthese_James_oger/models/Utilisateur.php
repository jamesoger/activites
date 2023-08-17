<?php

namespace Model;

use Base\Model;

class Utilisateur extends Model {
    protected $table = "utilisateurs";
    /**
     * AJout d'un nouvel utilisateur
     *
     * @param string $prenom
     * @param string $nom
     * @param string $courriel
     * @param string $mdp
     * @return bool
     */
    public function ajouter(string $prenom, string $nom, string $courriel, string $mdp) {
        $sql = "INSERT INTO $this->table 
                    (prenom, nom, courriel, mot_de_passe) 
                VALUES 
                    (:prenom, :nom, :courriel, :mot_de_passe)";

        $requete = $this->pdo()->prepare($sql);

        return $requete->execute([
            ":prenom" => $prenom,
            ":nom" => $nom,
            ":courriel" => $courriel,
            // Encryption du mot de passe
            ":mot_de_passe" => password_hash($mdp, PASSWORD_DEFAULT),   
        ]);
          
    }

    /**
     * Récupère un utilisateur en fonction de son courriel
     *
     * @param string $courriel
     * 
     * @return object|false
     */
    public function parCourriel($courriel) {
        
        $sql = "SELECT id, mot_de_passe
                FROM $this->table
                WHERE courriel = :courriel";

        $requete = $this->pdo()->prepare($sql);

        $requete->execute([
            ":courriel" => $courriel
        ]);

        return $requete->fetch();
    }

}