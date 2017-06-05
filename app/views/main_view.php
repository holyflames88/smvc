<?php
 if(isset($_SESSION['user'])):
?>
<h1>Добро пожаловать!</h1>
<p>
    HI, <b><?=$_SESSION['user']['login']; ?></b>
</p>
<?php else: ?>

     <h2><b>Добро пожаловать!</b></h2>
<p>
    Not Login
</p>
<?php endif; ?>
<div id="myajax">Loading...</div>
<div id="comments" align="left"></div>
<script type="text/javascript">
    $(function() {

        setInterval(function() {
            $.getJSON("/comments/getajax", function(json) {

                var html = "";

                json.forEach(function(val) {
                    var keys = Object.keys(val);
                    html += "<div class = 'cat'>";
                    keys.forEach(function(key) {
                        html += "<div class=\"panel panel-default\"><div class=\"panel-heading\"><b class=\"panel-title\"><b>" + val[key].login_id + "</b> / " + val[key].date + "</div><div class=\"panel-body\">" + val[key].text + "</div></div>";
                       // html += val[key].text + "<br>";
                    });
                    html += "</div><br>";
                    $('#myajax').hide();
                    $('#comments').html(html);
                    console.log(html);
                });
            });
           }, 3000
        );
/*
        function newAjax() {
            $.getJSON("/comments/getajax", function(json) {

                var html = "";

                json.forEach(function(val) {
                    var keys = Object.keys(val);
                    html += "<div class = 'cat'>";
                    keys.forEach(function(key) {
                        html += "<strong>" + key + "</strong>: " + val[key] + "<br>";
                    });
                    html += "</div><br>";
                });
           });
        };
*/
/*
        function myAjax() {
            $.ajax({
                    url: '/comments/getajax',
                 cahche: false,
                   type: 'GET',
               dataType: 'json',
            contentType: 'application/json; charset=utf-8',
             beforeSend: function() {
                  $('#myajax').html('Loading...');
             },
                success: function(data) {
                   $('#myajax').hide();

                   var html = "";
                   data.forEach(function(val) {
                       var keys = Object.keys(val);
                       html += "<div class = 'cat'>";
                       keys.forEach(function() {
                           html += "<strong>" + val.login_id + "</strong>: " + val.date + "<br>";
                       });
                       html += "</div><br>";
                   });

                   $('#comments').html(html);
                   console.log(html);
                },
                  error: function(msg) {
                  $('myajax').text(msg.responseText);
                },
            });
        };
*/
    });
</script>
