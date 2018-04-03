<?php

class checker_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	public function get_table(){
		$this->db->select("kodetrans,tanggalomset,nomormeja,namamenurecipe,jumlah,durasi,jamorder,jamtarget,status,jamfinish");
        $this->db->order_by("nomormeja, namamenurecipe");
		return $this->db->get("t_orderchecker")->result_array();
	}
    
    public function get_multimeja($kodemenu)
    {
        $query = $this->db->query("SELECT NOMORMEJA,KODETRANS, count(kodetrans) as jumlah from t_orderchecker where KODEMENURECIPE='".$kodemenu."' and status=0 group by KODETRANS");
        return $query->result_array();
        
    }
    
    public function get_menu($nomeja)
    {
        $query = $this->db->query("select * from t_orderchecker where nomormeja='".$nomeja."' order by namamenurecipe");
        return $query->result_array();
    }
    
    public function get_progress($nomeja)
    {
        $this->db->select("kodetrans,tanggalomset,nomormeja,namamenurecipe,jumlah,durasi,jamorder,jamtarget,status,jamfinish");
        $this->db->where('nomormeja',$nomeja);
        $this->db->order_by("nomormeja, namamenurecipe");
		return $this->db->get("t_orderchecker")->result_array();
    }
    
    public function get_allprogress(){
        $this->db->select("kodetrans,tanggalomset,nomormeja,namamenurecipe,jumlah,durasi,jamorder,jamtarget,status,jamfinish");
        $this->db->where('status','0');
        $this->db->order_by("nomormeja, namamenurecipe");
		return $this->db->get("t_orderchecker")->result_array();
    }
    
    public function getSysdate()
    {
        $query = $this->db->query("SELECT DATE_FORMAT(SYSDATE(),'%H:%i:%s') as tglskrg");
        return $query->result_array();
    }
    
    public function update_status($kodetrans,$stat,$tgl)
    {
        $data = array(
        'status' => $stat,
        'jamfinish'=>$tgl
        );
        $this->db->where('kodetrans', $kodetrans);
        $this->db->update('t_orderchecker', $data);
    }
	
    public function update_statusmulti($kodetrans,$nomeja,$stat,$tgl)
    {
        $data = array(
            'status'=>$stat,
            'jamfinish'=>$tgl
        );
        
        $this->db->where('kodetrans',$kodetrans);
        $this->db->where('nomormeja',$nomeja);
        $this->db->update('t_orderchecker',$data);
    }
	
	public function insert_table($kodetrans, $tglomset, $nomormeja)
	{
		// Generate ID
		// $ID = "PL" . strtoupper(substr($name, 0, 2));
		// $this->db->select("substring(kode_pelanggan, 5) AS \"num\"");
		// $this->db->where("substring(kode_pelanggan, 1, 4) = ", $ID);
		// $this->db->order_by("num", "DESC");
		// $num = $this->db->get("pelanggan")->row_array()["num"] + 1;
		// $ID .= str_pad($num, 3, "0", STR_PAD_LEFT);

		// Insert
		$data = array(
			'kodetrans' => $kodetrans,
			'tanggalomset' => $tglomset,
			'nomormeja' => $nomormeja
		);
		$this->db->insert("t_orderchecker",$data);
		return ($this->db->affected_rows() > 0);
	}
    
    public function getCountTable()
    {
        $query = $this->db->query("select count(*) as total from(select count(*) as a from t_orderchecker group by NOMORMEJA) as b");
        return $query->result_array();
    }
    
    public function getCountFinishOrder()
    {
        $query = $this->db->query("select count(*) as total from t_orderchecker where status=1");
        return $query->result_array();
    }
    
    public function getCountOrder()
    {
        $query = $this->db->query("select count(*) as total from t_orderchecker");
        return $query->result_array();
    }
    
    public function getAllDurasi()
    {
        $query = $this->db->query("select jamorder,durasi from t_orderchecker order by nomormeja");
        return $query->result_array();
    }
    
}
?>