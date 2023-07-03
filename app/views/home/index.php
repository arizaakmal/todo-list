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

<div class="container">
  <div class="jumbotron mt-4">
    <h1 class="display-4">Welcome <?= $data['user']['username'] ?>!</h1>
    <hr class="my-4">
    <div class="row align-items-md-stretch">
      <div class="col-md-4">
        <div class="h-100 p-4 bg-success text-white rounded-3 d-flex flex-column justify-content-center align-items-center">
          <h3 class="mb-2 text-center">Total Tasks</h3>
          <h1 class="display-2 text-center">50</h1>
          <!-- <a href="#" class="btn btn-light btn-sm">View Tasks</a> -->
        </div>
      </div>
      <div class="col-md-4">
        <div class="h-100 p-4 bg-warning text-white rounded-3 d-flex flex-column justify-content-center align-items-center">
          <h3 class="mb-2 text-center">Total Completed</h3>
          <h1 class="display-2 text-center">24</h1>
          <!-- <a href="#" class="btn btn-light btn-sm">View Tasks</a> -->
        </div>
        <!-- <div class="col-md-4">
          <div class="h-100 p-4 bg-warning text-white rounded-3 d-flex flex-column justify-content-center align-items-center">
            <h3 class="mb-2 text-center">undown</h3>
            <h1 class="display-2 text-center">24</h1>
            <!-- <a href="#" class="btn btn-light btn-sm">View Tasks</a> -->
        <!-- </div> --> -->

      </div>
    </div>

    <form action="<?= BASEURL ?>/home/tambah/" method="POST">
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap"><i class="fas fa-plus"></i> Add New Task</button>
    </form>
    <div class="mt-2">
      <?php Flasher::flash(); ?>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Create Task</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="<?= BASEURL ?>/home/tambah/" method="POST">
              <div class="mb-3">
                <label for="nama_tugas" class="col-form-label">Task Name:</label>
                <input type="text" class="form-control" id="nama_tugas" name="nama_tugas" required>
              </div>
              <div class="mb-3">
                <label for="deadline" class="form-label">Deadline:</label>
                <input type="datetime-local" class="form-control" id="deadline" name="deadline">
              </div>
              <div class="mb-3">
                <label for="status" class="form-label">Status:</label>
                <select class="form-control" id="status" name="status">
                  <option value="Undone">Undone</option>
                  <option value="Done">Done</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="deskripsi_tugas" class="col-form-label">Description:</label>
                <textarea class="form-control" id="deskripsi_tugas" name="deskripsi_tugas"></textarea>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Create Task</button>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
    <table class="table table-primary table-borderless text-center mx-auto mt-3">
      <thead class="bg-dark text-white">
        <tr>
          <th scope="col">Number</th>
          <th scope="col">Task</th>
          <th scope="col">Deadline</th>
          <th scope="col">Date Added</th>
          <th scope="col">Status</th>
          <th scope="col">Description</th>
          <th scope="col">Options</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($data['tasks'] as $index => $task) : ?>
          <tr>
            <th scope="row"><?= $index + 1 ?></th>
            <td><?php if (strlen($task['nama_tugas']) > 20) : ?>
                <?= substr($task['nama_tugas'], 0, 20) ?>...
              <?php else : ?>
                <?= $task['nama_tugas'] ?>
              <?php endif; ?></td>
            <td><?= $task['deadline'] ?></td>
            <td><?= $task['tanggal_dibuat'] ?></td>
            <td>
              <?php if ($task['status'] === 'Done') : ?>
                <i class="fas fa-check text-success"></i> <!-- Tanda centang -->
              <?php else : ?>
                <i class="fas fa-times text-danger"></i> <!-- Tanda silang -->
              <?php endif; ?>
            </td>

            <td> <?php if (strlen($task['deskripsi_tugas']) > 40) : ?>
                <?= substr($task['deskripsi_tugas'], 0, 40) ?>...
              <?php else : ?>
                <?= $task['deskripsi_tugas'] ?>
              <?php endif; ?></td>
            <td>
              <div class="btn-group">
                <button class="btn btn-warning btn-sm" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight<?= $task['id'] ?>" aria-controls="offcanvasRight<?= $task['id'] ?>">
                  <i class="fas fa-edit"></i>
                </button>
                <a class="btn btn-danger btn-sm" href="<?= BASEURL ?>/home/hapus/<?= $task['id'] ?>">
                  <i class="fas fa-trash"></i>
                </a>
              </div>
            </td>
          </tr>
          <!-- Offcanvas for Update Task -->
          <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight<?= $task['id'] ?>" aria-labelledby="offcanvasRightLabel<?= $task['id'] ?>">
            <div class="offcanvas-header">
              <h5 class="offcanvas-title" id="offcanvasRightLabel<?= $task['id'] ?>">Update Task</h5>
              <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
              <form action="<?= BASEURL ?>/home/update/" method="POST">
                <div class="mb-3">
                  <label for="nama_tugas<?= $task['id'] ?>" class="col-form-label">Task Name:</label>
                  <input type="text" class="form-control" id="nama_tugas<?= $task['id'] ?>" name="nama_tugas" value="<?= $task['nama_tugas'] ?>" required>
                </div>
                <div class="mb-3">
                  <label for="deadline<?= $task['id'] ?>" class="col-form-label">Deadline:</label>
                  <input type="datetime-local" class="form-control" id="deadline<?= $task['id'] ?>" name="deadline" value="<?= $task['deadline'] ?>">
                </div>
                <div class="mb-3">
                  <label for="status<?= $task['id'] ?>" class="col-form-label">Status:</label>
                  <select class="form-control" id="status<?= $task['id'] ?>" name="status">
                    <option value="Undone" <?php if ($task['status'] === 'Undone') echo 'selected' ?>>Undone</option>
                    <option value="Done" <?php if ($task['status'] === 'Done') echo 'selected' ?>>Done</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="deskripsi_tugas<?= $task['id'] ?>" class="col-form-label">Description:</label>
                  <textarea class="form-control" id="deskripsi_tugas<?= $task['id'] ?>" name="deskripsi_tugas"><?= $task['deskripsi_tugas'] ?></textarea>
                </div>
                <input type="hidden" name="id" value="<?= $task['id'] ?>">
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Update Task</button>
                </div>
              </form>
            </div>
          </div>
        <?php endforeach; ?>
      </tbody>
    </table>




  </div>



  <!-- <div class="card card-body opacity-75">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
      <label class="form-check-label" for="flexCheckDefault">
        <del>Meeting</del>
      </label>
    </div>
  </div> -->
  <!-- <p>
    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
      Completed <span class="badge text-bg-secondary">4</span>
    </button>
  </p>
  <div class="collapse" id="collapseExample">
    <div class="card card-body">
      Some placeholder content for the collapse component. This panel is hidden by default but revealed when the user activates the relevant trigger.
    </div>
  </div> -->
  <footer class="pt-3 mt-4 text-body-secondary border-top text-center mb-3">
    Copyright 2023 &copy; Kelompok 4
  </footer>

</div>