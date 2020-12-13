<?php include "function.php";  
$table="manager";
$conn=connect();
$data=listTable($table);
?>


<!doctype html>
<html lang="tr">
  <head>
 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">

    
  </head>
  <body>
  <p style="font-size:40px">Yönetici Bilgileri </p>
<div class="container">

<tr><th> <a href="../mainpage.php"> <button type="button" class="btn btn-success ">ANASAYFA</button></th></a></tr>

  <div class="row">

    <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">AD</th>
      <th scope="col">SOYADI</th>
      <th scope="col">EMAİL</th>
      <th scope="col">ADRES</th>
      <th scope="col">Pozisyon</th>
        <th> <a href="addmanager.php"> <button type="button" class="btn btn-success ">Yeni yönetici</button></th></a>
    </tr>
  </thead>
  <tbody>
<!--  --><?php // var_dump(count($listData)); ?>

<?php 
##if(isset($data)){print_r("data yok");}
foreach($data as $listData) { ?>
    <tr>
      <th scope="row"><?php echo $listData['mid']; ?></th>
      <td><?php echo $listData['mName']; ?></td>
      <td><?php echo $listData['mLastName']; ?></td>
      <td><?php echo $listData['mEmail']; ?></td>
      <td><?php echo $listData['mAddress']; ?></td>
      <td><?php echo $listData['mRole']; ?></td>
        <td>
      <a href="updatemanager.php?mid=<?php echo $listData['mid']; ?>" > <button type="submit" class="btn btn-success">düzenle</button>
      <a href="delete.php?mid=<?php echo $listData['mid']; ?>" > <button type="submit" class="btn btn-danger">sil</button>
        </td>
    </tr>
<!--  --><?php } ?>
  </tbody>
  </table>
  </div>
</div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

  
  </body>
</html>