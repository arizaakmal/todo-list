<h2>Login</h2>
<div class="row">
    <div class="col-lg-6">
        <?php Flasher::flash(); ?>
    </div>
</div>
<form action="<?= BASEURL; ?>/login/process" method="POST">
    <label for="email">Email:</label>
    <input type="text" name="email" id="email" required><br><br>

    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required><br><br>

    <input type="submit" value="Login">
</form>
<!-- not have account  -->
<p>Don't have an account? <a href="<?= BASEURL; ?>/register">Register here</a></p>