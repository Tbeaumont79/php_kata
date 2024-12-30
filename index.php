<?php 
    session_start();

    if(!isset($_SESSION['username'])) {
        header("Location: signIn.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Php kata</title>
    </head>
    <body>
        <h1>Php kata</h1>
        <p>This is the HomePage</p>
    </body>
</html>