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

                <form name="projectForm" action="" method="POST" ng-init='khachhang=parJson(<?php echo $mangdulieu['khachhang']?>)'>

                    <div layout="row" ng-init="dataset='false'">
                      <md-input-container class="flex-100" >
                        <label>S??? ??i???n tho???i kh??ch h??ng</label>
                        <input  type="text" ng-pattern="/^[0-9]{10}$/" name="sodienthoai" ng-model="sodienthoai" ng-click="showListkhachhang()">
                        <div ng-messages="projectForm.sodienthoai.$error">
                          <div ng-message="required">B???t bu???c</div>
                          <div ng-message="pattern" class="my-message">S??? ??i???n tho???i kh??ng kh??? d???ng
                          </div>
                        </div>
                      </md-input-container>
                    </div>

                    <div layout="row" ng-init="dataset='false'" ng-show="hienthikhachhang">
                      <md-content class="flex-100">
                        <md-list flex >
                          
                              <table class="table table-hover">
                                <thead class="thead-inverse">
                                  <tr>
                                    <th>
                                      #
                                    </th>
                                    <th>
                                      ???nh ?????i di???n
                                    </th>
                                    <th>
                                      H???
                                    </th>
                                    <th>
                                      T??n
                                    </th>
                                    <th>
                                      S??? ??i???n tho???i
                                    </th>
                                  </tr>
                                </thead>
                                <tbody ng-repeat="item in khachhang | filter:sodienthoai " ng-click="setkhachhang(item)">
                                  <tr >
                                    <th scope="row">
                                      {{$index}}
                                    </th>
                                    <td>
                                      <div class="" >
                                        <img src="{{item.AVATAR}}" style="width: 40px; height: auto;" class="avatar img-circle" alt="user" title="user">
                                        <input type="hidden" name="matk" value="{{item.MATAIKHOAN}}">
                                      </div>
                                      
                                    </td>
                                    <td>
                                      {{item.HO}}
                                    </td>
                                    <td>
                                      {{item.TEN}}
                                    </td>
                                    <td>
                                      {{item.SDT}}
                                    </td>
                                  </tr>
                                
                                </tbody>
                                
                              </table>

                        </md-list>
                      </md-content>
                    </div>

                    <div layout="row">
                      <md-input-container style="margin: 36px 0;" layout="row" flex="50" ng-show="buttonNhapthongtin">
                          <button type="button" class="btn btn-default  form-control" ng-click="formKH(sodienthoai)">T???o th??? th??nh vi??n</button>
                      </md-input-container>

                      <md-input-container style="margin: 36px 0;" layout="row" flex="50" ng-show="buttonNhapthongtin">
                          <button type="button" class="btn btn-default  form-control" ng-click="showListkhachhang()">H???y</button>
                      </md-input-container>
                    </div>
                    <!-- nhap thong tin khach hang -->

                    <div layout="row" ng-show="hienthiFormKH">
                      <md-input-container flex="50">
                        <label>H???</label>
                        <input ng-pattern ="/^[a-zA-Z??????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????\s\W|_]+$/" minlength="5" md-maxlength="20" type="text"  name="hokh" ng-model="hokh">
                        <div ng-messages="projectForm.hokh.$error">
                          <div ng-message="required">B???t bu???c</div>
                          <div ng-message="md-maxlength">H??? ph???i nh??? h??n 15 k?? t???</div>
                          <div ng-message="minlength">T???i thi???u 5 ch???</div>
                          <div ng-message="pattern" class="my-message">Sai ?????nh d???ng
                          </div>
                        </div>
                      </md-input-container>
                      <md-input-container flex="50">
                        <label>T??n</label>
                        <input ng-pattern="/^[a-zA-Z??????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????\s\W|_]+$/" type="text" name="tenkh" ng-model="tenkh">
                        <div ng-messages="projectForm.tenkh.$error">
                          <div ng-message="required">B???t bu???c</div>
                          <div ng-message="md-maxlength">T??n ph???i nh??? h??n 7 k?? t???</div>
                          <div ng-message="pattern" class="my-message">Sai ?????nh d???ng
                          </div>
                        </div>
                      </md-input-container>
                    </div>


                    <div layout="row" ng-show="thongtinKH">
                      <md-content class="flex-100" style="margin-bottom: 36px">
                        <md-list flex >
                              <table class="table ">
                                <thead class="thead-default">
                                  <tr>
                                    <th>
                                      ???nh ?????i di???n
                                    </th>
                                    <th>
                                      H???
                                    </th>
                                    <th>
                                      T??n
                                    </th>
                                    <th>
                                      S??? ??i???n tho???i
                                    </th>
                                  </tr>
                                </thead>
                                <tbody ng-repeat="KH in thongtinKH">
                                  <tr >
                                    <td>
                                      <div >
                                        <img src="{{KH.AVATAR}}" style="width: 40px; height: auto;" class="avatar img-circle" alt="user" title="user">
                                      </div>
                                    </td>
                                    <td>
                                      {{KH.HO}}
                                    </td>
                                    <td>
                                      {{KH.TEN}}
                                    </td>
                                    <td>
                                      {{KH.SDT}}
                                      <input type="hidden" name="makh" value="{{KH.MAKH}}">
                                    </td>
                                  </tr>

                                </tbody>
                                  
                              </table>
                        
                         
                        </md-list>
                      </md-content>
                    </div>
                    
                    <div ng-show="{{soluongtrasua}}" ng-repeat="data in soluongtrasua">
                      <p class="p-b-0 m-t-2"><b>Tr?? s???a {{$index+1}}</b></p>
                      <div layout="row" >
                        <md-input-container flex="33">
                          <label ng-model="arrayloaits">Lo???i tr?? s???a</label>
                          <!-- <input type="text" name="tenloai[]" ng-model="tenloai" ng-click="showListTrasua()"> -->

                          <md-select name="matenloai[]" ng-model="matenloai" required >
                            <?php foreach ($mangdulieu["loaitrasua"] as $key ): ?>
                              <md-option  ng-click='arrayMaloaits("<?php echo $key['TENLOAI']?>", "<?php echo $key['MALOAITRASUA']?>", arrayloaits)'  value="<?php echo $key["MALOAITRASUA"] ?>">
                                  <img src="<?php echo $key["HINHANH"] ?>" class="avatar avatar-xs  m-r-1 pull-left" alt="user" title="user">
                                  <?php echo $key["TENLOAI"] ?>
                                  
                                </md-option>
                            <?php endforeach ?>
                            <md-option value=""></md-option>
                          </md-select>
                          <div ng-messages="projectForm.tenloai.$error">
                            <div ng-message="required">B???t bu???c</div>
                          </div>
                        </md-input-container>
                        <md-input-container flex="33">
                          <label>S??? l?????ng</label>
                          <input type="number" required min="1" max="100" name="soluongmua[]" ng-model="soluongmua">
                          <div ng-messages="projectForm.soluongmua.$error">
                            <div ng-message="required">B???t bu???c</div>
                            <div ng-message="md-maxlength">????n gi?? ph???i nh??? h??n 10 k?? t???</div>
                          </div>
                        </md-input-container>
                        <md-input-container flex="33" ng-init='ctsize=<?php echo json_encode($mangdulieu['ctsize'])?>'>
                          <label>Size</label>
                          <md-select required name="size[]" ng-model="size" ng-disabled="!matenloai">
                            <md-option ng-repeat="value in ctsize | filter:matenloai"  value="{{value.MASIZE}}_{{value.MALOAITRASUA}}_{{value.TENSIZE}}">{{value.TENSIZE}}</md-option>

                          </md-select>
                          <div ng-messages="projectForm.size.$error">
                            <div ng-message="required">B???t bu???c</div>
                            <div ng-message="md-maxlength">????n gi?? ph???i nh??? h??n 10 k?? t???</div>
                          </div>
                        </md-input-container>
                        <md-input-container >
                          <i type="button" ng-click="themtrasua($index+2)" class="material-icons text-info">add</i>
                        </md-input-container>
                        <md-input-container ng-show="$index" >
                          <i type="button" ng-click="xoatrasua(soluongtrasua, data)" class="material-icons text-danger">close</i>
                        </md-input-container>
                      </div>
                    </div>
                    
                    

                    
                    <div layout="row">
                      <md-input-container flex="50">
                        <label>Nguy??n li???u b??? sung </label>
                        <input type="text" min="0" ng-model="soluongnlbosung" >
                      </md-input-container>
                      <md-input-container flex="50">
                        <button ng-disabled="!arrayloaits" type="button" class="btn btn-default form-control" ng-click="themnguyenlieubosung(soluongnlbosung)">
                                Ch???n
                              </button>
                      </md-input-container>
                    </div>  


                    <div ng-show="{{hienthinlbosung}}"  ng-repeat="data in hienthinlbosung">
                      <p class="p-b-0 m-t-2"><b>Nguy??n li???u {{$index+1}}</b></p>
                      <div layout="row">
                          <md-input-container flex="25">
                            <label>Lo???i tr?? s???a th??m</label>
                            <!-- <input type="text" name="tenloai[]" ng-model="tenloai" ng-click="showListTrasua()"> -->
                            <md-select  name="matrasuathem[]" ng-model="matrasuathem" required >
                              
                              <md-option ng-repeat="arr in arrayloaits" value="{{arr.maloai}}">{{arr.tenloai}}</md-option>
                             
                              <md-option value=""></md-option>
                            </md-select>
                            <div ng-messages="projectForm.tenloai.$error">
                              <div ng-message="required">B???t bu???c</div>
                            </div>
                          </md-input-container>

                          <md-input-container flex="25" >
                            <label>T??n nguy??n li???u</label>
                            <md-select name="nguyenlieucu[]" ng-model="nguyenlieucu" required ng-disabled="nguyenlieumoi" >
                              <?php foreach ($mangdulieu["nguyenlieu"] as $key ): ?>
                                <md-option ng-click='setDonvi(<?php echo json_encode($mangdulieu['nguyenlieu'])?>, "<?php echo $key['MANGUYENLIEU'] ?>", data)' value="<?php echo $key["MANGUYENLIEU"] ?>"><?php echo $key["TENNL"] ?></md-option>
                              <?php endforeach ?>
                              <md-option value=""></md-option>
                            </md-select>
                            <div ng-messages="projectForm.nguyenlieucu.$error">
                              <div ng-message="required">B???t bu???c</div>
                            </div>
                          </md-input-container>

                          <md-input-container flex="25">
                            <label>S??? l?????ng</label>
                            <input type="number" step="any" min="0" max="0.5" required ng-model="soluong" name="soluong[]" >
                            <div ng-messages="projectForm.soluong.$error">
                              <div ng-message="required">B???t bu???c</div>
                            </div>
                          </md-input-container>
                          <md-input-container flex="25">
                            <label>????n v???</label>
                            <input readonly  class="donvi" type="text" required name="donvi[]" value=" ">
                            <!-- <input type="text" md-maxlength="10" required name="donvi[]" ng-model="donvi">
                            <div ng-messages="projectForm.donvi.$error">
                              <div ng-message="required">B???t bu???c</div>
                              <div ng-message="md-maxlength">????n v??? ph???i nh??? h??n 10 k?? t???</div>
                            </div> -->
                          </md-input-container>
                          <md-input-container >
                            <i type="button" ng-click="themnguyenlieubosung($index+2)" class="material-icons text-info">add</i>
                          </md-input-container>
                          <md-input-container ng-show="$index" >
                            <i type="button" ng-click="xoanguyenlieubosung(hienthinlbosung, data)" class="material-icons text-danger">close</i>
                          </md-input-container>
                          

                        </div>
                        
                      </div>  
                      <button type="submit" class="btn btn-info m-r-xs m-b-xs form-control">
                        Nh???p ????n ?????t
                      </button>
                      <hr class="m-t-3">
                      <h6 class="text-center m-b-1 m-t-3" ng-init='bills=<?php echo json_encode($mangdulieu['hoadon'])?>'>
                        H??a ????n g???n ????y
                      </h6>

                      <div id="angularPart" class="row" ng-repeat="hoadon in bills" ng-init="hoadon.display=false">
                        <div class="col-md-12">
                          <div class="card ">
                            <div class="card-header " ng-click="displayHoadon(hoadon)">
                               M?? h??a ????n: {{hoadon.MAHOADON}}<br>
                               Ng??y l???p: {{hoadon.NGAYLAP}} <br>
                               Tr???ng th??i: 
                               <a ng-show="{{hoadon.MATRANGTHAI === '1' ? 'true' : '' }}" href="#" class="text-success m-r-1 m-b-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="On the Top!">
                                 ???? thanh to??n
                               </a>
                               <a ng-show="{{hoadon.MATRANGTHAI === '2' ? 'true' : '' }}" href="#" class="text-pink m-r-1 m-b-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="On the Top!">
                                 Ch??a thanh to??n
                               </a>
                              <div class="card-controls ">
                                <a ng-click="displayHoadon(hoadon)" class="card-collapse" data-toggle="card-collapse"></a>
                              </div>
                            </div>
                            <div class="card-block" ng-show="hoadon.display">
                              <div class="p-t-2 p-b-2 clearfix" ng-repeat="client in hoadon.KHACHHANG">
                                <img src="{{client.AVATAR}}" class="avatar avatar-xs img-circle m-r-1 pull-left" alt="user" title="user">
                                <div class="overflow-hidden">
                                  <p class="m-b-0">
                                    <strong>
                                      Chi ti???t kh??ch h??ng
                                    </strong>
                                  </p>
                                  <p class="m-b-0">
                                    T??n: {{client.HO}} {{client.TEN}}
                                  </p>
                                  <p class="m-b-0">
                                    S??? ??i???n tho???i: {{client.SDT}}
                                  </p>
                                  <p class="m-b-0">
                                    Ng??y l???p: {{hoadon.NGAYLAP}}
                                  </p>
                                  
                                </div>
                              </div>
                              <div class="table-responsive p-t-2 p-b-2">
                                <table class="table table-bordered m-b-0">
                                  <thead>
                                    <tr>
                                      <th>
                                        M?? t???
                                      </th>
                                      <th>
                                        Size
                                      </th>
                                      <th>
                                        ????n gi??
                                      </th>
                                      <th>
                                        S??? l?????ng
                                      </th>
                                      <th>
                                        T???ng
                                      </th>
                                    </tr>
                                  </thead>
                                  <tbody ng-repeat="CTHOADON in hoadon.CTHOADON">
                                    <tr>
                                      <td>
                                        {{CTHOADON.TENLOAI}}
                                      </td>
                                      <td>
                                        {{CTHOADON.TENSIZE}}
                                      </td>
                                      <td>
                                        {{CTHOADON.DONGIAMOI}}
                                      </td>
                                      <td>
                                        {{CTHOADON.SOLUONG}}
                                      </td>
                                      <td>
                                        {{CTHOADON.DONGIAMOI * CTHOADON.SOLUONG}}
                                      </td>
                                    </tr>

                                    <!-- B??? sung -->
                                    <tr ng-repeat="bosung in CTHOADON.NGUYENLIEUBOSUNG">
                                      <td class="float-right text-xs-center">
                                       {{bosung.nguyenlieu}}
                                      </td>
                                      <td>
                                        
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
                                  T???ng c???ng
                                </strong>
                                <span class="invoice-totals-value">
                                  {{hoadon.GIAHOADON}}
                                </span>
                              </div>
                            </div>
                            ???<img ng-show="{{ hoadon.MATRANGTHAI === '2' ? 'true' : '' }}" src="<?php echo base_url() ?>/FileUpload/unpaid.jpg" class="img-fluid" style="width: 25%" alt="Responsive image">
                            <a href="<?php echo base_url() ?>admin/chitiethoadon/{{hoadon.MAHOADON}}" type="button" class="btn btn-success btn-icon btn-sm">
                              Chi ti???t
                              <i class="material-icons">remove_red_eye</i>
                            </a> 

                            <a href="<?php echo base_url() ?>admin/chitietdonhang/{{hoadon.MADONHANG}}" type="button" class="btn btn-success btn-icon btn-sm">
                              Xem ????n h??ng
                              <i class="material-icons">local_shipping</i>
                            </a> 

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
