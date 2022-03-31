<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Enregistrement</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="icon" type="image/png" sizes="16x16" href="logo.png">
</head>
<body>
<?php
    $db_username = 'root';
    $db_password = '';
    $db_name     = 'php_exam_db';
    $db_host     = 'localhost';
    $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
    or die('could not connect to database');
    if (isset($_REQUEST['username'])) {
        $username = stripslashes($_REQUEST['username']);
        $username = mysqli_real_escape_string($db, htmlspecialchars($username));
        $email    = stripslashes($_REQUEST['mail']);
        $email    = mysqli_real_escape_string($db, htmlspecialchars($email));
        $password = stripslashes($_REQUEST['mdp']);
        $password = mysqli_real_escape_string($db, htmlspecialchars($password));
        $query    = "INSERT into `users` (Username, mdp, Mail)
                     VALUES ('$username', '" . md5($password) . "', '$email')";
        $result   = mysqli_query($db, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3 style='color: #ffffff'>You are registered successfully.</h3><br/>
                  <p>Click here to <a class='link' href='Login.php'>Login</a></p>
                  </div>";
                  mysqli_close($db);          
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p>Click here to <a class='link' href='register.php'>registration</a> again.</p>
                  </div>";
                  mysqli_close($db); 
        }
    } else {
        mysqli_close($db); 
?>
    <div id="Register">
        <form action="" method="post" style="top: 70px;">
            <img src="logo.png" alt=""></img>
            <p> Email </p>
            <input type="email" name="mail" placeholder="..." required>
            <p> Nom d'Utilisateur </p> 
            <input type="text" name="username" placeholder="..." required>
            <p> Mot de passe </p>
            <input type="password" name="mdp" placeholder="..." pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Votre mot de passe doit faire au moins 8 caractéres, et doit contenir au moin une lettre majuscule et minuscule" required>
            <pre></pre>
            <button class="up" type="submit">Register</button>
        </div>

    </form>
    <?php
    }
?>    
</body>
</html>