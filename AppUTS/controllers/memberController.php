<?php
session_start();
require_once '../koneksi.php';
require_once '../models/Member.php';
//tangkap request elemen form
$username = $_POST['username'];
$password = $_POST['password'];
//menyimpan data ke sebuah array
$data = [
        $username,
        $password
];
//proses
$obj = new Member();
$rs = $obj->cekLogin($data);
if(!empty($rs)){
    //simpan session
    $_SESSION['MEMBER'] = $rs;
    //landing page
    header('Location:http://localhost/utsphp/layoutit/AppUTS/index.php?hal=dataPegawai');
}
else{
    header('Location:http://localhost/utsphp/layoutit/AppUTS/index.php?hal=gagalLogin');
}