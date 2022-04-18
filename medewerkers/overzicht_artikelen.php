<?php
include_once '../database.php';

// Connection made
$db = new DB('localhost', 'root', '', 'flowerpower', 'utf8mb4'); //hier zet je de waardes($..) constructor

$articles = $db->showArticles();




//Looping through array `users`
// foreach ($users as $user) {
//     echo $user["name"];
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!-- JQuery Datatables Plugin  -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css">
</head>
<body>
    <main>
        <table class="table table-striped" id="overzicht">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Artikelcode</th>
                    <th scope="col">Artikel</th>
                    <th scope="col">Prijs</th>

                </tr>
            </thead>
            <tbody> 
                <!-- users are rows and user is a single row  -->
                <?php foreach ($articles as $article): ?>
                    <tr>
                        <td><?php echo $article["artikelcode"]; ?></td>
                        <td><?php echo $article["artikel"];?></td>
                        <td><?php echo $article["prijs"];?></td>
                        <td class="noExl">
                            <a class="btn btn-primary mr-2 btn-sm" href="edit.php?artikelcode=<?php echo $article["artikelcode"]; ?>">Edit</a>
                        </td>      
                        <td class="noExl">
                            <a class="btn btn-danger mr-2 btn-sm" href="delete.php?artikelcode=<?php echo $article["artikelcode"]; ?>">Delete</a>
                        </td> 
                    </tr>
                <?php endforeach; ?>     
            </tbody>
        </table>
    </main>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>
        $('#overzicht').DataTable();
    </script>
</body>
</html>