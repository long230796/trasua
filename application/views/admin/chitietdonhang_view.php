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
    <link href="<?php echo base_url(); ?>progress.css" media="all" rel="stylesheet" type="text/css" />
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
            <div class="navbar-item navbar-spacer-right navbar-heading hidden-md-down" href="#">
              <button type="button" class="btn btn-success btn-icon btn-sm" onclick='window.print()'>
                In h??a ????n
                <i class="material-icons">print</i>
              </button> 
            </div>
            <div class="navbar-search navbar-item">
              <form class="search-form">
                <i class="material-icons">search</i>
                <input class="form-control" ng-model="search" type="text" placeholder="T??m ki???m t??i kho???n" />
              </form>
            </div>
           
          </div>
        </nav>

        <!-- main area -->
        <div class="content-view">
          <div ng-controller="donhang" layout="column" ng-cloak>
            <!-- <div class="card m-b-1 m-l-3 m-r-3">
              <div class="card-header no-bg b-a-0">
                S??? l?????ng tr?? s???a
              </div>
              <div class="card-block">
                <div class="input-group m-b-1">
                  <input type="text" ng-model="soluong" class="form-control bl0 br0 spinner1"/>
                </div>
                <button type="button" class="btn btn-outline-info m-r-xs m-b-xs form-control" ng-click="themtrasua(soluong)">
                      Ch???n
                    </button>
              </div>
            </div> -->
            <div class="m-l-3 m-r-3">
              <md-content layout-padding style="background-color: #ffff" ng-init="themtrasua(1)">
                <!-- so luong tra sua -->
                <!-- <div layout="row" >
                  <md-input-container flex="50" class="m-b-0">
                    <label>S??? l?????ng tr?? s???a</label>
                    <input type="text" min="1" max="10" ng-model="soluong">
                  </md-input-container>
                  <md-input-container flex="50" class="m-b-0">
                    <button type="button" class="btn btn-default m-r-xs m-b-xs form-control" ng-click="themtrasua(soluong)">
                      Ch???n
                    </button>
                  </md-input-container>
                </div> -->

                 <form name="projectForm" action="" method="POST" >

                      <hr  ng-init="soluonghoadon='10'">
                      <h6 class="text-center m-b-1 m-t-3" ng-init='donhang=<?php echo json_encode($mangdulieu['donhang'])?>'>
                        Danh s??ch ????n h??ng
                      </h6>

                      <div id="angularPart" class="row" ng-repeat="dh in donhang | filter:search | limitTo : soluonghoadon" >
                        <div class="col-md-12">
                          <div class="card ">
                            <div class="card-header " ng-click="displayHoadon(dh)">
                               <b><i>M?? h??a ????n: {{dh.MAHOADON}}</i></b><br>
                               M?? ????n h??ng: {{dh.MADONHANG}}<br>
                               Ng??y l???p: {{dh.NGAYTAO}} <br>
                               Tr???ng th??i: 
                               <b><a ng-show="{{dh.TRANGTHAIDONHANG === '1' ? 'true' : '' }}" href="#" class="text-warning m-r-1 m-b-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="On the Top!">
                                {{dh.TRANGTHAITEXT}}
                               </a></b>
                               <b><a ng-show="{{dh.TRANGTHAIDONHANG === '2' ? 'true' : '' }}" href="#" class="text-warning m-r-1 m-b-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="On the Top!">
                                 {{dh.TRANGTHAITEXT}}
                               </a></b>
                               <b><a ng-show="{{dh.TRANGTHAIDONHANG === '3' ? 'true' : '' }}" href="#" class="text-warning m-r-1 m-b-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="On the Top!">
                                 {{dh.TRANGTHAITEXT}}
                               </a></b>
                               <b><a ng-show="{{dh.TRANGTHAIDONHANG === '4' ? 'true' : '' }}" href="#" class="text-success m-r-1 m-b-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="On the Top!">
                                 {{dh.TRANGTHAITEXT}}
                               </a></b>
                               <b><a ng-show="{{dh.TRANGTHAIDONHANG === '5' ? 'true' : '' }}" href="#" class="text-pink m-r-1 m-b-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="On the Top!">
                                 {{dh.TRANGTHAITEXT}}
                               </a></b>

                              <div class="card-controls ">
                                <a ng-click="displayHoadon(dh)" class="card-collapse" data-toggle="card-collapse"></a>
                              </div>
                            </div>
                            <div class="card-block">
                              <div class="content">
                                 <table ng-show="{{dh.TRANGTHAIDONHANG !== '5' ? 'true' : ''}}" class="main" width="100%" cellpadding="0" cellspacing="0">
                                    <tbody>
                                       <tr>
                                          <td style="padding-top: 1px;padding-right: 1px;padding-left: 1px;">
                                             <table class="status" width="100%" cellpadding="0" cellspacing="0">
                                                <tbody>
                                                   <tr>
                                                      <td class="status-cell {{dh.ARRAYTRANGTHAI[0]}} aligncenter radius-top-left radius-bottom-left">
                                                         <strong class="{{dh.ARRAYTRANGTHAI[0] === 'active' ? 'dark' : 'white'}}">Ch??? x??? l??</strong>
                                                      </td>
                                                      <td class="status-cell {{dh.ARRAYTRANGTHAI[1]}} aligncenter">
                                                         <strong class="{{dh.ARRAYTRANGTHAI[1] === 'active' ? 'dark' : 'white'}}">Pha ch???</strong>
                                                      </td>
                                                      <td class="status-cell {{dh.ARRAYTRANGTHAI[2]}} aligncenter">
                                                         <strong class="{{dh.ARRAYTRANGTHAI[2] === 'active' ? 'dark' : 'white'}}">??ang giao</strong>
                                                      </td>
                                                      <td class="status-cell {{dh.ARRAYTRANGTHAI[3]}} aligncenter radius-top-right radius-bottom-right">
                                                        <strong class="{{dh.ARRAYTRANGTHAI[3] === 'active' ? 'dark' : 'white'}}">???? giao</strong>
                                                      </td>
                                                   </tr>
                                                </tbody>
                                             </table>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td class="content-wrap">
                                             <table ng-show="{{dh.TRANGTHAIDONHANG === '1' ? 'true' : ''}}" width="100%" cellpadding="0" cellspacing="0">
                                                <tbody>
                                                   <tr>
                                                      <td class="content-block">
                                                         <h1>????n h??ng ??ang ch??? x??? l??</h1>
                                                      </td>
                                                   </tr>
                                                   <tr>
                                                      <td class="content-block">
                                                         X??c nh???n ????n h??ng ????? ??i ?????n b?????c pha ch???
                                                      </td>
                                                   </tr>
                                                   <tr>
                                                      <td class="content-block">
                                                         <strong>1 trong 4 b?????c ho??n th??nh</strong>
                                                      </td>
                                                   </tr>
                                                   <tr>
                                                      <td class="content-block" itemprop="handler" itemscope="" itemtype="http://schema.org/HttpActionHandler">
                                                         <a ng-click="xacnhan2(dh.MADONHANG, 2, dh.MAHOADON)" class="btn-primary" itemprop="url">X??c nh???n</a>
                                                      </td>
                                                   </tr>
                                                </tbody>
                                             </table>
                                             <table ng-show="{{dh.TRANGTHAIDONHANG === '2' ? 'true' : ''}}"  width="100%" cellpadding="0" cellspacing="0">
                                                <tbody>
                                                   <tr>
                                                      <td class="content-block">
                                                         <h1>??ang pha ch???...</h1>
                                                      </td>
                                                   </tr>
                                                   <tr>
                                                      <td class="content-block">
                                                         <strong>2 trong 4 b?????c ho??n th??nh</strong>
                                                      </td>
                                                   </tr>
                                                   <tr>
                                                      <td class="content-block">
                                                       <md-progress-linear class="md-warn" md-mode="buffer" value="{{determinateValue}}"
                                                       md-buffer-value="{{determinateValue2}}"
                                                       ng-disabled="!showList[0]"></md-progress-linear>
                                                      </td>
                                                   </tr>
                                                </tbody>
                                             </table>
                                             <table ng-show="{{dh.TRANGTHAIDONHANG === '3' ? 'true' : ''}}" width="100%" cellpadding="0" cellspacing="0">
                                                <tbody>
                                                   <tr>
                                                      <td class="content-block">
                                                         <h1>??ang ch??? giao h??ng</h1>
                                                      </td>
                                                   </tr>
                                                   <tr>
                                                      <td class="content-block">
                                                         ????n h??ng ???? s???n s??ng ????? giao
                                                      </td>
                                                   </tr>
                                                   <tr>
                                                      <td class="content-block">
                                                         <strong>3 trong 4 b?????c ho??n th??nh</strong>
                                                      </td>
                                                   </tr>
                                                   <tr>
                                                      <td class="content-block" itemprop="handler" itemscope="" itemtype="http://schema.org/HttpActionHandler">
                                                         <a ng-click="giaohang2(dh.MADONHANG, 4, dh.MAHOADON)" href="#" class="btn-primary" itemprop="url">Giao h??ng</a>
                                                      </td>
                                                   </tr>
                                                </tbody>
                                             </table>
                                             <table ng-show="{{dh.TRANGTHAIDONHANG === '4' ? 'true' : ''}}" width="100%" cellpadding="0" cellspacing="0">
                                                <tbody>
                                                   <tr>
                                                      <td class="content-block">
                                                         <h1 class="text-success">Giao h??ng th??nh c??ng
                                                           <i style="font-size:35px" class="material-icons text-success" aria-hidden="true">
                                                             done
                                                           </i>
                                                         </h1>
                                                      </td>
                                                   </tr>
                                                   <tr>
                                                      <td class="content-block">
                                                         <strong>4 trong 4 b?????c ho??n th??nh</strong>
                                                      </td>
                                                   </tr>
                                                   <tr>
                                                      <td class="content-block">
                                                         ????n h??ng ???? ???????c giao
                                                      </td>
                                                   </tr>
                                                </tbody>
                                             </table>
                                          </td>
                                       </tr>
                                    </tbody>
                                 </table>
                                 
                              </div>
                              <img ng-show="{{dh.TRANGTHAIDONHANG === '5' ? 'true' : ''}}" src="<?php echo base_url() ?>/FileUpload/Cancelled.jpg" class="img-fluid m-x-auto" style="width: 35%" alt="Responsive image">
                              <a href="<?php echo base_url() ?>admin/chitiethoadon/{{dh.MAHOADON}}" type="button" class="btn btn-success btn-icon btn-sm" >
                                Chi ti???t
                                <i class="material-icons">remove_red_eye</i>
                              </a>
                              <!-- <a ng-show="{{ dh.MATRANGTHAI === '2' ? 'true' : '' }}" href="<?php echo base_url() ?>admin/chitiethoadon/{{dh.MAHOADON}}" type="button" class="btn btn-success btn-icon btn-sm pull-xs-right" >
                                Chi ti???t
                                <i class="material-icons">remove_red_eye</i>
                              </a> --> 
                              <button ng-show="{{ dh.TRANGTHAIDONHANG === '1' ? 'true' : '' }}" ng-click="getMahoadon(dh.MAHOADON)" type="button" class="btn btn-danger btn-icon btn-sm cancelHoadon">
                                H???y h??a ????n
                                <i class="material-icons">cancel</i>
                              </button>
                              ???
                              <script src="<?php echo base_url(); ?>/milestone/scripts/ui/alert.js"></script>           
                            </div>
                          </div>
                        </div>
                    
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
