<?php
function updateForm($data){
    echo "<table><h1>Edit/ Update</h1>";
    echo "<form action='update.php?update=true' method='post'>";
    echo "<tr><th>";
    $value=$data['postTitle'];
    echo "Post Title</th><td><input type='text' name='title' value='$value'></td></tr>";
    echo "<tr><th>";
    $value=$data['postAuthor'];
    echo "Post Author</th><td><input type='text' name='author' value='$value'></td></tr>";
    echo "<tr><th>";
    $value=$data['postDescription'];
    echo "Post Description</th><td><textarea name='description' cols='50' rows='4' >$value</textarea></td></tr>";
    echo "<tr><th>";
    $value=$data['postContent'];
    echo "Post Title</th><td><textarea name='content' cols='80' rows='20'>$value</textarea></td></tr>";
    echo "<tr><th>";
    $value=$data['postImage'];
    echo "Post Image</th><td><input type='text' name='image' value='$value'></td></tr>";
    echo "<tr><td>";
    echo "<input type='submit' value='Update'></td></tr>";
    echo "</form>
    <script src='ckeditor/ckeditor.js'></script>
    <script>
        CKEDITOR.replace('content');
        CKEDITOR.replace('description');
    </script>
    </table>";
}
function option($value){
    return "<option value='".$value."'>".$value."</option>";
}
function postCard($data){
    $dat=$data['postID'];
    echo "<div class='card'>";
    echo "<h2>".$data['postTitle']."</h2>";
    echo "<h5>by ".$data['postAuthor']."</h5>";
    echo "<h3>".$data['postDescription']."</h3>";
    echo "<img src='../img/".$data['postImage']."'></img>";
    echo "<a href='../post/postView.php?id=$dat'>[Read More]</a>";
    echo "<h4>Updated On : ".$data['postUpdatedOn'];
    echo "</h4></div>";
}
function postView($data){
    $_SESSION["id"]=$data['postID'];
    echo "<div class='main-post-view'>";
    echo "<img src='../img/".$data['postImage']."'></img>";
    echo "<h1>".$data['postTitle']."</h1>";
    echo "<h3>by ".$data['postAuthor']."</h4>";
    echo "<h3>Updated On ".$data['postUpdatedOn']."</h4>";
    echo "<p>".$data['postContent']."</p>";
    echo "</div>";
}
function getSearchImage($value){
    echo "<td><img class='admin-image' src='../img/$value'/></td>";
}
function getSearchData($searchData){
    echo "<tr><td>".$searchData['postID']."</td>";
    echo "<td>".$searchData['postTitle']."</td>";
    echo "<td>".$searchData['postAuthor']."</td>";
    echo "<td>".$searchData['postCreatedOn']."</td>";
    echo "<td>".$searchData['postUpdatedOn']."</td>";
    getSearchImage($searchData['postImage']);
}
function returnQuery($a,$b,$c,$d){
    if($a!=""){
        if($b!="author"){
            if($c!=""){
                if($d!=""){
                    return "SELECT * FROM POST WHERE postTitle='$a' and postAuthor='$b' and postCreatedOn='$c' and postUpdatedOn='$d'";
                }
                else{
                    return "SELECT * FROM POST WHERE postTitle='$a' and postAuthor='$b' and postCreatedOn='$c'";
                }
            }
            else{
                if($d!=""){
                    return "SELECT * FROM POST WHERE postTitle='$a' and postAuthor='$b' and postUpdatedOn='$d'";
                }
                else{
                    return "SELECT * FROM POST WHERE postTitle='$a' and postAuthor='$b'";
                }
            }
        }
        else{
            if($c!=""){
                if($d!=""){
                    return "SELECT * FROM POST WHERE postTitle='$a' and postCreatedOn='$c' and postUpdatedOn='$d'";
                }
                else{
                    return "SELECT * FROM POST WHERE postTitle='$a'and postCreatedOn='$c'";
                }
            }
            else{
                if($d!=""){
                    return "SELECT * FROM POST WHERE postTitle='$a' and postUpdatedOn='$d'";
                }
                else{
                    return "SELECT * FROM POST WHERE postTitle='$a'";
                }
            }
        }
    }
    else{
        if($b!="author"){
            if($c!=""){
                if($d!=""){
                    return "SELECT * FROM POST WHERE postAuthor='$b' and postCreatedOn='$c' and postUpdatedOn='$d'";
                }
                else{
                    return "SELECT * FROM POST WHERE postAuthor='$b' and postCreatedOn='$c'";
                }
            }
            else{
                if($d!=""){
                    return "SELECT * FROM POST WHERE postAuthor='$b' and postUpdatedOn='$d'";
                }
                else{
                    return "SELECT * FROM POST WHERE postAuthor='$b'";
                }
            }
        }
        else{
            if($c!=""){
                if($d!=""){
                    return "SELECT * FROM POST WHERE postCreatedOn='$c' and postUpdatedOn='$d'";
                }
                else{
                    return "SELECT * FROM POST WHERE postCreatedOn='$c'";
                }
            }
            else{
                if($d!=""){
                    return "SELECT * FROM POST WHERE postUpdatedOn='$d'";
                }
                else{
                    return "SELECT * FROM POST";
                }
            }
        }
    }
}
?>