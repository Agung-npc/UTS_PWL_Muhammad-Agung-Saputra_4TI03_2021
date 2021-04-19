<?php
require_once 'models\Pegawai.php';
$ar_divisi = ['Islam','Kristen','Buddha','Hindu','Konghucu'];
$obj = new Pegawai();
$rs = $obj->dataDivisi();
?>

<h3>Form Pegawai</h3>
<form method="POST" action="controllers/pegawaiController.php">
<form>
  <div class="form-group row">
    <label for="nip" class="col-4 col-form-label">NIP</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-address-card"></i>
          </div>
        </div> 
        <input id="nip" name="nip" type="text" required="required" class="form-control">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="nama" class="col-4 col-form-label">Nama Pegawai</label> 
    <div class="col-8">
      <input id="nama" name="nama" type="text" required="required" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="email" class="col-4 col-form-label">E-mail</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-envelope-o"></i>
          </div>
        </div> 
        <input id="email" name="email" type="text" required="required" class="form-control">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-4 col-form-label">Agama</label> 
    <div class="col-8">
    <?php
    $no = 0;
    foreach($ar_divisi as $agama){
    ?>
      <div class="custom-controls-stacked">
        <div class="custom-control custom-radio">
          <input name="agama" id="agama_<?= $no ?>" type="radio" required="required" class="custom-control-input" value="<?= $agama ?>"> 
          <label for="agama_<?= $no ?>" class="custom-control-label"><?= $agama ?></label>
        </div>
        </div>
       <?php 
       $no++;
      } 
       ?>
  </div>
  </div>
  <div class="form-group row">
    <label for="divisi" class="col-4 col-form-label">Bagian Divisi</label> 
    <div class="col-8">
      <select id="divisi" name="divisi" class="custom-select" required="required">
        <option value="">--Pilih Divisi--</option>
        <?php 
        foreach($rs as $bd) {
        ?>
        <option value="<?= $bd['id'] ?>"> <?= $bd['nama'] ?> </option>
        <?php } ?>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="foto" class="col-4 col-form-label">Foto</label> 
    <div class="col-8">
      <input id="foto" name="foto" type="text" class="form-control">
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="proses" type="submit" value="simpan" class="btn btn-primary">Simpan</button>
    </div>
  </div>
</form>