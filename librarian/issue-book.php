<?php require_once "header.php"; 


if(isset($_POST['issue_book'])){


    $student_id         = $_POST['student_id'];
    $book_id            = $_POST['book_id'];
    $book_issue_date    = $_POST['book_issue_date'];


   $result = mysqli_query($con, "INSERT INTO issue_books(student_id, book_id, book_issue_date) VALUES ('$student_id','$book_id',' $book_issue_date')");

   

   if($result){
    mysqli_query($con, "UPDATE books SET available_qty = available_qty -1 WHERE id='$book_id'");
    ?>
    <script> alert('Book Issued Successfully!'); </script>

    <?php 

   }else{

    ?>
    <script> alert('Book Not Issue'); </script>

    <?php 


   }

}











?>






            <!-- content HEADER -->
            <!-- ========================================================= -->
            <div class="content-header">
                <!-- leftside content header -->
                <div class="leftside-content-header">
                    <ul class="breadcrumbs">
                        <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                         <li><a href="javascript:avoid(0)">Issue Book</a></li>
                    </ul>
                </div>
            </div>
            <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
            <div class="row animated fadeInUp">
                
                <div class="col-sm-6 col-sm-offset-3"> 
                    <div class="panel">
                        <div class="panel-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <form class="form-inline" method="POST" action="">
                                        <div class="form-group">
                                            
                                            
                                                <select class="form-control" name="student_id" id=""> 
                                                    <option value="select">--Select--</option>

                                                    <?php 
                                    
                                                    $result = mysqli_query($con, "SELECT * FROM students WHERE status=1");
                                                    
                                                    while($row = mysqli_fetch_assoc($result)): 
                                                    
                                                    ?>
                                                    <option value="<?php echo $row['id']; ?>"><?= ucwords($row['fname'].' '.$row['lname']. ' - ( '.$row['roll'].' )'); ?></option>

                                                    <?php endwhile; ?>

                                                </select>




                                        </div>
                                        
                                        <div class="form-group">
                                            <button type="search" name="search" class="btn btn-primary">Search</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <?php 

                            if(isset($_POST['search'])):

                              $id = $_POST['student_id'];

                              $result = mysqli_query($con, "SELECT * FROM students WHERE id='$id' AND status=1");
                                                    
                            $row = mysqli_fetch_assoc($result);

                           ?>

                             <div class="panel">
                                <div class="panel-content">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form method="POST" action="">
                                                <div class="form-group">
                                                    <label for="std_name">Student Name</label>
                                                    <input type="text" class="form-control" name="student_name" id="std_name" value="<?= ucwords($row['fname'].' '.$row['lname']); ?>" readonly >
                                                    <input type="hidden" name="student_id" value="<?= $row['id']; ?>">
                                                </div>
                                                <div class="form-group"> 
                                                    <label for="book_name">Book Name</label>
                                                    <select class="form-control" name="book_id" id="book_name"> 
                                                    <option value="select">--Select--</option>

                                                    <?php 
                                    
                                                    $result = mysqli_query($con, "SELECT * FROM books WHERE available_qty > 0");
                                                    
                                                    while($row = mysqli_fetch_assoc($result)): 
                                                    
                                                    ?>
                                                    <option value="<?php echo $row['id']; ?>"><?= $row['book_name']; ?></option>

                                                    <?php endwhile; ?>

                                                </select>

                                                </div>
                                                <div class="form-group"> 
                                                     <label for="book_issue_date">Book Issue Date</label>
                                                     <input type="text" class="form-control" name="book_issue_date" id="book_issue_date" value="<?= date('F d, Y')  ?>" readonly >

                                                </div>
                                                

                                                <div class="form-group">
                                                    <button type="submit" name="issue_book" class="btn btn-primary">Save Issue Book</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php endif; ?>


                        </div>
                    </div>
                </div>
                
            </div>  
            <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
<?php require_once "footer.php"; ?>