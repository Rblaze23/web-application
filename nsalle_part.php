<?php
  $cnx = mysqli_connect("localhost", "root", "", "basearab");
  if ($cnx) {
    $theme = $_POST['theme']; // Get the selected theme from the AJAX request

    $lastWeek = date('Y-m-d', strtotime('-7 days'));
    $sql = "SELECT DISTINCT num_salle FROM cycle WHERE theme = '$theme' AND date_fin >= '$lastWeek'";
    $result = mysqli_query($cnx, $sql) or die(mysqli_error($cnx));

    $options = '';
    while ($row = mysqli_fetch_array($result)) {
      $numSalle = $row['num_salle'];
      $options .= "<option value='$numSalle'>$numSalle</option>";
    }

    echo $options;
  } else {
    die("Failed to connect to the database");
  }
?>
