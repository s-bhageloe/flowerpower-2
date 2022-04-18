<?php
include '../database.php';
$msg = '';
if(isset($_POST['submit'])){

    $fieldnames = ['gebruikersnaam', 'wachtwoord'];
    $error = false;

    foreach($fieldnames as $fieldname){
        if(!isset($_POST[$fieldname]) || empty($_POST[$fieldname])){
            $error = true; 
            $msg = 'error';
        }

    }

    if(!$error){
        $obj = new DB('localhost', 'root', '', 'flowerpower', 'utf8mb4');
        $obj->loginAccount($_POST['gebruikersnaam'], $_POST['wachtwoord']);
        
    }else{
        
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Inloggen</title>
</head>
<body>
	<div class="box">
		<h2>Inloggen</h2>
		<div class="box-content">
    		<form method="post">
    			<p> Username </p>
       		<input type="text" name="gebruikersnaam" placeholder="Username" /><br>
        		<p> Password </p>
        	<input type="password" name="wachtwoord" placeholder="Password" /><br><br>
        	<button type="submit" name="submit" class="btn">Login</button><br>
    		</form>
		</div>
	</div>
</body>
</html>