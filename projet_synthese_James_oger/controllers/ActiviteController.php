<?php

namespace Controller;

use Base\Controller;
use Model\Activite;
use Model\Utilisateur;
use Util\Upload;

class ActiviteController extends Controller {
      
    /**
     * affichage des activités
     *
     */
    public function index(){
        //protection de la route pour les activités
        if(empty($_SESSION["utilisateur_id"]) == true){
            header("location: index");
            exit();
        }

        // Récupération de l'id de l'utilisateur
        $utilisateur_id = $_SESSION["utilisateur_id"];


         //recuperer les activités de l'utilisateur auxquels elles sont liées
        $modele = new Activite;
        $activites = $modele->toutAvecUtilisateur($utilisateur_id);

        //recuperer le nom et prenom de l'utilisateur
        $modele_nom = new Utilisateur;
        $infos_utilisateur = $modele_nom->parId($utilisateur_id);
        
        //inclusion de la vue activité
        include("views/activite.view.php");
    
    }
    /**
     * Page d'ajout d'une activité
     *
     */
    public function ajout_activite(){
        // Protection de la route /publications
        if(empty($_SESSION["utilisateur_id"]) == true){
            header("location: index");
            exit();
        }
        $modele = new Activite;
        //recuperation des catégories afin de les montrer dans
        //la page ajout d'activité
        $categories = $modele->recupererCategories();
        
        //inclusion de la vue ajout d'activité
         include("views/ajout_activite.view.php");
    }

    
     /**
     * Traite les informations d'une nouvelle activité
     */
    public function enregistrer() {
        // Protection de la route /publications
        if(empty($_SESSION["utilisateur_id"]) == true){
            header("location: index");
            exit();
        }

        // Validation des paramètres
        if(empty($_POST["nom"])||
        ($_POST["noms_categorie"] == "choisissez une catégorie")){
            header("location: creer-activite?infos_requises=1");
            exit();
        }
         // Traitement de l'image s'il y a lieu
         $image = null;
         $upload = new Upload("image", ["jpeg", "jpg", "png", "webp", "gif"]);
         if( $upload->estValide()){
             $image = $upload->placerDans("uploads");
        }
         // Récupération de l'id de l'utilisateur
         $utilisateur_id = $_SESSION["utilisateur_id"];
         
         
         // Ajouter l'activite
         $modele = new Activite;
         $succes = $modele->ajouter($_POST["nom"],
                                     $image,
                                    $_POST["noms_categorie"],
                                    $utilisateur_id,
                                    );  
         // Redirection si échec
         if(!$succes){
             header("location: creer-activite?echec_ajout=1");
             exit();
         }
 
         // Redirection si succès
         header("location: creer-activite?succes_ajout=1");
         exit();   

    }
    
    /**
     * Suppression d'une activité
     *
     */
    public function suppression(){
        //validation
        if (empty($_GET["id"])) {
            header("location:index");
            exit();
        }

        // Protection de la route /supprimer-activite
        if(empty($_SESSION["utilisateur_id"]) == true){
            header("location: index");
            exit();
        }
        
        // Récupération de l'id de l'utilisateur
        $utilisateur_id = $_SESSION["utilisateur_id"];

        $modele = new Activite;
        $succes = $modele->supprimerActivite($_GET["id"]);
       
       // Redirection si échec
        if(!$succes){
            header("location: activites?echec_suppression=1");
            exit();
        }

       // Redirection si succès
        header("location: activites?succes_suppression=1");
        exit();
        
    }  

}




