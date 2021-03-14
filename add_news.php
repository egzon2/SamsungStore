<script>
  function validateForm(){
    var x = document.forms["myForm"]["body"].value;
    if(x == ""){
      alert("Duhet ta plotesoni permbajtjen");
      return false;
    }else{
      return true;
    }
  }
</script>

<?php 


session_start();

if(($_SESSION['permission'] == 1)){
 

  require 'includes/dbconnect.php';


  $query = $pdo->query('SELECT * from news_category');
  $categoryinfo = $query->fetchAll();
?>
<?php

  function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  $titleE = $bodyE = $imageE = $kategoriE= "";

 if(isset($_POST['submit'])){
   // $title = $_POST['title'];
    if(empty($_POST['title'])){
      $titleE= "Titulli nuk duhet te jete i zbrazet";
    }else{
      $title = test_input($_POST['title']);
    }
   // $body = $_POST['body'];
   if(empty($_POST['title'])){
    $bodyE= "Body nuk duhet te jete i zbrazet";
    }else{
      $body = test_input($_POST['body']);
    }
    //$image = $_POST['image'];
    if(empty($_POST['title'])){
      $imageE= "foto nuk duhet te jete e zbrazet";
      }else{
        $image = test_input($_POST['image']);
      }
    //$kategoria = $_POST['kategoria'];
    if(empty($_POST['title'])){
      $kategoriE= "Zgjedhni kategorin";
      }else{
        $kategoria = test_input($_POST['kategoria']);
      }
    $posts_author = $_POST['posts_author'];
    
    $sql = 'INSERT INTO posts (posts_title, posts_body, image, category_id, posts_author) VALUES(:title, :body, :image, :kategoria, :posts_author)';
    $query = $pdo->prepare($sql);
    $query->bindParam('title', $title);
    $query->bindParam('body', $body);
    $query->bindParam('image', $image);
    $query->bindParam('kategoria', $kategoria);
    $query->bindParam('posts_author', $posts_author);

    $query->execute();

    header("Location:index.php");
    
    //upload images --------------------------
    //$images=$_FILES['profile']['name'];
    //$tmp_dir=$_FILES['profile']['tmp_name'];
    //$imageSize=$_FILES['profile']['size'];

   // $upload_dir='upload/'.$images;
    //$imgExt=strtolower(pathinfo($images,PATHINFO_EXTENSION));
    //$valid_extensions=array('jpeg','jpg','png','gif','pdf');
    ///$picProfile=rand(1000, 1000000).".".$imgExt;
    //move_uploaded_file($tmp_dir, $upload_dir.$picProfile);
  
    
   // $query->bindParam(':picProfile', $picProfile);
   // if($query->execute())
 



 }
?>



<!DOCTYPE html>

<html lang="en">
    <?php include 'includes/header.php'; ?>
   <div id="newsadd">
      <div id="newsbox">
        <form name="myForm"  enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="validateForm()" method="POST" > 
        <!--$_SERVER["PHP_SELF"]; pra kjo tregon se cili fajll eshte ma mir ja lana qeshtu se sa kur te ja ndryshojm emnin fajllit skem nevoj ma me ndryshu edhe ktu -->
          <span class="spanE"><?php echo $titleE;?> </span> <label class="labelAdd">Shto Titullin </label>
            <input class="inputAdd" type="text" name="title"/><br/>
            <span class="spanE"><?php echo $bodyE;?> </span><label class="labelAdd"> Shto permbajtjen e lajmit</label>
            <textarea name="body" rows="4" cols="50" placeholder="Permbajtja!"></textarea></br>
            <span class="spanE"><?php echo $imageE;?> </span><label class="labelAdd">Shto nje foto </label>
            <input type="text" name="image" class="imgAdd" /><br/><br><br>
           <!-- <input type="text" name="kategoria"/><br/> -->
           <span class="spanE"><?php echo $kategoriE;?><label style="margin-bottom:10px;" class="labelAdd">Zgjedh nje kategori</label>
           <select name="kategoria">
                <?php foreach($categoryinfo as $category){?>
                  <option value="<?php echo $category['category_id'];?>"> <?php echo $category['category_name'];?></option>
                <?php }?>
              
           </select>
           <input type="hidden" name="posts_author" value="<?php echo $_SESSION['name'];?>">
            <input type="submit" name="submit" value="Submit" class="submitAdd"/>
            
        </form> 
      </div>
    </div>
    <?php include 'includes/footer.php'; ?>
</html>
<?php } else{
    header("Location: error.php");
}?>
