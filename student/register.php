<?php

require_once("../dbcon.php");

session_start();

if(isset($_SESSION['student_login'])){

        header('location: index.php');

    }


if(isset($_POST['student_register'])){

    $fname      = $_POST['fname'];
    $lname      = $_POST['lname'];
    $email      = $_POST['email'];
    $username   = $_POST['username'];
    $password   = $_POST['password'];
    $roll       = $_POST['roll'];
    $reg        = $_POST['reg'];
    $phone      = $_POST['phone'];



   

    $input_errors = array();

    if(empty($fname)){

        $input_errors['fname'] = "First Name Field is required";

    }
    if(empty($lname)){

        $input_errors['lname'] = "Last Name Field is required";

    }
    if(empty($email)){

        $input_errors['email'] = "Email Field is required";

    }
    if(empty($username)){

        $input_errors['username'] = "Username Field is required";

    }
    if(empty($password)){

        $input_errors['password'] = "Password Field is required";

    }
    if(empty($roll)){

        $input_errors['roll'] = "Roll Field is required";

    }
    if(empty($reg)){

        $input_errors['reg'] = "Reg. No. Field is required";

    }
     if(empty($phone)){

        $input_errors['phone'] = "Phone Field is required";

    }





 


    if(count($input_errors) == 0){



        $email_check = mysqli_query($con,"SELECT * FROM students WHERE email='$email'");

        $email_rows = mysqli_num_rows($email_check);

        if($email_rows == 0 ){
           
            $username_check = mysqli_query($con,"SELECT * FROM students WHERE username='$username'");

            $username_rows = mysqli_num_rows($username_check);

            if($username_rows ==  0 ){
                
                if(strlen($password) > 5){

                     $password_hash = password_hash($password, PASSWORD_DEFAULT);


                        $result =  mysqli_query($con, "INSERT INTO students(fname, lname, roll, reg, email, username, password, status, phone) VALUES ('$fname','$lname','$roll','$reg','$email','$username','$password_hash','0','$phone')");

                     if($result){

                        $success = "You have successfully registered!";

                        }else{
                        $error = "Something's wrong with the registration entry!";
                        }

                }else{

                    $password_long = "Passwords must be at least 8 characters long";
                }

            }else{
                $username_exists = "This Username already exists";

            }
        }else{

            $email_exists = "This email already exists";

        }


      


    }

   
 


}




?>



<!doctype html>
<html lang="en" class="fixed accounts sign-in">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>PUST | Library Management System</title>
    <link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-icon-120x120.png">
    <link rel="icon" type="image/png" sizes="192x192" href="favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <!--BASIC css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="../assets/vendor/animate.css/animate.css">
    <!--SECTION css-->
    <!-- ========================================================= -->
    <!--TEMPLATE css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../assets/stylesheets/css/style.css">
</head>

