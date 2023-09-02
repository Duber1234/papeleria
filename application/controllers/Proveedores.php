<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proveedores extends CI_Controller {

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
        $head['title'] = 'Proveedores';
		$this->load->view('fixed/header', $head);
		$this->load->view('proveedores/index');
		$this->load->view('fixed/footer');
	}
	public function agregar()
	{	$head['usernm'] = "DUBER";
        $head['title'] = 'Agregar Proveedores';
		$this->load->view('fixed/header', $head);
		$this->load->view('proveedores/agregar');
		$this->load->view('fixed/footer');
	}
	public function guardar(){
		
		foreach ($_POST as $key => $value) {
			$data[$key]=$value;
		}
		$data['fecha_entrega']=(new DateTime($data['fecha_entrega']))->format("Y-m-d");
		$this->db->insert("proveedores",$data);

		echo json_encode(array('status' => 'Success', 'message' => 'Proveedor Guardado'));
	}
	
	public function get_list_ajax(){
		$this->load->model("Proveedores_model","Proveedores");
        ini_set('memory_limit', '1024M');
		$list = $this->Proveedores->get_datatables();
		$data = array();
		$no = $this->input->post('start');
		setlocale(LC_TIME, "spanish");

		foreach ($list as $key => $value) {            
				$no++;  
				$row = array();
				$row[]=$no;
				$row[]=$value->id;
				$row[]=$value->nombre;
				$row[]=$value->tipo_documento;
				$row[]=$value->n_documento;
				$row[]=$value->direccion;		
				$row[]=$value->email;		
				$row[]=$value->celular1;		
				$row[]=$value->celular2;								
				$row[]=$value->celular3;
				if($value->fecha_entrega=="0000-00-00"){
						$row[]="No";
				}else{
					$row[]=(new DateTime($value->fecha_entrega))->format("d-m-Y");									
				}
				
				$row[]="Btn";
				$data[]=$row;

		}
			$output = array(
				"draw" => $_POST['draw'],
				"recordsTotal" => $this->Proveedores->count_all(),
				"recordsFiltered" => $this->Proveedores->count_filtered(),
				"data" => $data,
			);
			//output to json format
			echo json_encode($output);

	}
}
