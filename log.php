<?php
    session_start();
    if(isset($_SESSION["user1"])){
        header("Location:index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta viewport content="width=device-width,initial-scale=1.0">
        <title>Login Page</title>
        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="css/form.css">
    </head>
    <body>
    <div class="form">
        <?php
            if(isset($_POST["login"])){
                $Useremail=$_POST["Useremail"];
                $Password=$_POST["Password"];
                require_once "dbconn.php";
                $sql2="SELECT * FROM reg WHERE Useremail='$Useremail'";
                $result1=mysqli_query($conn,$sql2);
                $user=mysqli_fetch_array($result1,MYSQLI_ASSOC);
                
                
                if($user)
                {        
                    $hash=password_hash($user["Password"],PASSWORD_DEFAULT);            
                    if(password_verify($Password,$hash)){
                        session_start();
                        $_SESSION["user1"]="yes";
                        $name=$user["fullname"];
                        $_SESSION["name"]=$name;
                        header("location: index.php");
                        die();
                        }else{
                      echo"<div class='alert alert-danger'>Password incorrect!</div>";
                    }
                }else{
                  echo"<div class='alert alert-danger'>Email does not exist!</div>";
                }
            }
        
        ?>
        
        <form action="log.php" method="POST">
            <h1 class="heading">Login</h1>
            <input type="email" placeholder="email" autocomplete="off" class="email" name="Useremail" />
            <input type="password" placeholder="password" autocomplete="off" class="password" name="Password"/>
            <button class="submit-btn" name="login">Log in</button>
            <a href="reg.php" class="link">Don't have an account? Register one</a>
        </form>
        </div>
       <script src="js/form.js"></script>
    </body>
</html>