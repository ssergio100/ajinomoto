<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fotos extends CI_Controller {

	public $response = array('success'=>false);
    
    public function __construct(){
        parent::__construct();
        $this->load->model('fotos_model', 'fotos');
	}
	
	public function sincroniaFotos() {
        $image_name = $_POST['nome'];
        $base64_string = $_POST['foto'];
        $md5_image_name = md5($base64_string);
        $output = config_item('path_imagens');
        $ext_image = substr($base64_string, 11, strpos($base64_string, ';') - 11);
        $output_file = $output.$md5_image_name.'.'.$ext_image;
           
        if(!$this::saveImg($base64_string, $output_file, $ext_image)) {
            $this->response['message'] = 'Erro ao tentar criar o arquivo de imagem.';
            echo json_encode($this->response);
            die;
        } 

        if ( !$this->criaTumb( $output_file)) {
            $this->response['message'] = 'Erro ao tentar criar o thumb imagem.';
            echo json_encode($this->response);
            die;
        } else {

            $new_output_file = str_replace('.','_thumb.', $output_file);
            //die($new_output_file);
            // if ( !$this->marcaDagua($output_file)) {
            //     $this->response['message'] = "Erro ao tentar adicionar a marca d'agua imagem.";
            //     echo json_encode($this->response);
            //     die;
            // }
        }
        $result = $this->fotos->getImageByMd5($md5_image_name);

        if(count($result)>0) {
            $this->response['erro'] = 1;
            $this->response['message'] ='Esta imagem já foi enviada';
            die(json_encode( $this->response));
        }
        
        $data =  array(
            'nome_md5'=>$md5_image_name,
            'nome'=>$image_name,
            'imagem_path' => $output,
            'ext' => $ext_image
        );

        if (!$this->fotos->insertImage($data)) {
            $this->fotos->removeImageByMd5Name($md5_image_name);
            die($this->response['message'] ='Erro ao tentar inserir a imagem no db' );
        } else {
            $this->response['success'] = true;
        }
        
        
        echo json_encode($this->response);
	}
    
    private function saveImg($base64_string, $output_file, $ext_image) { 
     
        $ifp = fopen( $output_file, 'wb' ); 
        $data = explode( ',', $base64_string );
        $return = fwrite( $ifp, base64_decode( $data[ 1 ] ) );
        fclose( $ifp ); 
        return $return;

    }

    public function criaTumb($output_file) {
        $config['image_library'] = 'gd2';
        $config['source_image'] =  $output_file;
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['width']         = 375;
        $config['height']       = 350;

        $this->load->library('image_lib', $config);

        return $this->image_lib->resize();
    }
    
    public function marcaDagua($output_file) {
        chmod ($output_file, 0777);
        $config['source_image'] = $output_file;
        $config['wm_text'] = 'Copyright 2019 - Ajinomoto';
        $config['wm_type'] = 'text';
        $config['wm_font_path'] = config_item('path_imagens').'Arial.ttf';
        $config['wm_font_size'] = '10';
        $config['wm_font_color'] = 'ffffff';
        $config['wm_vrt_alignment'] = 'bottom';
        $config['wm_hor_alignment'] = 'center';
        $config['wm_padding'] = '0';
     
        $this->image_lib->initialize($config);
        $this->image_lib->watermark();
        return $this->image_lib->watermark();
    }

    
	public function getAll($aprovada)
	{ 
		$result = $this->fotos->getAllImages($aprovada);

		$this->response['data'] = $result;
		$this->response['success'] = true;
		$this->response['url'] = base_url();
		echo json_encode($this->response);
	}

	public function aprovar() {
		$id_foto = $this->input->post('id_foto');
		$status = $this->input->post('status');
		$result = $this->fotos->aprovar($id_foto, $status);
		if ($result) {
			$this->response['success'] = true;
		} else {
			$this->response['message'] = 'A imagem não pode ser excluída';
		}

		echo json_encode($this->response);
	}

	
}
