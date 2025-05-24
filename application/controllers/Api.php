<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	public function __construct(){
		parent::__construct();
		header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: POST, OPTIONS");
        header("Access-Control-Allow-Methods: GET, OPTIONS");


	} 

	public function add_admin(){
		$post = $this->input->post();
		$return = $this->Admin_class->add_admin($post);
        echo json_encode($return);
	}
}