<html>
<link rel="stylesheet" href="css/style.css">
<title>
    Sign Up 
</title>
<body>
<header>
    <button class="search-btn" onclick="location.href='index.php'" type="button">Return</button></br></br>
    </header>
<?php
include "config.php";
function insertRecord(){
    $conn=openConnection();

    $userName = $_POST['username'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $email = $_POST['email'];
    $sql =$conn->prepare("SELECT NVL(MAX(userID),0)+1 FROM blog_user");
    $sql->execute();
    $userID=$sql->fetchColumn();
    if($password==$cpassword){
        $password=password_hash($password,PASSWORD_DEFAULT);
        $sql = "INSERT INTO blog_user (userID,userName, userPassword, userEmail)
        VALUES ('$userID','$userName', '$password', '$email')";

        $stmt=$conn->prepare($sql);
        if($stmt->execute()){
            echo "<script>
            alert('User Added');
            window.location.href='index.php';
            </script>";
        }
        else{
            echo "<script>
            alert('Username exists! Try Again');
            </script>";
        }
        
        
    }else{
        echo '<script>alert("Passwords does not match")</script>';
    }
    
closeConnection($conn);
}

if(isset($_GET['insert_into'])){
   insertRecord();
}
?>
<div>
    <table>
    <h1>
        Sign Up
    </h1>
    <form name="signup" action="signup.php?insert_into=true" method="post">
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
                    Email
                </label>
                <input type="text" name="email">
            </td>
        </tr>
        <tr>
            <td>
                <label>
                    Password 
                </label>
                <input type="password" name="password">
            </td>
            
        </tr>
        <tr>
            <td>
                <label>
                    Confirm Password
                </label>
                <input type="password" name="cpassword">
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
</body>
</html>