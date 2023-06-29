<head>
    <style>
        body {
            background-image: url('<?= BASEURL; ?>/img/bg-1.jpg');
            /* background-image: url('../gambar/gambar.jpg'); */
            background-size: auto;
            background-attachment: fixed;
            background-size: cover;
        }
    </style>
</head>

<div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="col-lg-4 rounded p-4 opacity-75" style="background-color:#f7f3e9">
        <h2 class="text-center">REGISTER</h2>
        <div class="row">
            <div class="col-lg-12">
                <?php Flasher::flash(); ?>
            </div>
        </div>
        <form action="<?= BASEURL; ?>/register/process" method="POST">
            <div class="form-group mb-2">
                <label for="username">Username:</label>
                <input type="text" class="form-control" name="username" id="username" required>
            </div>

            <div class="form-group mb-2">
                <label for="email">Email:</label>
                <input type="text" class="form-control" name="email" id="email" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" name="password" id="password" required>
            </div>

            <button type="submit" class="btn btn-primary col-sm-12 mt-3">Register</button>
        </form>

        <!-- Alreadny have an account? -->
        <p class="text-center mt-3">Already have an account? <a href="<?= BASEURL; ?>/login">Login here</a></p>
    </div>
</div>