<?php
class Pegawai{
    //member var
    private $koneksi;
    //member construct
    public function __construct()
    {
        global $dbh;
        $this->koneksi = $dbh;
    }
    //member method CRUD
    public function datapegawai(){
        $sql = "SELECT pegawai.*, divisi.nama AS kategori FROM pegawai
                INNER JOIN divisi ON divisi.id = pegawai.iddivisi
                ORDER BY pegawai.id ASC";
        //prepare statement
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchAll();
        return $rs;
    }

    public function getPegawai($id){
        $sql = "SELECT pegawai.*,divisi.nama AS kategori FROM pegawai
        INNER JOIN divisi ON divisi.id = pegawai.iddivisi
        WHERE pegawai.id = ?";
        //prepare statement
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);
        $rs = $ps->fetch();
        return $rs;
    }

    public function dataDivisi(){
        $sql = "SELECT * FROM divisi";
        //query eksekusi ambil data
        $rs = $this->koneksi->query($sql);
        return $rs;
    }

    public function simpan($data){
        $sql = "INSERT INTO pegawai(nip,nama,email,agama,iddivisi,foto)
        VALUES(?,?,?,?,?,?)";
        //prepare statement
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }

    public function ubah($data){
        $sql = "UPDATE pegawai SET nip=?,nama=?,email=?,agama=?,iddivisi=?,foto=? WHERE id=?";
        //prepare statement
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }

    public function hapus($id){
        $sql = "DELETE FROM pegawai WHERE id=?";
        //prepare statement
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($id);
    }
}
