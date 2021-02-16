<?php
session_start();
include "../config.php";
include "../functions.php";
?>
<html>
<head>
<title>
Welcome ! Main Page 
</title>
<link rel="stylesheet" href="../css/frontend_style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="top-nav-bar">
    <a>Blogger</a>
    <div class="search-container">
        <form action="../post/seachPost.php" method="post">
        <input type="text" list="search-bar" name="search" placeholder="Search">
        <datalist id="search-bar">
        <option value="Search">Search</option>
        </datalist>
        </input>
        <button class="search-btn" onclick="location.href='../index.php'" type="button">Login</button>
        <button type="submit"><i class="fa fa-search"></i></button>
        </form>

    </div>
</div>
<div class="row">
    <?php
    $conn=openConnection();
    $sql = "SELECT * FROM post";
    $stmt = $conn->prepare($sql);
    if($stmt->execute()){
        foreach ($stmt->fetchAll() as $key => $value) {
            postCard($value);
        }
    }
    closeConnection($conn);
    ?>
</div>
</body>
</html>