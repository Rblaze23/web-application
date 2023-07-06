<?php

header('Content-Type: text/html; charset=UTF-8');
header("Content-type: application/vnd.ms-excel"); 

$cnx = mysqli_connect("localhost", "root", "", "basearab");

if (!$cnx) {
    die('Failed to connect to the database: ' . mysqli_connect_error());
}

if (isset($_POST['import'])) {
    $nom_prenom = $_POST['nom_prenom'];
    $specialite= $_POST['specialite'] ;
    $direction  = $_POST['direction'] ;
    $entreprise = $_POST['entreprise'] ;
    $rib =isset($_POST['rib']) ;
    $nom_prenom_a = $_POST['nom_prenom_a'] ;
    $specialite_a = $_POST['specialite_a'] ;
    $direction_a = $_POST['direction_a'] ;
    $entreprise_a = $_POST['entreprise_a'] ;

    $conditions = [];

    if (!empty($nom_prenom_a)) {
        $conditions[] = "nom_prenom_a = '$nom_prenom_a'";
    }
    if (!empty($nom_prenom)) {
        $conditions[] = "nom_prenom = '$nom_prenom'";
    }
    if (!empty($specialite_a)) {
        $conditions[] = "specialite_a = '$specialite_a'";
    }
    if (!empty($specialite)) {
        $conditions[] = "specialite = '$specialite'";
    }
    if (!empty($direction_a)) {
        $conditions[] = "direction_a = '$direction_a'";
    }
    if (!empty($direction)) {
        $conditions[] = "direction = '$direction'";
    }
    if (!empty($entreprise_a)) {
        $conditions[] = "entreprise_a = '$entreprise_a'";
    }
    if (!empty($entreprise)) {
        $conditions[] = "entreprise = '$entreprise'";
    }
    if (!empty($rib)) {
        $conditions[] = "rib = '$rib'";
    }

    $whereClause = implode(' AND ', $conditions);

    $query = "SELECT * FROM formateur";

    if (!empty($whereClause)) {
        $query .= " WHERE " . $whereClause;
    }

    $result = mysqli_query($cnx, $query);

    if (!$result) {
        die('Error: ' . mysqli_error($cnx));
    }

    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
} else {
    $query = "SELECT * FROM formateur";
    $result = mysqli_query($cnx, $query);

    if (!$result) {
        die('Error: ' . mysqli_error($cnx));
    }

    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
}
$spe = '';
foreach ($data as $row) {
        $spe .= $row['specialite_a'] . '_';
    }
$uniquespe = array_unique(array_column($data, 'theme_part'));
$spec = implode('_', $uniquespe);
$date = date('d-m-Y');
$filename = $spec . ' ' . $date . '.xls';

header("Content-Disposition: attachment; filename=$filename");

    $tb1 = "<table border='1' cellpadding='0' cellspacing='0'>
    <tr bgcolor='#CCCCCC' height='40px'>
        <td>Nom Prenom</td>
        <td>specialite</td>
        <td>direction</td>
        <td>entreprise</td>
        <td>rib</td>
    </tr>";

    foreach ($data as $row){
        $tb1 .= "<tr>";
        $tb1 .= "<td>" . $row['nom_prenom'] . "</td>";
        $tb1 .= "<td>" . $row['specialite'] . "</td>";
        $tb1 .= "<td>" . $row['direction'] . "</td>";
        $tb1 .= "<td>" . $row['entreprise'] . "</td>";
        $tb1 .= "<td>" . $row['rib'] . "</td>";
        $tb1 .= "</tr>";
    }

    $tb1 .= "</table>";

    $tb2 = "<table border='1' cellpadding='0' cellspacing='0'>
    <tr bgcolor='#CCCCCC' height='40px'>
        <td>الإسم و اللقب</td>
        <td>الإختصاص</td>
        <td>مكان التعيين</td>
        <td>المؤسسة</td>
        <td>رقم الحساب البنكي</td>
    </tr>";

    foreach ($data as $row)  {
        $tb2 .= "<tr>";
        $tb2 .= "<td>" . $row['nom_prenom_a'] . "</td>";
        $tb2 .= "<td>" . $row['specialite_a'] . "</td>";
        $tb2 .= "<td>" . $row['direction_a'] . "</td>";
        $tb2 .= "<td>" . $row['entreprise_a'] . "</td>";
        $tb2 .= "<td>" . $row['rib'] . "</td>";
        $tb2 .= "</tr>";
    }

    $tb2 .= "</table>";

    echo $tb1 . $tb2;


mysqli_close($cnx);
?>