<body>
<div class="wrap">
    <!-- page BODY -->
    <!-- ========================================================= -->
    <div class="page-body animated slideInDown">
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
        <!--LOGO-->
        <div class="logo">
            <img alt="logo" src="../assets/images/logo-dark.png" />

        <?php if(isset($success)){ ?>
            <div class="alert alert-success" role="alert">
              <strong><?php echo $success; ?></strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?php } ?>

            <?php if(isset($error)){ ?>
            <div class="alert alert-danger" role="alert">
              <strong><?php echo $error; ?></strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?php } ?>

            <?php if(isset($email_exists)){ ?>
            <div class="alert alert-danger" role="alert">
              <strong><?php echo $email_exists; ?></strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?php } ?>

            <?php if(isset($username_exists)){ ?>
            <div class="alert alert-danger" role="alert">
              <strong><?php echo $username_exists; ?></strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?php } ?>
            <?php if(isset($password_long)){ ?>
            <div class="alert alert-danger" role="alert">
              <strong><?php echo $password_long; ?></strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?php } ?>



        </div>
        <div class="box">
            <!--SIGN IN FORM-->
            <div class="panel mb-none">
                <div class="panel-content bg-scale-0">
                    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" placeholder="First Name" name="fname" value="<?= isset($fname) ? "$fname" : "" ?>">
                                <i class="fa fa-user"></i>
                            </span>
                            <?php 

                            if(isset($input_errors['fname'])){

                                echo '<span class="input-errors">'.$input_errors['fname'].'</span>';

                            }


                            ?>
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" placeholder="Last Name"  name="lname" value="<?= isset($lname) ? "$lname" : "" ?>">
                                <i class="fa fa-child"></i>
                            </span>
                            <?php 

                            if(isset($input_errors['lname'])){

                                echo '<span class="input-errors">'.$input_errors['lname'].'</span>';

                            }


                            ?>
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="email" class="form-control" placeholder="Email" name="email" value="<?= isset($email) ? "$email" : "" ?>">
                                <i class="fa fa-envelope"></i>
                            </span>
                            <?php 

                            if(isset($input_errors['email'])){

                                echo '<span class="input-errors">'.$input_errors['email'].'</span>';

                            }


                            ?>
                        </div>
                        <div class="form-group">
                            <span class="input-with-icon">
                                <input type="password" class="form-control" name="password" placeholder="Password">
                                <i class="fa fa-key"></i>
                            </span>
                            <?php 

                            if(isset($input_errors['password'])){

                                echo '<span class="input-errors">'.$input_errors['password'].'</span>';

                            }


                            ?>
                        </div>
                         <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" placeholder="Username" name="username" value="<?= isset($username) ? "$username" : "" ?>">
                                <i class="fa fa-users"></i>
                            </span>
                            <?php 

                            if(isset($input_errors['username'])){

                                echo '<span class="input-errors">'.$input_errors['username'].'</span>';

                            }


                            ?>
                        </div>
                        
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" placeholder="Roll" name="roll" pattern="[0-9]{6}" value="<?= isset($roll) ? "$roll" : "" ?>">
                                <i class="fa fa-certificate"></i>
                            </span>
                            <?php 

                            if(isset($input_errors['roll'])){

                                echo '<span class="input-errors">'.$input_errors['roll'].'</span>';

                            }


                            ?>
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" placeholder="Reg. No." name="reg" pattern="[0-9]{6}" value="<?= isset($reg) ? "$reg" : "" ?>">
                                <i class="fa fa-cloud"></i>
                            </span>
                            <?php 

                            if(isset($input_errors['reg'])){

                                echo '<span class="input-errors">'.$input_errors['reg'].'</span>';

                            }


                            ?>
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" placeholder="01XXXXXXXXX" name="phone" pattern="01[1|3|4|6|7|8|9][0-9]{8}" value="<?= isset($phone) ? "$phone" : "" ?>">
                                <i class="fa fa-phone"></i>
                            </span>
                            <?php 

                            if(isset($input_errors['phone'])){

                                echo '<span class="input-errors">'.$input_errors['phone'].'</span>';

                            }


                            ?>
                        </div>



                       <!--  <div class="form-group">
                            <div class="checkbox-custom checkbox-primary">
                                <input type="checkbox" id="terms" value="option1">
                                <label class="check" for="terms">I agree </label>  to the <a href="#">Terms and Conditions</a>
                            </div>
                        </div> -->
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-block" value="Register" name="student_register">
                           
                        </div>
                        <div class="form-group text-center">
                            Have an account?, <a href="login.php">Sign In</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    </div>
</div>
<!--BASIC scripts-->
<!-- ========================================================= -->
<script src="../assets/vendor/jquery/jquery-1.12.3.min.js"></script>
<script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/vendor/nano-scroller/nano-scroller.js"></script>
<!--TEMPLATE scripts-->
<!-- ========================================================= -->
<script src="../assets/javascripts/template-script.min.js"></script>
<script src="../assets/javascripts/template-init.min.js"></script>
<!-- SECTION script and examples-->
<!-- ========================================================= -->
</body>
</html>
