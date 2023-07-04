<?php
// Set the upload directory
$uploadDir = 'C:\xampp\htdocs\cv/';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Check if a file is selected
  if (isset($_FILES['resume'])) {
    $file = $_FILES['resume'];

    // Check for errors during file upload
    if ($file['error'] === UPLOAD_ERR_OK) {
      $fileName = basename($file['name']);
      $filePath = $uploadDir . $fileName;

      // Move the uploaded file to the desired directory
      if (move_uploaded_file($file['tmp_name'], $filePath)) {
        echo '<span style="color: green;">تم تحميل السيرة الذاتية بنجاح.</span>';
      } else {
        echo '<span style="color: red;">حدث خطأ أثناء تحميل السيرة الذاتية.</span>';
      }
    } else {
      echo '<span style="color: red;">حدث خطأ أثناء تحميل السيرة الذاتية.</span>'; 
    }
  }
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <style>
    body { 
      background-color: #131516;
      color: #fff;
      font-family: Arial, sans-serif;
    }
    input[type="file"] {
      margin: 10px 0;
    }
    input[type="submit"] {
        width: 200px;;
      background-color: #ffae42;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
    h2{
            color:white;
            text-align: center;
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
  </style>
</head>
<body>
    <br><br><br>
  <h2>السير الذاتية المحملة</h2>
  <ul>
    <?php
    // Read the directory and display the uploaded resumes
    $files = glob($uploadDir . '*.{pdf,doc,docx}', GLOB_BRACE);
    foreach ($files as $file) {
      $fileName = basename($file);
      if (file_exists($file)) {
        echo '<li><a href="' . $file . '">' . $fileName . '</a></li>';
      }
    }
    ?>
  </ul>
  <a href="formateur.php"><input type="submit" value="رجوع⬅️"></a>
</body>
</html>
