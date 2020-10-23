<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Router_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_total_routers($content = array())
    {
        $this->db->select("id");
        $this->db->from('router');
        if ($content['sapid']) {
            $this->db->where('sapid', $content['sapid']);
        }
        if ($content['loopback1']) {
            $this->db->where("loopback >=", $content['loopback1']);
        }
        if ($content['loopback2']) {
            $this->db->where("loopback <=", $content['loopback2']);
        }
        if ($content['hostname']) {
            $this->db->like('hostname', $content['hostname'], 'both');
        }
        if ($content['mac_address']) {
            $this->db->where('mac_address', $content['mac_address']);
        }
        if ($content['type']) {
            $this->db->where('type', $content['type']);
        }

        if ($content['status']) {
            $this->db->where('flg_status', (int)$content['status']);
        }
        $this->db->where('flg_is_deleted', 0);
        $query    = $this->db->get();
        return $query->num_rows();
    }

    public function get_routers($limit = '10', $page_num = '0', $content = array())
    {
        $start = ($page_num  == NULL) ? 0 : ($page_num * $limit) - $limit;
        if ($start < 0) {
            $start = 0;
        }

        $this->db->select('*');
        $this->db->from('router');
        if ($content['status']) {
            $this->db->where('flg_status', (int)$content['status']);
        }
        if ($content['loopback1']) {
            $this->db->where("loopback >=", $content['loopback1']);
        }
        if ($content['loopback2']) {
            $this->db->where("loopback <=", $content['loopback2']);
        }
        if ($content['sapid']) {
            $this->db->where('sapid', $content['sapid']);
        }
        if ($content['hostname']) {
            $this->db->where('hostname', $content['hostname']);
        }
        if ($content['mac_address']) {
            $this->db->where('mac_address', $content['mac_address']);
        }
        if ($content['type']) {
            $this->db->where('type', $content['type']);
        }
        $this->db->where('flg_is_deleted', 0);
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {

            return $query->result_array();
        }

        return false;
    }
    public function get_router_by_id($id = '')
    {
        $this->db->from('router');
        $this->db->where('id', (int)$id);
        $this->db->where('flg_is_deleted', 0);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {

            return $query->row_array();
        }

        return false;
    }
    public function chk_is_exists($column_name, $value = '')
    {
        $value = $this->db->escape_str($value);
        $this->db->select('id');
        $this->db->from('router');
        $this->db->where($column_name, $value);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $arrData =  $query->row_array();
            return $arrData['id'];
        }
        return 0;
    }

    public function add_router($arrData = array())
    {
        $this->db->insert('router', $arrData);
        $id = $this->db->insert_id();
        return $id;
    }
    public function update_router($arrData = array(), $routerid = 0)
    {
        $this->db->where('id', $routerid);
        $this->db->update('router', $arrData);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return $this->db->error();
        }
    }
    public function update_router_by_loop($arrData = array(), $loopback = 0)
    {
        $this->db->where('loopback', $loopback);
        $this->db->update('router', $arrData);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return $this->db->error();
        }
    }
}
