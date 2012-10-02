<?php
	
	class Registrado extends CI_Controller {
		
		function __construct(){
			parent::__construct();
			$this->load->helpers("url");
			$this->_isLogin();
			$this->load->helpers("form");
						$this->load->model("inicio_model");

			$this->load->model("registro_model");
	}

	function _isLogin(){
			$test=$this->session->userdata("loginTrue");
			if(!$test):
				redirect("inicio");
			endif;

	}

	function index(){
		$data=array("titulo" => "Registro" );
				$data2=array("header",
					         "contenido","footer" );
				$this->load->view("Header",$data);
				$this->load->view("registro_view",$data2);
				$this->load->view("Footer");

		}

		function insertar(){
			$this->load->view("insertar_view");
		}

		function addArt(){
			if ($this->registro_model->insertArt):
				echo "se inserto los archivos";			
			else:
				echo "no se inserto los archivos";
			endif;
		}
		function salir(){
			$this->session->sess_destroy();
			redirect("inicio");
		}
	}


?>