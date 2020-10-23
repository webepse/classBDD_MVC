<?php $title = $post->title ; ?>

<?php ob_start(); ?>

<h1>Mon blog</h1>
<p><a href="index.php">Retour</a></p>

<div class="new">
    <h3>
        <?= $post->title; ?>
        <em>le <?= $post->date; ?></em>
    </h3>
    <p>
        <?= nl2br($post->content) ?>
    </p>
</div>

<h1>Commentaires:</h1>
<?php foreach($comments as $comment) : ?>
    <div class="comments">
        <p><strong><?= $comment->author ?></strong> le <?= $comment->date ?> <a href="index.php?action=viewComment&id=<?= $comment->id ?>">Modifier</a></p>
        <p><?= nl2br($comment->comment) ?></p>
    </div>
<?php endforeach; ?>

<form action="index.php?action=addComment&id=<?= $post->id ?>" method="POST">
    <div>
        <label for="author">Auteur: </label>
        <input type="text" id="author" name="author">
    </div>
    <div>
        <label for="comment">Commentaire: </label><br>
        <textarea name="comment" id="comment" cols="30" rows="10"></textarea>
    </div>
    <div>
        <input type="submit" value="Envoyer">
    </div>
</form>
<?php
    if(isset($_GET['err'])){
        echo "<div class='error'>Veuillez remplir correctement le formulaire</div>";
    }
?>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>