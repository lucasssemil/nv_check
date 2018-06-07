<?php

class checker_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
	}
	
	public function get_kodelokasi()
	{
		$query = $this->db->query("SELECT DISTINCT(KODELOKASI) FROM torder");
		return $query->result_array();
	}
	
	public function get_table(){
        $kodelokasi = $this->session->userdata('kodelokasi');
		if($kodelokasi=="" || $kodelokasi==null)
		{
			$kodelokasi="LOK001";
			$this->session->set_userdata('kodelokasi','LOK001');
		}
        $query = $this->db->query("select a.*,b.nomormeja from torderchecker a, torder b where a.kodelokasi=b.kodelokasi and a.kodetrans=b.kodetrans and a.tglomzet=b.tglomzet and a.kodelokasi='".$kodelokasi."' order by cast(b.NOMORMEJA as unsigned), a.namamenurecipe");
        return $query->result_array();
        
	}
    
    public function get_jumlahorang()
    {
        $kodelokasi = $this->session->userdata('kodelokasi');
		if($kodelokasi=="" || $kodelokasi==null)
		{
			$kodelokasi="LOK001";
			$this->session->set_userdata('kodelokasi','LOK001');
		}
        $query =$this->db->query("select sum(JUMLAHORANG) as jumlah from torder where kodelokasi='".$kodelokasi."'");
        return $query->result();
    }
    
    public function get_multimeja($kodemenu)
    {
        $kodelokasi = $this->session->userdata('kodelokasi');
		if($kodelokasi=="" || $kodelokasi==null)
		{
			$kodelokasi="LOK001";
			$this->session->set_userdata('kodelokasi','LOK001');
		}
        $query = $this->db->query("SELECT b.NOMORMEJA,a.* from torderchecker a, torder b where a.KODEMENURECIPE='".$kodemenu."' and a.status= 0 and a.KODELOKASI=b.KODELOKASI and a.KODETRANS=b.KODETRANS and a.TGLOMZET=b.TGLOMZET and a.kodelokasi='".$kodelokasi."'");
        return $query->result_array();
    }
    
    public function get_menu($nomeja)
    {
        $kodelokasi = $this->session->userdata('kodelokasi');
		if($kodelokasi=="" || $kodelokasi==null)
		{
			$kodelokasi="LOK001";
			$this->session->set_userdata('kodelokasi','LOK001');
		}
        $query = $this->db->query("select a.*,b.NOMORMEJA from torderchecker a, torder b where b.nomormeja='".$nomeja."' and a.KODELOKASI=b.KODELOKASI and a.KODETRANS=b.KODETRANS and a.TGLOMZET=b.TGLOMZET and a.kodelokasi='".$kodelokasi."' order by a.namamenurecipe");
        return $query->result_array();
    }
    
    public function get_progress($nomeja)
    {
        $kodelokasi = $this->session->userdata('kodelokasi');
		if($kodelokasi=="" || $kodelokasi==null)
		{
			$kodelokasi="LOK001";
			$this->session->set_userdata('kodelokasi','LOK001');
		}
        $query = $this->db->query("select a.kodetrans, a.tglomzet, b.nomormeja, a.namamenurecipe, a.durasi, a.jamorder, a.jamtarget, a.status, a.jamfinish,a.URUTANCHECKER,a.URUTAN from torderchecker a, torder b where b.nomormeja='".$nomeja."' and a.KODELOKASI=b.KODELOKASI and a.KODETRANS=b.KODETRANS and a.TGLOMZET=b.TGLOMZET and a.kodelokasi='".$kodelokasi."' order by cast(b.NOMORMEJA as unsigned), a.namamenurecipe");
        return $query->result_array();
    }
    
    public function get_allprogress(){
        $kodelokasi = $this->session->userdata('kodelokasi');
		if($kodelokasi=="" || $kodelokasi==null)
		{
			$kodelokasi="LOK001";
			$this->session->set_userdata('kodelokasi','LOK001');
		}
        $query = $this->db->query("select a.kodetrans,a.tglomzet,b.nomormeja,a.namamenurecipe,a.durasi,a.jamorder,a.jamtarget,a.status,a.jamfinish from torderchecker a, torder b where a.status='0' and a.KODELOKASI=b.KODELOKASI and a.KODETRANS=b.KODETRANS and a.TGLOMZET=b.TGLOMZET and a.urutanchecker=-1 and a.kodelokasi='".$kodelokasi."' order by  cast(b.NOMORMEJA as unsigned), a.namamenurecipe");
		return $query->result_array();
    }
    
    public function getSysdate()
    {
        $kodelokasi = $this->session->userdata('kodelokasi');
		if($kodelokasi=="" || $kodelokasi==null)
		{
			$kodelokasi="LOK001";
			$this->session->set_userdata('kodelokasi','LOK001');
		}
        $query = $this->db->query("SELECT DATE_FORMAT(SYSDATE(),'%H:%i:%s') as tglskrg");
        return $query->result_array();
    }
    
    public function update_status($kodetrans,$kodelokasi,$tglomzet,$urutan,$stat,$tgl)
    {   
        $kodelokasi = $this->session->userdata('kodelokasi');
		if($kodelokasi=="" || $kodelokasi==null)
		{
			$kodelokasi="LOK001";
			$this->session->set_userdata('kodelokasi','LOK001');
		}
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
        $kodelokasi = $this->session->userdata('kodelokasi');
		if($kodelokasi=="" || $kodelokasi==null)
		{
			$kodelokasi="LOK001";
			$this->session->set_userdata('kodelokasi','LOK001');
		}
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
        $kodelokasi = $this->session->userdata('kodelokasi');
		if($kodelokasi=="" || $kodelokasi==null)
		{
			$kodelokasi="LOK001";
			$this->session->set_userdata('kodelokasi','LOK001');
		}
        $query = $this->db->query("SELECT a.jamorder as jammasuk, count(a.KODEMENURECIPE) as total,a.kodetrans  FROM torderchecker a, torder b where a.KODELOKASI=b.KODELOKASI and a.KODETRANS=b.KODETRANS and a.TGLOMZET=b.TGLOMZET and URUTANCHECKER=-1 and a.kodelokasi='".$kodelokasi."' group by b.NOMORMEJA");
        return $query->result_array();
    }
    
    public function getCountFinishOrder()
    {
        $kodelokasi = $this->session->userdata('kodelokasi');
		if($kodelokasi=="" || $kodelokasi==null)
		{
			$kodelokasi="LOK001";
			$this->session->set_userdata('kodelokasi','LOK001');
		}
        $query = $this->db->query("select count(*) as total from torderchecker where status=1 and kodelokasi='".$kodelokasi."'");
        return $query->result_array();
    }
    
    public function getCountFinish()
    {
        $kodelokasi = $this->session->userdata('kodelokasi');
		if($kodelokasi=="" || $kodelokasi==null)
		{
			$kodelokasi="LOK001";
			$this->session->set_userdata('kodelokasi','LOK001');
		}
        $query = $this->db->query("select count(a.kodemenurecipe) as totalfinish,b.NOMORMEJA from torderchecker a, torder b where a.status=1 and a.KODELOKASI=b.KODELOKASI and a.KODETRANS=b.KODETRANS and a.TGLOMZET=b.TGLOMZET and a.kodelokasi='".$kodelokasi."' group by b.nomormeja");
        return $query->result_array();
    }
    
    public function getCountOrder()
    {
        $kodelokasi = $this->session->userdata('kodelokasi');
		if($kodelokasi=="" || $kodelokasi==null)
		{
			$kodelokasi="LOK001";
			$this->session->set_userdata('kodelokasi','LOK001');
		}
        $query = $this->db->query("select count(*) as total from torderchecker where urutanchecker=-1 and kodelokasi='".$kodelokasi."'");
        return $query->result_array();
    }
    
    //buat demo start
    public function inserttorder($kodetrans,$nomeja,$totalcust)
    {
        $query = $this->db->query("INSERT INTO `torder`(`KODELOKASI`, `KODETRANS`, `TGLTRANS`, `TGLOMZET`, `JAMTRANS`, `NOMORMEJA`, `JUMLAHORANG`) VALUES ('LOK002','".$kodetrans."',CURRENT_DATE,CURRENT_DATE,CURRENT_TIME,".$nomeja.",".$totalcust.")");
    }
    
    public function inserttorderdtl($kodelokasi,$kodetrans,$tgl,$urutan,$kodemenu)
    {
        $query = $this->db->query("INSERT INTO `torderdtl`(`SPESIFIKASI`, `KODELOKASI`, `KODETRANS`, `TGLTRANS`, `TGLOMZET`, `JAMTRANS`, `URUTAN`, `KODEMENURECIPE`, `URUTANHEADER`) VALUES ('1','".$kodelokasi."','".$kodetrans."','".$tgl."','".$tgl."',CURRENT_TIME,".$urutan.",'".$kodemenu."',-1)");
    }
    
    public function insertmodifier($kodelokasi,$kodetrans,$tgl,$urutan,$kodemenu,$noheader)
    {
        $query = $this->db->query("INSERT INTO `torderdtl`(`SPESIFIKASI`, `KODELOKASI`, `KODETRANS`, `TGLTRANS`, `TGLOMZET`, `JAMTRANS`, `URUTAN`, `KODEMENURECIPE`, `URUTANHEADER`) VALUES ('1','".$kodelokasi."','".$kodetrans."','".$tgl."','".$tgl."',CURRENT_TIME,".$urutan.",'".$kodemenu."','".$noheader."')");
    }
    
    
    public function getordermodif()
    {
        $query = $this->db->query("select * from torderdtl where kodemenurecipe like'xx%'");
        return $query->result_array();
    }
    
    public function geturutan()
    {
        $query = $this->db->query("select max(URUTAN)+1 as urutan from torderdtl");
        return $query->result_array();
    }
    
    public function getmodifier()
    {
        $query = $this->db->query("select * from makanan where kodemenurecipe like 'yy%'");
        return $query->result_array();
    }
    public function gettorder()
    {
        $query = $this->db->query("select * from torder");
        return $query->result_array();
    }
    
    public function getmakanan()
    {
        $query = $this->db->query("select * from makanan where kodemenurecipe like 'xx%'");
        return $query->result_array();
    }
    
    
    public function gettorderdtl()
    {
        $query = $this->db->query("select * from torderdtl");
        return $query->result_array();
    }
    
    public function getorder($kodetrans)
    {
        $query = $this->db->query("select * from torder where KODETRANS='".$kodetrans."'");
        return $query->result_array();
    }
    
    //buat demo end
    
    public function getAllMenu(){
        $kodelokasi = $this->session->userdata('kodelokasi');
		if($kodelokasi=="" || $kodelokasi==null)
		{
			$kodelokasi="LOK001";
			$this->session->set_userdata('kodelokasi','LOK001');
		}
        $query = $this->db->query("select KODEMENURECIPE, NAMAMENURECIPE,count(NAMAMENURECIPE) as QTY from torderchecker where URUTANCHECKER=-1 and a.kodelokasi='".$kodelokasi."' group by KODEMENURECIPE order by NAMAMENURECIPE ");
        return $query->result_array();
    }
    
    public function getReportMeja($kodemenu)
    {
        $kodelokasi = $this->session->userdata('kodelokasi');
		if($kodelokasi=="" || $kodelokasi==null)
		{
			$kodelokasi="LOK001";
			$this->session->set_userdata('kodelokasi','LOK001');
		}
        $query = $this->db->query("select distinct(b.NOMORMEJA) as NOMORMEJA from torderchecker a, torder b where a.KODEMENURECIPE='".$kodemenu."' and a.KODELOKASI=b.kodelokasi and a.KODETRANS= b.kodetrans and a.TGLOMZET=b.TGLOMZET and a.kodelokasi='".$kodelokasi."' order by cast(b.NOMORMEJA as unsigned)");
        return $query->result_array();
    }
    
    public function getReport2()
    {   
        $kodelokasi = $this->session->userdata('kodelokasi');
		if($kodelokasi=="" || $kodelokasi==null)
		{
			$kodelokasi="LOK001";
			$this->session->set_userdata('kodelokasi','LOK001');
		}
        $query = $this->db->query("select a.NAMAMENURECIPE, b.NOMORMEJA, a.JAMORDER, a.DURASI from torderchecker a, torder b where a.URUTANCHECKER=-1 and a.KODELOKASI=b.KODELOKASI and a.KODETRANS=b.KODETRANS and a.TGLOMZET=b.TGLOMZET and a.kodelokasi='".$kodelokasi."' ORDER BY a.NAMAMENURECIPE, a.JAMORDER");
        return $query->result_array();
    }
    public function getNamaMenu($kodetrans){
        $kodelokasi = $this->session->userdata('kodelokasi');
		if($kodelokasi=="" || $kodelokasi==null)
		{
			$kodelokasi="LOK001";
			$this->session->set_userdata('kodelokasi','LOK001');
		}
        $query = $this->db->query("select distinct KODETRANS,NAMAMENURECIPE from torderchecker  where URUTANCHECKER=-1 and KODETRANS='".$kodetrans."' order by TGLOMZET desc,NAMAMENURECIPE,KODETRANS");
        return $query->result_array();
    }
    public function getReport3()
    {
        $kodelokasi = $this->session->userdata('kodelokasi');
		if($kodelokasi=="" || $kodelokasi==null)
		{
			$kodelokasi="LOK001";
			$this->session->set_userdata('kodelokasi','LOK001');
		}
        $query = $this->db->query("select distinct a.NOMORMEJA,b.KODETRANS,b.TGLOMZET,b.NAMAMENURECIPE from torder a,torderchecker b where b.URUTANCHECKER=-1 and b.KODELOKASI=a.KODELOKASI and a.KODETRANS=b.KODETRANS and a.TGLOMZET=b.TGLOMZET order by b.TGLOMZET desc,b.NAMAMENURECIPE,a.NOMORMEJA");
        return $query->result_array();
    }
    
    public function getReport4_1()
    {
        $kodelokasi = $this->session->userdata('kodelokasi');
		if($kodelokasi=="" || $kodelokasi==null)
		{
			$kodelokasi="LOK001";
			$this->session->set_userdata('kodelokasi','LOK001');
		}
        $query = $this->db->query("select KODELOKASI, NOMORMEJA, KODETRANS from torder");
        return $query->result_array();
    }
    
    public function getReport4_2($kodelokasi,$kodetrans)
    {
        $kodelokasi = $this->session->userdata('kodelokasi');
		if($kodelokasi=="" || $kodelokasi==null)
		{
			$kodelokasi="LOK001";
			$this->session->set_userdata('kodelokasi','LOK001');
		}
        $query = $this->db->query("select STATUS from torderchecker where KODELOKASI='".$kodelokasi."' and KODETRANS='".$kodetrans."'");
        return $query->result_array();
    }
    
}
?>