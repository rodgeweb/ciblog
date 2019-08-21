<h1><?= $title ?></h1>
<div class="row">
<?php foreach($posts->result() as $post) : ?>
    <div class="col-md-4">
        <div class="card">
            <img class="card-img-top" src="<?= base_url(); ?>assets/images/posts/<?= $post->post_image; ?>" alt="Card image cap">
            <div class="card-body">
                <h3 class="card-title"><?= $post->title; ?></h3>
                <p class="card-text"><?= word_limiter($post->body, 30); ?></p>
                <a href="<?= base_url(); ?>posts/view/<?= $post->slug; ?>" class="btn btn-primary">Rread More</a>
            </div>
            <div class="card-footer text-muted">
                Created: <?= $post->created_at; ?> in <strong><?= $post->name; ?></strong>
            </div>
        </div>
    </div>


<?php endforeach; ?>
</div>