
<?php
session_start();
if(!isset($_SESSION["user"])){ header("Location: index.php"); exit; }
require "config.php";
if(isset($_GET["id"])){
    $stmt=$pdo->prepare("DELETE FROM books WHERE id=:id");
    $stmt->execute([":id"=>$_GET["id"]]);
}
header("Location: view_books.php");
exit;
?>
