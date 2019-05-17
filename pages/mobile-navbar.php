<?php
$sql = "SELECT ad_code FROM ads WHERE ad_name='responsive-ads'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
     $responsive_ads = $row["ad_code"];
  }
}
?>
<div class="for-mobile" id="for-mobile">
<div class="columns is-gapless is-mobile" id="mobile-navbar">
  <div class="column is-half" id="logo-mobile">
    <a href="<?php echo $mypath;?>"><img src="<?php  echo $mypath; ?>images/resources/sport216-logo.png" width="80%" /></a>
  </div>
  <div class="column is-half" id="menu-mobile">


    <div class="field">
      <div class="control">
        <div class="select is-danger" >
          <select onchange="location = this.value;">
            <option value=""> - القائمة - </option>
            <option value="<?php echo $mypath;?>">الرئيسيّة</option>
            <option value="<?php echo $mypath;?>cat/2">كرة القدم الوطنيّة</option>
            <option value="<?php echo $mypath;?>cat/3">كرة القدم العالميّة</option>
            <option value="<?php echo $mypath;?>cat/4">المحترفين بالخارج</option>
            <option value="<?php echo $mypath;?>cat/5">أخبار متفرقة</option>
            <option value="<?php echo $mypath;?>live">البث المباشر للمباريات</option>
          </select>
        </div>
      </div>
    </div>
  </div>

</div>
<div class="mobile-ads">
   <?php echo $responsive_ads; ?>
</div>
</div>
