<!DOCTYPE html>
<html dir="ltr" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta
      name="keywords"
      content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, material admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, material design, material dashboard bootstrap 5 dashboard template"
    />
    <meta
      name="description"
      content="MaterialPro is powerful and clean admin dashboard template, inpired from Google's Material Design"
    />
    <link
      rel="stylesheet"
      type="text/css"
      href="assets/libs/select2/dist/css/select2.min.css"
    />
    <link href="css/mystyle.css" rel="stylesheet">
    <meta name="robots" content="noindex,nofollow" />
    <title>{{ config('app.name', 'Ellatech') }}</title>
   
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="80x80" href="assets/images/favicon.png"  />
    <link rel="stylesheet" href="assets/libs/apexcharts/dist/apexcharts.css" />
    <!-- Vector CSS -->
    <link href="assets/libs/jvectormap/jquery-jvectormap.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet" />
  
    <link rel="stylesheet" type="text/css" href="assets/libs/pickadate/lib/themes/default.css" />
    <link rel="stylesheet" type="text/css" href="assets/libs/pickadate/lib/themes/default.date.css" />
    <link rel="stylesheet" type="text/css" href="assets/libs/pickadate/lib/themes/default.time.css"  />
  </head>

  <body>
  <?php $useridtousess = Auth::user()->id;
/// geting the users role
$usercompanys = DB::table('users')->where('id', $useridtousess)->value('companyname'); 
$currentrole = DB::table('users')->where('id', $useridtousess)->value('mmaderole'); 
$realcompanyname = DB::table('companydetails')->where('id', $usercompanys)->value('tradename'); 
$currentrolrname = DB::table('roles')->where('id', $currentrole)->value('rolename'); 
$udet = $realcompanyname."     -   ".$currentrolrname;
$logedinname = DB::table('users')->where('id', $useridtousess)->value('name'); 

