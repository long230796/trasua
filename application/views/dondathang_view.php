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
            <!-- <div class="card m-b-1 m-l-3 m-r-3">
              <div class="card-header no-bg b-a-0">
                Nh???p s??? l?????ng nguy??n li???u
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
            <div class="m-l-3 m-r-3">
              <md-content layout-padding style="background-color: #ffff" ng-init="themnguyenlieu(1)">
                <div layout="row" >
                  <md-input-container flex="50" class="m-b-0">
                    <label>S??? l?????ng nguy??n li???u ?????t</label>
                    <input type="text" ng-model="soluongnl">
                  </md-input-container>
                  <md-input-container flex="50" class="m-b-0">
                    <button type="button" class="btn btn-default m-r-xs m-b-xs form-control" ng-click="themnguyenlieu(soluongnl)">
                      Ch???n
                    </button>
                  </md-input-container>
                </div>
                <form name="projectForm" action="" method="POST" >
                    <div layout="row">
                      <md-input-container flex="50">
                        <label>Ch???n nh?? cung c???p</label>
                        <md-select name="nhacungcapcu" ng-model="nhacungcapcu" ng-disabled="nhacungcapmoi">
                          <?php foreach ($mangdulieu["nhacungcap"] as $key ): ?>
                            <md-option value="<?php echo $key["TEN"] . "_" .  $key["MANHACUNGCAP"]?>"><?php echo $key["TEN"] ?></md-option>
                          <?php endforeach ?>
                          <md-option value=""></md-option>
                        </md-select>
                        <div ng-messages="projectForm.nhacungcapcu.$error">
                          <div ng-message="required">B???t bu???c</div>
                        </div>
                      </md-input-container>
                      <!-- <md-input-container flex="50" ng-show="nhacungcapmoi">
                      </md-input-container> -->
                      <md-input-container flex="50">
                        <label>Th??m nh?? cung c???p</label>
                        <input  name="nhacungcapmoi" ng-model="nhacungcapmoi" ng-disabled="nhacungcapcu">
                        <div ng-messages="projectForm.nhacungcapmoi.$error">
                          <div ng-message="required">B???t bu???c</div>
                        </div>
                      </md-input-container>
                    </div>

                    <div layout="row">
                      <div class="col-sm-6 push-sm-6" ng-if="nhacungcapmoi">
                          <div class="row">
                            <md-input-container class="md-block">
                              <label>S??? ??i???n tho???i</label>
                              <input required ng-pattern="/^[0-9]{10}$/" md-maxlength="10" name="sodienthoainhacungcap" ng-model="sodienthoainhacungcap">
                              <div ng-messages="projectForm.sodienthoainhacungcap.$error">
                                <div ng-message="required">B???t bu???c</div>
                                <div ng-message="md-maxlength">S??? ??i???n tho???i t???i ??a 10 s???</div>
                                <div ng-message="pattern" class="my-message">S??? ??i???n tho???i kh??ng kh??? d???ng
                                </div>
                              </div>
                            </md-input-container>
                          </div>
                          <div class="row">
                            <md-input-container class="md-block">
                              <label>?????a ch???</label>
                              <input required md-maxlength="50" name="diachinhacungcap" ng-model="diachinhacungcap">
                              <div ng-messages="projectForm.diachinhacungcap.$error">
                                <div ng-message="required">B???t bu???c</div>
                                <div ng-message="md-maxlength">?????a ch??? nh???p ph???i nh??? h??n 50 k?? t???</div>
                              </div>
                            </md-input-container>
                          </div>
                      </div>
                    </div>


                    <div ng-show="{{dataset}}" ng-repeat="data in dataset">
                      <p class="p-b-0"><b>Nguy??n li???u {{$index+1}}</b></p>
                      <div layout="row">
                        <md-input-container flex="50" >
                          <label>T??n nguy??n li???u</label>
                          <md-select name="nguyenlieucu[]" ng-model="nguyenlieucu" required ng-disabled="nguyenlieumoi" >
                            <?php foreach ($mangdulieu["nguyenlieu"] as $key ): ?>
                              <md-option value="<?php echo $key["TENNL"] . "_" . $key["MANGUYENLIEU"] ?>"><?php echo $key["TENNL"] ?></md-option>
                            <?php endforeach ?>
                            <md-option value=""></md-option>
                          </md-select>
                          <div ng-messages="projectForm.nguyenlieucu.$error">
                            <div ng-message="required">B???t bu???c</div>
                          </div>
                        </md-input-container>
                        <md-input-container flex="50">
                          <label>Th??m nguy??n li???u m???i</label>
                          <input name="nguyenlieumoi[]" md-maxlength="30" ng-model="nguyenlieumoi" ng-disabled="nguyenlieucu">
                          <div ng-messages="projectForm.nguyenlieumoi.$error">
                            <div ng-message="required">B???t bu???c</div>
                            <div ng-message="md-maxlength">T??n nguy??n li???u ph???i nh??? h??n 30 k?? t???</div>
                          </div>
                        </md-input-container>
                      </div>


                      <div layout="row">
                          <md-input-container flex="33">
                            <label>S??? l?????ng</label>
                            <input required type="number" min="1" max="50" step="any"  name="soluong[]" ng-model="soluong">
                            <div ng-messages="projectForm.soluong.$error">
                              <div ng-message="required">B???t bu???c</div>
                              <div ng-message="min">S??? l?????ng ?????t t???i thi???u ph???i l???n h??n ho???c b???ng 1 kg</div>
                              <div ng-message="max">S??? l?????ng ?????t t???i ??a ph???i nh??? h??n ho???c b???ng 50 kg</div>
                            </div>
                          </md-input-container>
                          <md-input-container flex="33">
                            <label>????n v???</label>
                            <md-select name="donvi[]" ng-model="donvi" required  >
                              <md-option value="kg">Kilogram</md-option>
                              <md-option value="l??t">lit</md-option>
                            </md-select>
                            <div ng-messages="projectForm.donvi.$error">
                              <div ng-message="required">B???t bu???c</div>
                              <div ng-message="md-maxlength">????n v??? ph???i nh??? h??n 10 k?? t???</div>
                            </div>
                          </md-input-container>
                          <md-input-container flex="33">
                            <label>Ghi ch??</label>
                            <input md-maxlength="50"  name="note[]" ng-model="note">
                            <div ng-messages="projectForm.note.$error">
                              <div ng-message="required">B???t bu???c</div>
                              <div ng-message="md-maxlength">Ghi ch?? ph???i nh??? h??n 50 k?? t???</div>
                            </div>
                          </md-input-container>
                          <md-input-container >
                            <i type="button" ng-click="themnguyenlieu($index+2)" class="material-icons text-info">add</i>
                          </md-input-container>
                          <md-input-container ng-show="$index" >
                            <i type="button" ng-click="xoanguyenlieu(dataset, data)" class="material-icons text-danger">close</i>
                          </md-input-container>

                        </div>
                        
                      </div>  
                      
                      <button ng-disabled="projectForm.$invalid" type="submit" class="btn btn-outline-info m-r-xs m-b-xs form-control">
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
