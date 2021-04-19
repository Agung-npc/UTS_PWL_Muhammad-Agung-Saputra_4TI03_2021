<?php
require_once 'models\Pegawai.php';
//ciptakan objek kelas Pegawai
$obj = new Pegawai();
//tampilkan data
$rs = $obj->dataPegawai();
?>
<h3> Data Pegawai </h3>
<?php
if(!isset($member)){
?>
<a href="index.php?hal=formPegawai" class="btn btn-primary">Tambah</a>
<?php
}
?>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">No</th>
      <th scope="col">NIP</th>
      <th scope="col">Nama</th>
      <th scope="col">email</th>
      <th scope="col">Agama</th>
      <th scope="col">Divisi</th>
      <th scope="col">Action</th>
    </tr>
</thead>
<tbody>
<?php
$no = 1;
foreach ($rs as $pg){
?>
    <tr>
      <td><?=$no; ?></td>
      <td><?=$pg['nip']; ?></td>
      <td><?=$pg['nama']; ?></td>
      <td><?=$pg['email']; ?></td>
      <td><?=$pg['agama']; ?></td>
      <td><?=$pg['kategori']; ?></td>
      <td>

      <form method="POST" action="controllers/pegawaiController.php">
      <a href="index.php?hal=detailPegawai&id=<?=$pg['id']; ?>" 
      class="btn btn-primary">Detail</a>
      <?php
      $role = $member['role'];
      if(isset($member)){
      ?>
      <a href="index.php?hal=formEditPegawai&id=<?=$pg['id']; ?>" 
      class="btn btn-secondary">Ubah</a>
      <?php
      if($role != 'staff'){
      ?>
      <button name="proses" value="hapus"
        onclick="return confirm('Anda yakin ingin menghapus data?')"
      class="btn btn-danger">Hapus</button>
      <?php } ?>
      <input type="hidden" name="idx" value="<?= $pg['id']; ?>" />
      <?php
      }
      ?>
      </form>

      </td>
    </tr>
<?php
$no++;
}
?>
  </tbody>
</table>