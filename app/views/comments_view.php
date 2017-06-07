<h2>Comments page!</h2>
<div align="left" style="width:500px;">
    <?php foreach ($data[1] as $row): ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <b class="panel-title"><b><?=$row['login_id']; ?></b> / <?=$row['date']; ?>
        </div>
        <div class="panel-body">
            <?=$row['text']; ?>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<?php if(isset($_SESSION['user'])): ?>
    <hr>
    <div align="left" class="col-md-6">
    <!-- comments form start -->
    <div class="comments-form">
        <h2 class="title"><b>Add your comment</b></h2>
        <form role="form" id="comment-form" action="" method="post">
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
            <input type="submit" name="addnew" value="Submit" class="btn btn-default">
        </form>
    </div>
    <!-- comments form end -->
    </div>
<?php else: ?>
<p>You are not login, please login for share comment!</p>
<?php endif; ?>
