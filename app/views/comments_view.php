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
<div class="row">
    <div class="col-md-6">
        <div class="widget-area no-padding blank">
            <div class="status-upload">
                <form name="new-comment" id="add-form" action="" method="post">
                    <textarea placeholder="What are you doing right now?" ></textarea>
                    <button type="submit" class="btn btn-success green"><i class="fa fa-share"></i> Share</button>
                </form>
            </div><!-- Status Upload  -->
        </div><!-- Widget Area -->
    </div>
</div>
<?php else: ?>
<p>You are not login, please login for share comment!</p>
<?php endif; ?>
