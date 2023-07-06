<?php

$host = 'localhost';
$db   = 'basearab';
$user = 'root';
$pass = '';

$dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";

try {
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Connection failed: ' . $e->getMessage());
}

$query = "SELECT * FROM formateur";
$stmt = $pdo->query($query);
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
if (isset($_POST['search'])) {
    $entreprise_a =$_POST['entreprise_a'];
    $direction_a = $_POST['direction_a'];
    $specialite_a = $_POST['specialite_a'];
    $nom_prenom_a = $_POST['nom_prenom_a'];
    $entreprise =$_POST['entreprise'];
    $direction = $_POST['direction'];
    $specialite = $_POST['specialite'];
    $nom_prenom = $_POST['nom_prenom'];
    $query = "SELECT * FROM formateur WHERE  entreprise_a COLLATE utf8mb4_general_ci = :entreprise_a OR direction_a COLLATE utf8mb4_general_ci = :direction_a OR specialite_a COLLATE utf8mb4_general_ci	 = :specialite_a OR nom_prenom_a COLLATE utf8mb4_general_ci	 = :nom_prenom_a OR entreprise COLLATE utf8_general_ci = :entreprise OR direction COLLATE utf8_general_ci = :direction OR specialite COLLATE utf8_general_ci = :specialite OR nom_prenom COLLATE utf8_general_ci = :nom_prenom";

    $stmt = $pdo->prepare($query);
    $stmt->execute([
        'entreprise_a' => $entreprise_a,
        'direction_a' => $direction_a,
        'specialite_a' => $specialite_a,
        'nom_prenom_a' => $nom_prenom_a,
        'entreprise' => $entreprise,
        'direction' => $direction,
        'specialite' => $specialite,
        'nom_prenom' => $nom_prenom
    ]);
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
}


?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<head>
    <style>
       
       table {
            border-collapse: collapse;
            width: 100%;
            border: 2px solid #ddd;
            color:bisque;
        }

         td {
            padding: 8px;
            text-align: center;
            border-bottom: 3px solid #ddd;
        }
        th{ 
            padding: 8px;
            text-align: center;
            border-bottom: 3px solid #ddd;
            color:white;}
            tr.header-row th {
            background-color: black;
        }
        input[type=submit] {
        width: 100%;
        background-color: #ffae42;
        color: white;
        padding: 5px ;
        margin:8px 0 ;
        border: none;
        border-radius: 40px;
        cursor: pointer;
        font-size: 20px;
        
}
        input[type=submit]:hover {
  background-color:#eab76a;
  height: var(20px);
}
input[type=text] {
        width: 24%;
        color: white;
        padding: 5px ;
        margin:8px 0 ;
        border: none;
        border-radius: 40px;
        cursor: pointer;
        font-size: 20px;
        
}
h3{
            color:white;
            
        }
    h2{
            color:white;
            
        }        
    h1{
            color:white;
            text-align: center;
        }
        div{
            
  border-radius: 20px;
  background-color: #2e2929de;
  padding: 20px;
  text-align: center;
}
    </style>
</head>
<body><br>
<h2>المركز الوطني للإعلامية </h2>
    <h3>وحدة التكوين و الرسكلة</h3>
<h1> قائمة المكونين</h1>
<div>
<form method="POST" action="importfor.php" style:text-align="center">
        <input type="text" name="nom_prenom_a" placeholder="الإسم واللقب">
        <input type="text" name="specialite_a" placeholder=" الإختصاص">
        <input type="text" name="direction_a" placeholder=" مكان التعيين">
        <input type="text" name="entreprise_a" placeholder=" المؤسسة">
        <input type="text" name="nom_prenom" placeholder="Nom et Prenom">
        <input type="text" name="specialite" placeholder="specialite">
        <input type="text" name="direction" placeholder="direction ">
        <input type="text" name="entreprise" placeholder="entreprise ">
        <input type="submit" name="import" value="تنزيل">
    </form>
    <table>
        <tr class="header-row">
            
            <th>الإسم و اللقب</th>
            <th>الإختصاص</th>
            <th>مكان التعيين</th>
            <th>المؤسسة</th>
            <th>nom et prenom</th>
            <th>specialite</th>
            <th>direction</th>
            <th>entreprise</th>
            <th>RIB</th>
        </tr>
        <?php foreach ($data as $row): ?>
        <tr>
        <td><?php echo $row['nom_prenom_a']; ?></td>
            <td><?php echo $row['specialite_a']; ?></td>
            <td><?php echo $row['direction_a']; ?></td>
            <td><?php echo $row['entreprise_a']; ?></td>
            <td><?php echo $row['nom_prenom']; ?></td>
            <td><?php echo $row['specialite']; ?></td>
            <td><?php echo $row['direction']; ?></td>
            <td><?php echo $row['entreprise']; ?></td>
            <td><?php echo $row['rib']; ?></td>

        </tr>
        <?php endforeach; ?>
    </table>
    
    <a href="List.html"><input type="submit" value="رجوع⬅️"></a>
</div>
</body>
</html>
