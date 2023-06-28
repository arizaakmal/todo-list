<nav class="navbar navbar-expand-lg navbar-dark " style="background-color: #69572A;">
    <div class="container">
        <a class="navbar-brand" href="<?= BASEURL; ?>/"><i class="fa-solid fa-check" style="color: #ffffff;"></i> Todo List</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        </div>

        <div class="navbar-nav ">
            <?php if (isset($_SESSION['user_id'])) { ?>
                <a class="nav-item nav-link" href="<?= BASEURL; ?>/login/logout">
                    <i class="fas fa-sign-out-alt"></i>
                    Logout
                </a>
            <?php } else { ?>
                <a class="nav-item nav-link" href="<?= BASEURL; ?>/login">
                    <i class="fas fa-sign-in-alt"></i> Login
                </a>
            <?php } ?>
        </div>
    </div>
</nav>