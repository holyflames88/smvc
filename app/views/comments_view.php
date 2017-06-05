<h2>Comments page!</h2>
<div align="left" style="width:500px;">
    <?php foreach ($data[1] as $row): ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <b class="panel-title"><b><?=$row['login']; ?></b> / <?=$row['date']; ?>
        </div>
        <div class="panel-body">
            <?=$row['text']; ?>
        </div>
    </div>
    <?php endforeach; ?>
</div>