<div>
    <p><h2>Query Param</h2></p>
    <div>
        <?php foreach ($data[5] as $row): ?>
            <p><u><?=$row['title']; ?></u></p>
            <p><?=$row['text']; ?></p>
        <?php endforeach; ?>
    </div>
</div>