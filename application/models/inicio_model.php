<?php 
/*esto es lo mismo q hacer un select from db noticias*/
 class Inicio_model extends CI_Model{


function trueLogin($user,$pass) {
	$this->db->where("user",$user);
	$this->db->where("pass",$pass);
	$query=$this->db->get(/*nombre de la tabla*/"usuarios");
	if($query):
	return $query->result();
	else :
	return false;
	endif; 
		}

function getFixture() { 	
	$query= $this->db->get("equipos");
	if($query):
	return $query->result_array();
	else :
	echo "algo no anda bien";
	return false; 
	endif;	
 	}
 }