<?php
include_once '../database.php';

// Connection made
$db = new DB('localhost', 'root', '', 'flowerpower', 'utf8mb4'); //hier zet je de waardes($..) constructor

$artikel = $db->selectSpecificArtikel($_GET['artikelcode']);
$prijs = $db->selectSpecificPrijs($_GET['artikelcode']);

if(isset($_POST["submit"])){
    //fieldnames - input fields
    $fieldnames = ['artikel', 'prijs'];

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
        $artikel = $_POST['artikel'];
        $prijs = $_POST['prijs'];
        
        $db->updateArtikel($_GET['artikelcode'], $artikel);
        $db->updatePrijs($_GET['artikelcode'], $prijs);
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit artikel</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="artikel" value="<?php echo $artikel['artikel'];?>">
        <input type="number" step="0.01" name="prijs" value="<?php echo $prijs['prijs'];?>">

        <button type="submit" name="submit">Edit</button>
    </form>
</body>
</html>