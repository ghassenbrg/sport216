//hide notification button
 function hideNotif () {
   var notif = document.getElementById("notif-danger");
   notif.style.display = "none";
  };
  function showMoreLatest (){
          //  window.alert(location.hostname);
          var ID = document.getElementsByClassName("show_more")[0].id;
          $('.show_more').hide();
          $('.loading').show();
          $.ajax({
              type:'POST',
              url:'pages/load-more-latest.php',
              data: {"id": ID},

              success:function(html){
                  $('#show_more_main').remove();
                  $('#postList').append(html);
              }
          });
      };
  //load more articles button
  function showMore (){
          //  window.alert(location.hostname);
          var ID = document.getElementsByClassName("show_more")[0].id;
          var CATID = document.getElementsByClassName("cat-titre")[0].id ;
          $('.show_more').hide();
          $('.loading').show();
          $.ajax({
              type:'POST',
              url:'../pages/load-more.php',
              data: {"id": ID, "c_id": CATID},

              success:function(html){
                  $('#show_more_main').remove();
                  $('#postList').append(html);
              }
          });
      };
