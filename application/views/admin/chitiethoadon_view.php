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
            <div class="navbar-item navbar-spacer-right navbar-heading hidden-md-down" href="#">
              <button type="button" class="btn btn-success btn-icon btn-sm" onclick='window.print()'>
                In hóa đơn
                <i class="material-icons">print</i>
              </button> 
            </div>
            <div class="navbar-search navbar-item">
              <form class="search-form">
                <i class="material-icons">search</i>
                <input class="form-control" ng-model="search" type="text" placeholder="Tìm kiếm tài khoản" />
              </form>
            </div>
           
          </div>
        </nav>

        <!-- main area -->
        <div class="content-view">
          <div ng-controller="AppCtrl" layout="column" ng-cloak>
            <!-- <div class="card m-b-1 m-l-3 m-r-3">
              <div class="card-header no-bg b-a-0">
                Số lượng trà sữa
              </div>
              <div class="card-block">
                <div class="input-group m-b-1">
                  <input type="text" ng-model="soluong" class="form-control bl0 br0 spinner1"/>
                </div>
                <button type="button" class="btn btn-outline-info m-r-xs m-b-xs form-control" ng-click="themtrasua(soluong)">
                      Chọn
                    </button>
              </div>
            </div> -->
            <div class="m-l-3 m-r-3">
              <md-content layout-padding style="background-color: #ffff" ng-init="themtrasua(1)">
                <!-- so luong tra sua -->
                <!-- <div layout="row" >
                  <md-input-container flex="50" class="m-b-0">
                    <label>Số lượng trà sữa</label>
                    <input type="text" min="1" max="10" ng-model="soluong">
                  </md-input-container>
                  <md-input-container flex="50" class="m-b-0">
                    <button type="button" class="btn btn-default m-r-xs m-b-xs form-control" ng-click="themtrasua(soluong)">
                      Chọn
                    </button>
                  </md-input-container>
                </div> -->

                <form name="projectForm" action="" method="POST" ng-init='khachhang=parJson(<?php echo $mangdulieu['khachhang']?>)'>

                      <div ng-init='bills=<?php echo json_encode($mangdulieu['hoadon'])?>'></div>

                      <div id="angularPart" class="row" ng-repeat="hoadon in bills | filter:search | limitTo : soluonghoadon" ng-init="hoadon.display=false">
                        <div class="col-md-12">
                          <div class="card ">
                            
                            <div class="card-block">
                              <div class="p-t-2 p-b-2 clearfix" ng-repeat="client in hoadon.KHACHHANG">
                                <img src="{{client.AVATAR}}" class="avatar avatar-xs img-circle m-r-1 pull-left" alt="user" title="user">
                                <div class="overflow-hidden">
                                  <p class="m-b-0">
                                    <strong>
                                      Chi tiết khách hàng
                                    </strong>
                                  </p>
                                  <p class="m-b-0">
                                    Tên: {{client.HO}} {{client.TEN}}
                                  </p>
                                  <p class="m-b-0">
                                    Số điện thoại: {{client.SDT}}
                                  </p>
                                  <p class="m-b-0">
                                    Ngày lập: {{hoadon.NGAYLAP}}
                                  </p>
                                  
                                </div>
                              </div>
                              <div class="table-responsive p-t-2 p-b-2">
                                <table class="table table-bordered m-b-0">
                                  <thead>
                                    <tr>
                                      <th>
                                        Mô tả
                                      </th>
                                      <th>
                                        Size
                                      </th>
                                      <th>
                                        Đơn giá
                                      </th>
                                      <th>
                                        Số lượng
                                      </th>
                                      <th>
                                        Tổng
                                      </th>
                                    </tr>
                                  </thead>
                                  <tbody ng-repeat="CTHOADON in hoadon.CTHOADON">
                                    <tr>
                                      <td>
                                        {{CTHOADON.TENLOAI}}
                                      </td>
                                      <td>
                                        {{CTHOADON.TENSIZE}}
                                      </td>
                                      <td>
                                        {{CTHOADON.DONGIAMOI}}
                                      </td>
                                      <td>
                                        {{CTHOADON.SOLUONG}}
                                      </td>
                                      <td>
                                        {{CTHOADON.DONGIAMOI * CTHOADON.SOLUONG}}
                                      </td>
                                    </tr>

                                    <!-- Bổ sung -->
                                    <tr ng-repeat="bosung in CTHOADON.NGUYENLIEUBOSUNG">
                                      <td class="float-right text-xs-center">
                                       {{bosung.nguyenlieu}}
                                      </td>
                                      <td>
                                        
                                      </td>
                                      <td>
                                        {{bosung.gia/bosung.soluongthem}}
                                      </td>
                                      <td>
                                        {{bosung.soluongthem}} {{bosung.donvi}}
                                      </td>
                                      <td>
                                        {{bosung.gia}}
                                      </td>
                                    </tr>
                                    
                                  </tbody>
                                </table>
                             </div>
                             <div class="invoice-totals p-t-2 p-b-2">
                              <div class="invoice-totals-row">
                                <strong class="invoice-totals-title">
                                  Tổng cộng
                                </strong>
                                <span class="invoice-totals-value">
                                  {{hoadon.GIAHOADON}}
                                </span>
                              </div>
                            </div>
                            
                            ​<img ng-show="{{ hoadon.MATRANGTHAI === '2' ? 'true' : '' }}" src="<?php echo base_url() ?>/FileUpload/unpaid.jpg" class="img-fluid" style="width: 25%" alt="Responsive image">
                            <script src="<?php echo base_url(); ?>/milestone/scripts/ui/alert.js"></script>
                            </div>
                          </div>
                        </div>
                    
                      </div>
                      
                    </div>                         


                    </div>
                  </div>

                </form>

              </md-content>
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
