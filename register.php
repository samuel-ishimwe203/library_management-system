<?php
require "config.php";
$message="";

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $u=trim($_POST["username"]);
    $e=trim($_POST["email"]);
    $p=$_POST["password"];

    if($u==""||$e==""||$p==""){
        $message="All fields required";
    } else {
        try{
            $hash=password_hash($p,PASSWORD_DEFAULT);
            $stmt=$pdo->prepare(
                "INSERT INTO users(username,email,password) VALUES(:u,:e,:p)"
            );
            $stmt->execute([":u"=>$u,":e"=>$e,":p"=>$hash]);
            header("Location: login.php");
            exit;
        } catch(PDOException $e){
            $message="Username or email exists";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Register</title>
<style>
body{
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    background:#ECF0F1;
    font-family:Segoe UI, Arial;
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
    background:#2C3E50;
    color:white;
    border:none;
}
button:hover{background:#1A252F;}
.error{text-align:center;color:red;}
h3{text-align:center;}
</style>
</head>
<body>

<div class="form-card">
<h3>Register</h3>
<p class="error"><?= $message ?></p>
<form method="post">
<input name="username" placeholder="Username">
<input name="email" placeholder="Email">
<input type="password" name="password" placeholder="Password">
<button>Register</button>
</form>
<a href="index.php">Back</a>
</div>

</body>
</html>
