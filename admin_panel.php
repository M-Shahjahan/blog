<?php
session_start();
if($_SESSION["authenticated"]==false){
    echo "<script>alert('You are not Logged in.');
    window.location.href='index.php';
    </script>";
}
include "config.php";
include "functions.php";
?>
<html>
<link rel="stylesheet" href="css/style.css">
<head>
<title>
Admin Panel
</title>
</head>
<body>
    <br>
    <button class="search-btn" onclick="location.href='index.php'" type="button">Log Out</button>
    <button class="search-btn" onclick="location.href='post/addPost.php'" type="button">Add New</button>
 
    <div>
        <table>
        <h1>
            Search Section
        </h1>
        <form action="admin_panel.php?search=true" method="post">
            <tr>
                <th>
                    Search by Title
                </th>
                <td>
                    <input list="titles" name="title">
                    <datalist id="titles">
                    <?php
                    $conn=openConnection();
                    $stmt=$conn->prepare('SELECT postTitle FROM Post');
                    if($stmt->execute()){
                        $result=$stmt->setFetchMode(PDO::FETCH_ASSOC);
                        foreach ($stmt->fetchAll() as $key => $value) {
                            echo option($value['postTitle']);
                        }
                    }
                    closeConnection($conn);
                    ?>
                    </datalist>
                </td>
            </tr>
            <tr>
                <th>
                    Search by Author
                </th>
                <td>
                <select name="author">
                    <option value="author">Author</option>
                    <?php
                    $conn=openConnection();
                    $stmt=$conn->prepare('SELECT DISTINCT postAuthor FROM Post');
                    if($stmt->execute()){
                        $result=$stmt->setFetchMode(PDO::FETCH_ASSOC);
                        foreach ($stmt->fetchAll() as $key => $value) {
                            echo option($value['postAuthor']);
                        }
                    }
                    closeConnection($conn);
                    ?>
                </select>
                </td>
            </tr>
            <tr>
                <th>
                    Search by Created Date
                </th>
                <td>
                    <input type="date" name="createdDate">
                </td>
            </tr>
            <tr>
                <th>
                    Search by Update Date
                </th>
                <td>
                <input type="date" name="updatedDate">
                </td>
            </tr>
            <tr> 
                <td>
                    <input class="search-btn" type="Submit" value="Search">  
                </td>
            </tr>

        </form>
        </table>
    </div>
    <?php
    function search(){
        $conn=openConnection();
        $sql = returnQuery($_POST['title'],$_POST['author'],$_POST['createdDate'],$_POST['updatedDate']);
        $stmt=$conn->prepare($sql);
        if($stmt->execute()){
            echo "<div><table><h1>Search Result</h1>";
            echo "<tr>
            <th>Post ID</th>
            <th>Post Title</th>
            <th>Post Author</th>
            <th>Post Created On</th>
            <th>Post Updated On</th>
            <th>Post Image</th>
            <th colspan='2'>Operations</th>
            </tr>";
            $result=$stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach ($stmt->fetchAll() as $key => $value) {
                getData($value);
            }
            echo "</table></div>";        

        }
        closeConnection($conn);
    }
    if(isset($_GET['search'])){
        search();
    }
    ?>

            
        <?php
        
        if(!isset($_GET['search'])){  
            echo "<div><table><h1>Posts</h1>";
            echo "<tr>
            <th>Post ID</th>
            <th>Post Title</th>
            <th>Post Author</th>
            <th>Post Created On</th>
            <th>Post Updated On</th>
            <th>Post Image</th>
            <th colspan='2'>Operations</th>
            </tr>";        
            $conn=openConnection();
            $sql="SELECT * FROM POST";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result=$stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach ($stmt->fetchAll() as $key => $value) {
                getData($value);
            }
            closeConnection($conn);
        }
        ?>
            
       </table>
    </div>
</body>
</html>