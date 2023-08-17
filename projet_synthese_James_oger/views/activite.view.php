<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vos activités</title>
    <?php include("views/parts/head.inc.php"); ?>
</head>
<body>
    <header>
        <h1>Voici tes activités <?= ucfirst($infos_utilisateur->prenom)." ".ucfirst($infos_utilisateur->nom)?></h1>  
    </header>
    <main>
        <section class="messages_activites">
            <?php include("views/parts/messages/activite.inc.php"); ?>
        </section>
       
        <div class="liste">
            <section class="contenu">
                <hr>   
                <?php foreach($activites as $activite) : ?>
                    <div class="activite">
                        <h2><?= ucfirst($activite->titre) ?></h3>
                        <h3>Catégorie:  <?= ucfirst($activite->noms_categorie) ?></h2>
                        <?php if($activite->image != null) : ?>
                            <div>
                                <img class="image" src="<?= $activite->image ?>" alt="Image" width="500">
                            </div>
                        <?php endif; ?> 
                        <a class="supprimer"href="supprimer-activite?id=<?=$activite->id ?>" class="btn_suppression">Supprimer cette activité!</a>
                        <hr>
                    </div>  
                <?php endforeach;?> 
            </section>
            <section class="boutons">
                <button class="creer"> <a href="creer-activite">Créez votre activité</a></button>
                <button class="deconnecter"><a href="deconnecter">Déconnexion</a></button>  
            </section> 
        </div>  
    </main>
</body>
</html>