<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="rtl" lang="ar">
<head profile="http://gmpg.org/xfn/11">

  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
  <body>
<?php 

header('Content-Type: text/html; charset=UTF-8');
header("Content-type: application/vnd.ms-excel"); 

$cnx = mysqli_connect( "localhost", "root", "","basearab") ;
$sql = "SELECT * FROM cycle"; 
$result = mysqli_query($cnx, $sql);
if (!$result) {
    die('Error: ' . mysqli_error($cnx));
}
$nom_prenom = ''; // Variable to store the names from the database
while ($row = mysqli_fetch_assoc($result)) {
    $num_act .= $row['num_act'] . '_ ';
}
$date = date(' d-m-Y');
$filename = $num_act .' dans '. $date .'.xls';
header("Content-Disposition: attachment; filename=$filename");
$res_1 = mysqli_query($cnx,$sql);
 
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
while ($data = mysqli_fetch_array($res_1)) 
{ 
$tb1 = $tb1 . "<tr>"; 
$tb1 = $tb1 . "<td>" . $data['num_act'] . "</td>";
$tb1 = $tb1 . "<td>" . $data['theme'] . "</td>"; 
$tb1 = $tb1 . "<td>" . $data['date_deb'] . "</td>";
$tb1 = $tb1 . "<td>" . $data['date_fin'] . "</td>"; 
$tb1 = $tb1 . "<td>" . $data['for1'] . "</td>"; 
$tb1 = $tb1 . "<td>" . $data['for1'] . "</td>"; 
$tb1 = $tb1 . "<td>" . $data['for3'] . "</td>";
$tb1 = $tb1 . "<td>" . $data['num_salle'] . "</td>"; 

$tb1 = $tb1 . "</tr>"; 
} 
$tb1 .="</table>"; 

print $tb1 ;
?>
  </body>
</html>