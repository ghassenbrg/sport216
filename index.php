<?php
session_start();
error_reporting(1);
header("content-type: text/html; charset=utf-8");
require_once 'libs/db_connect.php';
require_once 'libs/functions.php';
$e = $_GET['e'];

// get ads responsive code
$sql = "SELECT ad_code FROM ads WHERE ad_name='responsive-ads'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
     $responsive_ads = $row["ad_code"];
  }
}
 ?>
<!DOCTYPE html dir="rtl" lang="ar">
<html>
  <head>
    <title>SPORT216 | سبورت216</title>
    <?php include 'pages/head.php'; ?>
  </head>
  <body>
    <section dir="rtl">
        <?php include 'pages/mobile-navbar.php'; ?>
        <div class="columns is-gapless is-desktop" >
          <?php include 'pages/right-sidebar.php'; ?>
     <!-- ******************************* content ******************************* -->
          <div class="column is-three-fifths box" id="content">
            <?php
              if($e == '404'){
                echo "<div class='notification is-danger' id='notif-danger' dir='rtl'><button class='delete' onclick='hideNotif ()'></button>خطأ 404 الصفحة غير موجودة.</div>";
              }
            ?>
            <div class="slider" style="position: relative;">
               <iframe  width="100%" height="70%" src="<?php echo $mypath;?>pages/slider.php"></iframe>
            </div>
            <br><div class="ads-responsive">
              <?php echo $responsive_ads; ?>
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
