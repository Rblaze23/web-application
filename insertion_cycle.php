<?php
$cnx = mysqli_connect("localhost", "root", "", "basearab");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $num_act = $_POST["num_act"];
  $themeCycle = $_POST["theme_cycle"];
  $dateDeb = $_POST["date_deb"];
  $dateFin = $_POST["date_fin"];
  $for1 = $_POST["for1"];
  $for2 = $_POST["for2"];
  $for3 = $_POST["for3"];
  $numSalle = $_POST["num_salle"];

  // Check if num_act already exists in the database
  $checkQuery = "SELECT * FROM cycle WHERE num_act = '$num_act'";
  $result = mysqli_query($cnx, $checkQuery);
  if (mysqli_num_rows($result) > 0) {
    echo "الرقم  العملية المدخل مكرر. يرجى اختيار رقم آخر.";
  } else {
    // Insert the form data into the database
    $insertQuery = "INSERT INTO cycle (num_act, theme, date_deb, date_fin, for1, for2, for3, num_salle)
                    VALUES ('$num_act', '$themeCycle', '$dateDeb', '$dateFin', '$for1', '$for2', '$for3', '$numSalle')";
    
    if (mysqli_query($cnx, $insertQuery)) {
      echo "تمت العملية بنجاح.";
    } else {
      echo "حدث خطأ أثناء العملية.";
    }
  }
}
?>

<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <style>
    body { 
      background-color:#131516 ;
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
  </style>
</head>
<br>
<body>
  <a href="Menu.html"><input type="submit" value="رجوع⬅️"></a>
</body>
</html>
