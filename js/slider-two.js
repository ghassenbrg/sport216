//slide auto play
var COMP = 2;
var myInterval = setInterval(function () {
            if (COMP > 4){
              COMP = 1;
            }
            window.location.href = $('.s'+COMP).attr('href');
            COMP++;
        },4000);
