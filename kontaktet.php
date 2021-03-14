<?php 

  session_start();
  if(($_SESSION['permission'] == 1)){
   require 'includes/dbconnect.php';

  
   $query = $pdo->query('SELECT * FROM kontaktforma inner join news_country on news_country.country_id = kontaktforma.country_id');
   $newsdata= $query->fetchAll();
  
?>

<html>
<?php include 'includes/header.php' ;?>
<h2 class="menu_show"><ul><li><a href="contact.php">Contact messages</a></li></ul></h2>

<div class="tabela">
<table>

  <tr>
    <th>Emni</th>
    <th>Mbiemni</th>
    <th>Email</th>
    <th>Gjinia</th>
    <th>Interesuar</th>
    <th>Shteti</th>
    <th>Mesazhi</th>
  </tr>
  <?php foreach($newsdata as $news):?>
  <tr>
    <td><?php echo $news['emri']; ?></td>
    <td><?php echo $news['mbiemri'];?></td>
    <td><?php echo $news['email'];?></td>
    <td><?php echo $news['gjinia'];?></td>
    <td><?php echo $news['technology'];?></td>
    <td><?php echo $news['country_name'];?></td>
    <td><?php echo $news['mesazhi']; ?></td>
    <?php endforeach; ?>
  </tr>
  
</table>
  </div>

<?php include 'includes/footer.php';?> 
</html>

<?php } ?>