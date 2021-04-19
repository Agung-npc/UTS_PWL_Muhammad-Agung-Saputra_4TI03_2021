<?php
require_once 'models\Pegawai.php';
//tangkap request id url
$id = $_REQUEST['id'];
$obj = new Pegawai();
$rs = $obj->getPegawai($id);
//print_r($rs); exit(); 
?>
<div class="card" style="width: 18rem;">
  <?php
  $gambar = (!empty($rs['foto'])) ? $rs['foto'] : "no_image.jpg";
  ?>

  <img src="img/<?= $gambar ?>" width="50%" class="card-img-top">
  <div class="card-body">
    <h5 class="card-title"><?= $rs['nama'] ?></h5>
    <p class="card-text">
        Nip  : <?= $rs['nip'] ?>
        <br/>Email : <?=$rs['email'] ?>
        <br/>Agama : <?=$rs['agama'] ?>
        <br/>Divisi : <?=$rs['kategori']?>

           </p>
    <a href="http://localhost/utsphp/layoutit/AppUTS/index.php?hal=dataPegawai" class="btn btn-primary">Go Back</a>
  </div>
</div>