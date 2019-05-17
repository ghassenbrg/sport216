<?php
$sql = "SELECT ad_code FROM ads WHERE ad_name='histats-counter'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
      $histats_counter = $row["ad_code"];
  }
}
?>
<footer class="footer">
  <center><span style=" vertical-align: middle;">
<div class="counter-code, content has-text-centered" style="display: inline-block;">
    <?php echo $histats_counter; ?>

</div>
<a target="_blank" href="https://www.facebook.com/ghassen.brg">
  <img style="height: 60px; display: inline-block;" src="<?php echo $mypath; ?>images/resources/ghas-logo.png" />
</a>
</cetner></span>
<div class="content has-text-centered">
  <p>
    <strong>SPORT216.tn</strong> developed by <a target="_blank" href="https://www.facebook.com/ghassen.brg">GhasSen</a> - 2018</a>
  </p>
</div>
</footer>
