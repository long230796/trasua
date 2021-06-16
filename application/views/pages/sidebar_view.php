<div ng-controller="sidebar" class="sidebar-panel">
 
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
      <a class="dropdown-item" href="<?php echo base_url() ?>admin/taikhoan">Tài khoản</a>
     <!--  <a class="dropdown-item" href="javascript:;">Upgrade</a>
      <a class="dropdown-item" href="javascript:;">
        <span>Notifications</span>
        <span class="tag bg-primary">34</span>
      </a> -->
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="javascript:;">Trợ giúp</a>
      <a class="dropdown-item" href="<?php echo base_url() ?>admin/logout">Đăng xuất</a>
    </div>
  </div>

  <!-- main navigation -->
  <nav>
    <p class="nav-title">NAVIGATION</p>
    <ul class="nav d-flex">
      <!-- dashboard -->
      <!-- <li class="flex-grow-1">
        <a href="<?php echo base_url() ?>admin/index">
          <i class="material-icons text-primary">home</i>
          <span>Home</span>
        </a>
      </li> -->
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
              <i class="material-icons text-info">local_drink</i>
              <span>Sản phẩm</span>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url() ?>admin/taotrasua">
              <i class="material-icons text-info">add</i>
              <span>Thêm sản phẩm mới</span>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url() ?>admin/chitietsize">
              <i class="material-icons text-info">launch</i>
              <span>Quản lí size</span>
            </a>
          </li>

          
        </ul>
      </li>

      <li class="flex-grow-1">
        <a href="javascript:;">
          <span class="menu-caret">
            <i class="material-icons">arrow_drop_down</i>
          </span>
          <i class="material-icons text-dark">store</i>
          <span>Quản lí Kho</span>

        </a>
        <ul class="sub-menu">
          <li>
            <a href="<?php echo base_url() ?>admin/danhsachnguyenlieu">
              <i class="material-icons text-dark">restaurant_menu</i>
              <span>nguyên liệu</span>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url() ?>admin/dondathang">
              <i class="material-icons text-dark">add_shopping_cart</i>
              <span>đặt nguyên liệu</span>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url() ?>admin/danhsachdondathang">
              <i class="material-icons text-dark">description</i>
              <span>đơn đặt nguyên liệu</span>
            </a>
          </li>
         <!--  <li>
            <a href="<?php echo base_url() ?>admin/donnhaphang">
              <i class="material-icons text-dark">add_shopping_cart</i>
              <span>Thêm nguyên liệu</span>
            </a>
          </li> -->
          
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
            <a href="<?php echo base_url() ?>admin/danhsachtaikhoan">
              <i class="material-icons text-success">list</i>
              <span>Tài khoản</span>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url() ?>admin/khachhang">
              <i class="material-icons text-success">list</i>
              <span>Khách hàng</span>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url() ?>admin/nhanvien">
              <i class="material-icons text-success">list</i>
              <span>Nhân viên</span>
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
          <span>Giao dịch</span>
        </a>
        <ul class="sub-menu">
          <li>
            <a href="<?php echo base_url() ?>admin/danhsachhoadon">
              <i class="material-icons text-danger">list</i>
              <span>Hóa đơn</span>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url() ?>admin/danhsachdonhang">
              <i class="material-icons text-danger">list</i>
              <span>Đơn hàng</span>
            </a>
          </li>
          
          <li>
            <a href="<?php echo base_url() ?>admin/laphoadon">
              <i class="material-icons text-danger">description</i>
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
              <span>Tiêu thụ</span>
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