<div ng-controller="sidebar" class="sidebar-panel">
  <div class="brand">
    <!-- toggle offscreen menu -->
    <a href="javascript:;" data-toggle="sidebar" class="toggle-offscreen hidden-lg-up">
      <i class="material-icons">menu</i>
    </a>
    <!-- /toggle offscreen menu -->
    <!-- logo -->
    <a class="brand-logo">
      <img class="expanding-hidden" src="http://localhost:8080/trasua//milestone/images/logo.png" alt="">
    </a>
    <!-- /logo -->
  </div>
  <div  class="nav-profile dropdown">
    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
      <div class="user-image">
        <img src="{{anhdaidien}}" class="avatar img-rounded" alt="user" title="user">
      </div>
      <div class="user-info expanding-hidden">
        {{hovaten}}
        <small class="bold">{{vaitro}}</small>
      </div>
    </a>  
    <div class="dropdown-menu">
      <a class="dropdown-item" href="javascript:;">Settings</a>
      <a class="dropdown-item" href="javascript:;">Upgrade</a>
      <a class="dropdown-item" href="javascript:;">
        <span>Notifications</span>
        <span class="tag bg-primary">34</span>
      </a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="javascript:;">Help</a>
      <a class="dropdown-item" href="<?php echo base_url() ?>admin/logout">Logout</a>
    </div>
  </div>
  <!-- main navigation -->
  <nav>
    <p class="nav-title">NAVIGATION</p>
    <ul class="nav d-flex">
      <!-- dashboard -->
      <li class="flex-grow-1">
        <a href="<?php echo base_url() ?>admin/index">
          <i class="material-icons text-primary">home</i>
          <span>Home</span>
        </a>
      </li>
      <!-- /dashboard -->
      <!-- apps -->
      <li class="flex-grow-1">
        <a href="javascript:;">
          <span class="menu-caret">
            <i class="material-icons">arrow_drop_down</i>
          </span>
          <i class="material-icons text-info">local_cafe</i>
          <span>Quản lí sản phẩm</span>

        </a>
        <ul class="sub-menu">
          <li>
            <a href="<?php echo base_url() ?>admin/danhsachsanpham">
              <i class="material-icons text-info">list</i>
              <span>Danh sách sản phẩm</span>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url() ?>admin/taotrasua">
              <i class="material-icons text-info">add</i>
              <span>Thêm sản phẩm mới</span>
            </a>
          </li>
          
        </ul>
      </li>
      <li class="flex-grow-1">
        <a href="javascript:;">
          <span class="menu-caret">
            <i class="material-icons">arrow_drop_down</i>
          </span>
          <i class="material-icons text-success">people</i>
          <span>Quản lí tài khoản</span>
        </a>
        <ul class="sub-menu">
          <li>
            <a href="<?php echo base_url() ?>admin/quanliTaikhoanTongquat">
              <i class="material-icons text-success">list</i>
              <span>Danh sách tài khoản</span>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url() ?>admin/themnhanvien">
              <i class="material-icons text-success">person_add</i>
              <span>Thêm nhân viên</span>
            </a>
          </li>
          <!-- <li>
            <a href="app-messages.html">
              <span>Messages</span>
            </a>
          </li>
          <li>
            <a href="app-social.html">
              <span>Social</span>
            </a>
          </li>
          <li>
            <a href="app-people.html">
              <span>People</span>
            </a>
          </li> -->
        </ul>
      </li>
      <!-- /apps -->
      <!-- ui -->
      <li class="flex-grow-1">
        <a href="javascript:;">
          <span class="menu-caret">
            <i class="material-icons">arrow_drop_down</i>
          </span>
          <i class="material-icons text-danger">explore</i>
          <span>Chức năng</span>
        </a>
        <ul class="sub-menu">
          <li>
            <a href="<?php echo base_url() ?>admin/dondathang">
              <i class="material-icons text-danger">shopping_cart</i>
              <span>Đặt hàng</span>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url() ?>admin/donnhaphang">
              <i class="material-icons text-danger">file_download</i>
              <span>Nhập hàng</span>
            </a>
          </li>
          
          <li>
            <a href="<?php echo base_url() ?>admin/laphoadon">
              <i class="material-icons text-danger">payment</i>
              <span>Lập hóa đơn</span>
            </a>
          </li>
          <!-- <li>
            <a href="#">
              <span>Sản phẩm</span>
            </a>
          </li> -->
        </ul>
      </li>
      <!-- /ui -->
      <!-- charts -->
      <li class="flex-grow-1">
        <a href="javascript:;">
          <span class="menu-caret">
            <i class="material-icons">arrow_drop_down</i>
          </span>
          <i class="material-icons text-warning">assessment</i>
          <span>Thống kê</span>
        </a>
        <ul class="sub-menu">
          <li>
            <a href="<?php echo base_url() ?>admin/thunhap">
              <i class="material-icons text-warning">attach_money</i>
              <span>Thu nhập</span>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url() ?>admin/tonkho">
              <i class="material-icons text-warning">store</i>
              <span>tồn kho</span>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url() ?>admin/biendonggia">
              <i class="material-icons text-warning">trending_up</i>
              <span>Biến động giá</span>
            </a>
          </li>
          <!-- <li>
            <a href="chart-rickshaw.html">
              <span>Rickshaw</span>
            </a>
          </li>
          <li>
            <a href="chart-c3.html">
              <span>C3js</span>
            </a>
          </li> -->
        </ul>
      </li>
      <!-- /charts -->
    </ul>

    
  </nav>
  <!-- /main navigation -->
</div>