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
        $this->load->library('table');
	}
	
	public function index()
	{
		$this->load->helper('url');
        $data["totalmeja"] = $this->checker_model->getCountTable()[0]['total'];
        $data["totalorder"] = $this->checker_model->getCountOrder()[0]['total'];
        $data["totalfinishorder"] = $this->checker_model->getCountFinishOrder()[0]['total'];
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
	
    public function insert_torder()
    {
        redirect("insert_torder");
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
		$data['datameja'] = $this->checker_model->get_table();
        $data['dataheader'] = $this->checker_model->getDataHeader();
        $data['datatotalfinish'] = $this->checker_model->getCountFinish();
		echo json_encode($data);
        //echo "sfsdf";
        //$json = json_decode($data, true);
        //echo ($json['kodetrans']);
	}
    
        
    public function get_allprogress()
    {
        $data = $this->checker_model->get_allprogress();
        echo json_encode($data);
    }
    
    public function get_progress($nomeja)
    {
        $data = $this->checker_model->get_progress($nomeja);
        echo json_encode($data);
    }
    public function update_status($hasil)
    {
       // $data = explode("/",$this->input->post('hasil'));//data[0]=finish/unfinish, data[1]=kodetransaksi
        
        $data = explode(".",$hasil);
        $tgl = $this->checker_model->getSysdate();
        
        for($i=0;$i<count($data);$i++)
        {
            $h = explode("_",$data[$i]);//$h[0]=f/u,h[1]=kodetrans
            if($h[0]=="f")
            {
                $this->checker_model->update_status($h[1],'1',$tgl[0]['tglskrg']);
            }
            else
            {
                $this->checker_model->update_status($h[1],'0','00:00:00');
            }
            
        }
        
        $data["totalmeja"] = $this->checker_model->getCountTable()[0]['total'];
        $data["totalorder"] = $this->checker_model->getCountOrder()[0]['total'];
        $data["totalfinishorder"] = $this->checker_model->getCountFinishOrder()[0]['total'];
        echo json_encode($data);
        
    }
    
    public function update_statusmulti($hasil)
    {
        $data = explode(".",$hasil);
        $meja = array();
        $meja[0]="";
        $ctr=0;
        $tgl = $this->checker_model->getSysdate();
        for($i=0;$i<count($data);$i++)            
        {
            $h = explode("_",$data[$i]);//$h[0]=kodetransasksi,h[1]==nomormeja
            $this->checker_model->update_statusmulti($h[0],$h[1],'1',$tgl[0]['tglskrg']);
            if($meja[$ctr]!=$h[1])
            {
                $ctr=$ctr+1;
                $meja[$ctr]=$h[1];
            }
        }
        $meja["totalmeja"] = $this->checker_model->getCountTable()[0]['total'];
        $meja["totalorder"] = $this->checker_model->getCountOrder()[0]['total'];
        $meja["totalfinishorder"] = $this->checker_model->getCountFinishOrder()[0]['total'];
        echo json_encode($meja);
    }
    
    public function get_menu($nomeja)
    {
        $data = $this->checker_model->get_menu($nomeja);
        echo json_encode($data);
    }
    
    public function get_multimeja($kodemenu,$sts)
    {
        $data = $this->checker_model->get_multimeja($kodemenu,$sts);
        echo json_encode($data);
    }
    
    public function getReport1()
    {
        $data = $this->checker_model->getAllmenu();
        
        for($i=0;$i<count($data);$i++)
        {
            $test = $this->checker_model->getReportMeja($data[$i]["KODEMENURECIPE"]);
            $data[$i]["listmeja"]="";
            for($j=0;$j<count($test);$j++)
            {
                $data[$i]["listmeja"] = $data[$i]["listmeja"].",".$test[$j]["NOMORMEJA"];   
            }
            $data[$i]["listmeja"] = substr($data[$i]["listmeja"],1);
        }
        
        echo json_encode($data);
    }
}
?>