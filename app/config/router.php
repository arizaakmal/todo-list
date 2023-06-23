<?php
require_once 'app/controllers/LoginController.php';

// Membuat objek router
$router = new Router();

//rute home



$router->post('/logout', 'LoginController@logout');





// Jalankan router
$router->run();
