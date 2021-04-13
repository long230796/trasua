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
      <?php include('C:\xampp\htdocs\trasua\application\views\pages\sidebar_view.php') ?>
      <!-- content panel -->
      <div class="main-panel">
        <?php include('C:\xampp\htdocs\trasua\application\views\pages\header_view.php') ?>

        <!-- main area -->
        <div class="content-view">
          <div ng-controller="AppCtrl" layout="column" ng-cloak>
            <div class="m-l-3 m-r-3">
              <md-content layout-padding style="background-color: #ffff">
                <form name="projectForm" action="" method="POST" enctype="multipart/form-data">
                    <div layout="row" >
                      <md-input-container flex="100">
                        <label>Nhập tên sản phẩm</label>
                        <input md-maxlength="50"  name="tenloai" ng-model="tenloai">
                        <div ng-messages="projectForm.tenloai.$error">
                          <div ng-message="required">Bắt buộc</div>
                          <div ng-message="md-maxlength">Ghi chú phải nhỏ hơn 10 kí tự</div>
                        </div>
                      </md-input-container>
                    </div>

                    <div layout="row" >
                      <md-input-container flex="100">
                        <label>Mô tả sản phẩm</label>
                        <textarea name="mota" ng-model="mota"></textarea>
                        <div ng-messages="projectForm.mota.$error">
                          <div ng-message="required">Bắt buộc</div>
                          <div ng-message="md-maxlength">Ghi chú phải nhỏ hơn 10 kí tự</div>
                        </div>
                      </md-input-container>
                    </div>

                    <div layout="row" >
                      <md-input-container flex="100">
                        <label>Giá sản phẩm</label>
                        <input type="number" name="gia" min="0" step="any" ng-model="gia">
                        <div ng-messages="projectForm.gia.$error">
                          <div ng-message="required">Bắt buộc</div>
                          <div ng-message="md-maxlength">Ghi chú phải nhỏ hơn 10 kí tự</div>
                        </div>
                      </md-input-container>
                    </div>
                    <div layout="row" >
                      <md-input-container flex="100">
                        <label>Trạng thái</label>
                        <md-select ng-model="trangthai" required name="trangthai">
                          <md-option  value="public">Công khai</md-option>
                          <md-option  value="private">Riêng tư</md-option>
                        </md-select>
                        <div ng-messages="projectForm.status.$error">
                          <div ng-message="required">Bắt buộc.</div>
                        </div>
                      </md-input-container>
                    </div>

                    <div layout="row">
                      <md-input-container flex="50">
                        <label>Số lượng nguyên liệu </label>
                        <input type="number" min="0" step="any" ng-model="soluongnl" required >
                        <div ng-messages="projectForm.soluong.$error">
                          <div ng-message="required">Bắt buộc</div>
                        </div>
                      </md-input-container>
                      <md-input-container flex="50">
                        <button type="button" class="btn btn-default m-r-xs m-b-xs form-control" ng-click="themnguyenlieu(soluongnl)">
                                Chọn
                              </button>
                      </md-input-container>
                    </div>                

                    <div ng-show="{{dataset}}"  ng-repeat="data in dataset">
                      <p class="p-b-0 m-t-2"><b>Nguyên liệu {{data}}</b></p>
                      
                      <div layout="row">
                          <md-input-container flex="20" >
                            <label>Tên nguyên liệu</label>
                            <md-select name="nguyenlieucu[]" ng-model="nguyenlieucu" required ng-disabled="nguyenlieumoi" >
                              <?php foreach ($mangdulieu["nguyenlieu"] as $key ): ?>
                                <md-option value="<?php echo $key["MANGUYENLIEU"] ?>"><?php echo $key["TENNL"] ?></md-option>
                              <?php endforeach ?>
                              <md-option value=""></md-option>
                            </md-select>
                            <div ng-messages="projectForm.nguyenlieucu.$error">
                              <div ng-message="required">Bắt buộc</div>
                            </div>
                          </md-input-container>

                          <md-input-container flex="33">
                            <label>Số lượng</label>
                            <input type="number" min="0" step="any" required ng-model="soluong" name="soluong[]" >
                            <div ng-messages="projectForm.soluong.$error">
                              <div ng-message="required">Bắt buộc</div>
                            </div>
                          </md-input-container>
                          <md-input-container flex="33">
                            <label>Đơn vị</label>
                            <md-select name="donvi[]" ng-model="donvi" required >
                              
                              <md-option value="lit">Lít</md-option>
                              <md-option value="kg">Kilogram</md-option>
                             
                            </md-select>
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
                              <div ng-message="md-maxlength">Ghi chú phải nhỏ hơn 10 kí tự</div>
                            </div>
                          </md-input-container>

                        </div>
                        
                      </div>  
                      
                      <fieldset class="form-group">
                        <label for="username">
                          Thêm ảnh
                        </label>
                        <span class=" text-xs-left form-control btn btn-success btn-icon fileinput-button m-b-1">
                          <i class="material-icons">add</i>
                          <span class="text-xs-right">Select files...</span>
                          <!-- The file input field used as target for the file upload widget -->
                          <!-- <input id="fileupload" type='file' multiple ng-file='uploadfiles'> -->
                          <input type="file" id="avatar" aria-describedby="emailHelp" placeholder="Enter email" name="avatar">
                        </span> 
                      </fieldset>

                      <button type="submit" class="btn btn-info m-r-xs m-b-xs form-control">
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
