<?php if (isset($_GET["infos_requises"])) : ?>
     <p class="msg erreur infos">
        <span class="material-icons">
            info
        </span>
         Toutes les informations sont requises, (sauf l'image)!
    </p>
<?php endif; ?>

<?php if (isset($_GET["succes_ajout"])) : ?>
    <p class="msg succes ajout">
        <span class="material-icons">
            info
        </span>
        L'activité a été ajoutée avec succès!
    </p>
<?php endif; ?> 

<?php if (isset($_GET["echec_ajout"])) : ?>
    <p class="msg erreur ajouter">
        <span class="material-icons">
             info
        </span>
        L'activité n'a pas pu être crée...
    </p>
<?php endif; ?> 