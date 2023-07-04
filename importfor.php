<?php
header('Content-Type: text/html; charset=UTF-8');
$cnx = mysqli_connect("localhost", "root", "", "basearab");

if (isset($_POST['search_data'])) {
    $data = json_decode($_POST['search_data'], true);
    $nom_prenom = '';
    foreach ($data as $row) {
        $nom_prenom .= $row['nom_prenom'] . '_';
    }
} else {
    $sql = "SELECT * FROM formateur";
    $result = mysqli_query($cnx, $sql);
    if (!$result) {
        die('Error: ' . mysqli_error($cnx));
    }
    $nom_prenom = '';
    while ($row = mysqli_fetch_assoc($result)) {
        $nom_prenom .= $row['nom_prenom'] . '_';
    }
}

$date = date('d-m-Y');
$filename = $nom_prenom . ' ' . $date . '.xls';
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$filename");

if (isset($_POST['search_data'])) {
    // Export search results as an Excel file
    $tb1 = "<table border='1' cellpadding='0' cellspacing='0'>
    <tr bgcolor='#CCCCCC' height='40px'>
        <td>Nom Prenom</td>
        <td>specialite</td>
        <td>direction</td>
        <td>entreprise</td>
        <td>rib</td>
    </tr>";

    foreach ($data as $row) {
        $tb1 .= "<tr>";
        $tb1 .= "<td>" . $row['nom_prenom'] . "</td>";
        $tb1 .= "<td>" . $row['specialite'] . "</td>";
        $tb1 .= "<td>" . $row['direction'] . "</td>";
        $tb1 .= "<td>" . $row['entreprise'] . "</td>";
        $tb1 .= "<td>" . $row['rib'] . "</td>";
        $tb1 .= "</tr>";
    }

    $tb1 .= "</table>";

    echo $tb1;

} else {
    // Export entire database as an Excel file

    // Fetch data from the first table
    $query_1 = "SELECT * FROM formateur";
    $result_1 = mysqli_query($cnx, $query_1);

    $tb1 = "<table border='1' cellpadding='0' cellspacing='0'>
    <tr bgcolor='#CCCCCC' height='40px'>
        <td>Nom Prenom</td>
        <td>specialite</td>
        <td>direction</td>
        <td>entreprise</td>
        <td>rib</td>
    </tr>";

    while ($data = mysqli_fetch_array($result_1)) {
        $tb1 .= "<tr>";
        $tb1 .= "<td>" . $data['nom_prenom'] . "</td>";
        $tb1 .= "<td>" . $data['specialite'] . "</td>";
        $tb1 .= "<td>" . $data['direction'] . "</td>";
        $tb1 .= "<td>" . $data['entreprise'] . "</td>";
        $tb1 .= "<td>" . $data['rib'] . "</td>";
        $tb1 .= "</tr>";
    }

    $tb1 .= "</table>";

    // Fetch data from the second table
    $query_2 = "SELECT * FROM formateur";
    $result_2 = mysqli_query($cnx, $query_2);

    $tb2 = "<table border='1' cellpadding='0' cellspacing='0'>
    <tr bgcolor='#CCCCCC' height='40px'>
        <td>الإسم و اللقب</td>
        <td>الإختصاص</td>
        <td>مكان التعيين</td>
        <td>المؤسسة</td>
        <td>رقم الحساب البنكي</td>
    </tr>";

    while ($data = mysqli_fetch_array($result_2)) {
        $tb2 .= "<tr>";
        $tb2 .= "<td>" . $data['nom_prenom_a'] . "</td>";
        $tb2 .= "<td>" . $data['specialite_a'] . "</td>";
        $tb2 .= "<td>" . $data['direction_a'] . "</td>";
        $tb2 .= "<td>" . $data['entreprise_a'] . "</td>";
        $tb2 .= "<td>" . $data['rib'] . "</td>";
        $tb2 .= "</tr>";
    }

    $tb2 .= "</table>";

    echo $tb1 . $tb2;
}

mysqli_close($cnx);
?>
