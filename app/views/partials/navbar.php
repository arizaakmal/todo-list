<nav class="navbar navbar-expand-lg navbar-dark ">
    <div class="container">
        <a class="navbar-brand text-dark fw-semibold" href="<?= BASEURL; ?>/"><i class="fa-regular fa-circle-check" style="color: #000;"></i> Todo List</a>

        <ul class="navbar-nav ">
            <?php if (isset($_SESSION['user_id'])) { ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16" style="color: white;">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                        </svg>
                    </a>
                    <ul class="dropdown-menu position-absolute ">
                        <li><a class="dropdown-item" href="<?= BASEURL; ?>/login/logout"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                    </ul>
                </li>
            <?php } ?>
        </ul>


    </div>
</nav>