<?php
include "../config.php";
$conn=openConnection();
$id=$_GET['id'];
$stmt=$conn->prepare("DELETE FROM POST WHERE postID='$id'");
if($stmt->execute()){
    echo "<script>alert('Record Deleted');
    window.location.href='../admin_panel.php';</script>";

}
else{
    echo "alert('Record Cannot be Deleted')";
}
closeConnection($conn);
?>