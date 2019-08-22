<h2><?= $title; ?></h2>

<ul class="list-group">
<?php foreach($categories->result() as $category) : ?>
    <li class="list-group-item">
        <a href="<?= site_url('categories/posts/').$category->id; ?>" class="list-group-item-action">
            <?= $category->name; ?>
        </a>
    </li>

<?php endforeach; ?>
</ul>