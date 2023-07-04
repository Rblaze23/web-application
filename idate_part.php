<?php
$theme = $_POST['theme'];


$cnx = mysqli_connect("localhost", "root", "", "basearab");
if (!$cnx) {
  die("Failed to connect to the database");
}
$lastWeek = date('Y-m-d', strtotime('-7 days'));
$query = "SELECT date_deb FROM cycle WHERE theme = '$theme' AND date_deb>= '$lastWeek'";
$result = mysqli_query($cnx, $query);

if ($result) {

  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $dateDeb = $row['date_deb'];
    echo $dateDeb;
  } else {
    echo "no matching theme";
} 
} else {
  echo "error";
}

mysqli_close($cnx);
?>