<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Document</title>
</head>
<div id="Account_2" style="display: none;" id="Register">
        <form action="" method="post" style="top: 70px;">
        <div>
            <img style="position: relative;right: 50px;top: 30px;" src="edit.png">
            <p style="text-align:left">Avatar: <img style="position: relative;clip-path:ellipse(50% 50%);" src="user_for_account.png"> </p>
            <input style="display: none; height: 20px;width: 120px;padding-top: 0px;padding-bottom: 0px;padding-right: 0px;padding-left: 0px;margin-bottom: 0px;position: relative;right: 120px;" type="file" id="avatar" name="avatar" accept="image/png, image/jpeg">
        </div>
        <div>
        <img style="position: relative;right: 40px;top: 20px;" src="edit.png">
            <p style="text-align:left;"> Email: exemple@ex.fr</p>
            <input style="display: none;" type="email" name="mail" placeholder="..." required>
            <input style="display: none;" type="email" name="mail" placeholder="..." required>
        </div>
        <div>
        <img src="edit.png" style="position: relative;top: 20px;">
            <p style="text-align:left;"> Nom d'Utilisateur: </p> 
            <input style="display: none;" type="text" name="username" placeholder="..." required>
        </div>
        <div>
        <img src="edit.png" style="position: relative;top: 20px;" >
            <p style="text-align:left;"> Mot de passe: exemplemdp</p>
            <input style="display: none;" type="password" name="mdp" placeholder="..." pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Votre mot de passe doit faire au moins 8 caractéres, et doit contenir au moin une lettre majuscule et minuscule" required>
            <input style="display: none;" type="password" name="mdp" placeholder="..." pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Votre mot de passe doit faire au moins 8 caractéres, et doit contenir au moin une lettre majuscule et minuscule" required>
        </div>
            <pre></pre>
            <button style="margin-top: 20px; display:none;" class="up" type="submit">Confirmer</button>
        </div>

    </form>
</body>
</html>