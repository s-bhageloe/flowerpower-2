<?php
include_once 'database.php'; 



    /* Checking if the form is succesfully submitted */
    if (isset($_POST['submit'])){
        /* Putting the fieldnames from the form in the array*/
        $fieldnames = ['voorletters', 'tussenvoegsels', 'achternaam', 'adres', 'postcode', 'woonplaats', 'geboortedatum', 'gebruikersnaam', 'wachtwoord'];

        $error = false;
        /* Looping the fieldnames in the $_POST[] */
        foreach ($fieldnames as $data) {
            if(!isset($_POST[$data]) || empty($_POST[$data])){
                $error = false;
            }    
        }
        /* If a fieldname is empty error message will be shown */
        if ($error) {  
            echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.'All fields are required' .'</div>'; 
        }
        
        /*If there is not a error, data will be inserted in the database */
        else {
            $obj = new DB('localhost', 'root', '', 'flowerpower', 'utf8mb4');
            $obj->create_medewerker($_POST['voorletters'],
            $_POST['voorvoegsels'], 
            $_POST['achternaam'], 
            $_POST['gebruikersnaam'], 
            $_POST['wachtwoord']);
        }
        
    }

?>

<html>
<head>
  <link rel="stylesheet" type="text/css" href="style.css">
  <style>
    .form-signin-heading {
  border-radius: 25px;
  font-family: cursive;
  color: #FFFFFF;
  text-shadow:
    -1px -1px 0 #000,  
     1px -1px 0 #000,
    -1px  1px 0 #000,
     1px  1px 0 #000;
}
</style>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
  <div class="registerStyle">
    <form method="POST" class="loginForm">       
      <h2 class="form-signin-heading">Registreren</h2>

      <input type="text" class="formRegister" name="voorletters" placeholder="Voorletter" maxlength="1" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" required autofocus/><br><br>

      <input type="text" class="formRegister" name="voorvoegsels" placeholder="Voorvoegsel" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" /><br><br>

      <input type="text" class="formRegister" name="achternaam" placeholder="Achternaam" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" required/><br><br>

      <input type="text" class="formRegister" name="gebruikersnaam" placeholder="Gebruikersnaam" required /><br><br>

      <input type="password" class="formRegister" name="wachtwoord" placeholder="Wachtwoord" required=""/><br><br>

      <button class="button" name="submit" type="submit">Registreren</button>   
    </form>
  </div>


   
</body>
</html> 