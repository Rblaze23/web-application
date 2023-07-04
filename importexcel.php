
<?php 

header('Content-Type: text/html; charset=UTF-8');
header("Content-type: application/vnd.ms-excel"); 

$cnx = mysqli_connect("localhost", "root", "", "basearab");
$sql = "SELECT * FROM participant";

$result = mysqli_query($cnx, $sql);
if (!$result) {
    die('Error: ' . mysqli_error($cnx));
}

$nom_prenom = ''; // Variable to store the names from the database
while ($row = mysqli_fetch_assoc($result)) {
    $nom_prenom .= $row['nom_prenom'] . '_';
}

$date = date('d-m-Y'); // Current date

$filename = $nom_prenom . $date . '.xls';
header("Content-Disposition: attachment; filename=$filename");

$res_1 = mysqli_query($cnx,$sql);
$res_2 = mysqli_query($cnx,$sql);
$res_3 = mysqli_query($cnx,$sql);
$res_4 = mysqli_query($cnx,$sql); 
$res_5 = mysqli_query($cnx,$sql); 
$tb2= " <table border='0' cellpadding='0' cellspacing='0'> 
<tr bgcolor='#CCCCCC' height='40px'> 
<td>رقم بطاقة التعريف الوطنية</td>
<td>الإسم و اللقب</td> 
<td>المؤسسة</td>
<td>الهاتف القار </td>
<td>الفاكس </td>
<td>الهاتف المحمول</td>
<td>البريد الإلكتروني </td>
<td>الدورة التكوينية</td>
<td>قاعة عدد </td>
<td>تاريخ  البداية</td> 
</tr>";
while ($data = mysqli_fetch_array($res_2)) 
{ 
$tb2 = $tb2 . "<tr>"; 
$tb2 = $tb2 . "<td>" . $data['Cin'] . "</td>";
$tb2 = $tb2 . "<td>" . $data['nom_prenom'] . "</td>"; 
$tb2 = $tb2 . "<td>" . $data['entreprise'] . "</td>";
$tb2 = $tb2 . "<td>" . $data['tel_fix'] . "</td>"; 
$tb2 = $tb2 . "<td>" . $data['fax'] . "</td>"; 
$tb2 = $tb2 . "<td>" . $data['tel_port'] . "</td>"; 
$tb2 = $tb2 . "<td>" . $data['mail'] . "</td>";
$tb2 = $tb2 . "<td>" . $data['theme_part'] . "</td>"; 
$tb2 = $tb2 . "<td>" . $data['num_salle'] . "</td>"; 
$tb2 = $tb2 . "<td>" . $data['date_debut'] . "</td>"; 
$tb2 = $tb2 . "</tr>"; 
} 
$tb2 .="</table>"; 

print $tb2 ;

$tb3= " <table border='0' cellpadding='0' cellspacing='0'> 
<tr bgcolor='#CCCCCC' height='40px'> 
<td>Cin</td>
<td>Nom Prenom</td> 
<td>Entreprise</td>
<td>Tel_Fix</td>
<td>Fax</td>
<td>Tel_Port</td>
<td>Email</td>
<td>Theme_Part</td>
<td>Num_Salle</td>
<td>date de debut</td> 
</tr>"; 
while ($data = mysqli_fetch_array($res_3)) 
{ 
$tb3 = $tb3 . "<tr>"; 
$tb3 = $tb3 . "<td>" . $data['Cin'] . "</td>";
$tb3 = $tb3 . "<td>" . $data['nom_prenom_f'] . "</td>"; 
$tb3 = $tb3 . "<td>" . $data['entreprise_f'] . "</td>";
$tb3 = $tb3 . "<td>" . $data['tel_fix'] . "</td>"; 
$tb3 = $tb3 . "<td>" . $data['fax'] . "</td>"; 
$tb3 = $tb3 . "<td>" . $data['tel_port'] . "</td>"; 
$tb3 = $tb3 . "<td>" . $data['mail'] . "</td>";
$tb3 = $tb3 . "<td>" . $data['theme_part'] . "</td>"; 
$tb3 = $tb3 . "<td>" . $data['num_salle'] . "</td>"; 
$tb3 = $tb3 . "<td>" . $data['date_debut'] . "</td>"; 
$tb3 = $tb3 . "</tr>"; 
} 
$tb3 .="</table>"; 

print $tb3 ; 

//$tb5= " <table border='0' cellpadding='0' cellspacing='0'> 
//<tr bgcolor='#CCCCCC' height='40px'> 
//<td>رقم بطاقة التعريف الوطنية</td>
//<td>الإسم و اللقب</td> 
//<td>المؤسسة</td>
//<td>قاعة عدد </td>
//<td>تاريخ  البداية</td> 
//</tr>";
//while ($data = mysqli_fetch_array($res_5)) 
//{ 
//$tb5 = $tb5 . "<tr>"; 
//$tb5 = $tb5 . "<td>" . $data['Cin'] . "</td>";
//$tb5 = $tb5 . "<td>" . $data['nom_prenom'] . "</td>"; 
//$tb5 = $tb5 . "<td>" . $data['entreprise'] . "</td>";
//$tb5 = $tb5 . "<td>" . $data['num_salle'] . "</td>"; 
//$tb5 = $tb5 . "<td>" . $data['date_debut'] . "</td>"; 
//$tb5 = $tb5 . "</tr>"; 
//} 
//$tb5 .="</table>"; 

//print $tb5 ;

//$tb4= " <table border='0' cellpadding='0' cellspacing='0'> 
//<tr bgcolor='#CCCCCC' height='40px'> 
//<td>Cin</td>
//<td>Nom Prenom</td> 
//<td>Entreprise</td>
//<td>Num_Salle</td>
//<td>date de debut</td> 
//</tr>"; 
//while ($data = mysqli_fetch_array($res_4)) 
//{ 
//$tb4 = $tb4 . "<tr>"; 
//$tb4 = $tb4 . "<td>" . $data['Cin'] . "</td>";
//$tb4 = $tb4 . "<td>" . $data['nom_prenom'] . "</td>"; 
//$tb4 = $tb4 . "<td>" . $data['entreprise'] . "</td>";

//$tb4 = $tb4 . "<td>" . $data['num_salle'] . "</td>"; 
//$tb4 = $tb4 . "<td>" . $data['date_debut'] . "</td>"; 
//$tb4 = $tb4 . "</tr>"; 
//} 
//$tb4 .="</table>"; 

//print $tb4 ; 


?>
