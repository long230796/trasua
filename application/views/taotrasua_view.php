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
              <md-content layout-padding style="background-color: #ffff" ng-init="themnguyenlieu(1)">
                <form id="formTaoTrasua" name="projectForm" action="" method="POST" enctype="multipart/form-data">
                    <div layout="row" >
                      <md-input-container flex="100">
                        <label>Nhập tên sản phẩm</label>
                        <input md-maxlength="50" required  name="tenloai" ng-model="tenloai">
                        <div ng-messages="projectForm.tenloai.$error">
                          <div ng-message="required">Bắt buộc</div>
                          <div ng-message="md-maxlength">Ghi chú phải nhỏ hơn 10 kí tự</div>
                        </div>
                      </md-input-container>
                    </div>

                    <div layout="row" >
                      <md-input-container flex="100">
                        <label>Mô tả sản phẩm</label>
                        <textarea required md-maxlength="500" name="mota" ng-model="mota"></textarea>
                        <div ng-messages="projectForm.mota.$error">
                          <div ng-message="required">Bắt buộc</div>
                          <div ng-message="md-maxlength">Mô tả phải nhỏ hơn 500 kí tự</div>
                        </div>
                      </md-input-container>
                    </div>

                    <div layout="row" >
                      <md-input-container flex="100">
                        <label>Giá sản phẩm</label>
                        <input type="number" required name="gia" min="10000" step="any" ng-model="gia">
                        <div ng-messages="projectForm.gia.$error">
                          <div ng-message="required">Bắt buộc</div>
                          <div ng-message="md-maxlength">Ghi chú phải nhỏ hơn 10 kí tự</div>
                          <div ng-message="min">Giá sản phẩm phải lớn hơn hoặc bằng 10000</div>
                        </div>
                      </md-input-container>
                    </div>
                    <div layout="row" >
                      <md-input-container flex="100">
                        <label>Trạng thái</label>
                        <md-select ng-model="trangthai" required name="trangthai">
                          <md-option  value="1">Công khai</md-option>
                          <md-option  value="0">Riêng tư</md-option>
                        </md-select>
                        <div ng-messages="projectForm.trangthai.$error">
                          <div ng-message="required">Bắt buộc.</div>
                        </div>
                      </md-input-container>
                    </div>

                    
                    <!-- <md-content class="md-padding" layout="column">
                      <h2 class="md-title">Use the default chip template.</h2>
                      <md-select ng-model="testFunction" required name="testFunction">
                        <md-option ng-click="displayTest()" value="public">Công khai</md-option>
                        <md-option ng-click="displayTest()" value="private">Riêng tư</md-option>
                      </md-select>
                      <md-chips ng-model="fruitNames" readonly="readonly" md-removable="removable">
                      </md-chips>
                      <br/>
                    </md-content> -->

                    <md-content class="md-padding autocomplete p-a-0 m-t-3" layout="column" style="background-color: #ffff">
                        <label id="toLabel">Tạo size</label>
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
                            placeholder="Gõ tên size"
                            secondary-placeholder="Thêm size mới"
                            input-aria-label="Intended Recipients">
                        </md-contact-chips>

                        <md-list class="fixedRows" ng-show="false">
                          <md-subheader class="md-no-sticky">Size gợi ý</md-subheader>
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
                    

                    <div layout="row" class="m-t-2">
                      <md-input-container flex="50">
                        <label>Số lượng nguyên liệu </label>
                        <input type="number"  min="1" max="10" ng-model="soluongnl"  >
                        <div ng-messages="projectForm.soluongnl.$error">
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
                      <p class="p-b-0 m-t-2"><b>Nguyên liệu {{$index+1}}</b></p>
                      
                      <div layout="row">
                          <md-input-container flex="20" >
                            <label>Tên nguyên liệu</label>
                            <md-select name="nguyenlieucu[]" required ng-model="nguyenlieucu"  ng-disabled="nguyenlieumoi" >
                              <?php foreach ($mangdulieu["nguyenlieu"] as $key ): ?>
                                <md-option ng-click='setDonvi(<?php echo json_encode($mangdulieu['nguyenlieu'])?>, "<?php echo $key['MANGUYENLIEU'] ?>", data)' value="<?php echo $key["MANGUYENLIEU"] ?>"><?php echo $key["TENNL"] ?></md-option>

                              <?php endforeach ?>
                              
                            </md-select>
                            <div ng-messages="projectForm.nguyenlieucu.$error">
                              <div ng-message="required">Bắt buộc</div>
                            </div>
                          </md-input-container>

                          <md-input-container flex="33">
                            <label>Đơn vị</label>
                            <input readonly  class="donvi" type="text" required name="donvi[]" value=" ">
                            <!-- <md-select class="donvi" ng-disabled="!nguyenlieucu" name="donvi[]" required >

                              <md-option value="lit">lit</md-option>
                              <md-option value="kilogram">kilogram</md-option>

                            </md-select> -->
                            <div ng-messages="projectForm.donvi.$error">
                              <div ng-message="required">Bắt buộc</div>
                              <div ng-message="md-maxlength">Đơn vị phải nhỏ hơn 10 kí tự</div>
                            </div>
                          </md-input-container>

                          <md-input-container  flex="33">
                            <label>Số lượng</label>
                            <input ng-disabled="!nguyenlieucu" type="number" step="any" min="0.1" max="1" required ng-model="soluong" name="soluong[]" >
                            <div ng-messages="projectForm.soluong.$error">
                              <div ng-message="required">Bắt buộc</div>
                              <div ng-message="min">Tối thiểu 0.1 kg</div>
                              <div ng-message="max">Tối đa 1 kg</div>
                            </div>
                          </md-input-container>
                          <md-input-container flex="33">
                            <label>Ghi chú</label>
                            <input ng-disabled="!nguyenlieucu" md-maxlength="50"  name="note[]" ng-model="note">
                            <div ng-messages="projectForm.note.$error">
                              <div ng-message="required">Bắt buộc</div>
                              <div ng-message="md-maxlength">Ghi chú phải nhỏ hơn 10 kí tự</div>
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
                      
                      <fieldset class="form-group">
                        <label for="username">
                          Thêm ảnh
                        </label>
                        <span class=" text-xs-left form-control btn btn-success btn-icon fileinput-button m-b-1">
                          <i class="material-icons">add</i>
                          <span class="text-xs-right">Select files...</span>
                          <!-- The file input field used as target for the file upload widget -->
                          <!-- <input id="fileupload" type='file' multiple ng-file='uploadfiles'> -->
                          <input required type="file" id="avatar" aria-describedby="emailHelp" placeholder="Enter email" name="avatar">
                        </span> 
                      </fieldset>
                      <input class="size" type="hidden" name="sizes[]">
                      <input class="size" type="hidden" name="sizes[]">
                      <input class="size" type="hidden" name="sizes[]">
                      <input class="size" type="hidden" name="sizes[]">
                      <button ng-disabled="projectForm.$invalid" type="button" onclick="getSize()" class="btn btn-info m-r-xs m-b-xs form-control">
                        Thêm
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
      function getSize(text) {
        elmnClass = document.getElementsByClassName("md-contact-name")
        if (elmnClass.length) {
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

        } else {
          alert("Vui lòng chọn size")
          return
        }
      }

      function test(text) {
        
        // body...
      }
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
