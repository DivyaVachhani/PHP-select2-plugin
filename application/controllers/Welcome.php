<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}
	public function search()
	{
		$json = [];
		$this->load->database();
			if(!empty($this->input->get("q"))){
			$this->db->like('name', $this->input->get("q"));
			$query = $this->db->select('id,name as text')
						->limit(10)
						->get("users");
			$json = $query->result();
		}
		echo json_encode($json);
	}
}
