<?php
session_start();

/* NO BACK AFTER LOGOUT */
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: 0");

if(!isset($_SESSION["user"])){
    header("Location: index.php");
    exit;
}

require "config.php";
$msg="";

if($_POST){
    $stmt=$pdo->prepare(
        "INSERT INTO books(title,author,isbn,quantity)
         VALUES(:t,:a,:i,:q)"
    );
    $stmt->execute([
        ":t"=>$_POST["title"],
        ":a"=>$_POST["author"],
        ":i"=>$_POST["isbn"],
        ":q"=>$_POST["quantity"]
    ]);
    $msg="Book added successfully";
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Add Book</title>
<style>
body{
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    background:#ECF0F1;
    font-family:Arial;
}
.form-card{
    width:360px;
    background:white;
    padding:25px;
    border-radius:10px;
}
input,button{
    width:100%;
    padding:10px;
    margin:8px 0;
}
button{
    background:#1ABC9C;
    color:white;
    border:none;
}
.success{text-align:center;color:green;}
</style>
</head>
<body>

<div class="form-card">
<h3>Add Book</h3>
<p class="success"><?= $msg ?></p>
<form method="post">
<input name="title" placeholder="Title">
<input name="author" placeholder="Author">
<input name="isbn" placeholder="ISBN">
<input type="number" name="quantity" placeholder="Quantity">
<button>Add Book</button>
</form>
<a href="dashboard.php">Back</a>
</div>

</body>
</html>
