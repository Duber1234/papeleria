<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller {

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
		 $head['usernm'] = "DUBER";
        $head['title'] = 'Clientes';
		$this->load->view('fixed/header', $head);
		$this->load->view('clientes/index');
		$this->load->view('fixed/footer');
	}
	public function agregar()
	{	$head['usernm'] = "DUBER";
        $head['title'] = 'Agregar Clientes';
		$this->load->view('fixed/header', $head);
		$this->load->view('clientes/agregar');
		$this->load->view('fixed/footer');
	}
	public function guardar(){
		
		foreach ($_POST as $key => $value) {
			$data[$key]=$value;
		}

		$this->db->insert("clientes",$data);

		echo json_encode(array('status' => 'Success', 'message' => 'Cliente Guardado'));
	}
	
	public function editar(){
		$data=array();
		$data['nombre']=$_POST['nombre_producto'];
		$data['cantidad']=$_POST['cantidad'];
		$data['precio_fabrica']=$_POST['precio_fabrica'];
		$data['precio_venta']=$_POST['precio_venta'];
		$this->db->update("productos",$data,array("id_producto"=>$_POST['id_prod']));
		echo json_encode(array("status"=>"ok"));
	}
	public function get_list_ajax(){
		$this->load->model("Clientes_model","Clientes");
        ini_set('memory_limit', '1024M');
		$list = $this->Clientes->get_datatables();
		$data = array();
		$no = $this->input->post('start');
		setlocale(LC_TIME, "spanish");

		foreach ($list as $key => $value) {            
				$no++;  
				$row = array();
				$row[]=$no;
				$row[]=$value->id;
				$row[]=$value->nombre_cl;
				$row[]=$value->tipo_documento;
				$row[]=$value->n_documento;
				$row[]=$value->direccion;		
				$row[]=$value->email;		
				$row[]=$value->celular1;		
				$row[]=$value->celular2;								
				$row[]=$value->celular3;								
				$row[]="Btn";
				$data[]=$row;

		}
			$output = array(
				"draw" => $_POST['draw'],
				"recordsTotal" => $this->Clientes->count_all(),
				"recordsFiltered" => $this->Clientes->count_filtered(),
				"data" => $data,
			);
			//output to json format
			echo json_encode($output);

	}
}
