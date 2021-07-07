<?php

include 'header.php';
?>
<body>
<div class="login">
    <h1>Zaoguj się</h1>
    <form action="authenticate.php" method="post">
        <label for="username">
            <i class="fas fa-user"></i>
        </label>
        <input  class="form-control" type="text" name="username" placeholder="Username" id="username" required>
        <label for="password">
            <i class="fas fa-lock"></i>
        </label>
        <input  class="form-control" type="password" name="password" placeholder="Password" id="password" required>
        <input class="btn btn-primary" type="submit" value="Login">
    </form>
</div>
<?php include 'footer.php';?>