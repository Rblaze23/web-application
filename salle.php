
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> اظافة قاعة</title>
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
        div {
  border-radius: 20px;
  background-color: #2e2929de;
  padding: 20px;
  text-align: center;
}</style>
</head>
<body>
<h2>المركز الوطني للإعلامية </h2>
    <h3>وحدة التكوين و الرسكلة</h3>
    <h1>اظافة قاعة</h1>
  <div>
  <form name="theme_form" action="insertion_salle.php" method="POST">
  
  <h3>رقم القاعة</h3>
    <input type="text" name="num" style="width: 200px;" required><br>
    <h3>مكان القاعة</h3>
    <input type="text"  name="lieu" style="width: 200px;" required><br>
    <br><input type="submit" value="تسجيل✅">
  </form>
  <a href="Menu.html"><input type="submit" value="رجوع⬅️"></a>
</div>
</body>
</html>
