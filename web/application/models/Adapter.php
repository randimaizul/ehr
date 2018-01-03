<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Adapter {

    private $rumah_sakit = array();
    private $dokter = array();
    private $pasien = array();
    private $object = array();
    protected $_link;

    function __construct() {
        //get instance of Codeigniter Object and load database library
        $this->obj =& get_instance();
        $this->obj->load->database();
    }

    /**
     * Execute the specified query
     */
    private function query($query){
        if (empty($query)) {
            $status = false;
            $msg = "Query is empty";
            $obj = "";            
        } else {
            $status = true;
            $msg = "Query success";
            $obj = $this->obj->db->query($query);
            $affectedRows = $this->obj->db->affected_rows();
        }
        return array("status"=>$status, "msg"=>$msg, "obj"=>$obj, "affectedRows"=>$affectedRows);
    }
    
    /**
     * Perform a SELECT statement
     */ 
    public function select($table, $join=null, $fields =null, $where =null, $order = null, $limit = null, $offset = null, $group=null)
    {
        $query = 'SELECT ' . $fields . ' FROM ' . $table . ' AS ' . $table 
               . (($join) ? ' LEFT JOIN ' . $join : '' )
               . (($where) ? ' WHERE ' . $where : '' )
               . (($limit) ? ' LIMIT ' . $limit : '' )
               . (($offset && $limit) ? ' OFFSET ' . $offset : '')
               . (($group) ? ' GROUP BY ' . $group : '')
               . (($order) ? ' ORDER BY ' . $order : '');
        $data = $this->query($query);

        // print_r($data['obj']->result());

        if($data['status'] == true){
            
            $status = true;
            $msg  = "Query success";

            if($table == "pasien"){
                if($data['obj']->num_rows() > 0 ){
                    foreach ($data['obj']->result() as $key => $value) {
                        $pasien[$key]['id_pasien'] = $value->id_pasien;
                        $pasien[$key]['nama_pasien'] = $value->nama_pasien;
                        $pasien[$key]['nama_orangtua'] = $value->nama_orangtua;
                        $pasien[$key]['golongan_darah'] = $value->golongan_darah;
                        $pasien[$key]['tanggal_lahir'] = $value->tanggal_lahir;
                        $pasien[$key]['agama'] = $value->agama;
                        $pasien[$key]['no_telepon'] = $value->no_telepon;
                        $pasien[$key]['jenis_asuransi'] = $value->jenis_asuransi;
                        $pasien[$key]['no_asuransi'] = $value->no_asuransi;
                        $pasien[$key]['alamat'] = $value->alamat;
                    }
                    $obj = (object)$pasien;
                } else {
                    $obj = "0";
                }
            } else if($table == "pendaftaran"){
                if($data['obj']->num_rows() > 0 ){
                    foreach ($data['obj']->result() as $key => $value) {
                        $pendaftaran[$key]['id_pendaftaran'] = $value->id_pendaftaran;
                        $pendaftaran[$key]['nama_pasien'] = $value->nama_pasien;
                        $pendaftaran[$key]['nama_dokter'] = $value->nama_dokter;
                        $pendaftaran[$key]['nama_poli'] = $value->nama_poli;
                        $pendaftaran[$key]['nomor_pendaftaran'] = $value->nomor_pendaftaran;
                        $pendaftaran[$key]['tanggal_pendaftaran'] = $value->tanggal_pendaftaran;
                        $pendaftaran[$key]['status_daftar'] = $value->status_daftar;
                        $pendaftaran[$key]['alamat_pasien'] = $value->alamat_pasien;
                        $pendaftaran[$key]['id_pasien'] = $value->id_pasien;
                        $pendaftaran[$key]['no_asuransi'] = $value->no_asuransi;
                        $pendaftaran[$key]['jenis_asuransi'] = $value->jenis_asuransi;
                    }
                    $obj = (object)$pendaftaran;
                } else {
                    $obj = "0";
                }
            } else if($table == "rumah_sakit"){
                if($data['obj']->num_rows() > 0 ){
                    foreach ($data['obj']->result() as $key => $value) {
                        $rumah_sakit[$key]['id_rs'] = $value->id_rs;
                        $rumah_sakit[$key]['nama_rs'] = $value->nama_rs;
                        $rumah_sakit[$key]['alamat'] = $value->alamat;
                        $rumah_sakit[$key]['akreditasi'] = $value->akreditasi;
                    }
                    $obj = (object)$rumah_sakit;
                } else {
                    $obj = "0";
                }
            } else if($table == "dokter"){
                if($data['obj']->num_rows() > 0 ){
                    foreach ($data['obj']->result() as $key => $value) {
                        $dokter[$key]['id_dokter'] = $value->id_dokter;
                        $dokter[$key]['id_user'] = $value->id_user;
                        $dokter[$key]['nama_dokter'] = $value->nama_dokter;
                        $dokter[$key]['alamat'] = $value->alamat;
                        $dokter[$key]['no_telp'] = $value->no_telp;
                        $dokter[$key]['nama_poli'] = $value->nama_poli;
                        $dokter[$key]['id_rs_poli'] = $value->id_rs_poli;
                        $dokter[$key]['id_rs'] = $value->id_rs;
                        $dokter[$key]['nama_rs'] = $value->nama_rs;
                        $dokter[$key]['status'] = $value->status;
                    }
                    $obj = (object)$dokter;
                } else {
                    $obj = "0";
                }
            } else if($table == "poli"){
                if($data['obj']->num_rows() > 0 ){
                    foreach ($data['obj']->result() as $key => $value) {
                        $poli[$key]['id_poli'] = $value->id_poli;
                        $poli[$key]['nama_poli'] = $value->nama_poli;
                        $poli[$key]['keterangan'] = $value->keterangan;
                    }
                    $obj = (object)$poli;
                } else {
                    $obj = "0";
                }    
            } else if($table == "users"){
                if($data['obj']->num_rows() > 0 ){
                    foreach ($data['obj']->result() as $key => $value) {
                        $user[$key]['id_user'] = $value->id_user;
                        $user[$key]['username'] = $value->username;
                        $user[$key]['status'] = $value->status;
                    }
                    $obj = (object)$user;
                } else {
                    $obj = "0";
                }                
            } else if($table == "pegawai"){
                if($data['obj']->num_rows() > 0 ){
                    foreach ($data['obj']->result() as $key => $value) {
                        $pegawai[$key]['id_pegawai'] = $value->id_pegawai;
                        $pegawai[$key]['id_rs'] = $value->id_rs;
                        $pegawai[$key]['nrp'] = $value->nrp;
                        $pegawai[$key]['nama_pegawai'] = $value->nama_pegawai;
                        $pegawai[$key]['alamat'] = $value->alamat;
                        $pegawai[$key]['no_telepon'] = $value->no_telepon;
                        $pegawai[$key]['tgl_masuk'] = $value->tgl_masuk;
                        $pegawai[$key]['nama_rs'] = $value->nama_rs;
                    }
                    $obj = (object)$pegawai;
                } else {
                    $obj = "0";
                }                
            } else if($table == "rs_poli"){
                if($data['obj']->num_rows() > 0 ){
                    foreach ($data['obj']->result() as $key => $value) {
                        $poli[$key]['id_rs_poli'] = $value->id_rs_poli;
                        $poli[$key]['id_poli'] = $value->id_poli;
                        $poli[$key]['nama_poli'] = $value->nama_poli;
                        $poli[$key]['keterangan'] = $value->keterangan;
                    }
                    $obj = (object)$poli;
                } else {
                    $obj = "0";
                }
            } else if($table == "asuransi"){
                if($data['obj']->num_rows() > 0 ){
                    foreach ($data['obj']->result() as $key => $value) {
                        $poli[$key]['id_asuransi'] = $value->id_asuransi;
                        $poli[$key]['jenis_asuransi'] = $value->jenis_asuransi;
                    }
                    $obj = (object)$poli;
                } else {
                    $obj = "0";
                }
            } else if($table == "rekam_medis"){
                if($data['obj']->num_rows() > 0 ){
                    foreach ($data['obj']->result() as $key => $value) {
                        $rekam[$key]['id_rekam_medis'] = $value->id_rekam_medis;
                        $rekam[$key]['id_pasien'] = $value->id_pasien;
                        $rekam[$key]['id_pendaftaran'] = $value->id_pendaftaran;
                        $rekam[$key]['keluhan_utama'] = $value->keluhan_utama;
                        $rekam[$key]['riwayat_alergi'] = $value->riwayat_alergi;
                        $rekam[$key]['tanda_vital'] = $value->tanda_vital;
                        $rekam[$key]['tgl_periksa'] = $value->tgl_periksa;
                    }
                    $obj = (object)$rekam;
                } else {
                    $obj = "0";
                }
            } else if($table == "obat"){
                if($data['obj']->num_rows() > 0 ){
                    foreach ($data['obj']->result() as $key => $value) {
                        $obat[$key]['id_obat'] = $value->id_obat;
                        $obat[$key]['nama_obat'] = $value->nama_obat;
                        $obat[$key]['jenis_obat'] = $value->jenis_obat;
                        $obat[$key]['ukuran_obat'] = $value->ukuran_obat;
                        $obat[$key]['harga_obat'] = $value->harga_obat;
                    }
                    $obj = (object)$obat;
                } else {
                    $obj = "0";
                }
            } else if($table == "penanganan"){
                if($data['obj']->num_rows() > 0 ){
                    foreach ($data['obj']->result() as $key => $value) {
                        $penanganan[$key]['id_penanganan'] = $value->id_penanganan;
                        $penanganan[$key]['id_rekam_medis'] = $value->id_rekam_medis;
                        $penanganan[$key]['jenis_penanganan'] = $value->jenis_penanganan;
                        $penanganan[$key]['keterangan'] = $value->keterangan;
                    }
                    $obj = (object)$penanganan;
                } else {
                    $obj = "0";
                }
            } else if($table == "daftar_obat"){
                if($data['obj']->num_rows() > 0 ){
                    foreach ($data['obj']->result() as $key => $value) {
                        $daftar_obat[$key]['id_daftar_obat'] = $value->id_daftar_obat;
                        $daftar_obat[$key]['nama_obat'] = $value->nama_obat;
                        $daftar_obat[$key]['jenis_obat'] = $value->jenis_obat;
                        $daftar_obat[$key]['ukuran_obat'] = $value->ukuran_obat;
                        $daftar_obat[$key]['harga_obat'] = $value->harga_obat;
                        $daftar_obat[$key]['jumlah'] = $value->jumlah;
                    }
                    $obj = (object)$daftar_obat;
                } else {
                    $obj = "0";
                }
            }

        } else {
            $status = false;
            $msg  = "Query failed";
            $obj = "";
        }
        
        return array("status"=>$status, "msg"=>$msg, "obj"=>$obj);
    }
    
    /**
     * Perform an INSERT statement
     */  
    public function insert($table, array $data)
    {
        $fields = implode(',', array_keys($data));
        $values = '"' . implode('","',array_values($data)) . '"';
        $query = 'INSERT INTO ' . $table . ' ('  . $fields . ') ' . ' VALUES (' . $values . ')';
        $data = $this->query($query);
        if ($data['obj']){
            $status = true;
            $msg  = "Query success";
            $obj = $data['obj'];
        } else {
            $status = false;
            $msg  = "Query failed";
            $obj = "";
        }
        return array("status"=>$status, "msg"=>$msg, "obj"=>$obj);
    }

    /**
     * Perform an UPDATE statement
     */
    public function update($table, array $data, $where = null)
    {
        $set = array();
        foreach ($data as $field => $value) {
            $set[] = $field . '=' . '"'.$value.'"';
        }
        $set = implode(',', $set);
        $query = 'UPDATE ' . $table . ' SET ' . $set 
               . (($where) ? ' WHERE ' . $where : '');
        $data = $this->query($query);
        if ($data['obj']){
            $status = true;
            $msg  = "Query success";
            $obj = $data['obj'];
        } else {
            $status = false;
            $msg  = "Query failed";
            $obj = "";
        }
        return array("status"=>$status, "msg"=>$msg, "obj"=>$obj);
    }

    /**
     * Perform a DELETE statement
     */
    public function delete($table, $where = null)
    {
        $query = 'DELETE FROM ' . $table
               . (($where) ? ' WHERE ' . $where : '');
        $data = $this->query($query);
        if($data['affectedRows']){
            $status = true;
            $msg  = "Data berhasil dihapus";
            $obj = $data['obj'];
        } else {
            $status = false;
            $msg  = "Invalid data";
            $obj = "";
        }
        return array("status"=>$status, "msg"=>$msg, "obj"=>$obj);
    }    
    
    // /**
    //  * Escape the specified value
    //  */ 
    // public function quoteValue($value)
    // {
    //     if ($value === null) {
    //         $value = 'NULL';
    //     }
    //     else if (!is_numeric($value)) {
    //         $value = "'" . mysqli_real_escape_string($this->_link, $value) . "'";
    //     }
    //     return $value;
    // }
    
    // /**
    //  * Fetch a single row from the current result set (as an associative array)
    //  */
    // public function fetch()
    // {
    //     if ($this->_result !== null) {
    //         if (($row = mysqli_fetch_array($this->_result, MYSQLI_ASSOC)) === false) {
    //             $this->freeResult();
    //         }
    //         return $row;
    //     }
    //     return false;
    // }

    // /**
    //  * Get the insertion ID
    //  */ 
    // public function getInsertId()
    // {
    //     return $this->_link !== null 
    //         ? mysqli_insert_id($this->_link) : null;  
    // }
    
    // /**
    //  * Get the number of rows returned by the current result set
    //  */  
    // public function countRows()
    // { 
    //     return $this->_result !== null 
    //         ? mysqli_num_rows($this->_result) : 0;
    // }
    
    // /**
    //  * Get the number of affected rows
    //  */ 
    // public function getAffectedRows()
    // {
    //     return $this->_link !== null 
    //         ? mysqli_affected_rows($this->_link) : 0;
    // }
    
    // /**
    //  * Free up the current result set
    //  */ 
    // public function freeResult()
    // {
    //     if ($this->_result === null) {
    //         return false;
    //     }
    //     mysqli_free_result($this->_result);
    //     return true;
    // }
    
    // /**
    //  * Close explicitly the database connection
    //  */ 
    // public function disconnect()
    // {
    //     if ($this->_link === null) {
    //         return false;
    //     }
    //     mysqli_close($this->_link);
    //     $this->_link = null;
    //     return true;
    // }
    
    // /**
    //  * Close automatically the database connection when the instance of the class is destroyed
    //  */ 
    // public function __destruct()
    // {
    //     $this->disconnect();
    // }

}?>