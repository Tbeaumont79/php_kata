<?php 
    require("db_configure.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $password = $_POST["password"];
 
        try {
            if(isset($_POST['name']) && isset($_POST['password'])) {
                $username = trim($_POST['name']);
                $password = trim($_POST['password']);
                $password = password_hash($password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':username', $username);
                $stmt->bindParam(':password', $password);
                $stmt->execute();
                session_start();
                $_SESSION['user_id'] = $pdo->lastInsertId();
                header("Location: index.php");
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
?>
<!DOCTYPE html>
<html lang="en">   <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Php kata</title>
    </head>
    <body>
        <h1>Php kata signup page</h1>
        <form action="signup.php" method="post">
            <input type="text" name="name" placeholder="name">
            <input type="password" name="password" placeholder="password">
            <input type="submit" value="Submit">
        </form>
    </body>
</html>