?>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">

    <div class="spinner-border" style="width: 3rem; height: 3rem" role="status">
                    <span class="sr-only">Loading...</span>
                  </div>
      <svg
        class="tea lds-ripple"
        width="37"
        height="48"
        viewbox="0 0 37 48"
        fill="none"
        xmlns="http://www.w3.org/2000/svg"
      >
        <path
          d="M27.0819 17H3.02508C1.91076 17 1.01376 17.9059 1.0485 19.0197C1.15761 22.5177 1.49703 29.7374 2.5 34C4.07125 40.6778 7.18553 44.8868 8.44856 46.3845C8.79051 46.79 9.29799 47 9.82843 47H20.0218C20.639 47 21.2193 46.7159 21.5659 46.2052C22.6765 44.5687 25.2312 40.4282 27.5 34C28.9757 29.8188 29.084 22.4043 29.0441 18.9156C29.0319 17.8436 28.1539 17 27.0819 17Z"
          stroke="#1e88e5"
          stroke-width="2"
        ></path>
        <path
          d="M29 23.5C29 23.5 34.5 20.5 35.5 25.4999C36.0986 28.4926 34.2033 31.5383 32 32.8713C29.4555 34.4108 28 34 28 34"
          stroke="#1e88e5"
          stroke-width="2"
        ></path>
        <path
          id="teabag"
          fill="#1e88e5"
          fill-rule="evenodd"
          clip-rule="evenodd"
          d="M16 25V17H14V25H12C10.3431 25 9 26.3431 9 28V34C9 35.6569 10.3431 37 12 37H18C19.6569 37 21 35.6569 21 34V28C21 26.3431 19.6569 25 18 25H16ZM11 28C11 27.4477 11.4477 27 12 27H18C18.5523 27 19 27.4477 19 28V34C19 34.5523 18.5523 35 18 35H12C11.4477 35 11 34.5523 11 34V28Z"
        ></path>
        <path
          id="steamL"
          d="M17 1C17 1 17 4.5 14 6.5C11 8.5 11 12 11 12"
          stroke-width="2"
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke="#1e88e5"
        ></path>
        <path
          id="steamR"
          d="M21 6C21 6 21 8.22727 19 9.5C17 10.7727 17 13 17 13"
          stroke="#1e88e5"
          stroke-width="2"
          stroke-linecap="round"
          stroke-linejoin="round"
        ></path>
      </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
      <!-- ============================================================== -->
      <!-- Topbar header - style you can find in pages.scss -->
      <!-- ============================================================== -->
      <header class="topbar">
        <nav class="navbar top-navbar navbar-expand-md navbar-dark">
          <div class="navbar-header">
            <!-- This is for the sidebar toggle which is visible on mobile only -->
            <a
              class="nav-toggler waves-effect waves-light d-block d-md-none"
              href="javascript:void(0)"
              ><i class="ti-menu ti-close"></i
            ></a>
            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <a class="navbar-brand" href="">
              <!-- Logo icon -->
              <b class="logo-icon">
           
              
              </b>
              <!--End Logo icon -->
              <!-- Logo text -->
              <span class="logo-text">
                <!-- dark Logo text -->
           
                <!-- Light Logo text -->
                <img
                  src="assets/images/logo-light-text.png"
                  class="light-logo"
                  alt="homepage"
                />
              </span>
            </a>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Toggle which is visible on mobile only -->
            <!-- ============================================================== -->
            <a
              class="topbartoggler d-block d-md-none waves-effect waves-light"
              href="javascript:void(0)"
              data-bs-toggle="collapse"
              data-bs-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent"
              aria-expanded="false"
              aria-label="Toggle navigation"
              ><i class="ti-more"></i
            ></a>
          </div>
          <!-- ============================================================== -->
          <!-- End Logo -->
          <!-- ============================================================== -->
          <div class="navbar-collapse collapse" id="navbarSupportedContent">
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav me-auto">
              <!-- This is  -->
              <li class="nav-item">
          <a class="nav-link sidebartoggler d-none d-md-block waves-effect waves-dark "  href="javascript:void(0)"><i class="ti-menu"></i></a>
             
              </li>
              
              
            </ul>
            <!-- ============================================================== -->
            <!-- Right side toggle and nav items -->
            <!-- ============================================================== -->
        
          </div>
        </nav>
      </header>
      <!-- ============================================================== -->
      <!-- End Topbar header -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Left Sidebar - style you can find in sidebar.scss  -->
      <!-- ============================================================== -->
      <div  id="app">
      <aside class="left-sidebar">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
          <!-- User profile -->
          <b>
      
 </b>   
          <div

            class="user-profile position-relative"
            style="
              background: url(assets/images/background/user-info.jpg)
                no-repeat;
            "
          >
            <!-- User profile image -->
            <div class="profile-img">
              <img
                src="assets/images/users/profile.png"
                alt="user"
                class="w-100"
              />
            </div>
            <!-- User profile text-->
            <div class="profile-text pt-1 dropdown">
              <a href="#" class="dropdown-toggle u-dropdown w-100 text-white d-block position-relative " id="dropdownMenuLink" data-bs-toggle="dropdown"
                aria-expanded="false"
                ><?php echo $logedinname; ?></a
              >
              <div
                class="dropdown-menu animated flipInY"
                aria-labelledby="dropdownMenuLink"
              >
                <a class="dropdown-item" href="#"
                  ><i
                    data-feather="user"
                    class="feather-sm text-info me-1 ms-1"
                  ></i>
                  My Profile</a
                >
                <a class="dropdown-item" href="#"
                  ><i
                    data-feather="credit-card"
                    class="feather-sm text-info me-1 ms-1"
                  ></i>
                  My Balance</a
                >
                <a class="dropdown-item" href="#"
                  ><i
                    data-feather="mail"
                    class="feather-sm text-success me-1 ms-1"
                  ></i>
                  Inbox</a
                >
                <div class="dropdown-divider"></div>
             
                <a class="dropdown-item" href="{{ route('logout') }}"  onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();"
                  ><i
                    data-feather="log-out"
                    class="feather-sm text-danger me-1 ms-1"
                  ></i>
                  Logout</a
                ><form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf 
                <i  data-feather="log-out"  class="feather-sm text-danger me-1 ms-1" ></i>
                            <span>     <a  href="{{ route('logout') }}"
           onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();" >
                </a></form>

                <div class="dropdown-divider"></div>
                <div class="ps-4 p-2">
                  <a href="#" class="btn d-block w-100 btn-info rounded-pill"
                    >View Profile</a
                  >
                </div>
              </div>
            </div>
          </div>
          <!-- End User profile text-->






          <!-- Sidebar navigation-->
          <nav class="sidebar-nav">
            <ul id="sidebarnav">
              <li class="nav-small-cap">
                <i class="mdi mdi-dots-horizontal"></i>
                <span class="hide-menu">Personal</span>
              </li>
              <?php
              
              $useridtousess = Auth::user()->id;
              $usercompany = Auth::user()->companyname;
              $usercountry = Auth::user()->countryname;

