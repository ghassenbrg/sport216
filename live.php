<?php
session_start();
error_reporting(1);
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
?>
<!DOCTYPE html dir="rtl" lang="ar">
<html>
  <head>
    <title>بث مباشر | الترجي -الملعب التونسي | SPORT216</title>
    <?php include 'pages/head.php'; ?>
		<!--  ------------- facebook markup-------------- -->
		<meta property="og:url"                content="https://sport216.tn/ar/live" />
		<meta property="og:type"               content="article" />
		<meta property="og:title"              content="بث مباشر | الترجي -الملعب التونسي" />
		<meta property="og:description"        content="موقع رياضي تونسي SPORT216.tn" />
  </head>
  <body>
    <section dir="rtl">
        <?php include 'pages/mobile-navbar.php'; ?>
        <div class="columns is-gapless is-desktop">
          <?php include 'pages/right-sidebar.php'; ?>
     <!-- ******************************* content ******************************* -->
          <div class="column is-three-fifths , box" id="content">
            <div class="cat">
              <a href="<?php echo $mypath;?>live" class="button" id="cat-button">live</a>
            </div>
            <div class="post-title">
              <h3 class="title is-3">بث مباشر | الترجي -الملعب التونسي</h3>
            </div>
            <br>
            <!-- in-article-ads-top -->
            <center></center><div class="in-article-ads-top" width="300px" height="250px">
						  <?php echo $ads300x250; ?>
            </div></center><br>
					  <!-- article text -->
            <div class="article-text">
							<iframe width="100%" height="450" src="https://www.youtube.com/embed/K_eIIHBKjDE?autoplay=1" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            </div>
            <!-- related articles ads -->
            <div class="related-ads">
							 <?php echo $related_post_ads; ?>
            </div>
            <!-- in-article-ads-bottom -->
            <div class="in-article-ads-bottom">
							<?php echo $in_article_ads; ?>
            </div>
						<!-- *********** Latest Articles ************ -->
						<br><?php include 'pages/latest-articles.php'; ?>
            <!-- **********      footer  *************** -->
            <br><br><?php include 'pages/footer.php'; ?>
          </div>
    <!-- *********************************************************************** -->
          <?php include 'pages/left-sidebar.php'; ?>
        </div>
    <section>
  </body>
</html>
