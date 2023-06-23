<?php
include '../../inc/Connexion.inc.php';
include 'Notes.class.php';



$data = json_decode(file_get_contents("php://input"), true);

$request = $_GET["aff"];
$table_nom = "notes";
$cin = $_SESSION["id"];

//TODO: DataTable data
if($request == "datatable"){
    ##Lire la valeur
    $draw = $_POST['draw'];
    $row = $_POST['start'];
    // Affichage des lignes par page
    $rowperpage = $_POST['length'];
    // Indice de colonne
    $columnIndex = $_POST['order'][0]['column'];
    //Nom de colonne
    $columnName = $_POST['columns'][$columnIndex]['data'];
    // asc ou desc
    $columnSortOrder = $_POST['order'][0]['dir'];
    // Valeur de recherche
    $searchValue = mysqli_escape_string($connexion,$_POST['search']['value']);

    ## recherche
    $searchQuery = " ";
    if($searchValue != ''){
        $searchQuery = " and (titre like '%".$searchValue."%' or
        debutT like '%".$searchValue."%' or
        finT like'%".$searchValue."%' or description like'%".$searchValue."%') ";
    }

    ##Nombre total d'enregistrements sans filtrage
    $sel = mysqli_query($connexion,"select count(*) as allcount from ". $table_nom  . "  n INNER JOIN `statut` s ON n.id_statut = s.id_statut WHERE 1 and cin =  '$cin'");
    $records = mysqli_fetch_assoc($sel);
    $totalRecords = $records['allcount'];

    ## Nombre total d'enregistrements avec filtrage
    $sel = mysqli_query($connexion,"select count(*) as allcount from ". $table_nom  . "  n INNER JOIN `statut` s ON n.id_statut = s.id_statut  WHERE 1 and cin =  '$cin'".$searchQuery);
    $records = mysqli_fetch_assoc($sel);
    $totalRecordwithFilter = $records['allcount'];

    ## Récupérer des enregistrements
    $empQuery = "select * from ". $table_nom  . "  n INNER JOIN `statut` s ON n.id_statut = s.id_statut  WHERE 1 and cin =  '$cin' ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
    $empRecords = mysqli_query($connexion, $empQuery);
    $data = array();
    // var_dump($empRecords);
    while ($row = mysqli_fetch_assoc($empRecords)) {

       // Update Button
       $updateButton = '<div class="col-sm-12 col-md-12 col-xl py-3"><button type="button" class="btn btn-ghost-info active w-100 update" id="update" data-id="'.$row['id'].'"  data-bs-toggle="modal" data-bs-target="#modal-update">Modifier</button></div>';

       // Delete Button
       $deleteButton = '<div class="col-sm-12 col-md-12 col-xl py-3">
       <button class="btn btn-danger w-100 deleteBTN" id="delete" data-id="'.$row['id'].'"">Supprimer</button></div>';
        $action ='<div class="row">' . $updateButton." ".$deleteButton . '</div>';
        $data[] = array(
            "titre" => $row['titre'],
            "Libelle" => $row['Libelle'],
            "debutT" => $row['debutT'],
            "finT" => $row['finT'],
            "action" => $action
            );
    }
    ## Response
    $response = array(
        "draw" => intval($draw),
        "iTotalRecords" => $totalRecords,
        "iTotalDisplayRecords" => $totalRecordwithFilter,
        "aaData" => $data
    );

    echo json_encode($response);
    exit;
}
// TODO: ajouter notes

if($request == "ajout"){
    $titre = $connexion->escape_string($data['titre']);
    $desc = $connexion->escape_string($data['desc']);
    $debutT = $connexion->escape_string($data['debutT']);
    $finT = $connexion->escape_string($data['finT']);

    $Note = new Notes($titre,$desc,$debutT,$finT,$connexion);
}

//TODO: remplir update form
if($request == "remplir"){
    $id = $_GET['id'];
    Notes::getData($id,$connexion);
}
// TODO: update
if($request == "update"){
    $id = $connexion->escape_string($data['id']);
    $titre = $connexion->escape_string($data['titre']);
    $desc = $connexion->escape_string($data['desc']);
    $debutT = $connexion->escape_string($data['debutT']);
    $finT = $connexion->escape_string($data['finT']);

    Notes::update($titre,$desc,$debutT,$finT,$id,$connexion);
}
// TODO: delete
if($request == "delete"){
    $id = $_GET['id'];

    Notes::delete($id,$connexion);
}
// TODO: cheack date
if($request == "dateCheack"){
    $dateT = $_POST['dateT'];
    $dateF = $_POST['dateF'];
    Notes::cheackDate($dateT,$dateF);
}
?>