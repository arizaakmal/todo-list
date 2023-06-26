<head>
    <style>
        body {
            background-image: url('../gambar/gambar.jpg');
            background-size: auto;
            background-attachment: fixed;
            background-size: cover;
        }
    </style>
</head>

<div class="d-flex justify-content-center align-items-center" style="height: 100vh; ">
  <div class="col-lg-3 rounded p-4 bg-secondary">
    <h2 class="text-center">LOGIN</h2>
    <div class="row">
      <div class="col-lg-12">
        <?php Flasher::flash(); ?>
      </div>
    </div>
    <form action="<?= BASEURL; ?>/login/process" method="POST">
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="text" class="form-control" name="email" id="email" required>
      </div>

      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control" name="password" id="password" required>
      </div>
      <button type="submit" class="btn btn-primary col-sm-12 mt-4">Login</button>
    </form>
    <p class="text-center mt-2">Don't have an account? <a href="<?= BASEURL; ?>/register">Register here</a></p>
  </div>
</div>
