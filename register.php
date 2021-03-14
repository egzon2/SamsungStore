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
      $nameErr = $usernameErr = $emailErr = $passwordErr  ='';
      $name =  $usernameErr= $email = $password ='';
    if(isset($_POST['submit'])){
        //$name = $_POST['name'];
        if (empty($_POST["name"])) {
          $nameErr = "Name is required";
        } else {
          $name = test_input($_POST["name"]);
          // check if name only contains letters and whitespace
          if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
            $nameErr = "Only letters and white space allowed";
          }
        }
       //$username = $_POST['username'];
         if(empty($_POST['username'])){
          $usernameErr= "Username can't be empty!";
          }else{
            $username  = test_input($_POST['username']);
          }
       
        $email = $_POST['email'];
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
        $passwordErr = "Password is required";
      } else {
        $password = test_input($_POST["password"]);
        // check if name only contains letters and whitespace
        if (!preg_match("#[0-9]+#",$password)) {
          $passwordErr  = "Passwordi duhet te jete me i gjate";
        }
      }
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

        $sql = 'INSERT INTO users (user_name, user_username, user_email, user_password) VALUES(:user_name, :user_username, :email, :password)';
        $query = $pdo->prepare($sql);
        $query->bindParam('user_name', $name);
        $query->bindParam('user_username', $username);
        $query->bindParam('email', $email);
        $query->bindParam('password', $password);

        if($query->execute()){
            header("Location: index.php");
        }else{
          ?>
          <script>
          alert("Regjistrimi deshtoi!");
          </script>
          <?php 
        }


    }

?>

<!DOCTYPE html>
<html>
      <!-- Header ----->
      <?php include 'includes/header.php';?>      

    <!--Content-->
    <div id="contentregister">
        <div class="container flex space-evenly">
           
                <form action="register.php" method="POST" class="register-form justify-content align-items" onsubmit="return validimiregister()">
                    <h2 style="margin-bottom:20px;font-weight:500;" class="rh">Register Here</h2>
                    <span class="error"> <?php echo $nameErr;?></span>
                    <input type="text" id="name1" name="name" class="inputRegister" placeholder="Name"><br>
                  
                    <span class="error"> <?php echo $usernameErr;?></span>           
                    <input type="text" id="username1"  name="username" class="inputRegister" placeholder="Username"><br>
                    
                    <span class="error"> <?php echo $emailErr;?></span>
                    <input type="email" id="email1" name="email" class="inputRegister" placeholder="Email"><br>
                  
                    <span class="error"> <?php echo $passwordErr;?></span>
                    <input type="password" id="password1" name="password" class="inputRegister" placeholder="Password"><br>  
                    
                    <input type="submit" class="submit" name="submit" value="Register" />
                </form>
         
        </div>
    </div>
    


      <!-- Footer ----->
      <?php include 'includes/footer.php';?>        
</html> 





<style>
.error {
  color: #FF0000;
  width:94%;
  margin-left:20%;
  font-size:14px;

}
</style>