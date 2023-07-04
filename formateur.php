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
      </style>
  </head>
<body>
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
<form name="insertion" action="insertion_form.php" method="POST" enctype="multipart/form-data">
 
     <input type="text" name="nom_prenom_a" style="width:500px"  placeholder="الإسم و اللقب" required> <input type="text" name="nom_prenom" style="width:1128px"  placeholder="Nom et Prenom" required>

      <input type="text" name="specialite_a" style="width:500px"  placeholder="الإختصاص" required> <input type="text" name="specialite" style="width:1128px" placeholder="specialite" required>
 
      <input type="text" name="direction_a"style="width:500px" placeholder="مكان التعيين" required> <input type="text" name="direction" style="width:1128px" placeholder="direction" required>

      <input type="text" name="entreprise_a" style="width:500px" placeholder="المؤسسة" required> <input type="text" name="entreprise" style="width:1128px" placeholder="entreprise" required>
      <h4>رقم الحساب البنكي (RIB)</h4>
      <input type="text" name="rib" placeholder="RIB" required>
        <br>
       <h3>الراجاء التثبت من معلوماتك قبل ضغط زر تسجيل🤗</h3>
      <h3>🤗 Veuillez vérifier vos informations avant d'appuyer sur le bouton d'enregistrement</h3>    
       <input type="submit" value="تسجيل✅">
      
</form>
<h4>أرسل سيرتك الذاتية</h4>
<form action="resume.php" method="POST" enctype="multipart/form-data" target="_blank">
  <input type="file" name="resume">
  <input type="submit" value="سيرتك الذاتية">
</form>
<a href="Menu.html"><input type="submit" value="رجوع⬅️"></a>
</div>
</body>
</html>