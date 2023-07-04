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


$query = "SELECT * FROM participant";
$stmt = $pdo->query($query);
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (isset($_POST['search'])) {
    $date = $_POST['date'];
    $num_salle = $_POST['num_salle'];
    $nom_prenom = $_POST['nom_prenom'];

    $query = "SELECT * FROM participant WHERE date_debut = :date OR num_salle = :num_salle OR nom_prenom = :nom_prenom OR nom_prenom_f = :nom_prenom_f";
    $stmt = $pdo->prepare($query);
    $stmt->execute(['date' => $date, 'num_salle' => $num_salle, 'nom_prenom' => $nom_prenom,'nom_prenom_f'=>$nom_prenom_f]);
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
}


?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
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
input[type=text] {
        width: 15%;
        color: white;
        padding: 5px ;
        margin:8px 0 ;
        border: none;
        border-radius: 40px;
        cursor: pointer;
        font-size: 20px;
        
}
input[type=date] {
        width: 52%;
        color: white;
        padding: 5px ;
        margin:8px 0 ;
        border: none;
        border-radius: 40px;
        cursor: pointer;
        font-size: 20px;
        
}
select{
    width: 15%;
        color: white;
        padding: 5px ;
        margin:8px 0 ;
        border: none;
        border-radius: 40px;
        cursor: pointer;
        font-size: 20px;
        
}
    </style>
</head>
<body>
<h2>المركز الوطني للإعلامية </h2>
    <h3>وحدة التكوين و الرسكلة</h3>
    <h1>قائمة المشاركين</h1><br>
    <div>
    <form method="POST" action="" >
        <input type="text" name="nom_prenom" placeholder="الإسم واللقب"> <input type="text" name="nom_prenom" placeholder="Nom et Prenom">
        <select name="num_salle">
          <option>رقم القاعة</option>
          <?php
          $cnx = mysqli_connect("localhost", "root", "", "basearab");
          if ($cnx) {
            $sql = "SELECT  num,lieu FROM salles";
            $result = mysqli_query($cnx, $sql) or die(mysqli_error($cnx));
      
            while ($row = mysqli_fetch_array($result)) {
              $num = $row['num'];
              $lieu=$row['lieu'];
              echo "<option value='$num' > القاعة رقم $num $lieu</option>";
            }
          } else {
            die("Failed to connect to the database");
          }
        ?>
        </select>
        <input type="date" name="date" placeholder="تاريخ البداية">
        
        <input type="submit" name="search" value="بحث 🔍">
    </form>
    <table>
        <tr class="header-row">
            <th>رقم بطاقة التعريف الوطنية</th>
            <th> واللقب</th>
            <th>شركة</th>
            <th>Nom et Prenom</th>
            <th>entreprise</th>
            <th>هاتف المنزل</th>
            <th>فاكس</th>
            <th>هاتف محمول</th>
            <th>بريد إلكتروني</th>
            <th>مجال التكوين</th>
            <th>رقم القاعة</th>
            <th>تاريخ البداية</th>
            
        </tr>
        <?php foreach ($data as $row): ?>
        <tr>
            <td><?php echo $row['Cin']; ?></td>
            <td><?php echo $row['nom_prenom']; ?></td>
            <td><?php echo $row['entreprise']; ?></td>
            <td><?php echo $row['nom_prenom_f']; ?></td>
            <td><?php echo $row['entreprise_f']; ?></td>
            <td><?php echo $row['tel_fix']; ?></td>
            <td><?php echo $row['fax']; ?></td>
            <td><?php echo $row['tel_port']; ?></td>
            <td><?php echo $row['mail']; ?></td>
            <td><?php echo $row['theme_part']; ?></td>
            <td><?php echo $row['num_salle']; ?></td>
            <td><?php echo $row['date_debut']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <a href="importexcel.php"><input type="submit" name="import" value="تنزيل"></a>
    <a href="List.html"><input type="submit" value="رجوع⬅️"></a>
</div>
</body>
</html>