/// geting the users role
$myuserroledefined = DB::table('users')
->where('id', $useridtousess)

->value('mmaderole'); ?>





<?php 
/// selecting the allowed menues
$allowedmain  = DB::table('rolenaccmains')
->where('roleto', $myuserroledefined)
// ->where('companyname', $usercompany)
// ->where('countryname', $usercountry)
->get();
foreach ($allowedmain as $rowall)
{
     $component = ($rowall->component);

     $mainheaderssd = DB::table('mainmenucomponents')->where('id', $component)->get();

     foreach ($mainheaderssd as $myheaders)
     {
         $hname = ($myheaders->mainmenuname);
     
         $mainmenuno = ($myheaders->id);
         $classtoicon = ($myheaders->iconclass);
     /////

    //$shid = ($rowsubmenuesselection->shid);
    //$routelinkdd = ($rowsubmenuesselection->linkrouterre);


?>    

<div class="dropdown-divider"></div>

              <li class="sidebar-item">
                <a
                  class="sidebar-link has-arrow waves-effect waves-dark"
                  href="javascript:void(0)"
                  aria-expanded="false"
                  ><i class="<?php echo $classtoicon ?> "></i
                  ><span class="hide-menu"><?php echo $hname; ?></span></a
                >
                <ul aria-expanded="false" class="collapse first-level">
                <?php 
   //// woorking on the sub menues
   /// getting the logged in user role
   $lirole = Auth::user()->type;
   $allowedsubmenu  = DB::table('rolenaccsumbmens')->where('mainheader', $mainmenuno)->where('roleto', $myuserroledefined)->get();
foreach ($allowedsubmenu as $rowallsub)
{
     $componentvvvvbbb = ($rowallsub->component);
 $submenuesselection = DB::table('submheaders')->where('id',  $componentvvvvbbb)->orderBy('dorder', 'Asc')->get();
 foreach ($submenuesselection as $rowsubmenuesselection)
 {
     $submname = ($rowsubmenuesselection->submenuname);
 
     $shid = ($rowsubmenuesselection->shid);
     $routelinkdd = ($rowsubmenuesselection->linkrouterre);
 
  
  ?>
   
  
                  <li class="sidebar-item">
                    <a
                      href="<?php echo $routelinkdd; ?>"
                      class="sidebar-link"
                      ><i class="mdi mdi-format-align-left"></i
                      ><span class="hide-menu">
                      <?php echo $submname; ?>
                      </span></a>
                    <?php } //// ?>
          <?php } //// ?>
          
                  </li>
                
                
              
              
              
          
            </ul>
            
            <?php } 

}

