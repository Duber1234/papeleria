<?php
/**
 * Neo Billing -  Accounting,  Invoicing  and CRM Software
 * Copyright (c) Rajesh Dukiya. All Rights Reserved
 * ***********************************************************************
 *
 *  Email: support@ultimatekode.com
 *  Website: https://www.ultimatekode.com
 *
 *  ************************************************************************
 *  * This software is furnished under a license and may be used and copied
 *  * only  in  accordance  with  the  terms  of such  license and with the
 *  * inclusion of the above copyright notice.
 *  * If you Purchased from Codecanyon, Please read the full License from
 *  * here- http://codecanyon.net/licenses/standard/
 * ***********************************************************************
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Ventas_model extends CI_Model
{

    var $table = 'ventas'; 
    var $column_order = array('fecha','id_venta', 'cantidad','id_producto','nombre','precio_fabrica', 'precio_venta', 'ganancia'); //set column field database for datatable orderable
    var $column_search =  array('fecha','id_venta', 'cantidad','id_producto','nombre','precio_fabrica', 'precio_venta', 'ganancia'); //Establecer base de datos de campo de columna para la tabla de datos
    var $order = array('id_venta' => 'desc'); // default order
   
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
private function _get_datatables_query($id = '')
    {
         
       $this->db->from($this->table);            
         $i=0;
        foreach ($this->column_search as $item) // loop column 
        {
            $search = $this->input->post('search');
            $value = $search['value'];
            if ($value) // if datatable send POST for search
            {
                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $value);
                } else {
                    $this->db->or_like($item, $value);
                }

                if (count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
        $search = $this->input->post('order');
        if ($search) // here order processing
        {
            $this->db->order_by($this->column_order[$search['0']['column']], $search['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

     function count_filtered($id)
    {
       
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
     public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
    function get_datatables($id = '')
    {
       /* if ($id > 0) {
            $this->_get_datatables_query($id);
        } else {
            $this->_get_datatables_query();
        }*/

        $this->_get_datatables_query();
        $this->db->limit($this->input->post('length'), $this->input->post('start'));
        $query = $this->db->get();
        return $query->result();
    }  
}