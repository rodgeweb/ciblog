<?= validation_errors(); ?>
<?= form_open('users/login'); ?>
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h1 class="text-center"><?= $title; ?></h1>
            <div class="form-group">
                <input type="text" name="username" class="form-control" placeholder="Username" autofocus />
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Password" />
            </div>
            <div class="form-group">
                <input type="submit" name="login" class="btn btn-primary btn-block" value="Login" />
            </div>
        </div>
    </div>
<?= form_close(); ?>