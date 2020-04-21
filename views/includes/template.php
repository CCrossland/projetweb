<?php
require_once 'models/users.php';
?>

<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="<?=ROOT_PATH?>public/css/superhero.min.css">
        <link rel="stylesheet" href="<?=ROOT_PATH?>public/css/sticky-footer-navbar.css">
        <script src="<?=ROOT_PATH?>public/js/jquery-3.4.1.slim.min.js"></script>
        <script src="<?=ROOT_PATH?>public/js/popper.min.js"></script>
        <script src="<?=ROOT_PATH?>public/js/bootstrap.min.js"></script>

        <!-- canvas -->
        <script src="<?=ROOT_PATH?>public/js/canvasjs.min.js"></script>
        <script src="<?=ROOT_PATH?>public/js/canvasjs.react.js"></script>

        <script src="<?=ROOT_PATH?>public/js/regex.js"></script>

        <title><?php echo $title; ?></title>
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark">
            <a class="navbar-brand" href="<?=ROOT_PATH?>"><h3>Jeu Vidéal</h3></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active"><a class="nav-link" href="<?=ROOT_PATH?>article">Notre Boutique</a></li>
                

                <?php if (!empty($_SESSION['id']) && checkUserRole($_SESSION['id']) == 1):?>
                    <li class="nav-item active"><a class="nav-link" href="<?=ROOT_PATH?>admin_user">Administration utilisateurs</a></li>
                <?php endif?>
                <?php if (!empty($_SESSION['id']) && checkUserRole($_SESSION['id']) <= 2):?>
                    <li class="nav-item active"><a class="nav-link" href="<?=ROOT_PATH?>admin_article">Administration articles</a></li>
                <?php endif?>
                <?php if (!empty($_SESSION['id']) && checkUserRole($_SESSION['id']) <= 2):?>
                    <li class="nav-item active"><a class="nav-link" href="<?=ROOT_PATH?>admin_stats">Statistiques</a></li>
                <?php endif?>
                </ul>
                <?php if(empty($_SESSION['id'])):?>


                    <a href="<?=ROOT_PATH?>login" type="button" class="btn btn-primary">Se connecter</a>
                    
                    <a href="<?=ROOT_PATH?>signup" type="button" class="btn btn-outline-primary">Créer un compte</a>

                <?php else:?>

                    <a href="<?=ROOT_PATH?>panier" class="btn btn-warning">Mon panier <?= $_SESSION['articleBooked'] ?></a>
                    <a href="<?=ROOT_PATH?>user" class="btn btn-primary">Mon compte</a>
                    <a href="<?=ROOT_PATH?>logout" class="btn btn-outline-danger">Se déconnecter</a>
                <?php endif?>
            </div>
        </nav>
        <br>
        <main role="main" class="container">
<?php
if(!empty($_SESSION['message'])){
    include 'message.php';
    unset($_SESSION['message']);
}
if(!empty($_SESSION['error'])){
    include 'error.php';
    unset($_SESSION['error']);
}
?>
        <div class="jumbotron">
            <h1><?php echo $title; ?></h1>
            <?php echo $content; ?>
        </div>
        </main>
        <footer class="footer bg-dark text-white-50">
            <div class="container">
                <span class="text-muted">&copy; Jeu Vidéal</span>
            </div>
        </footer>
    </body>
</html>
