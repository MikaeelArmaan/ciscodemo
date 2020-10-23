<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
class Routers extends REST_Controller
{
	public function __construct()
	{
		// Call the CI_Model constructor
		parent::__construct();
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<label class="error">', '</label>');
		$this->load->model('router_model');
	}



	public function lists_get($page_no = '0')
	{
		$data['scontent']            = array();
		$data['scontent']['sapid']    = trim($this->input->get('sapid'));
		$data['scontent']['hostname']    = trim($this->input->get('hostname'));
		$data['scontent']['mac_address']    = trim($this->input->get('mac_address'));
		$data['scontent']['loopback1']    = trim($this->input->get('loopback1'));
		$data['scontent']['loopback2']    = trim($this->input->get('loopback2'));
		$data['scontent']['type']    = trim($this->input->get('type'));
		$per_page                 = 15;
		$numRows                  = $this->router_model->get_total_routers($data['scontent']);
		$arrResult                = array();
		if ($numRows > 0) {
			$arrResult            = $this->router_model->get_routers($per_page, $page_no, $data['scontent']);
		}

		$data['arrResult']            = $arrResult;
		$data['total']            	= $numRows;
		$this->response([
			'status' => 'success',
			'result' => $data,
		], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
	}

	public function add_post()
	{
		$data = array();
		$validation_config = array(
			array(
				'field'   => 'sapid',
				'label'   => 'SapID',
				'rules'   => 'trim|required|callback_sapid_exists'
			),
			array(
				'field'   => 'hostname',
				'label'   => 'Host name',
				'rules'   => 'trim|required|callback_hostname_exists'
			),
			array(
				'field'   => 'loopback',
				'label'   => 'LoopBack',
				'rules'   => 'trim|required|callback_loopback_exists'
			),
			array(
				'field'   => 'mac',
				'label'   => 'Mac Address',
				'rules'   => 'trim|required|callback_macaddress_exists'
			)

		);

		$this->form_validation->set_rules($validation_config);
		$this->form_validation->set_message('sapid_exists', 'This %s is already in use.');
		$this->form_validation->set_message('hostname_exists', 'This %s is already in use.');
		$this->form_validation->set_message('loopback_exists', 'This %s is already in use.');
		$this->form_validation->set_message('macaddress_exists', 'This %s is already in use.');

		if ($this->form_validation->run() == false) {

			$this->response([
				'status' => 'fail',
				'message' => validation_errors(),
			], REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code

		} else {

			$arrRouterData['sapid']             = trim($this->input->post('sapid'));
			$arrRouterData['hostname']             = trim($this->input->post('hostname'));
			$arrRouterData['loopback']             = trim($this->input->post('loopback'));
			$arrRouterData['mac_address']             = trim($this->input->post('mac'));
			$arrRouterData['flg_status']            = ($this->input->post('status') ? $this->input->post('status') : '0');
			$arrRouterData['flg_is_deleted']        = 0;
			$arrRouterData['added_at']       = date('Y-m-d H:i:s');
			$arrRouterData['updated_at']     = date('Y-m-d H:i:s');

			$router_id    = $this->router_model->add_router($arrRouterData);
			if (empty($router_id)) {
				$this->response([
					'status' => 'fail',
					'message' => 'Unable to add in DB',
					'result' => $this->db->last_query()
				], REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
			} else {
				$this->response([
					'status' => 'success',
					'result' => $router_id,
					'msg'    => "router added successfully.",
				], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
			}
		}
	}

	public function edit_post($loopback = '', $page_no = '0')
	{
		$validation_config = array(
			array(
				'field'   => 'sapid',
				'label'   => 'SapID',
				'rules'   => 'trim|required'
			),
			array(
				'field'   => 'hostname',
				'label'   => 'Host name',
				'rules'   => 'trim|required'
			),

			array(
				'field'   => 'mac',
				'label'   => 'Mac Address',
				'rules'   => 'trim|required'
			)

		);

		$this->form_validation->set_rules($validation_config);
		$this->form_validation->set_message('sapid_exists', 'This %s is already in use.');
		$this->form_validation->set_message('hostname_exists', 'This %s is already in use.');
		$this->form_validation->set_message('macaddress_exists', 'This %s is already in use.');
		if ($this->form_validation->run() == false) {

			$this->response([
				'status' => 'fail',
				'message' => validation_errors(),
			], REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code

		} else {
			$arrRouterData['sapid']                = trim($this->input->post('sapid'));
			$arrRouterData['hostname']             = trim($this->input->post('hostname'));
			$arrRouterData['mac_address']          = trim($this->input->post('mac'));
			$arrRouterData['flg_status']           = ($this->input->post('status') ? $this->input->post('status') : '0');
			$arrRouterData['updated_at']     	   = date('Y-m-d H:i:s');
			$update = $this->router_model->update_router_by_loop($arrRouterData, $loopback);

			$this->response([
				'status' => 'success',
				'msg'    => "router updated successfully.",
				'result' => $update,
			], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
		}
	}


	public function sapid_exists($sapid = "")
	{
		if ($this->router_model->chk_is_exists('sapid', $sapid))
			return false;
		else
			return true;
	}
	public function hostname_exists($hostname = "")
	{
		if ($this->router_model->chk_is_exists('hostname', $hostname))
			return false;
		else
			return true;
	}
	public function loopback_exists($loopback = "")
	{
		if ($this->router_model->chk_is_exists('loopback', $loopback))
			return false;
		else
			return true;
	}
	public function macaddress_exists($macaddress = "")
	{
		if ($this->router_model->chk_is_exists('mac_address', $macaddress))
			return false;
		else
			return true;
	}

	function delete_delete($router_id = '', $page_no = '0')
	{

		$arrRouterData    = array(
			'flg_is_deleted' => 1,
			'updated_at' => date('Y-m-d H:i:s'),
		);
		$update = $this->router_model->update_router($arrRouterData, $router_id);
		$this->response([
			'status' => 'success',
			'msg'    => "router Delete successfully.",
			'result' => $update,
		], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
	}
}
