<?php
session_start();
if(isset($_POST['username']) && isset($_POST['password']))
{
    // connexion à la base de données
    $db_username = 'root';
    $db_password = '';
    $db_name     = 'php_exam_db';
    $db_host     = 'localhost';
    $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
           or die('could not connect to database');
    
    // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
    // pour éliminer toute attaque de type injection SQL et XSS
    $username = mysqli_real_escape_string($db,htmlspecialchars($_POST['username'])); 
    $password = mysqli_real_escape_string($db,htmlspecialchars($_POST['password']));
    
    if($username !== "" && $password !== "")
    {
      $requete = "SELECT * FROM users where 
      Username = '$username' and mdp = '".md5($password)."' ";
      $exec_requete = mysqli_query($db,$requete);
      $row = mysqli_num_rows($exec_requete);
        if($row==1) // nom d'utilisateur et mot de passe correctes
        {
            while($row = mysqli_fetch_row($exec_requete)){
               $_SESSION['userID'] = $row[0];
            }
           $_SESSION['username'] = $username;
           header('Location: Home.php?username='.$_SESSION['username'].'&userID='.$_SESSION['userID']);
        }
        else
        {
           header('Location: login.php?erreur=1'); // utilisateur ou mot de passe incorrect
           echo $username * $password;
        }
    }
    else
    {
       header('Location: login.php?erreur=2'); // utilisateur ou mot de passe vide
       echo $username * $password;
    }
}
else
{
   header('Location: login.php');
}
mysqli_close($db); // fermer la connexion
?>