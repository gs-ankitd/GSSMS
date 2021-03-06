<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
  <title>Dashboard - Smsapp</title>

  <meta charset="utf-8">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width">

  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,700italic,400,600,700">
  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,300,700">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>js/libs/css/ui-lightness/jquery-ui-1.9.2.custom.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css">

  <!-- Plugin CSS -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>js/plugins/morris/morris.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>js/plugins/icheck/skins/minimal/blue.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>js/plugins/select2/select2.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>js/plugins/fileupload/bootstrap-fileupload.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>js/plugins/fullcalendar/fullcalendar.css">

  <!-- App CSS -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/target-admin.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/custom.css">
  <style type="text/css">
  .error{
	color:red;  
  }
  </style>

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
  <![endif]-->
</head>

<body>

  <div class="navbar">

  <div class="container">

    <div class="navbar-header">

      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <i class="fa fa-cogs"></i>
      </button>

      <a class="navbar-brand navbar-brand-image" href="index-2.html">
        <img src="http://www.gsteckno.com/dev/sms/images/smsapp_logo.png" alt="Site Logo" width="120px">
      </a>

    </div> <!-- /.navbar-header -->

    <div class="navbar-collapse collapse">

      

    <!--  <ul class="nav navbar-nav noticebar navbar-left">

        <li class="dropdown">
          <a href="page-notifications.html" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-bell"></i>
            <span class="navbar-visible-collapsed">&nbsp;Notifications&nbsp;</span>
            <span class="badge">3</span>
          </a>

          <ul class="dropdown-menu noticebar-menu" role="menu">
            <li class="nav-header">
              <div class="pull-left">
                Notifications
              </div>

              <div class="pull-right">
                <a href="javascript:;">Mark as Read</a>
              </div>
            </li>

            <li>
              <a href="page-notifications.html" class="noticebar-item">
                <span class="noticebar-item-image">
                  <i class="fa fa-cloud-upload text-success"></i>
                </span>
                <span class="noticebar-item-body">
                  <strong class="noticebar-item-title">Templates Synced</strong>
                  <span class="noticebar-item-text">20 Templates have been synced to the Mashon Demo instance.</span>
                  <span class="noticebar-item-time"><i class="fa fa-clock-o"></i> 12 minutes ago</span>
                </span>
              </a>
            </li>

            <li>
              <a href="page-notifications.html" class="noticebar-item">
                <span class="noticebar-item-image">
                  <i class="fa fa-ban text-danger"></i>
                </span>
                <span class="noticebar-item-body">
                  <strong class="noticebar-item-title">Sync Error</strong>
                  <span class="noticebar-item-text">5 Designs have been failed to be synced to the Mashon Demo instance.</span>
                  <span class="noticebar-item-time"><i class="fa fa-clock-o"></i> 20 minutes ago</span>
                </span>
              </a>
            </li>

            <li class="noticebar-menu-view-all">
              <a href="page-notifications.html">View All Notifications</a>
            </li>
          </ul>
        </li>


        <li class="dropdown">
          <a href="page-notifications.html" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-envelope"></i>
            <span class="navbar-visible-collapsed">&nbsp;Messages&nbsp;</span>
          </a>

          <ul class="dropdown-menu noticebar-menu" role="menu">                
            <li class="nav-header">
              <div class="pull-left">
                Messages
              </div>

              <div class="pull-right">
                <a href="javascript:;">New Message</a>
              </div>
            </li>

            <li>
              <a href="page-notifications.html" class="noticebar-item">
                <span class="noticebar-item-image">
                  <img src="img/avatars/avatar-1-md.jpg" style="width: 50px" alt="">
                </span>

                <span class="noticebar-item-body">
                  <strong class="noticebar-item-title">New Message</strong>
                  <span class="noticebar-item-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit...</span>
                  <span class="noticebar-item-time"><i class="fa fa-clock-o"></i> 20 minutes ago</span>
                </span>
              </a>
            </li>

            <li>
              <a href="page-notifications.html" class="noticebar-item">
                <span class="noticebar-item-image">
                  <img src="img/avatars/avatar-2-md.jpg" style="width: 50px" alt="">
                </span>

                <span class="noticebar-item-body">
                  <strong class="noticebar-item-title">New Message</strong>
                  <span class="noticebar-item-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit...</span>
                  <span class="noticebar-item-time"><i class="fa fa-clock-o"></i> 5 hours ago</span>
                </span>
              </a>
            </li>

            <li class="noticebar-menu-view-all">
              <a href="page-notifications.html">View All Messages</a>
            </li>
          </ul>
        </li>


        <li class="dropdown">
          <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-exclamation-triangle"></i>
            <span class="navbar-visible-collapsed">&nbsp;Alerts&nbsp;</span>
          </a>

          <ul class="dropdown-menu noticebar-menu noticebar-hoverable" role="menu">                
            <li class="nav-header">
              <div class="pull-left">
                Alerts
              </div>
            </li>

            <li class="noticebar-empty">                  
              <h4 class="noticebar-empty-title">No alerts here.</h4>
              <p class="noticebar-empty-text">Check out what other makers are doing on Explore!</p>                
            </li>
          </ul>
        </li>

      </ul>-->

      <ul class="nav navbar-nav navbar-right">   

        <li>
          <a href="javascript:;">About</a>
        </li>    
        <!--   
        <li>
          <a href="javascript:;">Resources</a>
        </li>    
 -->
        <li class="dropdown navbar-profile">
          <a class="dropdown-toggle" data-toggle="dropdown" href="javascript:;">
            <img src="<?php echo base_url();  ?>img/avatars/avatar-1-xs.jpg" class="navbar-profile-avatar" alt="">
            <span class="navbar-profile-label">rod@rod.me &nbsp;</span>
            <i class="fa fa-caret-down"></i>
          </a>

          <ul class="dropdown-menu" role="menu">

            <li>
              <a href="page-profile.html">
                <i class="fa fa-user"></i> 
                &nbsp;&nbsp;My Profile
              </a>
            </li>

           <!--  <li>
              <a href="page-pricing.html">
                <i class="fa fa-dollar"></i> 
                &nbsp;&nbsp;Plans &amp; Billing
              </a>
            </li>

            <li>
              <a href="page-settings.html">
                <i class="fa fa-cogs"></i> 
                &nbsp;&nbsp;Settings
              </a>
            </li>
 -->
            <li class="divider"></li>

            <li>
              <a href="account-login.html">
                <i class="fa fa-sign-out"></i> 
                &nbsp;&nbsp;Logout
              </a>
            </li>

          </ul>

        </li>

      </ul>

       



       

    </div> <!--/.navbar-collapse -->

  </div> <!-- /.container -->

