<?php
// upload function
function uploadImage($img,$dir,$name,$id,$t) {
$target_file = __DIR__.'/../../'.$dir.'sport216tn_id'.$id.'t'.$t.'n'.$name;
$imageFileType = pathinfo($img['name'],PATHINFO_EXTENSION);
$check = getimagesize($img["tmp_name"]);
if(!$check) {
    return false;
}
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
    return false;
}
if(move_uploaded_file($img["tmp_name"], $target_file)) {
    return true;
}
else
    return false;
}
//return date difference
function date_diff_ar($since_time){
  $since_hour = date("H",strtotime($since_time));
  $since_minutes = date("i",strtotime($since_time));

  $now_time = date('H:i');
  $now_hour = date("H",strtotime($now_time));
  $now_minutes = date("i",strtotime($now_time));

  $diff_hour = $now_hour - $since_hour;
  $diff_minutes = $now_minutes - $since_minutes;
  $diff_minutes = abs($diff_minutes);

  $hour = '';
  $minutes = '';
  $pre = 'منذ';
  $mid = 'و';

  if ($diff_minutes == 0){
    if ($diff_hour == 0) {
      $minutes = 'الآن';
      $pre = '';
      $mid = '';
    }
  } else if ($diff_minutes == 1){
    $minutes = 'دقيقة';
  } else if ($diff_minutes == 2){
    $minutes ='دقيقتين';
  } else if ($diff_minutes < 11){
    $minutes = $diff_minutes.' دقائق';
  } else {
    $minutes = $diff_minutes.' دقيقة';
  }


    if ($diff_hour == 0) {
      $hour = '';
      $mid = '';
    } else if ($diff_hour == 1){
      $hour = 'ساعة';
    } else if ($diff_hour == 2){
      $hour = 'ساعتين';
    } else if ($diff_hour < 11){
      $hour = $diff_hour.' ساعات';
    } else {
      $hour = $diff_hour.' ساعة';
    }

    $final = $pre.' '.$hour.' '.$mid.' '.$minutes;
  return $final;
}
//first visit detect
function is_first_time($id)
{
    if (isset($_COOKIE[$id.'_first_time'])) {
        return false;
    }

    $domain = COOKIE_DOMAIN ? COOKIE_DOMAIN : $_SERVER['HTTP_HOST'];

    // expires in 30 days.
    setcookie('_first_time', '1', time() + (WEEK_IN_SECONDS * 4), '/', $domain);

    return true;
}
 ?>
