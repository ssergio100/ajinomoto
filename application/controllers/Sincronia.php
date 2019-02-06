<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sincronia extends CI_Controller {

    public $response = array('success'=>false);
    
    public function __construct(){
        parent::__construct();
        $this->load->model('fotos_model', 'fotos');
    }

    public function index() {

        $image_name = utf8_decode($_POST['nome']);
        $base64_string = utf8_decode($_POST['foto']);
        $md5_image_name = md5($base64_string);
        $output_file = config_item('imagens_path').$image_name;
        
        if($this::saveImg($base64_string, $output_file) === false) {
            $this->response['message'] = 'erro';
        } else {
            
            $result = $this->fotos->getImageByMd5($md5_image_name);
 
            if(count($result) > 0) {
                $this->response['erro'] = 1;
                $this->response['message'] ='Esta imagem já foi enviada';
                die(json_encode( $this->response));
            }

            $data =  array('nome_md5'=>$md5_image_name, 'nome'=>$image_name, 'imagem_path' => $output_file);

            if (!$this->fotos->insertImage($data)) {
                $this->fotos->removeImageByMd5Name($md5_image_name);
                die($this->response['message'] ='Erro ao tentar inserir a imagem no db' );
            } else {
                $this->response['success'] = true;
            }
          
        }
        echo json_encode($this->response);
    }

    private function saveImg($base64_string, $output_file) {

        $ifp = fopen( $output_file, 'wb' ); 
        $data = explode( ',', $base64_string );
        $result = fwrite( $ifp, base64_decode( $data[ 1 ] ) );
        fclose( $ifp ); 
        return $result; 
    }
}
