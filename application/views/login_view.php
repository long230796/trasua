<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content=""/>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1"/>
    <meta name="msapplication-tap-highlight" content="no">
    
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="application-name" content="Milestone">

    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Milestone">

    <meta name="theme-color" content="#4C7FF0">
    
    <title>Đăng nhập</title>

    <!-- page stylesheets -->
    <!-- end page stylesheets -->

    <!-- build:css({.tmp,app}) styles/app.min.css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/milestone/vendor/bootstrap/dist/css/bootstrap.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>/milestone/vendor/pace/themes/blue/pace-theme-minimal.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>/milestone/vendor/font-awesome/css/font-awesome.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>/milestone/vendor/animate.css/animate.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>/milestone/styles/app.css" id="load_styles_before"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>/milestone/styles/app.skins.css"/>
    <!-- endbuild -->
  </head>
  <body>

    <div class="app no-padding no-footer layout-static">
      <div class="session-panel">
        <div class="session">
          <div class="session-content">
            <div class="card card-block form-layout">
              <form role="form" action="<?php echo base_url(); ?>admin/login" id="validate" method="POST">
                <div class="text-xs-center m-b-3">
                  <img src="images/logo-icon.png" height="80" alt="" class="m-b-1"/>
                  <h5>
                    Xin chào!
                  </h5>
                  <p class="text-muted">
                    Đăng nhập sử dụng tài khoản của bạn.
                  </p>
                </div>
                <fieldset class="form-group">
                  <label for="username">
                    Nhập tên
                  </label>
                  <input type="email" class="form-control form-control-lg" id="username" placeholder="tài khoản" required name="username" />
                </fieldset>
                <fieldset class="form-group">
                  <label for="password">
                    Nhập mật khẩu
                  </label>
                  <input type="password" class="form-control form-control-lg" id="password" placeholder="********" required name="password" />
                </fieldset>
               <!--  <label class="custom-control custom-checkbox m-b-1">
                  <input type="checkbox" class="custom-control-input">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description">Duy trì đăng nhập</span>
                </label> -->
                <button class="btn btn-primary btn-block btn-lg" type="submit">
                  Đăng nhập
                </button>
              </form>
            </div>
          </div>
        </div>

      </div>
    </div>

    <script type="text/javascript">
      window.paceOptions = {
        document: true,
        eventLag: true,
        restartOnPushState: true,
        restartOnRequestAfter: true,
        ajax: {
          trackMethods: [ 'POST','GET']
        }
      };
    </script>

    <!-- build:js({.tmp,app}) scripts/app.min.js -->
    <script src="<?php echo base_url(); ?>/milestone/vendor/jquery/dist/jquery.js"></script>
    <script src="<?php echo base_url(); ?>/milestone/vendor/pace/pace.js"></script>
    <script src="<?php echo base_url(); ?>/milestone/vendor/tether/dist/js/tether.js"></script>
    <script src="<?php echo base_url(); ?>/milestone/vendor/bootstrap/dist/js/bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>/milestone/vendor/fastclick/lib/fastclick.js"></script>
    <script src="<?php echo base_url(); ?>/milestone/scripts/constants.js"></script>
    <script src="<?php echo base_url(); ?>/milestone/scripts/main.js"></script>
    <!-- endbuild -->

    <!-- page scripts -->
    <script src="<?php echo base_url(); ?>/milestone/vendor/jquery-validation/dist/jquery.validate.min.js"></script>
    <!-- end page scripts -->

    <!-- initialize page scripts -->
    <script type="text/javascript">
      $('#validate').validate();
    </script>
    <!-- end initialize page scripts -->
    
  </body>
</html>
