<?php $title = "modif commentaire"; ?>

<?php ob_start(); ?>

<form action="index.php?action=upComment&id=<?= $comment->id ?>" method="POST">
    <input type="hidden" name="postId" value="<?= $comment->postId ?>">
    <div>
        <label for="author">Auteur: </label>
        <input type="text" id="author" name="author" value="<?= $comment->author ?>">
    </div>
    <div>
        <label for="comment">Commentaire: </label><br>
        <textarea name="comment" id="comment" cols="30" rows="10"><?= $comment->comment ?></textarea>
    </div>
    <div>
        <input type="submit" value="Modifier">
    </div>
</form>
<?php
    if(isset($_GET['err'])){
        echo "<div class='error'>Veuillez remplir correctement le formulaire</div>";
    }
?>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>