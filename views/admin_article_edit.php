<?php
ob_start()
?>

<form enctype="multipart/form-data" method="POST">
    <div class="form-group">
        <label for="idid">Identifiant</label>
        <input type="text" class="form-control" id="idid" name="ID" value="<?= $article['ID']?>" readonly>
    </div>
    <div class="form-group">
        <label for="idnom">Nom</label>
        <input type="text" class="form-control" id="idnom" name="nom" value="<?= $article['nom']?>">
    </div>
    <div class="form-group">
        <label for="idprix">Prix</label>
        <input type="number" min="0.00" max="10000.00" step="0.01" class="form-control" id="idprix" name="prix" value="<?= $article['prix']?>">
    </div>
    
    
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Console</label>
        </div>
        <select class="custom-select" id="inputGroupSelect01" name="consoleID">
            <?php foreach($consoles as $console):?>
            <option value=<?=$console['ID']?> <?php if($console['ID'] == $article['consoleID']){echo 'selected';} ?>> <?=$console['nom']?> </option>
            <?php endforeach?>
        </select>
    </div>

    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Genre</label>
        </div>
        <select class="custom-select" id="inputGroupSelect01" name="genreID">
            <?php foreach($genres as $genre):?>
            <option value=<?=$genre['ID']?> <?php if($genre['ID'] == $article['genreID']){echo 'selected';} ?>><?=$genre['nom']?></option>
            <?php endforeach?>
        </select>
    </div>

    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Limite d'âge</label>
        </div>
        <select class="custom-select" id="inputGroupSelect01" name="limite_ageID">
            <?php foreach($limite_ages as $limite_age):?>
            <option value=<?=$limite_age['ID']?> <?php if($limite_age['ID'] == $article['limite_ageID']){echo 'selected';} ?>><?=$limite_age['nom']?></option>
            <?php endforeach?>
        </select>
    </div>

    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Multijoueur</label>
        </div>
        <select class="custom-select" id="inputGroupSelect01" name="multijoueurID">
            <?php foreach($multijoueurs as $multijoueur):?>
            <option value=<?=$multijoueur['ID']?> <?php if($multijoueur['ID'] == $article['multijoueurID']){echo 'selected';} ?>><?=$multijoueur['nom']?></option>
            <?php endforeach?>
        </select>
    </div>

    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text">Image</span>
        </div>
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="inputGroupFile01" name="image">
            <label class="custom-file-label" for="inputGroupFile01"><?=$article['image']?></label>
        </div>
    </div>

    <div class="form-group">
        <label for="videolink">Trailer Youtube (Lien url Youtube)</label>
        <input type="text" class="form-control" id="videolink" name="video" value="<?= $article['video']?>">
    </div>

    <div class="form-group">
        <label for="iddescription">Description</label>
        <input type="text" class="form-control" id="iddescription" name="description" value="<?= $article['description']?>">
    </div>
    <button type="submit" value="submit" class="btn btn-primary">Editer</button>
</form>
<?php
$title = "Editer";
$content = ob_get_clean();
include 'includes/template.php';
?>
