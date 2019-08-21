<h2><?= $title; ?></h2>

<?php if(validation_errors() != FALSE) : ?>
<div class="alert alert-danger" role="alert"><?= validation_errors(); ?></div>
<?php endif; ?>
<?= form_open_multipart('posts/update'); ?>
<input type="hidden" name="id" value="<?= $post->id ?>" />
    <div class="form-group">
        <label>Title</label>
        <input class="form-control" type="input" name="title" value="<?= $post->title ?>" /><br />
    </div>
    <div class="form-group">
        <label>Body</label>
        <textarea id="editor1" class="form-control" name="body"><?php echo $post->body; ?></textarea>
    </div>
    <div class="form-group">
        <label>Category</label>
        <select name="category_id" class="form-control">
            
            <?php foreach($categories->result() as $category) : ?>
            <option value="<?= $category->id ?>"><?= $category->name ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="submit" value="Edit Blog Item" />
    </div>

</form>