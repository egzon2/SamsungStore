<!DOCTYPE html>
<html>
<head>
    <title>Samsung Store</title>
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link rel="stylesheet" type="text/css" href="./css/flexclasses.css">
    
    <link rel="stylesheet" type="text/css" href="./css/mobile.css" media="screen and (min-width: 320px) and (max-width: 500px)">
    <link rel="stylesheet" type="text/css" href="./css/tablet.css" media="screen and (min-width: 501px) and (max-width: 768px)">
    <link rel="stylesheet" type="text/css" href="./css/laptop.css" media="screen and (min-width: 769px) and (max-width: 992px)">
    <link rel="stylesheet" type="text/css" href="./css/pc.css" media="screen and (min-width: 992px) and (max-width: 1200px)">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Sancreek&display=swap" rel="stylesheet"> 
    <script src="./js/validimi.js"></script>
</head>
<body>
    <!--Header-->
    <div id="header"> 
        <div class="container flex space-between align-items">
            <div class="logo">
              <h1 style="color:white;font-size:40px; font-family: 'Anton', sans-serif; margin-left:10px;
" class="logotitle"> SAMSUNG</h1>
            </div>
            <div class="menu">
                <ul>
                <?php if(isset($_SESSION['id'])){ ?>
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="about.php">ABOUT</a></li>
                    <li><a href="contact.php">CONTACT</a></li>
                    <?php if(isset($_SESSION['permission']) && ($_SESSION['permission'] == 1)){ ?>
                        <li><a href="add_news.php">ADD NEWS</a></li>
                        <li><a href="kontaktet.php">MESSAGES</a></li>
                    <?php } ?>
                    <?php if(isset($_SESSION['name'])){?>
                        <li> <a href="#"><?php echo htmlspecialchars($_SESSION['name']); ?></a></li>
                        <li><a href="logout.php">LOGOUT</a></li>
                    <?php }?>
                <?php }else{ ?>
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="about.php">ABOUT</a></li>
                    <li><a href="contact.php">CONTACT</a></li>
                    <li><a href="login.php">LOGIN</a></li>
                    <li><a href="register.php">REGISTER</a></li>
                <?php } ?>



                     
                </ul>
            </div>
        </div>
        <div class="container">
            <ul class="secondlist">
                
                <li><a href="watches.php">Watches</a></li>
                <li><a href="seriaa.php">Seria A</a></li>
                <li><a href="serianote.php">Seria Note</a></li>
                <li><a href="serias.php">Seria S</a></li>
            </ul>
        </div>
    </div>
