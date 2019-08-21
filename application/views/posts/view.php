<?php foreach($post->result() as $po) : ?>
<div class="jumbotron">
  <h2 class="display-4"><?= $po->title; ?></h2>
</div>
<div class="py-3">
<?= $po->body; ?>
</div>
<div class="text-muted">
    Created: <?= $po->created_at; ?>
</div>
<div class="py-1 mt-5">
  <a href="<?= site_url() ?>/posts/edit/<?= $po->slug; ?>" class="btn btn-warning">Edit</a>
</div>
<div class="py-1 mt-1">
  <?= form_open('posts/delete/'.$po->id); ?>
    <input type="submit" value="Delete" class="btn btn-danger" />
  </form>
</div>
<?php endforeach; ?>