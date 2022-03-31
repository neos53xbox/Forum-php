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

    $db_username = 'root';
    $db_password = '';
    $db_name     = 'php_exam_db';
    $db_host     = 'localhost';
    $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
    or die('could not connect to database');
      $requete = "SELECT * FROM articles ORDER BY Publication_Date DESC ";
      $exec_requete = mysqli_query($db,$requete);
      echo '<table>
      <tr class="table_tittle">
          <th style="text-align:left;padding-left:4px;">
              ID
          </th>
          <th>
              Auteur
          </th>
          <th>
              Titre du sujet
          </th>
          <th>
              Date de publication
          </th>
      </tr>';
          while($row = mysqli_fetch_row($exec_requete)){
            $username = '';
            $userRequete = "SELECT Username FROM users WHERE ID = '$row[4]'  ";
            $exec_requete_user = mysqli_query($db,$userRequete);
                while($row_user = mysqli_fetch_row($exec_requete_user)){
                    $username = $row_user[0];
                }
                echo '<tr><td >#<a href="Details.php?topicID='.$row[0].'">'.$row[0].'</a></td><td style="text-align: center;"><a href="Account.php?userID='.$row[4].'">'.$username.'#'.$row[4].'</a></td><td style="text-align: center;"><a href="Details.php?topicID='.$row[0].'">'.$row[2].'</td><td style="text-align: center;">'.$row[3].'</td></tr>';
              } 
      echo '</table>';
    ?>
</body>
</html>
 