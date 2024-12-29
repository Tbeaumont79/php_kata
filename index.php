<?php
    require("mydbConnect.php");

    if(isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['name'];
        $password = $_POST['password'];

        $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
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
        <form action="index.php" method="post">
            <input type="text" name="name" placeholder="name">
            <input type="password" name="password" placeholder="password">
            <input type="submit" value="Submit">
        </form>
    </body>
</html>