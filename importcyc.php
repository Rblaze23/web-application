<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="rtl" lang="ar">
<head profile="http://gmpg.org/xfn/11">

  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
  <body>
  <?php

header('Content-Type: text/html; charset=UTF-8');
header("Content-type: application/vnd.ms-excel"); 

$cnx = mysqli_connect("localhost", "root", "", "basearab");

if (!$cnx) {
    die('Failed to connect to the database: ' . mysqli_connect_error());
}

if (isset($_POST['import'])) {
    $theme = $_POST['theme'];
    $num_salle = $_POST['num_salle'];
    $date = $_POST['date_deb'];

    $conditions = [];

    if (!empty($theme)) {
        $conditions[] = "theme = '$theme'";
    }

    if ($num_salle != 'رقم القاعة') {
        $conditions[] = "num_salle = '$num_salle'";
    }

    if (!empty($date)) {
        $conditions[] = "date_deb = '$date'";
    }

    $whereClause = implode(' AND ', $conditions);

    $query = "SELECT * FROM cycle";

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
    $query = "SELECT * FROM cycle";
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
    $themee .= $row['theme'] . '_';
}

$uniqueThemes = array_unique(array_column($data, 'theme'));
$themes = implode('_', $uniqueThemes);

$date = date('d-m-Y'); 

$filename = $themes .' '. $date . '.xls';

header("Content-Disposition: attachment; filename=$filename");

 
$tb1= " <table border='0' cellpadding='0' cellspacing='0'> 
<tr bgcolor='#CCCCCC' height='40px'> 
<td>رقم العملية</td>
<td>الدورة التكوينية</td> 
<td>تاريخ  البداية</td> 
<td>تاريخ النهاية</td>
<td>مكون عددد1</td>
<td>مكون عددد2</td>
<td>مكون عددد3</td>
<td>قاعة عدد </td>

</tr>";
foreach ($data as $row) 
{ 
$tb1 = $tb1 . "<tr>"; 
$tb1 = $tb1 . "<td>" . $row['num_act'] . "</td>";
$tb1 = $tb1 . "<td>" . $row['theme'] . "</td>"; 
$tb1 = $tb1 . "<td>" . $row['date_deb'] . "</td>";
$tb1 = $tb1 . "<td>" . $row['date_fin'] . "</td>"; 
$tb1 = $tb1 . "<td>" . $row['for1'] . "</td>"; 
$tb1 = $tb1 . "<td>" . $row['for1'] . "</td>"; 
$tb1 = $tb1 . "<td>" . $row['for3'] . "</td>";
$tb1 = $tb1 . "<td>" . $row['num_salle'] . "</td>"; 

$tb1 = $tb1 . "</tr>"; 
} 
$tb1 .="</table>"; 

print $tb1 ;
?>
  </body>
</html>
