html2canvas([document.getElementById('mydiv')], {
    onrendered: function(canvas) {
       document.body.appendChild(canvas);
       var data = canvas.toDataURL('image/');
       // AJAX call to send `data` to a PHP file that creates an image from the dataURI string and saves it to a directory on the server
    }
});
