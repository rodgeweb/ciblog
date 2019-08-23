<div class="jumbotron">
  <h2 class="display-4"><?= $post->title; ?></h2>
</div>
<div class="py-3">
<?= $post->body; ?>
</div>
<div class="text-muted">
    Created: <?= $post->created_at; ?>
</div>
<?php if($this->session->userdata('user_id') == $post->user_id) : ?>
<div class="py-1 mt-5">
  <a href="<?= site_url() ?>/posts/edit/<?= $post->slug; ?>" class="btn btn-warning">Edit</a>
</div>
<div class="py-1 mt-1">
  <?= form_open('posts/delete/'.$post->id); ?>
    <input type="submit" value="Delete" class="btn btn-danger" />
  </form>
</div>
<?php endif; ?>
<hr/>
<?php foreach($comments->result() as $comment) : ?>
  <div class="my-3 py-1">
    <strong><?= $comment->name ?></strong>
    <p class="my-2">- <?= $comment->body ?></p>
<hr/>
  </div>
<?php endforeach; ?>
<h3>Add Comment</h3>
<?= validation_errors(); ?>
<?= form_open('comments/create/'.$post->id); ?>
  <div class="form-group">
    <label>Name</label>
    <input type="text" name="name" class="form-control" />
  </div>
  <div class="form-group">
    <label>Email</label>
    <input type="email" name="email" class="form-control" />
  </div>
  <div class="form-group">
    <label>Body</label>
    <textarea type="text" name="body" class="form-control" ></textarea>
  </div>
  <div class="form-group">
    <input type="hidden" name="slug" value="<?= $post->slug ?>" />
    <input type="submit" name="comment" class="btn btn-primary" />
  </div>
</form>