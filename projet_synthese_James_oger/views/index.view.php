<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <?php include("views/parts/head.inc.php"); ?>
</head>
<body>
    <main class="accueil"> 
        <h1 class="titre">Activityzz</h1>
        <div class="login_div">
            <div>
                 <?php include("views/parts/messages/index.inc.php"); ?>
            </div>
            <section class="login">
                <h1>Connexion</h1>
                <form action="connecter" method="POST">
                    <input type="email" name="courriel" placeholder="Courriel" autofocus>
                    <input type="password" name="mdp" placeholder="Mot de passe">
                    <input class="btn_submit" type="submit" value="Envoyer">
                </form>
                <a class="pas_compte"href="compte-creer">Vous n'avez pas de compte?</a>
           </section>
       </div>
    </main>
</body>
</html>