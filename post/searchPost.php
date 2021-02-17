<html>
<link rel="stylesheet" href="../css/frontend_styl.css">
<body>
<header>
    <button class="search-btn" onclick="location.href='../frontend'" type="button">Return </button>
</header>
</body>
</html>
<?php
session_start();
    include "../config.php";
    include "../functions.php";
    $searchValue = $_POST['search'];
    $conn=openConnection();
    $sql = " SELECT * FROM POST WHERE postTitle LIKE '$searchValue%' ";
    $stmt=$conn->prepare($sql);
    echo "<div class='row'>";
    if($stmt->execute()){
        foreach ($stmt->fetchAll() as $key =>$value){
            postCard($value);
        }

    }
    echo "</div>";
    closeConnection($conn);
?>
