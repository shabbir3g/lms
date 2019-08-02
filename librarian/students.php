<?php 


require_once "header.php"; ?>


                <!-- content HEADER -->
                <!-- ========================================================= -->
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                            <li><a href="javascript:avoid(0)">Students</a></li>
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <div class="row animated fadeInUp">
                    
                    <div class="col-sm-12">
                    <div class="pull-left"><h4 class="section-subtitle"><b>All Students</b></h4></div>
                    <div class="pull-right"><a class="btn btn-primary" target="_blank" href="print-all-students.php"><i class="fa fa-print"></i>Print</a></div>
                    
                    <div class="clearfix"></div>

                    
                    <div class="panel">
                        <div class="panel-content">
                            <div class="table-responsive">
                                <table id="basic-table" class="data-table table table-striped nowrap table-hover" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Roll</th>
                                        <th>Reg. No</th>
                                        <th>Email</th>
                                        <th>Username</th>
                                        <th>Phone</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
									
									<?php 
									
									$result = mysqli_query($con, "SELECT * FROM students");
									
									while($row = mysqli_fetch_assoc($result)): 
									
									?>
                                    <tr>
                                        <td><?= ucwords($row['fname'].' '.$row['lname']); ?></td>
                                        <td><?= $row['roll'];  ?></td>
                                        <td><?= $row['reg'];  ?></td>
                                        <td><?= $row['email'];  ?></td>
                                        <td><?= $row['username'];  ?></td>
                                        <td><?= $row['phone'];  ?></td>
                                        <?php if($row['image'] == NULL){ ?>
                                        
                                         <td><img id="std_image" src="../images/profile-placeholder.png" alt="" /></td>
                        
                                        <?php }else{ ?>


                                        <td><img id="std_image" src="../images/profile/<?= $row['image'];  ?>" alt="" /></td>
                                         <?php } ?>

                                         
                                        <td><?= $row['status'] == 1 ? "Active" : "Inactive" ?></td>
                                        <td>
										
										<?php if($row['status'] == 1): ?>
										
										<a class="btn btn-danger" href="inactive.php?id=<?= base64_encode($row['id']); ?>"><i class="fa fa-times"></i></a>
										
										<?php else: ?>
										<a class="btn btn-primary" href="active.php?id=<?= base64_encode($row['id']); ?>"><i class="fa fa-check"></i></a>
										<?php endif; ?>
										
										
										</td>
                                      
                                    </tr>
									
									<?php endwhile; ?>
									
									
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                    
                </div>  
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
<?php require_once "footer.php"; ?>