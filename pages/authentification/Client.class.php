
<?php

class Client {
    private $cin;
    private $nom;
    private $Prenom;
    private $Adresse;
    private $ville;
    private $tel;
    private $email;
    private $password;
    private $Photo;
    private static $statut;
    private static $cheack = array('email' => 'notFound', 'password' => 'notFound');


    // constructor
    public function __construct($cin,$nom,$Prenom,$Adresse,$ville,$tel,$email,$password,$Photo,$connexion)
    {
        $this->cin = $cin;
        $this->nom = $nom;
        $this->Prenom = $Prenom;
        $this->Adresse = $Adresse;
        $this->ville = $ville;
        $this->tel = $tel;
        $this->email = $email;
        $this->password = $password;
        try {
            mysqli_query($connexion,"INSERT INTO `users`(`CIN`, `nom`, `prenom`, `email`, `password`, `adresse`, `ville`, `telephone`, `photo`)
        VALUES ('$cin','$nom','$Prenom','$email','$password','$Adresse','$ville','$tel','$Photo')");
        self::$statut = 1;
        } catch (Exception $e) {
            self::$statut = 0;
        }
    }
    public static function  getStatut()
    {
        echo json_encode(static::$statut);
    }
    public static function setStatut($statut){
        static::$statut = $statut;
    }
    public static function login($email, $password,$connexion){
        $con1 = false;
        $con2 = false;

        $emailRes = $connexion->query("SELECT * FROM `users` WHERE `email` = '$email';");
        $hashedPassword = MD5($password);
        $passwordRes = $connexion->query("SELECT * FROM `users` WHERE `password` = '$hashedPassword';");
        if($emailRes->num_rows > 0){
            static::$cheack['email'] = 'found';
            $con1 = true;
        }
        if($passwordRes->num_rows > 0){
            static::$cheack['password'] = 'found';
            $con2 = true;
        }
        
        if($con1 and $con2){
            session_start();
            self::$statut = 1;
            $cin = $emailRes->fetch_assoc();
            $_SESSION['id'] = $cin['CIN'];
            echo json_encode(self::$statut);
        }else{
            echo json_encode(static::$cheack);
        }
    }
    
}







?>