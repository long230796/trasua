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
        <div class="content-view" ng-controller="managedAccount">
            <div class="layout-xs contacts-container">
              <div class="flexbox-xs layout-column-xs contacts-list b-r">
                <div class="contact-header bg-default">
                  <div class="contact-toolbar">
                    <form class="form-inline">
                      <input class="form-control" type="text" ng-model="searchNV" placeholder="Search"/>
                    </form>
                  </div>
                </div>
                <div class="flex-xs scroll-y" ng-init='nhanvien=<?php echo json_encode($mangdulieu['nhanvien'])?>'>
                  <!--Contact list item-->
                  <a href="javascript:;" class="column-equal" data-toggle="contact" ng-repeat="nv in nhanvien | filter: searchNV" ng-click="setNhanvien(nv)" >
                    <div class="col v-align-middle contact-avatar">
                      <div class="circle-icon bg-success">
                        {{nv.TEN[0]}}
                      </div>
                    </div>
                    <div class="col v-align-middle contact-details p-l-1">
                      <span class="bold">{{nv.HO}} {{nv.TEN}}</span>
                      <span class="small">{{nv.VAITRO}}</span>
                    </div>
                  </a>
                  
                </div>
              </div>
              <div class="flexbox-xs layout-column-xs contact-view">
                <div class="contact-header hidden-lg-up">
                  <div class="contact-toolbar">
                    <a href="javascript:;" data-toggle="contact">
                      <i class="material-icons visible-xs m-r-1">arrow_back</i>
                    </a>
                  </div>
                </div>
                <div class="flex-xs scroll-y p-a-3" ng-init='single=<?php echo json_encode($mangdulieu['nhanvien'][0])?>'>
                  <div class="column-equal m-b-2">
                    <div class="col" style="width:128px;">
                      <img src="{{single.AVATAR}}" class="avatar avatar-lg img-circle" alt="">
                    </div>
                    <div class="col v-align-middle p-l-2">
                      <h1>
                        {{single.HO}} {{single.TEN}}
                      </h1>
                      <h3>{{single.VAITRO}}</h3>
                    </div>
                  </div>
                  <div class="column-equal m-b-2">
                    <div class="col p-l-2 text-xs-right" style="width:128px;">
                      <span class="text-muted">Email</span>
                    </div>
                    <div class="col p-l-2">
                      <a ng-href="email@example.com" href="email@example.com">
                        {{single.EMAIL}}
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
                        {{single.SDT}}
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
                        {{single.MABP}}
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
                      <span>
                        {{single.NGAYTAO}}
                      </span>
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
