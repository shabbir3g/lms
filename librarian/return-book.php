<?php 


require_once "header.php"; ?>


                <!-- content HEADER -->
                <!-- ========================================================= -->
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                            <li><a href="javascript:avoid(0)">Return Book</a></li>
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <div class="row animated fadeInUp">
                    
                    <div class="col-sm-12">
                    <h4 class="section-subtitle"><b>Return Book</b></h4>
                    <div class="panel">
                        <div class="panel-content">
                            <div class="table-responsive">
                                <table id="basic-table" class="data-table table-bordered table table-striped nowrap table-hover" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Roll</th>
                                        <th>Phone</th>
                                        <th>Book Name</th>
                                        <th>Book Image</th>
                                        <th>Book issue Date</th>
                                        <th>Return Book</th>
                                    </tr>
                                    </thead>
                                    <tbody>
									
									<?php 
									
									$result = mysqli_query($con, "SELECT issue_books.book_issue_date, issue_books.book_id, issue_books.id, students.fname, students.lname, students.roll, students.phone, books.book_name, books.book_image FROM issue_books 
INNER JOIN students ON students.id = issue_books.student_id
INNER JOIN books ON books.id = issue_books.book_id WHERE book_return_date = ''");
									
									while($row = mysqli_fetch_assoc($result)): 
									
									?>
                                    <tr>
                                        <td><?= ucwords($row['fname'].' '.$row['lname']); ?></td>
                                        <td><?= $row['roll'];  ?></td>
                                        <td><?= $row['phone'];  ?></td>
                                        <td><?= $row['book_name'];  ?></td>
                                        <td><img width="50" src="../images/books/<?= $row['book_image'];  ?>" alt="" /></td>
                                        <td><?= $row['book_issue_date'];  ?></td>
                                        <td>
                                        
                                        <a class="btn btn-primary" href="return-book.php?id=<?= base64_encode($row['id']); ?>&bookid=<?php echo base64_encode($row['book_id']); ?>"><i class="fa fa-arrow-right"></i></a>
                                       
                                        
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
            
            <?php 


            if(isset($_GET['id'])){


                $id =  base64_decode($_GET['id']);
                $bookid =  base64_decode($_GET['bookid']);

                $date =  date('F d, Y');

                $result = mysqli_query($con,"UPDATE issue_books SET book_return_date='$date' WHERE id='$id'");

                if($result ){

                    mysqli_query($con, "UPDATE books SET available_qty = available_qty +1 WHERE id='$bookid'");

                    ?>
                    
                    <script> 


                    alert('Book Returns Successfully!'); 

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






<?php require_once "footer.php"; ?>