<?php
ob_start()
?>
<form method="POST">
    <div class="form-group">
        <label for="idid">Identifiant</label>
        <input type="text" maxlength="12" pattern="[^()/><\][\\\x22,;|+ ]+" class="form-control" id="idid" name="id" value="<?= $user['ID']?>" readonly>
    </div>
    <div class="form-group">
        <label for="idlogin">Login</label>
        <input type="text" class="form-control" id="idlogin" name="login" value="<?= $user['login']?>">
    </div>
    <div class="form-group">
        <label for="idmail">Email</label>
        <input type="email" class="form-control" id="idmail" name="mail" value="<?= $user['mail']?>">
    </div>
    <div class="form-group">
        <label for="idmdp">Password</label>
        <input type="password" class="form-control" id="idpassword" name="password" value="<?= $user['password']?>">
    </div>
    <div class="form-group">
        <label for="idconfirmpassword">Confirm password</label>
        <input type="password" class="form-control" id="idconfirmpassword" name="confirmpassword">
    </div>
    <div class="form-group">
        <label for="idrue">Rue</label>
        <input type="text" class="form-control" id="idrue" name="rue" value="<?= $user['rue']?>">
    </div>
    <div class="form-group">
        <label for="idnumero">Numéro</label>
        <input type="text" class="form-control" id="idnumero" name="numero" value="<?= $user['numero']?>">
    </div>
    <div class="form-group">
        <label for="idcp">Code Postal</label>
        <input type="text" class="form-control" id="idcp" name="cp" value="<?= $user['cp']?>">
    </div>
    <div class="form-group">
        <label for="idlocalite">Localité</label>
        <input type="text" class="form-control" id="idlocalite" name="localite" value="<?= $user['localite']?>">
    </div>
    <button type="submit" class="btn btn-primary">Envoyer</button>
</form>
<?php
$title = "Editer";
$content = ob_get_clean();
include 'includes/template.php';
?>