?>
 <div class="dropdown-divider"></div>
    <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="authentication-login1.html"
                  aria-expanded="false"
                  ><i class="mdi mdi-directions"></i
                  ><span class="hide-menu">Log Out</span></a
                >
              </li>
          </nav>
          <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
        <!-- Bottom points-->
        <div class="sidebar-footer">
          <!-- item-->
          <a
            href=""
            class="link"
            data-bs-toggle="tooltip"
            data-bs-placement="top"
            title="Settings"
            ><i class="ti-settings"></i
          ></a>
          <!-- item-->
          <a
            href=""
            class="link"
            data-bs-toggle="tooltip"
            data-bs-placement="top"
            title="Email"
            ><i class="mdi mdi-gmail"></i
          ></a>
          <!-- item-->
          <a
            href=""
            class="link"
            data-bs-toggle="tooltip"
            data-bs-placement="top"
            title="Logout"
            ><i class="mdi mdi-power"></i
          ></a>
        </div>
        <!-- End Bottom points-->
      </aside>
      <!-- ============================================================== -->
      <!-- End Left Sidebar - style you can find in sidebar.scss  -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Page wrapper  -->
      <!-- ============================================================== -->
      <div class="page-wrapper">
        <div class="row page-titles">
          <div class="col-md-5 col-12 align-self-center">
       
          
          </div>
          <div class="col-md-7 col-12 align-self-center d-none d-md-block">
            <div class="d-flex mt-2 justify-content-end">
              <div class="d-flex me-3 ms-2">
                <div class="chart-text me-2">
                  <h6 class="mb-0"><small>THIS MONTH</small></h6>
                  <h4 class="mt-0 text-info"></h4>
                </div>
                <div class="spark-chart">
                  <div id="monthchart"></div>
                </div>
              </div>
              <div class="d-flex ms-2">
                <div class="chart-text me-2">
                  <h6 class="mb-0"><small>LAST MONTH</small></h6>
                  <h4 class="mt-0 text-primary"></h4>
                </div>
                <div class="spark-chart">
                  <div id="lastmonthchart"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
       
            <!-- Column -->

<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->


<div class="row">
           
<router-view></router-view>
<vue-progress-bar></vue-progress-bar>   
            
    

          
          </div>











            <!-- ////////////////////////////////////////////////////////////  -->
        
    


       

 </div>
       
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer">
          All Rights Reserved by Materialpro admin.
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
      </div>
      <!-- ============================================================== -->
      <!-- End Page wrapper  -->
      <!-- ============================================================== -->
    
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- customizer Panel -->
    <!-- ============================================================== -->
  
    <div class="chat-windows"></div>

    </div> 
    <!-- mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm -->
    






















    <script src="/js/app.js"></script>

    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- apps -->
    <script src="dist/js/app.min.js"></script>
    <script src="dist/js/app.init.dark.js"></script>
    <script src="dist/js/app-style-switcher.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/feather.min.js"></script>
    <script src="dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <script src="assets/libs/apexcharts/dist/apexcharts.min.js"></script>
    <!-- Vector map JavaScript -->
    <script src="assets/libs/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="assets/extra-libs/jvector/jquery-jvectormap-us-aea-en.js"></script>
    <!-- Chart JS -->
    <script src="dist/js/pages/dashboards/dashboard2.js"></script>
    <script src="assets/libs/select2/dist/js/select2.full.min.js"></script>
    <script src="assets/libs/select2/dist/js/select2.min.js"></script>
    <script src="dist/js/pages/forms/select2/select2.init.js"></script>
    <script src="assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="dist/js/pages/datatable/datatable-api.init.js"></script>
    <script src="assets/libs/pickadate/lib/compressed/picker.js"></script>
    <script src="assets/libs/pickadate/lib/compressed/picker.date.js"></script>
    <script src="assets/libs/pickadate/lib/compressed/picker.time.js"></script>
    <script src="assets/libs/pickadate/lib/compressed/legacy.js"></script>
    <script src="assets/libs/moment/moment.js"></script>
    <script src="assets/libs/daterangepicker/daterangepicker.js"></script>
    <script src="dist/js/pages/forms/datetimepicker/datetimepicker.init.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/vue/1.0.28/vue.min.js"></script>
  </body>
</html>
