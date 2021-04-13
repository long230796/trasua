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
    
    <title>Thêm nhân viên</title>

    <!-- page stylesheets -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/milestone/vendor/bower-jvectormap/jquery-jvectormap-1.2.2.css"/>
    <!-- end page stylesheets -->

    <!-- build:css({.tmp,app}) styles/app.min.css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>milestone/vendor/sweetalert/dist/sweetalert.css">
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
    <div class="overlay"></div>
    <div class="app">
      <!--sidebar panel-->
      <div class="off-canvas-overlay" data-toggle="sidebar"></div>
      <?php require('C:\xampp\htdocs\trasua\application\views\pages\sidebar_view.php') ?>
      <!-- content panel -->
      <div class="main-panel">
        <nav class="header navbar">
          <div class="header-inner">
            <div class="navbar-item navbar-spacer-right brand hidden-lg-up">
              <!-- toggle offscreen menu -->
              <a href="javascript:;" data-toggle="sidebar" class="toggle-offscreen">
                <i class="material-icons">menu</i>
              </a>
              <!-- /toggle offscreen menu -->
              <!-- logo -->
              <a class="brand-logo hidden-xs-down">
                <img src="<?php echo base_url() ?>/milestone/images/logo_white.png" alt="logo"/>
              </a>
              <!-- /logo -->
            </div>
            
            <div class="navbar-search navbar-item">
              <form class="search-form">
                <i class="material-icons">search</i>
                <input class="form-control" ng-model="search" type="text" placeholder="Tìm kiếm tài khoản" />
              </form>
            </div>
           
          </div>
        </nav>
        <!-- /top header -->

        <!-- main area -->
        <div class="content-view">
          <div ng-controller="managedAccount" layout="column" ng-cloak>
            <div class="m-l-3 m-r-3">
              
              </md-input-container>
              <md-content layout-padding style="background-color: #ffff">
                <table class="table table-hover" ng-init='taikhoan=<?php echo json_encode($mangdulieu['taikhoan'])?>'>
                      <thead class="thead-default">
                        <tr>
                          <th>
                            #
                          </th>
                          <th>
                            Tài khoản
                          </th>
                          <th>
                            Vai trò
                          </th>
                          <th>
                            Bộ phận
                          </th>
                          <th>
                            Trạng thái
                          </th>
                          <th>
                            Ngày tạo
                          </th>
                          <th>
                            Hành động
                          </th>
                        </tr>
                      </thead>
                      <tbody >
                        <tr ng-repeat="acc in taikhoan | filter:search" ng-init="acc.hienthi='true'">
                          <th scope="row">
                            {{$index}}
                          </th>
                          <td>
                            {{acc.TAIKHOAN}}
                          </td>
                          <td ng-show="acc.hienthi">
                            {{acc.VAITRO}}
                          </td>
                          <td ng-show="acc.hienthi">
                            {{acc.BOPHAN}}
                          </td>
                          <td class="p-t-0" ng-show="!acc.hienthi">
                            <md-input-container class="m-b-0 m-t-0">
                            
                              <md-select style="color: rgba(0, 0, 0, 1)!important;" ng-model="bophan" name="vaitro" >
                                <md-option value="1">quản lí</md-option>
                                <md-option value="0">Nhân viên</md-option>
                              </md-select>
                            </md-input-container>
                          </td>
                          <td class="p-t-0" ng-show="!acc.hienthi">
                            <md-input-container class="m-b-0 m-t-0">
                            
                              <md-select ng-model="bophan" name="bophan">
                                <?php foreach ($mangdulieu["bophan"] as $key => $value): ?>
                                  <md-option value="<?php echo $value["MABP"] ?>"><?php echo $value["TENBOPHAN"] ?></md-option>
                                  
                                <?php endforeach ?>
                              </md-select>
                            </md-input-container>
                          </td>
                          <td>
                            {{acc.TRANGTHAI}}
                          </td>
                          <td>
                            {{acc.NGAYTAO}}
                          </td>
                          <td>
                            <a href="#" ng-click="display(acc)" >
                              <i class="material-icons text-primary">settings</i>
                            </a>
                            <a href="#">
                              <i class="material-icons text-danger">lock</i>
                            </a>
                          </td>
                          
                          
                        </tr>
                      </tbody>
                    </table>
                    <a href="">
                    </a>
                    <script src="<?php echo base_url(); ?>/milestone/vendor/sweetalert/dist/sweetalert.min.js"></script>
                    <script src="<?php echo base_url(); ?>/milestone/scripts/ui/alert.js"></script>

              </md-content>
            </div>

          </div>
        </div>
        <!-- /main area -->
      </div>
      <!-- /content panel -->

      

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
    <script src="<?php echo base_url(); ?>/milestone/vendor/flot/jquery.flot.js"></script>
    <script src="<?php echo base_url(); ?>/milestone/vendor/flot/jquery.flot.resize.js"></script>
    <script src="<?php echo base_url(); ?>/milestone/vendor/flot/jquery.flot.stack.js"></script>
    <script src="<?php echo base_url(); ?>/milestone/vendor/flot-spline/js/jquery.flot.spline.js"></script>
    <script src="<?php echo base_url(); ?>/milestone/vendor/bower-jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="<?php echo base_url(); ?>/milestone/data/maps/jquery-jvectormap-us-aea.js"></script>
    <script src="<?php echo base_url(); ?>/milestone/vendor/jquery.easy-pie-chart/dist/jquery.easypiechart.js"></script>
    <script src="<?php echo base_url(); ?>/milestone/vendor/noty/js/noty/packaged/jquery.noty.packaged.min.js"></script>
    <script src="<?php echo base_url(); ?>/milestone/scripts/helpers/noty-defaults.js"></script>

    <!-- end page scripts -->

    <!-- initialize page scripts -->
    <script src="<?php echo base_url(); ?>/milestone/scripts/dashboard/dashboard.js"></script>
    <!-- end initialize page scripts -->
    <script type="text/javascript" src="<?php echo base_url() ?>vendor/angular-1.5.min.js"></script>  
    <script type="text/javascript" src="<?php echo base_url() ?>vendor/angular-route.min.js"></script>  
    <script type="text/javascript" src="<?php echo base_url() ?>vendor/angular-animate.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>vendor/angular-aria.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>vendor/angular-messages.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>vendor/angular-material.min.js"></script>  
    <script type="text/javascript" src="<?php echo base_url() ?>1.js"></script>

    
    
  </body>
</html>
