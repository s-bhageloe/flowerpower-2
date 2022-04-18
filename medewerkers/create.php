<?php
include_once '../database.php';

// Connection made
$db = new DB('localhost', 'root', '', 'flowerpower', 'utf8mb4'); //hier zet je de waardes($..) constructor

if(isset($_POST["submit"])){
    //fieldnames - input fields
    $fieldnames = ['artikel'];

    //Var boolean
    $err = false;

    //Looping
    foreach ($fieldnames as $fieldname) {
        //if fieldname is empty -> $err = true
        if (empty($_POST[$fieldname])) {
            $err = true;
        }
    }


    if ($err) {
        echo "All fields are required!";
    } else {
        $name = $_POST['artikel'];
        
        $db->createArtikel($name);
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add artikel</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="artikel">

        <button type="submit" name="submit">Add</button>
    </form>
</body>
</html>