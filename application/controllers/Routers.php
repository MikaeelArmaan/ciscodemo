<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Routers extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<label class="error">', '</label>');
        $this->load->model('router_model');
    }
    public function index()
    {
        $this->lists();
    }

    public function lists($page_no = 0)
    {
        $data['scontent']            = array();
        $data['scontent']['name']    = $this->input->get('sname');

        $per_page                 = 15;
        $numRows                  = $this->router_model->get_total_routers($data['scontent']);
        $arrResult                = array();
        if ($numRows > 0) {
            $arrResult            = $this->router_model->get_routers($per_page, $page_no, $data['scontent']);
        }

        $data['page']                 = get_pagination($numRows, $per_page, "admin/lists");
        $data['arrResult']            = $arrResult;
        // automatically push current page to last record of breadcrumb
        $title                         = 'List Routers';
        $data['ctrler']                = 'routers';
        $data['page_title']            = $title;
        $this->load->view('routers', $data);
    }

    public function add()
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

        $data = array();
        // automatically push current page to last record of breadcrumb
        $title                        = 'Add Router';
        $data['ctrler']                = 'routers';
        $data['page_title']            = $title;
        $data['css_files']           = [];
        $data['js_files']            = ['bs-custom-file-input/bs-custom-file-input.min.js', 'bootstrap-switch/js/bootstrap-switch.min.js'];
        $data['frm_url']             = "routers/add/";
        $data['readonly']            = "";

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('edit-router', $data);
        } else {

            $arrRouterData['sapid']             = trim($this->input->post('sapid'));
            $arrRouterData['hostname']             = trim($this->input->post('hostname'));
            $arrRouterData['loopback']             = trim($this->input->post('loopback'));
            $arrRouterData['mac_address']             = trim($this->input->post('mac'));
            $arrRouterData['flg_status']            = ($this->input->post('status') ? $this->input->post('status') : '0');
            $arrRouterData['type']                 = trim($this->input->post('type'));

            $arrRouterData['flg_is_deleted']        = 0;
            $arrRouterData['added_at']     = date('Y-m-d H:i:s');
            $arrRouterData['updated_at']     = date('Y-m-d H:i:s');

            $router_id    = $this->router_model->add_router($arrRouterData);

            $this->session->set_flashdata('success_msg', 'router has been added successfully.');

            redirect(site_url('routers/lists'));
            exit;
        }
    }

    public function edit($router_id = '', $page_no = '0')
    {
        $data = array();
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
                'field'   => 'loopback',
                'label'   => 'LoopBack',
                'rules'   => 'trim|required'
            ),
            array(
                'field'   => 'mac',
                'label'   => 'Mac Address',
                'rules'   => 'trim|required'
            )

        );

        $this->form_validation->set_rules($validation_config);

        $data = array();
        $data['router_info']     = $this->router_model->get_router_by_id($router_id);

        $data['frm_url']         = "routers/edit/" . $router_id . "/" . $page_no;

        $title                        = 'Edit Router';
        $data['ctrler']                = 'routers';
        $data['page_title']            = $title;
        $data['css_files']           = [];
        $data['js_files']            = ['bs-custom-file-input/bs-custom-file-input.min.js', 'bootstrap-switch/js/bootstrap-switch.min.js'];
        $data['readonly']            = "readonly";
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('edit-router', $data);
        } else {

            $arrRouterData['sapid']                = trim($this->input->post('sapid'));
            $arrRouterData['hostname']             = trim($this->input->post('hostname'));
            $arrRouterData['loopback']             = trim($this->input->post('loopback'));
            $arrRouterData['mac_address']          = trim($this->input->post('mac'));
            $arrRouterData['type']                 = trim($this->input->post('type'));
            $arrRouterData['flg_status']           = ($this->input->post('status') ? $this->input->post('status') : '0');
            $arrRouterData['updated_at']     = date('Y-m-d H:i:s');
            $this->router_model->update_router($arrRouterData, $router_id);


            $this->session->set_flashdata('success_msg', 'router has been updated successfully.');

            redirect(site_url('routers/lists/' . $page_no));
            exit;
        }
    }
    public function getAjaxRouters()
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

        $data['page']                 = get_pagination($numRows, $per_page, "admin/lists");
        $data['arrResult']            = $arrResult;
        $data['total']            = $numRows;
        echo json_encode($data);
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
    function delete($router_id = '', $page_no = '0')
    {

        $arrRouterData    = array(
            'flg_is_deleted' => 1,
            'updated_at' => date('Y-m-d H:i:s'),
        );
        $this->router_model->update_router($arrRouterData, $router_id);
        $this->session->set_flashdata('success_msg', 'Router has been deleted successfully.');
        redirect(site_url('routers/lists/' . $page_no));
        exit;
    }
    function deactivate($router_id = '', $page_no = '0')
    {
        $arrRouterData    = array(
            'flg_status' => 0,
            'updated_at' => date('Y-m-d H:i:s'),
        );
        $this->router_model->update_router($arrRouterData, $router_id);

        $this->session->set_flashdata('success_msg', 'Router has been deactivated successfully.');
        //TRACK USER Activity
        redirect(site_url('routers/lists/' . $page_no));
        exit;
    }
    function activate($router_id = '', $page_no = '0')
    {
        $arrRouterData    = array(
            'flg_status' => 1,
            'updated_at' => date('Y-m-d H:i:s'),
        );

        $this->router_model->update_router($arrRouterData, $router_id);
        $this->session->set_flashdata('success_msg', 'User has been activated successfully.');
        redirect(site_url('routers/lists/' . $page_no));
        exit;
    }
}
