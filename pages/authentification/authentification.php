<?php
include("../../inc/Connexion.inc.php");
include('Client.class.php');
$data = json_decode(file_get_contents("php://input"), true);
$request = $_GET['aff'];
// TODO: PARTIE REGISTER
if ($request == 'register') {
  $cin = mysqli_real_escape_string($connexion, $data['cin']);
  $nom = mysqli_real_escape_string($connexion, $data['nom']);
  $Prenom = mysqli_real_escape_string($connexion, $data['Prenom']);
  $Adresse = mysqli_real_escape_string($connexion, $data['Adresse']);
  $ville = mysqli_real_escape_string($connexion, $data['ville']);
  $tel = mysqli_real_escape_string($connexion, $data['tel']);
  $email = mysqli_real_escape_string($connexion, $data['email']);
  $password = mysqli_real_escape_string($connexion, $data['password']);
  $hashedPassword = MD5($password);
    $client = new Client($cin, $nom, $Prenom, $Adresse, $ville, $tel, $email, $hashedPassword, '',$connexion);
    echo $client->getStatut();
} 
// TODO: for register
if($request == 'cheackCin'){
  $cin = $_POST['cin'];
  // TODO: cheak if cin is duplicated
  $cinRes = $connexion->query("SELECT * FROM `users` WHERE `CIN` = '$cin';");
  if($cinRes->num_rows > 0 ){
    echo json_encode(false);
  }else{
    echo json_encode(true);
  }
}
if($request == 'cheackEmail'){
  $email = $_POST['email'];
  // TODO: cheak if cin is duplicated
  $emaiRes = $connexion->query("SELECT * FROM `users` WHERE `email` = '$email';");
  if($emaiRes->num_rows > 0 ){
    echo json_encode(false);
  }else{
    echo json_encode(true);
  }
}
// TODO: for login
if($request == 'emailCheack'){
  $email = $_POST['email'];
  // TODO: cheak if cin is duplicated
  $emaiRes = $connexion->query("SELECT * FROM `users` WHERE `email` = '$email';");
  if($emaiRes->num_rows > 0 ){
    echo json_encode(true);
  }else{
    echo json_encode(false);
  }
}
if($request == 'passwordCheack'){
  $password = $_POST['password'];
  $password = MD5($password);
  // TODO: cheak if cin is duplicated
  $passwordRes = $connexion->query("SELECT * FROM `users` WHERE `password` = '$password';");
  if($passwordRes->num_rows > 0 ){
    echo json_encode(true);
  }else{
    echo json_encode(false);
  }
}
if($request == 'login'){
  $email = mysqli_real_escape_string($connexion, $data['email']);
  $password = mysqli_real_escape_string($connexion, $data['password']);
  Client::login($email,$password,$connexion);
}
?>