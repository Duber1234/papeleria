<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ventas extends CI_Controller {

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
        $this->load->model('ventas_model', 'ventas');
       
    }

    public function index()
	{
		$head['usernm'] = "DUBER";
        $head['title'] = 'Ventas';
        //$usuario=$this->db->get_where("usuarios",array("id_usuario"=>"1"))->row();
        //$data['mostrar_precio_fabrica']=$usuario->precio_fabrica;
		$this->load->view('fixed/header', $head);
		$this->load->view('ventas/ventas');
		$this->load->view('fixed/footer');
	}

	public function load_list()
    {
        $list = $this->ventas->get_datatables(0);
        $data = array();
        $no = $this->input->post('start');
        //$usuario=$this->db->get_where("usuarios",array("id_usuario"=>"1"))->row();
        setlocale(LC_TIME, "spanish");
        foreach ($list as $venta) {
            $no++;

            $row = array();
            $x= new DateTime($venta->fecha);
           	$row[] = utf8_encode(strftime("%A,".$x->format("d")." de %B del ".$x->format("Y"), strtotime($venta->fecha)))."-<u>".$x->format("g").":".$x->format("s")." ".$x->format("a")."</u>";
            $producto=$this->db->get_where("productos",array("id_producto"=>$venta->id_producto))->row();
            
            $row[] = $venta->cantidad;
			$row[] = $venta->id_producto;
			$row[]= $producto->nombre;
			$row[] = "$ ".number_format($venta->precio_fabrica,0,",",".");
			$row[] = "$ ".number_format($venta->precio_venta,0,",",".");
		$val=$venta->precio_venta-$venta->precio_fabrica;
			$row[] = "$ ".number_format($val,0,",",".");
			
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->ventas->count_all(0),
            "recordsFiltered" => $this->ventas->count_filtered(0),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

}