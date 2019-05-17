
<?php
require_once '../libs/db_connect.php';
?>
  <html>
   <head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/babel-core/6.1.19/browser.js"></script>
     <script src="<?php  echo $mypath;?>js/slider.js"></script>
     <link rel="stylesheet" href="<?php echo $mypath;?>css/fonts.css">
    <link rel="stylesheet" href="<?php  echo $mypath;?>css/slider.css">
    <base target="_parent">
 </head>
 <body>
      <div class="slider-container" dir="rtl">


        <div class="slider-control left inactive"></div>
        <div class="slider-control right"></div>
        <ul class="slider-pagi"></ul>
        <div class="slider">


          <?php
          // ****** load post content
          $sql = "SELECT p_id, p_title, p_image, p_content FROM post ORDER BY p_id DESC LIMIT 4";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
          //foreach content add this
              $row = $result->fetch_assoc();
                 $p_id= $row["p_id"];
                  $p_title = $row["p_title"];
                  $p_image = $row["p_image"];
                  $p_content = $row["p_content"];
              //description substr from content
                  $content_p = strip_tags($p_content);
                  $content = str_split($content_p);
                  $description = '';
                  $i=1;
                    foreach ($content as $char) {
                      $description = $description.''.$char;
                      $i++;
                      if( ($i > 300) || (strcmp($char,'.') == 0) ){
                        break;
                      }
                    }
                    $description = $description.'  . . .';

           ?>
          <div class="slide slide-0 active">
            <div class="slide__bg" style="background-image: url('<?php echo $mypath.''.$p_image;?>');"></div>
            <div class="slide__content">
              <svg class="slide__overlay" viewBox="0 0 720 405" preserveAspectRatio="xMaxYMax slice">
                <path class="slide__overlay-path" d="M0,0 150,0 500,405 0,405" />
              </svg>
              <div class="slide__text">
                <h2 class="slide__text-heading"><a href="<?php echo $mypath.'article/'.$p_id;?>"><?php echo $p_title;?></a></h2>
                <p class="slide__text-desc"><?php echo $description;?></p>
                <a href="<?php echo $mypath.'article/'.$p_id;?>" class="slide__text-link" >إقرأ المزيد</a>
              </div>
            </div>
          </div>

          <?php
          //foreach content add this
              $row = $result->fetch_assoc();
                 $p_id= $row["p_id"];
                  $p_title = $row["p_title"];
                  $p_image = $row["p_image"];
                  $p_content = $row["p_content"];
              //description substr from content
              $content_p = strip_tags($p_content);
              $content = str_split($content_p);

                  $description = '';
                  $i=1;
                    foreach ($content as $char) {
                      $description = $description.''.$char;
                      $i++;
                      if ($i > 300){
                        break;
                      }
                    }
                    $description = $description.'  . . .';
           ?>

          <div class="slide slide-1 ">
            <div class="slide__bg" style="background-image: url('<?php echo $mypath.''.$p_image;?>');"></div>
            <div class="slide__content">
              <svg class="slide__overlay" viewBox="0 0 720 405" preserveAspectRatio="xMaxYMax slice">
                <path class="slide__overlay-path" d="M0,0 150,0 500,405 0,405" />
              </svg>
              <div class="slide__text">
                <h2 class="slide__text-heading"><a href="<?php echo $mypath.'article/'.$p_id;?>"><?php echo $p_title;?></a></h2>
                <p class="slide__text-desc"><?php echo $description;?></p>
                <a href="<?php echo $mypath.'article/'.$p_id;?>" class="slide__text-link" >إقرأ المزيد</a>
              </div>
            </div>
          </div>

          <?php
          //foreach content add this
              $row = $result->fetch_assoc();
                 $p_id= $row["p_id"];
                  $p_title = $row["p_title"];
                  $p_image = $row["p_image"];
                  $p_content = $row["p_content"];
              //description substr from content
              $content_p = strip_tags($p_content);
              $content = str_split($content_p);
                  $description = '';
                  $i=1;
                    foreach ($content as $char) {
                      $description = $description.''.$char;
                      $i++;
                      if( ($i > 300) || (strcmp($char,'.') == 0) ){
                        break;
                      }
                    }
                    $description = $description.'  . . .';
           ?>

          <div class="slide slide-2">
            <div class="slide__bg" style="background-image: url('<?php echo $mypath.''.$p_image;?>');"></div>
            <div class="slide__content">
              <svg class="slide__overlay" viewBox="0 0 720 405" preserveAspectRatio="xMaxYMax slice">
                <path class="slide__overlay-path" d="M0,0 150,0 500,405 0,405" />
              </svg>
              <div class="slide__text">
                <h2 class="slide__text-heading"><a href="<?php echo $mypath.'article/'.$p_id;?>"><?php echo $p_title;?></a></h2>
                <p class="slide__text-desc"><?php echo $description;?></p>
                <a href="<?php echo $mypath.'article/'.$p_id;?>" class="slide__text-link" >إقرأ المزيد</a>
              </div>
            </div>
          </div>

          <?php
          //foreach content add this
              $row = $result->fetch_assoc();
                 $p_id= $row["p_id"];
                  $p_title = $row["p_title"];
                  $p_image = $row["p_image"];
                  $p_content = $row["p_content"];
              //description substr from content
              $content_p = strip_tags($p_content);
              $content = str_split($content_p);
                  $description = '';
                  $i=1;
                    foreach ($content as $char) {
                      $description = $description.''.$char;
                      $i++;
                      if( ($i > 300) || (strcmp($char,'.') == 0) ){
                        break;
                      }
                    }
                    $description = $description.'  . . .';
           ?>

          <div class="slide slide-3">
            <div class="slide__bg" style="background-image: url('<?php echo $mypath.''.$p_image;?>');"></div>
            <div class="slide__content">
              <svg class="slide__overlay" viewBox="0 0 720 405" preserveAspectRatio="xMaxYMax slice">
                <path class="slide__overlay-path" d="M0,0 150,0 500,405 0,405" />
              </svg>
              <div class="slide__text">
                <h2 class="slide__text-heading"><a href="<?php echo $mypath.'article/'.$p_id;?>"><?php echo $p_title;?></a></h2>
                <p class="slide__text-desc"><?php echo $description;?></p>
                <a href="<?php echo $mypath.'article/'.$p_id;?>" class="slide__text-link" >إقرأ المزيد</a>
              </div>
            </div>
          </div>
        </div>
        <?php
          } else {
            echo 'nothing found.' ;
          }
         ?>
      </div>
<body>
