<?php
    session_start();

    if(isset($_SESSION['user_id'])){
        header("Location: index.php");
    
    }

    require 'includes/dbconnect.php';
     
    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
      $emailErr = $passwordErr  ='';
      $email = $password ='';

    if(isset($_POST['submit'])):
       // $email = $_POST['email'];
       // $password = $_POST['password'];
        if (empty($_POST["email"])) {
          $emailErr = "Email is required";
        } else {
          $email = test_input($_POST["email"]);
          // check if e-mail address is well-formed
          if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
          }
        }
       //$password= $_POST['password'];
       if (empty($_POST["password"])) {
        $passwordErr = "password is required";
      } else {
        $password = test_input($_POST["password"]);
        // check if name only contains letters and whitespace
        if (!preg_match("#[0-9]+#",$password)) {
          $passwordErr  = "passwordi duhet te jete me i gjate";
        }
      }

        $query = $pdo->prepare('SELECT user_id, user_name, user_email, user_password, user_role FROM users WHERE user_email = :email');
        $query->bindParam(':email', $email);
        $query->execute();

        $user = $query->fetch();

       if(count($user) > 0 && password_verify($password, $user['user_password'])){
           $_SESSION['id'] = $user['user_id'];
           $_SESSION['name'] = $user['user_name'];
           $_SESSION['permission'] = $user['user_role'];

           header("Location: index.php");
       }else{
        ?>
          <script>
          alert("passwordi gabim, provo prap");
          </script>
        <?php    
       }
    endif;
?>


<!DOCTYPE html>
<html>
      <!-- Header ----->
      <?php include 'includes/header.php';?>          

    <!--Content-->
    <div id="contentLogin">
        <form action="login.php" method="POST" class="loginpage" onsubmit="return validimilogin()">
            <h1>Log in</h1>
            
            <span style="margin-left:20px;width:70%;" id="imellaerror"></span><br>
            <input id="email" class="input" type="email" name="email" placeholder="Email Adress"/>
            <span class="error"> <?php echo $emailErr;?>
            

            
            <span style="width:70%;" id="pwerror"></span>
            <input class="input" id="password" type="password" name="password" placeholder="Your Password"/>
            <span class="error"> <?php echo $passwordErr;?>
            <button type="submit" name="submit" class="button">
                &#128274; Log in
            </button>
            <p><a href="#">No account yet? Create one!</a></p>
        </form>
    </div>


    <!-- Footer ----->
    <?php include 'includes/footer.php';?>          
</html>

<style>
.error {color: #FF0000;}
</style>