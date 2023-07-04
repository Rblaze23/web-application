<html lang="ar" dir="rtl">
 <head>
  <meta charset="UTF-8">
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

    input[type=email], select {
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
    h1{
            color:white;
            text-align: center;
        }

        body { 
        background-color:#131516 ;
            }
    </style>
  </head>
  <body>
  
    <div>

      <form method="POST" action="insertion_part.php">
      <h2>المركز الوطني للإعلامية </h2>
    <h3>وحدة التكوين و الرسكلة</h3><br>
    <h1>المشارك</h1><br>
        <input type="text" name="cin" placeholder="رقم بطاقة التعريف الوطنية "  required>
        <input type="text" name="nom_prenom" placeholder="الإسم واللقب" style="width:500px" required> <input type="text" name="nom_prenom_f" placeholder="Nom Prenom" style="width:1128px" required>
        <input type="text" name="entreprise" placeholder=" شركة"  style="width:500px" required> <input type="text" name="entreprise_f" placeholder="Entreprise"  style="width:1128px" required>
        <input type="text" name="tel_fix" placeholder="هاتف المنزل"style="width:500px" required> <input type="text" name="tel_port" placeholder="هاتف محمول" style="width:1128px" required>
        <input type="text" name="fax" placeholder="فاكس"style="width:500px" > <input type="email" name="mail" placeholder="بريد إلكتروني" style="width:1128px" required>
        
        <select name="theme_part" required>
          <option></option>
        
  <?php
    $cnx = mysqli_connect("localhost", "root", "", "basearab");
    if ($cnx) {
   
      $lastWeek = date('Y-m-d', strtotime('-7 days'));
      $sql = "SELECT DISTINCT theme FROM cycle WHERE date_fin >= '$lastWeek'";
      $result = mysqli_query($cnx, $sql) or die(mysqli_error($cnx));

      while ($row = mysqli_fetch_array($result)) {
        $themePart = $row['theme'];
        $dateDeb = $row['date_deb'];
        echo "<option value='$themePart'  data-date-deb='$dateDeb'>$themePart</option>";
      }
    } else {
      die("Failed to connect to the database");
    }
  ?>
</select>

<select name="num_salle">
          <option>رقم القاعة</option>
        </select>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    var themeSelect = document.querySelector('select[name="theme_part"]');
    var numSalleSelect = document.querySelector('select[name="num_salle"]');

    themeSelect.addEventListener('change', function() {
      var theme = this.value;

      var xhr = new XMLHttpRequest();
      xhr.open('POST', 'nsalle_part.php');
      xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
          numSalleSelect.innerHTML = xhr.responseText;
        }
      };

      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      xhr.send('theme=' + theme);
    });
  });
</script>

        <h4>تاريخ البداية</h4> <input type="date" name="date_debut" required><br><br>
        <script>
    document.addEventListener('DOMContentLoaded', function() {
      var themeSelect = document.querySelector('select[name="theme_part"]');
      var dateDebutInput = document.querySelector('input[name="date_debut"]');

      themeSelect.addEventListener('change', function() {
        var theme = this.value;

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'idate_part.php');
        xhr.onreadystatechange = function() {
          if (xhr.readyState === 4 && xhr.status === 200) {
            dateDebutInput.value = xhr.responseText;
          }
        };

        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send('theme=' + theme);
      });
    });
  </script>
        <input type="submit" value="تسجيل✅">
      </form>
      <?php
        if(isset($_POST["cin"]) && isset($_POST["nom_prenom"]) && isset($_POST["entreprise"]) && isset($_POST["nom_prenom_f"]) && isset($_POST["entreprise_f"]) && isset($_POST["tel_fix"]) && isset($_POST["tel_port"]) && isset($_POST["mail"]) && isset($_POST["theme_part"]) && isset($_POST["num_salle"]) && isset($_POST["date_debut"])){
          $cin = $_POST["cin"];
          $nom_prenom = $_POST["nom_prenom"];
          $entreprise = $_POST["entreprise"];
          $nom_prenom_f = $_POST["nom_prenom_f"];
          $entreprise_f = $_POST["entreprise_f"];
          $tel_fix = $_POST["tel_fix"];
          $fax = $_POST["fax"];
          $tel_port = $_POST["tel_port"];
          $mail = $_POST["mail"];
          $theme_part = $_POST["theme_part"];
          $num_salle = $_POST["num_salle"];
          $date_debut = $_POST["date_debut"];

          $cnx = mysqli_connect("localhost", "root", "", "basearab");
          if ($cnx) {
            $lastWeek = date('Y-m-d', strtotime('-7 days'));
            $sql = "SELECT * FROM participant  WHERE cin = '$cin' AND theme_part = '$theme_part' AND date_debut >= '$lastWeek' ";
            $result = mysqli_query($cnx, $sql) or die(mysqli_error($cnx));

            if (mysqli_num_rows($result) > 0) {
              echo "لا يمكنك التسجيل مرة أخرى بهذا المجال في الأسبوع الحالي";
              exit;
            }

            $sql = "INSERT INTO participant (cin, nom_prenom, entreprise , nom_prenom_f, entreprise_f, tel_fix, fax, tel_port, mail, theme_part, num_salle, date_debut)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($cnx, $sql);
mysqli_stmt_bind_param($stmt, "ssssssssssss", $cin, $nom_prenom, $entreprise, $nom_prenom_f, $entreprise_f, $tel_fix, $fax, $tel_port, $mail, $theme_part, $num_salle, $date_debut);

if (mysqli_stmt_execute($stmt)) {
    echo "تمت العملية بنجاح";
} else {
    echo "فشلت عملية التسجيل";
}
          } else {
            die("Failed to connect to the database");
          }
        }
      ?> 
     <a href="menu.html"><input type="submit" value="رجوع⬅️"></a>
    </div>
  </body>
</html>
