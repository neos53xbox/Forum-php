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
<script>

function changePage() {
  var p1 = document.getElementById('Account_1');
  var p2 = document.getElementById('Account_2')
  if (p1.style.display === 'none') {
    p1.style.display = '';
    p2.style.display = 'none';
  } else {
    p1.style.display = 'none';
    p2.style.display = '';
  }
}

function edit_avatar(){
  var avatar = document.getElementById('avatar');
  if (avatar.style.display === 'none') {
    avatar.style.display = '';
  } else {
    avatar.style.display = 'none';
  }
}

function edit_email(){
  var email = document.getElementById('mail');
  if (email.style.display === 'none') {
    email.style.display = '';
  } else {
    email.style.display = 'none';
  }
}

function edit_username(){
  var Username = document.getElementById('username');
  if (Username.style.display === 'none') {
    Username.style.display = '';
  } else {
    Username.style.display = 'none';
  }
}
function edit_password(){
  var password = document.getElementById('mdp');
  if (password.style.display === 'none') {
    password.style.display = '';
  } else {
    password.style.display = 'none';
  }
}
</script>

<?php
$db_username = 'root';
$db_password = '';
$db_name     = 'php_exam_db';
$db_host     = 'localhost';
$db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
or die('could not connect to database');
$userId = $_REQUEST['userID'];
  $requete = "SELECT * FROM articles WHERE Autor_ID ='$userId'  ";
  $exec_requete = mysqli_query($db,$requete);
  $row = mysqli_num_rows($exec_requete);
  if($row!=0){

    $userID = $_SESSION['userID'];   
    $userRequete = "SELECT Username FROM users WHERE ID = '$userID'  ";
    $exec_requete_user = mysqli_query($db,$userRequete);
        while($row_user = mysqli_fetch_row($exec_requete_user)){
            $username = $row_user[0];
        }
        echo '<div id="Account_1" class="account_page">';
         if($userID== $userId){
             echo'<button onclick="changePage()" id="account_modif"><img src="settings.png"></button>';
        };
        echo '<h1>'.$username.'</h1><h4>#'.$userID.'</h4>
        <img style="position: relative;clip-path:ellipse(50% 50%);" src="user_for_account.png">
        <table id="account">
      <tr class="table_tittle">
          <th style="text-align:left;padding-left:4px;">
              ID
          </th>
          <th>
              Titre du sujet
          </th>
          <th>
              Date de publication
          </th>
      </tr>';
    while($topicRow = mysqli_fetch_row($exec_requete)){
        echo '<tr>
                <td>
                    <a href="Details.php?topicID='.$topicRow[0].'">
                        '.$topicRow[0].'
                    </a>
                </td>
                <td style="text-align: center;">
                    <a href="Details.php?topicID='.$topicRow[0].'">
                        '.$topicRow[2].'
                    </a>
                </td>
                <td style="text-align: center;">
                    '.$topicRow[3].'
                </td>';
                if($userID== $userId){
                    $_SESSION['topicID']= $topicRow[0];
                echo '<td style="text-align: center;">
                    <a href="Edit.php?topicID='.$topicRow[0].'"><img src="edit.png"></img></a>
                </td>';};
                echo'</tr>';
    }
    echo '</table></div>';

  }
?>

<div id="Account_2" style="display: none;">
        <form action="Account.php" method="post" style="top: 70px;">
        <div>
            <button style="position: relative;right: 50px;top: 30px;border:transparent" onclick="edit_avatar()"><img src="edit.png"></button>
            <p style="text-align:left">Avatar: <img style="position: relative;clip-path:ellipse(50% 50%);" src="user_for_account.png"> </p>
            <input style="display: none; height: 20px;width: 120px;padding-top: 0px;padding-bottom: 0px;padding-right: 0px;padding-left: 0px;margin-bottom: 0px;position: relative;right: 120px;" type="file" id="avatar" name="avatar" accept="image/png, image/jpeg">
        </div>
        <div>
        <button style="position: relative;right: 50px;top: 30px;border:transparent" onclick="edit_email()"><img src="edit.png"></button>
            <p style="text-align:left;"> Email: exemple@ex.fr</p>
            <input style="display: none;" type="email" name="mail" id="mail" placeholder="...">
            <input style="display: none;" type="email" name="mail" id="mail" placeholder="...">
        </div>
        <div>
        <button style="position: relative;right: 50px;top: 30px;border:transparent" onclick="edit_username()"><img src="edit.png"></button>
            <p style="text-align:left;"> Nom d'Utilisateur: </p> 
            <input style="display: none;" type="text" name="username" id="username" placeholder="..." >
        </div>
        <div>
        <button style="position: relative;right: 50px;top: 30px;border:transparent" onclick="edit_password()"><img src="edit.png"></button>
            <p style="text-align:left;"> Mot de passe: exemplemdp</p>
            <input style="display: none;" type="password" name="mdp" id="mdp" placeholder="..." pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Votre mot de passe doit faire au moins 8 caractéres, et doit contenir au moin une lettre majuscule et minuscule" >
            <input style="display: none;" type="password" name="mdp" id="mdp" placeholder="..." pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Votre mot de passe doit faire au moins 8 caractéres, et doit contenir au moin une lettre majuscule et minuscule" >
        </div>
        <pre></pre>
        <button style="margin-top: 20px;" class="up" type="submit">Confirmer</button>
    </form>
</div>
</body>
</html>