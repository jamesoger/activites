<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Création de compte</title>
    <?php include("views/parts/head.inc.php"); ?>
</head>
<body>
    <main class="compte">
        <div>
             <div class="messages">
                <?php include("views/parts/messages/compte.inc.php"); ?>  
            </div>
            <div class="formulaire">
                <h1>Créez votre compte</h1>  
                <form action="compte-enregistrer" method="POST">
                    <input type="text" name="prenom" placeholder="Prénom" autofocus>
                    <input type="text" name="nom" placeholder="Nom">
                    <input type="email" name="courriel" placeholder="Courriel">
                    <input type="password" name="mdp" placeholder="Mot de passe">
                    <input type="password" name="confirmer_mdp" placeholder="Confirmer le mot de passe">
                    <input class="btn_submit" type="submit" value="Créez votre compte!">
                </form>
            </div>
     </div>
 </main>
</body>
</html>