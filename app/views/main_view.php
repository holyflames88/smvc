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
<div id="myajax"></div>
<div id="comments"></div>
<script type="text/javascript">
    $(function() {

        setInterval(myAjax, 3000);

        function myAjax() {
            $.ajax({
                    url: '/comments/getajax',
                 cahche: false,
                   type: 'GET',
               dataType: 'json',
            contentType: 'application/json; charset=utf-8',
                success: function(msg) {
                  var response = JSON.parse(msg);
                      if(response.status == 200) {
                          $('#comments').html("<p>" + response.id + "</p>" + "<p>" + response.text + "</p>");
                      }
                },
                  error: function(msg) {
                  $('myajax').text(msg.responseText);
                },
            });
        };

    });
</script>
