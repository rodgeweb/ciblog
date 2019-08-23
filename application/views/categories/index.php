<h2><?= $title; ?></h2>

<ul class="list-group">
<?php foreach($categories->result() as $category) : ?>
    <li class="list-group-item">
        <a href="<?= site_url('categories/posts/').$category->id; ?>" class="list-group-item-action">
            <?= $category->name; ?>
        </a>
        <?php if($this->session->userdata('user_id') == $category->user_id) : ?>
            <form action="categories/delete/<?= $category->id; ?>" method="POST">
                <input type="submit" class="btn btn-link btn-danger" value="[ X ]" />
            </form>
        <?php endif; ?>
    </li>

<?php endforeach; ?>
</ul>