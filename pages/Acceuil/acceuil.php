<?php
session_start();
if(!isset($_SESSION['id'])){
  header('location:../authentification/login.php');
}
include("../../inc/entete.php");
?>
    <div class="page">
      <!-- Sidebar -->
      <?php
      include("../../inc/menu.php");
      include("../../inc/header.php");
      ?>
      <div class="page-wrapper">
        <!-- Page header -->
        <div class="page-header d-print-none">
          <div class="container-xl">
            <div class="row g-2 align-items-center">
              <div class="col">
                <!-- Page pre-title -->
                <div class="page-pretitle">
                  
                </div>
                <h2 class="page-title">
                Acceuil
                </h2>
              </div>
              <!-- Page title actions -->
              <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                  <a href="../notes/listNotes.php" class="btn btn-primary d-none d-sm-inline-block">
                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                    Ajouter notes
                  </a>
                  <a href="../notes/listNotes.php" class="btn btn-primary d-sm-none btn-icon">
                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
          <div class="container-xl">
            <div class="row row-deck row-cards" style="height: 75vh;">
              <div class="col-sm-12 col-lg-12">
                <div class="card">
                  <div class="card-body" id="calendar"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <footer class="footer footer-transparent d-print-none">
          <div class="container-xl">
            <div class="row text-center align-items-center flex-row-reverse">
              <div class="col-lg-auto ms-lg-auto">
                <ul class="list-inline list-inline-dots mb-0">
                  <li class="list-inline-item"><a href="#" target="_blank" class="link-secondary" rel="noopener">Created by wisig trainer</a></li>
                </ul>
              </div>
              <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                <ul class="list-inline list-inline-dots mb-0">
                  <li class="list-inline-item">
                    Copyright &copy; 2023
                    
                    All rights reserved.
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>
<!-- End -->

    <!-- Tabler Core -->
    <script src="../../dist/js/tabler.min.js?1684106062" defer></script>
    <script src="../../dist/js/demo.min.js?1684106062" defer></script>
    <!-- jQuery -->
    <script src="../../dist/libs/jquery/jquery.min.js"></script>
    <!-- fullCalendar 2.2.5 -->
    <!-- <script src="../../dist/libs/moment/moment.min.js"></script> -->
    <script src="../../dist/libs/fullCalender/index.global.js"></script>
    <script src="../../dist/libs/fullcalendar/locales/fr.js"></script>
    <script src="../../dist/libs/fullcalendar/locales-all.js"></script>
    <!-- Axios -->
<script src="../../dist/libs/axios/axios.js"></script>
    <!-- Sweet alert -->
    <script src="../../dist/libs/sweetalert2/sweetalert2.js"></script>
    <script async src="acceuil.js"></script>

  </body>
</html>