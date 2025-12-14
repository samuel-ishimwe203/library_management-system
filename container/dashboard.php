
<?php
session_start();

/* BLOCK BACK BUTTON */
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: 0");

/* SESSION CHECK */
if (!isset($_SESSION["user"])) {
    header("Location: index.php");
    exit;
}

?>
<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>
<style>
body{
    margin:0;
    background:#ECF0F1;
    font-family:Segoe UI, Arial;
}
.header{
    background:#2C3E50;
    color:white;
    padding:20px;
    text-align:center;
}
.container{
    max-width:900px;
    margin:40px auto;
}
.cards{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(200px,1fr));
    gap:20px;
}
.card{
    background:white;
    padding:25px;
    border-radius:10px;
    text-align:center;
    box-shadow:0 4px 10px rgba(0,0,0,0.1);
}
.card a{
    text-decoration:none;
    color:#2C3E50;
    font-size:18px;
    font-weight:bold;
}
.logout{
    margin-top:30px;
    text-align:center;
}
.logout a{
    background:#E74C3C;
    color:white;
    padding:10px 20px;
    border-radius:6px;
    text-decoration:none;
}
</style>
</head>
<body>

<div class="header">
    <h2>Library Management System</h2>
    <p>Welcome, <strong><?= $_SESSION["user"] ?></strong></p>
</div>

<div class="container">
    <div class="cards">
        <div class="card"><a href="add_book.php">➕ Add Book</a></div>
        <div class="card"><a href="view_books.php">📚 View Books</a></div>
        <div class="card"><a href="borrow_book.php">📖 Borrow Book</a></div>
    </div>

    <div class="logout">
        <a href="logout.php">Logout</a>
    </div>
</div>

</body>
</html>
