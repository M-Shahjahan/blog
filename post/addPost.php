<?php
session_start();
if($_SESSION["authenticated"]==false){
    echo "<script>alert('You are not Logged in.');
    window.location.href='../index.php';
    </script>";
}

?>
<html>
    <head>

    </head>
    <header>
    <button class="return" onclick="location.href='../admin_panel.php'" type="button">Return</button></br></br>
    </header>
    <body>
        <?php
        include "../config.php";
        function insertRecord(){
            $conn=openConnection();
            $id=0;
            $created=date("Y/m/d");
            $title=$_POST['postTitle'];
            $author=$_SESSION['author'];
            $desc=$_POST['postDescription'];
            $content=$_POST['postContent'];
            $image=$_POST['postImage'];
            $sql =$conn->prepare("SELECT NVL(MAX(postID),0)+1 FROM Post");
            $sql->execute();
            $id=$sql->fetchColumn();
            $stmt = $conn->prepare("INSERT INTO Post (postID,postTitle,postAuthor,postCreatedOn,postUpdatedOn,postDescription,postContent,postImage)
            VALUES (:postID,:postTitle,:postAuthor,:postCreatedOn,:postUpdatedOn,:postDescription,:postContent,:postImage)");
            $stmt->bindParam(':postID',$id);
            $stmt->bindParam(':postTitle',$title);
            $stmt->bindParam(':postAuthor',$author);
            $stmt->bindParam(':postCreatedOn',$created);
            $stmt->bindParam(':postUpdatedOn',$created);
            $stmt->bindParam(':postDescription',$desc);
            $stmt->bindParam(':postContent',$content);
            $stmt->bindParam(':postImage',$image);
            if($stmt->execute()){
                echo "<script>alert('Record Added');</script>";
            }
        }
        if(isset($_GET['insert_into'])){
            insertRecord();
        }
        ?>
        <div>
            <h1>
                Add Post
            </h1>
            <table>
                <form action="addPost.php?insert_into=true" method="post">
                    <tr>
                        <th>
                            Post Title
                        </th>
                        <td>
                        <input type="text" name="postTitle">
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Post Description
                        </th>
                        <td>
                        <textarea name="postDescription" rows="4" cols="50">
                        </textarea>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Post Content
                        </th>
                        <td>
                        <textarea name="postContent" rows="20" cols="80"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Post Image
                        </th>
                        <td>
                        <input type="file" name="postImage">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" value="Add Post">
                        </td>
                    </tr>
                </form>

            </table>
        </div>
    </body>
</html>