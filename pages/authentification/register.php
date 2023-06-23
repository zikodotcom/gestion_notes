<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta19
* @link https://tabler.io
* Copyright 2018-2023 The Tabler Authors
* Copyright 2018-2023 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Sign up - Tabler - Premium and Open Source dashboard template with responsive and high quality UI.</title>
    <!-- CSS files -->
    <link href="../../dist/css/tabler.min.css?1684106062" rel="stylesheet"/>
    <link href="../../dist/css/personalise.css" rel="stylesheet"/>

    <link href="../../dist/css/tabler-flags.min.css?1684106062" rel="stylesheet"/>
    <link href="../../dist/css/tabler-payments.min.css?1684106062" rel="stylesheet"/>
    <link href="../../dist/css/tabler-vendors.min.css?1684106062" rel="stylesheet"/>
    <link href="../../dist/css/demo.min.css?1684106062" rel="stylesheet"/>
    <style>
      @import url('https://rsms.me/inter/inter.css');
      :root {
      	--tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
      }
      body {
      	font-feature-settings: "cv03", "cv04", "cv11";
      }
    </style>
  </head>
  <body  class=" d-flex flex-column">
    <script src="dist/js/demo-theme.min.js?1684106062"></script>
    <div class="page page-center">
      <div class="container container-tight py-4">
        <div class="text-center mb-4">
          <a href="." class="navbar-brand navbar-brand-autodark"><img src="./static/logo.svg" height="36" alt=""></a>
        </div>
        <form class="card card-md" id="register" novalidate>
          <div class="card-body">
            <h2 class="card-title text-center mb-4">Creer nouveau compte</h2>
            <div class="mb-3">
              <label class="form-label">CIN</label>
              <input type="text" class="form-control" id="cin" name="cin" placeholder="Enter votre cin">
            </div>
            <div class="mb-3">
              <label class="form-label">Nom</label>
              <input type="text" class="form-control" id="nom" name="nom" placeholder="Enter votre Nom">
            </div>
            <div class="mb-3">
              <label class="form-label">Prenom</label>
              <input type="text" class="form-control" id="Prenom" name="Prenom" placeholder="Enter votre Prenom">
            </div>
            <div class="mb-3">
              <label class="form-label">Adresse</label>
              <input type="text" class="form-control" id="Adresse" name="Adresse" placeholder="Enter votre Adresse">
            </div>
            <div class="mb-3">
              <label class="form-label">Ville</label>
              <input type="text" class="form-control" id="ville" name="ville" placeholder="Enter votre Ville">
            </div>
            <div class="mb-3">
              <label class="form-label">Telephone</label>
              <input type="text" class="form-control" id="tel" name="tel" placeholder="Enter votre cin">
            </div>
            <div class="mb-3">
              <label class="form-label">Email address</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Enter votre email">
            </div>
            <div class="mb-3">
              <label class="form-label">Password</label>
              <div class="input-group input-group-flat ">
                <input type="password" class="form-control" name="password1" id="password1"  placeholder="Password"  autocomplete="off">
                <span class="input-group-text pass1">
                  <span class="link-secondary" title="Show password" data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" /></svg>
                </span>
                </span>
              </div>
            </div>
            <div class="mb-3">
              <label class="form-label">Confirm Password</label>
              <div class="input-group input-group-flat">
                <input type="password" class="form-control" id="password2"  name="password2" autocomplete="current-password" placeholder="Confirm Password"  autocomplete="off">
                <span class="input-group-text pass2">
                  <span class="link-secondary" title="Show password" data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" /></svg>
                </span>
                </span>
              </div>
            </div>
            <div class="form-footer">
              <button type="submit" class="btn btn-primary w-100">Register</button>
            </div>
          </div>
        </form>
        <div class="text-center text-muted mt-3">
         Avez-vous un compte? <a href="Login.php" tabindex="-1">Sign in</a>
        </div>
      </div>
    </div>
    <!-- Libs JS -->
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
<script src="register.js"></script>
</body>
</html>
