<?php
    session_start();
   
    require 'includes/dbconnect.php';

    
   

    if(isset($_GET['posts_id'])){
        $posts_id = $_GET['posts_id'];
        
    }

    $sql = 'SELECT * FROM posts inner join news_category on news_category.category_id = posts.category_id WHERE posts_id = :posts_id';
    $query = $pdo->prepare($sql);
    $query->execute(['posts_id' => $posts_id]);

    $news = $query->fetch();

?>


<!DOCTYPE html>
<html>


<?php include 'includes/header.php'; ?>
<p class="postauthori">Posted by author <?php echo $news['posts_author']; ?> &nbsp;<?php echo $news['datamodified'];?></p>
<?php if(isset($_SESSION['permission']) && ($_SESSION['permission'] == 1)){ ?>
    <ul class="showmoreul">
        <li class="edit"><a href="edit_news.php?posts_id=<?php echo $news['posts_id']; ?>">Ndrysho</a></li>
        <li class="delete"><a href="delete_news.php?posts_id=<?php echo $news['posts_id']; ?>">Fshij</a></li>
    </ul>
<?php } ?>

<div class="container-singlenews">
        
        <h1><?php echo $news['posts_title'];?> </h1><br><br>
        <p><?php echo $news['posts_body']; ?> </p><br>
        <div class="imagesinglenews">
            <img src="<?php echo $news['image']; ?>"/>
        </div>
        <ul>
            <li><a href="#"><?php echo $news['category_name'];  ?></a></li> , 
            <li><a href="index.php"> Kryefaqja</a></li>
        </ul>
    
        
        
</div>
<?php include 'includes/footer.php'; ?>
</html>