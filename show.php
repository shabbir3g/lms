<?php 



require_once("dbcon.php");


 $data = mysqli_query($con, "SELECT * FROM message");


    



while( $row = mysqli_fetch_assoc( $data)){  



	$symbol = array(':)',':(',':D',':P','(Y)','<3',":'(");

	$emoji = array('<img src="../images/emoji/images.jpg" alt="">','<img src="../images/emoji/sad.png" alt="">','<img src="../images/emoji/happy.jpg" alt="">','<img src="../images/emoji/vetki.png" alt="">','<img src="../images/emoji/like.png" alt="">','<img src="../images/emoji/love.png" alt="">','<img src="../images/emoji/crying.png" alt="">');

	$message = $row['message'];

	$mainmessage = str_replace($symbol, $emoji, $message);





	?>


 <li>
    <div class="commenterImage">
      <img src="../images/profile/<?php echo $row['user_image']; ?>" />
    </div>
    <div class="commentText">
        <p class=""><?php echo $mainmessage; ?></p> <span class="date sub-text"><?php echo $row['datetime']; ?></span>

    </div>
</li>
          


<?php
}





