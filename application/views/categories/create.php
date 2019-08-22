<h2><?= $title; ?></h2>

<?= validation_errors(); ?>

<?= form_open_multipart('categories/create'); ?>
    <div class="form-group">
        <label>Name</label>
        <input type="text" class="form-control" name="name" placeholder="Enter Name" />
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>