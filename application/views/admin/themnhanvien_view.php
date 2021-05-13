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
    
    <title>Thêm nhân viên</title>

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
          <div ng-controller="managedAccount" layout="column" ng-cloak>
            <div class="m-l-3 m-r-3">
              <md-content layout-padding style="background-color: #ffff">
                <form name="projectForm" action="" method="POST" enctype="multipart/form-data">
                    <div layout="row" >
                      <md-input-container flex="100">
                        <label>Tài khoản</label>
                        <input minlength="10" maxlength="100" ng-pattern="/^.+@.+\..+$/" placeholder="Email (required)" md-maxlength="25" type="email" required name="taikhoan" ng-model="taikhoan">
                        <div ng-messages="projectForm.taikhoan.$error">
                          <div ng-message="required">Bắt buộc</div>
                          <div ng-message-exp="['required', 'minlength', 'maxlength', 'pattern']">
                            Độ dài email từ 10 đến 100 kí tự và phải trông như một địa chỉ e-mail.
                          </div>
                          <div ng-message="md-maxlength">Tài khoản phải nhỏ hơn 25 kí tự</div>
                        </div>
                      </md-input-container>
                    </div>

                    <div layout="row" >
                      <md-input-container flex="100" class="m-t-0">
                        <label>Mật khẩu</label>
                        <input required type="password" minlength="5" md-maxlength="20" name="matkhau" ng-model="matkhau">
                        <div ng-messages="projectForm.matkhau.$error">
                          <div ng-message="required">Bắt buộc</div>
                          <div ng-message="md-maxlength">Mật khẩu phải nhỏ hơn 20 kí tự</div>
                          <div ng-message="minlength">Mật khẩu phải lớn hơn 5 kí tự</div>
                        </div>
                      </md-input-container>
                    </div>

                    <div layout="row" >
                      <md-input-container flex="100" class="m-t-0">
                        <label>Vai trò</label>
                        <md-select ng-model="vaitro" required name="vaitro">
                          <md-option ng-click='getEmptyBophan(<?php echo json_encode($mangdulieu["bophan"])?>)' value="1">Quản lí</md-option>
                          <md-option ng-click='getBophan(<?php echo json_encode($mangdulieu["bophan"])?>)'  value="2">Nhân viên</md-option>
                        </md-select>
                        <div ng-messages="projectForm.vaitro.$error">
                          <div ng-message="required">Bắt buộc.</div>
                        </div>
                      </md-input-container>
                    </div>
                    <div layout="row" >
                      <md-input-container flex="100">
                        <label>Trạng thái</label>
                        <md-select ng-model="trangthai" required name="trangthai">
                          <md-option  value="1">Mở</md-option>
                          <md-option  value="0">Khóa</md-option>
                        </md-select>
                        <div ng-messages="projectForm.trangthai.$error">
                          <div ng-message="required">Bắt buộc.</div>
                        </div>
                      </md-input-container>
                    </div>

                    <div layout="row">
                      <md-input-container flex="50">
                        <label>Họ</label>
                        <input ng-pattern ="/^[a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂẾưăạảấầẩẫậắằẳẵặẹẻẽềềểếỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s\W|_]+$/"  type="text" md-maxlength="20" name="ho" ng-model="ho" required >
                        <div ng-messages="projectForm.ho.$error">
                          <div ng-message="required">Bắt buộc</div>
                          <div ng-message="md-maxlength">Họ phải nhỏ hơn 15 kí tự</div>
                          <div ng-message="pattern" class="my-message">Sai định dạng
                          </div>
                        </div>
                      </md-input-container>
                      <md-input-container flex="50">
                        <label>Tên</label>
                        <input ng-pattern="/^[a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂẾưăạảấầẩẫậắằẳẵặẹẻẽềềểếỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s\W|_]+$/" type="text" md-maxlength="7" name="ten" ng-model="ten" required >
                        <div ng-messages="projectForm.ten.$error">
                          <div ng-message="required">Bắt buộc</div>
                          <div ng-message="md-maxlength">Tên phải nhỏ hơn 7 kí tự</div>
                          <div ng-message="pattern" class="my-message">Sai định dạng
                          </div>
                        </div>
                      </md-input-container>
                    </div>  


                    <div layout="row">
                      <md-input-container flex="50">
                        <label>Số điện thoại</label>
                        <input required ng-pattern="/^[0-9]{10}$/" md-maxlength="10"  name="sdt" ng-model="sdt" >
                        <div ng-messages="projectForm.sdt.$error">
                          <div ng-message="required">Bắt buộc</div>
                          <div ng-message="md-maxlength">Số điện thoại tối đa 10 số</div>
                          <div ng-message="pattern" class="my-message">Số điện thoại không khả dụng
                          </div>
                        </div>
                      </md-input-container>
                      <md-input-container  flex="50">
                        <label>Bộ phận</label>
                        <md-select ng-disabled="!vaitro" ng-model="bophan" required name="bophan">
                          <md-option ng-repeat="emptyBophan in allBophan" value="{{emptyBophan.MABP}}">{{emptyBophan.TENBOPHAN}}</md-option>
                        </md-select>
                        <div ng-messages="projectForm.bophan.$error">
                          <div ng-message="required">Bắt buộc.</div>
                        </div>
                      </md-input-container>
                    </div>                   

                    <!--  --> 
                      
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

                      <button ng-disabled="projectForm.$invalid" type="submit" class="btn btn-info m-r-xs m-b-xs form-control">
                        Thêm nhân viên
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
