<?php require_once "header.php"; ?>


                <!-- content HEADER -->
                <!-- ========================================================= -->
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <div class="row animated fadeInUp">
                    
                    <div class="col-sm-12"> 
                        
                        
                    <div class="row">


                    

                     <?php 

                    $libraian       = mysqli_query($con, "SELECT * FROM libraian"); 

                    $ttl_libraian   = mysqli_num_rows($libraian);

                    

                    ?>

                     <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="panel widgetbox wbox-1 bg-darker-1">
                            <a href="#">
                                <div class="panel-content">
                                    <h1 class="title color-w"><i class="fa fa-user"></i> <?php echo  $ttl_libraian; ?></h1>
                                    <h4 class="subtitle color-lighter-1">Total Libraians </h4>
                                </div>
                            </a>
                        </div>
                    </div>


                    <?php 

                    $students       = mysqli_query($con, "SELECT * FROM students"); 

                    $ttl_students   = mysqli_num_rows($students);

                    

                    ?>


                     <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="panel widgetbox wbox-1 bg-darker-2 color-light">
                            <a href="students.php">
                                <div class="panel-content">
                                    <h1 class="title color-light-1"> <i class="fa fa-users"></i> <?php echo  $ttl_students; ?></h1>
                                    <h4 class="subtitle">Total Students </h4>
                                </div>
                            </a>
                        </div>
                    </div>

                    <?php 

                    $books       = mysqli_query($con, "SELECT * FROM books"); 
                    

                    $ttl_books   = mysqli_num_rows($books);

                    $books_qty    = mysqli_query($con, "SELECT SUM(book_qty) AS total FROM books"); 
                  

                     $qty   = mysqli_fetch_assoc($books_qty);

                    $av_books_qty    = mysqli_query($con, "SELECT SUM(available_qty) AS avtotal FROM books"); 

                    $av_qty   = mysqli_fetch_assoc($av_books_qty);
                        

                    ?>

                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="panel widgetbox wbox-1 bg-lighter-2 color-light">
                            <a href="manage-books.php">
                                <div class="panel-content">
                                    <h1 class="title color-darker-2"><i class="fa fa-book"></i> <?php echo  $ttl_books; ?> (<?php echo   $qty['total'].'-'.$av_qty['avtotal']; ?>)</h1>
                                    <h4 class="subtitle color-darker-1"> Total Books</h4>
                                </div>
                            </a>
                        </div>
                    </div>
                    




                </div>


                    </div>
                    
                </div>  
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
<?php require_once "footer.php"; ?>