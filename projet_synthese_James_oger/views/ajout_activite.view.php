<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout activité</title>
    <?php include("views/parts/head.inc.php"); ?>
</head>
<body>
    <section class="messages_ajout">
        <?php include("views/parts/messages/ajout_activite.inc.php"); ?>
    </section>
    <section class="ajout_activite">
          <h1>Créez votre activité</h1>
          <hr>
        <form action="activites-enregistrer" method="POST" enctype="multipart/form-data">
            <label>
                <h2>Titre de votre activité</h2> 
                <textarea name="nom"class="nom"placeholder="Entrez votre titre d'activité..."></textarea> 
            </label>
             <h2 class="categorie">Catégories</h2>
            <select name="noms_categorie" id="">
                <option>choisissez une catégorie</option>
                <?php foreach($categories as $categorie) : ?>
                    <option value="<?=$categorie->id ?>"><?= $categorie->nom ?></option>    
                <?php endforeach;?>
            </select>
            <label>
                <h2 class="media">Image (facultative)</h2>
                <input class="file" type="file" name="image">
            </label>
                <div>
                    <input type="submit" value="Créer votre activité" class="btn_submit">
                </div>   
        </form>
            <hr>
            <button class="retour"> <a href="activites">Retour aux activités</a></button>
    </section>
</body>
</html>



