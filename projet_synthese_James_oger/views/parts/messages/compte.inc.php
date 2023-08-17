<?php if (isset($_GET["mdp_incorrect"])) : ?>
    <p class="msg erreur">
        <span class="material-icons">
            info
        </span>
        Le mot de passe n'a pu être confirmé
    </p>
<?php endif; ?>

<?php if (isset($_GET["echec_creation_compte"])) : ?>
    <p class="msg erreur">
        <span class="material-icons">
             info
        </span>
            Le compte n'a pu être créé...
    </p>
<?php endif; ?>

<?php if (isset($_GET["infos_absentes"])) : ?>
    <p class="msg erreur">
        <span class="material-icons">
           info
        </span>
         Il manque des informations,veuillez remplir tous les champs
    </p>
<?php endif; ?>    