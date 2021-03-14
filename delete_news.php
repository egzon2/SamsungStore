<?php 
    require 'includes/dbconnect.php';

    if(isset($_GET['posts_id'])){

        $id = $_GET['posts_id'];
    }

    $query = 'DELETE FROM posts WHERE posts_id = :posts_id';
    $query = $pdo ->prepare($query);

    $query->execute(['posts_id' => $id]);

    header("Location: index.php");
?>