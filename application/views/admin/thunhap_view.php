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

    <!-- page stylesheets -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>milestone/vendor/c3/c3.min.css">
    <!-- end page stylesheets -->

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
            <div ng-controller="thunhap" layout="column" ng-cloak ng-init='loaitrasua=<?php echo json_encode($mangdulieu['loaitrasua'])?>'>
            
            
              
                <div class="m-b-3" style="background: #ffff">
                  <h6 class="m-b-1">Line series</h6>
                  <div class="c3chart">
                    <div class="c3chart1" id="chart"></div>
                  </div>
                </div>

                <div style="background: #ffff">
                  <h6 class="m-b-1">Bar series</h6>
                  <div class="c3chart">
                    <div class="c3chart2" id="chart2"></div>
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
    <script src="<?php echo base_url() ?>milestone/vendor/d3/d3.min.js" charset="utf-8"></script>
    <script src="<?php echo base_url() ?>milestone/vendor/c3/c3.min.js"></script>
    <!-- end page scripts -->

    <!-- initialize page scripts -->
    <script src="<?php echo base_url() ?>milestone/scripts/charts/c3.js"></script>
    <!-- end initialize page scripts -->
    
  </body>
</html>