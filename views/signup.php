<?php ob_start()?>
<form method="POST">
    <div class="form-group">
        <label for="idlogin">Login (pseudo)</label>
        <input type="text" class="form-control" id="idlogin" name="login">
    </div>

    <div class="form-group">
        <label for="idnom">Nom</label>
        <input type="text" class="form-control" id="idnom" name="nom">
    </div>

    <div class="form-group">
        <label for="idprenom">Prénom</label>
        <input type="text" class="form-control" id="idprenom" name="prenom">
    </div>
<!-- 
    <div class="form-group">
        <label for="idrue">Rue</label>
        <input type="text" class="form-control" id="idrue" name="rue">
    </div>

    <div class="form-group">
        <label for="idnumero">Rue</label>
        <input type="text" class="form-control" id="idnumero" name="numero">
    </div>

    <div class="form-group">
        <label for="idcp">CP</label>
        <input type="text" class="form-control" id="idcp" name="cp">
    </div> -->

    <div class="form-group">
        <label for="idmail">Mail</label>
        <input type="text" class="form-control" id="idmail" name="mail">
    </div>

    <div class="form-group">
        <label for="idpassword">Mot de passe</label>
        <input type="password" class="form-control" id="idpassword" name="password">
    </div>
    
    <div class="form-group">
        <label for="idconfirmpassword">Mot de passe</label>
        <input type="password" class="form-control" id="idconfirmpassword" name="confirmpassword">
    </div> 

    <button type="submit" class="btn btn-primary">Créer un compte</button>
</form>
<?php
$title = "Créer un compte";
$content = ob_get_clean();
include 'includes/template.php';
?>

<!-- ---------------------------------------------------------------------------------------------------------------------------- -->
