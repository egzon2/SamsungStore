<!DOCTYPE html>
<html lang="en">
<head>
   <style>
     div{
         display:flex;
         justify-content:center;
         align-items:center;
         flex-flow:column;
         width:1400px;
         height:600px;
     }
     h1{
         
         color:red;
     }
     a ul li{
         list-style-type:none;
         color:blue;
         

     }
   </style>
</head>
<body>
    <div>
        <h1>KU PO DON ME HI O SHOQ!</h1>
        <div>
        <a href="index.php">KTHEHU BACIT KA KE ARDH!!!</a>
        <?php header("refresh:3;url=http://localhost/shoesstoreonline/index.php")?>
        </div>

    </div>
    
</body>
</html>