
 <?php
$idimage=$_GET['id'];
$target_dir = "uploadsimage/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$name=$_FILES["fileToUpload"]["name"];
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));//dosya uzantısı bulma
$tmp_name=$_FILES["fileToUpload"]["tmp_name"];

if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "Dosya bir resimdir - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "Dosya bir resim değil.";
    $uploadOk = 0;
  }
}

if (file_exists($target_file)) {
  echo "Üzgünüz, dosya zaten var.";
  $uploadOk = 0;
}

if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Üzgünüz, dosyanız çok büyük.";
  $uploadOk = 0;
}

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Üzgünüz, sadece JPG, JPEG, PNG ve GIF dosyalarına izin verilmektedir.";
  $uploadOk = 0;
}

if ($uploadOk == 0) {
  echo "Üzgünüz, dosyanız yüklenmedi.";
} else {
  if (move_uploaded_file($tmp_name, $target_file)) {
    echo "Dosya ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " yüklendi.";
  } else {
    echo "Üzgünüz, dosyanızı yüklerken bir hata oluştu.";
  }
}

?> 
<?php include "function.php";
$conn = connect();
$query="INSERT INTO imagetables(imagename,iCostumerid)
    VALUE('$name')";
    $data=mysqli_query($conn,$query);
    header('Location: customer.php');
?>