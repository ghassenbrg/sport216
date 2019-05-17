<?php
session_start();
error_reporting(1);
header("content-type: text/html; charset=utf-8");
require_once '../libs/db_connect.php';
 ?>
 <!DOCTYPE html dir="rtl" lang="ar">
 <html>
   <head>
     <title>إضافة مقال | SPORT216</title>
     <?php include '../pages/head.php'; ?>
     <?php include 'pages/admin-head.php'; ?>
     <script src="<?php echo $mypath;?>js/admin-panel.js"></script>
   </head>
  <body>
    <?php
    require_once '../libs/cpanel.class.php';
    $cp = new CPanel($conn);

    if(isset($_POST['save-btn'])) {
    	$p_title = $_POST['p_title'];
    	$p_content = $_POST['edit'];
    	$p_cat = $_POST['p_cat'];
    	if($cp->addPost($p_title, $_FILES, $p_content, $p_cat)) {
    		$success = 1;
    		echo "<div class='notification is-success' id='notif' dir='rtl'><button class='delete' onclick='hideNotif ()'></button>تمّ إضافة المقالة بنجاح...</div>";
    	} else {
    		$success = 0;
    	}
    }
     ?>
    <div class="columns">
      <div class="column is-one-quarter">
      </div>
    <div class="column is-half" dir="rtl">
      <br><center><h1 >إضافة المقالة</h1><br></center><br>
      <?php
        if ($success == 1){
          echo '<center><h2 ><a target="_blank" href="'.$mypath.'article/'.$cp->post_id.'">رابط المقال المضاف</a></h2><br></center><br>';
        }
      ?>
      <form method="POST" action="/ar/moudir/addpost.php" enctype="multipart/form-data">
      <div class="field">
      <label for="p_title" class="label">عنوان المقالة :</label>
      <input type="text" name="p_title" id="p-title" class="input"/>
      </div>
      <div class="field">
      <label for="edit" class="label">محتوى المقالة :</label>
      <textarea name="edit" id="edit" ></textarea><br>
      <div class="field">
      <label for="p_image" class="label">الصورة المرافقة :</label>
      <div class="file has-name">
        <label class="file-label">
          <input class="file-input" type="file" name="p_image" id="p_image" onchange="showFileName()"/>
          <span class="file-cta">
            <span class="file-icon">
              <i class="fas fa-upload"></i>
            </span>
            <span class="file-label">
              Choose a file…
            </span>
          </span>
          <span class="file-name" id="file-name">
            file name will be here...
          </span>
        </label>
      </div>
      </div>

      </div>
      <div class="field">
      <label class="label">التصنيف :</label>
      <div class="select">
      <select name="p_cat" id="p_cat">
      <option value="1">(بدون تصنيف)</option>
      <option value="2">كرة القدم الوطنيّة</option>
      <option value="3">كرة القدم العالميّة</option>
      <option value="4">المحترفين بالخارج</option>
      <option value="5">أخبار متفرقة</option>
      </select>
      </div>
      </div>
      <div class="field">
    <!--  <label class="label">Save changes:</label> -->
      <button type="submit" name="save-btn" class="button is-link">نشر في الموقع</button>
      </div>
      </form>
    </div>
    <div class="column is-one-quarter">
    </div>
  </div>
  <?php include '../pages/footer.php'; ?>

  <script>
  $('#edit').froalaEditor({
    height: 300
  });
      $(function(){
        $('#edit')
          .on('froalaEditor.initialized', function (e, editor) {
            $('#edit').parents('form').on('submit', function () {
              console.log($('#edit').val());
              return false;
            })
          })
          .froalaEditor({enter: $.FroalaEditor.ENTER_P, placeholderText: null})

      });
  </script>
  </body>
</html>
