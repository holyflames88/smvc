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


<div class="row">

    <div class="col-md-6">
        <div class="widget-area no-padding blank">
            <div class="status-upload">
                <form name="new-comment" id="add-form" action="#" method="post">
                    <textarea placeholder="What are you doing right now?" ></textarea>
                    <ul>
                        <li><a title="" data-toggle="tooltip" data-placement="bottom" data-original-title="Audio"><i class="fa fa-music"></i></a></li>
                        <li><a title="" data-toggle="tooltip" data-placement="bottom" data-original-title="Video"><i class="fa fa-video-camera"></i></a></li>
                        <li><a title="" data-toggle="tooltip" data-placement="bottom" data-original-title="Sound Record"><i class="fa fa-microphone"></i></a></li>
                        <li><a title="" data-toggle="tooltip" data-placement="bottom" data-original-title="Picture"><i class="fa fa-picture-o"></i></a></li>
                    </ul>
                    <button type="submit" class="btn btn-success green"><i class="fa fa-share"></i> Share</button>
                </form>
            </div><!-- Status Upload  -->
        </div><!-- Widget Area -->
    </div>

</div>
</div>