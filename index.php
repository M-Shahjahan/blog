<?php
    session_start();
    include "config.php";
    $_SESSION["authenticated"]=false;
?>
<html>
    <head>
        <link rel="stylesheet" href="css/style.css">
        <title>
            Welcome
        </title>
    </head>
    <header>
        <button class="search-btn" onclick="location.href='frontend'" type="button">Return </button>
    </header
    <?php
        function login(){
            $conn=openConnection();
            $username=$_POST["username"];
            $userpassword=$_POST["password"];
            $sql = "SELECT userPassword FROM blog_user WHERE userName='$username'";
            $stmt=$conn->prepare($sql);
            if($stmt->execute()){
                if(password_verify($userpassword,$stmt->fetchColumn())){
                    $_SESSION["authenticated"]=true;
                    $_SESSION["author"]=$username;
                    $url='admin_panel.php';
                    header('Location: '.$url);
                }
                else{
                    echo "<script>alert('Entered wrong Password')</script>";
                }
            }
            else{
                echo "<script>alert('Entered wrong Username')</script>";
            }
            
        }
        if(isset($_GET['login_into'])){
            login();
        }
        
    ?>

    <body>
    <div>
    <table>
    <h1>
        Log In
    </h1>
    <form name="login" action="index.php?login_into=true" method="post">
        <tr>
            <td>
                <label>
                    User Name 
                </label>
                <input type="text" name="username">
            </td>
            
        </tr>
        <tr>
            <td>
                <label>
                    User Password
                </label>
                <input type="password" name="password">
            </td>
        </tr>
        <tr>
            <td>
                <input class="search-btn" type="Submit" value="Submit">
            </td>
        </tr>
    </form>
    </table>
    </div>
    <div>
    <br><br>
    <a href="signup.php">Don't have an account? Sign Up</a>
    </div>
    </body>
</html>