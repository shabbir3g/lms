<?php require_once "header.php"; ?>


                <!-- content HEADER -->
                <!-- ========================================================= -->
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                            <li><a href="profile.php">Profile</a></li>
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <div class="row">
                <div class="col-md-6 col-lg-6 col-lg-offset-3">
                    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                    <!--PROFILE-->
                    <div>
                        <div class="profile-photo">


                             <?php 

                            if($student_info['image'] == NULL){ ?>

                                <img alt="User photo" src="../images/profile-placeholder.png"  />

                        <?php   } else{ ?>

                            <img alt="User photo" src="../images/profile/<?php echo $student_info['image']; ?>"   />


                <?php       }



                             ?>
                           
                        </div>
                        <div class="user-header-info">
                            <h2 class="user-name"><?php echo ucwords($student_info['fname'].' '.$student_info['lname']); ?></h2>
                            <h5 class="user-position">Student</h5>
                            <!-- <div class="user-social-media">
                                <span class="text-lg"><a href="#" class="fa fa-twitter-square"></a> <a href="#" class="fa fa-facebook-square"></a> <a href="#" class="fa fa-linkedin-square"></a> <a href="#" class="fa fa-google-plus-square"></a></span>
                            </div> -->
                        </div>
                    </div>
                    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                    <!--CONTACT INFO-->
                    <div class="panel bg-scale-0 b-primary bt-sm mt-xl">
                        <div class="panel-content">
                            <h4 class=""><b>Student Information</b></h4>
                            <table class="table table-bordered"> 
                                <tr> 
                                    <th>Email: </th>
                                    <td><?php echo $student_info['email']; ?></td>
                                </tr>
                                <tr> 
                                    <th>Phone:</th>
                                    <td><?php echo $student_info['phone']; ?></td>
                                </tr>
                                <tr> 
                                    <th>Roll:</th>
                                    <td> <?php echo $student_info['roll']; ?></td>
                                </tr>
                                <tr> 
                                    <th>Reg.No: </th>
                                    <td><?php echo $student_info['reg']; ?></td>
                                </tr>
                                <tr> 
                                    <th>Username: </th>
                                    <td><?php echo $student_info['username']; ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                    <!--LIST-->
                    
                </div>
                
            </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
<?php require_once "footer.php"; ?>

