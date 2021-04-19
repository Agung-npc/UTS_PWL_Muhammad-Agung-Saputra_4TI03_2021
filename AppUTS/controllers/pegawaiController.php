<?php
require_once '../koneksi.php';
require_once '../models/Pegawai.php';
//tangkap request elemen form
$nip = $_POST['nip'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$agama = $_POST['agama'];
$iddivisi = $_POST['divisi'];
$foto = $_POST['foto'];
$tombol = $_POST['proses'];
//menyimpan data ke sebuah array
$data = [
        $nip,
        $nama,
        $email,
        $agama,
        $iddivisi,
        $foto
];
//proses
$obj = new Pegawai();
switch ($tombol) {
        case 'simpan':
                $obj->simpan($data);
                break;
        case 'ubah':
                $data[] = $_POST['idx']; //tangkap hidden field ? ke-7
                $obj->ubah($data);
                break;
        case 'hapus':
                 $id[] = $_POST['idx']; //tangkap hidden field ? ke-1
                 $obj->hapus($id);
                 break;
        default: //tombol batal
                header('Location:http://localhost/utsphp/layoutit/AppUTS/index.php?hal=datapegawai');
                break;
}

//landing page
header('Location:http://localhost/utsphp/layoutit/AppUTS/index.php?hal=datapegawai');