<?php
// Include database configuration file  
include '../../inc/Connexion.inc.php';
$request = $_GET['aff'];
if($request == 'calendrier'){
    session_start();
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
    $id = $_GET['id'];
    $connexion->query("UPDATE `notes` SET `id_statut`= 2 WHERE `id`= '$id'");
}

?>