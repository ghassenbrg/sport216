<?php
$sql = "SELECT ad_code FROM ads WHERE ad_name='in-feed-ads'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
     $in_feed_ads = $row["ad_code"];
  }
}
?>
     <!-- ******************************* content ******************************* -->
							<div class="cat-titre">
					   	  <h4 class="title is-4">آخر المقالات</h4>
							</div>
						<div class="columns is-gapless is-multiline is-desktop" id="postList">
							<?php
							//--------- from post db ----
							  //count bre articles
							$sql = "SELECT COUNT(p_id) as nbre FROM post";
							$r = $conn->query($sql);
							$row = $r->fetch_assoc();
							$nbre = $row["nbre"];
               //slect articles
							$sql = "SELECT p_title, p_image, p_content, p_views, p_time, p_date, p_cat, p_id FROM post ORDER BY p_id DESC LIMIT 11";
							$result = $conn->query($sql);
							$i = -1;
							if ($result->num_rows > 0) {
									while(($row = $result->fetch_assoc()) && ($i <= 11)) {
									    $p_title = $row["p_title"];
									    $p_image = $row["p_image"];
									    $p_id = $row["p_id"];
											$p_content = $row["p_content"];
                      $p_date = $row["p_date"];
											$p_time = $row["p_time"];
											$p_views = $row["p_views"];
                      $p_cat = $row["p_cat"];
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
                            //--------- from cat db -----
                            $sql = "SELECT cat_name FROM cat WHERE cat_id=$p_cat";
                            $r = $conn->query($sql);

                            if ($r->num_rows > 0) {
                              // output data of each row
                              while($row = $r->fetch_assoc()) {
                                  $cat = $row["cat_name"];
                              }
                            }
														$date = date('Y-m-d');

														if ($date == $p_date){
															$since = date_diff_ar($p_time);
														}
														else{
														 $since ='نشر يوم: '.$p_date;
														 }
					            echo '<div class="column is-5 box" id="article-box" >
											        <a class="button" id="button-cat-article-box" href="'.$mypath.'cat/'.$p_cat.'">'.$cat.'</a>
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
														  <span id="'.$p_id.'" class="show_more" title="Load more posts" onclick="showMoreLatest()">
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
