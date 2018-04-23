<?php
use PhpOffice\PhpSpreadsheet\Reader\Xls;
class insert_torder extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('checker_model');
        $this->load->helper('array');
        $this->load->library('table');
		$this->load->helper('url');
	}
	
    
	public function index()
	{
        //require base_url().'vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Reader/Xls.php';

require 'D:\xampp\htdocs\NV\nv_check\vendor\autoload.php';
require 'D:\xampp\htdocs\NV\nv_check\vendor\phpoffice\phpspreadsheet\samples\Header.php';
        $inputFileName = base_url().'input.xls';
        $reader = new Xls();
        $spreadsheet = $reader->load($inputFileName);

        $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
        //print_r ($sheetData);
        echo "<table border='1'>";
        foreach ($sheetData as $item)
        {
            echo "<tr>";
            echo "<td>".$item["A"]."</td>"."<td>".$item["B"]."</td>"."<td>".$item["C"]."</td>"."<td>".$item["D"]."</td>";
            echo "</tr>";
        }
        echo "</table>";
	}


}

?>
