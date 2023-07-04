<html>
 <head>
 <meta charset="UTF-8">
 <style>
  h1 {
        text-align: center;
      }
 body { 
        background-color:#131516 ;
            }
            </style>
</head>
<body>
 <?php
 error_reporting(0);
  $nom     = $_POST["username"] ;
  $passe = $_POST["password"] ;
  $cnx = mysqli_connect( "localhost", "root", "" ,"basearab" ) ;

   $sql = "SELECT *
        FROM admin
        where login='$nom' and pass='$passe'" ;
 
    //exécution de la requête:
    $requete = mysqli_query( $cnx,$sql ) ;

    if(mysqli_fetch_object( $requete ))
    {
    header("Location: Menu.html");
    }
    else
    {

      echo("accés refuse");
     /* header("Location: login.php");*/
    }
 

?>
</body>
</html>
