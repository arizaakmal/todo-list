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


<div class="d-flex justify-content-center align-items-center" style="height: 100vh; ">
  <div class="col-lg-4 rounded p-4 opacity-75" style="background-color:#f7f3e9">
    <h2 class="text-center">LOGIN</h2>
    <div class="row">

      <div class="col-lg-12">
        <?php Flasher::flash(); ?>
      </div>
    </div>
    <form action="<?= BASEURL; ?>/login/process" method="POST">
      <div class="form-group mb-2">
        <label for="email">Email:</label>
        <input type="text" class="form-control" name="email" id="email" required>
      </div>

      <div class="form-group mb-2">
        <label for="password">Password:</label>
        <input type="password" class="form-control" name="password" id="password" required>
      </div>
      <div class="form-group">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="remember" name="remember">
          <label class="form-check-label" for="remember">Remember Me</label>
        </div>
      </div>
      <button type="submit" class="btn btn-primary col-sm-12 mt-2">Login</button>
    </form>
    <p class="text-center mt-2">Don't have an account? <a href="<?= BASEURL; ?>/register">Register here</a></p>
  </div>
</div>