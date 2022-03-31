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
        $topicID = $_SESSION['TopicID'];
        $userID = $_SESSION['userID'];
        $topicName = stripslashes($_REQUEST['topic_name']);
        $topicName = mysqli_real_escape_string($db, htmlspecialchars($topicName));
        $topicDescript    = stripslashes($_REQUEST['topic_description']);
        $topicDescript    = mysqli_real_escape_string($db, htmlspecialchars($topicDescript));
        $query    = "UPDATE `articles` SET Titre = '$topicName', Description = '$topicDescript' WHERE ID = '$topicID'";
        $result = mysqli_query($db, $query);
        if($result){
            echo "<div class='form'>
            <h3 style='color: #ffffff'>Your Topic are registered successfully.</h3><br/>
            <p>Click here to <a class='link' href='Details.php?topicID=".$topicID."'".">Show !</a></p>
            </div>";
        }
    }
?> 

<?php
 $db_username = 'root';
 $db_password = '';
 $db_name     = 'php_exam_db';
 $db_host     = 'localhost';
 $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
 or die('could not connect to database');
 $topicId = $_SESSION['topicID'];
   $requete = "SELECT * FROM articles WHERE ID ='$topicId'  ";
   $exec_requete = mysqli_query($db,$requete);
   $row = mysqli_num_rows($exec_requete);
if($row==1){
   while($row = mysqli_fetch_row($exec_requete)){
    $userID = $row[4];   
    $userRequete = "SELECT Username FROM users WHERE ID = '$userID'  ";
    $exec_requete_user = mysqli_query($db,$userRequete);
        while($row_user = mysqli_fetch_row($exec_requete_user)){
            $username = $row_user[0];
        }
    echo '<div id="topic">
    <img src="speech-bubble.png" id="new2" alt="">
    <div id="new_texte2">
        <center><b>#'.$row[0].'</b></center>
    </div>
    <div id="topic_p">
    <img id="pdp" src="user.png"></img>
    <a style="margin-left:10px">by</a><a href="Account.php?userID='.$row[4].'"> ' .$username.'</a>
    <a style=" position:relative;left:300px; top:50px;">'.$row[3].'</a>
    <h1>'.$row[1].'</h1>
    <br></br>
    <form action="" method="post">
    <input type="text" name="topic_name" value="New Topic Name" > 
    <br></br>
    <textarea name="topic_description">'.$row[2].'</textarea>
        <button class="up" type="submit">Edit</button>  
    </form>
    </div>
</div>';
  }
}  
?>
  
</body>
</html>