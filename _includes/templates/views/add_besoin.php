<?php
ob_start();
?>
<div class="row">
    <div class="col-md-8 offset-md-2">
        <h2 style="margin-top: 32px; margin-bottom: 32px">Faire une demande de besoin</h2>
        <form action="" method="post">
            <div class="form-group">
                <label>Titre du besoin :</label>
                <input type="text" class="form-control" placeholder="Titre" name="title" required>
            </div>
            <div class="form-group">
                <label >Description du besoin :</label>
                <textarea class="form-control" rows="10" name="content" required></textarea>
            </div>
            <div class="row">
                <div class="col-12">
                    <label>Langue :</label>
                </div>
                <?php foreach ($languages as &$language){
                    ?>
                    <div class="col-md-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="<?= $language['ID'] ?>" name="langues[]" >
                            <label class="form-check-label">
                                <?= $language['NAME'] ?>
                            </label>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
            <div class="row" style="margin-top: 32px">
                <div class="col-12">
                    <label>Compétences requises :</label>
                </div>
                <?php foreach ($categories as &$categorie){
                    ?>
                    <div class="col-md-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="<?= $categorie['ID'] ?>" name="categories[]">
                            <label class="form-check-label">
                                <?= $categorie['NAME'] ?>
                            </label>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
            <div class="row" style="margin-top: 32px; margin-bottom: 32px">
                <div class="col-md-8 offset-md-2">
                    <button type="submit" class="btn btn-block btn-primary">Ajouter !</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/_includes/templates/views/discussion.php");

$content = ob_get_clean();
?>
