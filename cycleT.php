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

$query = "SELECT * FROM cycle";
$stmt = $pdo->query($query);
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
if (isset($_POST['search'])) {
    $date = $_POST['date_deb'];
    $num_salle = $_POST['num_salle'];
    $theme = $_POST['theme'];

    $query = "SELECT * FROM cycle WHERE date_deb = :date_deb OR num_salle = :num_salle OR theme = :theme";
    $stmt = $pdo->prepare($query);
    $stmt->execute(['date_deb' => $date, 'num_salle' => $num_salle, 'theme' => $theme]);
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
        width: 24%;
        color: white;
        padding: 5px ;
        margin:8px 0 ;
        border: none;
        border-radius: 40px;
        cursor: pointer;
        font-size: 20px;
        
}
input[type=date] {
        width: 24%;
        color: white;
        padding: 5px ;
        margin:8px 0 ;
        border: none;
        border-radius: 40px;
        cursor: pointer;
        font-size: 20px;
        
}
select{
        width: 24%;
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
<body><br>
<h2>المركز الوطني للإعلامية </h2>
    <h3>وحدة التكوين و الرسكلة</h3>
    <h1>قائمة الدورة التكوينية</h1>
    <div>
    <form method="POST" action="importcyc.php" style:text-align="center">
        <input type="text" name="theme" placeholder="الدورة التكوينية">
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
        <p>تاريخ البداية <input type="date" name="date_deb" placeholder="تاريخ البداية"></p>
        <input type="submit" name="import" value="تنزيل"></a>
    </form>
    <table>
        
        <tr class="header-row">
            <th>رقم العملية</th>
            <th>الدورة التكوينية</th>
            <th>تاريخ البداية</th>
            <th>تاريخ النهاية</th>
            <th>مكون عددد1</th>
            <th>مكون عددد2</th>
            <th>مكون عددد3</th>
            <th>رقم القاعة</th>
        </tr>
        <div>
        <?php foreach ($data as $row): ?>
        <tr>
            <td><?php echo $row['num_act']; ?></td>
            <td><?php echo $row['theme']; ?></td>
            <td><?php echo $row['date_deb']; ?></td>
            <td><?php echo $row['date_fin']; ?></td>
            <td><?php echo $row['for1']; ?></td>
            <td><?php echo $row['for2']; ?></td>
            <td><?php echo $row['for3']; ?></td>
            <td><?php echo $row['num_salle']; ?></td>

        </tr>
        <?php endforeach; ?>
    </table><br>

    <a href="List.html"><input type="submit" value="رجوع⬅️"></a>
    </div>
</body>
</html>
