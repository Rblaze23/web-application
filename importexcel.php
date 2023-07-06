<?php

header('Content-Type: text/html; charset=UTF-8');
header("Content-type: application/vnd.ms-excel"); 

$cnx = mysqli_connect("localhost", "root", "", "basearab");

if (!$cnx) {
    die('Failed to connect to the database: ' . mysqli_connect_error());
}

if (isset($_POST['import'])) {
    $nom_prenom = $_POST['nom_prenom'];
    $num_salle = $_POST['num_salle'];
    $date = $_POST['date'];

    $conditions = [];

    if (!empty($nom_prenom)) {
        $conditions[] = "nom_prenom = '$nom_prenom'";
    }

    if ($num_salle != 'رقم القاعة') {
        $conditions[] = "num_salle = '$num_salle'";
    }

    if (!empty($date)) {
        $conditions[] = "date_debut = '$date'";
    }

    $whereClause = implode(' AND ', $conditions);

    $query = "SELECT * FROM participant";

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
    $query = "SELECT * FROM participant";
    $result = mysqli_query($cnx, $query);

    if (!$result) {
        die('Error: ' . mysqli_error($cnx));
    }

    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
}

$themee = ''; 
foreach ($data as $row) {
    $themee .= $row['theme_part'] . '_';
}

$uniqueThemes = array_unique(array_column($data, 'theme_part'));
$themes = implode('_', $uniqueThemes);

$date = date('d-m-Y'); 

$filename = $themes . $date . '.xls';
header("Content-Disposition: attachment; filename=$filename");

$tb = "<table border='0' cellpadding='0' cellspacing='0'> 
<tr bgcolor='#CCCCCC' height='40px'> 
<td>رقم بطاقة التعريف الوطنية</td>
<td>الإسم و اللقب</td> 
<td>المؤسسة</td>
<td>الهاتف القار</td>
<td>الفاكس</td>
<td>الهاتف المحمول</td>
<td>البريد الإلكتروني</td>
<td>الدورة التكوينية</td>
<td>قاعة عدد</td>
<td>تاريخ  البداية</td> 
</tr>";

foreach ($data as $row) {
    $tb .= "<tr>"; 
    $tb .= "<td>" . $row['Cin'] . "</td>";
    $tb .= "<td>" . $row['nom_prenom'] . "</td>"; 
    $tb .= "<td>" . $row['entreprise'] . "</td>";
    $tb .= "<td>" . $row['tel_fix'] . "</td>"; 
    $tb .= "<td>" . $row['fax'] . "</td>"; 
    $tb .= "<td>" . $row['tel_port'] . "</td>"; 
    $tb .= "<td>" . $row['mail'] . "</td>";
    $tb .= "<td>" . $row['theme_part'] . "</td>"; 
    $tb .= "<td>" . $row['num_salle'] . "</td>"; 
    $tb .= "<td>" . $row['date_debut'] . "</td>"; 
    $tb .= "</tr>"; 
}

$tb .= "</table>";

print $tb;

$tb2 = "<table border='0' cellpadding='0' cellspacing='0'> 
<tr bgcolor='#CCCCCC' height='40px'> 
<td>CIN</td>
<td>Nom et Prenom</td> 
<td>entreprise</td>
<td>tel_fix</td>
<td>fax</td>
<td>tel_port</td>
<td>email</td>
<td>theme_part</td>
<td>num_salle</td>
<td>date_debut</td> 
</tr>";

foreach ($data as $row) {
    $tb2 .= "<tr>"; 
    $tb2 .= "<td>" . $row['Cin'] . "</td>";
    $tb2 .= "<td>" . $row['nom_prenom_f'] . "</td>"; 
    $tb2 .= "<td>" . $row['entreprise_f'] . "</td>";
    $tb2 .= "<td>" . $row['tel_fix'] . "</td>"; 
    $tb2 .= "<td>" . $row['fax'] . "</td>"; 
    $tb2 .= "<td>" . $row['tel_port'] . "</td>"; 
    $tb2 .= "<td>" . $row['mail'] . "</td>";
    $tb2 .= "<td>" . $row['theme_part'] . "</td>"; 
    $tb2 .= "<td>" . $row['num_salle'] . "</td>"; 
    $tb2 .= "<td>" . $row['date_debut'] . "</td>"; 
    $tb2 .= "</tr>"; 
}

$tb2 .= "</table>";

print $tb2;
mysqli_close($cnx);
?>
