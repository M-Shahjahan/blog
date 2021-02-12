<?php
    

function openConnection(){
    $servername = "localhost";
    $username = "scott";
    $password = "tiger";
    $dbname = "blog";
    $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
}

function closeConnection($conn){
    $conn=null;
}
function getImage($value){
    echo "<td><img class='admin-image' src='img/$value'/></td>";
} 
function getData($data){
    echo "<tr><td>".$data['postID']."</td>";
    echo "<td>".$data['postTitle']."</td>";
    echo "<td>".$data['postAuthor']."</td>";
    echo "<td>".$data['postCreatedOn']."</td>";
    echo "<td>".$data['postUpdatedOn']."</td>";
    //echo "<td>".$data['postDescription']."</td>";
    //echo "<td>".$data['postContent']."</td>";
    getImage($data['postImage']);
    EditAndDelete($data['postID']);
}
function EditAndDelete($value){
    
    echo "<td><a href='update.php?id=$value'>Edit/Update</td>";
    echo "<td><a href='post/deletePost.php?id=$value' onclick='".'confirm("Delete this record?")'."'>Delete</td></tr>";
}
?>