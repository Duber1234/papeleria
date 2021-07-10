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

	public function __construct()
    {
        parent::__construct();
        $this->load->model('productos_model', 'productos');
       
    }
	public function index()
	{
		$head['usernm'] = "DUBER";
        $head['title'] = 'Principal';
        $usuario=$this->db->get_where("usuarios",array("id_usuario"=>"1"))->row();
        $data['mostrar_precio_fabrica']=$usuario->precio_fabrica;
		$this->load->view('fixed/header', $head);
		$this->load->view('welcome_message.php',$data);
		$this->load->view('fixed/footer');
	}

	public function load_list()
    {
        $list = $this->productos->get_datatables(0);
        $data = array();
        $no = $this->input->post('start');
        $usuario=$this->db->get_where("usuarios",array("id_usuario"=>"1"))->row();
        foreach ($list as $producto) {
            $no++;

            $row = array();
            $row[] = $no;
            $row[] = $producto->id_producto;
			$row[] = $producto->nombre;
			$row[] = '<span id="cantidad-id-'.$producto->id_producto.'">'.$producto->cantidad.'</span>';
			if($usuario->precio_fabrica==1){ 
				$row[] = '<span id="precio-fabrica-id-'.$producto->id_producto.'">$ '.number_format($producto->precio_fabrica,0,",",".").'</span>';
			}
			$row[] = '<span id="precio-venta-id-'.$producto->id_producto.'">$ '.number_format($producto->precio_venta,0,",",".").'</span>';
			
			$row[] = $producto->foto;
            //$row[] = '<a href="customers/view?id=' . $customers->id . '">' . $customers->name ." ". $customers->unoapellido. '</a>';
			$row[] = '<a style="color:white" data-id-producto="'.$producto->id_producto.'" onclick="vender1(this)" class="btn btn-info btn-sm"><span class="icon-usd"></span>&nbspVender 1</a>&nbsp<a href="ventas/vender1?id=' . $producto->id_producto . '" class="btn btn-info btn-sm"><span class="icon-shopping-cart"></span>&nbspAgregar</a>';
			
            //$row[] = $customers->nomenclatura . ' ' . $customers->numero1 . $customers->adicionauno.' Nº '.$customers->numero2.$customers->adicional2.' - '.$customers->numero3;
			//$row[] = '<span class="st-'.$customers->usu_estado. '">' .$customers->usu_estado. '</span>';
            //$row[] = '<a href="customers/view?id=' . $customers->id . '" class="btn btn-info btn-sm"><span class="icon-eye"></span>  '.$this->lang->line('View').'</a> <a href="customers/edit?id=' . $customers->id . '" class="btn btn-primary btn-sm"><span class="icon-pencil"></span>  '.$this->lang->line('Edit').'</a> <a href="#" data-object-id="' . $customers->id . '" class="btn btn-danger btn-sm delete-object"><span class="icon-bin"></span></a>';
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->productos->count_all(0),
            "recordsFiltered" => $this->productos->count_filtered(0),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }
}
