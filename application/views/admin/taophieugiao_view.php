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
              <md-content layout-padding style="background-color: #ffff" ng-init='bills=<?php echo json_encode($mangdulieu['hoadon'])?>'>
                <form  action="" method="POST">
                  <div class="card" ng-repeat="hoadon in bills">
                    <div class="card-block">
                      <div class="p-b-2 clearfix">
                        <div class="pull-right text-xs-right">
                          <h5 class="bold m-b-0">
                            {{hoadon.MAHOADON}}
                          </h5>
                          <p class="m-b-0">
                            Ngày lập: {{hoadon.NGAYLAP}}
                          </p>
                          
                        </div>
                        <div class="circle-icon bg-success text-white m-r-1 ">
                          <i class="material-icons">
                            archive
                          </i>
                        </div>
                        <div class="overflow-hidden" >
                          <md-input-container  class="m-b-0">
                            <label>Dịa chỉ giao hàng </label>
                            <input type="text" min="0" name="diachi" ng-model="diachi" >
                            <input type="hidden" min="0" name="mahoadon" value="{{hoadon.MAHOADON}}" >
                          </md-input-container>
                          <br>
                          <md-input-container >
                            <label>Nhân viên giao hàng</label>
                            <md-select name="manhanvien" ng-model="manhanvien" required >
                              <?php foreach ($mangdulieu["nhanvien"] as $key => $value): ?>
                                <md-option value="<?php echo $value["MANV"] ?>">
                                  <img src="<?php echo $value["AVATAR"] ?>" class="avatar avatar-xs  m-r-1 pull-left" alt="user" title="user">
                                  <?php echo $value["HO"] . " " . $value["TEN"] ?>
                                    
                                  </md-option>
                              <?php endforeach ?>
                              <md-option value=""></md-option>
                            </md-select>
                            <div ng-messages="projectForm.nguyenlieucu.$error">
                              <div ng-message="required">Bắt buộc</div>
                            </div>
                          </md-input-container>

                          
                        </div>
                      </div>
                      <div class="p-t-2 p-b-2 clearfix" ng-repeat="KH in hoadon.KHACHHANG">
                        <img src="{{KH.AVATAR}}" class="avatar avatar-xs img-circle m-r-1 pull-left" alt="user" title="user">
                        <div class="overflow-hidden">
                          <p class="m-b-0">
                            <strong>
                              Chi tiết khách hàng
                            </strong>
                          </p>
                          <p class="m-b-0">
                            {{KH.HO}} {{KH.TEN}}
                          </p>
                          <p class="m-b-0">
                            Số điện thoại: {{KH.SDT}}
                          </p>
                        </div>
                      </div>
                      <div class="table-responsive p-t-2 p-b-2">
                        <table class="table table-bordered m-b-0">
                          <thead>
                            <tr>
                              <th>
                                Đơn hàng
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
                                {{CTHOADON.DONGIA}}
                              </td>
                              <td>
                                {{CTHOADON.SOLUONG}}
                              </td>
                              <td>
                                {{CTHOADON.TONGCONG}}
                              </td>
                            </tr>

                            <!-- Bổ sung -->
                            <tr ng-repeat="bosung in CTHOADON.NGUYENLIEUBOSUNG">
                              <td class="float-right text-xs-center">
                               {{bosung.nguyenlieu}}
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
                        <button type="submit" class="btn btn-info form-control m-t-2">Giao hàng</button>
                      </div>
                    </div>
                    <div class="card-footer text-xs-right">
                      <button type="button" class="btn btn-danger btn-icon btn-sm" onclick="window.print();">
                        <i class="material-icons">print</i>
                        IN
                      </button>
                      <button type="button" class="btn btn-info btn-icon btn-sm">
                        <i class="material-icons">import_export</i>
                        Xuất PDF
                      </button>
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
