<h2>Register</h2>
<div class="row">
    <div class="col-lg-6">
        <?php Flasher::flash(); ?>
    </div>
</div>
<form action="<?= BASEURL; ?>/register/process" method="POST">
    <label for="username">Username:</label>
    <input type="text" name="username" id="username" required><br><br>
    <label for="email">Email:</label>
    <input type="text" name="email" id="email" required><br><br>

    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required><br><br>

    <input type="submit" value="Register">
</form>
<!-- already have an account  -->
<p>Already have an account? <a href="<?= BASEURL; ?>/login">Login here</a></p>