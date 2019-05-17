<?php
require_once '../libs/functions.php';
require_once '../libs/class.upload.php';
class CPanel {
	public $conn = '';
	public $post_id = '#';
	public function __construct($conn)	{
		$this->conn = $conn;
	}

public function addPost($title, $img, $content, $cat) {
  if(!isset($title[0]) || !isset($content[0]) || !isset($cat[0]) || !isset($img['p_image']['name'][0])) {
    echo "<div class='notification is-danger' id='notif' dir='rtl'><button class='delete' onclick='hideNotif ()'></button>لم تقم بملء جميع الخانات...</div>";
    return false;
  }
//  $dateNow = date("Y-m-d");
  $title = $this->conn->escape_string($title);
  $content = $this->conn->escape_string($content);
	$p_date = date('Y-m-d');
	$p_time = date('H:i:s');
  $p_add = "INSERT INTO post(p_title, p_content, p_cat, p_date, p_time) VALUES('$title', '$content', '$cat', '$p_date', '$p_time')";
  if(!$this->conn->query($p_add)) {
    echo "<div class='notification is-danger' id='notif' dir='rtl'><button class='delete' onclick='hideNotif ()'></button>خطأ في إضافة المقال إلى قاعدة البيانات !</div>";
    return false;
  }
  $p_id = $this->conn->insert_id;
	$this->post_id = $p_id;
	$t = time();
  foreach ($img as $key => $value) {
    if(isset($value['tmp_name'][0])) {
      if(uploadImage($value, "ar/images/posts-images/",$this->conn->escape_string($value['name']),$p_id,$t) === false) {
        echo "<div class='notification is-danger' id='notif' dir='rtl'><button class='delete' onclick='hideNotif ()'></button>خطأ في رفع الصورة !</div>";
        $this->conn->query("DELETE FROM `post` WHERE `p_id` = '".$p_id."'");
        return false;
      }
      if(!$this->conn->query("UPDATE `post` SET `$key` = 'images/posts-images/sport216tn_id".$p_id."t".$t."n".$this->conn->escape_string($value['name'])."' WHERE `p_id` = '$p_id'")) {
        echo "<div class='notification is-danger' id='notif' dir='rtl'><button class='delete' onclick='hideNotif ()'></button>حدث خطأ عند إضافة رابط الصورة إلى قاعدة البيانات !</div>";
        $this->conn->query("DELETE FROM `post` WHERE `p_id` = '".$q_id."'");
        return false;
      }
    }
  }
  return true;
}
}
 ?>
