<?php require_once "header.php"; ?>


                <!-- content HEADER -->
                <!-- ========================================================= -->
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                            <li><a href="edit-profile.php">Edit Profile</a></li>
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <div class="row">
                <div class="col-md-6 col-lg-6 col-lg-offset-3">
                   


                    
                    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                    <!--CONTACT INFO-->
                    <div class="panel bg-scale-0 b-primary bt-sm mt-xl">
                        <div class="panel-content">
                            
								
							<?php 		
								
									if(isset($_POST['update_profile'])){
		
		
									
									$fname 				= $_POST['fname'];
									$lname 				= $_POST['lname'];
									$password 			= $_POST['password'];

									$password_hash 		= password_hash($password, PASSWORD_DEFAULT);

									$passnew = empty($password) ? $student_info['password'] : $password_hash;
									
									$email 				= $_POST['email'];
									$phone 				= $_POST['phone'];
									$username 				= $_POST['username'];

									$profilesImage 		= $_FILES['profilesImage']['name'];
									$profile_tmp_name 	= $_FILES['profilesImage']['tmp_name'];

		
									$image = explode('.',$profilesImage);
									
									$image_ext = end($image);
									
									$image = date('Ymdhis.').$image_ext;


									$imagenew = empty($profilesImage) ? $student_info['image'] : $image;
									 
									$student_id = isset($_SESSION['student_id']) ? $_SESSION['student_id'] : '';
									
									
											
									$result = mysqli_query($con, "UPDATE students SET fname='$fname',lname='$lname',email='$email',username='$username',password='$passnew',phone='$phone',image='$imagenew' WHERE id='$student_id'");

									move_uploaded_file($profile_tmp_name,"../images/profile/".$image);


										 if($result ){
								                    ?>
								                    
								                    <script> 


								                    alert('You have updated Your Profile Successfully!'); 

								                      javascript:history.go(-1);


								                </script>

								                    <?php 


								                }else{

								                    ?>
								                    
								                    <script> alert('Something Wrong!'); 

								                    javascript:history.go(-1);


								                </script>



								                    <?php 

								                }

									} 
								
								
								
								?>


                             <form action="" method="POST"  enctype="multipart/form-data">
                             	<h4 class=""><b>Update Student Information</b></h4>
	                            <table class="table table-bordered">
	                            	<tr> 
										<th>Profile Picture: </th>

										<td>
											<div class="profile-photo">
												<?php 

												if($student_info['image'] == NULL){ ?>

													<img class="rounded" alt="User photo" src="../images/profile-placeholder.png"  onClick="triggerupClick()" id="profileupDisplay" />

											<?php 	} else{ ?>

												<img class="rounded" alt="User photo" src="../images/profile/<?php echo $student_info['image']; ?>"  onClick="triggerupClick()" id="profileupDisplay" />


									<?php		}



												 ?>
												
		                            			


		                            			 <input type="file" name="profilesImage" onChange="displayupImage(this)" id="profileupImage" class="form-control" style="display: none;">
		                        			</div>
	                        			</td>
									</tr> 
	                            	<tr> 
										<th>First Name: </th>

										<td><input class="form-control" type="text" name="fname" value="<?php echo $student_info['fname']; ?>"></td>
									</tr>
									<tr> 
										<th>Last Name: </th>

										<td><input class="form-control" type="text" name="lname" value="<?php echo $student_info['lname']; ?>"></td>
									</tr>
									<tr> 
										<th>Email: </th>

										<td><input class="form-control" type="text" name="email" value="<?php echo $student_info['email']; ?>"></td>
									</tr>
									<tr> 
										<th>Password: </th>

										<td><input class="form-control" type="password"  name="password" placeholder="********"/></td>
									</tr>
									<tr> 
										<th>Phone: </th>

										<td><input class="form-control" type="text" name="phone" value="<?php echo $student_info['phone']; ?>"></td>
									</tr>
									<tr> 
										<th>Username: </th>

										<td><input class="form-control" type="text" name="username" value="<?php echo $student_info['username']; ?>"></td>
									</tr>
									<tr> 
										<th>Roll: </th>

										<td><input readonly disabled class="form-control" type="text" value="<?php echo $student_info['roll']; ?>"></td>
									</tr>
									<tr> 
										<th>Reg.No: </th>

										<td><input readonly disabled class="form-control" type="text" value="<?php echo $student_info['reg']; ?>"></td>
									</tr>
									<tr> 
										<th></th>
										<td><button type="submit" name="update_profile" class="btn btn-primary pull-right"><i class="fa fa-save"></i> Update Profile</button> </td>
									</tr>
	                            </table>

                            </form>





                        </div>
                    </div>
                    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                    <!--LIST-->
                    
                </div>
                
            </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
<?php require_once "footer.php"; ?>

