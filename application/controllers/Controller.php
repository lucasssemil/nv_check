<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller extends CI_Controller {

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
	 
	public function __construct(){
		parent::__construct();
		$this->load->model('checker_model');
        $this->load->helper('array');
	}
	
	public function index()
	{
		$this->load->helper('url');
        $data["totalmeja"] = $this->checker_model->getCountTable()[0]['total'];
        $data["totalorder"] = $this->checker_model->getCountOrder()[0]['total'];
        $data["durasimakanan"] = $this->checker_model->getAllDurasi();
        //print_r($data["durasimakanan"]);
        $this->load->view('home',$data);
		//$this->load->view('mejakotak');
		//$data = $this->checker_model->get_table();
	}
	
	public function cashier()
	{
		$this->load->helper('url');
		$this->load->view('cashier');
	}
	
	public function checker()
	{
		$this->load->helper('url');
		$this->load->view('checker_testjson');
	}
	
	public function insert_table()
	{	
		// $this->input->post("")
		$kodetrans = $this->input->post("kodetrans");
		$tglomset = $this->input->post("tglomset");
		$nomormeja = $this->input->post("nomormeja");
		$this->checker_model->insert_table($kodetrans, $tglomset, $nomormeja);
	}
	
	public function get_table(){
		$data = $this->checker_model->get_table();
		echo json_encode($data);
        //echo "sfsdf";
        //$json = json_decode($data, true);
        //echo ($json['kodetrans']);
	}
    
    public function update_status($hasil)
    {
       // $data = explode("/",$this->input->post('hasil'));//data[0]=finish/unfinish, data[1]=kodetransaksi
        
        $data = explode(".",$hasil);
        for($i=0;$i<count($data);$i++)
        {
            $h = explode("_",$data[$i]);//$h[0]=f/u,h[1]=kodetrans
            if($h[0]=="f")
            {
                $this->checker_model->update_status($h[1],'1');
            }
            else
            {
                $this->checker_model->update_status($h[1],'0');
            }
            
        }
        
        echo json_encode($data);
        
        
       
        
    }
    
    public function get_menu($nomeja)
    {
        $data = $this->checker_model->get_menu($nomeja);
        echo json_encode($data);
    }
}
?>