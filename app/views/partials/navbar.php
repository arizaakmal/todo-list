<nav class="navbar navbar-expand-lg navbar-dark " style="background-color: #69572A;">
    <div class="container">
        <a class="navbar-brand" href="<?= BASEURL; ?>/"><i class="fa-solid fa-check" style="color: #ffffff;"></i> Todo List</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Tasks</a>
                </li>
            </ul>
        </div>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        </div>

        <ul class="navbar-nav ">
            <?php if (isset($_SESSION['user_id'])) { ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?= $data['user']['username'] ?>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><a class="dropdown-item" href="<?= BASEURL; ?>/login/logout">Logout</a></li>

                    </ul>
                </li>
                <!-- <a class="nav-item nav-link" href="<?= BASEURL; ?>/login/logout">
                    <i class="fas fa-sign-out-alt"></i>
                    Logout
                </a> -->
            <?php } else { ?>
                <a class="nav-item nav-link" href="<?= BASEURL; ?>/login">
                    <i class="fas fa-sign-in-alt"></i> Login
                </a>
            <?php } ?>
        </ul>
    </div>
</nav>