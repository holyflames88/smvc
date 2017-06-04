<?php
if(isset($_SESSION['user'])) {
    echo $_SESSION['user']['login'];
  } else {
?>
<div class="col-md-4">
<form class="form-signin" action="" method="post">
        <h2 class="form-signin-heading">Please sign in</h2>
    <label for="inputUsername" class="sr-only">Username</label>
    <input name="username" type="text" id="inputUsername" class="form-control" placeholder="Username" required autofocus><br>
    <label for="inputPassword" class="sr-only">Password</label>
    <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required><br>
    <button name="ok" class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    </form>
</div>
<?php } ?>