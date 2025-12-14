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

if($_POST){
    $stmt=$pdo->prepare(
        "INSERT INTO borrowings(book_id,student_name,borrow_date)
         VALUES(:b,:s,CURDATE())"
    );
    $stmt->execute([
        ":b"=>$_POST["book_id"],
        ":s"=>$_POST["student"]
    ]);
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Borrow Book</title>
<style>
body{
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    background:#ECF0F1;
}
.form-card{
    width:360px;
    background:white;
    padding:25px;
    border-radius:10px;
}
select,input,button{
    width:100%;
    padding:10px;
    margin:8px 0;
}
button{
    background:#1ABC9C;
    color:white;
    border:none;
}
</style>
</head>
<body>

<div class="form-card">
<h3>Borrow Book</h3>
<form method="post">
<select name="book_id">
<?php foreach($books as $b): ?>
<option value="<?= $b["id"] ?>"><?= $b["title"] ?></option>
<?php endforeach; ?>
</select>
<input name="student" placeholder="Student Name">
<button>Borrow</button>
</form>
<a href="dashboard.php">Back</a>
</div>

</body>
</html>
