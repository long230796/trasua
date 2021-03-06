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
                S??? l?????ng nguy??n li???u mu???n nh???p
              </div>
              <div class="card-block">
                <div class="input-group m-b-1">
                  <input type="text" ng-model="soluong" class="form-control bl0 br0 spinner1"/>
                </div>
                <button type="button" class="btn btn-outline-info m-r-xs m-b-xs form-control" ng-click="themnguyenlieu(soluong)">
                      Ch???n
                    </button>
              </div>
            </div> -->
            <div class="m-l-3 m-r-3" ng-init='dondathang=<?php echo json_encode($mangdulieu['dondathang'])?>'>
              <md-content layout-padding style="background-color: #ffff">
                <form name="projectForm" action="" method="POST" ng-repeat="ddh in dondathang">
                    <div layout="row">
                      <md-input-container class="flex-100" ng-repeat="ncc in ddh.CTNHACUNGCAP">
                        <label>nh?? cung c???p</label>
                        <input readonly type="hidden" required name="nhacungcapcu" value="{{ncc.MANHACUNGCAP}}">
                        <input readonly required ng-model="ncc.TEN">
                        <div ng-messages="projectForm.clientName.$error">
                          <div ng-message="required">This is required.</div>
                        </div>
                        <div ng-messages="projectForm.nhacungcapcu.$error">
                          <div ng-message="required">B???t bu???c</div>
                        </div>
                      </md-input-container>
                    </div>

                    <div layout="row">
                      <md-input-container class="flex-100" >
                        <label>????n ?????t h??ng</label>
                        <input readonly type="text" required name="dondathang" ng-model="ddh.MADONDH">
                        <div ng-messages="projectForm.dondathang.$error">
                          <div ng-message="required">B???t bu???c</div>
                        </div>
                      </md-input-container>
                      
                    </div>

                    <div ng-repeat="ctdondh in ddh.CTDONDATHANG">
                      <p class="p-b-0 m-t-2"><b>Nguy??n li???u {{$index+1}}</b></p>
                      
                      <div layout="row">
                          <md-input-container flex="20" >
                            <label>T??n nguy??n li???u</label>
                            <input readonly type="hidden" required name="nguyenlieucu[]" value="{{ctdondh.MANGUYENLIEU}}">
                            <input readonly type="text" required ng-model="ctdondh.TENNL">
                            
                            <div ng-messages="projectForm.nguyenlieucu.$error">
                              <div ng-message="required">B???t bu???c</div>
                            </div>
                          </md-input-container>

                          <md-input-container flex="20">
                            <label>S??? l?????ng</label>
                            <input readonly type="text" required name="soluong[]" ng-model="ctdondh.SOLUONG" >
                            <!-- <input type="number" step="any" min="0" required name="soluong[]" > -->
                            <div ng-messages="projectForm.soluong.$error">
                              <div ng-message="required">B???t bu???c</div>
                            </div>
                          </md-input-container>
                          <md-input-container flex="20">
                            <label>????n v???</label>
                            <input readonly type="text" required name="donvi[]" ng-model="ctdondh.DONVI" >
                            <!-- <md-select name="donvi[]" ng-model="donvi" required >
                              
                              <md-option value="lit">L??t</md-option>
                              <md-option value="kg">Kilogram</md-option>
                             
                            </md-select> -->
                            <div ng-messages="projectForm.donvi.$error">
                              <div ng-message="required">B???t bu???c</div>
                              <div ng-message="md-maxlength">????n v??? ph???i nh??? h??n 10 k?? t???</div>
                            </div>
                          </md-input-container>
                          <md-input-container flex="20">
                            <label>????n gi??</label>
                            <input type="number" min="5000" max="50000" required name="dongia[]" ng-model="dongia">
                            <div ng-messages="projectForm.dongia.$error">
                              <div ng-message="required">B???t bu???c</div>
                              <div ng-message="min">B???t bu???c</div>
                              <div ng-message="max">B???t bu???c</div>
                            </div>
                          </md-input-container>
                          <md-input-container flex="20">
                            <label>Ghi ch??</label>
                            <input md-maxlength="50"  name="note[]" ng-model="note">
                            <div ng-messages="projectForm.note.$error">
                              <div ng-message="required">B???t bu???c</div>
                              <div ng-message="md-maxlength">Ghi ch?? ph???i nh??? h??n 10 k?? t???</div>
                            </div>
                          </md-input-container>

                        </div>
                        
                      </div>  
                      
                      <button ng-disabled="projectForm.$invalid" type="submit" class="btn btn-info m-r-xs m-b-xs form-control">
                        Nh???p ????n ?????t
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
