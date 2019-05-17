
<?php
require_once '../libs/db_connect.php';
 ?>
<html>
<head>
  <link rel="stylesheet" href="<?php echo $mypath;?>css/fonts.css">
  <link rel="stylesheet" href="<?php echo $mypath;?>css/slider-two.css">
  <script src="<?php echo $mypath;?>js/jquery-3.3.1.min.js"></script>
  <script src="<?php echo $mypath;?>js/slider-two.js"></script>
</head>
<body>
  <div class="CSSgal">

    <!-- Don't wrap targets in parent -->
    <s id="s1"></s>
    <s id="s2"></s>
    <s id="s3"></s>
    <s id="s4"></s>

    <div class="slider">
      <?php
      // ****** load post content
      $sql = "SELECT p_id, p_title, p_image, p_date, p_cat FROM post ORDER BY p_id DESC LIMIT 4";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
             $p_id= $row["p_id"];
              $p_title = $row["p_title"];
              $p_image = $row["p_image"];
              $p_date = $row["p_date"];
              $cat = $row["p_cat"];


              // ****** load cat name
              $sql = "SELECT cat_name FROM cat WHERE cat_id=$cat";
              $r = $conn->query($sql);
              if ($r->num_rows > 0) {
                while($row = $r->fetch_assoc()) {
                    $p_cat = $row["cat_name"];
                }
              } else {
                echo "0 results cat";
              }
      ?>
              <div class="slide-content" style="background-image:url('<?php echo $mypath.''.$p_image;?>');">
                <div class="layer-black" >
               </div>
                  <a href="<?php echo $mypath.'article/'.$p_id;?>"><h2 style="color: white;"><?php echo $p_title;?></h2></a>
                  <a href="<?php echo $mypath.'cat/'.$cat;?>"><p style="color: white;"><?php echo $p_cat;?></p></a>
              </div>
      <?php
          }
      } else {
        echo 'nothing found.' ;
      }
      ?>
    </div>

  <!--  <div class="prevNext">
      <div><a href="#s4"></a><a href="#s2"></a></div>
      <div><a href="#s1"></a><a href="#s3"></a></div>
      <div><a href="#s2"></a><a href="#s4"></a></div>
      <div><a href="#s3"></a><a href="#s1"></a></div>
    </div> -->

    <div class="bullets">
      <a href="#s1" class="s1"></a>
      <a href="#s2" class="s2"></a>
      <a href="#s3" class="s3" rel="no-refresh"></a>
      <a href="#s4" class="s4"></a>
    </div>

  </div>



</body>
