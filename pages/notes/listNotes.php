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
                Gerer vos notes
                </h2>
              </div>
              <!-- Page title actions -->
              <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                  <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-simple">
                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                    Ajouter notes
                  </a>
                  <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal" data-bs-target="#modal-simple" aria-label="Create new report">
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
            <div class="row row-deck row-cards">
              <div class="col-sm-12 col-lg-12">
                <div class="card">
                  <div class="card-body">
                  <div id="table-default" class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Titre</th>
                        <th>Date debut</th>
                        <th>Date fin</th>
                        <th>Statut</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                  </table>
                </div>
                  </div>
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
    <!-- Ajouter modal -->
    <div class="modal modal-blur fade" id="modal-simple" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Ajouter une tache</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
          <form id="ajout" autocomplete="off" novalidate>
              <div class="mb-3">
                <label class="form-label">Titre</label>
                <input type="text" name="titre" id="titre" class="form-control" placeholder="Votre titre" autocomplete="off">
              </div>
              <div class="mb-3">
                <label class="form-label">Description</label>
                <input type="text" name="desc" id="desc" class="form-control" placeholder="Votre Description" autocomplete="off">
              </div>
              <div class="mb-3">
                <label class="form-label">Date et heure de debut</label>
                <input type="datetime-local" name="debutT" id="debutT" class="form-control" placeholder="La date et l'heure de debut de votre tache" autocomplete="off">
              </div>
              <div class="mb-3">
                <label class="form-label">Date et heure de fin</label>
                <input type="datetime-local" name="finT" id="finT" class="form-control" placeholder="La date et l'heure de fin de votre tache" autocomplete="off">
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
            </form>
          </div>
        </div>
      </div>
    </div><!--end modal-->
        <!-- updater modal -->
        <div class="modal modal-blur fade" id="modal-update" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Modifier votre tache</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
          <form id="update" autocomplete="off" novalidate>
              <div class="mb-3">
                <label class="form-label">Titre</label>
                <input type="text" name="titre1" id="titre1" class="form-control" placeholder="Votre titre" autocomplete="off">
              </div>
              <div class="mb-3">
                <label class="form-label">Description</label>
                <input type="text" name="desc1" id="desc1" class="form-control" placeholder="Votre Description" autocomplete="off">
              </div>
              <div class="mb-3">
                <label class="form-label">Date et heure de debut</label>
                <input type="datetime-local" name="debutT1" id="debutT1" class="form-control" placeholder="La date et l'heure de debut de votre tache" autocomplete="off">
              </div>
              <div class="mb-3">
                <label class="form-label">Date et heure de fin</label>
                <input type="datetime-local" name="finT1" id="finT1" class="form-control" placeholder="La date et l'heure de fin de votre tache" autocomplete="off">
              </div>
          </div>
          <input type="hidden" id="id_note" value="0">
          <div class="modal-footer">
            <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
            </form>
          </div>
        </div>
      </div>
    </div><!--end modal-->
<!-- End -->
    <!-- Libs JS -->
    <script src="../../dist/libs/apexcharts/dist/apexcharts.min.js?1684106062" defer></script>
    <script src="../../dist/libs/jsvectormap/dist/js/jsvectormap.min.js?1684106062" defer></script>
    <script src="../../dist/libs/jsvectormap/dist/maps/world.js?1684106062" defer></script>
    <script src="../../dist/libs/jsvectormap/dist/maps/world-merc.js?1684106062" defer></script>
    <!-- Tabler Core -->
    <script src="../../dist/js/tabler.min.js?1684106062" defer></script>
    <script src="../../dist/js/demo.min.js?1684106062" defer></script>
    <!-- jQuery -->
    <script src="../../dist/libs/jquery/jquery.min.js"></script>
    <!-- jquery validation -->
<script src="../../dist/libs/jquery-validation/jquery.validate.min.js"></script>
<script src="../../dist/libs/jquery-validation/additional-methods.min.js"></script>
<!-- Axios -->
<script src="../../dist/libs/axios/axios.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="../../dist/libs/datatables/jquery.dataTables.min.js"></script>
    <script src="../../dist/libs/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../../dist/libs/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../../dist/libs/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="../../dist/libs/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../../dist/libs/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="../../dist/libs/jszip/jszip.min.js"></script>
    <script src="../../dist/libs/pdfmake/pdfmake.min.js"></script>
    <script src="../../dist/libs/pdfmake/vfs_fonts.js"></script>
    <script src="../../dist/libs/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="../../dist/libs/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="../../dist/libs/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- Sweet alert -->
    <script src="../../dist/libs/sweetalert2/sweetalert2.js"></script>

    <!-- our script -->
    <script src="notes.js"></script>
  </body>
</html>