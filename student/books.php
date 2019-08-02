<?php require_once "header.php"; ?>


                <!-- content HEADER -->
                <!-- ========================================================= -->
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
                            <li></i><a href="javascript:avoid(0)">Books</a></li>
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <div class="row animated fadeInUp ">
                    <div class="col-sm-12">
                        <div class="panel">
                            <div class="panel-content">
                                <form method="POST">
                                    <div class="row pt-md">
                                        <div class="form-group col-sm-9 col-lg-10">
                                                <span class="input-with-icon">
                                            <input type="text" name="book_search" class="form-control" id="lefticon" placeholder="Search" required="">
                                            <i class="fa fa-search"></i>
                                        </span>
                                        </div>
                                        <div class="form-group col-sm-3  col-lg-2 ">
                                            <button type="submit" name="books" class="btn btn-primary btn-block">Search</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    
                    <?php 

                    if(isset($_POST['books'])){ 

                    $book_search = $_POST['book_search'];

                





                        ?>

                      <div class="col-sm-12 col-md-12 ">
                    <div class="panel">
                        <div class="panel-content">
                           <!-- <h5><b>Gallery</b> Lightbox</h5>
                            <p>You can enable <span class="highlight">lazy-loading of images</span>  for the previous and next image based on move direction</p> -->
                            <div class="row" id="gallery-with-zoom">

                                            


                                 <?php 
                                 
                                  $result = mysqli_query($con, "SELECT * FROM `books` WHERE `book_name` LIKE '%$book_search%'");

                                 $temp  = mysqli_num_rows($result);

                                

                                 if($temp > 0){ ?>
                                    
                                     <?php      while( $row = mysqli_fetch_assoc($result)): 

                                 ?>           

                                <div class="col-xs-6 col-md-2">
                                    <a href="../images/books/<?php echo $row['book_image']; ?>" title="<?php echo $row['book_name']; ?> By <?php echo $row['book_author_name']; ?>  (<?php echo $row['available_qty']; ?>)">
                                        <img src="../images/books/<?php echo $row['book_image']; ?>" class="img-responsive mb-sm">
                                    </a>
                                   
                                </div>
                               
                                <?php endwhile; ?>

                                 <?php }else{ ?>


                                    <div class="col-xs-12 col-md-12 text-center">
                                   
                                   <h2>Books not found</h2>
                                   
                                </div>


                          <?php       } ?>

                          




                            </div>
                        </div>
                    </div>
                </div>
                    

    
    



                 <?php    }else{  ?>

                          <div class="col-sm-12 col-md-12 ">
                            <div class="panel">
                                <div class="panel-content">
                                   <!-- <h5><b>Gallery</b> Lightbox</h5>
                                    <p>You can enable <span class="highlight">lazy-loading of images</span>  for the previous and next image based on move direction</p> -->
                                    <div class="row" id="gallery-with-zoom">

                                                    


                                         <?php 
                                         
                                         $result = mysqli_query($con,"SELECT * FROM books");

                                        while( $row = mysqli_fetch_assoc($result)): 

                                         ?>           

                                        <div class="col-xs-6 col-md-2">
                                            <a href="../images/books/<?php echo $row['book_image']; ?>" title="<?php echo $row['book_name']; ?> By <?php echo $row['book_author_name']; ?>  (<?php echo $row['available_qty']; ?>)">
                                                <img src="../images/books/<?php echo $row['book_image']; ?>" class="img-responsive mb-sm">
                                            </a>
                                           
                                        </div>
                                       
                                        <?php endwhile; ?>




                                    </div>
                                </div>
                            </div>
                        </div>



                    <?php  }









                    ?>










                  
                   
                    
                </div>  
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
<?php require_once "footer.php"; ?>