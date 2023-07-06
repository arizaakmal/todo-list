<head>
  <style>
    body {
      /* background-color: #513cc8; */
      background-image: url('<?= BASEURL; ?>/img/artboard1.png');
      background-size: auto;
      background-attachment: fixed;
      background-size: cover;
    }
  </style>
</head>
<div class="d-flex justify-content-center align-items-center" style="height: 100vh; ">
  <div class="col-lg-4 rounded p-4 " style="background-color: rgb(245,245,245, 0.90 );">
    <h2 class=" text-center">LOGIN</h2>
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
      <button type="submit" class="btn btn-primary col-12 mt-2">Login</button>
    </form>
    <p class="text-center mt-2">Don't have an account? <a class="text-info" href="<?= BASEURL; ?>/register">Register here</a></p>
  </div>
</div>