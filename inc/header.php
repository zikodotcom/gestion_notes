<?php
include("../../inc/Connexion.inc.php");

// session_start();
$id = $_SESSION['id'];
$res = $connexion->query("SELECT * FROM `users` WHERE `CIN` = '$id'");
$res = $res->fetch_assoc();
echo '<header class="navbar navbar-expand-lg none-md d-print-none header">
<div class="container-xl">
  <button class="navbar-toggler">
    
  </button>
  <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
    
  </h1>
  <div class="navbar-nav flex-row order-md-last">
    <div class="d-none d-md-flex">
      <a href="?theme=dark" class="nav-link px-0 hide-theme-dark" data-bs-toggle="tooltip" data-bs-placement="bottom" aria-label="Enable dark mode" data-bs-original-title="Enable dark mode">
        <!-- Download SVG icon from http://tabler-icons.io/i/moon -->
        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z"></path></svg>
      </a>
      <a href="?theme=light" class="nav-link px-0 hide-theme-light" data-bs-toggle="tooltip" data-bs-placement="bottom" aria-label="Enable light mode" data-bs-original-title="Enable light mode">
        <!-- Download SVG icon from http://tabler-icons.io/i/sun -->
        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path><path d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7"></path></svg>
      </a>
    </div>
    <div class="nav-item dropdown">
      <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
        <span class="avatar avatar-sm" style="background-image: url(../../static/avatars/000m.jpg)"></span>
        <div class="d-none d-xl-block ps-2">
          <div>'. $res['nom'] . ' ' . $res['prenom'] .'</div>
        </div>
      </a>
      <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
        <a href="./settings.html" class="dropdown-item">Settings</a>
        <a href="../../inc/logout.php" class="dropdown-item">Logout</a>
      </div>
    </div>
  </div>
</div>
</header>'

?>