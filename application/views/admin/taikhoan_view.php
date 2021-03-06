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
    <link rel="stylesheet" href="<?php echo base_url(); ?>/milestone/vendor/sweetalert/dist/sweetalert.css">
    <!-- end page stylesheets -->

    <!-- build:css({.tmp,app}) styles/app.min.css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/milestone/vendor/bootstrap/dist/css/bootstrap.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>/milestone/vendor/pace/themes/blue/pace-theme-minimal.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>/milestone/vendor/font-awesome/css/font-awesome.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>/milestone/vendor/animate.css/animate.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>/milestone/styles/app.css" id="load_styles_before"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>/milestone/styles/app.skins.css"/>
    <!-- endbuild -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>milestone/styles/app.skins.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>vendor/angular-material.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>1.css">
  </head>
  <body ng-app="myApp">

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
            
            <div class="navbar-search navbar-item">
              <form class="search-form">
                <i class="material-icons">search</i>
                <input class="form-control" ng-model="search" type="text" placeholder="T??m ki???m t??i kho???n" />
              </form>
            </div>
           
          </div>
        </nav>
        <!-- /top header -->

        <!-- main area -->
        <div class="content-view">
          <div ng-controller="managedAccount" layout="column" ng-cloak>
            <div class="m-l-3 m-r-3">
              
              </md-input-container>
              <md-content layout-padding style="background-color: #ffff">
                <table class="table table-hover" ng-init='taikhoan=<?php echo json_encode($mangdulieu['taikhoan'])?>'>
                      <thead class="thead-default">
                        <tr>
                          <th>
                            #
                          </th>
                          <th>
                            T??i kho???n
                          </th>
                          <th>
                            M?? nh??n vi??n
                          </th> 
                          <th>
                            Vai tr??
                          </th>
                          <th>
                            B??? ph???n
                          </th>
                          <th>
                            Tr???ng th??i
                          </th>
                          <th>
                            Ng??y t???o
                          </th>
                          <th>
                            H??nh ?????ng
                          </th>
                        </tr>
                      </thead>
                      <tbody >
                        <tr ng-repeat="acc in taikhoan | filter:search" ng-init="acc.hienthi='true'" id="angularPart">
                          <th scope="row">
                            {{$index}}
                          </th>
                          <td>
                            {{acc.TAIKHOAN}}
                          </td>
                          <td>
                            {{acc.NHANVIEN.MANV}}
                          </td>
                          <td ng-show="acc.hienthi">
                            {{acc.VAITRO}}
                          </td>
                          <td ng-show="acc.hienthi">
                            {{acc.BOPHAN}}
                          </td>
                          <td class="p-t-0" ng-show="!acc.hienthi">
                            <md-input-container class="m-b-0 m-t-0">
                            
                              <md-select style="color: rgba(0, 0, 0, 1)!important;" ng-model="acc.VAITROMOI" >
                                <md-option ng-click="displayDone(acc)" ng-selected="{{ acc.VAITRO === 'Qu???n l??' ? 'true' : 'false' }}" value="Qu???n l??">qu???n l??</md-option>
                                <md-option ng-click="displayDone(acc)" ng-selected="{{ acc.VAITRO === 'Nh??n vi??n  ' ? 'true' : 'false' }}" value="Nh??n vi??n">Nh??n vi??n</md-option>
                              </md-select>
                            </md-input-container>
                          </td>
                          <td class="p-t-0" ng-show="!acc.hienthi">
                            <md-input-container class="m-b-0 m-t-0">
                            
                              <md-select ng-model="acc.BOPHANMOI" >
                                <?php foreach ($mangdulieu["bophan"] as $key => $value): ?>
                                  <md-option ng-click="displayDone(acc)" value="<?php echo $value["MABP"] ?>"><?php echo $value["TENBOPHAN"] ?></md-option>
                                  
                                <?php endforeach ?>
                              </md-select>
                            </md-input-container>
                          </td>
                          <td>
                            {{acc.TRANGTHAI}}
                          </td>
                          <td>
                            {{acc.NGAYTAO}}
                          </td>
                          <td ng-init="acc.DONE=''">
                            <!-- ch???nh s???a -->
                            <a href="#" ng-click="display(acc)" >
                              <i class="material-icons text-primary">build</i>
                            </a>
                            <!-- kh??a -->
                            <a href="#" ng-show="{{acc.TRANGTHAI}}">
                              <i class="material-icons text-danger demo5" ng-click="getMatk(acc.MATAIKHOAN)">lock</i>
                              <script src="<?php echo base_url(); ?>/milestone/scripts/ui/alert.js"></script>
                              
                            </a>
                            <!-- m??? kh??a -->
                            <a href="#" ng-show="!{{acc.TRANGTHAI}}">
                              <i class="material-icons text-success demo55" ng-click="getMatk(acc.MATAIKHOAN)">lock_open</i>
                              <script src="<?php echo base_url(); ?>/milestone/scripts/ui/alert.js"></script>
                              
                            </a>
                            <!-- x??a -->
                            <a href="#">
                              <i class="material-icons text-success deleteTaikhoan" ng-click="getMatk(acc.MATAIKHOAN)">delete</i>
                              <script src="<?php echo base_url(); ?>/milestone/scripts/ui/alert.js"></script>
                              
                            </a>

                            <!-- done -->
                            <a ng-show="acc.DONE" href="#"  >
                              <i class="material-icons text-primary demo66" ng-click="getAccount(acc)">done</i>
                              <script src="<?php echo base_url(); ?>/milestone/scripts/ui/alert.js"></script>
                            </a>

                          </td>
                          
                          
                        </tr>
                      </tbody>
                    </table>
                   
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
