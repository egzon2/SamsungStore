<?php
    
    require 'includes/dbconnect.php';

    
    if(isset($_GET['posts_id'])){
        $id = $_GET['posts_id'];
        
    }

    $query = $pdo->query('SELECT * from news_category');
    $categoryinfo = $query->fetchAll();

    $sql = 'SELECT * FROM posts WHERE posts_id = :posts_id';
    $query = $pdo->prepare($sql);
    $query->execute(['posts_id' => $id]);

    $news = $query->fetch();

    if(isset($_POST['submit'])){

        $title = $_POST['title'];
        $body = $_POST['body'];
        $image = $_POST['image'];
        $kategoria = $_POST['kategoria'];
        //$posts_author = $_POST['posts_author'];

        $sql = 'UPDATE posts SET posts_title = :title, posts_body = :body, image = :image, category_id = :kategoria, datamodified = :datamodified WHERE posts_id = :posts_id';

        $query = $pdo->prepare($sql);
        $query->bindParam('title' , $title);
        $query-> bindParam('body', $body);
        $query->bindParam('image', $image);
        $query->bindParam('kategoria', $kategoria);
        //$query->bindParam('posts_author', $posts_author);
        
        $query->execute();

        header("Location: index.php");
    }

?>


<!DOCTYPE html>

<html lang="en">
    <?php include 'includes/header.php'; ?>
   <div id="newsadd">
      <div id="newsbox">
        <form name="myForm"  enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="validateForm()" method="POST" > 
        <!--$_SERVER["PHP_SELF"]; pra kjo tregon se cili fajll eshte ma mir ja lana qeshtu se sa kur te ja ndryshojm emnin fajllit skem nevoj ma me ndryshu edhe ktu -->
          </span> <label class="labelAdd">Shto Titullin </label>
            <input class="inputAdd" type="text" name="title" value="<?php echo $news['posts_title']; ?>"/><br/>
            </span><label class="labelAdd"> Shto permbajtjen e lajmit</label>
            <textarea name="body" rows="4" cols="50" placeholder="Permbajtja!"><?php echo $news['posts_body']; ?>"</textarea></br>
            </span><label class="labelAdd">Shto nje foto </label>
            <input type="text" name="image" class="imgAdd" value="<?php echo $news['image']; ?>"/><br/><br><br>
           <!-- <input type="text" name="kategoria"/><br/> -->
           <label style="margin-bottom:10px;" class="labelAdd">Zgjedh nje kategori</label>
           <select name="kategoria">
                <?php foreach($categoryinfo as $category){?>
                  <option value="<?php echo $category['category_id'];?>"> <?php echo $category['category_name'];?></option>
                <?php }?>
              
           </select>
           
          <input type="submit" name="submit" value="Submit" class="submitAdd"/>
            
        </form> 
      </div>
    </div>
    <?php include 'includes/footer.php'; ?>
</html>