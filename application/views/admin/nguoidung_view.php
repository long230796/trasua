<!DOCTYPE html>
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
    
    <title>Milestone - Bootstrap 4 Dashboard Template</title>

    <!-- page stylesheets -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/milestone/vendor/bower-jvectormap/jquery-jvectormap-1.2.2.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>/milestone/vendor/sweetalert/dist/sweetalert.css">
    <!-- end page stylesheets -->

    <!-- build:css({.tmp,app}) styles/app.min.css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>milestone/vendor/bootstrap/dist/css/bootstrap.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>milestone/vendor/pace/themes/blue/pace-theme-minimal.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>milestone/vendor/font-awesome/css/font-awesome.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>milestone/vendor/animate.css/animate.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>milestone/styles/app.css" id="load_styles_before"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>milestone/styles/app.skins.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>vendor/angular-material.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>1.css">
    <!-- endbuild -->
  </head>
  <body  ng-app="myApp">
    
    <div class="app">
      <!--sidebar panel-->
      <div class="off-canvas-overlay" data-toggle="sidebar"></div>
      <?php require('C:\xampp\htdocs\trasua\application\views\pages\sidebar_view.php') ?>
      <!-- content panel -->
      <div class="main-panel">
        <?php require('C:\xampp\htdocs\trasua\application\views\pages\header_view.php') ?>

        <!-- main area -->
        <div class="content-view" >
          <div ng-controller="nguoidung" layout="column" ng-cloak>
           
            <div id="angularPart" class="" ng-init='nhanvien=<?php echo json_encode($mangdulieu['nhanvien'])?>'>
              <div class="flex-xs scroll-y p-a-3" ng-repeat="nv in nhanvien">
                <div class="column-equal m-b-2">
                  <div class="col" style="width:128px;">
                    <img src="{{nv.AVATAR}}" class="avatar avatar-lg img-circle" alt="">
                  </div>
                  <div class="col v-align-middle p-l-2">
                    <h1>
                      {{nv.HO}} {{nv.TEN}}
                    </h1>
                    <h3><?php echo $mangdulieu['role'] ?></h3>
                  </div>
                </div>
                <div class="column-equal m-b-2">
                  <div class="col p-l-2 text-xs-right" style="width:128px;">
                    <span class="text-muted">Email</span>
                  </div>
                  <div class="col p-l-2">
                    <a ng-href="email@example.com" href="email@example.com">
                      <?php echo $mangdulieu["taikhoan"][0]["TAIKHOAN"] ?>
                    </a>
                  </div>
                </div>
                <div class="column-equal m-b-2">
                  <div class="col p-l-2 text-xs-right" style="width:128px;">
                    <span class="text-muted">
                      Số điện thoại
                    </span>
                  </div>
                  <div class="col p-l-2">
                    <span>
                      {{nv.SDT}}
                    </span>
                  </div>
                </div>
                <div class="column-equal m-b-2">
                  <div class="col p-l-2 text-xs-right" style="width:128px;">
                    <span class="text-muted">
                      Mã bộ phận
                    </span>
                  </div>
                  <div class="col p-l-2">
                    <a ng-href="">
                     {{nv.MABP}}
                    </a>
                  </div>
                </div>
                <div class="column-equal m-b-2">
                  <div class="col p-l-2 text-xs-right" style="width:128px;">
                    <span class="text-muted">
                      Ngày tham gia
                    </span>
                  </div>
                  <div class="col p-l-2">
                    <a ng-href="">
                     <?php echo $mangdulieu["taikhoan"][0]["NGAYTAO"] ?>
                    </a>
                  </div>
                </div>
                <div class="column-equal m-b-2">
                  <div class="col p-l-2 text-xs-right" style="width:128px;">
                    <span class="text-muted">
                      Mật khẩu
                    </span>
                  </div>
                  <div class="col p-l-2">
                    <a style="vertical-align: top;" ng-href="" ng-show="!nv.displayPass">
                      ***********
                    </a>
                    <i class="material-icons text-primary p-l-2" ng-show="!nv.displayPass" ng-click="dispayEditPass(nv)"> mode_edit</i>
                    <form name="changePassForm">
                      <input type="password" required ng-model="nv.MATKHAUCU" class="form-control d-inline m-b-1" style="width: 50%" id="inputPassword" placeholder="Mật khẩu cũ" ng-show="nv.displayPass">
                      <input type="password" required ng-model="nv.MATKHAUMOI" class="form-control d-inline m-b-1" style="width: 50%" id="inputPassword" placeholder="Mật khẩu mới" ng-show="nv.displayPass">
                      <input type="password" required ng-model="nv.CONFIRMMATKHAUMOI" class="form-control d-inline m-b-1" style="width: 50%" id="inputPassword" placeholder="Nhập lại mật khẩu mới" ng-show="nv.displayPass">
                      <div ng-show="nv.displayPass" >
                        <button ng-disabled="changePassForm.$invalid" type="button" class="btn btn-primary btn-icon loading-demo m-r-xs m-b-xs changePassword" ng-click="getNhanvien(nv)">
                          <i class="material-icons">
                            send
                          </i>
                          <span>
                            Thay đổi
                          </span>
                        </button>
                      <script src="<?php echo base_url(); ?>/milestone/scripts/ui/alert.js"></script>
                      <button  ng-click="dispayEditPass(nv)" class="btn btn-danger btn-icon m-r-xs m-b-xs">
                        <i class="material-icons">
                          block
                        </i>
                        <span>
                          Hủy
                        </span>
                      </button>
                      
                    </form>
                    </div>
                  </div>
                  
                </div>
               
              </div>
            </div>

          </div>

        </div>
        <!-- /main area -->
      </div>
      <!-- /content panel -->

      

    </div>

    <script type="text/javascript">
      $("[data-toggle=tooltip]").tooltip();
      $("[data-toggle=popover]")
        .popover()
        .click(function (e) {
          e.preventDefault();
        });
    </script>

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

    <?php include('C:\xampp\htdocs\trasua\application\views\pages\scripts_view.php') ?>

    
    
  </body>
</html>
