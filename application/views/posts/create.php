<h2><?= $title; ?></h2>

<?php if(validation_errors() != FALSE) : ?>
<div class="alert alert-danger" role="alert"><?= validation_errors(); ?></div>
<?php endif; ?>

<?= form_open_multipart('posts/create'); ?>
    <div class="form-group">
        <input class="form-control" type="input" name="title" placeholder="Title"/><br />
    </div>
    <div class="form-group">
        <textarea id="editor1" class="form-control" name="body" placeholder="Blog Content"></textarea><br />
    </div>
    <div class="form-group">
        <select name="category_id" class="form-control">
            <?php foreach($categories->result() as $category) : ?>
            <option value="<?= $category->id ?>"><?= $category->name ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="form-group">
        <input class="btn" type="file" name="userfile" size="20" />
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="submit" value="Create Blog Item" />
    </div>

</form>