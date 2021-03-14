<?php

session_start();

   require 'includes/dbconnect.php';

   $query = $pdo->query('SELECT * FROM posts');
   $newsdata= $query->fetchAll();
?>

<!DOCTYPE html>
<html>
    <!-- Header ----->
    <?php include 'includes/header.php' ;?>
    <!--Content-->
    <div id="content">
        
        <div id="slider">
            <figure>
                <img src="./assets/image2.jpg"/>
                <img src="./assets/image1.jpg"/>
                <img src="./assets/image3.jpg"/>
                <img src="./assets/image4.png"/>
                <img src="./assets/image5.jpg"/>
                
            </figure>
        </div> 
        <div id="content-2">
            <div class="container2 flex">
                <div class="section flex flex-flow justify-content align-items">
                    <?php foreach($newsdata as $news):?>
                    <figure  class="figure">

                        <a href="showmore.php?posts_id=<?php echo $news['posts_id']; ?>">
                            <img src="<?php echo $news['image']; ?>" class="img1" alt="sport"/>
                        </a>
                        <figcaption><?php echo $news['posts_title']; ?></figcaption>
                    </figure>
                    <?php endforeach; ?>
                    
                </div>
            </div>
        </div>  
        <!-- Footer ----->
    <?php include 'includes/footer.php';?>     
    </div>
</html>



