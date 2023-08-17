
<?php if (isset($_GET["succes_suppression"])) : ?>
    <p class="msg succes supprimer">
      <span class="material-icons">
            check_circle
      </span>
         L'activité a été supprimée avec succès!
    </p>
<?php endif; ?>
    <?php if (isset($_GET["echec_suppression"])) : ?>
        <p class="msg erreur erreur_supprimer">
            <span class="material-icons">
                info
            </span>
            La suppression de l'activité a échouée
        </p>
<?php endif; ?>      