</div> <!-- /.navbar -->

 <div class="mainbar">

  <div class="container">

    <button type="button" class="btn mainbar-toggle" data-toggle="collapse" data-target=".mainbar-collapse">
      <i class="fa fa-bars"></i>
    </button>

    <div class="mainbar-collapse collapse">

      <ul class="nav navbar-nav mainbar-nav">

        <li class="active">
          <a href="index-2.html">
            <i class="fa fa-dashboard"></i>
            Dashboard
          </a>
        </li>

        <li class="dropdown ">
          <a href="#about" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">
            <i class="fa fa-envelope"></i>
            Send SMS
            <span class="caret"></span>
          </a>

          <ul class="dropdown-menu">   
            <li><a href="<?php echo site_url('Bulksms')?>"><i class="fa fa-tasks nav-icon"></i> Bulk SMS</a></li>
            <li><a href="singlesms"><i class="fa fa-user nav-icon"></i> Single SMS</a></li>
            <li><a href="groupsms"><i class="fa fa-group nav-icon"></i> Group SMS</a></li>
            <li><a href="schedulesms"><i class="fa fa-clock-o nav-icon"></i> Scheduled SMS</a></li>
           
          </ul>
        </li>

        <li class="dropdown ">
          <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">
          <i class="fa fa-file-text"></i> 
          Reports
            <span class="caret"></span>
          </a>

          <ul class="dropdown-menu">
          
            <li>
              <a href="ui-form-regular.html">
              <i class="fa fa-upload nav-icon"></i> 
              Send Logs
              </a>
            </li>

            <li>
              <a href="ui-form-extended.html">
              <i class="fa fa-download nav-icon"></i> 
              Recieved Logs
              </a>
            </li>
			</ul>
        </li>

        <li class="dropdown ">
          <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">
            <i class="fa fa-wrench"></i>
            Manage
            <span class="caret"></span>
          </a>

          <ul class="dropdown-menu">
            <li><a href="templates"><i class="fa fa-file-text-o nav-icon"></i> Sms Templates</a></li>
            <li><a href="keywords"><i class="fa fa-font nav-icon"></i> Keywords</a></li>
            <li><a href="addressbook"><i class="fa fa-book nav-icon"></i> Address Book</a></li>
           </ul>
        </li>  
       

      </ul>

    </div> <!-- /.navbar-collapse -->   

  </div> <!-- /.container --> 

</div> <!-- /.mainbar -->






