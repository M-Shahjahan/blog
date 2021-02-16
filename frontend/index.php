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
</body>
</html>