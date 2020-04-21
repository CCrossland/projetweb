<?php ob_start()?>


<form method="POST" id="signup">
    <div class="form-group">
        <label for="idlogin">Login (pseudo)</label>
        <input type="text" maxlength="25" pattern="[^()/><\][\\\x22,;|+ ]+" placeholder="Pas de caractères spéciaux ni d'espace autorisé" class="form-control" id="idlogin" name="login">
    </div>

    <div class="form-group">
        <label for="idnom">Nom</label>
        <input type="text" class="form-control" id="idnom" name="nom">
    </div>

    <div class="form-group">
        <label for="idprenom">Prénom</label>
        <input type="text" class="form-control" id="idprenom" name="prenom">
    </div>
    
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