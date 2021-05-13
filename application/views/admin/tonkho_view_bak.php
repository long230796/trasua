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
            <div ng-controller="tonkho" layout="column" ng-cloak >
            
              <div class="row">
                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-header no-bg b-a-0">
                      Line series
                    </div>
                    <div class="card-block">
                      <div class="chart line" style="height:250px"></div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="card">
                    <div class="card-header no-bg b-a-0">
                      Grouped bar series
                    </div>
                    <div class="card-block">
                      <div class="chart bar" style="height:250px"></div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="card">
                    <div class="card-header no-bg b-a-0">
                      Pie series
                    </div>
                    <div class="card-block">
                      <div class="chart pie" style="height:250px"></div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-header no-bg b-a-0">
                      Realtime series
                    </div>
                    <div class="card-block">
                      <div class="chart realtime" style="height:250px"></div>
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
    <script src="<?php echo base_url() ?>milestone/vendor/jquery/dist/jquery.js"></script>
    <script src="<?php echo base_url() ?>milestone/vendor/pace/pace.js"></script>
    <script src="<?php echo base_url() ?>milestone/vendor/tether/dist/js/tether.js"></script>
    <script src="<?php echo base_url() ?>milestone/vendor/bootstrap/dist/js/bootstrap.js"></script>
    <script src="<?php echo base_url() ?>milestone/vendor/fastclick/lib/fastclick.js"></script>
    <script src="<?php echo base_url() ?>milestone/scripts/constants.js"></script>
    <script src="<?php echo base_url() ?>milestone/scripts/main.js"></script>
    <!-- page scripts -->
    <script src="<?php echo base_url() ?>milestone/vendor/flot/jquery.flot.js"></script>
    <script src="<?php echo base_url() ?>milestone/vendor/flot/jquery.flot.resize.js"></script>
    <script src="<?php echo base_url() ?>milestone/vendor/flot/jquery.flot.categories.js"></script>
    <script src="<?php echo base_url() ?>milestone/vendor/flot/jquery.flot.stack.js"></script>
    <script src="<?php echo base_url() ?>milestone/vendor/flot/jquery.flot.time.js"></script>
    <script src="<?php echo base_url() ?>milestone/vendor/flot/jquery.flot.pie.js"></script>
    <script src="<?php echo base_url() ?>milestone/vendor/flot-spline/js/jquery.flot.spline.js"></script>
    <script src="<?php echo base_url() ?>milestone/vendor/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <!-- end page scripts -->

    <!-- initialize page scripts -->
    <script src="<?php echo base_url() ?>milestone/scripts/charts/flot.js"></script>
    <!-- end initialize page scripts -->
    
  </body>
</html>
