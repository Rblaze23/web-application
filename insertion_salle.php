<?php
 
$cnx = mysqli_connect("localhost", "root", "", "basearab");
if (isset($_POST["num"]) && isset($_POST["lieu"])) {
    $num = $_POST["num"];
    $lieu = $_POST["lieu"];
    $sql = "INSERT INTO salles (num, lieu) VALUES ('$num', '$lieu')";
 
    $requete = mysqli_query($cnx, $sql) or die(mysqli_error($cnx));
 
    if ($requete) {
        echo "تمت العملية بنجاح";
    } else {
        echo "L'insertion à échouée";
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
        padding: 5px;
        margin: 8px 0;
        border: none;
        border-radius: 40px;
        cursor: pointer;
        font-size: 20px;
    }

    input[type=submit]:hover {
        background-color: #eab76a;
        height: var(20px);
    }



    body {
        background-color: #131516;
    }
</style>
<body>
    <a href="salle.php">
        <input type="submit" value="رجوع⬅️">
    </a>
</body>
</html>
