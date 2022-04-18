<?php
class DB{
    private $host;
    private $user;
    private $pass;
    private $db;
    private $charset;
    private $pdo;

    public function __construct($host, $user, $pass, $db, $charset){
        $this->host = $host;
        $this->user = $user;
        $this->pass = $pass;
        $this->db = $db;
        $this->charset = $charset; 
        
     

        try{
            $dsn = 'mysql:host='. $this->host.';dbname='.$this->db.';charset='.$this->charset;
            $this->pdo = new PDO($dsn, $this->user, $this->pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $this->pdo;
        }
        catch(\PDOException $e){
            echo "Connection Failed: ".$e->getMessage();
        }
      
    }



    /**
     * Preparing the query to prevent sql injections
     * @return the rows from table `account`
     */
    public function showArticles(){
        try {
            $query = "SELECT * FROM artikel;";
            
            $prep = $this->pdo->prepare($query);

            $prep->execute();

            $rows = $prep->fetchAll(PDO::FETCH_ASSOC);
            
            return $rows;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function create_klant($voornaam, $tussenvoegsels, $achternaam, $adres, $postcode, $woonplaats, $geboortedatum, $gebruikersnaam, $wachtwoord){
        try {
             /* Begin a transaction, turning off autocommit */
             $this->pdo->beginTransaction(); 
 
             $sql = "INSERT INTO klant(klantcode, voorletters, tussenvoegsels, achternaam, adres, postcode, woonplaats, geboortedatum, gebruikersnaam, wachtwoord)
             VALUES(NULL, :voorletters, :tussenvoegsels, :achternaam, :adres, :postcode, :woonplaats, :geboortedatum, :gebruikersnaam, :wachtwoord);";
 
             $query = $this->pdo->prepare($sql);
 
             $query->execute([
                 'voorletters' => $voornaam,
                 'tussenvoegsels' => $tussenvoegsels,
                 'achternaam' => $achternaam,
                 'adres' => $adres,
                 'postcode' => $postcode,
                 'woonplaats' => $woonplaats,
                 'geboortedatum' => $geboortedatum,
                 'gebruikersnaam' => $gebruikersnaam,
                 'wachtwoord' => $wachtwoord
             ]);

             /* Commit the changes */
             $this->pdo->commit();
 
             /* Prevents that data is always added to the table during refresh */
             header("Location: loginCustomer.php");

             exit;
        }catch (PDOException $e) {
            /* Recognize mistake and roll back changes */
            $this->pdo->rollback();
            
            throw $e;
        }
    }

         /**
     * Preparing the query to prevent sql injections
     * @return  specific row from table `gender`
     */
    public function selectSpecificArtikel($artikelcode){
        try {
            $query = "SELECT * FROM artikel WHERE artikelcode = :artikelcode;";

            $prep = $this->pdo->prepare($query);

            $prep->execute([
                'artikelcode' => $artikelcode
            ]);

            $row = $prep->fetch(PDO::FETCH_ASSOC);
        
            return $row;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function selectSpecificPrijs($artikelcode){
        try {
            $query = "SELECT * FROM artikel WHERE artikelcode = :artikelcode;";

            $prep = $this->pdo->prepare($query);

            $prep->execute([
                'artikelcode' => $artikelcode
            ]);

            $row = $prep->fetch(PDO::FETCH_ASSOC);
        
            return $row;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function updateArtikel($artikelcode, $artikel){
        try {
            $query = "UPDATE artikel SET artikel = :artikel WHERE artikelcode = :artikelcode;";

            $prep = $this->pdo->prepare($query);

            $prep->execute([
                'artikelcode' => $artikelcode,
                'artikel' => $artikel
            ]);

            header('Location: overzicht_artikelen.php');

            //exit;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function updatePrijs($artikelcode, $prijs){
        try {
            $query = "UPDATE artikel SET prijs = :prijs WHERE artikelcode = :artikelcode;";

            $prep = $this->pdo->prepare($query);

            $prep->execute([
                'artikelcode' => $artikelcode,
                'prijs' => $prijs
            ]);

            header('Location: overzicht_artikelen.php');

            exit;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function loginmedewerkers($username, $pwd){ 
        $sql="SELECT * FROM klant WHERE gebruikersnaam = :gebruikersnaam";

        $stmt = $this->dbh->prepare($sql); 
        $stmt->execute(['gebruikersnaam'=>$username]); 

        $result = $stmt->fetch(PDO::FETCH_ASSOC); 
       
        if($result){
            if(password_verify($pwd, $result["wachtwoord"])) {
                echo "Valid Password!";

                  // Start the session
                  session_start();

                  $_SESSION['gebruikersnaam'] = $result;
                
                 print_r($_SESSION['gebruikersnaam']);

                header("Location: overzicht_artikelen.php");
                exit();
            } else {
                echo "Invalid Password!";
            }
        } else {
            echo "Invalid Login";
        }

    }

    public function create_medewerker($voornaam, $voorvoegsels, $achternaam, $gebruikersnaam, $wachtwoord){
        try {
             /* Begin a transaction, turning off autocommit */
             $this->pdo->beginTransaction(); 
 
             $sql = "INSERT INTO medewerker(medewerkerscode, voorletters, voorvoegsels, achternaam, gebruikersnaam, wachtwoord)
             VALUES(NULL, :voorletters, :voorvoegsels, :achternaam, :gebruikersnaam, :wachtwoord);";
 
             $query = $this->pdo->prepare($sql);
 
             $query->execute([
                 'voorletters' => $voornaam,
                 'voorvoegsels' => $voorvoegsels,
                 'achternaam' => $achternaam,
                 'gebruikersnaam' => $gebruikersnaam,
                 'wachtwoord' => password_hash($wachtwoord, PASSWORD_DEFAULT)
             ]);

             /* Commit the changes */
             $this->pdo->commit();
 
             /* Prevents that data is always added to the table during refresh */
             header("Location: loginEmployee.php");

             exit;
        }catch (PDOException $e) {
            /* Recognize mistake and roll back changes */
            $this->pdo->rollback();
            
            throw $e;
        }
    }

    public function deleteArtikel($artikelcode){
        try {
            $query = $this->pdo->prepare(
                "DELETE FROM artikel
                WHERE artikelcode = :artikelcode;"
            );

            $query->execute([
                'artikelcode' => $artikelcode
            ]);

            header("Location: overzicht_artikelen.php");
        } catch (\PDOException $e) {
            throw $e;
        }
    }

    public function createArtikel($artikel){
        try {
            $query = "INSERT INTO artikel(artikel) VALUES (:artikel)";

            $prep = $this->pdo->prepare($query);

            $prep->execute([
                'artikel' => $artikel
            ]);

            header('Location: overzicht_artikelen.php');

            exit;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}

?>