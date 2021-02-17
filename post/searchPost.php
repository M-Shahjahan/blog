<?php
session_start();
    include "../config.php";
    include "../functions.php";
    $searchValue = $_POST['search'];
    $conn=openConnection();
    $sql = " SELECT postID FROM POST WHERE postTitle LIKE '$searchValue%' ";
    $stmt=$conn->prepare($sql);
    if($stmt->execute()){
        $value=$stmt->fetchColumn();
        echo "<script>
            window.location.href = 'postView.php?id=$value';
</script>";
    }
    closeConnection($conn);
?>
<html>
<link rel="stylesheet" href="../css/style.css">
</html>
