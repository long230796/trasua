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
      <?php require('pages/sidebar_view.php') ?>
      <!-- content panel -->
      <div class="main-panel">
        <?php require('pages/header_view.php') ?>

        <!-- main area -->
        <div class="content-view">
          <div ng-controller="AppCtrl" layout="column" ng-cloak>
            <div class="card m-b-1 m-l-3 m-r-3">
              <div class="card-header no-bg b-a-0">
                Nhập số lượng nguyên liệu
              </div>
              <div class="card-block">
                <div class="input-group m-b-1">
                  <input type="text" ng-model="soluong" class="form-control bl0 br0 spinner1"/>
                </div>
                <button type="button" class="btn btn-outline-info m-r-xs m-b-xs form-control" ng-click="themnguyenlieu(soluong)">
                      Chọn
                    </button>
              </div>
            </div>
            <div class="m-l-3 m-r-3">
              <md-content layout-padding style="background-color: #ffff">
                <form name="projectForm" action="" method="POST">
                    <div layout="row" ng-init="dataset='false'">
                      <md-input-container flex="50">
                        <label>Chọn nhà cung cấp</label>
                        <md-select name="nhacungcapcu" ng-model="nhacungcapcu" ng-disabled="nhacungcapmoi" required>
                          <?php foreach ($mangdulieu["nhacungcap"] as $key ): ?>
                            <md-option value="<?php echo $key["TEN"] . "_" .  $key["MANHACUNGCAP"]?>"><?php echo $key["TEN"] ?></md-option>
                          <?php endforeach ?>
                          <md-option value=""></md-option>
                        </md-select>
                        <div ng-messages="projectForm.nhacungcapcu.$error">
                          <div ng-message="required">Bắt buộc</div>
                        </div>
                      </md-input-container>
                      <!-- <md-input-container flex="50" ng-show="nhacungcapmoi">
                      </md-input-container> -->
                      <md-input-container flex="50">
                        <label>Thêm nhà cung cấp</label>
                        <input  name="nhacungcapmoi" ng-model="nhacungcapmoi" ng-disabled="nhacungcapcu">
                        <div ng-messages="projectForm.nhacungcapmoi.$error">
                          <div ng-message="required">Bắt buộc</div>
                        </div>
                      </md-input-container>
                    </div>

                    <div layout="row">
                      <div class="col-sm-6 push-sm-6" ng-if="nhacungcapmoi">
                          <div class="row">
                            <md-input-container class="md-block">
                              <label>Số điện thoại</label>
                              <input required name="sodienthoainhacungcap" ng-model="sodienthoainhacungcap">
                              <div ng-messages="projectForm.sodienthoainhacungcap.$error">
                                <div ng-message="required">Bắt buộc</div>
                              </div>
                            </md-input-container>
                          </div>
                          <div class="row">
                            <md-input-container class="md-block">
                              <label>Địa chỉ</label>
                              <input required name="diachinhacungcap" ng-model="diachinhacungcap">
                              <div ng-messages="projectForm.diachinhacungcap.$error">
                                <div ng-message="required">Bắt buộc</div>
                              </div>
                            </md-input-container>
                          </div>
                        </div>
                    </div>


                    <div ng-show="{{dataset}}" ng-repeat="data in dataset">
                      <p class="p-b-0"><b>Nguyên liệu {{data}}</b></p>
                      <div layout="row">
                        <md-input-container flex="50" >
                          <label>Tên nguyên liệu</label>
                          <md-select name="nguyenlieucu[]" ng-model="nguyenlieucu" required ng-disabled="nguyenlieumoi" >
                            <?php foreach ($mangdulieu["nguyenlieu"] as $key ): ?>
                              <md-option value="<?php echo $key["TENNL"] . "_" . $key["MANGUYENLIEU"] ?>"><?php echo $key["TENNL"] ?></md-option>
                            <?php endforeach ?>
                            <md-option value=""></md-option>
                          </md-select>
                          <div ng-messages="projectForm.nguyenlieucu.$error">
                            <div ng-message="required">Bắt buộc</div>
                          </div>
                        </md-input-container>
                        <md-input-container flex="50">
                          <label>Thêm nguyên liệu mới</label>
                          <input name="nguyenlieumoi[]" ng-model="nguyenlieumoi" ng-disabled="nguyenlieucu">
                          <div ng-messages="projectForm.nguyenlieumoi.$error">
                            <div ng-message="required">Bắt buộc</div>
                          </div>
                        </md-input-container>
                        

                      </div>


                      <div layout="row">
                          <md-input-container flex="33">
                            <label>Số lượng</label>
                            <input type="number" min="0" step="any" required name="soluong[]" ng-model="soluong">
                            <div ng-messages="projectForm.soluong.$error">
                              <div ng-message="required">Bắt buộc</div>
                            </div>
                          </md-input-container>
                          <md-input-container flex="33">
                            <label>Đơn vị</label>
                            <input type="text" md-maxlength="10" required name="donvi[]" ng-model="donvi">
                            <div ng-messages="projectForm.donvi.$error">
                              <div ng-message="required">Bắt buộc</div>
                              <div ng-message="md-maxlength">Đơn vị phải nhỏ hơn 10 kí tự</div>
                            </div>
                          </md-input-container>
                          <md-input-container flex="33">
                            <label>Ghi chú</label>
                            <input md-maxlength="50"  name="note[]" ng-model="note">
                            <div ng-messages="projectForm.note.$error">
                              <div ng-message="required">Bắt buộc</div>
                              <div ng-message="md-maxlength">Mô tả phải nhỏ hơn 10 kí tự</div>
                            </div>
                          </md-input-container>

                        </div>
                        
                      </div>  
                      
                      <button type="submit" class="btn btn-outline-info m-r-xs m-b-xs form-control">
                        Nhập đơn đặt
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
    <script type="text/javascript" src="<?php echo base_url() ?>vendor/jquery-3.5.1.min.js"></script>  
    <script type="text/javascript" src="<?php echo base_url() ?>vendor/angular-1.5.min.js"></script>  
    <script type="text/javascript" src="<?php echo base_url() ?>vendor/angular-route.min.js"></script>  
    <script type="text/javascript" src="<?php echo base_url() ?>vendor/angular-animate.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>vendor/angular-aria.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>vendor/angular-messages.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>vendor/angular-material.min.js"></script>  
    <script type="text/javascript" src="<?php echo base_url() ?>1.js"></script>

    
    
  </body>
</html>
