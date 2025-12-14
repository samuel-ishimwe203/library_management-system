<?php
/* VERY IMPORTANT: NOTHING BEFORE THIS LINE (NO SPACE) */
session_start();

/* REMOVE ALL SESSION VARIABLES */
$_SESSION = [];

/* DESTROY SESSION */
session_destroy();

/* DELETE SESSION COOKIE */
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
    );
}

/* PREVENT CACHE */
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Expires: 0");

/* REDIRECT */
header("Location: index.php");
exit;
