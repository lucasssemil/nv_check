<?php

class checker_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	public function get_table(){
        
        $query = $this->db->query("select a.*,b.nomormeja from torderchecker a, torder b where a.kodelokasi=b.kodelokasi and a.kodetrans=b.kodetrans and a.tglomzet=b.tglomzet order by cast(b.NOMORMEJA as unsigned), a.namamenurecipe");
        return $query->result_array();
        
	}
    
    public function get_jumlahorang()
    {
        $query =$this->db->query("select sum(JUMLAHORANG) as jumlah from torder");
        return $query->result();
    }
    
    public function get_multimeja($kodemenu)
    {
        $query = $this->db->query("SELECT b.NOMORMEJA,a.* from torderchecker a, torder b where a.KODEMENURECIPE='".$kodemenu."' and a.status= 0 and a.KODELOKASI=b.KODELOKASI and a.KODETRANS=b.KODETRANS and a.TGLOMZET=b.TGLOMZET");
        return $query->result_array();
    }
    
    public function get_menu($nomeja)
    {
        $query = $this->db->query("select a.*,b.NOMORMEJA from torderchecker a, torder b where b.nomormeja='".$nomeja."' and a.KODELOKASI=b.KODELOKASI and a.KODETRANS=b.KODETRANS and a.TGLOMZET=b.TGLOMZET order by a.namamenurecipe");
        return $query->result_array();
    }
    
    public function get_progress($nomeja)
    {
        $query = $this->db->query("select a.kodetrans, a.tglomzet, b.nomormeja, a.namamenurecipe, a.durasi, a.jamorder, a.jamtarget, a.status, a.jamfinish,a.URUTANCHECKER,a.URUTAN from torderchecker a, torder b where b.nomormeja='".$nomeja."' and a.KODELOKASI=b.KODELOKASI and a.KODETRANS=b.KODETRANS and a.TGLOMZET=b.TGLOMZET order by cast(b.NOMORMEJA as unsigned), a.namamenurecipe");
        return $query->result_array();
    }
    
    public function get_allprogress(){
        $query = $this->db->query("select a.kodetrans,a.tglomzet,b.nomormeja,a.namamenurecipe,a.durasi,a.jamorder,a.jamtarget,a.status,a.jamfinish from torderchecker a, torder b where a.status='0' and a.KODELOKASI=b.KODELOKASI and a.KODETRANS=b.KODETRANS and a.TGLOMZET=b.TGLOMZET and a.urutanchecker=-1 order by  cast(b.NOMORMEJA as unsigned), a.namamenurecipe");
		return $query->result_array();
    }
    
    public function getSysdate()
    {
        $query = $this->db->query("SELECT DATE_FORMAT(SYSDATE(),'%H:%i:%s') as tglskrg");
        return $query->result_array();
    }
    
    public function update_status($kodetrans,$kodelokasi,$tglomzet,$urutan,$stat,$tgl)
    {   
        $data = array(
            'status' => $stat,
            'jamfinish'=>$tgl
        );
        $this->db->where('kodetrans', $kodetrans);
        $this->db->where('kodelokasi', $kodelokasi);
        $this->db->where('tglomzet', $tglomzet);
        $this->db->where('urutan', $urutan);
        $this->db->update('torderchecker', $data);
    }
	
    public function update_statusmulti($kodetrans,$nomeja,$stat,$tgl)
    {
        $query = $this->db->query("update torderchecker a, torder b set a.STATUS='".$stat."', a.jamfinish='".$tgl."' where b.NOMORMEJA=1 and b.KODELOKASI=a.KODELOKASI and a.KODETRANS=b.KODETRANS and a.TGLOMZET=b.TGLOMZET and a.kodelokasi='".$kodelokasi."' and a.kodetrans='".$kodetrans."' and a.tglomzet='".$tglomzet."' and a.urutan='".$urutan."'");
		return $query->result_array();
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
	}
    
    
    public function getDataHeader()
    {
        $query = $this->db->query("SELECT a.jamorder as jammasuk, count(a.KODEMENURECIPE) as total,a.kodetrans  FROM torderchecker a, torder b where a.KODELOKASI=b.KODELOKASI and a.KODETRANS=b.KODETRANS and a.TGLOMZET=b.TGLOMZET and URUTANCHECKER=-1 group by b.NOMORMEJA");
        return $query->result_array();
    }
    
    public function getCountFinishOrder()
    {
        $query = $this->db->query("select count(*) as total from torderchecker where status=1");
        return $query->result_array();
    }
    
    public function getCountFinish()
    {
        $query = $this->db->query("select count(a.kodemenurecipe) as totalfinish,b.NOMORMEJA from torderchecker a, torder b where a.status=1 and a.KODELOKASI=b.KODELOKASI and a.KODETRANS=b.KODETRANS and a.TGLOMZET=b.TGLOMZET group by b.nomormeja");
        return $query->result_array();
    }
    
    public function getCountOrder()
    {
        $query = $this->db->query("select count(*) as total from torderchecker where urutanchecker=-1");
        return $query->result_array();
    }
    
    
    public function getAllMenu(){
        $query = $this->db->query("select KODEMENURECIPE, NAMAMENURECIPE,count(NAMAMENURECIPE) as QTY from torderchecker where URUTANCHECKER=-1 group by KODEMENURECIPE order by NAMAMENURECIPE ");
        return $query->result_array();
    }
    
    public function getReportMeja($kodemenu)
    {
        $query = $this->db->query("select distinct(b.NOMORMEJA) as NOMORMEJA from torderchecker a, torder b where a.KODEMENURECIPE='".$kodemenu."' and a.KODELOKASI=b.kodelokasi and a.KODETRANS= b.kodetrans and a.TGLOMZET=b.TGLOMZET order by cast(b.NOMORMEJA as unsigned)");
        return $query->result_array();
    }
    
    public function getReport2()
    {
        $query = $this->db->query("select a.NAMAMENURECIPE, b.NOMORMEJA, a.JAMORDER, a.DURASI from torderchecker a, torder b where a.URUTANCHECKER=-1 and a.KODELOKASI=b.KODELOKASI and a.KODETRANS=b.KODETRANS and a.TGLOMZET=b.TGLOMZET ORDER BY a.NAMAMENURECIPE, a.JAMORDER");
        return $query->result_array();
    }
    
}
?>