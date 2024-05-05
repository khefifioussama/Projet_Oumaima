<?php




 class Db
{



     private $dbn="tekup";

    private $lhost="localhost";
    private $username="root";
    private $password="";

   public $con;


        public function __construct()
        {
            try {
                $option = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);// class detectilik les erreur 
                $bn = "mysql:host={$this->lhost};dbname={$this->dbn};charset=utf8";
                $this->con = new PDO($bn, $this->username, $this->password, $option);
            }
            catch(PDOException $e)
            {
                echo "Sorry you can't connect".$e->getMessage();
            }

        }

        /*testtttt
        public function verifyCredentials($email, $password)
    {
        try {
            $stmt = $this->con->prepare("SELECT * FROM utilisateur WHERE email = :email AND password = :password");
            $stmt->execute(array(':email' => $email, ':password' => $password));
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            
            // Si un utilisateur correspondant est trouvé, retournez vrai, sinon retournez faux
            if ($row) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }*/
}









