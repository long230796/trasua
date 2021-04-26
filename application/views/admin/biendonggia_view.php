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
    
    <title>Milestone - Bootstrap 4 Dashboard Template</title>


    <link rel="stylesheet" href="<?php echo base_url(); ?>milestone/vendor/bower-jvectormap/jquery-jvectormap-1.2.2.css"/>
    <!-- end page stylesheets -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>milestone/vendor/sweetalert/dist/sweetalert.css">

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
  <body ng-app="myApp">

    <div class="app">
      <!--sidebar panel-->
      <div class="off-canvas-overlay" data-toggle="sidebar"></div>
      <?php require('C:\xampp\htdocs\trasua\application\views\pages\sidebar_view.php') ?>
      <!-- content panel -->
      <div class="main-panel">
        <?php require('C:\xampp\htdocs\trasua\application\views\pages\header_view.php') ?>

        <!-- main area -->
        <div class="main-content">
          <div class="content-view">
            <div ng-controller="biendonggia" layout="column" ng-cloak ng-init='loaitrasua=<?php echo json_encode($mangdulieu['loaitrasua'])?>'>
              
              <div class="card">
                <div class="card-block">
                  <div class="m-b-1">
                    <div class="dropdown pull-right">
                      <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                        <span>
                          Period
                        </span>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right" role="menu">
                        <a class="dropdown-item" href="#">
                          Today
                        </a>
                        <a class="dropdown-item" href="#">
                          This week
                        </a>
                        <a class="dropdown-item" href="#">
                          This month
                        </a>
                        <a class="dropdown-item" href="#">
                          This year
                        </a>
                      </div>
                    </div>
                    <h6>
                      Activity
                    </h6>
                  </div>
                  <div class="dashboard-line chart" style="height:300px"></div>
                  <div class="row text-xs-center m-t-1">
                    <div class="col-sm-3 col-xs-6 p-t-1 p-b-1">
                      <h6 class="m-t-0 m-b-0">
                        $ 89.34
                      </h6>
                      <small class="text-muted bold block">
                        Daily Sales
                      </small>
                    </div>
                    <div class="col-sm-3 col-xs-6 p-t-1 p-b-1">
                      <h6 class="m-t-0 m-b-0">
                        $ 498.00
                      </h6>
                      <small class="text-muted bold block">
                        Weekly Sales
                      </small>
                    </div>
                    <div class="col-sm-3 col-xs-6 p-t-1 p-b-1">
                      <h6 class="m-t-0 m-b-0">
                        $ 34,903
                      </h6>
                      <small class="text-muted bold block">
                        Monthly Sales
                      </small>
                    </div>
                    <div class="col-sm-3 col-xs-6 p-t-1 p-b-1">
                      <h6 class="m-t-0 m-b-0">
                        $ 98,343.49
                      </h6>
                      <small class="text-muted bold block">
                        Yearly Sales
                      </small>
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

    <!-- page scripts -->
    <script src="<?php echo base_url() ?>milestone/vendor/flot/jquery.flot.js"></script>
    <script src="<?php echo base_url() ?>milestone/vendor/flot/jquery.flot.resize.js"></script>
    <script src="<?php echo base_url() ?>milestone/vendor/flot/jquery.flot.stack.js"></script>
    <script src="<?php echo base_url() ?>milestone/vendor/flot-spline/js/jquery.flot.spline.js"></script>
    <script src="<?php echo base_url() ?>milestone/vendor/bower-jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="<?php echo base_url() ?>milestone/data/maps/jquery-jvectormap-us-aea.js"></script>
    <script src="<?php echo base_url() ?>milestone/vendor/jquery.easy-pie-chart/dist/jquery.easypiechart.js"></script>
    <script src="<?php echo base_url() ?>milestone/vendor/noty/js/noty/packaged/jquery.noty.packaged.min.js"></script>
    <script src="<?php echo base_url() ?>milestone/scripts/helpers/noty-defaults.js"></script>
    <!-- end page scripts -->

    <!-- initialize page scripts -->
    <script src="<?php echo base_url() ?>milestone/scripts/dashboard/dashboard.js"></script>
    <!-- end initialize page scripts -->
    
  </body>
</html>
