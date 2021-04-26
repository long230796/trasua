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
    <link rel="stylesheet" href="<?php echo base_url(); ?>/milestone/vendor/bootstrap/dist/css/bootstrap.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>/milestone/vendor/pace/themes/blue/pace-theme-minimal.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>/milestone/vendor/font-awesome/css/font-awesome.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>/milestone/vendor/animate.css/animate.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>/milestone/styles/app.css" id="load_styles_before"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>/milestone/styles/app.skins.css"/>
    <!-- endbuild -->
  </head>
  <body ng-app="myApp">

    <div class="app">
      <!--sidebar panel-->
      <div class="off-canvas-overlay" data-toggle="sidebar"></div>
      <?php require('pages/sidebar_view.php') ?>
      <!-- content panel -->
      <div class="main-panel">
        <?php require('pages/header_view.php') ?>

        <!-- main area -->
        <div class="main-content">
          <div class="content-view">
            <div class="row">
              <div class="col-sm-6 col-md-4 col-lg-2">
                <div class="card card-block">
                  <h5 class="m-b-0 v-align-middle text-overflow">
                    <span class="small pull-xs-right">
                      <i class="material-icons text-success" style="width: 16px;">arrow_drop_up</i>
                      <span style="line-height: 24px;">+76%</span>
                    </span>
                    <span>804</span>
                  </h5>
                  <div class="small text-overflow text-muted">
                    Memory usage
                  </div>
                  <div class="small text-overflow">
                    Updated:&nbsp;<span>05:35 AM</span>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-4 col-lg-2">
                <div class="card card-block">
                  <h5 class="m-b-0 v-align-middle text-overflow">
                    <span class="small pull-xs-right tag bg-success p-y-0 p-x-xs" style="line-height: 24px;">
                      <span >+20K</span>
                    </span>
                    <span>403</span>
                  </h5>
                  <div class="small text-overflow text-muted">
                    Disk usage
                  </div>
                  <div class="small text-overflow">
                    Updated:&nbsp;<span>12:42 PM</span>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-4 col-lg-2">
                <div class="card card-block">
                  <h5 class="m-b-0 v-align-middle text-overflow">
                    <span class="small pull-xs-right">
                      <i class="material-icons text-danger" style="width: 16px;">arrow_drop_down</i>
                      <span style="line-height: 24px;">+40%</span>
                    </span>
                    <span>976</span>
                  </h5>
                  <div class="small text-overflow text-muted">
                    GPU compute
                  </div>
                  <div class="small text-overflow">
                    Updated:&nbsp;<span>09:26 AM</span>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-4 col-lg-2">
                <div class="card card-block">
                  <h5 class="m-b-0 v-align-middle text-overflow">
                    <span class="small pull-xs-right">
                      <i class="material-icons text-success" style="width: 16px;">arrow_drop_up</i>
                      <span style="line-height: 24px;">+94%</span>
                    </span>
                    <span>457</span>
                  </h5>
                  <div class="small text-overflow text-muted">
                    CPU usage
                  </div>
                  <div class="small text-overflow">
                    Updated:&nbsp;<span>06:45 AM</span>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-4 col-lg-2">
                <div class="card card-block">
                  <h5 class="m-b-0 v-align-middle text-overflow">
                    <span class="small pull-xs-right">
                      <i class="material-icons text-danger" style="width: 16px;">arrow_drop_down</i>
                      <span style="line-height: 24px;">+04%</span>
                    </span>
                    <span>239</span>
                  </h5>
                  <div class="small text-overflow text-muted">
                    Ram usage
                  </div>
                  <div class="small text-overflow">
                    Updated:&nbsp;<span>11:23 PM</span>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-4 col-lg-2">
                <div class="card card-block">
                  <h5 class="m-b-0 v-align-middle text-overflow">
                    <span class="small pull-xs-right">
                      <i class="material-icons text-success" style="width: 16px;">arrow_drop_up</i>
                      <span style="line-height: 24px;">+67%</span>
                    </span>
                    <span>392</span>
                  </h5>
                  <div class="small text-overflow text-muted">
                    RAM test
                  </div>
                  <div class="small text-overflow">
                    Updated:&nbsp;<span>08:52 AM</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-block">
                <div class="m-b-1">
                  <div class="dropdown pull-right">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                      <span>
                        Period
                      </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" role="menu">
                      <a class="dropdown-item" href="#">
                        Today
                      </a>
                      <a class="dropdown-item" href="#">
                        This week
                      </a>
                      <a class="dropdown-item" href="#">
                        This month
                      </a>
                      <a class="dropdown-item" href="#">
                        This year
                      </a>
                    </div>
                  </div>
                  <h6>
                    Activity
                  </h6>
                </div>
                <div class="dashboard-line chart" style="height:300px"></div>
                <div class="row text-xs-center m-t-1">
                  <div class="col-sm-3 col-xs-6 p-t-1 p-b-1">
                    <h6 class="m-t-0 m-b-0">
                      $ 89.34
                    </h6>
                    <small class="text-muted bold block">
                      Daily Sales
                    </small>
                  </div>
                  <div class="col-sm-3 col-xs-6 p-t-1 p-b-1">
                    <h6 class="m-t-0 m-b-0">
                      $ 498.00
                    </h6>
                    <small class="text-muted bold block">
                      Weekly Sales
                    </small>
                  </div>
                  <div class="col-sm-3 col-xs-6 p-t-1 p-b-1">
                    <h6 class="m-t-0 m-b-0">
                      $ 34,903
                    </h6>
                    <small class="text-muted bold block">
                      Monthly Sales
                    </small>
                  </div>
                  <div class="col-sm-3 col-xs-6 p-t-1 p-b-1">
                    <h6 class="m-t-0 m-b-0">
                      $ 98,343.49
                    </h6>
                    <small class="text-muted bold block">
                      Yearly Sales
                    </small>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3">
                <div class="card card-block p-b-0">
                  <div class="piechart center-block m-b-1" style="width: 120px; height: 120px;">
                    <div class="tasks-pie" data-percent="86">
                      <div>
                        Tasks
                      </div>
                    </div>
                  </div>
                  <div class="text-xs-center m-b-2">
                    <p class="m-a-0">
                      <span class="task-percent">
                      </span>
                      % complete
                    </p>
                  </div>
                  <ul class="list-unstyled m-x-n m-b-0">
                    <li class="b-t p-a-1">
                      <span class="pull-right">
                        45,677
                      </span>
                      Accelaration
                    </li>
                    <li class="b-t p-a-1">
                      <span class="pull-right">
                        234,456
                      </span>
                      Braking
                    </li>
                    <li class="b-t p-a-1">
                      <span class="pull-right">
                        43,554
                      </span>
                      Cornering
                    </li>
                    <li class="b-t p-a-1">
                      <span class="pull-right">
                        223,545
                      </span>
                      Mixing
                    </li>
                  </ul>
                </div>
              </div>
              <div class="col-md-5">
                <div class="card card-block">
                  <div class="">
                    <div>Memory usage</div>
                    <h5 class="m-b-0">
                      <span>804</span> &nbsp;
                      <span class="small">
                        <i class="fa fa-level-up text-success"></i>
                        +76%
                      </span>
                    </h5>
                    <div class="small">
                      Updated:&nbsp;
                      <span>
                        05:35 AM
                      </span>
                    </div>
                  </div>
                  <hr class="m-x-n m-y-2" />
                  <div class="dashboard-bar chart" style="height:269px"></div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card card-block p-b-0">
                  <div class="text-overflow">
                    <span class="text-success">
                      10 minutes
                    </span>
                    to Space Headquaters
                  </div>
                  <small>1 Infinite Loop</small>
                  <div class="us-map" style="height: 292px"></div>
                  <div class="m-x-n">
                    <a href="javascript:;" class="b-t p-a-1 block l-h">
                      <i class="material-icons">arrow_forward</i>
                      <span>Navigate to this location</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <h6>Recent notifications</h6>
            <ul class="list-group m-b-1">
              <li class="list-group-item notification-bar-success">
                <div href="#" class="notification-bar-icon">
                  <div><i></i></div>
                </div>
                <div class="notification-bar-details">
                  <a href="#" class="notification-bar-title">
                    Betty Simmons completed a task
                  </a>
                  <span class="text-muted">
                    14 hours ago
                  </span>
                </div>
              </li>
            </ul>
            <ul class="list-group">
              <li class="list-group-item notification-bar-fail">
                <div href="#" class="notification-bar-icon">
                  <div><i></i></div>
                </div>
                <div class="notification-bar-details">
                  <a href="#" class="notification-bar-title">
                    You have 8 projects still pending
                  </a>
                  <span class="text-muted">
                    26 mins ago
                  </span>
                </div>
              </li>
            </ul>
          </div>
          <!-- bottom footer -->
          <div class="content-footer">
            <nav class="footer-right">
              <ul class="nav">
                <li>
                  <a href="javascript:;">Feedback</a>
                </li>
              </ul>
            </nav>
            <nav class="footer-left">
              <ul class="nav">
                <li>
                  <a href="javascript:;">
                    <span>Copyright</span>
                    &copy; 2016 Your App
                  </a>
                </li>
                <li class="hidden-md-down">
                  <a href="javascript:;">Privacy</a>
                </li>
                <li class="hidden-md-down">
                  <a href="javascript:;">Terms</a>
                </li>
                <li class="hidden-md-down">
                  <a href="javascript:;">help</a>
                </li>
              </ul>
            </nav>
          </div>
          <!-- /bottom footer -->
        </div>
        <!-- /main area -->
      </div>
      <!-- /content panel -->

      <!--Chat panel-->
      <div class="modal fade sidebar-modal chat-panel" tabindex="-1" role="dialog" aria-labelledby="chat-panel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="chat-header">
              <a class="pull-right" href="javascript:;" data-dismiss="modal">
                <i class="material-icons">close</i>
              </a>
              <div class="chat-header-title">People</div>
            </div>
            <div class="modal-body flex scroll-y">
              <div class="chat-group">
                <div class="chat-group-header">Favourites</div>
                <a href="javascript:;" data-toggle="modal" data-target=".chat-message">
                  <span class="status-online"></span>
                  <span>Catherine Moreno</span>
                </a>
                <a href="javascript:;" data-toggle="modal" data-target=".chat-message">
                  <span class="status-online"></span>
                  <span>Denise Peterson</span>
                </a>
                <a href="javascript:;" data-toggle="modal" data-target=".chat-message">
                  <span class="status-away"></span>
                  <span>Charles Wilson</span>
                </a>
                <a href="javascript:;" data-toggle="modal" data-target=".chat-message">
                  <span class="status-away"></span>
                  <span>Melissa Welch</span>
                </a>
                <a href="javascript:;" data-toggle="modal" data-target=".chat-message">
                  <span class="status-no-disturb"></span>
                  <span>Vincent Peterson</span>
                </a>
                <a href="javascript:;" data-toggle="modal" data-target=".chat-message">
                  <span class="status-offline"></span>
                  <span>Pamela Wood</span>
                </a>
              </div>
              <div class="chat-group">
                <div class="chat-group-header">Online</div>
                <a href="javascript:;" data-toggle="modal" data-target=".chat-message">
                  <span class="status-online"></span>
                  <span>Tammy Carpenter</span>
                </a>
                <a href="javascript:;" data-toggle="modal" data-target=".chat-message">
                  <span class="status-away"></span>
                  <span>Emma Sullivan</span>
                </a>
                <a href="javascript:;" data-toggle="modal" data-target=".chat-message">
                  <span class="status-no-disturb"></span>
                  <span>Andrea Brewer</span>
                </a>
                <a href="javascript:;" data-toggle="modal" data-target=".chat-message">
                  <span class="status-online"></span>
                  <span>Betty Simmons</span>
                </a>
              </div>
              <div class="chat-group">
                <div class="chat-group-header">Other</div>
                <a href="javascript:;" data-toggle="modal" data-target=".chat-message">
                  <span class="status-offline"></span>
                  <span>Denise Peterson</span>
                </a>
                <a href="javascript:;" data-toggle="modal" data-target=".chat-message">
                  <span class="status-offline"></span>
                  <span>Jose Rivera</span>
                </a>
                <a href="javascript:;" data-toggle="modal" data-target=".chat-message">
                  <span class="status-offline"></span>
                  <span>Diana Robertson</span>
                </a>
                <a href="javascript:;" data-toggle="modal" data-target=".chat-message">
                  <span class="status-offline"></span>
                  <span>William Fields</span>
                </a>
                <a href="javascript:;" data-toggle="modal" data-target=".chat-message">
                  <span class="status-offline"></span>
                  <span>Emily Stanley</span>
                </a>
                <a href="javascript:;" data-toggle="modal" data-target=".chat-message">
                  <span class="status-offline"></span>
                  <span>Jack Hunt</span>
                </a>
                <a href="javascript:;" data-toggle="modal" data-target=".chat-message">
                  <span class="status-offline"></span>
                  <span>Sharon Rice</span>
                </a>
                <a href="javascript:;" data-toggle="modal" data-target=".chat-message">
                  <span class="status-offline"></span>
                  <span>Mary Holland</span>
                </a>
                <a href="javascript:;" data-toggle="modal" data-target=".chat-message">
                  <span class="status-offline"></span>
                  <span>Diane Hughes</span>
                </a>
                <a href="javascript:;" data-toggle="modal" data-target=".chat-message">
                  <span class="status-offline"></span>
                  <span>Steven Smith</span>
                </a>
                <a href="javascript:;" data-toggle="modal" data-target=".chat-message">
                  <span class="status-offline"></span>
                  <span>Emily Henderson</span>
                </a>
                <a href="javascript:;" data-toggle="modal" data-target=".chat-message">
                  <span class="status-offline"></span>
                  <span>Wayne Kelly</span>
                </a>
                <a href="javascript:;" data-toggle="modal" data-target=".chat-message">
                  <span class="status-offline"></span>
                  <span>Jane Garcia</span>
                </a>
                <a href="javascript:;" data-toggle="modal" data-target=".chat-message">
                  <span class="status-offline"></span>
                  <span>Jose Jimenez</span>
                </a>
                <a href="javascript:;" data-toggle="modal" data-target=".chat-message">
                  <span class="status-offline"></span>
                  <span>Rachel Burton</span>
                </a>
                <a href="javascript:;" data-toggle="modal" data-target=".chat-message">
                  <span class="status-offline"></span>
                  <span>Samantha Ruiz</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade chat-message" tabindex="-1" role="dialog" aria-labelledby="chat-message" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="chat-header">
              <div class="pull-right dropdown">
                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="material-icons">more_vert</i>
                </a>
                <div class="dropdown-menu" role="menu">
                  <a class="dropdown-item" href="javascript:;">Profile</a>
                  <a class="dropdown-item" href="javascript:;">Clear messages</a>
                  <a class="dropdown-item" href="javascript:;">Delete conversation</a>
                  <a class="dropdown-item" href="javascript:;" data-dismiss="modal">Close chat</a>
                </div>
              </div>
              <div class="chat-conversation-title">
                <img src="<?php echo base_url() ?>/milestone/images/face1.jpg" class="avatar avatar-xs img-circle m-r-1 pull-left" alt="">
                <div class="overflow-hidden">
                  <span><strong>Charles Wilson</strong></span>
                  <small>Last seen today at 03:11</small>
                </div>
              </div>
            </div>
            <div class="modal-body flex scroll-y">
              <p class="text-xs-center text-muted small text-uppercase bold m-b-1">Yesterday</p>
              <div class="chat-conversation-user them">
                <div class="chat-conversation-message">
                  <p>Hey.</p>
                </div>
              </div>
              <div class="chat-conversation-user them">
                <div class="chat-conversation-message">
                  <p>How are the wife and kids, Taylor?</p>
                </div>
              </div>
              <div class="chat-conversation-user me">
                <div class="chat-conversation-message">
                  <p>Pretty good, Samuel.</p>
                </div>
              </div>
              <p class="text-xs-center text-muted small text-uppercase bold m-b-1">Today</p>
              <div class="chat-conversation-user them">
                <div class="chat-conversation-message">
                  <p>Curabitur blandit tempus porttitor.</p>
                </div>
              </div>
              <div class="chat-conversation-user me">
                <div class="chat-conversation-message">
                  <p>Goodnight!</p>
                </div>
              </div>
              <div class="chat-conversation-user them">
                <div class="chat-conversation-message">
                  <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</p>
                </div>
              </div>
            </div>
            <div class="chat-conversation-footer">
                <button class="chat-left">
                  <i class="material-icons">face</i>
                </button>
                <div class="chat-input" contenteditable=""></div>
                <button class="chat-right">
                  <i class="material-icons">photo</i>
                </button>
              </div>
          </div>
        </div>
      </div>
      <!--/Chat panel-->

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
