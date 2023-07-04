<html lang="ar" dir="rtl">
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Cycle de formation</title>
  
    <style>
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
        body { 
        background-color:#131516 ;
        margin: 1;
        padding: 1;
            }
            input[type=date] {
        width: 30%;
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
    <h1>إضافة دورة تكوينية</h1>
  <style>
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  border-bottom: 2px solid #ffe5ad;
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
select {
        width: 50%;
        background-color: #ffae42;
        color: white;
        padding: 10px 20px;
        margin:8px 0 ;
        border: none;
        border-radius: 20px;
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
</style>
<div>
      <form name="cycle_form" action="insertion_cycle.php" method="POST">
        <h4>رقم العملية</h4>
        <input type="text" name="num_act" >

        <h4>الدورة التكوينية</h4>
        <select name="theme_cycle"  style="width:500px" required>
        <option></option>
        
        <?php
          $cnx = mysqli_connect("localhost", "root", "", "basearab");
          if ($cnx) {
            $sql = "SELECT DISTINCT theme FROM theme";
            $result = mysqli_query($cnx, $sql) or die(mysqli_error($cnx));
      
            while ($row = mysqli_fetch_array($result)) {
              $theme = $row['theme'];
              echo "<option value='$theme' >$theme</option>";
            }
          } else {
            die("Failed to connect to the database");
          }
        ?>
        </select>

        <h4>تاريخ البداية</h4>
        <input type="date" name="date_deb" >

        <h4>تاريخ النهاية</h4>
        <input type="date" name="date_fin" >
        <br>

        <h4>مكون عددد1</h4>
        <select name="for1" style="width:500px">
        <option></option>
          <?php
          $cnx = mysqli_connect("localhost", "root", "", "basearab");
          $reponse = mysqli_query($cnx, "SELECT nom_prenom_a FROM formateur");
          while ($donnees = mysqli_fetch_array($reponse)) {
            ?>
            
            <option value="<?php echo $donnees['nom_prenom_a'] ?>"><?php echo $donnees['nom_prenom_a']; ?></option>
            <?php
          }
          ?>
        </select>
        <br>

        <h4>مكون عددد2</h4>
        <select name="for2" style="width:500px">
        <option></option>
          <?php
          $reponse = mysqli_query($cnx, "SELECT nom_prenom_a FROM formateur");
          while ($donnees = mysqli_fetch_array($reponse)) {
            ?>
            
            <option value="<?php echo $donnees['nom_prenom_a'] ?>"><?php echo $donnees['nom_prenom_a']; ?></option>
            <?php
          }
          ?>
        </select>
        <br>

        <h4>مكون عددد3</h4>
        <select name="for3" style="width:500px">
        <option></option>
          <?php
          $reponse = mysqli_query($cnx, "SELECT nom_prenom_a FROM formateur");
          while ($donnees = mysqli_fetch_array($reponse)) {
            ?>
            
            <option value="<?php echo $donnees['nom_prenom_a'] ?>"><?php echo $donnees['nom_prenom_a']; ?></option>
            <?php
          }
          ?>
        </select>
        <br>

        <h4>رقم القاعة</h4>
        <select name="num_salle"  style="width:500px">
          <option></option>
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
        <br>

        <input type="submit" value="تسجيل✅">
        
      </form>
      <a href="Menu.html"><input type="submit" value="رجوع⬅️"></a>
    </div>
  </body>
</html>