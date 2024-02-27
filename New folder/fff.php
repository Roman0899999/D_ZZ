<?php
    $login = "user";
    $password = "123";

    if(isset($_POST['submit'])) {
        $userLogin = $_POST['login'];
        $userPassword = $_POST['password'];

        if($userLogin == $login && $userPassword == $password) {
    
            header("Location: main_page.php");
            exit();
        } else {
            $error = "Неверный логин или пароль. Попробуйте еще раз или зарегистрируйтесь.";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
</head>
<body>
    <h1>Login Form</h1>
    <?php if(isset($error)) { ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php } ?>
    <form method="POST" action="">
        <label for="login">Login:</label><br>
        <input type="text" id="login" name="login"><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br>
        <button type="submit" name="submit">Login</button>
    </form>
    <br>
    <a href="registration.php">Register</a>
</body>
</html>