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
    <link rel="stylesheet" href="<?php echo base_url(); ?>milestone/vendor/sweetalert/dist/sweetalert.css">

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
                <!-- so luong tra sua -->
                <!-- <div layout="row" >
                  <md-input-container flex="50" class="m-b-0">
                    <label>S??? l?????ng tr?? s???a</label>
                    <input type="text" ng-model="soluong">
                  </md-input-container>
                  <md-input-container flex="50" class="m-b-0">
                    <button type="button" class="btn btn-default m-r-xs m-b-xs form-control" ng-click="themtrasua(soluong)">
                      Ch???n
                    </button>
                  </md-input-container>
                </div> -->

                 
                <div class="row" ng-init="displayCol12=1" id="editProduct">
                  <div ng-show="displayCol12" class="col-sm-12 col-md-6 mb-4" ng-repeat="ts in loaitrasua | filter:search" >
                    <img src="{{ts.HINHANH}}" class="img-fluid" alt="Responsive image">
                  </div>
                  <div ng-show="displayCol12" class="col-sm-12 col-md-6 mb-4" ng-repeat="ts in loaitrasua | filter:search" >
                    <div class="nameProduct">
                      <div class="d-flex">
                        <h5 class="card-title flex-grow-1 m-b-0">
                            {{ts.TENLOAI}}
                        </h5>
                        <a ng-click="displayForm(displayCol12)" href="#">
                          <i class="material-icons text-primary">mode_edit</i>
                        </a>
                        <a href="#" ng-if="ts.TRANGTHAI">
                          <i class="material-icons text-danger LockProduct" ng-click="getMaloai(ts.MALOAITRASUA)" >lock_outline</i>
                          <script src="<?php echo base_url(); ?>milestone/scripts/ui/alert.js"></script>
                        </a>
                        <a href="#" ng-if="!ts.TRANGTHAI">
                          <i class="material-icons text-success UnlockProduct" ng-click="getMaloai(ts.MALOAITRASUA)">lock_open</i>
                          <script src="<?php echo base_url(); ?>milestone/scripts/ui/alert.js"></script>
                        </a>
                        <a href="#">
                          <i class="material-icons text-danger DeleteProduct" ng-click="getMaloai(ts.MALOAITRASUA)">delete</i>
                          <script src="<?php echo base_url(); ?>milestone/scripts/ui/alert.js"></script>
                        </a>
                      </div>
                      <span class="plan-price-symbol text-warning"><b>Gi??: {{ts.GIA}}</b></span>
                    </div>
                    <div class="descripProduct mt-4">
                      <p class="card-text mb-1">
                        {{ts.MOTA}}
                      </p>
                      <span class="plan-price-symbol text-dark"><b>M?? s???n ph???m: {{ts.MALOAITRASUA}}</b></span>
                      <br>
                      <span class="plan-price-symbol text-danger"><b>Tr???ng th??i: {{ts.TRANGTHAITEXT}}</b></span>
                      <div class="d-flex  mt-3">
                        <span class="card-text mr-2" ng-repeat="size in ts.CTSIZE">
                          {{size.TENSIZE}}
                        </span>
                      </div>
                    </div>
                    <div class="recipe p-0 mt-3 col-6">
                      <span class="plan-price-symbol">Nguy??n li???u: </span>
                      <table class="table table-borderless">
                        <thead >
                          <tr ng-repeat="ctloai in ts.CTLOAITRASUA" >
                            <th class="pl-0" scope="col">{{ctloai.TENNL}}</th>
                            <td class="pl-0" scope="col">{{ctloai.LIEULUONG}}</td>
                          </tr>
                        </thead>
                      </table>
                    </div>

                  </div>

                  <div ng-show="!displayCol12" class="w-100 d-flex justify-content-center" ng-repeat="ts in loaitrasua | filter:search" >
                    <img src="{{ts.HINHANH}}" style="height: 400px" class="img-fluid" alt="Responsive image">
                  </div>

                  <div ng-show="!displayCol12" class="col-sm-12 col-md-12 mb-4">
                    <md-content layout-padding style="background-color: #ffff">
                      <form name="projectForm" ng-repeat="ts in loaitrasua" id="formTaoTrasua"  action="" method="POST" enctype="multipart/form-data">
                          <div layout="row">
                            <md-input-container flex="100">
                              <label>Nh???p t??n s???n ph???m</label>
                              <input type="hidden" name="tenloaicu" value="{{ts.TENLOAI}}">
                              <input type="hidden" ng-init="tenloai=ts.TENLOAI">
                              <input  name="tenloai" md-maxlength="50" required ng-model="tenloai" >
                              <input  type="hidden" name="maloaitrasua" value="{{ts.MALOAITRASUA}}">
                              <div ng-messages="projectForm.tenloai.$error">
                                <div ng-message="md-maxlength">T??n s???n ph???m ph???i nh??? h??n 50 k?? t???</div>
                                <div ng-message="required">B???t bu???c</div>
                                <div ng-message="md-maxlength">Ghi ch?? ph???i nh??? h??n 10 k?? t???</div>
                              </div>
                            </md-input-container>
                          </div>

                          <div layout="row" >
                            <md-input-container flex="100">
                              <label>M?? t??? s???n ph???m</label>
                              <input name="motacu" type="hidden" value="{{ts.MOTA}}">
                              <textarea style="height: 100px;" maxlength="500" name="mota" required>{{ts.MOTA}}</textarea>
                              <div ng-messages="projectForm.mota.$error">
                                <div ng-message="maxlength">M?? t??? ph???i nh??? h??n 100 k?? t???</div>
                                <div ng-message="required">B???t bu???c</div>
                                <div ng-message="md-maxlength">Ghi ch?? ph???i nh??? h??n 10 k?? t???</div>
                              </div>
                            </md-input-container>
                          </div>

                          <div layout="row">
                            <md-input-container flex="100">
                              <label>Gi?? s???n ph???m</label>
                              <input type="hidden" ng-init="gia=parseInt(ts.GIA)">
                              <input type="number" required name="gia" min="10000" step="any" ng-model="gia">
                              <input type="hidden" name="giacu" ng-model="giacu" ng-value="ts.GIA">
                              <div ng-messages="projectForm.gia.$error">
                                <div ng-message="required">B???t bu???c</div>
                                <div ng-message="md-maxlength">Ghi ch?? ph???i nh??? h??n 10 k?? t???</div>
                              </div>
                            </md-input-container>
                          </div>
                          <!-- <div layout="row" >
                            <md-input-container flex="100">
                              <label>Tr???ng th??i</label>
                              <input type="hidden" name="trangthaicu" value="{{ts.TRANGTHAI}}">
                              <md-select ng-model="ts.TRANGTHAI" name="trangthai">
                                <md-option ng-selected="{{ts.TRANGTHAI === 1 ? 'true' : 'false'}}" value="1">C??ng khai</md-option>
                                <md-option ng-selected="{{ts.TRANGTHAI === 0 ? 'true' : 'false'}}" value="0">Ri??ng t??</md-option>
                              </md-select>
                              <div ng-messages="projectForm.trangthai.$error">
                                <div ng-message="required">B???t bu???c.</div>
                              </div>
                            </md-input-container>
                          </div> -->

                          

                          <md-content class="md-padding autocomplete p-a-0 m-t-3" layout="column" style="background-color: #ffff">
                              <label id="toLabel">T???o size</label>
                              <md-contact-chips
                                  ng-model="contacts"
                                  name="sizes"
                                  ng-change="onModelChange(contacts)"
                                  md-contacts="querySearch($query)"
                                  md-contact-name="name"
                                  md-contact-image="image"
                                  md-require-match="true"
                                  md-separator-keys="keys"
                                  md-highlight-flags="i"
                                  placeholder="G?? t??n size"
                                  secondary-placeholder="Th??m size m???i"
                                  input-aria-label="Intended Recipients">
                              </md-contact-chips>
                              
                              <md-list class="fixedRows" ng-show="false">
                                <md-subheader class="md-no-sticky">Size g???i ??</md-subheader>
                                <md-list-item class="md-2-line contact-item" ng-repeat="(index, contact) in allContacts"
                                    ng-if="contacts.indexOf(contact) < 0">
                                  <img ng-src="{{contact.tempImage()}}" class="md-avatar" alt="{{contact.name}}" />
                                  <div class="md-list-item-text compact">
                                    <h3>{{contact.name}}</h3>
                                    <!-- <p>{{contact.email}}</p> -->
                                  </div>
                                </md-list-item>
                                <md-list-item class="md-2-line contact-item selected"
                                              ng-repeat="(index, contact) in contacts">
                                  <img ng-src="{{contact.tempImage()}}" class="md-avatar" alt="{{contact.name}}" />
                                  <div class="md-list-item-text compact">
                                    <h3>{{contact.name}}</h3>
                                    <!-- <p>{{contact.email}}</p> -->
                                  </div>
                                </md-list-item>
                              </md-list>
                            </md-content>
                          

                                         

                          <div ng-repeat="ts in loaitrasua">
                            <div ng-repeat="ctloai in ts.CTLOAITRASUA">
                              <p class="p-b-0 m-t-2"><b>Nguy??n li???u {{$index+1}}</b></p>
                              <p class="p-b-0 m-t-2"><b>Nguy??n li???u {{ctloai.TENNL}}</b></p>
                              
                              <div layout="row">
                                  <md-input-container flex="20" >
                                    <label>T??n nguy??n li???u</label>
                                    <md-select  name="nguyenlieucu[]" ng-model="nguyenlieucu" required ng-disabled="nguyenlieumoi" >
                                      <?php foreach ($mangdulieu["nguyenlieu"] as $key ): ?>
                                        <md-option value="<?php echo $key["MANGUYENLIEU"] ?>" ng-selected="{{ ctloai.TENNL === '<?php echo $key["TENNL"] ?>' ? 'true' : 'false' }}" ng-click='changeDonvi(ctloai, <?php  echo json_encode($key) ?>)'><?php echo $key["TENNL"] ?></md-option>
                                      <?php endforeach ?>
                                    </md-select>
                                    <div ng-messages="projectForm.nguyenlieucu.$error">
                                      <div ng-message="required">B???t bu???c</div>
                                    </div>
                                  </md-input-container>

                                  <md-input-container flex="33">
                                    <label>S??? l?????ng</label>
                                    <input type="hidden" ng-init="soluong=parseInt(ctloai.LIEULUONG)">
                                    <input type="number" min="0.1" max="1" step="any" required ng-model="soluong"  name="soluong[]" >
                                    <div ng-messages="projectForm.soluong.$error">
                                      <div ng-message="required">B???t bu???c</div>
                                    </div>
                                  </md-input-container>
                                  <md-input-container flex="33">
                                    <label>????n v???</label>
                                   <!--  <md-select name="donvi[]" ng-model="donvi" required >
                                      <md-option ng-selected="true" value="{{ctloai.DONVI}}">{{ctloai.DONVI}}</md-option>
                                    </md-select> -->
                                    <input readonly name="donvi[]" ng-model="ctloai.DONVI">
                                    <div ng-messages="projectForm.donvi.$error">
                                      <div ng-message="required">B???t bu???c</div>
                                      <div ng-message="md-maxlength">????n v??? ph???i nh??? h??n 10 k?? t???</div>
                                    </div>
                                  </md-input-container>
                                  <md-input-container flex="33">
                                    <label>Ghi ch??</label>
                                    <input md-maxlength="50" name="note[]" ng-model="ctloai.GHICHU">
                                  </md-input-container>
                                  <md-input-container >
                                    <i type="button" ng-click="addNl(ts.CTLOAITRASUA, $index)" class="material-icons text-info">add</i>
                                  </md-input-container>
                                  <md-input-container ng-show="$index" >
                                    <i type="button" ng-click="delNl(ts.CTLOAITRASUA, $index)" class="material-icons text-danger">close</i>
                                  </md-input-container>
                                </div>
                            </div>
                            
                              
                          </div>  
                            <fieldset class="form-group">
                              <label for="username">
                                Th??m ???nh
                              </label>
                              <span class=" text-xs-left form-control btn btn-success btn-icon fileinput-button m-b-1">
                                <i class="material-icons">add</i>
                                <span class="text-xs-right">Select files...</span>
                                <!-- The file input field used as target for the file upload widget -->
                                <!-- <input id="fileupload" type='file' multiple ng-file='uploadfiles'> -->
                                <input type="file" id="avatar" aria-describedby="emailHelp" placeholder="Enter email" name="avatar">
                              </span> 
                            </fieldset>
                            <input class="size" type="hidden" name="sizes[]">
                            <input class="size" type="hidden" name="sizes[]">
                            <input class="size" type="hidden" name="sizes[]">
                            <input class="size" type="hidden" name="sizes[]">
                            <div class="row">
                              <div class="col-sm-12 col-md-6">
                                <button ng-disabled="projectForm.$invalid" onclick="getSize()" class="md-raised md-primary md-button md-ink-ripple form-control" type="button" ng-transclude="" aria-label="Primary"><span class="ng-scope">S???a</span><div class="md-ripple-container" style=""></div></button>
                              </div>
                              <div class="col-sm-12 col-md-6">
                                <button class="md-raised md-primary md-button md-ink-ripple form-control" type="button" ng-transclude="" ng-click="displayForm(displayCol12)" aria-label="Primary"><span class="ng-scope">H???y</span><div class="md-ripple-container" style=""></div></button>
                                
                              </div>
                                
                            </div>
                          </div>
                        </div>
                      </form>
                    </md-content>
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

    <script type="text/javascript">
      function getSize(text) {
        elmnClass = document.getElementsByClassName("md-contact-name")
        for (i = 0; i < elmnClass.length; i++) {
          temp = elmnClass[i].innerText
          

          allSize = <?php echo $mangdulieu['sizecosan'] ?>

          for (arr of allSize) {
            if (arr.TENSIZE == temp) {
              temp = elmnClass[i].innerText.split(" ")
              values = temp[0] + temp[1]
              document.getElementsByClassName("size")[i].value = values + "_" + arr.MASIZE
            }
          }
          // masize = document.getElementsByClassName("masize")[i].value
          // document.getElementsByClassName("size")[i].value = values + "_" + masize
        }
        document.getElementById("formTaoTrasua").submit()
      }

      function test(text) {
        
        // body...
      }
    </script>
    <script type="text/javascript" src="<?php echo base_url(); ?>vendor/bootstrap.js"></script>

    <?php include('C:\xampp\htdocs\trasua\application\views\pages\scripts_view.php') ?>

    
    
  </body>
</html>
