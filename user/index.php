<?php

  session_start();
  require_once "../system/db.php";
  $judul = 'Dashboard';
  $file = '../view/dashboard.php';
  $user = $_SESSION['nama'];

  if(!isset($_SESSION['user'])){
    header('Location: '.$url);
  }

  if(isset($_GET['page'])){

    $page = $_GET['page'];

    switch($page){

      case 'gudang':
       $file = '../view/gudang.php';
       $judul = 'Gudang';
      break;

      case 'encrypt':
       $file = '../view/web/enc.php';
      break;

      default:
       $file = '../view/dashboard.php';
       $judul = 'Dashboard';
      break;

    }

  }

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $judul ?> | Tabungin</title>
    <link rel="stylesheet" href="<?= $url ?>assets/css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="<?= $url ?>assets/css/font-awesome.min.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="<?= $url ?>assets/css/ionicons.min.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="<?= $url ?>assets/css/main.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="<?= $url ?>assets/css/owl.carousel.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="<?= $url ?>assets/css/owl.transitions.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="<?= $url ?>assets/css/progressbar/bootstrap-progressbar-3.3.0.css">
    <link rel="stylesheet" href="<?= $url ?>assets/css/animate.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="<?= $url ?>assets/css/hover.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="<?= $url ?>assets/css/sweetalert.css" media="screen" title="no title" charset="utf-8">

    <link href="<?= $url ?>assets/css/custom.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= $url ?>assets/css/maps/jquery-jvectormap-2.0.3.css" />
    <link href="<?= $url ?>assets/css/icheck/flat/green.css" rel="stylesheet" />
    <link href="<?= $url ?>assets/css/floatexamples.css" rel="stylesheet" type="text/css" />

    <script src="<?= $url ?>assets/js/jquery.min.js"></script>
    <script src="<?= $url ?>assets/js/nprogress.js"></script>

  </head>

  <body class="nav-md">

    <div class="container body">


      <div class="main_container">

        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">

            <div class="navbar nav_title" style="border: 0;">
              <a href="<?= $url ?>" class="site_title"><i class="fa fa-money"></i> <span>Tabungin</span></a>
            </div>
            <div class="clearfix"></div>

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li><a href="<?= $url ?>user"><i class="fa fa-home"></i> Dashboard </a></li>
                  <li><a href="?page=gudang"><i class="fa fa-archive"></i> Gudang </a></li>
                  <li><a href="<?= $url ?>"><i class="fa fa-star"></i> Rewards </a></li>
                </ul>
              </div>
              <div class="menu_section">
                <h3>Tabungan Saya</h3>
                <ul class="nav side-menu">
                  <li><a href="<?= $url ?>"><i class="fa fa-money"></i> Dompet </a></li>
                  <li><a><i class="fa fa-book"></i> Catatan <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu" style="display: none">
                      <li><a href="index3.html">Auto Followers</a>
                      </li>
                      <li><a href="index3.html">Auto Likes</a>
                      </li>
                    </ul>
                  </li>
                    <li><a><i class="fa fa-shopping-basket"></i> Barang <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu" style="display: none">
                        <li><a href="?page=fp_like">Fanspage Likes</a>
                        </li>
                        <li><a href="index3.html">Fanspage Followers</a>
                        </li>
                        <li><a href="index3.html">Group Followers</a>
                        </li>
                        <li><a href="index3.html">People Followers</a>
                        </li>
                        <li><a href="index.html">Status Likes</a>
                        </li>
                        <li><a href="index2.html">Status Comments</a>
                        </li>
                      </ul>
                    </li>
                  <li><a><i class="fa fa-flag-checkered"></i> Sukses <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu" style="display: none">
                      <li><a href="index3.html">Sticker Premium <span class="label label-danger pull-right">Hot</span></a>
                      </li>
                    </ul>
                  </li>
                  <li><a href="<?= $url ?>"><i class="fa fa-info-circle"></i> Info</a></li>
                  <li><a href="<?= $url ?>"><i class="fa fa-gear"></i> Pengaturan</a></li>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">

          <div class="nav_menu">
            <nav class="" role="navigation">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?= $url ?>assets/images/img.jpg" alt=""><?= $user ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                    <li><a href="javascript:;">  Profile</a>
                    </li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li>
                      <a href="javascript:;">Help</a>
                    </li>
                    <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                    </li>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list animated fadeInDown" role="menu">
                    <li>
                      <a>
                        <span class="image">
                                          <img src="<?= $url ?>assets/images/img.jpg" alt="Profile Image" />
                                      </span>
                        <span>
                                          <span>John Smith</span>
                        <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                                          Film festivals used to be do-or-die moments for movie makers. They were where...
                                      </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image">
                                          <img src="<?= $url ?>assets/images/img.jpg" alt="Profile Image" />
                                      </span>
                        <span>
                                          <span>John Smith</span>
                        <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                                          Film festivals used to be do-or-die moments for movie makers. They were where...
                                      </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image">
                                          <img src="<?= $url ?>assets/images/img.jpg" alt="Profile Image" />
                                      </span>
                        <span>
                                          <span>John Smith</span>
                        <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                                          Film festivals used to be do-or-die moments for movie makers. They were where...
                                      </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image">
                                          <img src="<?= $url ?>assets/images/img.jpg" alt="Profile Image" />
                                      </span>
                        <span>
                                          <span>John Smith</span>
                        <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                                          Film festivals used to be do-or-die moments for movie makers. They were where...
                                      </span>
                      </a>
                    </li>
                    <li>
                      <div class="text-center">
                        <a href="inbox.html">
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>

              </ul>
            </nav>
          </div>

        </div>
        <!-- /top navigation -->


        <!-- page content -->
        <div class="right_col" role="main">
              <?php include_once("$file") ?>


        </div>


            </div>

          </div>

          <!-- footer content -->

            <div style="color:#fff;margin-right:1em" class="copyright-info">
              <p class="pull-right">&copy; Tabungin - <?= date('Y') ?>
              </p>
            </div>
          <!-- /footer content -->
        </div>
        <!-- /page content -->

      </div>

    </div>

    <div id="custom_notifications" class="custom-notifications dsp_none">
      <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
      </ul>
      <div class="clearfix"></div>
      <div id="notif-group" class="tabbed_notifications"></div>
    </div>

    <script src="<?= $url ?>assets/js/bootstrap.min.js"></script>

    <!-- gauge js -->
    <script type="text/javascript" src="<?= $url ?>assets/js/gauge/gauge.min.js"></script>
    <script type="text/javascript" src="<?= $url ?>assets/js/gauge/gauge_demo.js"></script>
    <!-- chart js -->
    <script src="<?= $url ?>assets/js/chartjs/chart.min.js"></script>
    <!-- bootstrap progress js -->
    <script src="<?= $url ?>assets/js/progressbar/bootstrap-progressbar.min.js"></script>
    <script src="<?= $url ?>assets/js/nicescroll/jquery.nicescroll.min.js"></script>
    <!-- icheck -->
    <script src="<?= $url ?>assets/js/icheck/icheck.min.js"></script>
    <!-- daterangepicker -->
    <script type="text/javascript" src="<?= $url ?>assets/js/moment.min.js"></script>
    <script type="text/javascript" src="<?= $url ?>assets/js/datepicker/daterangepicker.js"></script>
    <!-- input mask -->
    <script src="<?= $url ?>assets/js/input_mask/jquery.inputmask.js"></script>
    <script src="<?= $url ?>assets/js/custom.js"></script>
    <script src="<?= $url ?>assets/js/main.js"></script>

  </body>
</html>
