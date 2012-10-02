<?php

	class Inicio extends CI_Controller{
		
			function __construct(){
			parent::__construct();
			$this->_isLogin();
			$this->load->helpers("url");
			$this->load->helpers("form");
			$this->load->model("inicio_model");
		
			
		      }
		function _isLogin(){
			$test=$this->session->userdata("loginTrue");
			/*if ($test==TRUE):
			redirect("registrado");
			
			endif;
			*/

		}
		 /*  function index($a) { mirar inicio_model.php*/
		 function index() {
		   	$data=array("titulo" => "login" );
				$data2=array("header",
					         "contenido" );
				$this->load->view("Header",$data);
				$this->load->view("Body",$data2);
				$this->load->view("Footer");
			    
		   	}
		function login() {		
			$user=$this->input->post("user");
			$pass=$this->input->post("pass");		
		
		/*echo $user." ".$pass;*/
		if(!isset($user) && !isset($pass)): 
		redirect ("inicio");
		endif;
		$login =$this->inicio_model->trueLogin($user,$pass);
		if($login):
		foreach ($login as $row):
		$data_session= array(
		"loginTrue" => TRUE,
		"id_user" => $row->id_user,
		"user" => $row->user
		); 
		endforeach;
		/*graba los datos de una session automaicamente*/
		$this->session->set_userdata($data_session);
		/*redirect("inicio");*/
		redirect("registrado");		
		else:
		redirect("inicio");
		echo "no registrado";
		endif;
		
		}
		
		
	


		/*function vistas(){
			$data=array("titulo" => "multiple vistas" ,
						"header" => "mi super pagina" ,
						"contenido" => "bueno este es el contenido" );
			$this->load->view("vistas",$data);

		}	*/

		
		
		

		function salir(){
			$this->session->sess_destroy();
			redirect("inicio");
		}




}

?>