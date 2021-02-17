<?php
session_start();
include "../config.php";
include "../functions.php";
$conn=openConnection();
$sql =$conn->prepare("SELECT COUNT(*) FROM Post");
$sql->execute();
$totalNumberOfPages=$sql->fetchColumn();
$limit = 3;
if(isset($_GET['page'])){
    $offset=($_GET['page']-1)*$limit;
}
else{
    $offset=0;
}
closeConnection($conn);
?>
<html>
<head>
<title>
Welcome ! Main Page 
</title>
<link rel="stylesheet" href="../css/frontend_styl.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="top-nav-bar">
    <a>Blogger</a>
    <div class="search-container">
        <form action="../post/searchPost.php" method="post">
        <input type="text" name="search" placeholder="Search">
        <button class="search-btn" onclick="location.href='../index.php'" type="button">Login</button>
        <button type="submit"><i class="fa fa-search"></i></button>
        </form>

    </div>
</div>
<div class="row">
    <?php
    $conn=openConnection();
    $sql = "SELECT * FROM post LIMIT $limit OFFSET $offset";
    $stmt = $conn->prepare($sql);
    if($stmt->execute()){
        foreach ($stmt->fetchAll() as $key => $value) {
            postCard($value);
        }
    }
    closeConnection($conn);
    echo "</div><br><br><div class='pagination'>";
    for($i=1;$i<=ceil($totalNumberOfPages/$limit);$i++){
        echo "<a href='index.php?page=$i'>$i</a>&nbsp";
    }
    echo "</div><br><br>";
    ?>

</body>
</html>