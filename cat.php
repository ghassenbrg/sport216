<?php
session_start();
error_reporting(1);
if(!isset($_GET['id']) || !is_numeric($_GET['id'])) {
	header("location: /ar?e=404");
	exit();
}
header("content-type: text/html; charset=utf-8");
require_once 'libs/db_connect.php';
require_once 'libs/functions.php';
//------------ get data -----------------------------------
$id = $_GET['id'];

//get ads300x250 code
$sql = "SELECT ad_code FROM ads WHERE ad_name='in-feed-ads'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
     $in_feed_ads = $row["ad_code"];
  }
}

//--------- from cat db -----
$sql = "SELECT cat_name FROM cat WHERE cat_id=$id";
$r = $conn->query($sql);

if ($r->num_rows > 0) {
  // output data of each row
  while($row = $r->fetch_assoc()) {
      $cat = $row["cat_name"];
  }
} else {
	header("location: /ar?e=404");
	exit();
}
?>
<!DOCTYPE html dir="rtl" lang="ar">
<html>
  <head>
    <title><?php echo $cat;?> | SPORT216</title>
    <?php include 'pages/head.php'; ?>
		<!--  ------------- facebook markup-------------- -->
		<meta property="og:url"                content="https://sport216.tn/ar/cat/<?php echo $id;?>" />
		<meta property="og:type"               content="categorie" />
		<meta property="og:title"              content="<?php echo $cat;?>" />
		<meta property="og:description"        content="موقع رياضي تونسي SPORT216.tn" />
		<meta property="og:image"              content="<?php echo $mypath; ?>images/resources/p-none.png" />
  </head>
  <body>
    <section dir="rtl">
			<?php include 'pages/mobile-navbar.php'; ?>
        <div class="columns is-gapless is-desktop" >
          <?php include 'pages/right-sidebar.php';
                echo '<style>.cat'.$id.'{background-color: #444563;}</style>';
          ?>
     <!-- ******************************* content ******************************* -->
	          <div class="column is-three-fifths" id="content">
							<div class="cat-titre" id="<?php echo $id; ?>">
					   	  <h4 class="title is-4"><?php echo $cat;?></h4>
							</div>
						<div class="columns is-gapless is-multiline is-desktop" id="postList">
							<?php
							//--------- from post db ----
							  //count bre articles
							$sql = "SELECT COUNT(p_id) as nbre FROM post WHERE p_cat=$id";
							$r = $conn->query($sql);
							$row = $r->fetch_assoc();
							$nbre = $row["nbre"];
               //slect articles
							$sql = "SELECT p_title, p_image, p_content, p_date, p_time, p_views, p_id FROM post WHERE p_cat=$id ORDER BY p_id DESC LIMIT 8";
							$result = $conn->query($sql);
							$i = 1;
					    if ($result->num_rows > 0) {
					        while(($row = $result->fetch_assoc()) && ($i <= 8)) {
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
											        <a class="button" id="button-cat-article-box" href="'.$mypath.'cat/'.$id.'">'.$cat.'</a>
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
														  	<p >إظهار المزيد</p>
															</span>
															<span class="loading" style="display: none;">
														  	<img  width = "100px;" src="'.$mypath.'images/resources/loading.gif"/>
															</span>
													</div>';
							  	}
							} else {
								echo '<div class="column" id="article-box-ad">لا توجد نتائج.</div>';
							}
							 ?>

						</div>
            <!-- **********      footer  *************** -->
            <?php include 'pages/footer.php'; ?>
          </div>
    <!-- *********************************************************************** -->
          <?php include 'pages/left-sidebar.php'; ?>
        </div>
    <section>
  </body>
</html>
