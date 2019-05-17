<?php
$sql = "SELECT ad_code FROM ads WHERE ad_name='ads300x600'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
     $ads300x600 = $row["ad_code"];
  }
}
?>
<div class="column is-3" >
  <center><div class="left-sidebar-ads">
    <?php echo $ads300x600; ?>
  </div></center>
</div>
