
function showFileName () {
   var name = document.getElementById('p_image');
   document.getElementById('file-name').innerHTML = "" + name.files.item(0).name;
 };

 function hideNotif () {
   var notif = document.getElementById("notif");
   notif.style.display = "none";
  };
