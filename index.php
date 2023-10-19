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
        <title>Home Page</title>
        <link rel="stylesheet" href="css/home.css">
    </head>
    <body>
        <div class="container"><a href="logout.php">
            <button class="logout">Log Out</button></a>
            <h1 class="greeting">Hello <?php
            $name=$_SESSION["name"];
           /* if(isset($_POST["login"]))
            {
                $Useremail=$_POST["Useremail"];
                $sql4="SELECT * FROM reg WHERE Useremail='$Useremail'";
                $result1=mysqli_query($conn,$sql2);
                $user=mysqli_fetch_array($result1,MYSQLI_ASSOC);*/
                echo $name;
                
           // }
            ?></h1>
        </div>
        <script src="js/home.js"></script>
    </body>
</html>