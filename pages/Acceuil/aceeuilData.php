<?php
// Include database configuration file  
include '../../inc/Connexion.inc.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$data = json_decode(file_get_contents("php://input"), true);

require "PHPMailer/src/PHPMailer.php";
require "PHPMailer/src/Exception.php";
require "PHPMailer/src/SMTP.php";  

session_start();

$request = $_GET['aff'];
if($request == 'calendrier'){
$cin = $_SESSION['id'];
 
// Filter events by calendar date 
$where_sql = ''; 
if(!empty($_GET['start']) && !empty($_GET['end'])){ 
    $where_sql .= " and start BETWEEN '".$_GET['start']."' AND '".$_GET['end']."' "; 
} 
 
// Fetch events from database 
$sql = "SELECT * FROM `notes`  n INNER JOIN `statut` s ON n.id_statut = s.id_statut WHERE `CIN` = '$cin'  $where_sql"; 
$result = $connexion->query($sql);  
 
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Render event data in JSON format 
echo json_encode($data);
}
if($request == 'confirm'){
    $titre = $connexion->escape_string($data['titre']);
    $desc = $connexion->escape_string($data['desc']);
    $date = date('Y-m-d');

    $id = $_GET['id'];
    if($connexion->query("UPDATE `notes` SET `id_statut`= 2 WHERE `id`= '$id'")){
        $email = $_SESSION['email'];
        
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'nmen01540@gmail.com'; // Replace with your Gmail email address
        $mail->Password = 'vqwfcufdhdosuatb'; // Replace with your Gmail account password
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom('nmen01540@gmail.com'); // Replace with your Gmail email address
        $mail->addAddress($email); // Replace with the recipient's email address
        $mail->isHTML(true);
        $mail->Subject = 'Test Email';
        $mail->Body = 'La tache de titre: ' . $titre . ' et description: ' . $desc . ' dans la date: ' . $date . ' est fini';
        $mail->send();
    }   
}

?>