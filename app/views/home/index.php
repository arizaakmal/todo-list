<head>
  <style>
    body {
      background-image: url('<?= BASEURL; ?>/img/bg-2.jpg');
      /* background-image: url('../gambar/gambar.jpg'); */
      background-size: auto;
      background-attachment: fixed;
      background-size: cover;
    }
  </style>
</head>


<div class="row">
  <div class="col-lg-6">
    <?php Flasher::flash(); ?>
  </div>
</div>
<div class="container">
  <div class="jumbotron mt-4">
    <?php if ($data['user'] !== null) : ?>
      <h1 class="display-4">Welcome <?= $data['user']['username'] ?>!</h1>
    <?php else : ?>
      <h1 class="display-4">Welcome!</h1>
    <?php endif; ?>
    <hr class="my-4">
    <div class="col-md-6">
      <form action="<?= BASEURL ?>" method="POST">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap"><i class="fas fa-plus"></i> Add New Task</button>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Todo</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form>
                  <div class="mb-3">
                    <label for="nama_tugas" class="col-form-label">Task:</label>
                    <input type="text" class="form-control" id="nama_tugas">
                  </div>
                  <div class="mb-3">
                    <label for="deskripsi_tugas" class="col-form-label">Description:</label>
                    <textarea class="form-control" id="deskripsi_tugas"></textarea>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Send message</button>
              </div>
            </div>
          </div>
        </div>
      </form>

      <table class="table table-sm table-borderless table-striped text-center mx-auto mt-3">
        <thead class="bg-dark text-white">
          <tr>
            <th scope="col">Number</th>
            <th scope="col">Task</th>
            <th scope="col">Description</th>
            <th scope="col">Date Added</th>
            <th scope="col">Time Added</th>
            <th scope="col">Options</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($data['tasks'] as $index => $task) : ?>
            <?php
            $tanggal = date('Y/m/d', strtotime($task['tanggal_dibuat']));
            $waktu = date('H:i', strtotime($task['tanggal_dibuat']));
            ?>
            <tr>
              <th scope="row"><?= $index + 1 ?></th>
              <td><?= $task['nama_tugas'] ?></td>
              <td><?= $task['deskripsi_tugas'] ?></td>
              <td><?= $tanggal ?></td>
              <td><?= $waktu ?></td>
              <td>
                <div class="btn-group">
                  <a class="btn btn-warning btn-sm" href="">update</a>
                  <a class="btn btn-danger btn-sm" href="<?= BASEURL ?>/home/hapus/<?= $task['id'] ?>">delete</a>
                </div>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>