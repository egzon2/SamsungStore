
<?php 

session_start();

require 'includes/dbconnect.php';

$query = $pdo->query('SELECT * from news_country');
$countryinfo= $query->fetchAll();

?>
<?php

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  $emriErr = $mbiemriErr = $emailErr = $gjiniaErr = $technologyErr = $shtetiErr = $mesazhiErr ="";
  $emri = $mbiemri = $email = $gjinia = $technology = $shteti =   $mesazhi="";

 if(isset($_POST['submit'])){
   // $emri = $_POST['emri'];
    //$mbiemri = $_POST['mbiemri'];
    //$gjinia = $_POST['gjinia'];
   // $email = $_POST['email'];
    $technology = implode(',', $_POST['technology']);
    $shteti = $_POST['shteti'];
   // $mesazhi = $_POST['mesazhi'];
    if (empty($_POST["emri"])) {
    $emriErr = "Name is required";
    } else {
    $name = test_input($_POST["emri"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$emri)) {
      $emriErr = "Only letters and white space allowed";
     }
    }
  
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
    $email = test_input($_POST["email"]);
    // check if email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
     }
    }
    //gjinia
    if (empty($_POST["gjinia"])) {
        $gjiniaErr = "Gender is required";
      } else {
        $gjinia = test_input($_POST["gjinia"]);
      }
    
        //mesazhi
    if (empty($_POST["mesazhi"])) {
        $mesazhiErr = "Message required";
      } else {
        $mesazhi = test_input($_POST["mesazhi"]);
      }
    
    $sql = 'INSERT INTO kontaktforma (emri, mbiemri, gjinia, email, technology, country_id,mesazhi) VALUES(:emri, :mbiemri, :gjinia, :email, :technology, :country_id ,:mesazhi)';
    $query = $pdo->prepare($sql);
    $query->bindParam('emri', $emri);
    $query->bindParam('mbiemri', $mbiemri);
    $query->bindParam('gjinia', $gjinia);
    $query->bindParam('email', $email);
    $query->bindParam('technology', $technology);
    $query->bindParam('country_id', $shteti);
    $query->bindParam('mesazhi', $mesazhi);
    $query->execute();
 }
?>

<!DOCTYPE html>
<html>
     <!-- Header ----->
     <?php include 'includes/header.php';?>    

    <!--Content-->
    <div id="contentContact">
        <div class="kontaktoni"> <h1>Na K<span>onta</span>ktoni </h1></div>
            <div class="container flex space-evenly">
                <div class="containeri">
                    <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  method="POST" onsubmit="return validimi()">
                        
                        <label for="fname">First Name</label> <span id="error"></span> <span class="error"> <?php echo $emriErr;?></span>
                        <input type="text" id="fname" class="inputContact" name="emri"  placeholder="Your name..">

                        <label for="lname">Last Name</label> <span id="error2"></span> <span class="error"> <?php echo $mbiemriErr;?></span>
                        <input type="text" id="lname" class="inputContact" name="mbiemri"  placeholder="Your last name..">

                        <label>Gender</label> <span class="error"> <?php echo $gjiniaErr;?></span><br/>
                        <input  type="radio" name="gjinia" value="M" style="margin-top:7px;"> M &ensp;
                        <input type="radio" style="margin-bottom:15px;" name="gjinia" value="F"> F<br/>
                       
                      
                        
                        <label for="email">Email</label> <span id="error3"></span> <span class="error"> <?php echo $emailErr;?></span>
                        <input type="email" id="email" class="inputContact" name="email" class="email"  placeholder="Your email..">

                        <label>Interessed</label> <span class="error"> <?php echo $technologyErr;?></span><br/>
                        <input type="checkbox" name="technology[]" value="PHP" style="margin-top:8px;"> PHP<br/>
                        <input type="checkbox" name="technology[]" value="JAVA"> JAVA<br/>
                        <input type="checkbox" name="technology[]" value="DOTNET" style="margin-bottom:15px;"> ASP.Net<br/><br/>
                                                
                        <label for="country">Country</label> <span id="error4"></span> <span class="error"> <?php echo $shtetiErr;?></span>
                        <select name="shteti" id="country">
                        <?php foreach($countryinfo as $country){?>
                        <option value="<?php echo $country['country_id'];?>"><?php echo $country['country_name'];?> </option>
                        <?php }?>
                        </select>
                                               
                        <label for="subject">Message</label> <span id="error5"></span> <span class="error"> <?php echo $mesazhiErr;?></span>
                        <textarea id="subject" name="mesazhi"  placeholder="Write something.." style="height:170px"></textarea> 
                    
                        <input type="submit" value="Submit" name="submit" class="sumbit">
                    
                    </form>
        </div>
            <div class="form-info">
                 <div class="info">
                     <h3>Adresa</h3>
                     <p>Rr. Nënë Tereza 12000, Fushë Kosovë</p>
                </div> 
                <div class="info">
                    <h3>Numri Telefonit</h3>              
                    <a href="#">+383(0)45 488 883</a>
                </div> 
                <div class="info">
                    <h3>Email Adresa</h3>               
                    <a href="#">info@sportshoes.com</a>
                </div>
                <div class="info">
                    <h3>Më Shumë Info</h3>
                    <input type="submit" value="Submit" class="btn-1">
                </div>
            </div>
        </div>
    </div>
    

      <!-- Footer ----->
      <?php include 'includes/footer.php';?>        
</html>

