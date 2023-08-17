<?php

namespace Model;

use Base\Model;

class Activite extends Model {
    protected $table = "activites";
    /**
     * Ajout d'une nouvelle activité
     *
     * @param string $nom
     * @param string|null $image
     * @param integer $categorie_id
     * @param integer $utilisateur_id
     * @return bool
     */
    public function ajouter( $nom, $image, $categorie_id, $utilisateur_id) {
        $sql = "INSERT INTO $this->table (nom, image,categorie_id, utilisateur_id) VALUES (:nom, :image,:categorie_id, :utilisateur_id)";

        $requete = $this->pdo()->prepare($sql);

        return $requete->execute([
            ":nom" => $nom,
            ":image" => $image,
            ":categorie_id"=>$categorie_id,
            ":utilisateur_id" => $utilisateur_id
        ]);
    }

    /**
     * Récupérer toutes les catégories
     *
     * @return array
     */
    public function recupererCategories(){
        $sql = "SELECT 
                  *
                FROM categories";

        $requete = $this->pdo()->prepare($sql);

        $requete->execute();

        return $requete->fetchAll();        
    }
    
    /**
     * Supprimer une activité
     *
     * @param int $id
     * @return object|false
     */
    public function supprimerActivite($id){
        
        $sql="DELETE FROM $this->table
                WHERE id= :id
                ";
                
        $requete = $this->pdo()->prepare($sql);

         return $requete->execute([
            ":id"=>$id,  
        ]);

        
    }

    /**
     * Récupérer tout d'un utilisateur selon son id
     *
     * @param int $utilisateur_id
     * @return array|false
     */
    public function toutAvecUtilisateur($utilisateur_id) {
        $sql = "SELECT
                    activites.id,
                    activites.nom AS titre,
                    activites.image,
                    utilisateurs.prenom,
                    utilisateurs.nom,
                    categories.nom AS noms_categorie,
                    categories.id AS id_categorie
                FROM activites
                JOIN utilisateurs
                ON activites.utilisateur_id = utilisateurs.id
                JOIN categories
                ON categories.id = activites.categorie_id
                WHERE utilisateurs.id = :utilisateur_id
               ";
                
                
        $requete = $this->pdo()->prepare($sql);

        $requete->execute([
            ":utilisateur_id"=>$utilisateur_id
        ]);

        return $requete->fetchAll();
    }   

}