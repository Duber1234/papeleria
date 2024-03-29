<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productos extends CI_Controller {

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
        $head['title'] = 'Customers';
		$this->load->view('fixed/header', $head);
		$this->load->view('productos/index');
		$this->load->view('fixed/footer');
	}
	public function agregar()
	{	$head['usernm'] = "DUBER";
        $head['title'] = 'Agregar Productos';
		$this->load->view('fixed/header', $head);
		$this->load->view('productos/agregar');
		$this->load->view('fixed/footer');
	}
	public function guardar(){
		$data['nombre']=ucwords(strtolower($this->input->post('nombre_producto')));
		$data['codigo']=$this->input->post('codigo_producto');
		$data['descripcion']=$this->input->post('descripcion');
		$data['precio_fabrica']=str_replace(".", "", $this->input->post('precio_fabrica')); 
		$data['precio_venta']=str_replace(".", "", $this->input->post('precio_venta'));
		$data['cantidad']=$this->input->post('cantidad');

		$pr=$this->db->get_where('productos',array("codigo"=>$data['codigo']))->row();
		if (isset($pr)) {
			echo json_encode(array('status' => 'Error', 'message' => "el codigo de producto ya existe"));	
		}else{
			$this->db->insert("productos",$data);

			echo json_encode(array('status' => 'Success', 'message' => 'Producto Guardado'));	
		}
		
	}
	public function vender1(){
		$cantidad_producto=0;
		$producto = $this->db->get_where("productos",array("id_producto"=>$_POST['id_pr']))->row();
		$data['cantidad']=$producto->cantidad-1;		
		$cantidad_producto=$data['cantidad'];
		$this->db->update("productos",$data,array("id_producto"=>$producto->id_producto));
		$data=array();
		$data['cantidad']=1;
		$data['precio_fabrica']=$producto->precio_fabrica;
		$data['precio_venta']=$producto->precio_venta;
		$fecha =new DateTime();
		$data['fecha']=$fecha->format("Y-m-d H:i:s");
		$data['cliente']="Cliente";
		$data['id_producto']=$producto->id_producto;
		$data['nombre_producto']=$producto->nombre;
		$data['codigo']=$producto->codigo;
		$data['descripcion']=$producto->descripcion;
		$data['cliente']=$_POST['id_cl'];
		$this->db->insert("ventas",$data);

		echo json_encode(array('status' => 'Success','cantidad_producto'=>$cantidad_producto, 'message' => 'Se vendio <b><i>'.$producto->nombre."</i></b>, <b>1</b> cantidad "));
	}
	public function desabilitar_precio_fabrica(){
		$data['precio_fabrica']=0;
		if($_POST['mostrar_precio_fabrica']=="true"){
			$data['precio_fabrica']=1;
		}else{
			$data['precio_fabrica']=0;
		}
		$this->db->update("usuarios",$data,array("id_usuario"=>1));
		echo json_encode(array("status"=>"enviado"));
	}
	public function prox_ped(){
		$id_producto=$this->input->post('id');
		$sel=$this->input->post('sel');
		if($sel=="false"){
			$sel=null;
		}else{
			$sel=1;
		}
		$this->db->update("productos",array("prox_pedido"=>$sel),array("id_producto"=>$id_producto));
	}
	public function get_prod(){

		$producto =$this->db->get_where("productos",array("id_producto"=>$_POST['id']))->row();
		echo json_encode($producto);
	}
	public function editar(){
		$data=array();
		$data['nombre']=$_POST['nombre_producto'];
		$data['cantidad']=$_POST['cantidad'];
		$data['precio_fabrica']=$_POST['precio_fabrica'];
		$data['precio_venta']=$_POST['precio_venta'];
		$data['codigo']=$_POST['codigo_producto'];
		$data['descripcion']=$_POST['descripcion'];
		$pr=$this->db->get_where('productos',array("codigo"=>$data['codigo'],"id_producto!="=>$_POST['id_prod']))->row();
		if (isset($pr)) {
			echo json_encode(array('status' => 'Error', 'message' => "el codigo de producto ya existe"));	
		}else{
			$this->db->update("productos",$data,array("id_producto"=>$_POST['id_prod']));
			echo json_encode(array("status"=>"ok"));
		}
	}
public function delete_i(){
	$id = $this->input->post('deleteid');
	if($this->db->delete('productos', array('id_producto' => $id))){
		echo json_encode(array('status' => 'Success', 'message' => 'eliminado'));
	}else{
		echo json_encode(array('status' => 'Error', 'message' => $this->lang->line('ERROR')));
	}
}

}
