<h2><?= $title ?></h2>

<?= validation_errors(); ?>

<?= form_open_multipart('users/register'); ?>
    <div class="form-group">
        <label>Name</label>
        <input class="form-control" type="text" name="name" placeholder="Name" />
    </div>
    <div class="form-group">
        <label>UserName</label>
        <input class="form-control" type="text" name="username" placeholder="UserName" />
    </div>
    <div class="form-group">
        <label>Zip Code</label>
        <input class="form-control" type="text" name="zipcode" placeholder="Zip Code" />
    </div>
    <div class="form-group">
        <label>Email</label>
        <input class="form-control" type="email" name="email" placeholder="Email" />
    </div>
    <div class="form-group">
        <label>Password</label>
        <input class="form-control" type="password" name="password" placeholder="Password" />
    </div>
    <div class="form-group">
        <label>Confirm Password</label>
        <input class="form-control" type="password" name="password2" placeholder="Confirm Passwrod" />
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="submit" value="Register" />
    </div>

<?= form_close(); ?>