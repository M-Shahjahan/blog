<html>
    <body>
    <header>
    <button class="return" onclick="location.href='admin_panel.php'" type="button">Return</button></br></br>
    </header>
    </body>
</html>
<?php
session_start();
include "config.php";
include "functions.php";
function updateView(){
    $conn=openConnection();
    $postID = $_GET['id'];
    $_SESSION['id']=$postID;
    $stmt =$conn->prepare("SELECT * FROM POST WHERE postID='$postID'");
    if($stmt->execute()){
        foreach ($stmt->fetchAll() as $key => $value) {
            $_SESSION['date']=$value['postCreatedOn'];
            updateForm($value);
        }
    }
    closeConnection($conn);
}
function updateValues(){
    $conn=openConnection();
    $id = $_SESSION['id'];
    $date = $_SESSION['date'];
    $update = date("Y/m/d");
    $title = $_POST['title'];
    $author=$_POST['author'];
    $desc=$_POST['description'];
    $content=$_POST['content'];
    $image=$_POST['image'];
    $stmt =$conn->prepare("UPDATE POST 
    SET postTitle='$title',postAuthor='$author',postCreatedOn='$date',
    postUpdatedOn='$update',postDescription='$desc',postContent='$content',postImage='$image'
    WHERE postID='$id'");
    if($stmt->execute()){
        echo "<script>
            alert('Record Updated');
            window.location.href='admin_panel.php';
        </script>";
        
    }
    else{
        echo "<script>
            alert('Record Not Update!\n Error Occurred');
        </script>";
    }
    closeConnection($conn);
}
if(isset($_GET['update'])){
    updateValues();
}
else{
    updateView();
}
?>
