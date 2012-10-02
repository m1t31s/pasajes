<?php 
/*esto es lo mismo q hacer un select from db noticias*/
 class Registro_model extends CI_Model{
 		function getRegistro(){
 			$query= $this->db->get("user");
		if($query):
		return $query->result_array();
		else :
		echo "algo no anda bien";
		return false; 
		endif;	

 		}
 		
 		
 }