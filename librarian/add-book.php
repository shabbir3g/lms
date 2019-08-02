<?php require_once "header.php";

	

	if(isset($_POST['save_book'])){
		
		
		$book_name 				= $_POST['book_name'];
		$book_author_name 		= $_POST['book_author_name'];
		$book_publication_name 	= $_POST['book_publication_name'];
		$book_purchase_data 	= $_POST['book_purchase_data'];
		$book_price 			= $_POST['book_price'];
		$book_qty 				= $_POST['book_qty'];
		$available_qty 			= $_POST['available_qty'];
		$book_image_name 		= $_FILES['book_image']['name'];
		
		$image = explode('.',$book_image_name);
		
		$image_ext = end($image);
		
		$image = date('Ymdhis.').$image_ext;
		
		$librarian_username = isset($_SESSION['librarian_username']) ? $_SESSION['librarian_username'] : '';
		
		$book_image_tmp_name 	= $_FILES['book_image']['tmp_name'];
		
		
		
		 $input_errors = array();

		if(empty($book_name)){

			$input_errors['book_name'] = "Book Name Field is required";

		}
		if(empty($book_author_name)){

			$input_errors['book_author_name'] = "Book Author Name Field is required";

		}
		if(empty($book_publication_name)){

			$input_errors['book_publication_name'] = "Publication Name Field is required";

		}
		if(empty($book_price)){

			$input_errors['book_price'] = "Book Price Field is required";

		}
		if(empty($book_qty)){

			$input_errors['book_qty'] = "Book Quantity Field is required";

		}
		if(empty($available_qty)){

			$input_errors['available_qty'] = "Available Quantity Field is required";

		}
		
		
		
		
		if(count($input_errors) == 0){
			
			if($book_qty >= $available_qty){
				
				$result = mysqli_query($con, "INSERT INTO books(book_name, book_image, book_author_name, book_publication_name, book_purchase_data, book_price, book_qty, available_qty, libraian_username) VALUES ('$book_name','$image','$book_author_name','$book_publication_name','$book_purchase_data','$book_price','$book_qty','$available_qty','$librarian_username')");
				
				if($result){
					move_uploaded_file($book_image_tmp_name,"../images/books/".$image);

				$success = "You have successfully added book!";

				}else{
				$error = "Something's wrong with add book entry!";
				}
				
			}else{
				
				$error = "Books Quantity will equal or greater than Available Quantity";
				
			}
			
		
		
		
		 
		
		
		
		
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
                            <li><a href="javascript:avoid(0)">Add Book</a></li>
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <div class="row animated fadeInUp">
                    
                    <div class="col-sm-8 col-sm-offset-2"> 
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

                        <div class="panel">
                        <div class="panel-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                                        <h5 class="mb-lg">Add New Book</h5>
                                        <div class="form-group">
                                            <label for="book_name" class="col-sm-3 control-label">Book Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="book_name" name="book_name" placeholder="Book Name" value="<?= isset($book_name) ? "$book_name" : "" ?>">
												<?php 
												if(isset($input_errors['book_name'])){
													echo '<span class="input-errors">'.$input_errors['book_name'].'</span>';
												}
												?>
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label for="book_image" class="col-sm-3 control-label">Book Image</label>
                                            <div class="col-sm-9">
                                            	<img id="profileDisplay" onclick="triggerClick()" src="../images/placeholder.png" alt="">
                                                <input onchange="displayImage(this)" type="file" class="form-control" id="book_image" name="book_image" placeholder="Book Image" required>
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label for="book_author_name" class="col-sm-3 control-label">Author Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="book_author_name" name="book_author_name" placeholder="Book Author Name" value="<?= isset($book_author_name) ? "$book_author_name" : "" ?>">
												<?php 
												if(isset($input_errors['book_author_name'])){
													echo '<span class="input-errors">'.$input_errors['book_author_name'].'</span>';
												}
												?>
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label for="book_publication_name" class="col-sm-3 control-label">Publication Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="book_publication_name" name="book_publication_name" placeholder="Publication Name" value="<?= isset($book_publication_name) ? "$book_publication_name" : "" ?>">
												<?php 
												if(isset($input_errors['book_publication_name'])){
													echo '<span class="input-errors">'.$input_errors['book_publication_name'].'</span>';
												}
												?>
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label for="book_purchase_data" class="col-sm-3 control-label">Purchase Date</label>
                                            <div class="col-sm-9">
                                                <input type="date" class="form-control" id="book_purchase_data" name="book_purchase_data" placeholder="Purchase Date" value="<?= isset($book_purchase_data) ? "$book_purchase_data" : "" ?>">
												<?php 
												if(isset($input_errors['book_purchase_data'])){
													echo '<span class="input-errors">'.$input_errors['book_purchase_data'].'</span>';
												}
												?>
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label for="book_price" class="col-sm-3 control-label">Book Price</label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" id="book_price" name="book_price" placeholder="Book Price" value="<?= isset($book_price) ? "$book_price" : "" ?>">
												<?php 
												if(isset($input_errors['book_price'])){
													echo '<span class="input-errors">'.$input_errors['book_price'].'</span>';
												}
												?>
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label for="book_qty" class="col-sm-3 control-label">Book Quantity</label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" id="book_qty" name="book_qty" placeholder="Book Quantity" value="<?= isset($book_qty) ? "$book_qty" : "" ?>">
												<?php 
												if(isset($input_errors['book_qty'])){
													echo '<span class="input-errors">'.$input_errors['book_qty'].'</span>';
												}
												?>
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label for="available_qty" class="col-sm-3 control-label">Available Quantity</label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" id="available_qty" name="available_qty" placeholder="Available Quantity" value="<?= isset($available_qty) ? "$available_qty" : "" ?>">
												<?php 
												if(isset($input_errors['available_qty'])){
													echo '<span class="input-errors">'.$input_errors['available_qty'].'</span>';
												}
												?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-9">
                                                <button type="submit" name="save_book" class="btn btn-primary"><i class="fa fa-save"></i> Save Book</button> 
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    
                </div>  
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
<?php require_once "footer.php"; ?>