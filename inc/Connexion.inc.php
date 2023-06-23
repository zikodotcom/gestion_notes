<?php
define('servernames', 'localhost');
define('usernames', 'root');
define('passwords', '');
define('db_names', 'gestion_notes');
$connexion=new mysqli(servernames, usernames, passwords,db_names);
//verifier la connexion
if($connexion === false){
    die("Erreur : impossible de se connecter." . mysqli_connect_error());
    
}
?>