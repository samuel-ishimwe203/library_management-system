<?php
session_start();
require "config.php";
$error="";

if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(empty($_POST["username"]) || empty($_POST["password"])){
        $error="All fields required";
    } else {
        $stmt=$pdo->prepare("SELECT * FROM users WHERE username=:u");
        $stmt->execute([":u"=>$_POST["username"]]);
        $user=$stmt->fetch();
        if($user && password_verify($_POST["password"], $user["password"])){
            $_SESSION["user"]=$user["username"];
            header("Location: dashboard.php");
            exit;
        } else {
            $error="Invalid login";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Login</title>
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
    width:340px;
    background:white;
    padding:25px;
    border-radius:10px;
    box-shadow:0 6px 15px rgba(0,0,0,0.12);
}
h3{text-align:center;color:#2C3E50;}
input,button{
    width:100%;
    padding:10px;
    margin:8px 0;
    border-radius:6px;
}
input{border:1px solid #ccc;}
button{
    background:#1ABC9C;
    border:none;
    color:white;
}
button:hover{background:#16A085;}
.error{text-align:center;color:red;}
a{text-align:center;display:block;margin-top:10px;color:#2C3E50;}
</style>
</head>
<body>

<div class="form-card">
<h3>Login</h3>
<p class="error"><?= $error ?></p>
<form method="post">
<input name="username" placeholder="Username">
<input type="password" name="password" placeholder="Password">
<button>Login</button>
</form>
<a href="index.php">Back to Home</a>
</div>

</body>
</html>
