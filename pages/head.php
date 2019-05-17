<meta content="text/html" charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="theme-color" content="#303147" />

<link rel="stylesheet" href="<?php echo $mypath;?>css/fonts.css">
<link rel="shortcut icon" href="<?php echo $mypath;?>images/resources/favico.png" type="image/x-icon">
<link rel="stylesheet" href="<?php echo $mypath;?>css/bulma/bulma.min.css">
<link rel="stylesheet" href="<?php echo $mypath;?>css/main.css">

<script src="<?php echo $mypath;?>js/front-end.js"></script>
<script defer src="https://use.fontawesome.com/releases/v5.1.0/js/all.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="<?php echo $mypath;?>js/load-more.js"></script>
<?php
$sql = "SELECT ad_code FROM ads WHERE ad_name='analytics-tracking-code'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
     $analytics_tracking_code = $row["ad_code"];
  }
}
    echo $analytics_tracking_code;
?>
<?php
$sql = "SELECT ad_code FROM ads WHERE ad_name='adsense-auto-ads'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
     $adsense_auto_ads = $row["ad_code"];
  }
}
    echo $adsense_auto_ads;
?>
