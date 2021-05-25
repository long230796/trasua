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
    <!-- end page stylesheets -->

    <!-- build:css({.tmp,app}) styles/app.min.css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>milestone/vendor/bootstrap/dist/css/bootstrap.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>vendor/bootstrap.css"/>
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
        <div class="content-view">
          <div ng-controller="chitietsanpham" layout="column" ng-cloak ng-init='loaitrasua=<?php echo json_encode($mangdulieu['loaitrasua'])?>'>
            
            <div class="m-l-3 m-r-3">
              <md-content layout-padding style="background-color: #ffff">
                 
                <div class="row ">
                  <div class="col-sm-4 col-md-3 mb-4" ng-repeat="ts in loaitrasua | filter:search" >
                    <div class="card h-100 ">
                      <div class="img-container">
                        <img style="height:230px" class="card-img-top img-fluid" src="{{ts.HINHANH}}" alt="Card image cap">
                        <div ng-if="!ts.TRANGTHAI" class="overlay">
                          <span style="color: #ff3300"><b>NGỪNG KINH DOANH</b></span>
                        </div>
                      </div>
                      <div class="card-body d-flex flex-column ">
                        <div class="flex-grow-1">
                          <div class="plan-price text-primary mb-3">
                            <h5 class="card-title">
                              {{ts.TENLOAI}}
                            </h5>
                            <span class="plan-price-symbol text-warning">Giá: {{ts.GIA}}</span>
                          </div>
                          <p class="card-text">
                            {{ts.MOTA}}
                          </p>
                        </div>
                        
                        <div class="">
                          <p class="card-text">
                            <small class="text-muted">
                              Ngày tạo: {{ts.NGAYTAO}}
                            </small>
                          </p>
                          <a href="<?php echo base_url() ?>admin/chitietsanpham/{{ts.MALOAITRASUA}}" class="md-raised md-primary md-button md-ink-ripple">Chi tiết</a>

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
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
    <script type="text/javascript" src="<?php echo base_url(); ?>vendor/bootstrap.js"></script>

    <?php include('C:\xampp\htdocs\trasua\application\views\pages\scripts_view.php') ?>

    
    
  </body>
</html>
