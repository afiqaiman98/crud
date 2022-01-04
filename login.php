<?php
    include_once 'header.php';
    include "process.php";
?>

<section class = "container">
    <h2>Log in</h2>
    <div class="form-group">
    <form action = "login1.php" method="post" >
        <input type = "text" name="suid" placeholder = "Username" >
        <input type = "password" name="spwd" placeholder = "Repeat Password..." >
        <button type="submit" name="action" value="Login">Log IN</button>
    </form>
    </div>
</section>