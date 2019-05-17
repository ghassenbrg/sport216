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

// select in-article-ads
    //**********  ads300x250
$sql = "SELECT ad_code FROM ads WHERE ad_name='ads300x250'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
     $ads300x250 = $row["ad_code"];
  }
}
//**********  in-article-ads
$sql = "SELECT ad_code FROM ads WHERE ad_name='in-article-ads'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
 $in_article_ads = $row["ad_code"];
}
}
//**********  related-post-ads
$sql = "SELECT ad_code FROM ads WHERE ad_name='related-post-ads'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
 $related_post_ads = $row["ad_code"];
}
}
//------------ get data -----------------------------------
  //--------- from post db -----
$id = $_GET['id'];

$sql = "SELECT p_title, p_image, p_content, p_cat, p_views, p_date, p_time FROM post WHERE p_id=$id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $p_title = $row["p_title"];
        $p_image = $row["p_image"];
        $p_content = $row["p_content"];
        $p_views = $row["p_views"];
        $cat = $row["p_cat"];
				$p_views = $row["p_views"];
				$p_date = $row["p_date"];
				$p_time = $row["p_time"];
    }
} else {
	header("location: /ar?e=404");
	exit();
}

     //create cookie or set views nbre
$cookie_name = $id.'_article_sport216';
$cookie_value = "1";
$domain = COOKIE_DOMAIN ? COOKIE_DOMAIN : $_SERVER['HTTP_HOST'];
if(!isset($_COOKIE[$cookie_name])) {
	setcookie($cookie_name, $cookie_value, time() + (86400 * 30),'/',$domain); // 86400 = 1 day
	//set views nbre
		$p_views++;
		$sql = "UPDATE post SET p_views = $p_views WHERE p_id=$id";
		$result = $conn->query($sql);
}

//--------- from cat db -----
$sql = "SELECT cat_name FROM cat WHERE cat_id=$cat";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
      $p_cat = $row["cat_name"];
  }
} else {
  echo "0 results cat";
}
?>
<!DOCTYPE html dir="rtl" lang="ar">
<html>
  <head>
    <title><?php echo $p_title;?> | SPORT216</title>
    <?php include 'pages/head.php'; ?>
		<!--  ------------- facebook markup-------------- -->
		<meta property="og:url"                content="https://sport216.tn/ar/article/<?php echo $id;?>" />
		<meta property="og:type"               content="article" />
		<meta property="og:title"              content="<?php echo $p_title;?>" />
		<meta property="og:description"        content="موقع رياضي تونسي SPORT216.tn" />
		<meta property="og:image"              content="https://sport216.tn/ar/<?php echo $p_image;?>" />
  </head>
  <body>
    <section dir="rtl">
        <?php include 'pages/mobile-navbar.php'; ?>
        <div class="columns is-gapless is-desktop">
          <?php include 'pages/right-sidebar.php'; ?>
     <!-- ******************************* content ******************************* -->
          <div class="column is-three-fifths , box" id="content">
            <div class="cat">
              <a href="<?php echo $mypath;?><?php 	echo "cat/$cat"; ?>" class="button" id="cat-button"><?php echo $p_cat;?></a>
            </div>
            <div class="post-title">
              <h3 class="title is-3"><?php echo $p_title;?></h3>
            </div>
            <br><figure class="image is-2by1">
              <img src="<?php echo $mypath;?><?php echo $p_image;?>" width="100%"  height="200px" />
            </figure>
            <!-- to add author info etc. -->
            <hr><span class="info">
	              <img  class="info-icon" width="23px" height="14px" src="<?php echo $mypath;?>images/resources/views-mini-icon.png"/>
								المشاهدات: <?php echo $p_views;?>
								<img class="info-icon" width="14px" height="14px" src="<?php echo $mypath;?>images/resources/clock-mini-icon.png"/>
								<?php
								$date = date('Y-m-d');

								if ($date == $p_date){
									$since = date_diff_ar($p_time);
									echo $since;
								}
								else{
								 echo 'نشر يوم: '.$p_date;
								 }
								 ?>
						</span><hr>
            <!-- in-article-ads-top -->
            <center></center><div class="in-article-ads-top" width="300px" height="250px">
						  <?php echo $ads300x250; ?>
            </div></center><br>
					  <!-- article text -->
            <div class="article-text">
              <?php echo $p_content;?>
            </div>
					<hr>
						<!-- related articles -->
						<div class="columns" id="related-articles">
               <div class="column" id="next-article">
								 <?php
								 $sql = "SELECT p_title, p_id FROM post WHERE p_id > $id ORDER BY p_id ASC LIMIT 1";
								 $result = $conn->query($sql);
								 if ($result->num_rows > 0) {
								     // output data of each row
								     while($row = $result->fetch_assoc()) {
								         $r_title = $row["p_title"];
								         $r_id = $row["p_id"];
								     }
								  ?>
								 <a href="<?php echo $mypath.'article/'.$r_id;?>"><span id="n_p">< التّالي</span>
								 <p id="tile-link"><?php echo $r_title;?></p></a>
								 <?php } ?>
							 </div>
							 <div class="column" id="prev-article">
								 <?php
								 $sql = "SELECT p_title, p_id FROM post WHERE p_id < $id ORDER BY p_id DESC LIMIT 1";
								 $result = $conn->query($sql);
								 if ($result->num_rows > 0) {
										 // output data of each row
										 while($row = $result->fetch_assoc()) {
												 $r_title = $row["p_title"];
												 $r_id = $row["p_id"];
										 }
									?>
								 <a href="<?php echo $mypath.'article/'.$r_id;?>"><span id="n_p">السّابق ></span>
								 <p id="tile-link"><?php echo $r_title;?></p></a>
								 <?php } ?>
							</div>
						 </div>
            <!-- related articles ads -->
            <div class="related-ads">
							 <?php echo $related_post_ads; ?>
            </div>
            <!-- in-article-ads-bottom -->
            <div class="in-article-ads-bottom">
							<?php echo $in_article_ads; ?>
            </div>
            <!-- **********      footer  *************** -->
            <br><br><?php include 'pages/footer.php'; ?>
          </div>
    <!-- *********************************************************************** -->
          <?php include 'pages/left-sidebar.php'; ?>
        </div>
    <section>
  </body>
</html>
