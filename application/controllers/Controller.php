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
		$this->load->helper('url');
		$this->load->library('session');
	}
	
	public function changelokasi($kodelokasi)
	{
		$this->session->set_userdata('kodelokasi',$kodelokasi);
		redirect("Controller/index");
		redirect("Controller/get_table");
	}
	
	public function index()
	{
		$this->load->helper('url');
        $data["totalorder"] = $this->checker_model->getCountOrder()[0]['total'];
        $data["totalfinishorder"] = $this->checker_model->getCountFinishOrder()[0]['total'];
		$data['kodelokasi'] = $this->checker_model->get_kodelokasi();
        //print_r($data["durasimakanan"]);
        
        $this->load->view('home',$data);
		//$this->load->view('mejakotak');
		//$data = $this->checker_model->get_table();
	}
	//buat demo start
    public function inserttorder()
    {
        $kodetrans = $this->input->post('kodetrans');
        $nomeja = $this->input->post('nomeja');
        $totalcust = $this->input->post('totalcustomer');
        $this->checker_model->inserttorder($kodetrans,$nomeja,$totalcust);
        echo "<script> alert('INSERT BERHASIL')</script>";
        redirect("Controller/cashier");
    }
    
    public function inserttorderdtl()
    {

        $kodetrans = $this->input->post('kodetrans');
        $kodemenurecipe = $this->input->post('makanan');
        $order = $this->checker_model->getorder($kodetrans);
        $urutan = $this->checker_model->geturutan();
        if($urutan[0]["urutan"]==null)
        {
            $urutan[0]["urutan"]=0;
        }
        $this->checker_model->inserttorderdtl($order[0]['KODELOKASI'],$kodetrans,$order[0]['TGLTRANS'],$urutan[0]["urutan"],$kodemenurecipe);
        echo "<script> alert('INSERT BERHASIL')</script>";
        redirect("Controller/cashier");
    }
    
    public function insertmodifier()
    {
        $nourut = $this->input->post('m_urutan');
        $data = explode("-",$nourut);//$data[0]=noheader,$data[1]=KODETRANS
        $kodemenurecipe = $this->input->post('kodemodifier');
        $order = $this->checker_model->getorder($data[1]);
        $urutan = $this->checker_model->geturutan();
        $this->checker_model->insertmodifier($order[0]['KODELOKASI'],$order[0]['KODETRANS'],$order[0]['TGLTRANS'],$urutan[0]["urutan"],$kodemenurecipe,$data[0]);
        echo "<script> alert('INSERT BERHASIL')</script>";
        redirect("Controller/cashier");
     
    }
    
	public function cashier()
	{
        $data["torder"] = $this->checker_model->gettorder();
        $data["torderdtl"] = $this->checker_model->gettorderdtl();
        $data["makanan"]= $this->checker_model->getmakanan();
        $data["modifier"]= $this->checker_model->getmodifier();
        $data["ordermodifier"]= $this->checker_model->getordermodif();
		$this->load->helper('url');
		$this->load->view('cashier',$data);
	}
	
    
    //buat demo end
	public function checker()
	{
		$this->load->helper('url');
		$this->load->view('checker');
	}
	
    public function insert_torder()
    {
        redirect("insert_torder");
    }
    
	public function insert_table()
	{	
		// $this->input->post("")
	}
	
	public function get_table(){
		$data['datameja'] = $this->checker_model->get_table();
        $data['dataheader'] = $this->checker_model->getDataHeader();
        $data['totalorang'] = $this->checker_model->get_jumlahorang();
		$data['kodelokasi'] = $this->checker_model->get_kodelokasi();
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
            $h = explode("_",$data[$i]);//$h[0]=f/u,h[1]=kodetrans,h[2]=kodelokasi,h[3]=tglomzet,h[4]=urutan
            if($h[0]=="f")
            {
                $this->checker_model->update_status($h[1],$h[2],$h[3],$h[4],'1',$tgl[0]['tglskrg']);
            }
            else
            {
                $this->checker_model->update_status($h[1],$h[2],$h[3],$h[4],'0','00:00:00');
            }
            
        }
        
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
            $h = explode("_",$data[$i]);//$h[0]=f/u,h[0]=kodetrans,h[1]=kodelokasi,h[2]=tglomzet,h[3]=urutan,h[4]=nomeja
            $this->checker_model->update_status($h[0],$h[1],$h[2],$h[3],'1',$tgl[0]['tglskrg']);
            if($meja[$ctr]!=$h[4])
            {
                $ctr=$ctr+1;
                $meja[$ctr]=$h[4];
            }
        }
        $meja["totalorder"] = $this->checker_model->getCountOrder()[0]['total'];
        $meja["totalfinishorder"] = $this->checker_model->getCountFinishOrder()[0]['total'];
        echo json_encode($meja);
    }
    
    public function get_menu($nomeja)
    {
        $data = $this->checker_model->get_menu($nomeja);
        echo json_encode($data);
    }
    
    public function get_multimeja($kodemenu)
    {
        $data = $this->checker_model->get_multimeja($kodemenu);
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
                $data[$i]["listmeja"] = $data[$i]["listmeja"].", ".$test[$j]["NOMORMEJA"];   
            }
            $data[$i]["listmeja"] = substr($data[$i]["listmeja"],2);
        }
        
        echo json_encode($data);
    }
    
    public function getReport2()
    {
        $data = $this->checker_model->getReport2();
        echo json_encode($data);
    }
    
    public function getReport3()
    {
        $data = $this->checker_model->getReport3();
        for($i=0;$i<count($data);$i++){
            //$data["namamenu"] = $this->checker_model->getNamaMenu($data[$i]["KODETRANS"]);
        }
        echo json_encode($data);
    }
    
    public function getReport4()
    {
        $data = $this->checker_model->getReport4_1();
        for($i=0;$i<count($data);$i++)
        {
            $data[$i]["STATUS"] = $this->checker_model->getReport4_2($data[$i]["KODELOKASI"],$data[$i]["KODETRANS"]);
        }
        echo json_encode($data);
    }
}
?>