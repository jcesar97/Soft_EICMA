<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="<?= base_url() ?>/public/tema_tesis/login/css/fonts_login.css">

    <link rel="stylesheet" href="<?= base_url() ?>/public/tema_tesis/login/fonts/icomoon/style.css">

    <link rel="stylesheet" href="<?= base_url() ?>/public/tema_tesis/login/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/public/tema_tesis/login/css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="<?= base_url() ?>/public/tema_tesis/login/css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>/public/tema_tesis/dist/css/toastr.min.css">

    <title>Login</title>
  </head>
  <body>
  

  
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="<?= base_url() ?>/public/tema_tesis/login/images/undraw_remotely_2j6y.svg" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
              <h3>EICMA</h3>
              <p class="mb-4">Empresa de la Informática y Comunicaciones del Ministerio de la Agricultura.</p>
            </div>
            <form action="<?php echo site_url('Login/login'); ?>" method="post">
              <div class="form-group first">
                <label for="email">Correo electrónico</label>
                <input type="text" class="form-control" id="email" name="email">

              </div>  
              <div class="form-group last mb-4">
                <label for="password">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password">
                
              </div>
              
              <div class="d-flex mb-5 align-items-center">
                <label class="control control--checkbox mb-0"><span class="caption">Recordarme</span>
                  <input type="checkbox" checked="checked"/>
                  <div class="control__indicator"></div>
                </label>
                <span class="ml-auto"><a href="#" class="forgot-pass">Recuperar contraseña</a></span> 
              </div>

              <input type="submit" value="Entrar" class="btn btn-block btn-primary">
              
              <!-- <div class="social-login">
                <a href="#" class="facebook">
                  <span class="icon-facebook mr-3"></span> 
                </a>
                <a href="#" class="twitter">
                  <span class="icon-twitter mr-3"></span> 
                </a>
                <a href="#" class="google">
                  <span class="icon-google mr-3"></span> 
                </a>
              </div> -->
            </form>
            </div>
          </div>
          
        </div>
        
      </div>
    </div>
  </div>

  
    <script src="<?= base_url() ?>/public/tema_tesis/login/js/jquery-3.3.1.min.js"></script>
    <script src="<?= base_url() ?>/public/tema_tesis/login/js/popper.min.js"></script>
    <script src="<?= base_url() ?>/public/tema_tesis/login/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>/public/tema_tesis/login/js/main.js"></script>
    <script src="<?= base_url() ?>/public/tema_tesis/dist/js/toastr.min.js"></script>
  </body>
</html>