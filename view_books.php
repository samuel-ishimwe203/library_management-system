<?php
session_start();

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: 0");

if(!isset($_SESSION["user"])){
    header("Location: index.php");
    exit;
}

require "config.php";
$books=$pdo->query("SELECT * FROM books")->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
<title>View Books</title>
<style>
body{background:#ECF0F1;font-family:Arial;}
table{
    width:80%;
    margin:40px auto;
    border-collapse:collapse;
    background:white;
}
th{
    background:#2C3E50;
    color:white;
}
th,td{
    padding:10px;
    text-align:center;
}
a{color:red;}
</style>
</head>
<body>

<h3 style="text-align:center;">Books List</h3>
<table>
<tr><th>Title</th><th>Author</th><th>Action</th></tr>
<?php foreach($books as $b): ?>
<tr>
<td><?= $b["title"] ?></td>
<td><?= $b["author"] ?></td>
<td><a href="delete_book.php?id=<?= $b["id"] ?>">Delete</a></td>
</tr>
<?php endforeach; ?>
</table>

<p style="text-align:center;"><a href="dashboard.php">Back</a></p>

</body>
</html>
