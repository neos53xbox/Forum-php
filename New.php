<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body style="background: linear-gradient(to left, #3ba592e1, #3ba592e1);">
<?php
    session_start();
echo
'<nav>
    <ul>
        <a href="Home.php?userID='.$_SESSION['userID'].'"><img src="logo.png" style="z-index: 1200; position: relative; cursor:pointer;"></img></a> 
        <li class="deroulant">
        <ul class="sous" style="padding-left: 80px;">
            <li><a id="sous_menu" href="Account.php?userID='.$_SESSION['userID'].'">Account</a></li>
            <li><a id="sous_menu" href="New.php?userID='.$_SESSION['userID'].'">Topic</a></li>
            <li><a href="Login.php"><img src="off.png" id="off"></img></a></li>
        </ul>
    </li>
</nav>';
?>
<?php
$db_username = 'root';
    $db_password = '';
    $db_name     = 'php_exam_db';
    $db_host     = 'localhost';
    $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
    or die('could not connect to database');
    if (isset($_REQUEST['topic_name'])) {
        $userID = $_SESSION['userID'];
        $topicName = stripslashes($_REQUEST['topic_name']);
        $topicName = mysqli_real_escape_string($db, htmlspecialchars($topicName));
        $topicDescript    = stripslashes($_REQUEST['topic_description']);
        $topicDescript    = mysqli_real_escape_string($db, htmlspecialchars($topicDescript));
        // $date = date('d-m-y h:i:s');
        $query    = "INSERT into `articles` (Titre, Description, Autor_ID)
                     VALUES ('$topicName', '$topicDescript', '$userID' )";
        $result = mysqli_query($db, $query);
        if($result){
            echo "<div class='form'>
            <h3 style='color: #ffffff'>Your Topic are registered successfully.</h3><br/>
            <p>Click here to <a class='link' href='Home.php'>Show !</a></p>
            </div>";
        }
    }
?>  
    <div id="topic_register">

        <img src="speech-bubble.png" id="new" alt="">
        <div id="new_texte">
            <center><b>New</b></center>
        </div>
        <div id="create_topic">
            <form action="" method="post">
            <p> Nom du Topic </p> 
            <input type="text" name="topic_name" placeholder="..." required>
            <p> Article </p>
            <textarea name="topic_description" placeholder="..." required></textarea>
            <pre></pre>
            <button class="up" type="submit" style="padding-bottom: 15px; margin-top:20px;">Publier</button>
        </form>
    </div>
</div>
</body>
</html>