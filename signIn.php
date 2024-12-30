<?php
    require("db_configure.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $password = $_POST["password"];
 
        try {
            if(isset($_POST['name']) && isset($_POST['password'])) {
                $username = trim($_POST['name']);
                $password = trim($_POST['password']);
                $sql = "SELECT * FROM users WHERE username = :username";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':username', $username);
                $stmt->execute();
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                echo $user['password'];
                echo $user['username'];
                if (password_verify($password, $user['password'])) {
                    echo "password is valid ";                    
                }
                if($user['password'] && password_verify($password, $user['password'])) {
                    session_start();
                    $_SESSION['user_id'] = $user['id'];
                    header("Location: index.php");
                }
                else {
                    echo "Wrong username or password";
                }
            }
        }
        catch(PDOException $error) {
            echo "Connection failed: " . $error->getMessage();
        }
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
        <form action="signIn.php" method="post">
            <input type="text" name="name" placeholder="name">
            <input type="password" name="password" placeholder="password">
            <input type="submit" value="Submit">
        </form>
    </body>
</html>