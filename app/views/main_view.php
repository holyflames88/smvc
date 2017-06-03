<?php
 if(isset($_SESSION['user'])):
?>
<h1>Добро пожаловать!</h1>
<p>
    HI, <b><?=$_SESSION['user']['login']; ?></b>
</p>
<?php else: ?>

<h1>Добро пожаловать!</h1>
<p>
    HI
</p>
<?php endif; ?>