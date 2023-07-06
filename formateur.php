<html lang="ar" dir="rtl">
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Fiche Incription Arabe</title>
    <h2>المركز الوطني للإعلامية </h2>
    <h3>وحدة التكوين و الرسكلة</h3>
    <h1> المكون</h1>
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
            }
            .container {
  display: flex;
  justify-content: space-between;
}
  .ee{
    width: 49%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 10px;
  box-sizing: border-box;
  border-bottom: 2px solid #ffe5ad;
}
.er{
  width: 98%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 10px;
  box-sizing: border-box;
  border-bottom: 2px solid #ffe5ad;
}
.ef{
  width: 49%; 
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 10px;
  box-sizing: border-box;
  border-bottom: 2px solid #ffe5ad;}
input[type=submit] {
        width: 98%;
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
  border-radius: 4px;
  background-color: #f2f2f2;
  padding: 20px;
}
.send-resume {
  text-align: right;
}
      </style>
  </head>
<body>
<div class="container">
<form name="insertion" action="insertion_form.php" method="POST" enctype="multipart/form-data">
 
     <input type="text" name="nom_prenom_a" class="ee"  placeholder="الإسم و اللقب" required> <input type="text" name="nom_prenom" class="ef" placeholder="Nom et Prenom" required>

      <input type="text" name="specialite_a" class="ee"  placeholder="الإختصاص" required> <input type="text" name="specialite" class="ef" placeholder="specialite" required>
 
      <input type="text" name="direction_a" class="ee" placeholder="مكان التعيين" required> <input type="text" name="direction" class="ef" placeholder="direction" required>

      <input type="text" name="entreprise_a" class="ee" placeholder="المؤسسة" required> <input type="text" name="entreprise" class="ef" placeholder="entreprise" required>
      <h4>رقم الحساب البنكي (RIB)</h4>
      <input type="text" name="rib" class="er" placeholder="RIB" required>
        <br>
       <h3>الراجاء التثبت من معلوماتك قبل ضغط زر تسجيل🤗</h3>
      <h3>🤗 Veuillez vérifier vos informations avant d'appuyer sur le bouton d'enregistrement</h3>    
       <input type="submit" value="تسجيل✅">
</form>
</div>
</form>
<div class="send-resume">
<h2>أرسل سيرتك الذاتية</h2>
       <form action="resume.php" method="POST" enctype="multipart/form-data" target="_blank">
  <input type="file" name="resume"><br>
  <input type="submit" value="اضغط لإرسال سيرتك الذاتية"><br>
  </form>
  <a href="Menu.html"><input type="submit" value="رجوع⬅️"></a>
</div>

</body>
</html>
