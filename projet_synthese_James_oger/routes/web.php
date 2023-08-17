<?php

$routes = [
    // route => [controller, méthode]
    //accueil, connexion
    // Connexion
    "index" => ["UtilisateurController", "index"],

    // Traitement de la connexion
    "connecter" => ["UtilisateurController", "connecter"],
    
    // Formulaire de création de compte
    "compte-creer" => ["UtilisateurController", "creer"],

    // Traitement de la création d'un compte
    "compte-enregistrer" => ["UtilisateurController", "enregistrer"],

    // Traitement de la déconnexion
    "deconnecter" => ["UtilisateurController", "deconnecter"],

    //Page des activités
    "activites"=>["ActiviteController", "index"],
    
    //page d'ajout d'une activité
    "creer-activite"=>["ActiviteController", "ajout_activite"],

    //Traitement de la création d'une activité
    "activites-enregistrer" => ["ActiviteController", "enregistrer"],

    //suppression d'une activité
    "supprimer-activite" => ["ActiviteController", "suppression"]
    
];