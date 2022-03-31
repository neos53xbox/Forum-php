<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div id="Register">
        <img src="logo.png" alt=""></img>
        <form action="verification.php" method="post">
            <p> Nom d'Utilisateur </p> 
            <input type="text" name="username" placeholder="..." required>
            <p> Mot de passe </p>
            <input type="password" name="password" placeholder="..." required>
            <pre></pre>
            <button class="up" type="submit">Login</button>
            <p>Not registered? <a href="Register.php" class="register_message">Create an account</a></p>
        </div>

    </form>
</body>
</html>
