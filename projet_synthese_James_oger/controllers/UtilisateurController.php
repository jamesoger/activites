<?php

namespace Controller;

use Base\Controller;
use Model\Utilisateur;


class UtilisateurController extends Controller {
    
    /**
     * Affichage de la page d'accueil 
     *
     */
    public function index() {
        include("views/index.view.php");
    }

    /**
     * Affichage de la création du compte
     */
    public function creer() {
        include("views/compte.view.php");
    }
    /**
     * Traitement des infos du nouvel utilisateur
     *
     * @return void
     */
    public function enregistrer(){
        //validation des infos
        if(empty($_POST["prenom"]) || 
           empty($_POST["nom"]) ||
           empty($_POST["courriel"]) ||
           empty($_POST["mdp"]) ||
           empty($_POST["confirmer_mdp"])
           ){
                header("location:compte-creer?infos_absentes=1");
                exit();
           }
        //verifier que les 2 mots de passe concordent(premiere entrée et 2e entrée)
        if($_POST["mdp"] != $_POST["confirmer_mdp"]){
            header("location: compte-creer?mdp_incorrect=1");
            exit();
        }

        // Envoyer les infos au modèle
        $modele = new Utilisateur;
        $succes = $modele->ajouter($_POST["prenom"],
                                   $_POST["nom"],
                                   $_POST["courriel"],
                                   $_POST["mdp"]);
         // Rediriger si succès
         if($succes){
            header("location: index?succes_creation_compte=1");
            exit();
        }
        // Redirection si échec
        header("location: compte-creer?echec_creation_compte=1");
        exit();
    }
    
    /**
     * Connexion de l'utilisateur
     */
    public function connecter() {
        //validation parametres POST
        if(empty($_POST["courriel"]) ||
           empty($_POST["mdp"])) {
            header("location: index?infos_requises=1");
            exit();
        }

        //récupere l'utilisateur
        $modele = new Utilisateur;
        $utilisateur = $modele->parCourriel($_POST["courriel"]);

        //Valider que l'utilisateur existe et que son mot de passe est valide
        if(!$utilisateur || !password_verify($_POST["mdp"], $utilisateur->mot_de_passe)){
            header("location: index?infos_invalides=1");
            exit();
        }
         // Créer la session
        
         $_SESSION["utilisateur_id"] = $utilisateur->id;
         $_SESSION["est_connecte"] = true;
 
         // Rediriger
         header("location: activites?succes_connexion=1");
         exit();
    }

    /**
     * Déconnecte l'utilisateur
     */
    public function deconnecter() {
        // Protection de la route /deconnecter
        if(empty($_SESSION["utilisateur_id"]) == true){
            header("location: index");
            exit();
        }
        session_destroy();
        header("location: index?succes_deconnexion=1");
        exit();
    }
}