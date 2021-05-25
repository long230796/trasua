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
    <link rel="stylesheet" href="<?php echo base_url(); ?>/milestone/vendor/sweetalert/dist/sweetalert.css">
    <!-- end page stylesheets -->

    <!-- build:css({.tmp,app}) styles/app.min.css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/milestone/vendor/bootstrap/dist/css/bootstrap.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>/milestone/vendor/pace/themes/blue/pace-theme-minimal.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>/milestone/vendor/font-awesome/css/font-awesome.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>/milestone/vendor/animate.css/animate.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>/milestone/styles/app.css" id="load_styles_before"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>/milestone/styles/app.skins.css"/>
    <!-- endbuild -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>milestone/styles/app.skins.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>vendor/angular-material.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>1.css">
  </head>
  <body ng-app="myApp">

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
                <input class="form-control" ng-model="search" type="text" placeholder="Tìm kiếm size" />
              </form>
            </div>
           
          </div>
        </nav>
        <!-- /top header -->

        <!-- main area -->
        <div class="content-view">
          <div ng-controller="managedStock" layout="column" ng-cloak>
            <div class="m-l-3 m-r-3">
              
              </md-input-container>
              <md-content layout-padding style="background-color: #ffff">
                <table class="table table-hover" ng-init='sizes=<?php echo json_encode($mangdulieu['size'])?>'>
                      <thead class="thead-default">
                        <tr>
                          <th>
                            #
                          </th>
                          <th>
                            Tên size
                          </th>
                          <th>
                            Khối lượng riêng
                          </th>
                          <th>
                            Chỉnh sửa
                          </th>
                        </tr>
                      </thead>
                      <tbody >
                        <tr ng-repeat="size in sizes | filter:search" ng-init="size.hienthi='true'" id="angularPart">
                          <th scope="row">
                            {{$index}}
                          </th>
                          <td >
                            {{size.TENSIZE}}
                          </td>
                          <td ng-show="size.hienthi">
                            {{size.KHOILUONGRIENG}}
                          </td>
                          <td class="p-t-0" ng-show="!size.hienthi">
                            <md-input-container class="m-b-0 m-t-0" >
                              <input ng-change='displayDone(size)' min="0.1" max="2" step="any" type="number" ng-value="size.KHOILUONGRIENG" required ng-model="size.KHOILUONGRIENGMOI">
                              <div ng-messages="projectForm.size.$error">
                                <div ng-message="required">Bắt buộc</div>
                                <div ng-message="md-maxlength">Ghi chú phải nhỏ hơn 10 kí tự</div>
                              </div>
                            
                            </md-input-container>
                          </td>
                          <td ng-init="size.DONE=''">
                            <!-- chỉnh sửa -->
                            <a href="#" ng-click="displaysize(size, size.KHOILUONGRIENG)" >
                              <i class="material-icons text-primary"> mode_edit</i>
                            </a>

                            <!-- done -->
                            <a ng-show="size.DONE" href="#" >
                              <i class="material-icons text-primary doneSize" ng-click="getSize(size)">done</i>
                              <script src="<?php echo base_url(); ?>/milestone/scripts/ui/alert.js"></script>
                            </a>

                          </td>
                          
                        </tr>
                      </tbody>
                    </table>
                   
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

    <?php include('C:\xampp\htdocs\trasua\application\views\pages\scripts_view.php') ?>
    
  </body>
</html>
