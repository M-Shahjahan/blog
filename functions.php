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
    echo "Post Author</th><td><textarea name='content' cols='80' rows='20'>$value</textarea></td></tr>";
    echo "<tr><th>";
    $value=$data['postImage'];
    echo "Post Image</th><td><input type='text' name='image' value='$value'></td></tr>";
    echo "<tr><td>";
    echo "<input type='submit' value='Update'></td></tr>";
    echo "</form></table>";
}
function option($value){
    return "<option value='".$value."'>".$value."</option>";
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