<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Fotos_model extends CI_Model
{


    public function __construct()
    {
        parent::__construct();
        $this->db->query("SET CLIENT_ENCODING TO 'UTF8'"); 
    }

    public function getAllImages($aprovada) {
        $query = "SELECT * FROM fotos WHERE ativo = 1 AND aprovada = $aprovada";
        $result = $this->db->query($query)->result();
        return $result;
    }

    public function getImageByMd5($nome_md5) {
        $query = "SELECT * FROM fotos WHERE nome_md5 = '$nome_md5' AND ativo = 1";
        $result = $this->db->query($query)->result();
        return $result;
    }

    public function insertImage($data) {
        $this->db->insert('fotos', $data);
        $rows = $this->db->affected_rows();
        return $rows > 0 ? true : false;
    }

    public function removeImageByName($md5_image_name) {
        $this->db->where('nome_md5', $md5_image_name);
        $this->db->delete('fotos');
        $rows = $this->db->affected_rows();
        return $rows > 0 ? true : false;
    }

    public function aprovar($id, $flag) {
        $query = "UPDATE fotos set aprovada = $flag WHERE id = $id";
        $this->db->query($query);
        $rows = $this->db->affected_rows();
        return $rows > 0 ? true : false;
    }

}
