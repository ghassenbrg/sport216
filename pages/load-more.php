<?php
if(!empty($_POST["id"])){

    // Include the database configuration file
    require_once '../libs/db_connect.php';

    $sql = "SELECT ad_code FROM ads WHERE ad_name='in-feed-ads'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
         $in_feed_ads = $row["ad_code"];
      }
    }
    //--------- from post db ----
      //count bre articles
    $pid = $_POST['id'];
    $cid = $_POST['c_id'];
    $sql = "SELECT COUNT(p_id) as nbre FROM post WHERE p_id < $pid AND p_cat = $cid ";
    $r = $conn->query($sql);
    $row = $r->fetch_assoc();
    $nbre = $row["nbre"];

    //--------- from cat db -----
    $sql = "SELECT cat_name FROM cat WHERE cat_id=$cid";
    $r = $conn->query($sql);

    if ($r->num_rows > 0) {
      // output data of each row
      while($row = $r->fetch_assoc()) {
          $cat = $row["cat_name"];
      }
    }

     //slect articles
    $sql = "SELECT p_title, p_image, p_content, p_date, p_time, p_views, p_id FROM post WHERE p_id < $pid AND p_cat = $cid ORDER BY p_id DESC LIMIT 6";
    $result = $conn->query($sql);
    $i = 1;
    if ($result->num_rows > 0) {
        while(($row = $result->fetch_assoc()) && ($i <= 6)) {
            $p_title = $row["p_title"];
            $p_image = $row["p_image"];
            $p_id = $row["p_id"];
            $p_content = $row["p_content"];
            $p_date = $row["p_date"];
            $p_time = $row["p_time"];
            $p_views = $row["p_views"];
            //description substr from content
            $content_p = strip_tags($p_content);
            $content = str_split($content_p);
                $description = '';
                $j=1;
                  foreach ($content as $char) {
                    $description = $description.''.$char;
                    $j++;
                    if($j > 100){
                      break;
                    }
                  }
                  $description = $description.'  ...';
                  $date = date('Y-m-d');

                  if ($date == $p_date){
                    $since = date_diff_ar($p_time);
                  }
                  else{
                   $since ='نشر يوم: '.$p_date;
                   }
            echo '<div class="column is-5 box" id="article-box" >
                    <a class="button" id="button-cat-article-box" href="'.$mypath.'cat/'.$cid.'">'.$cat.'</a>
                    <a href="'.$mypath.'article/'.$p_id.'"><figure class="image is-3by1">
                      <img src="'.$mypath.''.$p_image.'" class="article-image" width="100%" /><hr>
                    </figure>
                      <p class="article-titre">'.$p_title.'</p></a>
                      <hr><span class="info-small">
                          <img  class="info-icon" width="20px" height="12px" src="'.$mypath.'images/resources/views-mini-icon.png"/>
                          '.$p_views.'
                          <img class="info-icon" width="12px" height="12px" src="'.$mypath.'images/resources/clock-mini-icon.png"/>
                          '.$since.'
                      </span><hr>
                      <p class="article-desc">'.$description.'</p>
                      <a class="button" id="button-read-more-article-box" href="'.$mypath.'article/'.$p_id.'">- إقرأ المزيد -</a>
                  </div>';
           if($i % 4 == 0){
             echo '<div class="column is-5" id="article-box-ad">'.$in_feed_ads.'</div>';
           }
           $i++;
        }
        if ($nbre > ($i - 1)){
          echo '<div class="column is-11 box" id="show_more_main">
                    <span id="'.$p_id.'" class="show_more" title="Load more posts" onclick="showMore()">
                      <p>إظهار المزيد</p>
                    </span>
                    <span class="loading" style="display: none;">
                      <p>loading...</p>
                    </span>
                </div>';
        }
    }
  }
?>
