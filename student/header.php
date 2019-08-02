<?php

    require_once("../dbcon.php");
    
    $page = explode("/",$_SERVER['PHP_SELF']);

    $page = end($page);

   
    session_start();

    if(!isset($_SESSION['student_login']) && !isset($_COOKIE['student_login'])){

        header('location: login.php');

    }

   $id = isset($_COOKIE['student_id']) ? $_COOKIE['student_id'] : $_SESSION['student_id'];

   $data = mysqli_query($con, "SELECT * FROM students WHERE id = '$id'");

   $student_info = mysqli_fetch_assoc($data);


 ?>


<!doctype html>
<html lang="en" class="fixed left-sidebar-top">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>PUST | Library Management System</title>
    <link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-icon-120x120.png">
    <link rel="icon" type="image/png" sizes="192x192" href="favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <!--load progress bar-->
    <script src="../assets/vendor/pace/pace.min.js"></script>
    <link href="../assets/vendor/pace/pace-theme-minimal.css" rel="stylesheet" />

    <!--BASIC css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="../assets/vendor/animate.css/animate.css">
    <!--SECTION css-->
    <!-- ========================================================= -->
    <!--Notification msj-->
    <link rel="stylesheet" href="../assets/vendor/toastr/toastr.min.csss">
    <!--Magnific popup-->
    <link rel="stylesheet" href="../assets/vendor/magnific-popup/magnific-popup.css">
    <!--dataTable-->
    <link rel="stylesheet" href="../assets/vendor/data-table/media/css/dataTables.bootstrap.min.css">
    <!--TEMPLATE css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../assets/stylesheets/css/style.css">


</head>

<body>
    <div class="wrap">
        <!-- page HEADER -->
        <!-- ========================================================= -->
        <div class="page-header">
            <!-- LEFTSIDE header -->
            <div class="leftside-header">
                <div class="logo">
                    <a href="index.php" class="on-click">
                        <h3>PUST</h3>
                        <!-- <img alt="logo" src="images/header-logo.png" /> -->
                    </a>
                </div>
                <div id="menu-toggle" class="visible-xs toggle-left-sidebar" data-toggle-class="left-sidebar-open" data-target="html">
                    <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                </div>
            </div>
            <!-- RIGHTSIDE header -->
            <div class="rightside-header">
                <div class="header-middle"></div>
               
                
                <!--USER HEADERBOX -->
                <div class="header-section" id="user-headerbox">
                    <div class="user-header-wrap">
                        <div class="user-photo">
                        

                        <?php 

                            if($student_info['image'] == NULL){ ?>

                                <img alt="profile photo" src="../images/profile-placeholder.png"  />

                        <?php   } else{ ?>

                            <img alt="profile photo" src="../images/profile/<?php echo $student_info['image']; ?>"   />


                <?php       }



                             ?>


                        </div>
                        <div class="user-info">
                             <span class="user-name"><?php echo ucwords($student_info['fname'].' '.$student_info['lname']); ?></span>
                            <span class="user-profile">Student</span>
                           
                        </div>
                        <i class="fa fa-plus icon-open" aria-hidden="true"></i>
                        <i class="fa fa-minus icon-close" aria-hidden="true"></i>
                    </div>
                    <div class="user-options dropdown-box">
                        <div class="drop-content basic">
                            <ul>
                                <li> <a href="profile.php"><i class="fa fa-user" aria-hidden="true"></i> Profile</a></li>
                                <li> <a href="edit-profile.php"><i class="fa fa-pencil" aria-hidden="true"></i> Edit Profile</a></li>
                                <li> <a  onclick="return confirm('Are you sure you want to parmanently deactivate your account?')" href="deactivate.php?profileid=<?= base64_encode($student_info['id']); ?>"><i class="fa fa-trash" aria-hidden="true"></i>Deactive Account</a></li>
                               
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="header-separator"></div>
                <!--Log out -->
                <div class="header-section">
                    <a href="logout.php" data-toggle="tooltip" data-placement="left" title="Logout"><i class="fa fa-sign-out log-out" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
        <!-- page BODY -->
        <!-- ========================================================= -->
        <div class="page-body">
            <!-- LEFT SIDEBAR -->
            <!-- ========================================================= -->
            <div class="left-sidebar">
                <!-- left sidebar HEADER -->
                <div class="left-sidebar-header">
                    <div class="left-sidebar-title">Navigation</div>
                    <div class="left-sidebar-toggle c-hamburger c-hamburger--htla hidden-xs" data-toggle-class="left-sidebar-collapsed" data-target="html">
                        <span></span>
                    </div>
                </div>
                <!-- NAVIGATION -->
                <!-- ========================================================= -->
                <div id="left-nav" class="nano">
                    <div class="nano-content">
                        <nav>
                            <ul class="nav nav-left-lines" id="main-nav">
                                <!--HOME-->
                                <li class="<?= $page == 'index.php' ? 'active-item' : '' ?>"><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i><span>Dashboard</span></a></li>
                                <li class="<?= $page == 'books.php' ? 'active-item' : '' ?>"><a href="books.php"><i class="fa fa-book" aria-hidden="true"></i><span>Books</span></a></li>
                                <li class="<?= $page == 'profile.php' ? 'active-item' : '' ?>"><a href="profile.php"><i class="fa fa-user" aria-hidden="true"></i><span>Profile</span></a></li>
                                <li class="<?= $page == 'edit-profile.php' ? 'active-item' : '' ?>"><a href="edit-profile.php"><i class="fa fa-pencil" aria-hidden="true"></i><span>Edit Profile</span></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- CONTENT -->
            <!-- ========================================================= -->
            <div class="content">