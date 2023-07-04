<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$cnx = mysqli_connect("localhost", "root", "", "basearab");

if (
  isset($_POST["nom_prenom_a"]) &&
  isset($_POST["specialite_a"]) &&
  isset($_POST["direction_a"]) &&
  isset($_POST["entreprise_a"]) &&
  isset($_POST["nom_prenom"]) &&
  isset($_POST["specialite"]) &&
  isset($_POST["direction"]) &&
  isset($_POST["entreprise"]) &&
  isset($_POST["rib"])
) {
  $nom_prenom_a = mysqli_real_escape_string($cnx, $_POST["nom_prenom_a"]);
  $specialite_a = mysqli_real_escape_string($cnx, $_POST["specialite_a"]);
  $direction_a = mysqli_real_escape_string($cnx, $_POST["direction_a"]);
  $entreprise_a = mysqli_real_escape_string($cnx, $_POST["entreprise_a"]);
  $nom_prenom = mysqli_real_escape_string($cnx, $_POST["nom_prenom"]);
  $specialite = mysqli_real_escape_string($cnx, $_POST["specialite"]);
  $direction = mysqli_real_escape_string($cnx, $_POST["direction"]);
  $entreprise = mysqli_real_escape_string($cnx, $_POST["entreprise"]);
  $rib = mysqli_real_escape_string($cnx, $_POST["rib"]);

  $sql = "INSERT INTO formateur (nom_prenom_a, specialite_a, direction_a, entreprise_a, nom_prenom, specialite, direction, entreprise, rib)
          VALUES ('$nom_prenom_a', '$specialite_a', '$direction_a', '$entreprise_a', '$nom_prenom', '$specialite', '$direction', '$entreprise', '$rib')";

  if (mysqli_query($cnx, $sql)) {
    echo "تمت العملية بنجاح.";
  } else {
    echo "حدث خطأ أثناء العملية.";
  }
}
?>

<html lang="ar" dir="rtl">
 <head>
 <meta charset="UTF-8">
</head>
 <style>
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
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

div {
  border-radius: 10px;
  background-color: #f2f2f2;
  padding: 20px;
}
body { 
        background-color:#131516 ;
            }
</style>
<br>
<body>
<a href="formateur.php"><input type="submit" value="رجوع⬅️"></a>
</body>
</html>                                                                                                                                                                                                      