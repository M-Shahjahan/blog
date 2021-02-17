<html>
    <link rel="stylesheet" href="../css/frontend_styl.css">
    <head>
        <title>
            Post Detail
        </title>
    </head>
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
$conn=openConnection();
$value=$_GET['id'];
$sql="SELECT * FROM POST WHERE postID='$value'";
$stmt=$conn->prepare($sql);
if($stmt->execute()){
    foreach ($stmt->fetchAll() as $key => $value) {
        postView($value);
    }
}
closeConnection($conn);
?>
