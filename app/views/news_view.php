<div align="center">
    <p><h2>TEST PAGE</h2></p>
    <p>TEXT FOR TEST</p>
</div>
<?php
foreach ($data[1] as $row): ?>

    <div align="center">
        <div align="left">
            <h2><?=$row['title']; ?></h2>
            <p><?=$row['text']; ?></p>
            <p><?=$row['date']; ?></p>
        </div>
    </div>
    <hr>

<?php endforeach; ?>

<div>
    <p><h2>Query Param</h2></p>
    <div>
        <?php foreach ($data[2] as $row): ?>
            <p><u><?=$row['title']; ?></u></p>
            <p><?=$row['text']; ?></p>
        <?php endforeach; ?>
    </div>
</div>
