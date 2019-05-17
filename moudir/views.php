<?php
session_start();
error_reporting(1);
header("content-type: text/html; charset=utf-8");
require_once '../libs/db_connect.php';
 ?>
 <html>
   <head>
     <title>Aticles Views</title>
   </head>
   <body>
     <div dir="rtl" style="text-align: right;">
     <?php
     $filtre = $_GET['filtre'];
     if ($filtre == "views"){
       $sql = "SELECT p_title, p_views, p_id FROM post ORDER BY p_views DESC";
     } else {
       $sql = "SELECT p_title, p_views, p_id FROM post ORDER BY p_id DESC";
     }
     $result = $conn->query($sql);
     if ($result->num_rows > 0) {
         while($row = $result->fetch_assoc()) {
             $p_title = $row["p_title"];
             $p_id = $row["p_id"];
             $p_views = $row["p_views"];
            echo '<p style="font-size: 17; margin-right:5%;">'.$p_id.' | '.$p_title.' | '.$p_views.'</p><hr>';
         }
       }
      ?>
    </div>
   </body>
 </html>
