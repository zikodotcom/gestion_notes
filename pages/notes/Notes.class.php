<?php
session_start();

class Notes{
    // Propreties
    private $titre;
    private $description;
    private $statut;
    private $debutT;
    private $finT;
    private static $CIN;
    // Methods
    public function __construct($titre,$description,$debutT,$finT,$connexion)
    {
        $this->titre = $titre;
        $this->description = $description;
        $this->debutT = $debutT;
        $this->finT = $finT;
        static::$CIN = $_SESSION['id'];
        $cin = static::$CIN;
        try {
            $connexion->query("INSERT INTO `notes`(`titre`, `description`, `debutT`, `finT`, `CIN`)
            VALUES ('$titre','$description','$debutT','$finT','$cin')");
            echo json_encode(array('statut' => 1));
        }
        catch (Exception $e) {
            echo json_encode(array('statut' => 0));
        }
    }
    // remplir update form
    public static function getData($id,$connexion){
        $data = $connexion->query("SELECT * FROM `notes` WHERE `id` = '$id'");
        $data = $data->fetch_assoc();
        // var_dump($data);

        echo json_encode($data);
    }
    // update
    public static function  update($titre,$description,$debutT,$finT,$id,$connexion)
    {

        try {
            $connexion->query("UPDATE `notes` SET
            `titre`='$titre',
            `description`='$description',
            `debutT`='$debutT',
            `finT`='$finT' WHERE `id` = '$id'");
            echo json_encode(array('statut' => 1));
        }
        catch (Exception $e) {
            echo json_encode(array('statut' => 0));
        }
    }
    // delete
    public static function  delete($id,$connexion)
    {

        try {
            $connexion->query("DELETE FROM `notes` WHERE `id` = '$id'");
            echo json_encode(array('statut' => 1));
        }
        catch (Exception $e) {
            echo json_encode(array('statut' => 0));
        }
    }
    // cheack if start date is greather than end date
    public static function cheackDate($debutT,$finT){
        if($debutT > $finT){
            echo json_encode(false);
        }else{
            echo json_encode(true);
        }
    }
}
?>