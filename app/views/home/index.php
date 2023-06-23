<div class="container">
  <div class="jumbotron mt-4">
    <?php if ($data['user'] !== null) : ?>
      <h1 class="display-4">Selamat Datang <?= $data['user']['username'] ?>!</h1>
    <?php else : ?>
      <h1 class="display-4">Selamat Datang!</h1>
    <?php endif; ?>
    <hr class="my-4">
    <div class="col-md-6">
      <button type="submit" class="btn btn-primary">
        <i class="fas fa-plus"></i> Add New Task
      </button>
      <table class="table table-sm table-borderless table-striped text-center mx-auto mt-3">
        <thead class="bg-dark text-white">
          <tr>
            <th scope="col">Nomor</th>
            <th scope="col">Tugas</th>
            <th scope="col">Tanggal Add</th>
            <th scope="col">Waktu Add</th>
            <th scope="col">Option</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>meeting</td>
            <td>2022/10/12</td>
            <td>18:35</td>
            <td>
              <div class="btn-group">
                <a class="btn btn-warning btn-sm" href="#">update</a>
                <a class="btn btn-danger btn-sm" href="#">delete</a>
              </div>
            </td>
          </tr>
        </tbody>
      </table>

    </div>
  </div>
</div>