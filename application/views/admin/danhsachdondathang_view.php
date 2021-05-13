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
        <div class="content-view">
          <div ng-controller="AppCtrl" layout="column" ng-cloak>
            <div class="m-l-3 m-r-3">
              <md-content layout-padding style="background-color: #ffff" ng-init="themtrasua(1)">

                <form name="projectForm" action="" method="POST" ng-init='khachhang=parJson(<?php echo $mangdulieu['khachhang']?>)'>

                      <hr  ng-init="soluonghoadon='10'">
                      <h6 class="text-center m-b-1 m-t-3" ng-init='dondathang=<?php echo json_encode($mangdulieu['dondathang'])?>'>
                        Danh sách đơn đặt
                      </h6>

                      <div id="angularPart" class="row" ng-repeat="ddh in dondathang | filter:search | limitTo : soluonghoadon" ng-init="ddh.display=false">
                        <div class="col-md-12">
                          <div class="card ">
                            <div class="card-header " ng-click="displayHoadon(ddh)">
                               Mã đơn đặt: {{ddh.MADONDH}}<br>
                               Ngày lập: {{ddh.NGAYLAP}} <br>
                               Trạng thái: 
                               <b><a ng-show="{{ddh.TRANGTHAI === '1' ? 'true' : '' }}" href="#" class="text-success m-r-1 m-b-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="On the Top!">
                                 Đã thanh toán
                               </a></b>
                               <b><a ng-show="{{ddh.TRANGTHAI === '2' ? 'true' : '' }}" href="#" class="text-pink m-r-1 m-b-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="On the Top!">
                                 Đã hủy
                               </a></b>
                               <b><a ng-show="{{ddh.TRANGTHAI === '3' ? 'true' : '' }}" href="#" class="text-warning m-r-1 m-b-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="On the Top!">
                                 Đang chờ
                               </a></b>

                              <div class="card-controls ">
                                <a ng-click="displayHoadon(ddh)" class="card-collapse" data-toggle="card-collapse"></a>
                              </div>
                            </div>
                            <div class="card-block" ng-show="ddh.display">
                              <div class="row">
                                <div class="col-sm-6">
                                  <!-- nha cung cap -->
                                  <div class="p-t-2 p-b-2 clearfix" ng-repeat="ncc in ddh.CTNHACUNGCAP">
                                    <img src="http://localhost:8080/trasua/milestone/images/avatar.jpg" class="avatar avatar-xs img-circle m-r-1 pull-left" alt="user" title="user">
                                    <div class="overflow-hidden">
                                      <p class="m-b-0">
                                        <strong>
                                          Nhà cung cấp
                                        </strong>
                                      </p>
                                      <p class="m-b-0">
                                        Nhà cung cấp: {{ncc.TEN}}
                                      </p>
                                      <p class="m-b-0">
                                        Số điện thoại: {{ncc.SDT}}
                                      </p>
                                      <p class="m-b-0">
                                        Địa chỉ: {{ncc.DIACHI}}
                                      </p>
                                      
                                    </div>
                                  </div>
                                </div>

                                <div class="col-sm-6">
                                  <!-- nhân viên lập -->
                                  <div class="p-t-2 p-b-2 clearfix " ng-repeat="nv in ddh.CTNHANVIENLAP">
                                    <img src="{{nv.AVATAR}}" class="avatar avatar-xs img-circle m-r-1 pull-left" alt="user" title="user">
                                    <div class="overflow-hidden">
                                      <p class="m-b-0">
                                        <strong>
                                          Người lập đơn
                                        </strong>
                                      </p>
                                      <p class="m-b-0">
                                        Tên: {{nv.HO}} {{nv.TEN}}
                                      </p>
                                      <p class="m-b-0">
                                        Số điện thoại: {{nv.SDT}}
                                      </p>
                                      <p class="m-b-0">
                                        Mã nhân viên: {{nv.MANV}}
                                      </p>
                                      
                                      
                                    </div>
                                  </div>
                                  
                                </div>
                                
                                
                              </div>
                              <div class="table-responsive p-t-2 p-b-2">
                                <table class="table table-bordered m-b-0">
                                  <thead>
                                    <tr>
                                      <th>
                                        Tên nguyên liệu
                                      </th>
                                      <th>
                                        Số lượng
                                      </th>
                                      <th>
                                        Đơn vị
                                      </th>
                                      <th>
                                        Ghi chú
                                      </th>
                                    </tr>
                                  </thead>
                                  <tbody ng-repeat="ctddh in ddh.CTDONDATHANG">
                                    <tr>
                                      <td>
                                        {{ctddh.TENNL}}
                                      </td>
                                      <td>
                                        {{ctddh.SOLUONG}}
                                      </td>
                                      <td>
                                        {{ctddh.DONVI}}
                                      </td>
                                      <td>
                                        {{ctddh.GHICHU}}
                                      </td>
                                    </tr>

                                  </tbody>
                                </table>
                             </div>
                            <img ng-show="{{ ddh.TRANGTHAI === '2' ? 'true' : '' }}" src="<?php echo base_url() ?>/FileUpload/Cancelled.jpg" class="img-fluid" style="width: 30%" alt="Responsive image">
                            <a ng-show="{{ ddh.TRANGTHAI === '1' ? 'true' : '' }}" href="<?php echo base_url() ?>admin/chitietdondathang/{{ddh.MADONDH}}" type="button" class="btn btn-success btn-icon btn-sm" >
                              Chi tiết
                              <i class="material-icons">remove_red_eye</i>
                            </a>
                            <a ng-show="{{ ddh.TRANGTHAI === '2' ? 'true' : '' }}" href="<?php echo base_url() ?>admin/chitietdondathang/{{ddh.MADONDH}}" type="button" class="btn btn-success btn-icon btn-sm pull-xs-right" >
                              Chi tiết
                              <i class="material-icons">remove_red_eye</i>
                            </a> 
                            <a ng-show="{{ ddh.TRANGTHAI === '3' ? 'true' : '' }}" href="<?php echo base_url() ?>admin/nhaphang/{{ddh.MADONDH}}" type="button" class="btn btn-success btn-icon btn-sm pull-xs-right" >
                              Nhập hàng
                              <i class="material-icons">file_download</i>
                            </a>
                            <button ng-show="{{ ddh.TRANGTHAI === '3' ? 'true' : '' }}" ng-click="getMahoadon(ddh.MADONDH)" type="button" class="btn btn-danger btn-icon btn-sm cancelDondh">
                              Hủy đơn đặt
                              <i class="material-icons">cancel</i>
                            </button>
                            ​
                            <script src="<?php echo base_url(); ?>/milestone/scripts/ui/alert.js"></script>
                            </div>
                          </div>
                        </div>
                    
                      </div>
                      <div class="container-fluid p-r-0 p-l-0">
                        <button ng-click="readmoreHoadon(soluonghoadon)" class="btn btn-info pull-xs-right" type="button" aria-label="Next">
                          <span aria-hidden="true">Xem thêm »</span>
                          
                        </button>
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
