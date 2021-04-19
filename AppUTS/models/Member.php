<?php
class Member{
    //member var
    private $koneksi;
    //member construct
    public function __construct()
    {
        global $dbh;
        $this->koneksi = $dbh;
    }
    //member method CRUD
    
    public function cekLogin($data){
        $sql = "SELECT * FROM member
        WHERE username = ? AND password = SHA1(MD5(?))";
        //prepare statement
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
        $rs = $ps->fetch();
        return $rs;
    }

    
}
