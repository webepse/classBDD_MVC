<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>

<h1>Mon Blog</h1>
<p>Derniers articles du blog: </p>


<?php foreach($posts as $post) : ?>
    <div class="news">
        <h3>
            <a href="<?= $post->getURL() ?>"><?= $post->title ?></a>
            <em>Le <?= $post->date ?></em>
        </h3>
        <p>
            <?= $post->getExtrait(); ?>
        </p>
    </div>
<?php endforeach ?>

<?php $content = ob_get_clean(); ?>

<?php require("template.php"); ?>