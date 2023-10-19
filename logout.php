<?php
    session_start();

    if(!isset($_SESSION["user1"])){
        header("Location:log.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta viewport content="width=device-width,initial-scale=1.0">
        <title>Logout Page</title>
        <link rel="stylesheet" href="css/home.css">
    </head>
    <body>
        <div class="container"><?php    session_destroy();?>
            <a href="log.php"><button class="logout">Login again</button></a>
            <h1 class="greeting">Thanks,visit again</h1>
        </div>
        <script src="js/home.js"></script>
    </body>
</html>