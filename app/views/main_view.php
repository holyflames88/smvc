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
<div id="myajax"><img src="/css/img/load.gif"><p>Loading...</p></div>
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
         *
         */

         $('#send').click(function(e) {
             e.preventDefault();

             var login_id = $('#name4').val();
             var text = $('#message4').val();
            $.ajax({
               url: 'comments/add',
             cache: false,
              data: '{login_id: login_id, text: text}',
          dataType: 'json',
       contentType: 'application/json; charset=utf-8',
              type: 'POST',
           success: function(data) {
                   $('#success').html('The response from server is: ' + data.status + ' and ' + data.statusText + ' and code: ' + data.statusCode)
                },
             error: function(data) {
                   $('#err').html('Timeout, there are no response from server... ' + data.statusText);
                },

            });
         });
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

<hr>
<div id="success"></div>
<div id="err"></div>
<div class="row">

    <div align="left" class="col-md-6">
        <div class="comments-form">
            <h2 class="title"><b>Add your comment</b></h2>
            <form role="form" id="comment-form" action="#" method="post">
                <div class="form-group has-feedback">
                    <label for="name4">Name</label>
                    <input type="text" class="form-control" id="name4" placeholder="" name="name4" required>
                    <i class="fa fa-user form-control-feedback"></i>
                </div>
                <div class="form-group has-feedback">
                    <label for="message4">Message</label>
                    <textarea class="form-control" rows="8" id="message4" placeholder="" name="message4" required></textarea>
                    <i class="fa fa-envelope-o form-control-feedback"></i>
                </div>
                <button id="send" type="submit" name="addnew" class="btn btn-default">Add comment</button>
            </form>
        </div>
    </div>

</div>
</div>